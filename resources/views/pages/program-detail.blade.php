@extends('layouts.app', [
    'title' => $program->title . ' - Yuvalay Programs',
    'metaDescription' => $program->short_desc,
    'ogImage' => $program->image_url
])

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-10">

    <!-- Breadcrumb -->
    <nav class="flex items-center gap-2 text-xs font-semibold text-slate-500">
        <a href="{{ route('home') }}" class="hover:text-brand-600">Home</a>
        <span>/</span>
        <a href="{{ route('programs.index') }}" class="hover:text-brand-600">Programs</a>
        <span>/</span>
        <span class="text-slate-800">{{ $program->title }}</span>
    </nav>

    <!-- Program Hero Banner -->
    <div class="bg-white rounded-3xl overflow-hidden border border-slate-100 shadow-md">
        <div class="relative h-72 sm:h-96 w-full bg-slate-900">
            <img src="{{ $program->image_url }}" alt="{{ $program->title }}" class="w-full h-full object-cover opacity-80">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/40 to-transparent"></div>
            
            <div class="absolute bottom-6 left-6 right-6 space-y-3">
                <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-brand-500 text-white shadow-sm inline-block">
                    {{ $program->category }}
                </span>
                <h1 class="text-3xl sm:text-4xl font-extrabold text-white leading-tight">
                    {{ $program->title }}
                </h1>
                <div class="flex flex-wrap items-center gap-4 text-xs font-medium text-slate-200">
                    <span>⏱️ Duration: <strong>{{ $program->duration }}</strong></span>
                    <span>•</span>
                    <span>🎯 Target: <strong>{{ $program->target_audience }}</strong></span>
                </div>
            </div>
        </div>

        <div class="p-8 sm:p-10 space-y-8">
            <!-- Full Description -->
            <div class="space-y-3">
                <h2 class="text-xl font-extrabold text-slate-900">About the Program</h2>
                <p class="text-slate-600 leading-relaxed text-sm sm:text-base">
                    {{ $program->full_desc }}
                </p>
            </div>

            <!-- Outcomes & Features Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-slate-100">
                
                <!-- Outcomes -->
                @if(!empty($program->outcomes) && is_array($program->outcomes))
                <div class="bg-brand-50/50 rounded-2xl p-6 border border-brand-100 space-y-3">
                    <h3 class="text-sm font-bold uppercase tracking-wider text-brand-800 flex items-center gap-2">
                        <span>🎯</span> What You Will Achieve
                    </h3>
                    <ul class="space-y-2 text-xs sm:text-sm text-slate-700">
                        @foreach($program->outcomes as $outcome)
                        <li class="flex items-start gap-2">
                            <span class="text-brand-600 font-bold mt-0.5">✓</span>
                            <span>{{ $outcome }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <!-- Features -->
                @if(!empty($program->features) && is_array($program->features))
                <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100 space-y-3">
                    <h3 class="text-sm font-bold uppercase tracking-wider text-slate-800 flex items-center gap-2">
                        <span>✨</span> Program Highlights
                    </h3>
                    <ul class="space-y-2 text-xs sm:text-sm text-slate-700">
                        @foreach($program->features as $feature)
                        <li class="flex items-start gap-2">
                            <span class="text-accent-teal font-bold mt-0.5">★</span>
                            <span>{{ $feature }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif

            </div>

            <!-- CTA Row -->
            <div class="pt-6 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between gap-4">
                <div>
                    <h4 class="font-extrabold text-slate-900 text-sm">Ready to start?</h4>
                    <p class="text-xs text-slate-500">Seats are limited to maintain high mentor-to-student interaction.</p>
                </div>
                <div class="flex items-center gap-3">
                    <a href="{{ route('contact', ['role' => 'student']) }}" class="px-6 py-3 rounded-full bg-brand-600 hover:bg-brand-700 text-white font-bold text-sm shadow-md transition-all">
                        Apply / Enquire Now &rarr;
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
