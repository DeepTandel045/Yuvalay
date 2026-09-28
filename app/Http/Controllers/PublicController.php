<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImpactStat;
use App\Models\Event;
use App\Models\Program;
use App\Models\SuccessStory;
use App\Models\Mentor;

class PublicController extends Controller
{
    public function home()
    {
        $stats = ImpactStat::orderBy('order_index')->get();
        $upcomingEvents = Event::where('is_upcoming', true)->orderBy('date_str', 'asc')->take(3)->get();
        $nextEvent = $upcomingEvents->first();
        $featuredPrograms = Program::where('is_featured', true)->orderBy('order_index')->take(4)->get();
        $featuredStories = SuccessStory::where('is_featured', true)->orderBy('order_index')->take(3)->get();

        return view('pages.home', compact('stats', 'upcomingEvents', 'nextEvent', 'featuredPrograms', 'featuredStories'));
    }

    public function about()
    {
        $stats = ImpactStat::orderBy('order_index')->get();
        return view('pages.about', compact('stats'));
    }

    public function community()
    {
        return view('pages.community');
    }

    public function gallery()
    {
        return view('pages.gallery');
    }

    public function volunteer()
    {
        return view('pages.volunteer');
    }

    public function resources()
    {
        return view('pages.resources');
    }

    public function sitemap()
    {
        $programs = Program::all();
        $events = Event::all();

        return response()->view('pages.sitemap', [
            'programs' => $programs,
            'events' => $events,
        ])->header('Content-Type', 'text/xml');
    }
}
