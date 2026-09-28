<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventRegistration;
use App\Rules\ValidRealPhoneNumber;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->query('category', 'All');
        $mode = $request->query('mode', 'All');

        $query = Event::query();

        if ($category !== 'All' && !empty($category)) {
            $query->where('category', $category);
        }
        if ($mode !== 'All' && !empty($mode)) {
            $query->where('mode', $mode);
        }

        $events = $query->orderBy('date_str', 'asc')->get();
        $categories = ['All', 'Workshop', 'Webinar', 'Hackathon', 'Gupshup'];
        $modes = ['All', 'Online', 'In-person', 'Hybrid'];

        return view('pages.events', compact('events', 'categories', 'modes', 'category', 'mode'));
    }

    public function show($slug)
    {
        $event = Event::where('slug', $slug)->firstOrFail();
        return view('pages.event-detail', compact('event'));
    }

    public function register(Request $request, $slug)
    {
        $event = Event::where('slug', $slug)->firstOrFail();

        $validated = $request->validate([
            'name' => 'required|string|min:2|max:255',
            'email' => 'required|email|max:255',
            'phone' => ['required', 'string', 'max:30', new ValidRealPhoneNumber],
            'role' => 'required|string|max:50',
            'notes' => 'nullable|string|max:1000',
        ], [
            'name.min' => 'Please enter your full name.',
            'phone.required' => 'Please enter your phone number to receive confirmation.',
        ]);

        if ($event->seats_remaining <= 0) {
            return back()->with('error', 'Sorry, all seats for this event are fully booked.');
        }

        EventRegistration::create([
            'event_id' => $event->id,
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'role' => $validated['role'],
            'notes' => $validated['notes'] ?? null,
        ]);

        $event->increment('seats_booked');

        return back()->with('success', 'Registration confirmed! A confirmation message has been recorded and your seat is reserved.');
    }
}
