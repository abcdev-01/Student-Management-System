<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
</head>

<body>
    <h1>Enrollments</h1>
    <a href="{{ route('home') }}">Home</a>
    <a href="{{ route('enrollments.create') }}">Add Enrollment</a>
    <table border="1" cellpading="6" cellspacing="0">
        <thead>
            <tr>
                <th>Student</th>
                <th>Course</th>
                <th>Enrollment Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($enrollments as $enrollment)
                <tr>
                    <td>{{ $enrollment->student->full_name }}</td>
                    <td>{{ $enrollment->course->course_name }}</td>
                    <td>{{ $enrollment->created_at->format('Y-m-d') }}</td>
                    <td>
                        <form action="{{ route('enrollments.destroy', $enrollment->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete this Enrollment</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No enrollments found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>