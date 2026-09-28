@extends('layouts.app', [
    'title' => 'Events Calendar & Workshops - Yuvalay',
    'metaDescription' => 'Explore upcoming and past youth workshops, webinars, hackathons, and Gupshup dialogue evenings at Yuvalay Vadodara.'
])

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-12">

    <!-- Header -->
    <div class="space-y-4">
        <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full text-xs font-bold tracking-wider uppercase bg-brand-100 text-brand-800 border border-brand-200 shadow-sm">
            ✦ EVENTS &amp; GATHERINGS
        </span>
        <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight text-slate-900 leading-tight">
            Learn, Connect &amp;<br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-600 to-accent-teal">Celebrate Growth.</span>
        </h1>
        <p class="text-base sm:text-lg text-slate-600 max-w-2xl leading-relaxed">
            Join interactive masterclasses, hackathons, and informal Gupshup dialogues led by prominent mentors and change-makers in Vadodara and online.
        </p>
    </div>

    <!-- Filter Bar -->
    <div class="bg-white rounded-2xl p-4 border border-slate-100 shadow-sm flex flex-wrap items-center justify-between gap-4">
        <div class="flex items-center gap-2 overflow-x-auto scrollbar-none">
            <span class="text-xs font-bold uppercase tracking-wider text-slate-400 mr-1">Category:</span>
            @foreach($categories as $cat)
            <a href="{{ route('events.index', ['category' => $cat, 'mode' => $mode]) }}" 
               class="px-3.5 py-1.5 rounded-full text-xs font-bold whitespace-nowrap transition-all {{ $category === $cat ? 'bg-brand-600 text-white' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">
                {{ $cat }}
            </a>
            @endforeach
        </div>

        <div class="flex items-center gap-2">
            <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Mode:</span>
            @foreach($modes as $m)
            <a href="{{ route('events.index', ['category' => $category, 'mode' => $m]) }}" 
               class="px-3 py-1 rounded-lg text-xs font-semibold {{ $mode === $m ? 'bg-slate-900 text-white' : 'text-slate-600 hover:bg-slate-100' }}">
                {{ $m }}
            </a>
            @endforeach
        </div>
    </div>

    <!-- Events Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @forelse($events as $event)
        <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-100 shadow-sm hover:shadow-md transition-all flex flex-col justify-between bento-card">
            <div class="space-y-4">
                
                <!-- Status & Date Header -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <span class="px-3 py-1 rounded-full text-[10px] font-extrabold uppercase tracking-wider bg-brand-100 text-brand-800">
                            {{ $event->category }}
                        </span>
                        <span class="px-2.5 py-1 rounded-full text-[10px] font-bold uppercase bg-slate-100 text-slate-600">
                            {{ $event->mode }}
                        </span>
                    </div>

                    <div class="text-right">
                        <span class="text-xs font-bold text-slate-900 block">📅 {{ $event->date_str }}</span>
                        <span class="text-[11px] text-slate-400">⏰ {{ $event->time_str }}</span>
                    </div>
                </div>

                <!-- Title & Description -->
                <div>
                    <h3 class="text-xl font-extrabold text-slate-900 hover:text-brand-600 transition-colors">
                        <a href="{{ route('events.show', $event->slug) }}">{{ $event->title }}</a>
                    </h3>
                    <p class="text-xs text-slate-500 mt-2 line-clamp-2 leading-relaxed">
                        {{ $event->short_desc }}
                    </p>
                </div>

                <!-- Speaker & Venue Info -->
                <div class="pt-3 border-t border-slate-100 flex items-center justify-between text-xs">
                    <div class="flex items-center gap-2.5">
                        <img src="{{ $event->speaker_avatar }}" alt="{{ $event->speaker_name }}" class="w-8 h-8 rounded-full object-cover border border-slate-200">
                        <div>
                            <p class="font-bold text-slate-800">{{ $event->speaker_name }}</p>
                            <p class="text-[10px] text-slate-400">{{ $event->speaker_role }}</p>
                        </div>
                    </div>
                    <div class="text-right text-[11px] text-slate-500">
                        <span>📍 {{ Str::limit($event->location, 25) }}</span>
                    </div>
                </div>

            </div>

            <!-- Footer: Seats remaining & RSVP action -->
            <div class="pt-6 border-t border-slate-100 mt-5 flex items-center justify-between">
                <div class="text-xs">
                    @if($event->seats_remaining > 0)
                        <span class="font-bold text-emerald-600">{{ $event->seats_remaining }} seats available</span>
                    @else
                        <span class="font-bold text-rose-500">Fully Booked</span>
                    @endif
                </div>

                <div class="flex items-center gap-2">
                    <a href="{{ route('events.show', $event->slug) }}" class="text-xs font-bold text-slate-600 hover:text-slate-900 px-3 py-2">
                        Details
                    </a>
                    @if($event->seats_remaining > 0)
                    <a href="{{ route('events.show', $event->slug) }}#register" class="px-4 py-2 rounded-xl bg-brand-600 hover:bg-brand-700 text-white font-bold text-xs shadow-sm transition-all hover:scale-105">
                        Register Free &rarr;
                    </a>
                    @endif
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-2 text-center py-16 bg-white rounded-3xl border border-slate-100">
            <p class="text-sm text-slate-500">No events matching the selected filters.</p>
            <a href="{{ route('events.index') }}" class="text-xs font-bold text-brand-600 hover:underline mt-2 inline-block">Reset filters</a>
        </div>
        @endforelse
    </div>

</div>
@endsection
