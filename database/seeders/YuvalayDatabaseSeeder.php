<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\ImpactStat;
use App\Models\Program;
use App\Models\Event;
use App\Models\Mentor;
use App\Models\SuccessStory;
use App\Models\Enquiry;
use App\Models\EventRegistration;

class YuvalayDatabaseSeeder extends Seeder
{
    public function run()
    {
        // 1. Admin User
        User::updateOrCreate(
            ['email' => 'admin@yuvalay.org'],
            [
                'name' => 'Yuvalay Admin',
                'password' => Hash::make('yuvalay2026'),
            ]
        );

        // 2. Impact Statistics
        $stats = [
            [
                'key_name' => 'years',
                'label' => 'Years of Impact',
                'value' => '12+',
                'description' => 'Dedicated service nurturing potential & transforming youth.',
                'icon_name' => 'award',
                'order_index' => 1,
            ],
            [
                'key_name' => 'youth',
                'label' => 'Youth Empowered',
                'value' => '25,000+',
                'description' => 'Students & young professionals across Gujarat & beyond.',
                'icon_name' => 'users',
                'order_index' => 2,
            ],
            [
                'key_name' => 'sessions',
                'label' => 'Learning Sessions',
                'value' => '1,200+',
                'description' => 'Workshops, bootcamps, and career clarity programs.',
                'icon_name' => 'calendar',
                'order_index' => 3,
            ],
            [
                'key_name' => 'institutions',
                'label' => 'Institutions Partnered',
                'value' => '150+',
                'description' => 'Universities, colleges, and schools actively collaborating.',
                'icon_name' => 'building',
                'order_index' => 4,
            ],
            [
                'key_name' => 'mentors',
                'label' => 'Mentors & Experts',
                'value' => '300+',
                'description' => 'Distinguished industry specialists guiding participants.',
                'icon_name' => 'user-check',
                'order_index' => 5,
            ],
            [
                'key_name' => 'volunteers',
                'label' => 'Active Volunteers',
                'value' => '5,000+',
                'description' => 'Passionate youth volunteers driving community change.',
                'icon_name' => 'heart',
                'order_index' => 6,
            ],
        ];
        foreach ($stats as $st) {
            ImpactStat::updateOrCreate(['key_name' => $st['key_name']], $st);
        }

        // 3. Programs
        $programs = [
            [
                'slug' => 'career-clarity-workshop',
                'title' => 'Career Clarity & Readiness Workshop',
                'category' => 'Career',
                'short_desc' => 'Comprehensive guidance covering resume architecture, interview simulations, and tailored career direction.',
                'full_desc' => 'Discover your strengths, explore emerging industry pathways, and create a decisive career action plan. This flagship program blends interactive psychometric assessments, resume workshops, and live mock interviews with senior corporate executives.',
                'duration' => '4 Weeks (Weekend Sessions)',
                'target_audience' => 'College students, job seekers, and early-career professionals',
                'outcomes' => ['Personalized Career Blueprint', 'ATS-compliant Professional Resume', 'Interview Confidence & Strategy'],
                'features' => ['Executive Mentorship', '1-on-1 Feedback', 'Alumni Placement Network'],
                'image_url' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=800&q=80',
                'is_featured' => true,
                'order_index' => 1,
            ],
            [
                'slug' => 'leadership-lab',
                'title' => 'Youth Leadership Lab',
                'category' => 'Leadership',
                'short_desc' => 'Cultivate decisive decision-making, team synergy, conflict resolution, and ethical governance.',
                'full_desc' => 'Designed for aspiring changemakers, this immersive lab uses live civic simulations, case studies, and outdoor leadership challenges to transform participants into confident, empathetic youth leaders.',
                'duration' => '6 Weeks',
                'target_audience' => 'Student council leaders, NSS/NCC members, and young initiative heads',
                'outcomes' => ['Strategic Decision Making', 'Team Motivation & Delegation', 'Crisis & Conflict Navigation'],
                'features' => ['Case Study Sprints', 'Peer Governance Circles', 'Leadership Certificate'],
                'image_url' => 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&w=800&q=80',
                'is_featured' => true,
                'order_index' => 2,
            ],
            [
                'slug' => 'makerspace-innovation-challenge',
                'title' => 'MakerSpace Innovation Challenge',
                'category' => 'Innovation',
                'short_desc' => 'Hands-on prototyping, design thinking, STEM problem-solving, and sustainable product creation.',
                'full_desc' => 'Turn wild ideas into working hardware and software prototypes. Yuvalay MakerSpace provides 3D printers, IoT kits, laser cutters, and mentor guidance to solve pressing civic and environmental challenges.',
                'duration' => '8 Weeks',
                'target_audience' => 'Engineering, science, design students, and tinkerers of all disciplines',
                'outcomes' => ['Working Physical/Digital Prototype', 'Patent & IP Fundamentals', 'Pitch Deck to Angel Mentors'],
                'features' => ['Full Lab Access', 'Hardware Component Kits', 'Demo Day Showcase'],
                'image_url' => 'https://images.unsplash.com/photo-1581092160607-ee22621dd758?auto=format&fit=crop&w=800&q=80',
                'is_featured' => true,
                'order_index' => 3,
            ],
            [
                'slug' => 'future-skills-communication',
                'title' => 'Public Speaking & Expressive Communication',
                'category' => 'Communication',
                'short_desc' => 'Conquer stage fear, structure compelling narratives, and master persuasive articulation.',
                'full_desc' => 'Communication is the superpower of modern youth. Master vocal modulation, non-verbal presence, business communication, and storytelling through video self-analysis and supportive group critique.',
                'duration' => '5 Weeks',
                'target_audience' => 'Students, competitive exam aspirants, and young managers',
                'outcomes' => ['Fearless Stage Presence', 'Persuasive Speech Structuring', 'Active Listening Mastery'],
                'features' => ['Video Speech Analysis', 'Weekly Debates', 'Toastmasters-style Impromptu Drills'],
                'image_url' => 'https://images.unsplash.com/photo-1475721027785-f74eccf877e2?auto=format&fit=crop&w=800&q=80',
                'is_featured' => true,
                'order_index' => 4,
            ],
            [
                'slug' => 'personal-growth-mindfulness',
                'title' => 'Mindfulness, Emotional Resilience & Values',
                'category' => 'Personal Growth',
                'short_desc' => 'Emotional intelligence, stress mastery, habits optimization, and inner strength.',
                'full_desc' => 'Holistic development begins from within. Learn practical mindfulness tools, stress coping techniques, healthy digital habits, and character-building grounded in timeless values.',
                'duration' => '4 Weeks',
                'target_audience' => 'Youth experiencing academic or early career anxiety',
                'outcomes' => ['Emotional Self-Regulation', 'Focus & Mental Clarity', 'Purpose-driven Daily Routine'],
                'features' => ['Guided Mindfulness', 'Journaling Toolkits', 'Confidential Support Group'],
                'image_url' => 'https://images.unsplash.com/photo-1506126613408-eca07ce68773?auto=format&fit=crop&w=800&q=80',
                'is_featured' => false,
                'order_index' => 5,
            ],
            [
                'slug' => 'digital-creativity-media',
                'title' => 'Digital Content Creation & Visual Storytelling',
                'category' => 'Creativity',
                'short_desc' => 'Graphic design, digital storytelling, video editing, and ethical media production.',
                'full_desc' => 'Equip yourself with the tools to tell stories that matter. Learn visual design principles, podcasting basics, mobile video journalism, and positive digital impact strategies.',
                'duration' => '6 Weeks',
                'target_audience' => 'Creative students, aspiring creators, and NGO media volunteers',
                'outcomes' => ['Creative Content Portfolio', 'Design & Video Production Basics', 'Social Media Campaign Strategy'],
                'features' => ['Software Tutorials', 'Yuvalay Media Lab Access', 'Live Campaign Project'],
                'image_url' => 'https://images.unsplash.com/photo-1533750349088-cd871a92f312?auto=format&fit=crop&w=800&q=80',
                'is_featured' => false,
                'order_index' => 6,
            ],
        ];
        foreach ($programs as $prog) {
            Program::updateOrCreate(['slug' => $prog['slug']], $prog);
        }

        // 4. Events
        $events = [
            [
                'slug' => 'career-clarity-workshop-may-2025',
                'title' => 'Career Clarity Workshop: Discover Your Calling',
                'category' => 'Workshop',
                'date_str' => '2026-10-15',
                'time_str' => '10:00 AM - 1:00 PM IST',
                'mode' => 'Hybrid',
                'location' => 'Yuvalay Center, Vadodara & Live on Zoom',
                'speaker_name' => 'Dr. Nirav Sharma',
                'speaker_role' => 'Career Counselor & Former Dean, MSU Vadodara',
                'speaker_avatar' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=300&q=80',
                'short_desc' => 'Interactive career mapping session helping high school and college students identify high-growth domains aligned with their personality.',
                'full_desc' => 'Join Dr. Nirav Sharma for an in-depth, hands-on workshop dedicated to clarifying your career direction. You will take part in guided self-evaluations, receive industry insights across emerging tech, commerce, and creative sectors, and walk away with a 90-day action blueprint.',
                'seats_total' => 120,
                'seats_booked' => 84,
                'is_upcoming' => true,
                'registration_open' => true,
            ],
            [
                'slug' => 'gupshup-speak-share-shine-2026',
                'title' => 'Gupshup: Speak. Share. Shine.',
                'category' => 'Gupshup',
                'date_str' => '2026-10-22',
                'time_str' => '5:30 PM - 7:30 PM IST',
                'mode' => 'In-person',
                'location' => 'Open Amphitheatre, Yuvalay Campus, Vadodara',
                'speaker_name' => 'Aarti Trivedi',
                'speaker_role' => 'Youth Dialogue Facilitator & Podcaster',
                'speaker_avatar' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=300&q=80',
                'short_desc' => 'Informal, judgment-free open mic and discussion evening on overcoming imposter syndrome and building authentic self-confidence.',
                'full_desc' => 'Gupshup is Yuvalay\'s beloved signature youth meetup. There are no podiums and no lectures — just honest conversations, open mic reflections, acoustic music, and meaningful friendships.',
                'seats_total' => 75,
                'seats_booked' => 52,
                'is_upcoming' => true,
                'registration_open' => true,
            ],
            [
                'slug' => 'innovation-challenge-hackathon-2026',
                'title' => 'Yuvalay Innovation Challenge 2026',
                'category' => 'Hackathon',
                'date_str' => '2026-11-05',
                'time_str' => '9:00 AM - 6:00 PM IST',
                'mode' => 'In-person',
                'location' => 'Yuvalay MakerSpace & Prototyping Lab',
                'speaker_name' => 'Er. Rajesh Parmar',
                'speaker_role' => 'IoT Lead & MakerSpace Advisor',
                'speaker_avatar' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=300&q=80',
                'short_desc' => 'A day-long design-and-build sprint for young innovators building prototypes addressing urban sustainability and education access.',
                'full_desc' => 'Compete in teams of 2 to 4 to design, test, and present functional solutions. Cash prizes, certificates, and MakerSpace incubation support awarded to winning concepts.',
                'seats_total' => 60,
                'seats_booked' => 45,
                'is_upcoming' => true,
                'registration_open' => true,
            ],
            [
                'slug' => 'future-skills-webinar-ai-workplace',
                'title' => 'Webinar: Generative AI & The Future of White-Collar Work',
                'category' => 'Webinar',
                'date_str' => '2026-11-18',
                'time_str' => '6:00 PM - 7:30 PM IST',
                'mode' => 'Online',
                'location' => 'Zoom Live Interactive Webinar',
                'speaker_name' => 'Sameer Bhatt',
                'speaker_role' => 'Global Technology Consultant & AI Researcher',
                'speaker_avatar' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=300&q=80',
                'short_desc' => 'Practical understanding of how LLMs and agentic AI tools alter software, marketing, finance, and how youth must adapt.',
                'full_desc' => 'Demystifying AI hype into actionable skill-building. Learn how to augment your daily workflow with intelligent assistants while cultivating irreplaceable human problem-solving skills.',
                'seats_total' => 500,
                'seats_booked' => 340,
                'is_upcoming' => true,
                'registration_open' => true,
            ]
        ];
        foreach ($events as $ev) {
            Event::updateOrCreate(['slug' => $ev['slug']], $ev);
        }

        // 5. Mentors
        $mentors = [
            [
                'name' => 'Dr. Sameer Bhatt',
                'role' => 'Chief Technology Consultant',
                'organization' => 'Former Academic Dean & Industry Fellow',
                'expertise' => 'Artificial Intelligence, Higher Education, Future Skills',
                'bio' => 'Over 20 years guiding thousands of engineering and management students in career strategy and digital leadership.',
                'avatar_url' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=300&q=80',
                'linkedin_url' => 'https://linkedin.com',
                'category' => 'Academic',
                'order_index' => 1,
            ],
            [
                'name' => 'Meera Patel',
                'role' => 'Head of People & Culture',
                'organization' => 'Global Logistics Enterprises',
                'expertise' => 'Campus Recruitment, Interview Prep, Emotional Intelligence',
                'bio' => 'Passionate HR leader conducting pro-bono career coaching and resume reviews for underprivileged college graduates.',
                'avatar_url' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=300&q=80',
                'linkedin_url' => 'https://linkedin.com',
                'category' => 'Industry',
                'order_index' => 2,
            ],
            [
                'name' => 'Er. Rajesh Parmar',
                'role' => 'Hardware Innovation Architect',
                'organization' => 'Vadodara Tech Hub',
                'expertise' => 'Embedded Systems, IoT, Rapid Prototyping',
                'bio' => 'Director of Yuvalay MakerSpace. Mentors students turning theoretical STEM knowledge into patentable hardware prototypes.',
                'avatar_url' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=300&q=80',
                'linkedin_url' => 'https://linkedin.com',
                'category' => 'Innovation',
                'order_index' => 3,
            ],
            [
                'name' => 'Ananya Joshi',
                'role' => 'Senior Counsel & CSR Lead',
                'organization' => 'Apex Legal & Social Foundation',
                'expertise' => 'Youth Leadership, Ethics, Public Advocacy',
                'bio' => 'Advocate facilitating Youth Leadership Labs and empowering young women with legal awareness and executive communication.',
                'avatar_url' => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=300&q=80',
                'linkedin_url' => 'https://linkedin.com',
                'category' => 'Leadership',
                'order_index' => 4,
            ],
        ];
        foreach ($mentors as $m) {
            Mentor::updateOrCreate(['name' => $m['name']], $m);
        }

        // 6. Success Stories
        $stories = [
            [
                'name' => 'Ketan Trivedi',
                'role' => 'Junior Cloud Engineer',
                'organization' => 'Tata Consultancy Services',
                'story_quote' => 'Yuvalay gave me the exact confidence I needed to clear technical rounds and speak with clarity.',
                'full_story' => 'Coming from a vernacular medium background, public speaking and campus interviews terrified Ketan. After completing Yuvalay\'s Communication & Career Launchpad modules, Ketan secured his first software role with highest praise from recruiters.',
                'program_name' => 'Career Launchpad & Communication',
                'avatar_url' => 'https://images.unsplash.com/photo-1539571696357-5a69c17a67c6?auto=format&fit=crop&w=300&q=80',
                'is_featured' => true,
                'order_index' => 1,
            ],
            [
                'name' => 'Pooja Shah',
                'role' => 'Hardware Prototyping Specialist',
                'organization' => 'CleanTech Startups Vadodara',
                'story_quote' => 'The MakerSpace allowed me to build my first IoT water monitor prototype without expensive lab costs.',
                'full_story' => 'Pooja used Yuvalay MakerSpace 3D printers and microcontrollers to design an affordable IoT water filtration sensor that won 2nd prize at the state innovation expo.',
                'program_name' => 'MakerSpace Innovation Challenge',
                'avatar_url' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=300&q=80',
                'is_featured' => true,
                'order_index' => 2,
            ],
            [
                'name' => 'Harshvardhan Rao',
                'role' => 'Community Outreach Fellow',
                'organization' => 'Teach for India Volunteer Alum',
                'story_quote' => 'Leading Yuvalay PRAYAAS camps in rural schools helped me find my life calling in educational development.',
                'full_story' => 'Harshvardhan joined as a weekend student volunteer in 2021. Today he spearheads youth literacy drives impacting over 1,500 middle school students across Panchmahal district.',
                'program_name' => 'PRAYAAS Youth Outreach',
                'avatar_url' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=300&q=80',
                'is_featured' => true,
                'order_index' => 3,
            ]
        ];
        foreach ($stories as $s) {
            SuccessStory::updateOrCreate(['name' => $s['name']], $s);
        }

        // 7. Sample Initial Enquiries for Admin Inbox
        Enquiry::create([
            'type' => 'student',
            'name' => 'Devanshi Patel',
            'email' => 'devanshi.p@example.com',
            'phone' => '+91 98250 12345',
            'organization' => 'Parul University',
            'designation' => 'B.Tech IT, 3rd Year',
            'interests' => 'Career Clarity Workshop, Resume Building',
            'message' => 'Hello! I want to enroll in the upcoming weekend workshop on career clarity and mock interviews.',
            'status' => 'pending',
        ]);
        Enquiry::create([
            'type' => 'institution',
            'name' => 'Prof. K. R. Solanki',
            'email' => 'dean.engineering@ckpcet.ac.in',
            'phone' => '+91 94280 98765',
            'organization' => 'CKPCET Engineering College',
            'designation' => 'Dean of Student Affairs',
            'interests' => 'Campus Leadership Lab & MakerSpace Setup',
            'message' => 'We would like to organize a 3-day on-campus youth empowerment and design thinking camp for our pre-final year students.',
            'status' => 'pending',
        ]);
        Enquiry::create([
            'type' => 'volunteer',
            'name' => 'Rohan Mehta',
            'email' => 'rohan.mehta22@gmail.com',
            'phone' => '+91 99099 44332',
            'organization' => 'Baroda High School Alum',
            'designation' => 'Undergraduate Student',
            'interests' => 'Event Coordination, Media & Photography',
            'message' => 'I would love to volunteer for the upcoming Maker-Hackathon as a volunteer photographer and logistics coordinator.',
            'status' => 'reviewed',
        ]);
    }
}
