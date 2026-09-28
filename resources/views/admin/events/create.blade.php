@extends('layouts.admin')

@section('page_title', 'Create New Event')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">

    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-extrabold text-slate-900">Add New Event</h2>
            <p class="text-xs text-slate-500">Publish a new workshop, webinar, or community gathering.</p>
        </div>
        <a href="{{ route('admin.events.index') }}" class="text-xs font-semibold text-slate-600 hover:text-slate-900">&larr; Back to list</a>
    </div>

    <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-2xl p-8 border border-slate-200/80 shadow-sm space-y-5 text-xs" x-data="{ imageUrl: '{{ old('speaker_avatar', 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=300&q=80') }}', previewUrl: '' }">
        @csrf

        <div>
            <label class="block font-bold text-slate-700 uppercase mb-1">Event Title *</label>
            <input type="text" name="title" required value="{{ old('title') }}" placeholder="e.g. Masterclass: Public Speaking Secrets" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div>
                <label class="block font-bold text-slate-700 uppercase mb-1">Category *</label>
                <select name="category" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    <option value="Workshop">Workshop</option>
                    <option value="Webinar">Webinar</option>
                    <option value="Hackathon">Hackathon</option>
                    <option value="Gupshup">Gupshup</option>
                    <option value="Community Drive">Community Drive</option>
                </select>
            </div>
            <div>
                <label class="block font-bold text-slate-700 uppercase mb-1">Mode *</label>
                <select name="mode" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    <option value="Online">Online</option>
                    <option value="In-person">In-person</option>
                    <option value="Hybrid">Hybrid</option>
                </select>
            </div>
            <div>
                <label class="block font-bold text-slate-700 uppercase mb-1">Total Capacity *</label>
                <input type="number" name="seats_total" required value="100" min="1" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block font-bold text-slate-700 uppercase mb-1">Date *</label>
                <input type="date" name="date_str" required value="{{ old('date_str', date('Y-m-d')) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
            </div>
            <div>
                <label class="block font-bold text-slate-700 uppercase mb-1">Time Range *</label>
                <input type="text" name="time_str" required value="{{ old('time_str', '10:00 AM - 1:00 PM IST') }}" placeholder="e.g. 5:00 PM - 6:30 PM IST" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
            </div>
        </div>

        <div>
            <label class="block font-bold text-slate-700 uppercase mb-1">Location / Venue *</label>
            <input type="text" name="location" required value="{{ old('location', 'Yuvalay Center, Vadodara') }}" placeholder="e.g. Yuvalay Center, Vadodara or Zoom Link" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block font-bold text-slate-700 uppercase mb-1">Speaker Name *</label>
                <input type="text" name="speaker_name" required value="{{ old('speaker_name') }}" placeholder="e.g. Dr. Nirav Sharma" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
            </div>
            <div>
                <label class="block font-bold text-slate-700 uppercase mb-1">Speaker Role *</label>
                <input type="text" name="speaker_role" required value="{{ old('speaker_role') }}" placeholder="e.g. Career Consultant" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
            </div>
        </div>

        <!-- Speaker Photo: Dual Option (URL from Google OR Upload File) -->
        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200/80 space-y-3">
            <div class="flex items-center justify-between">
                <div>
                    <label class="block font-bold text-slate-800 uppercase tracking-wider text-[11px]">Speaker Photo / Event Image</label>
                    <p class="text-[10px] text-slate-500">Paste an image link from Google (no download needed), OR upload a photo from your computer.</p>
                </div>
                <div class="w-12 h-12 rounded-xl overflow-hidden bg-slate-200 border-2 border-emerald-500 flex-shrink-0">
                    <img :src="previewUrl || imageUrl" alt="Preview" class="w-full h-full object-cover" onerror="this.src='https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=300&q=80'">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-1">
                <div>
                    <span class="text-[10px] font-bold text-slate-600 uppercase block mb-1">Option 1: Paste Image Address from Google / Web</span>
                    <input type="text" name="speaker_avatar" x-model="imageUrl" placeholder="https://example.com/image.jpg" class="w-full px-3 py-2 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    <span class="text-[9px] text-slate-400 block mt-0.5">Right-click image in Google &rarr; Copy image address &rarr; Paste here.</span>
                </div>
                <div>
                    <span class="text-[10px] font-bold text-slate-600 uppercase block mb-1">Option 2: OR Upload from Your Computer</span>
                    <input type="file" name="speaker_avatar_file" accept="image/*" 
                           @change="const file = $event.target.files[0]; if (file) { previewUrl = URL.createObjectURL(file); }"
                           class="w-full px-3 py-1.5 rounded-xl border border-slate-200 text-xs bg-white focus:outline-none">
                    <span class="text-[9px] text-slate-400 block mt-0.5">Supports PNG, JPG, WEBP (Max 5MB).</span>
                </div>
            </div>
        </div>

        <div>
            <label class="block font-bold text-slate-700 uppercase mb-1">Short Description *</label>
            <textarea name="short_desc" rows="2" required placeholder="Brief teaser for the event card..." class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">{{ old('short_desc') }}</textarea>
        </div>

        <div>
            <label class="block font-bold text-slate-700 uppercase mb-1">Full Description *</label>
            <textarea name="full_desc" rows="4" required placeholder="Complete details, topics covered, what attendees will learn..." class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">{{ old('full_desc') }}</textarea>
        </div>

        <div class="flex items-center gap-6 pt-2">
            <label class="flex items-center gap-2 font-bold text-slate-700">
                <input type="checkbox" name="is_upcoming" value="1" checked class="rounded border-slate-300 text-emerald-600">
                <span>Mark as Upcoming Event</span>
            </label>
            <label class="flex items-center gap-2 font-bold text-slate-700">
                <input type="checkbox" name="registration_open" value="1" checked class="rounded border-slate-300 text-emerald-600">
                <span>Online Registration Open</span>
            </label>
        </div>

        <button type="submit" class="w-full py-3 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-extrabold text-sm shadow-md transition-all">
            Save &amp; Publish Event &rarr;
        </button>
    </form>

</div>
@endsection
