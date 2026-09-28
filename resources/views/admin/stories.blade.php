@extends('layouts.admin')

@section('page_title', 'Success Stories & Testimonials')

@section('content')
<div class="space-y-8" x-data="{ addStoryModal: false }">

    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-extrabold text-slate-900">Alumni Success Stories</h2>
            <p class="text-xs text-slate-500">Manage alumni transformation profiles and testimonials displayed on the website.</p>
        </div>
        <button @click="addStoryModal = true" class="px-5 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs uppercase tracking-wider shadow-sm transition-all">
            + Add New Story
        </button>
    </div>

    <!-- Stories Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($stories as $story)
        <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm flex flex-col justify-between space-y-4">
            <div class="space-y-3">
                <div class="flex items-center justify-between">
                    <span class="px-2.5 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider bg-brand-50 text-brand-800">
                        {{ $story->program_name }}
                    </span>
                    <form action="{{ route('admin.stories.destroy', $story->id) }}" method="POST" onsubmit="return confirm('Delete this story?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-slate-400 hover:text-rose-600">🗑️</button>
                    </form>
                </div>

                <p class="text-xs text-slate-700 font-medium italic">"{{ $story->story_quote }}"</p>
                <p class="text-[11px] text-slate-500 line-clamp-3 leading-relaxed">{{ $story->full_story }}</p>
            </div>

            <div class="flex items-center gap-3 pt-3 border-t border-slate-100">
                <img src="{{ $story->avatar_url }}" alt="{{ $story->name }}" class="w-10 h-10 rounded-full object-cover border border-slate-200">
                <div>
                    <h4 class="font-bold text-slate-900 text-xs">{{ $story->name }}</h4>
                    <p class="text-[10px] text-slate-400">{{ $story->role }} • {{ $story->organization }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Add Story Modal -->
    <div x-show="addStoryModal" x-cloak class="fixed inset-0 z-50 bg-black/50 backdrop-blur-sm flex items-center justify-center p-4">
        <div @click.away="addStoryModal = false" class="bg-white rounded-3xl p-8 max-w-xl w-full space-y-4 shadow-2xl text-xs">
            <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                <h3 class="text-base font-extrabold text-slate-900">Add New Success Story</h3>
                <button @click="addStoryModal = false" class="text-slate-400 hover:text-slate-700 text-lg">&times;</button>
            </div>

            <form action="{{ route('admin.stories.store') }}" method="POST" class="space-y-3">
                @csrf
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block font-bold text-slate-700 uppercase mb-1">Alum Name *</label>
                        <input type="text" name="name" required placeholder="e.g. Ketan Trivedi" class="w-full px-3 py-2 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>
                    <div>
                        <label class="block font-bold text-slate-700 uppercase mb-1">Current Role *</label>
                        <input type="text" name="role" required placeholder="e.g. Junior Cloud Engineer" class="w-full px-3 py-2 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block font-bold text-slate-700 uppercase mb-1">Company / Organization</label>
                        <input type="text" name="organization" placeholder="e.g. TCS" class="w-full px-3 py-2 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>
                    <div>
                        <label class="block font-bold text-slate-700 uppercase mb-1">Program Completed *</label>
                        <input type="text" name="program_name" required placeholder="e.g. Career Launchpad" class="w-full px-3 py-2 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>
                </div>

                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Short Quote / Catchphrase *</label>
                    <input type="text" name="story_quote" required placeholder="Brief key highlight of their experience..." class="w-full px-3 py-2 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                </div>

                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Full Story Narrative *</label>
                    <textarea name="full_story" rows="3" required placeholder="Detailed journey, background, and transformation..." class="w-full px-3 py-2 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-emerald-500 focus:outline-none"></textarea>
                </div>

                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Photo URL</label>
                    <input type="url" name="avatar_url" value="https://images.unsplash.com/photo-1539571696357-5a69c17a67c6?auto=format&fit=crop&w=300&q=80" class="w-full px-3 py-2 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                </div>

                <div class="pt-3 border-t border-slate-100 flex items-center justify-end gap-2">
                    <button type="button" @click="addStoryModal = false" class="px-4 py-2 rounded-xl text-slate-600 hover:bg-slate-100 font-semibold">Cancel</button>
                    <button type="submit" class="px-5 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold">Publish Story &rarr;</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
