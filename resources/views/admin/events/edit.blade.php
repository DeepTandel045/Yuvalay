@extends('layouts.admin')

@section('page_title', 'Edit Event')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">

    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-extrabold text-slate-900">Edit Event: {{ $event->title }}</h2>
            <p class="text-xs text-slate-500">Update event details, timing, or booking status.</p>
        </div>
        <a href="{{ route('admin.events.index') }}" class="text-xs font-semibold text-slate-600 hover:text-slate-900">&larr; Back to list</a>
    </div>

    <form action="{{ route('admin.events.update', $event->id) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-2xl p-8 border border-slate-200/80 shadow-sm space-y-5 text-xs" x-data="{ imageUrl: '{{ old('speaker_avatar', $event->speaker_avatar) }}', previewUrl: '' }">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-bold text-slate-700 uppercase mb-1">Event Title *</label>
            <input type="text" name="title" required value="{{ old('title', $event->title) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div>
                <label class="block font-bold text-slate-700 uppercase mb-1">Category *</label>
                <select name="category" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    @foreach(['Workshop', 'Webinar', 'Hackathon', 'Gupshup', 'Community Drive'] as $c)
                    <option value="{{ $c }}" {{ $event->category === $c ? 'selected' : '' }}>{{ $c }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block font-bold text-slate-700 uppercase mb-1">Mode *</label>
                <select name="mode" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    @foreach(['Online', 'In-person', 'Hybrid'] as $m)
                    <option value="{{ $m }}" {{ $event->mode === $m ? 'selected' : '' }}>{{ $m }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block font-bold text-slate-700 uppercase mb-1">Total Capacity *</label>
                <input type="number" name="seats_total" required value="{{ old('seats_total', $event->seats_total) }}" min="1" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block font-bold text-slate-700 uppercase mb-1">Date *</label>
                <input type="date" name="date_str" required value="{{ old('date_str', $event->date_str) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
            </div>
            <div>
                <label class="block font-bold text-slate-700 uppercase mb-1">Time Range *</label>
                <input type="text" name="time_str" required value="{{ old('time_str', $event->time_str) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
            </div>
        </div>

        <div>
            <label class="block font-bold text-slate-700 uppercase mb-1">Location / Venue *</label>
            <input type="text" name="location" required value="{{ old('location', $event->location) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block font-bold text-slate-700 uppercase mb-1">Speaker Name *</label>
                <input type="text" name="speaker_name" required value="{{ old('speaker_name', $event->speaker_name) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
            </div>
            <div>
                <label class="block font-bold text-slate-700 uppercase mb-1">Speaker Role *</label>
                <input type="text" name="speaker_role" required value="{{ old('speaker_role', $event->speaker_role) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
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
            <textarea name="short_desc" rows="2" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">{{ old('short_desc', $event->short_desc) }}</textarea>
        </div>

        <div>
            <label class="block font-bold text-slate-700 uppercase mb-1">Full Description *</label>
            <textarea name="full_desc" rows="4" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">{{ old('full_desc', $event->full_desc) }}</textarea>
        </div>

        <div class="flex items-center gap-6 pt-2">
            <label class="flex items-center gap-2 font-bold text-slate-700">
                <input type="checkbox" name="is_upcoming" value="1" {{ $event->is_upcoming ? 'checked' : '' }} class="rounded border-slate-300 text-emerald-600">
                <span>Mark as Upcoming Event</span>
            </label>
            <label class="flex items-center gap-2 font-bold text-slate-700">
                <input type="checkbox" name="registration_open" value="1" {{ $event->registration_open ? 'checked' : '' }} class="rounded border-slate-300 text-emerald-600">
                <span>Online Registration Open</span>
            </label>
        </div>

        <button type="submit" class="w-full py-3 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-extrabold text-sm shadow-md transition-all">
            Update Event Details &rarr;
        </button>
    </form>

</div>
@endsection
