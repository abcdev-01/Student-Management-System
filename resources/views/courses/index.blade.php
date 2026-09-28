@extends('layouts.app')

@section('title', 'Courses List')

@section('content')
    <div class="nav-links">
        <a href="{{ route('students.index') }}">Students</a>
        <a href="{{ route('courses.index') }}">Courses</a>
        <a href="{{ route('enrollments.index') }}">Enrollments</a>
    </div>

    <div class="card">
        <h2>Course List</h2>

        <div class="flex-actions">
            <a href="{{ route('courses.create') }}" class="btn">Create New Course</a>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Created_at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($courses as $course)
                        <tr>
                            <td>{{ $course->course_code }}</td>
                            <td>{{ $course->course_name }}</td>
                            <td>{{ $course->created_at }}</td>
                            <td>
                                <a href="{{ route('courses.edit', $course) }}" class="btn-sm">Edit</a>
                                <form action="{{ route('courses.destroy', $course) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-danger btn-sm"
                                        onclick="return confirm('Delete this course? Students enrolled in it will lose the enrollment.')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">No courses found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection