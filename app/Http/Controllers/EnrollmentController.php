<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function index(Request $request)
    {
        $enrollments = Enrollment::query()
            ->oldest()
            ->get();

        return view('enrollments.index', ['enrollments' => $enrollments]);
    }
    public function create()
    {
        return view('enrollments.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_name' => 'required|string|max:100',
            'enrollment_date' => 'required|date',

        ]);

        Enrollment::create($validated);
        return redirect()->route('enrollments.index')->with('success', 'Enrollment created successfully.');
    }
}