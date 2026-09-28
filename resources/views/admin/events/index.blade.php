@extends('layouts.admin')

@section('page_title', 'Events Management & Registrations')

@section('content')
<div class="space-y-6">

    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-extrabold text-slate-900">Events Calendar</h2>
            <p class="text-xs text-slate-500">Add, edit, or remove workshops and view registered participants.</p>
        </div>
        <a href="{{ route('admin.events.create') }}" class="px-5 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs uppercase tracking-wider shadow-sm transition-all">
            + Create New Event
        </a>
    </div>

    <!-- Events List Table -->
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-50 border-b border-slate-200 text-slate-500 font-bold uppercase tracking-wider">
                    <tr>
                        <th class="py-3.5 px-4">Event Title</th>
                        <th class="py-3.5 px-4">Category / Mode</th>
                        <th class="py-3.5 px-4">Date &amp; Time</th>
                        <th class="py-3.5 px-4">Speaker</th>
                        <th class="py-3.5 px-4">Seats / Registrations</th>
                        <th class="py-3.5 px-4">Status</th>
                        <th class="py-3.5 px-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($events as $event)
                    <tr class="hover:bg-slate-50/80 transition-colors">
                        <td class="py-3.5 px-4 max-w-xs">
                            <span class="font-bold text-slate-900 block">{{ $event->title }}</span>
                            <span class="text-[11px] text-slate-400">📍 {{ $event->location }}</span>
                        </td>
                        <td class="py-3.5 px-4">
                            <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase bg-brand-50 text-brand-800">{{ $event->category }}</span>
                            <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase bg-slate-100 text-slate-600 ml-1">{{ $event->mode }}</span>
                        </td>
                        <td class="py-3.5 px-4 whitespace-nowrap">
                            <div class="font-semibold text-slate-800">📅 {{ $event->date_str }}</div>
                            <div class="text-[11px] text-slate-400">⏰ {{ $event->time_str }}</div>
                        </td>
                        <td class="py-3.5 px-4">
                            <div class="font-bold text-slate-800">{{ $event->speaker_name }}</div>
                            <div class="text-[11px] text-slate-400">{{ $event->speaker_role }}</div>
                        </td>
                        <td class="py-3.5 px-4 whitespace-nowrap">
                            <a href="{{ route('admin.events.registrations', $event->id) }}" class="font-bold text-emerald-700 hover:underline">
                                🎟️ {{ $event->registrations_count }} booked
                            </a>
                            <span class="text-slate-400 block text-[11px]">of {{ $event->seats_total }} total seats</span>
                        </td>
                        <td class="py-3.5 px-4 whitespace-nowrap">
                            @if($event->is_upcoming)
                                <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase bg-emerald-100 text-emerald-800">Upcoming</span>
                            @else
                                <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase bg-slate-100 text-slate-500">Past</span>
                            @endif
                        </td>
                        <td class="py-3.5 px-4 text-right whitespace-nowrap space-x-2">
                            <a href="{{ route('admin.events.registrations', $event->id) }}" class="px-2.5 py-1 rounded bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold text-[11px]">
                                Attendees
                            </a>
                            <a href="{{ route('admin.events.edit', $event->id) }}" class="px-2.5 py-1 rounded bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold text-[11px]">
                                Edit
                            </a>
                            <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" class="inline" onsubmit="return confirm('Delete this event?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-1 text-slate-400 hover:text-rose-600">
                                    🗑️
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="py-12 text-center text-slate-400">No events found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
