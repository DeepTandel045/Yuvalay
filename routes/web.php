<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;

/*
|--------------------------------------------------------------------------
| Public SEO-Optimized Web Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/about', [PublicController::class, 'about'])->name('about');
Route::get('/community', [PublicController::class, 'community'])->name('community');
Route::get('/gallery', [PublicController::class, 'gallery'])->name('gallery');
Route::get('/volunteer', [PublicController::class, 'volunteer'])->name('volunteer');
Route::get('/resources', [PublicController::class, 'resources'])->name('resources');
Route::get('/sitemap.xml', [PublicController::class, 'sitemap'])->name('sitemap');

// Programs
Route::get('/programs', [ProgramController::class, 'index'])->name('programs.index');
Route::get('/programs/{slug}', [ProgramController::class, 'show'])->name('programs.show');

// Events & RSVP
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/{slug}', [EventController::class, 'show'])->name('events.show');
Route::post('/events/{slug}/register', [EventController::class, 'register'])->name('events.register');

// Mentors & Faculty Network
Route::get('/mentors', [MentorController::class, 'index'])->name('mentors.index');

// Success Stories
Route::get('/stories', [StoryController::class, 'index'])->name('stories.index');

// Role-Specific Contact & Enquiry Engine
Route::get('/contact', [EnquiryController::class, 'contact'])->name('contact');
Route::post('/enquiry/submit', [EnquiryController::class, 'submit'])->name('enquiry.submit');

/*
|--------------------------------------------------------------------------
| 301 Legacy SEO Redirects from old yuvalay.org
|--------------------------------------------------------------------------
*/
Route::redirect('/about/about-yuvalay.html', '/about', 301);
Route::redirect('/courses/upcoming.html', '/events', 301);
Route::redirect('/courses/how-we-transform.html', '/programs', 301);
Route::redirect('/courses/completed.html', '/events', 301);
Route::redirect('/courses/faculty.html', '/mentors', 301);
Route::redirect('/courses/students-speak.html', '/stories', 301);
Route::redirect('/services/library.html', '/resources', 301);
Route::redirect('/services/yearn-to-learn.html', '/programs', 301);
Route::redirect('/new-initiatives.html', '/community', 301);
Route::redirect('/gallery/seminars.html', '/gallery', 301);
Route::redirect('/registration.html', '/contact', 301);
Route::redirect('/contact.html', '/contact', 301);
Route::redirect('/index.html', '/', 301);

/*
|--------------------------------------------------------------------------
| Admin Portal & CMS Routes (Option 3 Semi-Dynamic)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login']);
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    Route::middleware('auth')->group(function () {
        Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::get('/dashboard', [AdminDashboardController::class, 'index']);

        // Enquiries Central Inbox
        Route::get('/enquiries', [AdminDashboardController::class, 'enquiries'])->name('enquiries.index');
        Route::post('/enquiries/{id}/toggle', [AdminDashboardController::class, 'toggleEnquiryStatus'])->name('enquiries.toggle');
        Route::delete('/enquiries/{id}', [AdminDashboardController::class, 'deleteEnquiry'])->name('enquiries.destroy');

        // Events CRUD & Registrations
        Route::get('/events', [AdminDashboardController::class, 'events'])->name('events.index');
        Route::get('/events/create', [AdminDashboardController::class, 'createEvent'])->name('events.create');
        Route::post('/events', [AdminDashboardController::class, 'storeEvent'])->name('events.store');
        Route::get('/events/{id}/edit', [AdminDashboardController::class, 'editEvent'])->name('events.edit');
        Route::put('/events/{id}', [AdminDashboardController::class, 'updateEvent'])->name('events.update');
        Route::delete('/events/{id}', [AdminDashboardController::class, 'deleteEvent'])->name('events.destroy');
        Route::get('/events/{id}/registrations', [AdminDashboardController::class, 'eventRegistrations'])->name('events.registrations');

        // Success Stories
        Route::get('/stories', [AdminDashboardController::class, 'stories'])->name('stories.index');
        Route::post('/stories', [AdminDashboardController::class, 'storeStory'])->name('stories.store');
        Route::delete('/stories/{id}', [AdminDashboardController::class, 'deleteStory'])->name('stories.destroy');

        // Mentors
        Route::get('/mentors', [AdminDashboardController::class, 'mentors'])->name('mentors.index');
        Route::post('/mentors', [AdminDashboardController::class, 'storeMentor'])->name('mentors.store');
        Route::delete('/mentors/{id}', [AdminDashboardController::class, 'deleteMentor'])->name('mentors.destroy');

        // Impact Statistics
        Route::get('/stats', [AdminDashboardController::class, 'stats'])->name('stats.index');
        Route::put('/stats/{id}', [AdminDashboardController::class, 'updateStat'])->name('stats.update');
    });
});
