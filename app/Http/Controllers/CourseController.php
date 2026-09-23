<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function list()
    {
        return response()->json(Course::orderBy('id', 'desc')->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_code' => 'required|string|unique:courses,course_code',
            'course_name' => 'required|string|max:255',
        ]);

        $course = Course::create($validated);

        return response()->json([
            'success' => true,
            'course' => $course
        ], 201);
    }

    public function destroy(Course $course)
    {
        if ($course->students()->exists()) {
            return response()->json([
                'error' => 'Cannot delete course with enrolled students.'
            ], 422);
        }

        $course->delete();

        return response()->json(['success' => true]);
    }
}