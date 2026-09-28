@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-16">

    <!-- 1. HERO BENTO SECTION (Directly matching PDF 1 & Stitch Reference) -->
    <section class="space-y-6">
        <!-- Top Pill Tag -->
        <div>
            <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full text-xs font-bold tracking-wider uppercase bg-brand-100 text-brand-800 border border-brand-200 shadow-sm">
                ✦ EMPOWER YOUR LIFE
            </span>
        </div>

        <!-- Big Hero Headline & CTAs Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
            <div class="lg:col-span-7 space-y-6">
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-slate-900 leading-[1.12]">
                    Where Young Minds<br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-600 to-accent-teal">Discover Their Potential.</span>
                </h1>
                <p class="text-lg text-slate-600 max-w-xl leading-relaxed">
                    Build future-ready skills, confidence and meaningful connections through practical learning, industry mentorship, and transformative community experiences in Vadodara.
                </p>
                <div class="flex flex-wrap items-center gap-3 pt-2">
                    <a href="{{ route('programs.index') }}" class="inline-flex items-center gap-2 px-6 py-3.5 rounded-full bg-brand-600 hover:bg-brand-700 text-white font-bold text-sm shadow-lg shadow-brand-500/25 transition-all hover:scale-105 active:scale-95">
                        <span>Explore Programs</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                    <a href="{{ route('contact', ['role' => 'student']) }}" class="inline-flex items-center gap-2 px-6 py-3.5 rounded-full bg-white hover:bg-slate-50 text-slate-800 font-bold text-sm border border-slate-200 shadow-sm transition-all hover:border-slate-300">
                        <span>Join YuVALAY</span>
                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                    <a href="{{ route('volunteer') }}" class="inline-flex items-center gap-2 px-5 py-3.5 rounded-full bg-brand-50 hover:bg-brand-100 text-brand-700 font-bold text-sm transition-all">
                        <span>Become a Volunteer &rarr;</span>
                    </a>
                </div>

                <div class="flex items-center gap-3 pt-2 text-xs font-semibold text-slate-500">
                    <span class="flex h-2 w-2 relative">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                    </span>
                    <span>Trusted by 25,000+ students, 150+ institutions &amp; 300+ mentors across Gujarat</span>
                </div>
            </div>

            <!-- Hero Image Collage Card -->
            <div class="lg:col-span-5 relative">
                <div class="relative rounded-3xl overflow-hidden shadow-2xl border-4 border-white bg-slate-100 aspect-[4/3] group">
                    <img src="https://images.unsplash.com/photo-1529156069898-49953e39b3ac?auto=format&fit=crop&w=1000&q=80" alt="Yuvalay youth learning together" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 via-transparent to-transparent"></div>
                    
                    <!-- Floating Badge -->
                    <div class="absolute bottom-4 left-4 right-4 bg-white/95 backdrop-blur-md p-3.5 rounded-2xl shadow-lg border border-white/50 flex items-center justify-between">
                        <div class="flex items-center gap-2.5">
                            <div class="w-8 h-8 rounded-full bg-brand-500 text-white flex items-center justify-center font-bold text-xs">
                                ✦
                            </div>
                            <div>
                                <p class="text-xs font-bold text-slate-800">Learn. Lead. Create.</p>
                                <p class="text-[10px] text-slate-500">Practical &amp; value-based mentorship</p>
                            </div>
                        </div>
                        <a href="{{ route('about') }}" class="text-xs font-bold text-brand-600 hover:text-brand-700">Explore &rarr;</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- 2. BENTO CARDS ROW (Exact match to Option 3 Bento layout) -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-5 pt-4 items-stretch">
            
            <!-- Large Teal Bento Card: "Your journey starts here" + 3 Stats -->
            <div class="lg:col-span-7 bg-gradient-to-br from-brand-700 via-brand-800 to-teal-900 text-white rounded-3xl p-7 sm:p-8 shadow-lg relative overflow-hidden bento-card flex flex-col justify-between">
                <div class="relative z-10 space-y-2">
                    <h3 class="text-2xl sm:text-3xl font-extrabold tracking-tight">Your journey starts here.</h3>
                    <p class="text-brand-100 text-sm">Learn skills. Meet people. Create lasting impact.</p>
                </div>

                <div class="grid grid-cols-3 gap-3 pt-8 relative z-10">
                    @foreach($stats->take(3) as $st)
                    <div class="bg-white/10 backdrop-blur-md rounded-2xl p-3.5 border border-white/10">
                        <div class="flex items-center gap-1.5 text-brand-300 text-xs font-semibold mb-1">
                            <span class="w-1.5 h-1.5 rounded-full bg-brand-400"></span>
                            <span class="truncate">{{ $st->label }}</span>
                        </div>
                        <div class="text-2xl sm:text-3xl font-extrabold tracking-tight text-white">{{ $st->value }}</div>
                    </div>
                    @endforeach
                </div>

                <!-- Abstract Decorative Circle -->
                <div class="absolute -right-16 -bottom-16 w-56 h-56 rounded-full bg-brand-500/20 blur-2xl pointer-events-none"></div>
            </div>

            <!-- Right 5-Column Wrapper for 01 LEARN and 02 CONNECT -->
            <div class="lg:col-span-5 grid grid-cols-1 sm:grid-cols-2 gap-5">
                
                <!-- Bento Card 01: LEARN -->
                <div class="bg-white rounded-3xl p-7 border border-slate-100 shadow-sm hover:shadow-md transition-all bento-card flex flex-col justify-between h-full">
                    <div>
                        <span class="inline-block px-2.5 py-0.5 rounded-full text-xs font-extrabold tracking-wider uppercase text-brand-700 bg-brand-50 border border-brand-200/60 mb-3">01</span>
                        <h4 class="text-2xl font-black text-slate-900 tracking-tight">LEARN</h4>
                        <p class="text-xs text-slate-500 font-medium mt-1.5 leading-relaxed">Skills for tomorrow, ready today.</p>
                    </div>
                    <div class="pt-6">
                        <a href="{{ route('programs.index') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-brand-600 hover:text-brand-700 group">
                            <span>All Courses</span>
                            <svg class="w-3.5 h-3.5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Bento Card 02: CONNECT -->
                <div class="bg-white rounded-3xl p-7 border border-slate-100 shadow-sm hover:shadow-md transition-all bento-card flex flex-col justify-between h-full">
                    <div>
                        <span class="inline-block px-2.5 py-0.5 rounded-full text-xs font-extrabold tracking-wider uppercase text-accent-teal bg-teal-50 border border-teal-200/60 mb-3">02</span>
                        <h4 class="text-2xl font-black text-slate-900 tracking-tight">CONNECT</h4>
                        <p class="text-xs text-slate-500 font-medium mt-1.5 leading-relaxed">A community that grows together.</p>
                    </div>
                    <div class="pt-6">
                        <a href="{{ route('community') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-accent-teal hover:underline group">
                            <span>Discover Initiatives</span>
                            <svg class="w-3.5 h-3.5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>

            </div>

        </div>

        <!-- 3. LOWER BENTO ROW: For Students, For Professionals, Next Up Event Card -->
        <div class="grid grid-cols-1 md:grid-cols-12 gap-5">
            
            <!-- For Students -->
            <div class="md:col-span-4 bg-white rounded-3xl p-6 border border-slate-100 shadow-sm bento-card flex flex-col justify-between">
                <div class="space-y-1">
                    <span class="inline-block px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider bg-purple-50 text-accent-purple mb-2">Pathway</span>
                    <h4 class="text-xl font-extrabold text-slate-900">For Students</h4>
                    <p class="text-xs text-slate-500">Learn, build confidence, and prepare for your dream career.</p>
                </div>
                <div class="pt-6">
                    <a href="{{ route('contact', ['role' => 'student']) }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-purple-600 hover:bg-purple-700 text-white font-bold text-xs transition-colors">
                        <span>Discover &rarr;</span>
                    </a>
                </div>
            </div>

            <!-- For Professionals / Faculty -->
            <div class="md:col-span-4 bg-white rounded-3xl p-6 border border-slate-100 shadow-sm bento-card flex flex-col justify-between">
                <div class="space-y-1">
                    <span class="inline-block px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider bg-emerald-50 text-brand-700 mb-2">Advance</span>
                    <h4 class="text-xl font-extrabold text-slate-900">For Professionals</h4>
                    <p class="text-xs text-slate-500">Upskill in AI, leadership, management, and executive presence.</p>
                </div>
                <div class="pt-6">
                    <a href="{{ route('programs.index') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-brand-600 hover:bg-brand-700 text-white font-bold text-xs transition-colors">
                        <span>Explore &rarr;</span>
                    </a>
                </div>
            </div>

            <!-- Next Up Event Card (Green Gradient Card from PDF Reference) -->
            <div class="md:col-span-4 bg-gradient-to-br from-brand-600 to-emerald-700 text-white rounded-3xl p-6 shadow-md bento-card flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-[10px] font-extrabold uppercase tracking-wider text-brand-200">Next Up!</span>
                        <span class="px-2 py-0.5 rounded-full bg-white/20 text-[10px] font-bold uppercase">{{ $nextEvent->mode ?? 'Online' }}</span>
                    </div>
                    <h4 class="text-lg font-bold text-white leading-snug line-clamp-2">
                        {{ $nextEvent->title ?? 'Career Clarity Workshop' }}
                    </h4>
                    <p class="text-xs text-brand-100 mt-2 flex items-center gap-2">
                        <span>📅 {{ $nextEvent->date_str ?? '24 May 2026' }}</span>
                        <span>•</span>
                        <span>⏰ {{ $nextEvent->time_str ?? 'Online' }}</span>
                    </p>
                </div>
                <div class="pt-5">
                    @if($nextEvent)
                        <a href="{{ route('events.show', $nextEvent->slug) }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-white text-brand-800 hover:bg-brand-50 font-bold text-xs shadow-sm transition-colors">
                            <span>View Event &rarr;</span>
                        </a>
                    @else
                        <a href="{{ route('events.index') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-white text-brand-800 hover:bg-brand-50 font-bold text-xs shadow-sm transition-colors">
                            <span>View Calendar &rarr;</span>
                        </a>
                    @endif
                </div>
            </div>

        </div>
    </section>

    <!-- 4. IMPACT COUNTERS (Full 6-pillar stats) -->
    <section class="bg-white rounded-3xl p-8 sm:p-10 border border-slate-100 shadow-sm space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-brand-600">Verified Journey</span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 mt-1">Our Impact in Numbers</h2>
            </div>
            <p class="text-xs text-slate-500 max-w-sm">Every statistic represents real lives transformed, careers unlocked, and communities strengthened in Vadodara and across Gujarat.</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 pt-4 border-t border-slate-100">
            @foreach($stats as $stat)
            <div class="p-4 rounded-2xl bg-[#F8FAF9] hover:bg-brand-50/50 transition-colors">
                <div class="text-2xl sm:text-3xl font-extrabold text-brand-700 tracking-tight">{{ $stat->value }}</div>
                <div class="text-xs font-bold text-slate-800 mt-1">{{ $stat->label }}</div>
                <div class="text-[11px] text-slate-500 mt-1 line-clamp-2">{{ $stat->description }}</div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- 5. "FIND WHAT'S RIGHT FOR YOU" - Tailored Audience Pathways -->
    <section class="space-y-6">
        <div class="text-center max-w-2xl mx-auto space-y-2">
            <span class="text-xs font-bold uppercase tracking-wider text-brand-600">Tailored Journeys</span>
            <h2 class="text-3xl font-extrabold text-slate-900">Find What's Right for You</h2>
            <p class="text-sm text-slate-600">Choose your role to explore how Yuvalay can partner with your journey.</p>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4">
            <!-- Student -->
            <a href="{{ route('contact', ['role' => 'student']) }}" class="group bg-white rounded-2xl p-5 border border-slate-100 shadow-sm hover:border-purple-200 hover:shadow-md transition-all text-center flex flex-col items-center justify-between">
                <div class="w-12 h-12 rounded-2xl bg-purple-50 text-accent-purple flex items-center justify-center text-xl font-bold mb-3 group-hover:scale-110 transition-transform">🎓</div>
                <h4 class="text-sm font-bold text-slate-900">Students</h4>
                <p class="text-[11px] text-slate-500 mt-1 mb-3">Learn, grow and build your future.</p>
                <span class="text-xs font-semibold text-accent-purple group-hover:translate-x-1 transition-transform">Explore &rarr;</span>
            </a>

            <!-- Young Professionals -->
            <a href="{{ route('programs.index') }}" class="group bg-white rounded-2xl p-5 border border-slate-100 shadow-sm hover:border-emerald-200 hover:shadow-md transition-all text-center flex flex-col items-center justify-between">
                <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-brand-600 flex items-center justify-center text-xl font-bold mb-3 group-hover:scale-110 transition-transform">💼</div>
                <h4 class="text-sm font-bold text-slate-900">Young Professionals</h4>
                <p class="text-[11px] text-slate-500 mt-1 mb-3">Upskill, advance and achieve more.</p>
                <span class="text-xs font-semibold text-brand-600 group-hover:translate-x-1 transition-transform">Explore &rarr;</span>
            </a>

            <!-- Faculty / Institutions -->
            <a href="{{ route('contact', ['role' => 'institution']) }}" class="group bg-white rounded-2xl p-5 border border-slate-100 shadow-sm hover:border-amber-200 hover:shadow-md transition-all text-center flex flex-col items-center justify-between">
                <div class="w-12 h-12 rounded-2xl bg-amber-50 text-accent-amber flex items-center justify-center text-xl font-bold mb-3 group-hover:scale-110 transition-transform">🏛️</div>
                <h4 class="text-sm font-bold text-slate-900">Faculty Members</h4>
                <p class="text-[11px] text-slate-500 mt-1 mb-3">Teach, inspire and shape tomorrow.</p>
                <span class="text-xs font-semibold text-accent-amber group-hover:translate-x-1 transition-transform">Partner &rarr;</span>
            </a>

            <!-- Parents -->
            <a href="{{ route('contact', ['role' => 'student']) }}" class="group bg-white rounded-2xl p-5 border border-slate-100 shadow-sm hover:border-rose-200 hover:shadow-md transition-all text-center flex flex-col items-center justify-between">
                <div class="w-12 h-12 rounded-2xl bg-rose-50 text-accent-rose flex items-center justify-center text-xl font-bold mb-3 group-hover:scale-110 transition-transform">👨‍👩‍👧</div>
                <h4 class="text-sm font-bold text-slate-900">Parents</h4>
                <p class="text-[11px] text-slate-500 mt-1 mb-3">Support your child's growth journey.</p>
                <span class="text-xs font-semibold text-accent-rose group-hover:translate-x-1 transition-transform">Connect &rarr;</span>
            </a>

            <!-- Volunteers -->
            <a href="{{ route('volunteer') }}" class="group bg-white rounded-2xl p-5 border border-slate-100 shadow-sm hover:border-blue-200 hover:shadow-md transition-all text-center flex flex-col items-center justify-between">
                <div class="w-12 h-12 rounded-2xl bg-blue-50 text-accent-blue flex items-center justify-center text-xl font-bold mb-3 group-hover:scale-110 transition-transform">🤝</div>
                <h4 class="text-sm font-bold text-slate-900">Volunteers</h4>
                <p class="text-[11px] text-slate-500 mt-1 mb-3">Contribute, lead and create impact.</p>
                <span class="text-xs font-semibold text-accent-blue group-hover:translate-x-1 transition-transform">Apply &rarr;</span>
            </a>

            <!-- CSR Partners & Mentors -->
            <a href="{{ route('contact', ['role' => 'csr']) }}" class="group bg-white rounded-2xl p-5 border border-slate-100 shadow-sm hover:border-teal-200 hover:shadow-md transition-all text-center flex flex-col items-center justify-between">
                <div class="w-12 h-12 rounded-2xl bg-teal-50 text-accent-teal flex items-center justify-center text-xl font-bold mb-3 group-hover:scale-110 transition-transform">🌱</div>
                <h4 class="text-sm font-bold text-slate-900">CSR Partners</h4>
                <p class="text-[11px] text-slate-500 mt-1 mb-3">Collaborate for meaningful change.</p>
                <span class="text-xs font-semibold text-accent-teal group-hover:translate-x-1 transition-transform">Collaborate &rarr;</span>
            </a>
        </div>
    </section>

    <!-- 6. FEATURED PROGRAMS (Dynamic from Database) -->
    <section class="space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-brand-600">Core Programs</span>
                <h2 class="text-3xl font-extrabold text-slate-900 mt-1">Featured Programs &amp; Workshops</h2>
            </div>
            <a href="{{ route('programs.index') }}" class="inline-flex items-center gap-1.5 text-sm font-bold text-brand-600 hover:text-brand-700">
                <span>View all programs</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($featuredPrograms as $program)
            <div class="bg-white rounded-3xl overflow-hidden border border-slate-100 shadow-sm hover:shadow-md transition-all flex flex-col justify-between group">
                <div>
                    <div class="relative h-44 overflow-hidden bg-slate-100">
                        <img src="{{ $program->image_url }}" alt="{{ $program->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <span class="absolute top-3 left-3 px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-white/95 backdrop-blur-md text-brand-800 shadow-sm">
                            {{ $program->category }}
                        </span>
                    </div>
                    <div class="p-5 space-y-2">
                        <h3 class="font-extrabold text-slate-900 text-base leading-snug group-hover:text-brand-600 transition-colors">
                            {{ $program->title }}
                        </h3>
                        <p class="text-xs text-slate-500 line-clamp-2">
                            {{ $program->short_desc }}
                        </p>
                        <div class="pt-2 text-[11px] font-semibold text-slate-400 flex items-center gap-1.5">
                            <span>⏱️ {{ $program->duration }}</span>
                        </div>
                    </div>
                </div>
                <div class="p-5 pt-0 border-t border-slate-50 mt-4 flex items-center justify-between">
                    <a href="{{ route('programs.show', $program->slug) }}" class="text-xs font-bold text-brand-600 hover:text-brand-700 flex items-center gap-1">
                        <span>Details</span>
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                    <a href="{{ route('contact', ['role' => 'student']) }}" class="px-3 py-1.5 rounded-lg bg-brand-50 hover:bg-brand-100 text-brand-700 font-bold text-xs transition-colors">
                        Enroll
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- 7. ALUMNI SUCCESS STORIES (Bento Highlights) -->
    <section class="bg-gradient-to-br from-slate-900 to-slate-800 text-white rounded-3xl p-8 sm:p-12 shadow-xl space-y-8">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-brand-400">Transformations</span>
                <h2 class="text-3xl font-extrabold text-white mt-1">Voices of Yuvalay Alumni</h2>
            </div>
            <a href="{{ route('stories.index') }}" class="text-sm font-bold text-brand-400 hover:text-brand-300">Read all stories &rarr;</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($featuredStories as $story)
            <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 border border-white/10 flex flex-col justify-between space-y-4">
                <p class="text-slate-200 text-sm italic leading-relaxed">
                    "{{ $story->story_quote }}"
                </p>
                <div class="flex items-center gap-3 pt-2 border-t border-white/10">
                    <img src="{{ $story->avatar_url }}" alt="{{ $story->name }}" class="w-10 h-10 rounded-full object-cover border border-brand-400">
                    <div>
                        <h4 class="font-bold text-white text-sm">{{ $story->name }}</h4>
                        <p class="text-[11px] text-brand-300">{{ $story->role }} • {{ $story->organization }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- 8. FINAL CALL TO ACTION BENTO BANNER -->
    <section class="bg-gradient-to-r from-brand-600 via-emerald-600 to-accent-teal rounded-3xl p-8 sm:p-12 text-white shadow-xl relative overflow-hidden flex flex-col lg:flex-row items-center justify-between gap-8">
        <div class="relative z-10 space-y-3 max-w-xl text-center lg:text-left">
            <span class="px-3 py-1 rounded-full text-xs font-bold bg-white/20 text-white uppercase tracking-wider">Join The Movement</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Ready to unlock your true potential?</h2>
            <p class="text-brand-100 text-sm leading-relaxed">
                Whether you are a student seeking career clarity, an educator looking for institutional collaboration, or a corporate partner supporting youth empowerment — Yuvalay welcomes you.
            </p>
        </div>
        <div class="relative z-10 flex flex-wrap items-center gap-4">
            <a href="{{ route('contact', ['role' => 'student']) }}" class="px-7 py-3.5 rounded-full bg-white text-brand-800 font-extrabold text-sm shadow-lg hover:bg-brand-50 transition-all hover:scale-105">
                Join YuVALAY Today
            </a>
            <a href="{{ route('volunteer') }}" class="px-6 py-3.5 rounded-full bg-brand-800/40 hover:bg-brand-800/60 border border-white/20 text-white font-bold text-sm transition-all">
                Become a Volunteer
            </a>
        </div>
    </section>

</div>
@endsection
