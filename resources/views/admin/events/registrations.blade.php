@extends('layouts.admin')

@section('page_title', 'Event Registrations: ' . $event->title)

@section('content')
<div class="space-y-6">

    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-extrabold text-slate-900">{{ $event->title }}</h2>
            <p class="text-xs text-slate-500">
                📅 {{ $event->date_str }} • {{ $event->registrations->count() }} registered attendees ({{ $event->seats_remaining }} seats remaining)
            </p>
        </div>
        <a href="{{ route('admin.events.index') }}" class="text-xs font-semibold text-slate-600 hover:text-slate-900">&larr; Back to Events</a>
    </div>

    <!-- Attendees Table -->
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-50 border-b border-slate-200 text-slate-500 font-bold uppercase tracking-wider">
                    <tr>
                        <th class="py-3.5 px-4">#</th>
                        <th class="py-3.5 px-4">Attendee Name</th>
                        <th class="py-3.5 px-4">Email</th>
                        <th class="py-3.5 px-4">Phone</th>
                        <th class="py-3.5 px-4">Role</th>
                        <th class="py-3.5 px-4">Notes / Questions</th>
                        <th class="py-3.5 px-4">Registered At</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($event->registrations as $index => $reg)
                    <tr class="hover:bg-slate-50/80 transition-colors">
                        <td class="py-3.5 px-4 text-slate-400 font-mono">{{ $index + 1 }}</td>
                        <td class="py-3.5 px-4 font-bold text-slate-900">{{ $reg->name }}</td>
                        <td class="py-3.5 px-4 text-slate-600">{{ $reg->email }}</td>
                        <td class="py-3.5 px-4 text-slate-600">{{ $reg->phone }}</td>
                        <td class="py-3.5 px-4">
                            <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase bg-slate-100 text-slate-700">{{ $reg->role }}</span>
                        </td>
                        <td class="py-3.5 px-4 text-slate-500 max-w-xs">{{ $reg->notes ?? '—' }}</td>
                        <td class="py-3.5 px-4 text-slate-400 whitespace-nowrap">{{ $reg->created_at->format('d M Y, h:i A') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="py-12 text-center text-slate-400">
                            No registrations recorded for this event yet.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
