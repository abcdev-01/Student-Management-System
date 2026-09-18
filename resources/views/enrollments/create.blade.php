<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System </title>
</head>

<body>
    <form action="{{ route('enrollments.store') }}" method="POST">
        @csrf
        <div>
            <label for="student_id">Student</label>
            <select name="student_id" id="student_id" required>
                @foreach($students as $student)
                    <option value="{{ $student->id }}">{{ $student->first_name }} {{ $student->last_name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="course_id">Course</label>
            <select name="course_id" id="course_id" required>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                @endforeach
            </select>
        </div>
        <button type="button" onclick="window.location.href='{{ route('enrollments.index') }}'">Back</button>
        <button type="submit">Enroll Student</button>
    </form>

</body>

</html>