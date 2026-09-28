<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;

class ProgramController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->query('category', 'All');
        $query = Program::query();

        if ($category !== 'All' && !empty($category)) {
            $query->where('category', $category);
        }

        $programs = $query->orderBy('order_index')->get();
        $categories = ['All', 'Career', 'Communication', 'Leadership', 'Innovation', 'Personal Growth', 'Creativity'];

        return view('pages.programs', compact('programs', 'categories', 'category'));
    }

    public function show($slug)
    {
        $program = Program::where('slug', $slug)->firstOrFail();
        $relatedPrograms = Program::where('category', $program->category)->where('id', '!=', $program->id)->take(3)->get();

        return view('pages.program-detail', compact('program', 'relatedPrograms'));
    }
}
