@extends('layouts.app', [
    'title' => $event->title . ' - Yuvalay Events',
    'metaDescription' => $event->short_desc,
    'ogImage' => $event->speaker_avatar
])

@push('schema')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Event",
  "name": "{{ $event->title }}",
  "startDate": "{{ $event->date_str }}",
  "eventAttendanceMode": "{{ $event->mode === 'Online' ? 'https://schema.org/OnlineEventAttendanceMode' : 'https://schema.org/MixedEventAttendanceMode' }}",
  "eventStatus": "https://schema.org/EventScheduled",
  "location": {
    "@type": "Place",
    "name": "{{ $event->location }}"
  },
  "description": "{{ $event->short_desc }}",
  "organizer": {
    "@type": "Organization",
    "name": "Yuvalay Individual Development Center",
    "url": "https://www.yuvalay.org"
  }
}
</script>
@endpush

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-10">

    <!-- Breadcrumb -->
    <nav class="flex items-center gap-2 text-xs font-semibold text-slate-500">
        <a href="{{ route('home') }}" class="hover:text-brand-600">Home</a>
        <span>/</span>
        <a href="{{ route('events.index') }}" class="hover:text-brand-600">Events</a>
        <span>/</span>
        <span class="text-slate-800">{{ $event->title }}</span>
    </nav>

    <!-- Main Card -->
    <div class="bg-white rounded-3xl overflow-hidden border border-slate-100 shadow-md">
        
        <!-- Header Banner -->
        <div class="p-8 sm:p-10 bg-gradient-to-br from-slate-900 via-slate-800 to-brand-950 text-white space-y-4">
            <div class="flex flex-wrap items-center gap-2">
                <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-brand-500 text-white">
                    {{ $event->category }}
                </span>
                <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-white/20 text-white">
                    {{ $event->mode }}
                </span>
            </div>

            <h1 class="text-3xl sm:text-4xl font-extrabold text-white leading-tight">
                {{ $event->title }}
            </h1>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-4 border-t border-white/10 text-xs">
                <div>
                    <span class="text-slate-400 block text-[11px] uppercase tracking-wider">Date &amp; Time</span>
                    <strong class="text-white text-sm">📅 {{ $event->date_str }}</strong>
                    <span class="block text-slate-300">{{ $event->time_str }}</span>
                </div>
                <div>
                    <span class="text-slate-400 block text-[11px] uppercase tracking-wider">Location / Venue</span>
                    <strong class="text-white text-sm">📍 {{ $event->location }}</strong>
                </div>
                <div>
                    <span class="text-slate-400 block text-[11px] uppercase tracking-wider">Availability</span>
                    <strong class="text-brand-300 text-sm">🎟️ {{ $event->seats_remaining }} Seats Open</strong>
                </div>
            </div>
        </div>

        <!-- Body Content -->
        <div class="p-8 sm:p-10 space-y-8">
            
            <!-- Speaker Section -->
            <div class="flex items-center gap-4 p-5 rounded-2xl bg-[#F8FAF9] border border-slate-100">
                <img src="{{ $event->speaker_avatar }}" alt="{{ $event->speaker_name }}" class="w-14 h-14 rounded-full object-cover border-2 border-brand-500 shadow-sm">
                <div>
                    <span class="text-[10px] font-extrabold uppercase tracking-wider text-brand-600">Featured Speaker &amp; Facilitator</span>
                    <h3 class="font-extrabold text-slate-900 text-base">{{ $event->speaker_name }}</h3>
                    <p class="text-xs text-slate-500">{{ $event->speaker_role }}</p>
                </div>
            </div>

            <!-- Description -->
            <div class="space-y-3">
                <h2 class="text-xl font-extrabold text-slate-900">About This Event</h2>
                <p class="text-slate-600 leading-relaxed text-sm sm:text-base">
                    {{ $event->full_desc }}
                </p>
            </div>

            <!-- Online Registration Form (FR-9, FR-10) -->
            <div id="register" class="pt-8 border-t border-slate-100 space-y-6">
                <div class="space-y-1">
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-600">Free Participation</span>
                    <h3 class="text-2xl font-extrabold text-slate-900">Register Online for this Session</h3>
                    <p class="text-xs text-slate-500">Fill out this quick form to reserve your seat. Instant confirmation is issued.</p>
                </div>

                @if($event->seats_remaining > 0)
                <form action="{{ route('events.register', $event->slug) }}" method="POST" class="space-y-4 bg-brand-50/40 p-6 sm:p-8 rounded-3xl border border-brand-100">
                    @csrf

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Full Name *</label>
                            <input type="text" name="name" required value="{{ old('name') }}" placeholder="e.g. Priyansh Shah" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-brand-500 focus:outline-none">
                            @error('name')<span class="text-rose-500 text-xs">{{ $message }}</span>@enderror
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Email Address *</label>
                            <input type="email" name="email" required value="{{ old('email') }}" placeholder="priyansh@example.com" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-brand-500 focus:outline-none">
                            @error('email')<span class="text-rose-500 text-xs">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Phone Number (WhatsApp) *</label>
                            <input type="tel" name="phone" required value="{{ old('phone') }}" 
                                   minlength="10" maxlength="10" pattern="[6-9][0-9]{9}" inputmode="numeric"
                                   placeholder="10-digit mobile (e.g. 9825012345)" 
                                   title="Must be a valid 10-digit Indian mobile number starting with 6, 7, 8, or 9 (minimum 10 characters, test numbers starting with 12345 are blocked)."
                                   class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-brand-500 focus:outline-none">
                            @error('phone')<span class="text-rose-500 text-xs font-semibold block mt-1">{{ $message }}</span>@enderror
                            <p class="text-[10px] text-slate-400 mt-1">10 digits required (starts with 6, 7, 8 or 9; fake 12345 numbers blocked)</p>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Your Current Role *</label>
                            <select name="role" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-brand-500 focus:outline-none bg-white">
                                <option value="Student">College / School Student</option>
                                <option value="Young Professional">Early Career Professional</option>
                                <option value="Faculty">Faculty / Teacher</option>
                                <option value="Parent">Parent</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Questions or Expectations (Optional)</label>
                        <textarea name="notes" rows="2" placeholder="What are you hoping to learn or ask the speaker?" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-brand-500 focus:outline-none"></textarea>
                    </div>

                    <button type="submit" class="w-full sm:w-auto px-8 py-3 rounded-full bg-brand-600 hover:bg-brand-700 text-white font-extrabold text-sm shadow-md shadow-brand-500/25 transition-all hover:scale-105 active:scale-95">
                        Confirm Registration &rarr;
                    </button>
                </form>
                @else
                <div class="p-6 bg-rose-50 border border-rose-200 rounded-2xl text-rose-800 text-center">
                    <p class="font-bold text-sm">Registrations are currently closed for this session as all seats have been reserved.</p>
                    <a href="{{ route('events.index') }}" class="text-xs font-semibold text-rose-900 underline mt-2 inline-block">Browse other upcoming sessions</a>
                </div>
                @endif

            </div>

        </div>

    </div>

</div>
@endsection
