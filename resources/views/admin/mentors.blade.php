@extends('layouts.admin')

@section('page_title', 'Mentor Network Management')

@section('content')
<div class="space-y-8" x-data="{ addMentorModal: false }">

    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-extrabold text-slate-900">Faculty &amp; Industry Mentors</h2>
            <p class="text-xs text-slate-500">Manage mentor profiles, expertise badges, and advisory bios.</p>
        </div>
        <button @click="addMentorModal = true" class="px-5 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs uppercase tracking-wider shadow-sm transition-all">
            + Add New Mentor
        </button>
    </div>

    <!-- Mentors Table -->
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-50 border-b border-slate-200 text-slate-500 font-bold uppercase tracking-wider">
                    <tr>
                        <th class="py-3.5 px-4">Mentor</th>
                        <th class="py-3.5 px-4">Category</th>
                        <th class="py-3.5 px-4">Organization / Designation</th>
                        <th class="py-3.5 px-4">Expertise</th>
                        <th class="py-3.5 px-4">Bio</th>
                        <th class="py-3.5 px-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($mentors as $mentor)
                    <tr class="hover:bg-slate-50/80 transition-colors">
                        <td class="py-3.5 px-4 whitespace-nowrap">
                            <div class="flex items-center gap-3">
                                <img src="{{ $mentor->avatar_url }}" alt="{{ $mentor->name }}" class="w-9 h-9 rounded-full object-cover border border-slate-200">
                                <div>
                                    <span class="font-bold text-slate-900 block">{{ $mentor->name }}</span>
                                    <span class="text-[10px] text-slate-400">{{ $mentor->role }}</span>
                                </div>
                            </div>
                        </td>
                        <td class="py-3.5 px-4">
                            <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase bg-brand-50 text-brand-800">{{ $mentor->category }}</span>
                        </td>
                        <td class="py-3.5 px-4 text-slate-700">{{ $mentor->organization }}</td>
                        <td class="py-3.5 px-4 font-semibold text-emerald-700">{{ $mentor->expertise }}</td>
                        <td class="py-3.5 px-4 text-slate-500 max-w-xs line-clamp-2">{{ $mentor->bio }}</td>
                        <td class="py-3.5 px-4 text-right whitespace-nowrap">
                            <form action="{{ route('admin.mentors.destroy', $mentor->id) }}" method="POST" class="inline" onsubmit="return confirm('Remove mentor profile?');">
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
                        <td colspan="6" class="py-12 text-center text-slate-400">No mentors configured.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add Mentor Modal -->
    <div x-show="addMentorModal" x-cloak class="fixed inset-0 z-50 bg-black/50 backdrop-blur-sm flex items-center justify-center p-4">
        <div @click.away="addMentorModal = false" class="bg-white rounded-3xl p-8 max-w-xl w-full space-y-4 shadow-2xl text-xs">
            <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                <h3 class="text-base font-extrabold text-slate-900">Add Mentor Profile</h3>
                <button @click="addMentorModal = false" class="text-slate-400 hover:text-slate-700 text-lg">&times;</button>
            </div>

            <form action="{{ route('admin.mentors.store') }}" method="POST" class="space-y-3">
                @csrf
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block font-bold text-slate-700 uppercase mb-1">Mentor Name *</label>
                        <input type="text" name="name" required placeholder="e.g. Dr. Sameer Bhatt" class="w-full px-3 py-2 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>
                    <div>
                        <label class="block font-bold text-slate-700 uppercase mb-1">Category *</label>
                        <select name="category" required class="w-full px-3 py-2 rounded-xl border border-slate-200 text-xs bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                            <option value="Industry">Industry</option>
                            <option value="Academic">Academic</option>
                            <option value="Innovation">Innovation</option>
                            <option value="Leadership">Leadership</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block font-bold text-slate-700 uppercase mb-1">Role / Designation *</label>
                        <input type="text" name="role" required placeholder="e.g. Chief Tech Consultant" class="w-full px-3 py-2 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>
                    <div>
                        <label class="block font-bold text-slate-700 uppercase mb-1">Organization *</label>
                        <input type="text" name="organization" required placeholder="e.g. Former Dean, MSU" class="w-full px-3 py-2 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>
                </div>

                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Domain Expertise *</label>
                    <input type="text" name="expertise" required placeholder="e.g. Artificial Intelligence &amp; Cloud" class="w-full px-3 py-2 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                </div>

                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Brief Bio *</label>
                    <textarea name="bio" rows="3" required placeholder="Short 2-line summary of achievements and guidance..." class="w-full px-3 py-2 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-emerald-500 focus:outline-none"></textarea>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block font-bold text-slate-700 uppercase mb-1">Avatar Image URL</label>
                        <input type="url" name="avatar_url" value="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=300&q=80" class="w-full px-3 py-2 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>
                    <div>
                        <label class="block font-bold text-slate-700 uppercase mb-1">LinkedIn URL</label>
                        <input type="url" name="linkedin_url" placeholder="https://linkedin.com/in/username" class="w-full px-3 py-2 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>
                </div>

                <div class="pt-3 border-t border-slate-100 flex items-center justify-end gap-2">
                    <button type="button" @click="addMentorModal = false" class="px-4 py-2 rounded-xl text-slate-600 hover:bg-slate-100 font-semibold">Cancel</button>
                    <button type="submit" class="px-5 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold">Save Mentor &rarr;</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
