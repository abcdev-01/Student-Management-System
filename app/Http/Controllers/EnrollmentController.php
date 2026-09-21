<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Student;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EnrollmentController extends Controller
{

    public function index(Request $request)
    {
        $enrollments = Enrollment::with(['student', 'course'])
            ->oldest()
            ->get();

        return view('enrollments.index', ['enrollments' => $enrollments]);
    }

    public function create()
    {
        $students = Student::orderBy('first_name')->get();
        $courses = Course::orderBy('course_name')->get();

        return view('enrollments.create', [
            'students' => $students,
            'courses' => $courses,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => [
                'required',
                'exists:courses,id',
                Rule::unique('enrollments', 'course_id')->where(
                    fn($q) => $q->where('student_id', $request->input('student_id'))
                ),
            ],
            'enrollment_date' => 'required|date|before_or_equal:today',
        ], [
            'student_id.exists' => 'The selected student does not exist.',
            'course_id.exists' => 'The selected course does not exist.',
            'course_id.unique' => 'This student is already enrolled in the selected course.',
            'enrollment_date.before_or_equal' => 'The enrollment date cannot be in the future.',
        ]);

        try {
            Enrollment::create($validated);
        } catch (QueryException $e) {
            return back()
                ->withInput()
                ->withErrors(['course_id' => 'This student is already enrolled in the selected course.']);
        }

        return redirect()
            ->route('enrollments.index')
            ->with('success', 'Enrollment created successfully.');
    }

    /** DELETE /enrollments/{enrollment} — remove an enrollment. */
    public function destroy($id)
    {
        $enrollment = Enrollment::findOrFail($id);
        $enrollment->delete();

        return redirect()
            ->route('enrollments.index')
            ->with('success', 'Enrollment removed successfully.');
    }
}