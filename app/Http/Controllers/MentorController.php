<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mentor;

class MentorController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->query('category', 'All');
        $query = Mentor::query();

        if ($category !== 'All' && !empty($category)) {
            $query->where('category', $category);
        }

        $mentors = $query->orderBy('order_index')->get();
        $categories = ['All', 'Industry', 'Academic', 'Innovation', 'Leadership'];

        return view('pages.mentors', compact('mentors', 'categories', 'category'));
    }
}
