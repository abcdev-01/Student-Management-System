<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
</head>

<body>
    <form action="{{ route('courses.store') }}" method="POST">
        @csrf
        <div>
            <label for="course_name">Course Name</label>
            <input type="text" name="course_name" id="course_name" required>
        </div>
        <div>
            <label for="course_code">Course Code</label>
            <input type="text" name="course_code" id="course_code" required>
        </div>
        <button type="submit">Create Course</button>
    </form>
</body>

</html>