@extends('layouts.app', [
    'title' => 'Community Initiatives & Ecosystem - Yuvalay Vadodara',
    'metaDescription' => 'Explore the vibrant Yuvalay community: PRAYAAS grassroots outreach, MakerSpace STEM Lab, Gupshup dialog meetups, and Book Club.'
])

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-16">

    <!-- Hero Header (PDF 4 Reference) -->
    <div class="space-y-4">
        <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full text-xs font-bold tracking-wider uppercase bg-brand-100 text-brand-800 border border-brand-200 shadow-sm">
            ✦ COMMUNITY ECOSYSTEM
        </span>
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-slate-900 leading-tight">
            Find Your<br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-600 to-accent-teal">People.</span>
        </h1>
        <p class="text-base sm:text-lg text-slate-600 max-w-2xl leading-relaxed">
            Connect with peers, mentors, educators, volunteers and industry leaders who help turn your untapped potential into real progress.
        </p>
    </div>

    <!-- Community Initiatives Bento Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        
        <!-- PRAYAAS -->
        <div class="bg-white rounded-3xl p-8 border border-slate-100 shadow-sm hover:shadow-md transition-all bento-card flex flex-col justify-between">
            <div class="space-y-3">
                <div class="w-12 h-12 rounded-2xl bg-amber-50 text-accent-amber flex items-center justify-center text-2xl font-bold">
                    ☀️
                </div>
                <h3 class="text-2xl font-extrabold text-slate-900">PRAYAAS Outreach</h3>
                <span class="text-[11px] font-bold uppercase tracking-wider text-amber-600 block">Grassroots Social Impact</span>
                <p class="text-xs text-slate-600 leading-relaxed">
                    Yuvalay volunteers lead weekend educational camps, book distribution, and foundational life skills workshops in municipal and rural schools around Vadodara.
                </p>
            </div>
            <div class="pt-6 border-t border-slate-50 mt-4">
                <a href="{{ route('volunteer') }}" class="text-xs font-bold text-amber-600 hover:text-amber-700 flex items-center gap-1">
                    <span>Volunteer with PRAYAAS &rarr;</span>
                </a>
            </div>
        </div>

        <!-- MakerSpace -->
        <div class="bg-white rounded-3xl p-8 border border-slate-100 shadow-sm hover:shadow-md transition-all bento-card flex flex-col justify-between">
            <div class="space-y-3">
                <div class="w-12 h-12 rounded-2xl bg-brand-50 text-brand-600 flex items-center justify-center text-2xl font-bold">
                    ⚙️
                </div>
                <h3 class="text-2xl font-extrabold text-slate-900">Yuvalay MakerSpace</h3>
                <span class="text-[11px] font-bold uppercase tracking-wider text-brand-600 block">Prototyping &amp; Innovation Lab</span>
                <p class="text-xs text-slate-600 leading-relaxed">
                    A creative hardware playground equipped with 3D printers, IoT microcontrollers, soldering stations, and tools to turn engineering ideas into patentable working models.
                </p>
            </div>
            <div class="pt-6 border-t border-slate-50 mt-4">
                <a href="{{ route('programs.index', ['category' => 'Innovation']) }}" class="text-xs font-bold text-brand-600 hover:text-brand-700 flex items-center gap-1">
                    <span>Explore Innovation Lab &rarr;</span>
                </a>
            </div>
        </div>

        <!-- Gupshup -->
        <div class="bg-white rounded-3xl p-8 border border-slate-100 shadow-sm hover:shadow-md transition-all bento-card flex flex-col justify-between">
            <div class="space-y-3">
                <div class="w-12 h-12 rounded-2xl bg-purple-50 text-accent-purple flex items-center justify-center text-2xl font-bold">
                    ☕
                </div>
                <h3 class="text-2xl font-extrabold text-slate-900">Gupshup Dialogues</h3>
                <span class="text-[11px] font-bold uppercase tracking-wider text-purple-600 block">Speak. Share. Shine.</span>
                <p class="text-xs text-slate-600 leading-relaxed">
                    Informal, judgment-free youth conversations over chai. Students openly discuss self-doubt, mental wellbeing, career uncertainties, and life choices with empathetic mentors.
                </p>
            </div>
            <div class="pt-6 border-t border-slate-50 mt-4">
                <a href="{{ route('events.index') }}" class="text-xs font-bold text-accent-purple hover:underline flex items-center gap-1">
                    <span>Attend Next Gupshup &rarr;</span>
                </a>
            </div>
        </div>

        <!-- YuvaConnect Book Club -->
        <div class="bg-white rounded-3xl p-8 border border-slate-100 shadow-sm hover:shadow-md transition-all bento-card flex flex-col justify-between">
            <div class="space-y-3">
                <div class="w-12 h-12 rounded-2xl bg-blue-50 text-accent-blue flex items-center justify-center text-2xl font-bold">
                    📚
                </div>
                <h3 class="text-2xl font-extrabold text-slate-900">Yuvalay Book Club</h3>
                <span class="text-[11px] font-bold uppercase tracking-wider text-blue-600 block">Reading &amp; Critical Thinking</span>
                <p class="text-xs text-slate-600 leading-relaxed">
                    Monthly reading circles exploring transformative biographies, philosophy, psychology, and personal effectiveness classics from our physical and digital library.
                </p>
            </div>
            <div class="pt-6 border-t border-slate-50 mt-4">
                <a href="{{ route('resources') }}" class="text-xs font-bold text-accent-blue hover:underline flex items-center gap-1">
                    <span>View Reading Lists &rarr;</span>
                </a>
            </div>
        </div>

        <!-- Innovation Challenge -->
        <div class="bg-white rounded-3xl p-8 border border-slate-100 shadow-sm hover:shadow-md transition-all bento-card flex flex-col justify-between">
            <div class="space-y-3">
                <div class="w-12 h-12 rounded-2xl bg-rose-50 text-accent-rose flex items-center justify-center text-2xl font-bold">
                    🚀
                </div>
                <h3 class="text-2xl font-extrabold text-slate-900">Innovation Challenge</h3>
                <span class="text-[11px] font-bold uppercase tracking-wider text-rose-600 block">Annual Hackathon Sprint</span>
                <p class="text-xs text-slate-600 leading-relaxed">
                    An annual hackathon bringing together college students, designers, and civic mentors to build sustainable prototypes addressing city waste, water, and education challenges.
                </p>
            </div>
            <div class="pt-6 border-t border-slate-50 mt-4">
                <a href="{{ route('events.index') }}" class="text-xs font-bold text-accent-rose hover:underline flex items-center gap-1">
                    <span>See Challenge Archive &rarr;</span>
                </a>
            </div>
        </div>

        <!-- Join the Community CTA -->
        <div class="bg-gradient-to-br from-brand-600 to-teal-800 text-white rounded-3xl p-8 shadow-md flex flex-col justify-between bento-card">
            <div class="space-y-3">
                <span class="text-xs font-bold uppercase tracking-wider text-brand-200">Get Involved</span>
                <h3 class="text-2xl font-extrabold text-white">Be Part of the Yuvalay Family</h3>
                <p class="text-xs text-brand-100 leading-relaxed">
                    Join regular offline sessions in Vadodara, participate in weekend volunteer drives, and build lifelong friendships.
                </p>
            </div>
            <div class="pt-6">
                <a href="{{ route('contact', ['role' => 'student']) }}" class="px-5 py-2.5 rounded-full bg-white text-brand-800 font-bold text-xs hover:bg-brand-50 transition-colors inline-block shadow-sm">
                    Connect With Us &rarr;
                </a>
            </div>
        </div>

    </div>

</div>
@endsection
