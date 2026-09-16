<?php
namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
class StudentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $students = Student::query()
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('first_name', 'like', "%{$search}%")
                        ->orWhere('last_name', 'like', "%{$search}%")
                        ->orwhereRaw("CONCAT(first_name, ' ', last_name) LIKE ?", ["%{$search}%"]);
                });
            })
            ->oldest()
            ->get();
        return view('students.index', ['students' => $students]);
    }
    public function create()
    {
        return view('students.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|email|unique:students',
            'age' => 'required|integer|min:0',
            'course' => 'required|string|max:100'
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
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'age' => 'required|integer|min:0',
            'course' => 'required|string|max:100'

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

