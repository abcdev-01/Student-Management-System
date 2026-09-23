<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>School Information System Management Workspace</title>
    <style>
        :root {
            --primary: #2563eb;
            --danger: #dc2626;
            --success: #16a34a;
            --bg: #f8fafc;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: system-ui, sans-serif;
            background: var(--bg);
            margin: 0;
            padding: 24px;
            color: #1e293b;
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 24px;
            max-width: 1400px;
            margin: 0 auto;
        }

        @media (max-width: 900px) {
            .grid {
                grid-template-columns: 1fr;
            }
        }

        .card {
            background: white;
            padding: 24px;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            margin-bottom: 24px;
        }

        h2 {
            margin-top: 0;
            border-bottom: 2px solid #e2e8f0;
            padding-bottom: 8px;
            font-size: 18px;
        }

        .form-group {
            margin-bottom: 12px;
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: 600;
            margin-bottom: 4px;
            font-size: 14px;
        }

        input,
        select {
            padding: 8px;
            border: 1px solid #cbd5e1;
            border-radius: 4px;
            font-size: 14px;
        }

        button {
            background: var(--primary);
            color: white;
            border: none;
            padding: 10px 16px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
            font-size: 14px;
        }

        button:hover {
            opacity: 0.9;
        }

        button.btn-danger {
            background: var(--danger);
        }

        button.btn-secondary {
            background: #64748b;
        }

        button.btn-sm {
            padding: 6px 10px;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 12px;
        }

        th,
        td {
            text-align: left;
            padding: 10px;
            border-bottom: 1px solid #e2e8f0;
            font-size: 14px;
        }

        th {
            background: #f1f5f9;
            font-weight: 600;
        }

        .flex-actions {
            display: flex;
            gap: 8px;
            align-items: center;
            margin-bottom: 16px;
            flex-wrap: wrap;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            align-items: center;
            justify-content: center;
            z-index: 999;
        }

        .modal-content {
            background: white;
            padding: 24px;
            border-radius: 8px;
            max-width: 500px;
            width: 90%;
            max-height: 90vh;
            overflow: auto;
        }

        .badge {
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: bold;
        }

        .badge.Active {
            background: #dcfce7;
            color: #16a34a;
        }

        .badge.Graduated {
            background: #dbeafe;
            color: #2563eb;
        }

        .badge.Dropped {
            background: #fee2e2;
            color: #dc2626;
        }
    </style>
</head>

<body>

    <div class="grid">
        <div>
            <div class="card">
                <h2 id="form-title">Register Student</h2>
                <form id="student-form">
                    <input type="hidden" id="student-id">
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" id="full_name" required>
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" id="email" required>
                    </div>
                    <div class="form-group">
                        <label>Age</label>
                        <input type="number" id="age" required min="16">
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" id="phone_number" required>
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <select id="gender" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Registration Date</label>
                        <input type="date" id="registration_date" required>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select id="status" required>
                            <option value="Active">Active</option>
                            <option value="Graduated">Graduated</option>
                            <option value="Dropped">Dropped</option>
                        </select>
                    </div>
                    <div style="display:flex; gap:8px;">
                        <button type="submit" id="save-btn">Save Student</button>
                        <button type="button" class="btn-secondary" id="cancel-edit-btn"
                            style="display:none;">Cancel</button>
                    </div>
                </form>
            </div>

            <div class="card">
                <h2>Course Architecture Configuration</h2>
                <form id="course-form">
                    <div class="form-group">
                        <label>Course Code</label>
                        <input type="text" id="course_code" placeholder="e.g. CS101" required>
                    </div>
                    <div class="form-group">
                        <label>Course Name</label>
                        <input type="text" id="course_name" placeholder="e.g. Computer Science" required>
                    </div>
                    <button type="submit">Create New Course</button>
                </form>
                <table id="courses-table">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>

            <div class="card">
                <h2>Enrollment Portal Matrix</h2>
                <form id="enrollment-form">
                    <div class="form-group">
                        <label>Select Target Student</label>
                        <select id="enroll_student_id" required>
                            <option value="">-- Choose Student --</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Select Academic Program Course</label>
                        <select id="enroll_course_id" required>
                            <option value="">-- Choose Course --</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Enrollment Execution Date</label>
                        <input type="date" id="enrollment_date" required>
                    </div>
                    <button type="submit">Complete Academic Enrollment</button>
                </form>
            </div>
        </div>

        <div>
            <div class="card">
                <h2>Core Student Roster Database</h2>
                <div class="flex-actions">
                    <input type="text" id="search-input" placeholder="Search by name lookup..." style="width: 250px;">
                    <select id="filter-status">
                        <option value="">-- Status View Filter --</option>
                        <option value="Active">Active Only</option>
                        <option value="Graduated">Graduated Only</option>
                        <option value="Dropped">Dropped Only</option>
                    </select>
                    <select id="filter-course">
                        <option value="">-- Filter by Enrolled Course --</option>
                    </select>
                </div>
                <table id="students-table">
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Email Address</th>
                            <th>Status</th>
                            <th>Registered</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal" id="details-modal">
        <div class="modal-content">
            <h2>Detailed Profile View</h2>
            <div id="details-body"></div>
            <button class="btn-secondary" onclick="closeModal('details-modal')" style="margin-top:16px;">Dismiss
                Window
                Panel</button>
        </div>
    </div>

    <script>
        const headers = {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        };

        document.addEventListener('DOMContentLoaded', () => {
            fetchStudents();
            fetchCourses();

            const today = new Date().toISOString().split('T')[0];
            document.getElementById('registration_date').value = today;
            document.getElementById('enrollment_date').value = today;

            document.getElementById('student-form').addEventListener('submit', handleSaveStudent);
            document.getElementById('course-form').addEventListener('submit', handleCreateCourse);
            document.getElementById('enrollment-form').addEventListener('submit', handleEnrollment);

            document.getElementById('search-input').addEventListener('input', fetchStudents);
            document.getElementById('filter-status').addEventListener('change', fetchStudents);
            document.getElementById('filter-course').addEventListener('change', fetchStudents);
            document.getElementById('cancel-edit-btn').addEventListener('click', resetStudentForm);
        });

        async function fetchStudents() {
            const search = document.getElementById('search-input').value;
            const status = document.getElementById('filter-status').value;
            const courseId = document.getElementById('filter-course').value;
            const params = new URLSearchParams({ search, status, course_id: courseId });
            const res = await fetch(`/api/students?${params.toString()}`);
            const students = await res.json();

            const tbody = document.querySelector('#students-table tbody');
            const studentSelect = document.getElementById('enroll_student_id');

            tbody.innerHTML = '';
            const currentSelection = studentSelect.value;
            studentSelect.innerHTML = '<option value="">-- Choose Student --</option>';

            students.forEach(student => {
                tbody.innerHTML += `
                <tr>
                    <td>${student.full_name}</td>
                    <td>${student.email}</td>
                    <td><span class="badge ${student.status}">${student.status}</span></td>
                    <td>${student.registration_date}</td>
                    <td>
                        <button class="btn-secondary btn-sm" onclick="viewStudent(${student.id})">View</button>
                        <button class="btn-sm" onclick="editStudent(${student.id})">Edit</button>
                        <button class="btn-danger btn-sm" onclick="deleteStudent(${student.id})">Delete</button>
                    </td>
                </tr>
            `;
                studentSelect.innerHTML += `<option value="${student.id}">${student.full_name}</option>`;
            });

            studentSelect.value = currentSelection;
        }

        async function fetchCourses() {
            const res = await fetch('/api/courses');
            const courses = await res.json();

            const tbody = document.querySelector('#courses-table tbody');
            const filterCourse = document.getElementById('filter-course');
            const enrollCourse = document.getElementById('enroll_course_id');

            tbody.innerHTML = '';
            filterCourse.innerHTML = '<option value="">-- Filter by Enrolled Course --</option>';
            enrollCourse.innerHTML = '<option value="">-- Choose Course --</option>';

            courses.forEach(course, => {
                tbody.innerHTML += `
                <tr>
                    <td>${course.course_code}</td>
                    <td>${course.course_name}</td>
                    <td><button class="btn-danger btn-sm" onclick="deleteCourse(${course.id})">Delete</button></td>
                </tr>
            `;
                filterCourse.innerHTML += `<option value="${course.id}">${course.course_name}</option>`;
                enrollCourse.innerHTML += `<option value="${course.id}">${course.course_name}</option>`;
            });
        }

        async function handleSaveStudent(e) {
            e.preventDefault();
            const id = document.getElementById('student-id').value;
            const payload = {
                full_name: document.getElementById('full_name').value,
                email: document.getElementById('email').value,
                age: document.getElementById('age').value,
                phone_number: document.getElementById('phone_number').value,
                gender: document.getElementById('gender').value,
                registration_date: document.getElementById('registration_date').value,
                status: document.getElementById('status').value,
            };

            const url = id ? `/api/students/${id}` : '/api/students';
            const method = id ? 'PUT' : 'POST';

            const res = await fetch(url, { method, headers, body: JSON.stringify(payload) });
            const data = await res.json();

            if (res.ok) {
                resetStudentForm();
                fetchStudents();
            } else {
                alert("Validation Failed: " + JSON.stringify(data.errors || data));
            }
        }

        async function editStudent(id) {
            const res = await fetch(`/api/students/${id}`);
            const s = await res.json();

            document.getElementById('student-id').value = s.id;
            document.getElementById('full_name').value = s.full_name;
            document.getElementById('email').value = s.email;
            document.getElementById('age').value = s.age;
            document.getElementById('phone_number').value = s.phone_number;
            document.getElementById('gender').value = s.gender;
            document.getElementById('registration_date').value = s.registration_date;
            document.getElementById('status').value = s.status;

            document.getElementById('form-title').innerText = "Edit Student Profile Record Information";
            document.getElementById('save-btn').innerText = "Update Record Changes";
            document.getElementById('cancel-edit-btn').style.display = "block";
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        function resetStudentForm() {
            document.getElementById('student-id').value = '';
            document.getElementById('student-form').reset();
            document.getElementById('form-title').innerText = "Register Student";
            document.getElementById('save-btn').innerText = "Save Student";
            document.getElementById('cancel-edit-btn').style.display = "none";
            document.getElementById('registration_date').value = new Date().toISOString().split('T')[0];
        }

        async function deleteStudent(id) {
            if (confirm("Confirm student profile purging? All execution records will drop instantly.")) {
                await fetch(`/api/students/${id}`, { method: 'DELETE', headers });
                fetchStudents();
            }
        }

        async function handleCreateCourse(e) {
            e.preventDefault();
            const payload = {
                course_code: document.getElementById('course_code').value,
                course_name: document.getElementById('course_name').value
            };

            const res = await fetch('/api/courses', { method: 'POST', headers, body: JSON.stringify(payload) });

            if (res.ok) {
                document.getElementById('course-form').reset();
                fetchCourses();
            } else {
                const data = await res.json();
                alert(data.message || "Duplicate Course Entries Flagged");
            }
        }

        async function deleteCourse(id) {
            const res = await fetch(`/api/courses/${id}`, { method: 'DELETE', headers });
            if (res.ok) {
                fetchCourses();
                fetchStudents();
            } else {
                const data = await res.json();
                alert(data.error || "Cannot delete course.");
            }
        }

        async function handleEnrollment(e) {
            e.preventDefault();
            const payload = {
                student_id: document.getElementById('enroll_student_id').value,
                course_id: document.getElementById('enroll_course_id').value,
                enrollment_date: document.getElementById('enrollment_date').value
            };

            const res = await fetch('/api/enrollments', { method: 'POST', headers, body: JSON.stringify(payload) });
            const data = await res.json();

            if (res.ok) {
                alert(data.message);
                fetchStudents();
            } else {
                alert("Enrollment Exception Encountered: " + (data.error || JSON.stringify(data.errors)));
            }
        }

        async function viewStudent(id) {
            const res = await fetch(`/api/students/${id}`);
            const s = await res.json();

            let courseRows = s.courses.map(c =>
                `<li><code>${c.course_code}</code> — ${c.course_name} (Enrolled: ${c.pivot.enrollment_date})</li>`
            ).join('');

            if (!courseRows) courseRows = '<li>No active enrollments for this profile found.</li>';

            document.getElementById('details-body').innerHTML = `
            <p><b>Name:</b> ${s.full_name}</p>
            <p><b>Email:</b> ${s.email}</p>
            <p><b>Age:</b> ${s.age}</p>
            <p><b>Phone:</b> ${s.phone_number}</p>
            <p><b>Gender:</b> ${s.gender}</p>
            <p><b>Registered on:</b> ${s.registration_date}</p>
            <p><b>Status:</b> <span class="badge ${s.status}">${s.status}</span></p>
            <h3>Active Program Course Enrollments</h3>
            <ul>${courseRows}</ul>
        `;

            document.getElementById('details-modal').style.display = 'flex';
        }

        function closeModal(id) {
            document.getElementById(id).style.display = 'none';
        }
    </script>

</body>

</html>