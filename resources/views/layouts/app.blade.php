<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Yuvalay - Developing Youth, Building Future | Vadodara' }}</title>
    
    <!-- Primary SEO Meta Tags -->
    <meta name="title" content="{{ $title ?? 'Yuvalay - Developing Youth, Building Future | Vadodara' }}">
    <meta name="description" content="{{ $metaDescription ?? 'Yuvalay empowers youth with future-ready skills, career clarity, leadership development, innovation labs, and community mentorship in Vadodara, Gujarat.' }}">
    <meta name="keywords" content="Yuvalay, Youth Development, Vadodara, Skill Building, Career Clarity, Leadership Lab, MakerSpace, Mentorship, NGO, Gujarat Youth">
    <meta name="author" content="Yuvalay Individual Development Center">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph / Facebook / WhatsApp -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="Yuvalay">
    <meta property="og:title" content="{{ $title ?? 'Yuvalay - Developing Youth, Building Future' }}">
    <meta property="og:description" content="{{ $metaDescription ?? 'Empowering young minds with future-ready skills, meaningful experiences, inspiring mentors, and a vibrant community.' }}">
    <meta property="og:image" content="{{ $ogImage ?? 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=1200&q=80' }}">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="{{ $title ?? 'Yuvalay - Developing Youth, Building Future' }}">
    <meta name="twitter:description" content="{{ $metaDescription ?? 'Empowering young minds with future-ready skills, meaningful experiences, inspiring mentors, and a vibrant community.' }}">
    <meta name="twitter:image" content="{{ $ogImage ?? 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=1200&q=80' }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@500;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS (CDN with custom Bento palette) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        display: ['"Space Grotesk"', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            50: '#ecfdf5',
                            100: '#d1fae5',
                            200: '#a7f3d0',
                            300: '#6ee7b7',
                            400: '#34d399',
                            500: '#10b981', // Emerald Primary
                            600: '#059669',
                            700: '#047857',
                            800: '#065f46',
                            900: '#064e3b',
                        },
                        accent: {
                            purple: '#6366f1',
                            amber: '#f59e0b',
                            rose: '#f43f5e',
                            teal: '#0d9488',
                            blue: '#0284c7'
                        }
                    },
                    borderRadius: {
                        '4xl': '2rem',
                        '5xl': '2.5rem',
                    }
                }
            }
        }
    </script>

    <!-- Alpine.js (Lightweight interactive JS) -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.5/dist/cdn.min.js"></script>

    <!-- Schema.org JSON-LD Structured Data for SEO -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "NGO",
      "name": "Yuvalay Individual Development Center",
      "url": "https://www.yuvalay.org",
      "logo": "https://www.yuvalay.org/images/yuvalay-logo.png",
      "description": "Yuvalay empowers youth with future-ready skills, career clarity, leadership development, innovation labs, and community mentorship.",
      "address": {
        "@type": "PostalAddress",
        "addressLocality": "Vadodara",
        "addressRegion": "Gujarat",
        "addressCountry": "IN"
      },
      "sameAs": [
        "https://www.facebook.com/yuvalay",
        "https://www.instagram.com/yuvalay",
        "https://www.youtube.com/yuvalay",
        "https://www.linkedin.com/company/yuvalay"
      ]
    }
    </script>
    @stack('schema')

    <style>
        [x-cloak] { display: none !important; }
        .bento-card {
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .bento-card:hover {
            transform: translateY(-4px);
        }
    </style>
</head>
<body class="bg-[#F8FAF9] text-slate-800 antialiased font-sans flex flex-col min-h-screen">

    <!-- Top Announcement Bar -->
    <div class="bg-gradient-to-r from-brand-700 via-brand-600 to-accent-teal text-white text-xs font-medium py-2 px-4 text-center">
        <div class="max-w-7xl mx-auto flex items-center justify-center gap-2">
            <span class="inline-block bg-white/20 text-white px-2 py-0.5 rounded-full text-[10px] uppercase font-bold tracking-wider">Upcoming</span>
            <span>Next session: <strong>Career Clarity &amp; Readiness Workshop</strong> • Register free online</span>
            <a href="{{ route('events.index') }}" class="underline hover:text-brand-100 font-semibold ml-1">View Details &rarr;</a>
        </div>
    </div>

    <!-- Navigation Header -->
    <header x-data="{ mobileMenuOpen: false }" class="sticky top-0 z-50 bg-white/90 backdrop-blur-md border-b border-emerald-50">
        <div class="w-full px-4 sm:px-6 lg:px-8 xl:px-12">
            <div class="flex items-center justify-between h-20 gap-3 2xl:gap-6">
                
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center gap-3 group shrink-0">
                    <div class="w-10 h-10 rounded-2xl bg-gradient-to-br from-brand-500 to-accent-teal flex items-center justify-center text-white font-bold text-xl shadow-md shadow-brand-500/20 group-hover:scale-105 transition-transform shrink-0">
                        Y
                    </div>
                    <div class="shrink-0">
                        <span class="font-extrabold text-2xl tracking-tight text-slate-900 group-hover:text-brand-600 transition-colors">YUVALAY</span>
                        <p class="text-[10px] tracking-widest font-semibold uppercase text-slate-400">Developing Youth. Building Future.</p>
                    </div>
                </a>

                <!-- Desktop Navigation Links -->
                <nav class="hidden lg:flex items-center flex-nowrap gap-1 xl:gap-1.5 2xl:gap-2.5">
                    <a href="{{ route('home') }}" class="px-2.5 xl:px-3 py-2 rounded-xl text-xs xl:text-sm font-semibold whitespace-nowrap shrink-0 transition-colors {{ request()->routeIs('home') ? 'text-brand-600 bg-brand-50' : 'text-slate-600 hover:text-brand-600 hover:bg-slate-50' }}">Home</a>
                    <a href="{{ route('about') }}" class="px-2.5 xl:px-3 py-2 rounded-xl text-xs xl:text-sm font-semibold whitespace-nowrap shrink-0 transition-colors {{ request()->routeIs('about') ? 'text-brand-600 bg-brand-50' : 'text-slate-600 hover:text-brand-600 hover:bg-slate-50' }}">About Us</a>
                    <a href="{{ route('programs.index') }}" class="px-2.5 xl:px-3 py-2 rounded-xl text-xs xl:text-sm font-semibold whitespace-nowrap shrink-0 transition-colors {{ request()->routeIs('programs.*') ? 'text-brand-600 bg-brand-50' : 'text-slate-600 hover:text-brand-600 hover:bg-slate-50' }}">Programs</a>
                    <a href="{{ route('events.index') }}" class="px-2.5 xl:px-3 py-2 rounded-xl text-xs xl:text-sm font-semibold whitespace-nowrap shrink-0 transition-colors {{ request()->routeIs('events.*') ? 'text-brand-600 bg-brand-50' : 'text-slate-600 hover:text-brand-600 hover:bg-slate-50' }}">Events</a>
                    <a href="{{ route('community') }}" class="px-2.5 xl:px-3 py-2 rounded-xl text-xs xl:text-sm font-semibold whitespace-nowrap shrink-0 transition-colors {{ request()->routeIs('community') ? 'text-brand-600 bg-brand-50' : 'text-slate-600 hover:text-brand-600 hover:bg-slate-50' }}">Community</a>
                    <a href="{{ route('mentors.index') }}" class="px-2.5 xl:px-3 py-2 rounded-xl text-xs xl:text-sm font-semibold whitespace-nowrap shrink-0 transition-colors {{ request()->routeIs('mentors.*') ? 'text-brand-600 bg-brand-50' : 'text-slate-600 hover:text-brand-600 hover:bg-slate-50' }}">Mentors</a>
                    <a href="{{ route('stories.index') }}" class="px-2.5 xl:px-3 py-2 rounded-xl text-xs xl:text-sm font-semibold whitespace-nowrap shrink-0 transition-colors {{ request()->routeIs('stories.*') ? 'text-brand-600 bg-brand-50' : 'text-slate-600 hover:text-brand-600 hover:bg-slate-50' }}">Success Stories</a>
                    <a href="{{ route('volunteer') }}" class="px-2.5 xl:px-3 py-2 rounded-xl text-xs xl:text-sm font-semibold whitespace-nowrap shrink-0 transition-colors {{ request()->routeIs('volunteer') ? 'text-brand-600 bg-brand-50' : 'text-slate-600 hover:text-brand-600 hover:bg-slate-50' }}">Volunteer</a>
                    <a href="{{ route('resources') }}" class="px-2.5 xl:px-3 py-2 rounded-xl text-xs xl:text-sm font-semibold whitespace-nowrap shrink-0 transition-colors {{ request()->routeIs('resources') ? 'text-brand-600 bg-brand-50' : 'text-slate-600 hover:text-brand-600 hover:bg-slate-50' }}">Resources</a>
                </nav>

                <!-- Actions: Contact & Join -->
                <div class="hidden lg:flex items-center gap-2 xl:gap-3 shrink-0">
                    <a href="{{ route('contact') }}" class="text-xs xl:text-sm font-semibold whitespace-nowrap text-slate-700 hover:text-brand-600 px-2.5 xl:px-3 py-2">Contact</a>
                    <a href="{{ route('contact', ['role' => 'student']) }}" class="whitespace-nowrap inline-flex items-center gap-2 px-4 xl:px-5 py-2.5 rounded-full bg-brand-600 hover:bg-brand-700 text-white font-semibold text-xs xl:text-sm shadow-md shadow-brand-500/25 transition-all hover:scale-105 active:scale-95">
                        <span class="whitespace-nowrap">Join YuVALAY</span>
                        <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>

                <!-- Mobile Hamburger Button -->
                <div class="flex lg:hidden items-center gap-2">
                    <a href="{{ route('contact') }}" class="px-3 py-1.5 rounded-full bg-brand-50 text-brand-700 font-semibold text-xs whitespace-nowrap">Join</a>
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="p-2 rounded-xl text-slate-600 hover:bg-slate-100">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-show="!mobileMenuOpen">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-show="mobileMenuOpen" x-cloak>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Drawer Menu -->
        <div x-show="mobileMenuOpen" x-cloak class="lg:hidden bg-white border-b border-slate-100 px-4 pt-2 pb-6 space-y-2">
            <a href="{{ route('home') }}" class="block px-3 py-2 rounded-lg font-medium text-slate-700 hover:bg-brand-50">Home</a>
            <a href="{{ route('about') }}" class="block px-3 py-2 rounded-lg font-medium text-slate-700 hover:bg-brand-50">About Us</a>
            <a href="{{ route('programs.index') }}" class="block px-3 py-2 rounded-lg font-medium text-slate-700 hover:bg-brand-50">Programs & Courses</a>
            <a href="{{ route('events.index') }}" class="block px-3 py-2 rounded-lg font-medium text-slate-700 hover:bg-brand-50">Events Calendar</a>
            <a href="{{ route('community') }}" class="block px-3 py-2 rounded-lg font-medium text-slate-700 hover:bg-brand-50">Community Initiatives</a>
            <a href="{{ route('mentors.index') }}" class="block px-3 py-2 rounded-lg font-medium text-slate-700 hover:bg-brand-50">Mentors & Faculty</a>
            <a href="{{ route('stories.index') }}" class="block px-3 py-2 rounded-lg font-medium text-slate-700 hover:bg-brand-50">Success Stories</a>
            <a href="{{ route('volunteer') }}" class="block px-3 py-2 rounded-lg font-medium text-slate-700 hover:bg-brand-50">Volunteer with Us</a>
            <a href="{{ route('resources') }}" class="block px-3 py-2 rounded-lg font-medium text-slate-700 hover:bg-brand-50">Digital Resource Centre</a>
            <a href="{{ route('gallery') }}" class="block px-3 py-2 rounded-lg font-medium text-slate-700 hover:bg-brand-50">Visual Gallery</a>
            <a href="{{ route('contact') }}" class="block px-3 py-2 rounded-lg font-medium text-slate-700 hover:bg-brand-50">Contact & Join Forms</a>
            <div class="pt-4 border-t border-slate-100 flex gap-2">
                <a href="{{ route('contact') }}" class="flex-1 text-center py-2.5 rounded-xl bg-brand-600 text-white font-semibold text-sm">Join YuVALAY</a>
                <a href="{{ route('admin.login') }}" class="px-4 py-2.5 rounded-xl bg-slate-100 text-slate-700 text-sm font-semibold">Staff Login</a>
            </div>
        </div>
    </header>

    <!-- Global Alert Banners -->
    @if(session('success'))
        <div x-data="{ show: true }" x-show="show" class="bg-emerald-500 text-white px-4 py-3 shadow-md">
            <div class="max-w-7xl mx-auto flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    <span class="font-medium text-sm">{{ session('success') }}</span>
                </div>
                <button @click="show = false" class="text-emerald-100 hover:text-white">&times;</button>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div x-data="{ show: true }" x-show="show" class="bg-rose-500 text-white px-4 py-3 shadow-md">
            <div class="max-w-7xl mx-auto flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                    <span class="font-medium text-sm">{{ session('error') }}</span>
                </div>
                <button @click="show = false" class="text-rose-100 hover:text-white">&times;</button>
            </div>
        </div>
    @endif

    <!-- Main Content Body -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Bento Modern Footer -->
    <footer class="bg-slate-900 text-slate-300 pt-16 pb-12 mt-20 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10 pb-12 border-b border-slate-800">
                
                <!-- Organization Info -->
                <div class="lg:col-span-2 space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-2xl bg-gradient-to-br from-brand-500 to-accent-teal flex items-center justify-center text-white font-bold text-xl">
                            Y
                        </div>
                        <span class="font-extrabold text-2xl text-white tracking-tight">YUVALAY</span>
                    </div>
                    <p class="text-slate-400 text-sm leading-relaxed max-w-sm">
                        Individual Development Center, Vadodara. Nurturing young minds with future-ready skills, leadership capability, ethical orientation, and real-world exposure for over 12+ years.
                    </p>
                    <div class="flex items-center gap-4 pt-2">
                        <a href="https://facebook.com" target="_blank" class="w-9 h-9 rounded-full bg-slate-800 hover:bg-brand-600 text-slate-300 hover:text-white flex items-center justify-center transition-colors">
                            <span class="sr-only">Facebook</span>
                            f
                        </a>
                        <a href="https://instagram.com" target="_blank" class="w-9 h-9 rounded-full bg-slate-800 hover:bg-brand-600 text-slate-300 hover:text-white flex items-center justify-center transition-colors">
                            <span class="sr-only">Instagram</span>
                            ig
                        </a>
                        <a href="https://linkedin.com" target="_blank" class="w-9 h-9 rounded-full bg-slate-800 hover:bg-brand-600 text-slate-300 hover:text-white flex items-center justify-center transition-colors">
                            <span class="sr-only">LinkedIn</span>
                            in
                        </a>
                        <a href="https://youtube.com" target="_blank" class="w-9 h-9 rounded-full bg-slate-800 hover:bg-brand-600 text-slate-300 hover:text-white flex items-center justify-center transition-colors">
                            <span class="sr-only">YouTube</span>
                            yt
                        </a>
                    </div>
                </div>

                <!-- Navigation Columns -->
                <div>
                    <h3 class="text-white text-sm font-bold uppercase tracking-wider mb-4">Explore</h3>
                    <ul class="space-y-2.5 text-sm">
                        <li><a href="{{ route('about') }}" class="hover:text-brand-400 transition-colors">About Yuvalay</a></li>
                        <li><a href="{{ route('programs.index') }}" class="hover:text-brand-400 transition-colors">Programs &amp; Courses</a></li>
                        <li><a href="{{ route('events.index') }}" class="hover:text-brand-400 transition-colors">Events &amp; Workshops</a></li>
                        <li><a href="{{ route('community') }}" class="hover:text-brand-400 transition-colors">Community Initiatives</a></li>
                        <li><a href="{{ route('mentors.index') }}" class="hover:text-brand-400 transition-colors">Faculty &amp; Mentors</a></li>
                        <li><a href="{{ route('stories.index') }}" class="hover:text-brand-400 transition-colors">Success Stories</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-white text-sm font-bold uppercase tracking-wider mb-4">Get Involved</h3>
                    <ul class="space-y-2.5 text-sm">
                        <li><a href="{{ route('contact', ['role' => 'student']) }}" class="hover:text-brand-400 transition-colors">Student Mentorship</a></li>
                        <li><a href="{{ route('volunteer') }}" class="hover:text-brand-400 transition-colors">Volunteer Programs</a></li>
                        <li><a href="{{ route('contact', ['role' => 'institution']) }}" class="hover:text-brand-400 transition-colors">Institutional Tie-ups</a></li>
                        <li><a href="{{ route('contact', ['role' => 'csr']) }}" class="hover:text-brand-400 transition-colors">CSR Partnerships</a></li>
                        <li><a href="{{ route('contact', ['role' => 'mentor']) }}" class="hover:text-brand-400 transition-colors">Become a Mentor</a></li>
                        <li><a href="{{ route('resources') }}" class="hover:text-brand-400 transition-colors">Resource Centre</a></li>
                    </ul>
                </div>

                <!-- Contact & Visit -->
                <div>
                    <h3 class="text-white text-sm font-bold uppercase tracking-wider mb-4">Campus &amp; Connect</h3>
                    <p class="text-xs text-slate-400 mb-2 leading-relaxed">
                        Yuvalay Center, Vadodara,<br>
                        Gujarat, India - 390001
                    </p>
                    <p class="text-xs text-slate-400 mb-1">
                        Email: <a href="mailto:info@yuvalay.org" class="text-brand-400 hover:underline">info@yuvalay.org</a>
                    </p>
                    <p class="text-xs text-slate-400 mb-4">
                        Phone: <a href="tel:+919825012345" class="text-brand-400 hover:underline">+91 98250 12345</a>
                    </p>
                    <div class="pt-2">
                        <a href="{{ route('admin.login') }}" class="text-[11px] text-slate-500 hover:text-slate-300 transition-colors flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                            <span>Staff Admin Access</span>
                        </a>
                    </div>
                </div>

            </div>

            <!-- Bottom Subfooter -->
            <div class="pt-8 flex flex-col sm:flex-row items-center justify-between text-xs text-slate-500 gap-4">
                <p>&copy; {{ date('Y') }} Yuvalay Individual Development Center. All rights reserved.</p>
                <div class="flex items-center gap-6">
                    <a href="{{ route('sitemap') }}" class="hover:text-slate-400">XML Sitemap</a>
                    <span>•</span>
                    <a href="{{ route('about') }}" class="hover:text-slate-400">Privacy &amp; Terms</a>
                    <span>•</span>
                    <span>Empower • Learn • Grow • Lead</span>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
