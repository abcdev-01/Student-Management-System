<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function enroll(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'enrollment_date' => 'required|date',
        ]);

        $student = Student::findOrFail($request->student_id);

        if ($student->courses()->where('course_id', $request->course_id)->exists()) {
            return response()->json([
                'error' => 'Student is already enrolled in this course.'
            ], 422);
        }

        $student->courses()->attach($request->course_id, [
            'enrollment_date' => $request->enrollment_date,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Enrolled successfully.',
        ]);
    }

    public function studentEnrollments(Student $student)
    {
        return response()->json($student->courses);
    }
}