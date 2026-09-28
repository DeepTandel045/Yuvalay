@extends('layouts.app', [
    'title' => 'Digital Resource Centre - Yuvalay Vadodara',
    'metaDescription' => 'Access curated articles, career clarity guides, video lectures, and recommended book lists from Yuvalay\'s learning repository.'
])

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-12">

    <!-- Header -->
    <div class="space-y-4">
        <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full text-xs font-bold tracking-wider uppercase bg-brand-100 text-brand-800 border border-brand-200 shadow-sm">
            ✦ CONTINUOUS LEARNING
        </span>
        <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight text-slate-900 leading-tight">
            Digital Resource<br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-600 to-accent-teal">Centre.</span>
        </h1>
        <p class="text-base sm:text-lg text-slate-600 max-w-2xl leading-relaxed">
            Curated knowledge at your fingertips. Explore career roadmaps, resume toolkits, recorded expert masterclasses, and reading recommendations.
        </p>
    </div>

    <!-- Category Bento Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        <!-- Career & Resume Toolkit -->
        <div class="bg-white rounded-3xl p-8 border border-slate-100 shadow-sm hover:shadow-md transition-all bento-card space-y-4 flex flex-col justify-between">
            <div class="space-y-3">
                <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-brand-600 flex items-center justify-center text-2xl font-bold">
                    📄
                </div>
                <h3 class="text-xl font-extrabold text-slate-900">Career Readiness Toolkit</h3>
                <p class="text-xs text-slate-500 leading-relaxed">
                    ATS-friendly resume templates, cold email frameworks, and common HR interview preparation checklists tailored for fresh graduates.
                </p>
            </div>
            <div class="pt-4 border-t border-slate-50">
                <a href="{{ route('contact', ['role' => 'student']) }}" class="text-xs font-bold text-brand-600 hover:underline">Download Toolkit (Free) &rarr;</a>
            </div>
        </div>

        <!-- Recorded Masterclasses -->
        <div class="bg-white rounded-3xl p-8 border border-slate-100 shadow-sm hover:shadow-md transition-all bento-card space-y-4 flex flex-col justify-between">
            <div class="space-y-3">
                <div class="w-12 h-12 rounded-2xl bg-purple-50 text-accent-purple flex items-center justify-center text-2xl font-bold">
                    🎥
                </div>
                <h3 class="text-xl font-extrabold text-slate-900">Recorded Masterclasses</h3>
                <p class="text-xs text-slate-500 leading-relaxed">
                    Watch recorded sessions from senior corporate leaders on AI career adaptations, mindfulness, communication ethics, and entrepreneurship.
                </p>
            </div>
            <div class="pt-4 border-t border-slate-50">
                <a href="https://youtube.com" target="_blank" class="text-xs font-bold text-accent-purple hover:underline">Watch on YouTube &rarr;</a>
            </div>
        </div>

        <!-- Recommended Books & Reading List -->
        <div class="bg-white rounded-3xl p-8 border border-slate-100 shadow-sm hover:shadow-md transition-all bento-card space-y-4 flex flex-col justify-between">
            <div class="space-y-3">
                <div class="w-12 h-12 rounded-2xl bg-amber-50 text-accent-amber flex items-center justify-center text-2xl font-bold">
                    📖
                </div>
                <h3 class="text-xl font-extrabold text-slate-900">Yuvalay Library Classics</h3>
                <p class="text-xs text-slate-500 leading-relaxed">
                    A curated catalog of 200+ must-read titles on character building, Swami Vivekananda's philosophy, leadership grit, and design thinking.
                </p>
            </div>
            <div class="pt-4 border-t border-slate-50">
                <a href="{{ route('contact') }}" class="text-xs font-bold text-accent-amber hover:underline">Access Library Catalog &rarr;</a>
            </div>
        </div>

    </div>

    <!-- Physical Library Access Info -->
    <div class="bg-[#F8FAF9] rounded-3xl p-8 border border-slate-200/60 flex flex-col sm:flex-row items-center justify-between gap-6">
        <div class="space-y-1 text-center sm:text-left">
            <h4 class="font-extrabold text-slate-900 text-base">Visit the Yuvalay Physical Reading Room</h4>
            <p class="text-xs text-slate-500">Open Monday to Saturday, 9:00 AM - 6:00 PM at our Vadodara Center. Free access for all registered youth.</p>
        </div>
        <a href="{{ route('contact') }}" class="px-5 py-2.5 rounded-full bg-slate-900 text-white font-bold text-xs hover:bg-slate-800 transition-colors whitespace-nowrap">
            Visit Campus &rarr;
        </a>
    </div>

</div>
@endsection
