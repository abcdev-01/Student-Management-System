<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $courses = Course::query()
            ->oldest()
            ->get();

        return view('courses.index', ['courses' => $courses]);
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'duration' => 'required|integer|min:3|max:4',
            'status' => 'required|in:active,inactive',
        ]);

        Course::create($validated);
        return redirect()->route('courses.index')->with('success', 'Course created successfully.');
    }
}