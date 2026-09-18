<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student Management System</title>
</head>

<body>
    <h1>Welcome to Student Management System,</h1>

    <p><strong>ID:</strong> {{ $student->formatted_id }}</p>
    <p><strong>First Name:</strong> {{ $student->first_name }}</p>
    <p><strong>Last Name:</strong> {{ $student->last_name }}</p>
    <p><strong>Email:</strong> {{ $student->email }}</p>
    <p><strong>Phone:</strong> {{ $student->phone }}</p>
    <p><strong>Age:</strong> {{ $student->age }}</p>
    <p><strong>Gender:</strong> {{ $student->gender }}</p>
    <p><strong>Date of Registration:</strong> {{ $student->created_at }}</p>
    <p><strong>Status:</strong> {{ $student->status }}</p>
    <a href="{{ route('students.index') }}">Back to Students</a>
</body>

</html>