<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function list(Request $request)
    {
        $query = Student::query();

        if ($request->filled('search')) {
            $query->where('full_name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('course_id')) {
            $query->whereHas('courses', function ($q) use ($request) {
                $q->where('courses.id', $request->course_id);
            });
        }

        return response()->json($query->with('courses')->orderBy('id', 'desc')->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'age' => 'required|integer|min:16',
            'phone_number' => 'required|string|max:20',
            'gender' => 'required|in:Male,Female,Other',
            'registration_date' => 'required|date',
            'status' => 'required|in:Active,Graduated,Dropped',
        ]);

        $student = Student::create($validated);

        return response()->json([
            'success' => true,
            'student' => $student
        ], 201);
    }

    public function show(Student $student)
    {
        return response()->json($student->load('courses'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'age' => 'required|integer|min:16',
            'phone_number' => 'required|string|max:20',
            'gender' => 'required|in:Male,Female,Other',
            'registration_date' => 'required|date',
            'status' => 'required|in:Active,Graduated,Dropped',
        ]);

        $student->update($validated);

        return response()->json([
            'success' => true,
            'student' => $student
        ]);
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return response()->json(['success' => true]);
    }
}