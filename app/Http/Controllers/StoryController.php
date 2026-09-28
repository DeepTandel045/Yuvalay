<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuccessStory;

class StoryController extends Controller
{
    public function index()
    {
        $stories = SuccessStory::orderBy('order_index')->get();
        return view('pages.stories', compact('stories'));
    }
}
