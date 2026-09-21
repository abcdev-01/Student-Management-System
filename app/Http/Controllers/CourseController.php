<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
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
        $students = Student::all();
        return
            view('courses.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_name' => 'required|string|max:100',
            'course_code' => 'required|string|max:10|unique:courses',
            'duration' => 'required|integer|min:3|max:4',
            'status' => 'required|in:active,inactive',
        ]);

        Course::create($validated);
        return redirect()->route('courses.index')->with('success', 'Course created successfully.');
    }

    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        $validated = $request->validate([
            'course_name' => 'required|string|max:100',
            'course_code' => 'required|string|max:10|unique:courses,course_code,' . $course->id,
            'duration' => 'required|integer|min:3|max:4',
            'status' => 'required|in:active,inactive',
        ]);

        $course->update($validated);
        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('courses.edit', ['course' => $course]);
    }
    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }
}