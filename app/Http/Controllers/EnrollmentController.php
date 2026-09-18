<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Course;
use App\Models\Student;
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
        $students = Student::all();
        $courses = Course::all();
        return view('enrollments.create', ['students' => $students, 'courses' => $courses]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'enrollment_date' => 'required|date',

        ]);

        Enrollment::create($validated);
        return redirect()->route('enrollments.index')->with('success', 'Enrollment created successfully.');
    }
}