<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Enquiry;
use App\Models\Event;
use App\Models\EventRegistration;
use App\Models\SuccessStory;
use App\Models\Mentor;
use App\Models\ImpactStat;
use App\Models\Program;

class DashboardController extends Controller
{
    public function index()
    {
        $totalEnquiries = Enquiry::count();
        $pendingEnquiries = Enquiry::where('status', 'pending')->count();
        $upcomingEventsCount = Event::where('is_upcoming', true)->count();
        $totalRegistrations = EventRegistration::count();
        $storiesCount = SuccessStory::count();
        $mentorsCount = Mentor::count();

        $recentEnquiries = Enquiry::latest()->take(5)->get();
        $recentRegistrations = EventRegistration::with('event')->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalEnquiries',
            'pendingEnquiries',
            'upcomingEventsCount',
            'totalRegistrations',
            'storiesCount',
            'mentorsCount',
            'recentEnquiries',
            'recentRegistrations'
        ));
    }

    // --- ENQUIRIES CENTRAL INBOX ---
    public function enquiries(Request $request)
    {
        $type = $request->query('type', 'all');
        $status = $request->query('status', 'all');

        $query = Enquiry::query();

        if ($type !== 'all' && !empty($type)) {
            $query->where('type', $type);
        }
        if ($status !== 'all' && !empty($status)) {
            $query->where('status', $status);
        }

        $enquiries = $query->latest()->paginate(15);
        $types = ['all', 'student', 'institution', 'volunteer', 'csr', 'mentor'];
        $statuses = ['all', 'pending', 'reviewed'];

        return view('admin.enquiries', compact('enquiries', 'types', 'statuses', 'type', 'status'));
    }

    public function toggleEnquiryStatus($id)
    {
        $enquiry = Enquiry::findOrFail($id);
        $enquiry->status = ($enquiry->status === 'pending') ? 'reviewed' : 'pending';
        $enquiry->save();

        return back()->with('success', 'Enquiry status updated to ' . ucfirst($enquiry->status) . '.');
    }

    public function deleteEnquiry($id)
    {
        $enquiry = Enquiry::findOrFail($id);
        $enquiry->delete();

        return back()->with('success', 'Enquiry record removed.');
    }

    // --- EVENTS CRUD ---
    public function events()
    {
        $events = Event::withCount('registrations')->orderBy('date_str', 'desc')->get();
        return view('admin.events.index', compact('events'));
    }

    public function createEvent()
    {
        return view('admin.events.create');
    }

    public function storeEvent(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'date_str' => 'required|string',
            'time_str' => 'required|string',
            'mode' => 'required|string',
            'location' => 'required|string',
            'speaker_name' => 'required|string',
            'speaker_role' => 'required|string',
            'speaker_avatar' => 'nullable|string',
            'speaker_avatar_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
            'short_desc' => 'required|string',
            'full_desc' => 'required|string',
            'seats_total' => 'required|integer|min:1',
            'is_upcoming' => 'nullable|boolean',
            'registration_open' => 'nullable|boolean',
        ]);

        $baseSlug = Str::slug($validated['title']);
        $slug = $baseSlug;
        $counter = 1;
        while (Event::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $counter++;
        }
        $validated['slug'] = $slug;
        $validated['seats_booked'] = 0;

        // Handle uploaded file or direct image address
        if ($request->hasFile('speaker_avatar_file')) {
            $file = $request->file('speaker_avatar_file');
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/events'), $filename);
            $validated['speaker_avatar'] = asset('uploads/events/' . $filename);
        } elseif (!empty($validated['speaker_avatar'])) {
            $validated['speaker_avatar'] = trim($validated['speaker_avatar']);
        } else {
            $validated['speaker_avatar'] = 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=300&q=80';
        }

        $validated['is_upcoming'] = $request->has('is_upcoming') ? (bool)$request->is_upcoming : true;
        $validated['registration_open'] = $request->has('registration_open') ? (bool)$request->registration_open : true;

        Event::create($validated);

        return redirect()->route('admin.events.index')->with('success', 'New event created successfully!');
    }

    public function editEvent($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.events.edit', compact('event'));
    }

    public function updateEvent(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'date_str' => 'required|string',
            'time_str' => 'required|string',
            'mode' => 'required|string',
            'location' => 'required|string',
            'speaker_name' => 'required|string',
            'speaker_role' => 'required|string',
            'speaker_avatar' => 'nullable|string',
            'speaker_avatar_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
            'short_desc' => 'required|string',
            'full_desc' => 'required|string',
            'seats_total' => 'required|integer|min:1',
            'is_upcoming' => 'nullable|boolean',
            'registration_open' => 'nullable|boolean',
        ]);

        if ($request->hasFile('speaker_avatar_file')) {
            $file = $request->file('speaker_avatar_file');
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/events'), $filename);
            $validated['speaker_avatar'] = asset('uploads/events/' . $filename);
        } elseif (!empty($validated['speaker_avatar'])) {
            $validated['speaker_avatar'] = trim($validated['speaker_avatar']);
        } else {
            $validated['speaker_avatar'] = $event->speaker_avatar ?: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=300&q=80';
        }

        $validated['is_upcoming'] = $request->has('is_upcoming');
        $validated['registration_open'] = $request->has('registration_open');

        $event->update($validated);

        return redirect()->route('admin.events.index')->with('success', 'Event details updated successfully!');
    }

    public function deleteEvent($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('admin.events.index')->with('success', 'Event deleted.');
    }

    public function eventRegistrations($id)
    {
        $event = Event::with('registrations')->findOrFail($id);
        return view('admin.events.registrations', compact('event'));
    }

    // --- SUCCESS STORIES ---
    public function stories()
    {
        $stories = SuccessStory::orderBy('order_index')->get();
        return view('admin.stories', compact('stories'));
    }

    public function storeStory(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'organization' => 'nullable|string|max:255',
            'story_quote' => 'required|string',
            'full_story' => 'required|string',
            'program_name' => 'required|string',
            'avatar_url' => 'nullable|url',
        ]);

        $validated['is_featured'] = true;
        $validated['order_index'] = SuccessStory::count() + 1;

        SuccessStory::create($validated);

        return back()->with('success', 'Success story published successfully!');
    }

    public function deleteStory($id)
    {
        $story = SuccessStory::findOrFail($id);
        $story->delete();

        return back()->with('success', 'Story deleted.');
    }

    // --- MENTORS ---
    public function mentors()
    {
        $mentors = Mentor::orderBy('order_index')->get();
        return view('admin.mentors', compact('mentors'));
    }

    public function storeMentor(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'organization' => 'required|string|max:255',
            'expertise' => 'required|string|max:255',
            'bio' => 'required|string',
            'avatar_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',
            'category' => 'required|string',
        ]);

        $validated['order_index'] = Mentor::count() + 1;

        Mentor::create($validated);

        return back()->with('success', 'Mentor profile added successfully!');
    }

    public function deleteMentor($id)
    {
        $mentor = Mentor::findOrFail($id);
        $mentor->delete();

        return back()->with('success', 'Mentor profile removed.');
    }

    // --- IMPACT STATS ---
    public function stats()
    {
        $stats = ImpactStat::orderBy('order_index')->get();
        return view('admin.stats', compact('stats'));
    }

    public function updateStat(Request $request, $id)
    {
        $stat = ImpactStat::findOrFail($id);

        $validated = $request->validate([
            'label' => 'required|string|max:255',
            'value' => 'required|string|max:50',
            'description' => 'nullable|string|max:255',
        ]);

        $stat->update($validated);

        return back()->with('success', 'Stat updated! The new number is live on the website.');
    }
}
