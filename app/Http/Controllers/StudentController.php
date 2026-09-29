<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $query = Student::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('course_id')) {
            $query->whereHas('courses', function ($q) use ($request) {
                $q->where('courses.id', $request->course_id);
            });
        }

        $students = $query->get();
        $courses = Course::all();

        return view('students.index', compact('students', 'courses'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'age' => 'required|integer|min:16|max:70',
            'phone_number' => 'required|string|max:20',
            'gender' => 'required|in:Male,Female',
            'registration_date' => 'required|date',
            'status' => 'required|in:Active,Graduated,Dropped',
        ]);

        Student::create($validated);

        return redirect()->route('students.index')->with('success', 'Student registered successfully.');
    }

    public function show(Student $student)
    {
        $student->load('courses');
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'age' => 'required|integer|min:16|max:70',
            'phone_number' => 'required|string|max:20',
            'gender' => 'required|in:Male,Female',
            'registration_date' => 'required|date',
            'status' => 'required|in:Active,Graduated,Dropped',
        ]);

        $student->update($validated);

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}