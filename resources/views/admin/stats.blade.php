@extends('layouts.admin')

@section('page_title', 'Live Impact Statistics Editor')

@section('content')
<div class="space-y-6">

    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-2 border-b border-slate-200">
        <div>
            <h2 class="text-2xl font-extrabold text-slate-900 tracking-tight">Homepage Impact Counters</h2>
            <p class="text-xs text-slate-500 mt-0.5">Edit and manage the 6 key verified metrics showcased across Yuvalay's public Bento Grid.</p>
        </div>
        <div class="flex items-center gap-3">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">
                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                <span>Live Database Sync</span>
            </span>
            <a href="{{ route('home') }}" target="_blank" class="px-4 py-2 rounded-xl bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs flex items-center gap-1.5 transition-all shadow-sm">
                <span>View on Homepage</span>
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
            </a>
        </div>
    </div>

    <!-- Main Two-Column Layout Utilizing Full Screen Width -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        
        <!-- Left Section (7-8 cols): The 6 Impact Metric Upgradation Boxes -->
        <div class="lg:col-span-7 xl:col-span-8 space-y-4">
            <div class="flex items-center justify-between">
                <h3 class="font-extrabold text-slate-900 text-sm tracking-wide uppercase text-slate-500">Active Metric Upgradation Cards</h3>
                <span class="text-xs text-slate-400">Total Pillars: 6</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                @foreach($stats as $stat)
                <div class="bg-white rounded-3xl p-6 border border-slate-200/80 shadow-sm hover:shadow-md transition-all space-y-4 flex flex-col justify-between">
                    
                    <!-- Header with Icon & Current Value Badge -->
                    <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                        <div class="flex items-center gap-2.5">
                            <div class="w-9 h-9 rounded-xl bg-brand-50 text-brand-700 flex items-center justify-center font-bold text-sm">
                                @if($stat->key_name === 'years') 🏆
                                @elseif($stat->key_name === 'youth') 👥
                                @elseif($stat->key_name === 'sessions') 📅
                                @elseif($stat->key_name === 'institutions') 🏛️
                                @elseif($stat->key_name === 'mentors') 🌟
                                @else 🤝
                                @endif
                            </div>
                            <div>
                                <span class="text-[10px] font-extrabold uppercase tracking-wider text-slate-400 block">Pillar #{{ $stat->order_index }}</span>
                                <h4 class="font-extrabold text-slate-900 text-sm">{{ $stat->label }}</h4>
                            </div>
                        </div>
                        <div class="text-right">
                            <span class="px-2.5 py-1 rounded-full text-xs font-black bg-emerald-50 text-emerald-700 border border-emerald-200">
                                {{ $stat->value }}
                            </span>
                        </div>
                    </div>

                    <!-- Edit Form -->
                    <form action="{{ route('admin.stats.update', $stat->id) }}" method="POST" class="space-y-3 text-xs">
                        @csrf
                        @method('PUT')

                        <div>
                            <label class="block font-bold text-slate-700 uppercase mb-1 text-[11px]">Display Value (Counter) *</label>
                            <input type="text" name="value" required value="{{ old('value', $stat->value) }}" placeholder="e.g. 25,000+" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 text-sm font-black text-slate-900 focus:ring-2 focus:ring-emerald-500 focus:outline-none bg-slate-50/50">
                        </div>

                        <div>
                            <label class="block font-bold text-slate-700 uppercase mb-1 text-[11px]">Statistic Label *</label>
                            <input type="text" name="label" required value="{{ old('label', $stat->label) }}" placeholder="e.g. Youth Empowered" class="w-full px-3.5 py-2 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                        </div>

                        <div>
                            <label class="block font-bold text-slate-700 uppercase mb-1 text-[11px]">Subtitle / Context Description</label>
                            <textarea name="description" rows="2" placeholder="Brief context for this metric..." class="w-full px-3.5 py-2 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-emerald-500 focus:outline-none">{{ old('description', $stat->description) }}</textarea>
                        </div>

                        <div class="pt-2 flex justify-end">
                            <button type="submit" class="w-full sm:w-auto px-5 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs shadow-sm transition-all hover:scale-105 active:scale-95 flex items-center justify-center gap-1.5">
                                <span>Save Changes</span>
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            </button>
                        </div>
                    </form>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Right Section (4-5 cols): Live Bento Simulation & Metrics Hub -->
        <div class="lg:col-span-5 xl:col-span-4 space-y-6 lg:sticky lg:top-24">
            
            <!-- Real-Time Homepage Bento Card Simulation -->
            <div class="bg-gradient-to-br from-brand-700 via-brand-800 to-teal-900 text-white rounded-3xl p-6 sm:p-7 shadow-xl border border-emerald-600/40 relative overflow-hidden space-y-5">
                
                <div class="flex items-center justify-between relative z-10">
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-black uppercase tracking-wider bg-white/20 text-white backdrop-blur-md">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-ping"></span>
                        <span>Live Homepage Simulation</span>
                    </span>
                    <span class="text-[10px] text-brand-200">Public Hero Bento</span>
                </div>

                <div class="space-y-1 relative z-10">
                    <h3 class="text-xl sm:text-2xl font-extrabold tracking-tight">Your journey starts here.</h3>
                    <p class="text-brand-100 text-xs">Learn skills. Meet people. Create lasting impact.</p>
                </div>

                <!-- 3 Top Stats Simulation inside the card -->
                <div class="grid grid-cols-3 gap-2.5 pt-2 relative z-10">
                    @foreach($stats->take(3) as $st)
                    <div class="bg-white/10 backdrop-blur-md rounded-2xl p-2.5 sm:p-3 border border-white/10 text-center">
                        <div class="text-[10px] text-brand-300 font-bold truncate mb-0.5">
                            {{ $st->label }}
                        </div>
                        <div class="text-lg sm:text-xl font-black text-white tracking-tight">
                            {{ $stat->where('key_name', $st->key_name)->first()->value ?? $st->value }}
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Decorative blur circle -->
                <div class="absolute -right-12 -bottom-12 w-44 h-44 rounded-full bg-brand-500/20 blur-2xl pointer-events-none"></div>
            </div>

            <!-- Impact Section 6-Pillar Preview Card -->
            <div class="bg-white rounded-3xl p-6 border border-slate-200/80 shadow-sm space-y-4">
                <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                    <div>
                        <h4 class="font-extrabold text-slate-900 text-sm">Full 6-Pillar Overview</h4>
                        <p class="text-[11px] text-slate-500">As shown on the "Our Impact in Numbers" section</p>
                    </div>
                    <span class="text-xs font-bold text-emerald-600">Active</span>
                </div>

                <div class="grid grid-cols-2 gap-3 text-xs">
                    @foreach($stats as $st)
                    <div class="p-3 rounded-2xl bg-[#F8FAF9] border border-slate-100 space-y-1">
                        <div class="text-lg font-black text-brand-700 tracking-tight">{{ $st->value }}</div>
                        <div class="font-bold text-slate-800 text-[11px] truncate">{{ $st->label }}</div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Value & Management Tips Card -->
            <div class="bg-emerald-50/70 rounded-3xl p-6 border border-emerald-200/60 space-y-3">
                <div class="flex items-center gap-2 text-emerald-800 font-bold text-xs uppercase tracking-wider">
                    <span>💡</span>
                    <span>Admin Tips for Counter Updates</span>
                </div>
                <ul class="text-xs text-slate-600 space-y-2 leading-relaxed">
                    <li class="flex items-start gap-2">
                        <span class="text-emerald-600 font-bold mt-0.5">✓</span>
                        <span>Use a plus sign (e.g. <strong>25,000+</strong> or <strong>12+</strong>) to signify ongoing growth.</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="text-emerald-600 font-bold mt-0.5">✓</span>
                        <span>Keep labels under 4 words so they fit on both desktop and mobile viewports.</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="text-emerald-600 font-bold mt-0.5">✓</span>
                        <span>Changes take effect immediately on public pages without clearing server cache.</span>
                    </li>
                </ul>
            </div>

        </div>

    </div>

</div>
@endsection
