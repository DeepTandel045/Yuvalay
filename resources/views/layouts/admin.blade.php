<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin Dashboard' }} - Yuvalay Portal</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            500: '#10b981',
                            600: '#059669',
                            700: '#047857',
                        }
                    }
                }
            }
        }
    </script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.5/dist/cdn.min.js"></script>
</head>
<body class="bg-slate-50 text-slate-800 antialiased font-sans min-h-screen flex">

    <!-- Admin Sidebar -->
    <aside class="w-64 bg-slate-900 text-slate-300 flex flex-col justify-between hidden md:flex min-h-screen border-r border-slate-800">
        <div>
            <!-- Admin Logo Header -->
            <div class="h-20 flex items-center px-6 border-b border-slate-800 gap-3">
                <div class="w-9 h-9 rounded-xl bg-emerald-500 text-white font-extrabold flex items-center justify-center text-lg">
                    Y
                </div>
                <div>
                    <h1 class="font-extrabold text-white text-lg tracking-tight leading-tight">YUVALAY</h1>
                    <span class="text-[10px] text-emerald-400 font-bold uppercase tracking-wider block">Staff Portal (Option 3)</span>
                </div>
            </div>

            <!-- Navigation Links -->
            <nav class="p-4 space-y-1.5 text-xs font-semibold">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-emerald-600 text-white' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
                    <span>📊</span>
                    <span>Dashboard Overview</span>
                </a>

                <a href="{{ route('admin.enquiries.index') }}" class="flex items-center justify-between px-3 py-2.5 rounded-xl transition-colors {{ request()->routeIs('admin.enquiries.*') ? 'bg-emerald-600 text-white' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
                    <div class="flex items-center gap-3">
                        <span>📥</span>
                        <span>Central Enquiry Inbox</span>
                    </div>
                </a>

                <a href="{{ route('admin.events.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-colors {{ request()->routeIs('admin.events.*') ? 'bg-emerald-600 text-white' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
                    <span>📅</span>
                    <span>Events &amp; Registrations</span>
                </a>

                <a href="{{ route('admin.stories.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-colors {{ request()->routeIs('admin.stories.*') ? 'bg-emerald-600 text-white' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
                    <span>🌟</span>
                    <span>Success Stories</span>
                </a>

                <a href="{{ route('admin.mentors.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-colors {{ request()->routeIs('admin.mentors.*') ? 'bg-emerald-600 text-white' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
                    <span>🎓</span>
                    <span>Mentor Network</span>
                </a>

                <a href="{{ route('admin.stats.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-colors {{ request()->routeIs('admin.stats.*') ? 'bg-emerald-600 text-white' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
                    <span>📈</span>
                    <span>Live Impact Stats</span>
                </a>

                <div class="pt-4 border-t border-slate-800 mt-4">
                    <a href="{{ route('home') }}" target="_blank" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-400 hover:text-emerald-400 hover:bg-slate-800 transition-colors">
                        <span>🌐</span>
                        <span>View Live Website &rarr;</span>
                    </a>
                </div>
            </nav>
        </div>

        <!-- Footer / Logout -->
        <div class="p-4 border-t border-slate-800">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-bold text-white">{{ Auth::user()->name ?? 'Administrator' }}</p>
                    <p class="text-[10px] text-slate-400">{{ Auth::user()->email ?? 'admin@yuvalay.org' }}</p>
                </div>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" title="Logout" class="p-2 rounded-lg text-slate-400 hover:text-rose-400 hover:bg-slate-800">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- Main Content Area -->
    <div class="flex-1 flex flex-col min-h-screen overflow-x-hidden">
        
        <!-- Top Navbar -->
        <header class="h-20 bg-white border-b border-slate-200 px-6 sm:px-8 flex items-center justify-between">
            <div class="flex items-center gap-4">
                <a href="{{ route('admin.dashboard') }}" class="md:hidden font-extrabold text-slate-900">YUVALAY ADMIN</a>
                <h2 class="text-base font-bold text-slate-800 hidden md:block">@yield('page_title', 'Dashboard Overview')</h2>
            </div>

            <div class="flex items-center gap-4">
                <a href="{{ route('home') }}" target="_blank" class="text-xs font-semibold px-3 py-1.5 rounded-lg bg-emerald-50 text-emerald-700 hover:bg-emerald-100 transition-colors">
                    Public Website ↗
                </a>
            </div>
        </header>

        <!-- Flash alerts -->
        @if(session('success'))
        <div class="bg-emerald-500 text-white text-xs font-semibold px-6 py-2.5">
            {{ session('success') }}
        </div>
        @endif
        @if(session('error'))
        <div class="bg-rose-500 text-white text-xs font-semibold px-6 py-2.5">
            {{ session('error') }}
        </div>
        @endif

        <!-- Content Body -->
        <main class="flex-1 p-6 sm:p-8">
            @yield('content')
        </main>
    </div>

</body>
</html>
