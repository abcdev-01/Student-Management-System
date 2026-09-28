@extends('layouts.app')

@section('title', 'Courses')

@section('content')
    <div class="content-card">
        <h2 class="card-heading">Course List</h2>

        <div class="toolbar">
            <span></span>
            <a href="{{ route('courses.create') }}" class="btn-add-course">Create New Course</a>
        </div>

        <div class="table-wrapper">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Created at</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($courses as $course)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $course->course_code }}</td>
                            <td>{{ $course->course_name }}</td>
                            <td>{{ $course->created_at}}</td>
                            <td>
                                <a href="{{ route('courses.show', $course) }}" class="btn-view">View</a>
                                <a href="{{ route('courses.edit', $course) }}" class="btn-edit">Edit</a>
                                <form action="{{ route('courses.destroy', $course) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete"
                                        onclick="return confirm('Delete this course? Students enrolled in it will lose the enrollment.')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="empty-row">No courses found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection