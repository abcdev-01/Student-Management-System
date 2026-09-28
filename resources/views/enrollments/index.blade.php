@extends('layouts.app')

@section('title', 'Enrollments')

@section('content')
    <div class="content-card">
        <h2 class="card-heading">Course Enrollments</h2>

        <div class="toolbar">
            <span></span>
            <a href="{{ route('enrollments.create') }}" class="btn-add-enrollment">New Enrollment</a>
        </div>

        <div class="table-wrapper">
            <table class="data-table">
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
                                <a href="{{ route('enrollments.edit', $enrollment) }}" class="btn-edit">Edit</a>
                                <form action="{{ route('enrollments.destroy', $enrollment) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete"
                                        onclick="return confirm('Delete this enrollment?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="empty-row">No enrollments found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection