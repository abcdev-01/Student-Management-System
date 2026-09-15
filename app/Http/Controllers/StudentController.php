<?php
namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
class StudentController extends Controller
{
    public function index()
    {
        $students = Student::latest()->get();
        return view('students', ['students' => $students]);
    }
    public function create()
    {
        return view('students.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:20'
        ]);

        Student::create($validated);
        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);

        return view('students.show', ['student' => $student]);

    }
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', ['student' => $student]);
    }
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:20'
        ]);
        $student->update($validated);
        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}

