<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
</head>

<body>
    <h1>Courses</h1>
    <a href="{{ route('courses.create') }}">add Course</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Course Name</th>
                <th>Course Code</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($courses as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td><a href="{{ route('courses.edit', $course->id) }}">{{ $course->course_name }}</a></td>
                    <td>{{ $course->course_code }}</td>
                    <td>
                        <form action="{{ route('courses.destroy', $course->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No courses found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>