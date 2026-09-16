<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student Management System</title>
</head>

<body>
    <h1>Welcome to Student Management System,</h1>

    <p><strong>ID:</strong> {{ $student->formatted_id }}</p>
    <p><strong>Full Name:</strong> {{ $student->full_name }}</p>
    <p><strong>Email:</strong> {{ $student->email }}</p>
    <p><strong>Age:</strong> {{ $student->age }}</p>
    <p><strong>Course:</strong> {{ $student->course }}</p>

    <a href="{{ route('students.index') }}">Back to Students</a>
</body>

</html>