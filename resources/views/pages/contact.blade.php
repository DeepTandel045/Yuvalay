@extends('layouts.app', [
    'title' => 'Contact & Role-Specific Enquiry - Yuvalay Vadodara',
    'metaDescription' => 'Get in touch with Yuvalay. Separate enquiry pathways for Students, Educational Institutions, Volunteers, CSR Partners, and Mentors.'
])

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-12" x-data="{ currentTab: '{{ $role ?? 'student' }}' }">

    <!-- Header -->
    <div class="space-y-4">
        <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full text-xs font-bold tracking-wider uppercase bg-brand-100 text-brand-800 border border-brand-200 shadow-sm">
            ✦ CONNECT &amp; ENGAGE
        </span>
        <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight text-slate-900 leading-tight">
            How Can We<br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-600 to-accent-teal">Partner With You?</span>
        </h1>
        <p class="text-base sm:text-lg text-slate-600 max-w-2xl leading-relaxed">
            Select your journey below to submit a tailored enquiry, or drop by our Vadodara center. Every query is personally reviewed by our team.
        </p>
    </div>

    <!-- 5 Role Tabs -->
    <div class="flex items-center gap-2 overflow-x-auto pb-2 border-b border-slate-200">
        <button @click="currentTab = 'student'" :class="currentTab === 'student' ? 'border-brand-600 text-brand-600 bg-brand-50/50' : 'border-transparent text-slate-500 hover:text-slate-800'" class="px-5 py-3 border-b-2 font-bold text-xs uppercase tracking-wider whitespace-nowrap rounded-t-xl transition-all">
            🎓 Student Guidance
        </button>
        <button @click="currentTab = 'institution'" :class="currentTab === 'institution' ? 'border-brand-600 text-brand-600 bg-brand-50/50' : 'border-transparent text-slate-500 hover:text-slate-800'" class="px-5 py-3 border-b-2 font-bold text-xs uppercase tracking-wider whitespace-nowrap rounded-t-xl transition-all">
            🏛️ Institutional Tie-ups
        </button>
        <button @click="currentTab = 'volunteer'" :class="currentTab === 'volunteer' ? 'border-brand-600 text-brand-600 bg-brand-50/50' : 'border-transparent text-slate-500 hover:text-slate-800'" class="px-5 py-3 border-b-2 font-bold text-xs uppercase tracking-wider whitespace-nowrap rounded-t-xl transition-all">
            🤝 Volunteer Application
        </button>
        <button @click="currentTab = 'csr'" :class="currentTab === 'csr' ? 'border-brand-600 text-brand-600 bg-brand-50/50' : 'border-transparent text-slate-500 hover:text-slate-800'" class="px-5 py-3 border-b-2 font-bold text-xs uppercase tracking-wider whitespace-nowrap rounded-t-xl transition-all">
            💼 CSR &amp; Corporate
        </button>
        <button @click="currentTab = 'mentor'" :class="currentTab === 'mentor' ? 'border-brand-600 text-brand-600 bg-brand-50/50' : 'border-transparent text-slate-500 hover:text-slate-800'" class="px-5 py-3 border-b-2 font-bold text-xs uppercase tracking-wider whitespace-nowrap rounded-t-xl transition-all">
            🌟 Become a Mentor
        </button>
    </div>

    <!-- Forms & Location Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
        
        <!-- Interactive Form Section -->
        <div class="lg:col-span-7 bg-white rounded-3xl p-8 sm:p-10 border border-slate-100 shadow-md">
            
            <form action="{{ route('enquiry.submit') }}" method="POST" class="space-y-4">
                @csrf
                <input type="hidden" name="type" :value="currentTab">

                <!-- Dynamic Title based on selected tab -->
                <div class="pb-3 border-b border-slate-100">
                    <h3 class="text-xl font-extrabold text-slate-900" x-show="currentTab === 'student'">Student Career &amp; Skill Guidance</h3>
                    <h3 class="text-xl font-extrabold text-slate-900" x-show="currentTab === 'institution'" x-cloak>College &amp; University Partnership</h3>
                    <h3 class="text-xl font-extrabold text-slate-900" x-show="currentTab === 'volunteer'" x-cloak>Join the Volunteer Family</h3>
                    <h3 class="text-xl font-extrabold text-slate-900" x-show="currentTab === 'csr'" x-cloak>Corporate CSR &amp; Sponsorship</h3>
                    <h3 class="text-xl font-extrabold text-slate-900" x-show="currentTab === 'mentor'" x-cloak>Industry &amp; Academic Mentor Application</h3>
                    <p class="text-xs text-slate-400 mt-1">Please provide the details below so we can assist your specific need.</p>
                </div>

                <!-- Common: Name & Email -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Your Name *</label>
                        <input type="text" name="name" required placeholder="Full Name" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-brand-500 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Email Address *</label>
                        <input type="email" name="email" required placeholder="name@example.com" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-brand-500 focus:outline-none">
                    </div>
                </div>

                <!-- Phone -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">WhatsApp / Phone *</label>
                        <input type="tel" name="phone" required value="{{ old('phone') }}" 
                               minlength="10" maxlength="10" pattern="[6-9][0-9]{9}" inputmode="numeric"
                               placeholder="10-digit mobile (e.g. 9825012345)" 
                               title="Must be a valid 10-digit Indian mobile number starting with 6, 7, 8, or 9 (minimum 10 characters, test numbers starting with 12345 are blocked)."
                               class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-brand-500 focus:outline-none">
                        @error('phone')
                            <p class="text-rose-500 text-xs font-semibold mt-1">{{ $message }}</p>
                        @enderror
                        <p class="text-[10px] text-slate-400 mt-1">10 digits required (starts with 6, 7, 8 or 9; fake 12345 numbers blocked)</p>
                    </div>

                    <!-- Role-Specific Field: College/Org -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">
                            <span x-show="currentTab === 'student'">College / University</span>
                            <span x-show="currentTab === 'institution'" x-cloak>Institute / School Name</span>
                            <span x-show="currentTab === 'volunteer'" x-cloak>Current College / Workplace</span>
                            <span x-show="currentTab === 'csr'" x-cloak>Company / Organization</span>
                            <span x-show="currentTab === 'mentor'" x-cloak>Current Employer / Domain</span>
                        </label>
                        <input type="text" name="organization" placeholder="e.g. Parul University, Vadodara" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-brand-500 focus:outline-none">
                    </div>
                </div>

                <!-- Role-Specific: Designation for Institutions / CSR -->
                <div x-show="currentTab === 'institution' || currentTab === 'csr' || currentTab === 'mentor'" x-cloak>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Designation / Department</label>
                    <input type="text" name="designation" placeholder="e.g. Dean of Student Affairs / Head of CSR" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-brand-500 focus:outline-none">
                </div>

                <!-- Role-Specific Interests -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">
                        <span x-show="currentTab === 'student'">Program of Interest</span>
                        <span x-show="currentTab === 'institution'" x-cloak>Proposed Collaboration</span>
                        <span x-show="currentTab === 'volunteer'" x-cloak>Preferred Volunteer Area</span>
                        <span x-show="currentTab === 'csr'" x-cloak>Focus Area</span>
                        <span x-show="currentTab === 'mentor'" x-cloak>Mentorship Expertise</span>
                    </label>
                    <input type="text" name="interests" placeholder="e.g. Career Clarity, Leadership Lab, MakerSpace Prototyping" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-brand-500 focus:outline-none">
                </div>

                <!-- Message -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Your Message / Query *</label>
                    <textarea name="message" rows="3" required placeholder="Tell us how we can help or collaborate..." class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-brand-500 focus:outline-none"></textarea>
                </div>

                <button type="submit" class="w-full sm:w-auto px-8 py-3.5 rounded-full bg-brand-600 hover:bg-brand-700 text-white font-extrabold text-sm shadow-md shadow-brand-500/25 transition-all hover:scale-105 active:scale-95">
                    Send Enquiry &rarr;
                </button>
            </form>

        </div>

        <!-- Campus Info & Google Maps Embed -->
        <div class="lg:col-span-5 space-y-6">
            
            <div class="bg-white rounded-3xl p-8 border border-slate-100 shadow-md space-y-4">
                <h3 class="text-xl font-extrabold text-slate-900">Visit Our Center</h3>
                
                <div class="space-y-3 text-xs sm:text-sm text-slate-600">
                    <div class="flex items-start gap-3">
                        <span class="text-base text-brand-600">📍</span>
                        <div>
                            <strong class="text-slate-900 block font-bold">Yuvalay Individual Development Center</strong>
                            <span>Vadodara, Gujarat, India - 390001</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        <span class="text-base text-brand-600">✉️</span>
                        <span>Email: <a href="mailto:info@yuvalay.org" class="text-brand-600 font-semibold hover:underline">info@yuvalay.org</a></span>
                    </div>

                    <div class="flex items-center gap-3">
                        <span class="text-base text-brand-600">📞</span>
                        <span>Phone: <a href="tel:+919825012345" class="text-brand-600 font-semibold hover:underline">+91 98250 12345</a></span>
                    </div>

                    <div class="flex items-center gap-3">
                        <span class="text-base text-brand-600">⏰</span>
                        <span>Hours: Mon - Sat: 9:00 AM - 6:00 PM</span>
                    </div>
                </div>
            </div>

            <!-- Google Maps Embed -->
            <div class="rounded-3xl overflow-hidden shadow-md border border-slate-100 aspect-video w-full bg-slate-100">
                <iframe 
                    title="Yuvalay Vadodara Location Map"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d118147.6820202976!2d73.10304618037145!3d22.310696384234057!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395fc8ab91a3ddab%3A0xac39d3bfe1473fb8!2sVadodara%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1700000000000!5m2!1sen!2sin" 
                    width="100%" 
                    height="100%" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy">
                </iframe>
            </div>

        </div>

    </div>

</div>
@endsection
