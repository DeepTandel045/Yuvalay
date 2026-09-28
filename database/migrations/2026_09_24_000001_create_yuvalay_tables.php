<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // 1. Enquiries Table (FR-11, FR-12, FR-13)
        Schema::create('enquiries', function (Blueprint $table) {
            $table->id();
            $table->string('type', 50); // student, institution, volunteer, csr, mentor
            $table->string('name');
            $table->string('email');
            $table->string('phone', 30)->nullable();
            $table->string('organization')->nullable();
            $table->string('designation')->nullable();
            $table->text('interests')->nullable();
            $table->text('message')->nullable();
            $table->string('status', 20)->default('pending'); // pending, reviewed
            $table->timestamps();
        });

        // 2. Events Table (FR-7, FR-8)
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title');
            $table->string('category', 50)->default('Workshop'); // Workshop, Webinar, Hackathon, Gupshup, Community Drive
            $table->string('date_str'); // e.g. '2026-10-15'
            $table->string('time_str'); // e.g. '5:00 PM - 6:30 PM IST'
            $table->string('mode', 30)->default('Online'); // Online, In-person, Hybrid
            $table->string('location');
            $table->string('speaker_name');
            $table->string('speaker_role');
            $table->string('speaker_avatar')->nullable();
            $table->text('short_desc');
            $table->longText('full_desc');
            $table->integer('seats_total')->default(100);
            $table->integer('seats_booked')->default(0);
            $table->boolean('is_upcoming')->default(true);
            $table->boolean('registration_open')->default(true);
            $table->timestamps();
        });

        // 3. Event Registrations Table (FR-9, FR-10)
        Schema::create('event_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained('events')->onDelete('cascade');
            $table->string('name');
            $table->string('email');
            $table->string('phone', 30);
            $table->string('role', 50)->default('Student'); // Student, Professional, Faculty, Other
            $table->text('notes')->nullable();
            $table->timestamps();
        });

        // 4. Programs Table (FR-1, FR-3)
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title');
            $table->string('category', 50); // Career, Communication, Leadership, Innovation, Personal Growth, Creativity
            $table->text('short_desc');
            $table->longText('full_desc');
            $table->string('duration');
            $table->string('target_audience');
            $table->json('outcomes')->nullable();
            $table->json('features')->nullable();
            $table->string('image_url')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->integer('order_index')->default(0);
            $table->timestamps();
        });

        // 5. Mentors / Faculty Network Table (FR-16, FR-17)
        Schema::create('mentors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('role');
            $table->string('organization');
            $table->string('expertise');
            $table->text('bio');
            $table->string('avatar_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('category', 50)->default('Industry'); // Industry, Academic, Leadership, Innovation
            $table->integer('order_index')->default(0);
            $table->timestamps();
        });

        // 6. Success Stories Table (FR-14, FR-15)
        Schema::create('success_stories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('role');
            $table->string('organization')->nullable();
            $table->text('story_quote');
            $table->longText('full_story');
            $table->string('program_name');
            $table->string('avatar_url')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->integer('order_index')->default(0);
            $table->timestamps();
        });

        // 7. Impact Statistics Table (FR-1, FR-19)
        Schema::create('impact_stats', function (Blueprint $table) {
            $table->id();
            $table->string('key_name')->unique();
            $table->string('label');
            $table->string('value');
            $table->text('description')->nullable();
            $table->string('icon_name', 50)->default('award');
            $table->integer('order_index')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('impact_stats');
        Schema::dropIfExists('success_stories');
        Schema::dropIfExists('mentors');
        Schema::dropIfExists('programs');
        Schema::dropIfExists('event_registrations');
        Schema::dropIfExists('events');
        Schema::dropIfExists('enquiries');
    }
};
