@extends('layouts.app', [
    'title' => 'About Us - Yuvalay | Vision, Mission & 12+ Year Journey',
    'metaDescription' => 'Discover Yuvalay\'s vision, mission, core values, and 12+ year journey empowering youth in Vadodara, Gujarat.'
])

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-16">

    <!-- Hero Section (Directly matching PDF page 2) -->
    <section class="space-y-6">
        <div>
            <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full text-xs font-bold tracking-wider uppercase bg-brand-100 text-brand-800 border border-brand-200 shadow-sm">
                ✦ ABOUT YUVALAY
            </span>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
            <div class="lg:col-span-7 space-y-6">
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-slate-900 leading-[1.12]">
                    Potential Meets<br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-600 to-accent-teal">Opportunity.</span>
                </h1>
                <p class="text-lg text-slate-600 max-w-xl leading-relaxed">
                    We create meaningful experiences that help young people discover their strengths, develop future-ready skills, and make a tangible impact in their personal, academic, and professional lives.
                </p>
            </div>
            <div class="lg:col-span-5">
                <div class="rounded-3xl overflow-hidden shadow-xl border-4 border-white bg-slate-100 aspect-[4/3]">
                    <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=1000&q=80" alt="Yuvalay youth community" class="w-full h-full object-cover">
                </div>
            </div>
        </div>
    </section>

    <!-- Vision, Mission & Values Bento Row (01, 02, 03 from PDF 2) -->
    <section class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        <!-- 01 OUR VISION -->
        <div class="bg-white rounded-3xl p-8 border border-slate-100 shadow-sm bento-card space-y-4">
            <span class="text-xs font-extrabold text-brand-600 tracking-wider">01</span>
            <h3 class="text-2xl font-extrabold text-slate-900">OUR VISION</h3>
            <p class="text-sm text-slate-600 leading-relaxed">
                A world where every young person discovers their innate potential and evolves into a confident, self-reliant, and compassionate leader.
            </p>
        </div>

        <!-- 02 OUR MISSION -->
        <div class="bg-white rounded-3xl p-8 border border-slate-100 shadow-sm bento-card space-y-4">
            <span class="text-xs font-extrabold text-accent-teal tracking-wider">02</span>
            <h3 class="text-2xl font-extrabold text-slate-900">OUR MISSION</h3>
            <p class="text-sm text-slate-600 leading-relaxed">
                Empower youth with future-ready practical skills, real-world industry exposure, ethical decision-making, and a supportive lifelong community.
            </p>
        </div>

        <!-- 03 OUR VALUES -->
        <div class="bg-white rounded-3xl p-8 border border-slate-100 shadow-sm bento-card space-y-4">
            <span class="text-xs font-extrabold text-accent-purple tracking-wider">03</span>
            <h3 class="text-2xl font-extrabold text-slate-900">OUR VALUES</h3>
            <div class="flex flex-wrap gap-2 pt-2">
                <span class="px-2.5 py-1 rounded-full text-xs font-bold bg-emerald-50 text-emerald-700">Empathy</span>
                <span class="px-2.5 py-1 rounded-full text-xs font-bold bg-purple-50 text-purple-700">Integrity</span>
                <span class="px-2.5 py-1 rounded-full text-xs font-bold bg-amber-50 text-amber-700">Inclusion</span>
                <span class="px-2.5 py-1 rounded-full text-xs font-bold bg-blue-50 text-blue-700">Excellence</span>
                <span class="px-2.5 py-1 rounded-full text-xs font-bold bg-rose-50 text-rose-700">Collaboration</span>
                <span class="px-2.5 py-1 rounded-full text-xs font-bold bg-teal-50 text-teal-700">Creativity</span>
                <span class="px-2.5 py-1 rounded-full text-xs font-bold bg-indigo-50 text-indigo-700">Responsibility</span>
            </div>
        </div>

    </section>

    <!-- Our Impact (from PDF 2) -->
    <section class="bg-white rounded-3xl p-8 sm:p-10 border border-slate-100 shadow-sm space-y-6">
        <h2 class="text-2xl font-extrabold text-slate-900">Our Impact</h2>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
            @foreach($stats as $st)
            <div class="p-4 rounded-2xl bg-[#F8FAF9]">
                <div class="text-2xl sm:text-3xl font-extrabold text-brand-700 tracking-tight">{{ $st->value }}</div>
                <div class="text-xs font-bold text-slate-800 mt-1">{{ $st->label }}</div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Milestones Timeline -->
    <section class="space-y-8">
        <div class="text-center max-w-2xl mx-auto space-y-2">
            <span class="text-xs font-bold uppercase tracking-wider text-brand-600">The Journey</span>
            <h2 class="text-3xl font-extrabold text-slate-900">A Decade of Empowering Vadodara's Youth</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
            <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm space-y-2">
                <span class="text-xl font-extrabold text-brand-600">2012</span>
                <h4 class="font-bold text-sm text-slate-900">Foundation of Yuvalay</h4>
                <p class="text-xs text-slate-500 leading-relaxed">Established as an Individual Development Center in Vadodara to bridge academic knowledge with real-world skills.</p>
            </div>
            <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm space-y-2">
                <span class="text-xl font-extrabold text-brand-600">2015</span>
                <h4 class="font-bold text-sm text-slate-900">PRAYAAS &amp; Gupshup</h4>
                <p class="text-xs text-slate-500 leading-relaxed">Launched community outreach camps in schools and open-mic youth dialog forums.</p>
            </div>
            <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm space-y-2">
                <span class="text-xl font-extrabold text-brand-600">2018</span>
                <h4 class="font-bold text-sm text-slate-900">MakerSpace Prototyping Lab</h4>
                <p class="text-xs text-slate-500 leading-relaxed">Equipped youth with 3D printers, IoT kits, and STEM fabrication tools for hardware prototyping.</p>
            </div>
            <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm space-y-2">
                <span class="text-xl font-extrabold text-brand-600">2021</span>
                <h4 class="font-bold text-sm text-slate-900">Digital Expansion</h4>
                <p class="text-xs text-slate-500 leading-relaxed">Scaled online mentorship programs and digital resource centers reaching thousands statewide.</p>
            </div>
            <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm space-y-2">
                <span class="text-xl font-extrabold text-brand-600">2024+</span>
                <h4 class="font-bold text-sm text-slate-900">Ecosystem Hub</h4>
                <p class="text-xs text-slate-500 leading-relaxed">Integrating faculty mentorship, alumni career networks, and corporate CSR partnerships.</p>
            </div>
        </div>
    </section>

</div>
@endsection
