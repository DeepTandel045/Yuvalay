@extends('layouts.app', [
    'title' => 'Faculty & Mentor Network - Yuvalay',
    'metaDescription' => 'Meet our network of senior industry leaders, distinguished academicians, and startup mentors guiding youth at Yuvalay Vadodara.'
])

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-12">

    <!-- Header -->
    <div class="space-y-4">
        <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full text-xs font-bold tracking-wider uppercase bg-brand-100 text-brand-800 border border-brand-200 shadow-sm">
            ✦ GUIDING LIGHTS
        </span>
        <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight text-slate-900 leading-tight">
            Faculty &amp; Mentor<br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-600 to-accent-teal">Network.</span>
        </h1>
        <p class="text-base sm:text-lg text-slate-600 max-w-2xl leading-relaxed">
            Seasoned corporate executives, university deans, entrepreneurs, and life coaches dedicating their time to mentor students and young professionals.
        </p>
    </div>

    <!-- Category Filter -->
    <div class="flex items-center gap-2 overflow-x-auto pb-2">
        @foreach($categories as $cat)
        <a href="{{ route('mentors.index', ['category' => $cat]) }}" 
           class="px-4 py-2 rounded-full text-xs font-bold whitespace-nowrap transition-all {{ $category === $cat ? 'bg-brand-600 text-white shadow-md' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200' }}">
            {{ $cat }} Mentors
        </a>
        @endforeach
    </div>

    <!-- Mentors Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @forelse($mentors as $mentor)
        <div class="bg-white rounded-3xl p-6 border border-slate-100 shadow-sm hover:shadow-md transition-all flex flex-col justify-between bento-card text-center items-center">
            <div class="space-y-4 flex flex-col items-center">
                <img src="{{ $mentor->avatar_url }}" alt="{{ $mentor->name }}" class="w-24 h-24 rounded-full object-cover border-4 border-emerald-50 shadow-md">
                
                <div>
                    <h3 class="text-lg font-extrabold text-slate-900">{{ $mentor->name }}</h3>
                    <p class="text-xs font-semibold text-brand-600">{{ $mentor->role }}</p>
                    <p class="text-[11px] text-slate-400">{{ $mentor->organization }}</p>
                </div>

                <div class="bg-brand-50/60 rounded-xl px-3 py-1.5 text-[11px] font-semibold text-brand-800">
                    💡 {{ $mentor->expertise }}
                </div>

                <p class="text-xs text-slate-500 leading-relaxed text-center line-clamp-3">
                    {{ $mentor->bio }}
                </p>
            </div>

            <div class="pt-5 border-t border-slate-50 mt-4 w-full flex items-center justify-center gap-3">
                @if($mentor->linkedin_url)
                <a href="{{ $mentor->linkedin_url }}" target="_blank" class="text-xs font-bold text-slate-500 hover:text-brand-600 flex items-center gap-1">
                    <span>LinkedIn Profile &rarr;</span>
                </a>
                @endif
            </div>
        </div>
        @empty
        <div class="col-span-4 text-center py-16 bg-white rounded-3xl border border-slate-100">
            <p class="text-sm text-slate-500">No mentors found for category "{{ $category }}".</p>
        </div>
        @endforelse
    </div>

    <!-- Onboard as Mentor Banner -->
    <div class="bg-gradient-to-r from-slate-900 to-slate-800 rounded-3xl p-8 sm:p-12 text-white flex flex-col sm:flex-row items-center justify-between gap-6">
        <div class="space-y-2 text-center sm:text-left">
            <h3 class="text-2xl font-extrabold">Are you an industry expert or academician?</h3>
            <p class="text-xs sm:text-sm text-slate-300 max-w-xl">
                Join Yuvalay's Mentor Network to guide young talents, conduct guest sessions, and give back to youth empowerment.
            </p>
        </div>
        <a href="{{ route('contact', ['role' => 'mentor']) }}" class="px-6 py-3 rounded-full bg-brand-500 hover:bg-brand-600 text-white font-bold text-xs uppercase tracking-wider whitespace-nowrap shadow-md">
            Join as Mentor &rarr;
        </a>
    </div>

</div>
@endsection
