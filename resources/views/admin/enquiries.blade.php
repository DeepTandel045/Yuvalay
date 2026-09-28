@extends('layouts.admin')

@section('page_title', 'Central Enquiry Inbox (Option 3)')

@section('content')
<div class="space-y-6">

    <!-- Filters Bar -->
    <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm flex flex-wrap items-center justify-between gap-4">
        
        <!-- Role Types Filter -->
        <div class="flex items-center gap-2 overflow-x-auto">
            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider mr-1">Role:</span>
            @foreach($types as $t)
            <a href="{{ route('admin.enquiries.index', ['type' => $t, 'status' => $status]) }}" 
               class="px-3 py-1.5 rounded-lg text-xs font-bold uppercase tracking-wider transition-all {{ $type === $t ? 'bg-emerald-600 text-white' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">
                {{ $t }}
            </a>
            @endforeach
        </div>

        <!-- Status Filter -->
        <div class="flex items-center gap-2">
            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider mr-1">Status:</span>
            @foreach($statuses as $st)
            <a href="{{ route('admin.enquiries.index', ['type' => $type, 'status' => $st]) }}" 
               class="px-3 py-1.5 rounded-lg text-xs font-bold uppercase tracking-wider transition-all {{ $status === $st ? 'bg-slate-900 text-white' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">
                {{ $st }}
            </a>
            @endforeach
        </div>

    </div>

    <!-- Enquiries Table -->
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-50 border-b border-slate-200 text-slate-500 font-bold uppercase tracking-wider">
                    <tr>
                        <th class="py-3.5 px-4">Date</th>
                        <th class="py-3.5 px-4">Sender / Role</th>
                        <th class="py-3.5 px-4">Contact Info</th>
                        <th class="py-3.5 px-4">Organization / Department</th>
                        <th class="py-3.5 px-4">Interest &amp; Message</th>
                        <th class="py-3.5 px-4">Status</th>
                        <th class="py-3.5 px-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($enquiries as $enq)
                    <tr class="hover:bg-slate-50/80 transition-colors">
                        <td class="py-3.5 px-4 text-slate-400 whitespace-nowrap">
                            {{ $enq->created_at->format('d M Y, h:i A') }}
                        </td>
                        <td class="py-3.5 px-4">
                            <span class="font-bold text-slate-900 block">{{ $enq->name }}</span>
                            <span class="inline-block mt-0.5 px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider bg-brand-50 text-brand-800">
                                {{ $enq->type }}
                            </span>
                        </td>
                        <td class="py-3.5 px-4">
                            <div class="text-slate-700 font-medium">{{ $enq->email }}</div>
                            <div class="text-slate-400 text-[11px]">{{ $enq->phone ?? 'N/A' }}</div>
                        </td>
                        <td class="py-3.5 px-4 text-slate-600">
                            <div>{{ $enq->organization ?? '—' }}</div>
                            <div class="text-[11px] text-slate-400">{{ $enq->designation ?? '' }}</div>
                        </td>
                        <td class="py-3.5 px-4 max-w-xs">
                            @if($enq->interests)
                                <span class="font-semibold text-emerald-700 block text-[11px]">Interest: {{ $enq->interests }}</span>
                            @endif
                            <p class="text-slate-600 line-clamp-2 mt-0.5">{{ $enq->message }}</p>
                        </td>
                        <td class="py-3.5 px-4 whitespace-nowrap">
                            @if($enq->status === 'pending')
                                <span class="px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-amber-100 text-amber-800">
                                    ● Pending
                                </span>
                            @else
                                <span class="px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-emerald-100 text-emerald-800">
                                    ✓ Reviewed
                                </span>
                            @endif
                        </td>
                        <td class="py-3.5 px-4 text-right whitespace-nowrap space-x-2">
                            <form action="{{ route('admin.enquiries.toggle', $enq->id) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="px-3 py-1 rounded-lg text-xs font-semibold bg-slate-100 hover:bg-slate-200 text-slate-700">
                                    {{ $enq->status === 'pending' ? 'Mark Reviewed' : 'Mark Pending' }}
                                </button>
                            </form>

                            <form action="{{ route('admin.enquiries.destroy', $enq->id) }}" method="POST" class="inline" onsubmit="return confirm('Delete this enquiry record?');">
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
                        <td colspan="7" class="py-12 text-center text-slate-400">
                            No enquiries found for the selected filter.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-slate-100">
            {{ $enquiries->links() }}
        </div>
    </div>

</div>
@endsection
