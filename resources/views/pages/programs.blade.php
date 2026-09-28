@extends('layouts.app', [
    'title' => 'Programs & Courses - Yuvalay | Career, Leadership & Innovation',
    'metaDescription' => 'Explore Yuvalay\'s practical programs designed for students and young professionals across Career Clarity, Communication, Leadership, and Innovation.'
])

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-12">

    <!-- Header Section (PDF Page 3) -->
    <div class="space-y-4">
        <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full text-xs font-bold tracking-wider uppercase bg-brand-100 text-brand-800 border border-brand-200 shadow-sm">
            ✦ LEARNING &amp; SKILL BUILDING
        </span>
        <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight text-slate-900 leading-tight">
            Build Skills<br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-600 to-accent-teal">That Move You.</span>
        </h1>
        <p class="text-base sm:text-lg text-slate-600 max-w-2xl leading-relaxed">
            Practical programs for students and young professionals — designed to turn theoretical knowledge into tangible confidence, industry readiness, and purposeful action.
        </p>
    </div>

    <!-- Category Filter Pills -->
    <div class="flex items-center gap-2 overflow-x-auto pb-2 scrollbar-none">
        @foreach($categories as $cat)
        <a href="{{ route('programs.index', ['category' => $cat]) }}" 
           class="px-4 py-2 rounded-full text-xs font-bold whitespace-nowrap transition-all {{ $category === $cat ? 'bg-brand-600 text-white shadow-md shadow-brand-500/20' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200' }}">
            {{ $cat }}
        </a>
        @endforeach
    </div>

    <!-- Programs Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($programs as $prog)
        <div class="bg-white rounded-3xl overflow-hidden border border-slate-100 shadow-sm hover:shadow-lg transition-all flex flex-col justify-between group bento-card">
            <div>
                <div class="relative h-52 overflow-hidden bg-slate-100">
                    <img src="{{ $prog->image_url }}" alt="{{ $prog->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                    <span class="absolute top-4 left-4 px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-white/95 backdrop-blur-md text-brand-800 shadow-sm">
                        {{ $prog->category }}
                    </span>
                    <span class="absolute bottom-3 left-4 text-xs font-semibold text-white/90">
                        ⏱️ {{ $prog->duration }}
                    </span>
                </div>

                <div class="p-6 space-y-3">
                    <h3 class="text-xl font-extrabold text-slate-900 group-hover:text-brand-600 transition-colors">
                        {{ $prog->title }}
                    </h3>
                    <p class="text-xs text-slate-600 line-clamp-3 leading-relaxed">
                        {{ $prog->short_desc }}
                    </p>

                    @if(!empty($prog->outcomes) && is_array($prog->outcomes))
                    <div class="pt-2 space-y-1">
                        <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Key Outcomes:</span>
                        <ul class="text-xs text-slate-600 space-y-1">
                            @foreach(array_slice($prog->outcomes, 0, 2) as $out)
                            <li class="flex items-center gap-1.5">
                                <span class="text-brand-500">✓</span>
                                <span>{{ $out }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
            </div>

            <div class="p-6 pt-0 border-t border-slate-50 mt-4 flex items-center justify-between">
                <a href="{{ route('programs.show', $prog->slug) }}" class="text-xs font-bold text-brand-600 hover:text-brand-700 flex items-center gap-1">
                    <span>Curriculum &amp; Details</span>
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
                <a href="{{ route('contact', ['role' => 'student']) }}" class="px-4 py-2 rounded-xl bg-brand-600 hover:bg-brand-700 text-white font-bold text-xs shadow-sm transition-all hover:scale-105">
                    Enroll Now
                </a>
            </div>
        </div>
        @empty
        <div class="col-span-3 text-center py-16 bg-white rounded-3xl border border-slate-100">
            <p class="text-sm text-slate-500">No programs found for category "{{ $category }}".</p>
            <a href="{{ route('programs.index') }}" class="text-xs font-bold text-brand-600 hover:underline mt-2 inline-block">View all programs</a>
        </div>
        @endforelse
    </div>

</div>
@endsection
