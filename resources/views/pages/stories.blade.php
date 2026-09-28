@extends('layouts.app', [
    'title' => 'Success Stories & Alumni Impact - Yuvalay',
    'metaDescription' => 'Read real transformation journeys of students and young professionals whose lives and careers flourished with Yuvalay.'
])

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-12">

    <!-- Header -->
    <div class="space-y-4">
        <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full text-xs font-bold tracking-wider uppercase bg-brand-100 text-brand-800 border border-brand-200 shadow-sm">
            ✦ PROVEN IMPACT
        </span>
        <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight text-slate-900 leading-tight">
            Real Stories.<br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-600 to-accent-teal">Transformative Results.</span>
        </h1>
        <p class="text-base sm:text-lg text-slate-600 max-w-2xl leading-relaxed">
            Discover how college students overcome self-doubt, vernacular barriers, and technical challenges to launch meaningful careers and social initiatives.
        </p>
    </div>

    <!-- Stories Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($stories as $story)
        <div class="bg-white rounded-3xl p-8 border border-slate-100 shadow-sm hover:shadow-md transition-all flex flex-col justify-between bento-card space-y-6">
            <div class="space-y-4">
                <span class="px-3 py-1 rounded-full text-[10px] font-extrabold uppercase tracking-wider bg-brand-50 text-brand-700">
                    {{ $story->program_name }}
                </span>
                
                <p class="text-slate-800 font-medium text-sm sm:text-base italic leading-relaxed">
                    "{{ $story->story_quote }}"
                </p>

                <p class="text-xs text-slate-500 leading-relaxed border-t border-slate-50 pt-3">
                    {{ $story->full_story }}
                </p>
            </div>

            <div class="flex items-center gap-3 pt-4 border-t border-slate-100">
                <img src="{{ $story->avatar_url }}" alt="{{ $story->name }}" class="w-12 h-12 rounded-full object-cover border-2 border-brand-500 shadow-sm">
                <div>
                    <h4 class="font-extrabold text-slate-900 text-sm">{{ $story->name }}</h4>
                    <p class="text-xs font-semibold text-brand-600">{{ $story->role }}</p>
                    <p class="text-[11px] text-slate-400">{{ $story->organization }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Share Your Story CTA -->
    <div class="bg-brand-50 rounded-3xl p-8 sm:p-10 border border-brand-100 text-center max-w-2xl mx-auto space-y-4">
        <h3 class="text-2xl font-extrabold text-slate-900">Are you a Yuvalay Alum?</h3>
        <p class="text-xs sm:text-sm text-slate-600">
            We would love to celebrate your journey! Share how Yuvalay impacted your career or personal mindset.
        </p>
        <a href="{{ route('contact', ['role' => 'student']) }}" class="inline-block px-6 py-3 rounded-full bg-brand-600 hover:bg-brand-700 text-white font-bold text-xs uppercase tracking-wider shadow-sm">
            Share Your Journey &rarr;
        </a>
    </div>

</div>
@endsection
