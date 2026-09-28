@extends('layouts.admin')

@section('page_title', 'Dashboard Overview')

@section('content')
<div class="space-y-8">

    <!-- KPI Metric Cards Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        
        <!-- Enquiries Card -->
        <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Pending Enquiries</p>
                <div class="text-3xl font-extrabold text-amber-600 mt-1">{{ $pendingEnquiries }}</div>
                <p class="text-[11px] text-slate-500 mt-1">{{ $totalEnquiries }} total enquiries received</p>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center text-2xl font-bold">
                📥
            </div>
        </div>

        <!-- Upcoming Events Card -->
        <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Upcoming Events</p>
                <div class="text-3xl font-extrabold text-emerald-600 mt-1">{{ $upcomingEventsCount }}</div>
                <p class="text-[11px] text-slate-500 mt-1">Calendar active</p>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-2xl font-bold">
                📅
            </div>
        </div>

        <!-- Event Registrations Card -->
        <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Total Registrations</p>
                <div class="text-3xl font-extrabold text-purple-600 mt-1">{{ $totalRegistrations }}</div>
                <p class="text-[11px] text-slate-500 mt-1">Across all sessions</p>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-purple-50 text-purple-600 flex items-center justify-center text-2xl font-bold">
                🎟️
            </div>
        </div>

        <!-- Mentors & Stories Card -->
        <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Mentors &amp; Stories</p>
                <div class="text-3xl font-extrabold text-slate-900 mt-1">{{ $mentorsCount + $storiesCount }}</div>
                <p class="text-[11px] text-slate-500 mt-1">{{ $mentorsCount }} mentors, {{ $storiesCount }} stories</p>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-slate-100 text-slate-700 flex items-center justify-center text-2xl font-bold">
                👥
            </div>
        </div>

    </div>

    <!-- Recent Enquiries and Registrations Split -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        
        <!-- Recent Enquiries -->
        <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden flex flex-col justify-between">
            <div>
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div>
                        <h3 class="font-bold text-slate-900 text-sm">Recent Incoming Enquiries</h3>
                        <p class="text-[11px] text-slate-400">Latest submissions by students, partners &amp; volunteers</p>
                    </div>
                    <a href="{{ route('admin.enquiries.index') }}" class="text-xs font-bold text-emerald-600 hover:underline">View All &rarr;</a>
                </div>

                <div class="divide-y divide-slate-100">
                    @forelse($recentEnquiries as $enq)
                    <div class="p-4 hover:bg-slate-50 flex items-center justify-between text-xs">
                        <div>
                            <div class="flex items-center gap-2">
                                <span class="font-bold text-slate-900">{{ $enq->name }}</span>
                                <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase bg-slate-100 text-slate-600">{{ $enq->type }}</span>
                                @if($enq->status === 'pending')
                                    <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase bg-amber-100 text-amber-800">Pending</span>
                                @else
                                    <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase bg-emerald-100 text-emerald-800">Reviewed</span>
                                @endif
                            </div>
                            <p class="text-slate-500 mt-0.5 line-clamp-1">{{ $enq->message }}</p>
                        </div>
                        <span class="text-[10px] text-slate-400 whitespace-nowrap">{{ $enq->created_at->diffForHumans() }}</span>
                    </div>
                    @empty
                    <div class="p-6 text-center text-xs text-slate-400">No enquiries submitted yet.</div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Recent Registrations -->
        <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden flex flex-col justify-between">
            <div>
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div>
                        <h3 class="font-bold text-slate-900 text-sm">Recent Event Registrations</h3>
                        <p class="text-[11px] text-slate-400">Attendees booked for upcoming masterclasses</p>
                    </div>
                    <a href="{{ route('admin.events.index') }}" class="text-xs font-bold text-emerald-600 hover:underline">Manage Events &rarr;</a>
                </div>

                <div class="divide-y divide-slate-100">
                    @forelse($recentRegistrations as $reg)
                    <div class="p-4 hover:bg-slate-50 flex items-center justify-between text-xs">
                        <div>
                            <p class="font-bold text-slate-900">{{ $reg->name }} <span class="font-normal text-slate-500">({{ $reg->email }})</span></p>
                            <p class="text-emerald-700 font-medium text-[11px] mt-0.5">Event: {{ $reg->event->title ?? 'Event' }}</p>
                        </div>
                        <span class="text-[10px] text-slate-400 whitespace-nowrap">{{ $reg->created_at->diffForHumans() }}</span>
                    </div>
                    @empty
                    <div class="p-6 text-center text-xs text-slate-400">No event registrations yet.</div>
                    @endforelse
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
