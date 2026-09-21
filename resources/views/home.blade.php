<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
</head>

<body>
    <h1>Student Management System</h1>
    <li>
        <ul><a href="{{ route('students.create') }}">Student Registration</a></ul>
        <ul><a href="{{ route('students.index') }}">Students Details</a></ul>
        <ul> <a href="{{ route('courses.index') }}">Courses Management</a></ul>
    </li>
</body>

</html>