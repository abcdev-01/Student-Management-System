@extends('layouts.app')

@section('title', 'Student Roster')

@section('content')
    <div class="nav-links">
        <a href="{{ route('students.index') }}">Students</a>
        <a href="{{ route('courses.index') }}">Courses</a>
        <a href="{{ route('enrollments.index') }}">Enrollments</a>
    </div>

    <div class="card">
        <h2>Core Student Roster Database</h2>

        <div class="flex-actions">
            <form method="GET" action="{{ route('students.index') }}" class="flex-actions" style="margin-bottom:0;">
                <input type="text" name="search" placeholder="Search by name ..." value="{{ request('search') }}" style="width: 250px;">

                <select name="status">
                    <option value="">-- Status View Filter --</option>
                    <option value="Active" {{ request('status') == 'Active' ? 'selected' : '' }}>Active Only</option>
                    <option value="Graduated" {{ request('status') == 'Graduated' ? 'selected' : '' }}>Graduated Only</option>
                    <option value="Dropped" {{ request('status') == 'Dropped' ? 'selected' : '' }}>Dropped Only</option>
                </select>

                <select name="course_id">
                    <option value="">-- Filter by Enrolled Course --</option>
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}" {{ request('course_id') == $course->id ? 'selected' : '' }}>
                            {{ $course->course_name }}
                        </option>
                    @endforeach
                </select>

                <button type="submit" class="btn-sm">Filter</button>
                <a href="{{ route('students.index') }}" class="btn-secondary btn-sm">Reset</a>
            </form>

            <a href="{{ route('students.create') }}" class="btn">Register Student</a>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Email Address</th>
                        <th>Status</th>
                        <th>Registered</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($students as $student)
                        <tr>
                            <td>{{ $student->full_name }}</td>
                            <td>{{ $student->email }}</td>
                            <td><span class="badge {{ $student->status }}">{{ $student->status }}</span></td>
                            <td>{{ $student->registration_date }}</td>
                            <td>
                                <a href="{{ route('students.show', $student) }}" class="btn-secondary btn-sm">View</a>
                                <a href="{{ route('students.edit', $student) }}" class="btn-sm">Edit</a>
                                <form action="{{ route('students.destroy', $student) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-danger btn-sm" onclick="return confirm('Confirm student profile purging?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">No students found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection