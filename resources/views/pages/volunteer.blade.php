@extends('layouts.app', [
    'title' => 'Volunteer With Yuvalay - Make a Difference in Vadodara',
    'metaDescription' => 'Join 5,000+ passionate youth volunteers. Explore roles in event coordination, STEM mentoring, community outreach, and content creation.'
])

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-16">

    <!-- Header -->
    <div class="space-y-4">
        <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full text-xs font-bold tracking-wider uppercase bg-brand-100 text-brand-800 border border-brand-200 shadow-sm">
            ✦ LEAD &amp; SERVE
        </span>
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-slate-900 leading-tight">
            Give Your Time.<br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-600 to-accent-teal">Gain Real Leadership.</span>
        </h1>
        <p class="text-base sm:text-lg text-slate-600 max-w-2xl leading-relaxed">
            Volunteering at Yuvalay isn't just about helping others — it's about developing leadership grit, communication skills, and empathy that defines exceptional individuals.
        </p>
    </div>

    <!-- Volunteer Roles Bento Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        
        <div class="bg-white rounded-3xl p-6 border border-slate-100 shadow-sm space-y-3 bento-card">
            <div class="w-10 h-10 rounded-xl bg-purple-50 text-accent-purple flex items-center justify-center text-xl font-bold">🎯</div>
            <h3 class="font-extrabold text-slate-900 text-base">Event Coordinator</h3>
            <p class="text-xs text-slate-500 leading-relaxed">
                Manage logistics, speaker hospitality, and participant registration for hackathons, seminars, and Gupshup evenings.
            </p>
            <span class="text-[10px] font-bold uppercase text-purple-600 block">Commitment: 4 hrs/wk</span>
        </div>

        <div class="bg-white rounded-3xl p-6 border border-slate-100 shadow-sm space-y-3 bento-card">
            <div class="w-10 h-10 rounded-xl bg-emerald-50 text-brand-600 flex items-center justify-center text-xl font-bold">⚙️</div>
            <h3 class="font-extrabold text-slate-900 text-base">MakerSpace Mentor</h3>
            <p class="text-xs text-slate-500 leading-relaxed">
                Guide high school students in basic robotics, 3D printing, and design thinking during Saturday open-lab hours.
            </p>
            <span class="text-[10px] font-bold uppercase text-brand-600 block">Commitment: 3 hrs/wk</span>
        </div>

        <div class="bg-white rounded-3xl p-6 border border-slate-100 shadow-sm space-y-3 bento-card">
            <div class="w-10 h-10 rounded-xl bg-amber-50 text-accent-amber flex items-center justify-center text-xl font-bold">📸</div>
            <h3 class="font-extrabold text-slate-900 text-base">Content &amp; Media Lead</h3>
            <p class="text-xs text-slate-500 leading-relaxed">
                Capture session moments, write inspiring participant spotlights, and manage Yuvalay's social media presence.
            </p>
            <span class="text-[10px] font-bold uppercase text-accent-amber block">Commitment: Flexible</span>
        </div>

        <div class="bg-white rounded-3xl p-6 border border-slate-100 shadow-sm space-y-3 bento-card">
            <div class="w-10 h-10 rounded-xl bg-blue-50 text-accent-blue flex items-center justify-center text-xl font-bold">🏫</div>
            <h3 class="font-extrabold text-slate-900 text-base">PRAYAAS Facilitator</h3>
            <p class="text-xs text-slate-500 leading-relaxed">
                Visit local schools to teach confidence-building, creative writing, and basic career awareness to underprivileged kids.
            </p>
            <span class="text-[10px] font-bold uppercase text-accent-blue block">Commitment: Sundays</span>
        </div>

    </div>

    <!-- Quick Volunteer Application Form -->
    <div class="bg-white rounded-3xl p-8 sm:p-12 border border-slate-100 shadow-md max-w-3xl mx-auto space-y-6">
        <div class="text-center space-y-2">
            <span class="text-xs font-bold uppercase tracking-wider text-brand-600">Join the Volunteer Cohort</span>
            <h2 class="text-3xl font-extrabold text-slate-900">Volunteer Application</h2>
            <p class="text-xs text-slate-500">Tell us a bit about yourself and which area excites you most.</p>
        </div>

        <form action="{{ route('enquiry.submit') }}" method="POST" class="space-y-4">
            @csrf
            <input type="hidden" name="type" value="volunteer">

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Full Name *</label>
                    <input type="text" name="name" required placeholder="Your full name" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-brand-500 focus:outline-none">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Email Address *</label>
                    <input type="email" name="email" required placeholder="you@example.com" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-brand-500 focus:outline-none">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">WhatsApp Phone *</label>
                    <input type="tel" name="phone" required value="{{ old('phone') }}" 
                           minlength="10" maxlength="10" pattern="[6-9][0-9]{9}" inputmode="numeric"
                           placeholder="10-digit mobile (e.g. 9825012345)" 
                           title="Must be a valid 10-digit Indian mobile number starting with 6, 7, 8, or 9 (minimum 10 characters, test numbers starting with 12345 are blocked)."
                           class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-brand-500 focus:outline-none">
                    @error('phone')<p class="text-rose-500 text-xs font-semibold mt-1">{{ $message }}</p>@enderror
                    <p class="text-[10px] text-slate-400 mt-1">10 digits required (starts with 6, 7, 8 or 9; fake 12345 numbers blocked)</p>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">College / Organization</label>
                    <input type="text" name="organization" placeholder="e.g. MSU Baroda" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-brand-500 focus:outline-none">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Preferred Volunteer Role *</label>
                <select name="interests" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-brand-500 focus:outline-none bg-white">
                    <option value="Event Coordinator">Event Coordination &amp; Logistics</option>
                    <option value="MakerSpace Tech Mentor">MakerSpace &amp; STEM Mentorship</option>
                    <option value="Media & Content Creator">Photography, Design &amp; Content</option>
                    <option value="PRAYAAS School Facilitator">PRAYAAS Rural / School Outreach</option>
                    <option value="General Volunteer">Any Area Needed</option>
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Why do you want to volunteer with Yuvalay? *</label>
                <textarea name="message" rows="3" required placeholder="Share your motivation and available hours (e.g. Weekends, 4 hours)" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-brand-500 focus:outline-none"></textarea>
            </div>

            <button type="submit" class="w-full py-3 rounded-full bg-brand-600 hover:bg-brand-700 text-white font-extrabold text-sm shadow-md transition-all">
                Submit Volunteer Application &rarr;
            </button>
        </form>
    </div>

</div>
@endsection
