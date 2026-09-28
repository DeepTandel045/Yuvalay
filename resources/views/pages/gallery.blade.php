@extends('layouts.app', [
    'title' => 'Visual Stories & Event Gallery - Yuvalay',
    'metaDescription' => 'Moments of youth empowerment, hackathon prototypes, classroom energy, and community outreach in action at Yuvalay Vadodara.'
])

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-12">

    <!-- Header -->
    <div class="space-y-4">
        <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full text-xs font-bold tracking-wider uppercase bg-brand-100 text-brand-800 border border-brand-200 shadow-sm">
            ✦ VISUAL STORIES
        </span>
        <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight text-slate-900 leading-tight">
            Moments in<br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-600 to-accent-teal">Motion.</span>
        </h1>
        <p class="text-base sm:text-lg text-slate-600 max-w-2xl leading-relaxed">
            A glimpse into the vibrant workshops, late-night prototyping in MakerSpace, outdoor camps, and joyful friendships that make Yuvalay home.
        </p>
    </div>

    <!-- Gallery Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        
        <div class="bg-white rounded-3xl overflow-hidden border border-slate-100 shadow-sm group">
            <div class="h-60 overflow-hidden bg-slate-100">
                <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=800&q=80" alt="Career Workshop" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            </div>
            <div class="p-5">
                <span class="text-[10px] font-bold uppercase tracking-wider text-brand-600">Career Clarity Bootcamp</span>
                <h3 class="font-extrabold text-slate-900 text-base mt-1">Mock Interview &amp; Resume Critiques</h3>
                <p class="text-xs text-slate-500 mt-1">Students receiving constructive feedback from industry HR panelists.</p>
            </div>
        </div>

        <div class="bg-white rounded-3xl overflow-hidden border border-slate-100 shadow-sm group">
            <div class="h-60 overflow-hidden bg-slate-100">
                <img src="https://images.unsplash.com/photo-1581092160607-ee22621dd758?auto=format&fit=crop&w=800&q=80" alt="MakerSpace" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            </div>
            <div class="p-5">
                <span class="text-[10px] font-bold uppercase tracking-wider text-brand-600">MakerSpace Prototyping</span>
                <h3 class="font-extrabold text-slate-900 text-base mt-1">Hardware &amp; IoT Prototyping</h3>
                <p class="text-xs text-slate-500 mt-1">Building civic IoT solutions using microcontrollers and 3D printing.</p>
            </div>
        </div>

        <div class="bg-white rounded-3xl overflow-hidden border border-slate-100 shadow-sm group">
            <div class="h-60 overflow-hidden bg-slate-100">
                <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&w=800&q=80" alt="Leadership Lab" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            </div>
            <div class="p-5">
                <span class="text-[10px] font-bold uppercase tracking-wider text-brand-600">Leadership Lab</span>
                <h3 class="font-extrabold text-slate-900 text-base mt-1">Team Synergy Challenges</h3>
                <p class="text-xs text-slate-500 mt-1">Young leaders learning delegation, empathy, and collective problem-solving.</p>
            </div>
        </div>

        <div class="bg-white rounded-3xl overflow-hidden border border-slate-100 shadow-sm group">
            <div class="h-60 overflow-hidden bg-slate-100">
                <img src="https://images.unsplash.com/photo-1529156069898-49953e39b3ac?auto=format&fit=crop&w=800&q=80" alt="Gupshup" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            </div>
            <div class="p-5">
                <span class="text-[10px] font-bold uppercase tracking-wider text-purple-600">Gupshup Dialogues</span>
                <h3 class="font-extrabold text-slate-900 text-base mt-1">Open Mic Evening</h3>
                <p class="text-xs text-slate-500 mt-1">Youth sharing stories, overcoming stage anxiety, and building friendships.</p>
            </div>
        </div>

        <div class="bg-white rounded-3xl overflow-hidden border border-slate-100 shadow-sm group">
            <div class="h-60 overflow-hidden bg-slate-100">
                <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=800&q=80" alt="PRAYAAS Camp" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            </div>
            <div class="p-5">
                <span class="text-[10px] font-bold uppercase tracking-wider text-amber-600">PRAYAAS Outreach</span>
                <h3 class="font-extrabold text-slate-900 text-base mt-1">School Mentoring Camps</h3>
                <p class="text-xs text-slate-500 mt-1">Bringing creative learning and confidence to middle school students.</p>
            </div>
        </div>

        <div class="bg-white rounded-3xl overflow-hidden border border-slate-100 shadow-sm group">
            <div class="h-60 overflow-hidden bg-slate-100">
                <img src="https://images.unsplash.com/photo-1475721027785-f74eccf877e2?auto=format&fit=crop&w=800&q=80" alt="Public Speaking" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            </div>
            <div class="p-5">
                <span class="text-[10px] font-bold uppercase tracking-wider text-blue-600">Communication Suite</span>
                <h3 class="font-extrabold text-slate-900 text-base mt-1">Public Speaking Showcase</h3>
                <p class="text-xs text-slate-500 mt-1">Delivering five-minute keynotes with confidence and poise.</p>
            </div>
        </div>

    </div>

</div>
@endsection
