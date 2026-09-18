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
        <a href="{{ route('students.index') }}">Cancel Search</a>
        <label for="">Filter By Course</label>
        <input type="text" name="filterByCourse" id="filterByCourse" placeholder="filter By Course...."
            value="{{ request('filterByCourse') }}">
        <label for="">Filter By Status</label>
        <select name="filterByStatus" id="filterByStatus">
            <option value="">---Status---</option>
            <option value="active" {{ request('filterByStatus') === 'active' ? 'selected' : '' }}>Active</option>
            <option value="graduated" {{ request('filterByStatus') === 'graduated' ? 'selected' : '' }}>Graduated</option>
            <option value="dropped" {{ request('filterByStatus') === 'dropped' ? 'selected' : '' }}>Dropped</option>
        </select>
        <button type="submit">Apply Filter</button>
        <a href="{{ route('students.index') }}">Cancel Filter</a>
    </form>
    <table border=" 1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Registered at</th>
                <th>Course Enrolled</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($students as $student)
                <tr>
                    <td>{{ $student->formatted_id }}</td>
                    <td><a href="{{ route('students.edit', $student->id) }}">{{ $student->full_name }}</a></td>
                    <td>{{ $student->email }}</td>
                    <td>{{$student->phone_number}}</td>
                    <td>{{ $student->age }}</td>
                    <td>{{$student->gender}}</td>
                    <td>{{$student->created_at->format('Y-m-d')}}</td>
                    <td>@forelse($student->enrollments as $enrollment)
                        <tr>
                            <td>{{ $enrollment->course->course_name }}</td>
                        </tr>
                    @empty
                    <tr>
                        <td>---</td>
                    </tr>
                @endforelse
                </td>
                <td><b>{{$student->status}}</b>
                </td>
                <td>
                    <a href="{{ route('students.show', $student->id) }}">view</a>

                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Delete this student?')">Delete</button>
                    </form>
                </td>
                </tr>
            @empty
                <tr>
                    <td colspan="10">No students found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>