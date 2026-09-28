@extends('layouts.app')

@section('title', 'Student List')

@section('content')
    <div class="content-card">
        <h2 class="card-heading">List of Student available</h2>

        <div class="toolbar">
            <form method="GET" action="{{ route('students.index') }}" class="filter-form">
                <input type="text" name="search" class="filter-input" placeholder="Search by name ..."
                    value="{{ request('search') }}" style="width: 250px;">

                <select name="status" class="filter-select">
                    <option value="">-- Status View Filter --</option>
                    <option value="Active" {{ request('status') == 'Active' ? 'selected' : '' }}>Active Only</option>
                    <option value="Graduated" {{ request('status') == 'Graduated' ? 'selected' : '' }}>Graduated Only</option>
                    <option value="Dropped" {{ request('status') == 'Dropped' ? 'selected' : '' }}>Dropped Only</option>
                </select>

                <select name="course_id" class="filter-select">
                    <option value="">-- Filter by Enrolled Course --</option>
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}" {{ request('course_id') == $course->id ? 'selected' : '' }}>
                            {{ $course->course_name }}
                        </option>
                    @endforeach
                </select>

                <button type="submit" class="btn-apply-filter">Apply Filter</button>
                <a href="{{ route('students.index') }}" class="btn-clear-filter">Clear Filter</a>
            </form>

            <a href="{{ route('students.create') }}" class="btn-add-student">Register Student</a>
        </div>

        <div class="table-wrapper">
            <table class="data-table">
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
                            <td>
                                <span class="status-badge status-{{ strtolower($student->status) }}">
                                    {{ $student->status }}
                                </span>
                            </td>
                            <td>{{ $student->registration_date }}</td>
                            <td>
                                <a href="{{ route('students.show', $student) }}" class="btn-view">View</a>
                                <a href="{{ route('students.edit', $student) }}" class="btn-edit">Edit</a>
                                <form action="{{ route('students.destroy', $student) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete"
                                        onclick="return confirm('Confirm student profile purging?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="empty-row">No students found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection