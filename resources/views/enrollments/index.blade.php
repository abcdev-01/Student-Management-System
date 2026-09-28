@extends('layouts.app')
@section('content')
    <div class="nav-links">
        <a href="{{ route('students.index') }}">Students</a>
        <a href="{{ route('courses.index') }}">Courses</a>
        <a href="{{ route('enrollments.index') }}">Enrollments</a>
    </div>

    <div class="card">
        <h2>Course Enrollments</h2>

        <div class="flex-actions">
            <a href="{{ route('enrollments.create') }}" class="btn">New Enrollment</a>
        </div>

        <div class="table-container">
            <table>
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
                            <td>{{ $enrollment->enrollment_date }}</td>
                            <td>
                                <a href="{{ route('enrollments.edit', $enrollment) }}" class="btn-sm">Edit</a>
                                <form action="{{ route('enrollments.destroy', $enrollment) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-danger btn-sm" onclick="return confirm('Delete this enrollment?')">Delete</button>
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
        </div>
    </div>
@endsection