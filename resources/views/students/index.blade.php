<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student Management System</title>
</head>

<body>
    <h1>Students</h1>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif
    <a href="{{ route('home') }}">Home
    </a>
    <a href="{{ route('students.create') }}">Add Student
    </a>
    <form action="{{ route('students.index') }}" method="GET">
        <label for="search">
            Search:
        </label>
        <input type="text" id="search" name="search" placeholder="Enter student name........"
            value="{{ request('search') }}">
        <button type="submit">Search</button>
        <a href="{{ route('students.index') }}">Clear</a>
    </form>
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>Course</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($students as $student)
                <tr>
                    <td>{{ $student->formatted_id }}</td>
                    <td><a href="{{ route('students.show', $student->id) }}">{{ $student->full_name }}</a></td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->age }}</td>
                    <td>{{ $student->course }}</td>
                    <td>
                        <a href="{{ route('students.edit', $student->id) }}">Edit</a>

                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Delete this student?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No students found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>