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
                        <input type="number" id="age" required min="16" max="120">
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

        /* ---------- helpers ---------- */

        const escapeHtml = (value) => String(value ?? '').replace(/[&<>"']/g, (ch) => ({
            '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;'
        }[ch]));

        // fetch + parse JSON without throwing on HTML error pages
        async function requestJson(url, options = {}) {
            const res = await fetch(url, options);
            const text = await res.text();
            let data = null;
            if (text) {
                try { data = JSON.parse(text); }
                catch { data = { message: text }; }
            }
            if (!res.ok) {
                const err = new Error(`HTTP ${res.status}`);
                err.status = res.status;
                err.data = data;
                throw err;
            }
            return data;
        }

        function reportError(prefix, err) {
            const detail = err?.data?.errors
                ? JSON.stringify(err.data.errors)
                : (err?.data?.message || err?.message || 'Unknown error');
            alert(`${prefix}: ${detail}`);
        }

        /* ---------- bootstrap ---------- */

        document.addEventListener('DOMContentLoaded', () => {
            fetchStudents();
            fetchCourses();

            const today = new Date().toISOString().split('T')[0];
            document.getElementById('registration_date').value = today;
            document.getElementById('enrollment_date').value = today;

            document.getElementById('student-form').addEventListener('submit', handleSaveStudent);
            document.getElementById('course-form').addEventListener('submit', handleCreateCourse);
            document.getElementById('enrollment-form').addEventListener('submit', handleEnrollment);

            // debounce the search box
            let searchTimer;
            document.getElementById('search-input').addEventListener('input', () => {
                clearTimeout(searchTimer);
                searchTimer = setTimeout(fetchStudents, 250);
            });
            document.getElementById('filter-status').addEventListener('change', fetchStudents);
            document.getElementById('filter-course').addEventListener('change', fetchStudents);
            document.getElementById('cancel-edit-btn').addEventListener('click', resetStudentForm);

            // delegated actions for the students table
            document.querySelector('#students-table tbody').addEventListener('click', (e) => {
                const btn = e.target.closest('button[data-action]');
                if (!btn) return;
                const { action, id } = btn.dataset;
                if (action === 'view') viewStudent(id);
                else if (action === 'edit') editStudent(id);
                else if (action === 'delete') deleteStudent(id);
            });

            // delegated actions for the courses table
            document.querySelector('#courses-table tbody').addEventListener('click', (e) => {
                const btn = e.target.closest('button[data-action="delete-course"]');
                if (btn) deleteCourse(btn.dataset.id);
            });

            // close modal on backdrop click / Escape
            document.getElementById('details-modal').addEventListener('click', (e) => {
                if (e.target.id === 'details-modal') closeModal('details-modal');
            });
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') closeModal('details-modal');
            });
        });

        /* ---------- students ---------- */

        let studentsRequestSeq = 0;

        async function fetchStudents() {
            const seq = ++studentsRequestSeq;

            const params = new URLSearchParams({
                search: document.getElementById('search-input').value.trim(),
                status: document.getElementById('filter-status').value,
                course_id: document.getElementById('filter-course').value
            });

            let students;
            try {
                students = await requestJson(`/api/students?${params.toString()}`);
            } catch (err) {
                console.error(err);
                return;
            }
            // a newer request has already been fired — discard this response
            if (seq !== studentsRequestSeq) return;

            const tbody = document.querySelector('#students-table tbody');
            const studentSelect = document.getElementById('enroll_student_id');
            const currentSelection = studentSelect.value;

            tbody.innerHTML = students.map((student) => `
                <tr>
                    <td>${escapeHtml(student.full_name)}</td>
                    <td>${escapeHtml(student.email)}</td>
                    <td><span class="badge ${escapeHtml(student.status)}">${escapeHtml(student.status)}</span></td>
                    <td>${escapeHtml(student.registration_date)}</td>
                    <td>
                        <button class="btn-secondary btn-sm" data-action="view" data-id="${student.id}">View</button>
                        <button class="btn-sm" data-action="edit" data-id="${student.id}">Edit</button>
                        <button class="btn-danger btn-sm" data-action="delete" data-id="${student.id}">Delete</button>
                    </td>
                </tr>
            `).join('');

            studentSelect.innerHTML =
                '<option value="">-- Choose Student --</option>' +
                students.map(s => `<option value="${s.id}">${escapeHtml(s.full_name)}</option>`).join('');

            // keep the previous choice only if that student is still listed
            if (students.some(s => String(s.id) === currentSelection)) {
                studentSelect.value = currentSelection;
            }
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
                status: document.getElementById('status').value
            };

            try {
                await requestJson(id ? `/api/students/${id}` : '/api/students', {
                    method: id ? 'PUT' : 'POST',
                    headers,
                    body: JSON.stringify(payload)
                });
                resetStudentForm();
                await fetchStudents();
            } catch (err) {
                reportError('Validation failed', err);
            }
        }

        async function editStudent(id) {
            try {
                const s = await requestJson(`/api/students/${id}`);

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
            } catch (err) {
                reportError('Could not load student', err);
            }
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
            if (!confirm("Confirm student profile purging? All execution records will drop instantly.")) return;
            try {
                await requestJson(`/api/students/${id}`, { method: 'DELETE', headers });
                await fetchStudents();
            } catch (err) {
                reportError('Delete failed', err);
            }
        }

        /* ---------- courses ---------- */

        async function fetchCourses() {
            let courses;
            try {
                courses = await requestJson('/api/courses');
            } catch (err) {
                console.error(err);
                return;
            }

            const tbody = document.querySelector('#courses-table tbody');
            const filterCourse = document.getElementById('filter-course');
            const enrollCourse = document.getElementById('enroll_course_id');

            const prevFilter = filterCourse.value;
            const prevEnroll = enrollCourse.value;

            tbody.innerHTML = courses.map(c => `
                <tr>
                    <td>${escapeHtml(c.course_code)}</td>
                    <td>${escapeHtml(c.course_name)}</td>
                    <td>
                        <button class="btn-danger btn-sm" data-action="delete-course" data-id="${c.id}">Delete</button>
                    </td>
                </tr>
            `).join('');

            const options = courses
                .map(c => `<option value="${c.id}">${escapeHtml(c.course_name)}</option>`)
                .join('');

            filterCourse.innerHTML = '<option value="">-- Filter by Enrolled Course --</option>' + options;
            enrollCourse.innerHTML = '<option value="">-- Choose Course --</option>' + options;

            if (courses.some(c => String(c.id) === prevFilter)) {
                filterCourse.value = prevFilter;
            } else if (prevFilter) {
                // the filtered course was deleted — refresh the roster
                fetchStudents();
            }

            if (courses.some(c => String(c.id) === prevEnroll)) {
                enrollCourse.value = prevEnroll;
            }
        }

        async function handleCreateCourse(e) {
            e.preventDefault();
            const payload = {
                course_code: document.getElementById('course_code').value,
                course_name: document.getElementById('course_name').value
            };

            try {
                await requestJson('/api/courses', { method: 'POST', headers, body: JSON.stringify(payload) });
                document.getElementById('course-form').reset();
                await fetchCourses();
            } catch (err) {
                reportError('Duplicate course entries flagged', err);
            }
        }

        async function deleteCourse(id) {
            if (!confirm('Delete this course? Students enrolled in it will lose the enrollment.')) return;
            try {
                await requestJson(`/api/courses/${id}`, { method: 'DELETE', headers });
                await fetchCourses();
                await fetchStudents();
            } catch (err) {
                reportError('Cannot delete course', err);
            }
        }

        /* ---------- enrollment ---------- */

        async function handleEnrollment(e) {
            e.preventDefault();
            const payload = {
                student_id: document.getElementById('enroll_student_id').value,
                course_id: document.getElementById('enroll_course_id').value,
                enrollment_date: document.getElementById('enrollment_date').value
            };

            try {
                const data = await requestJson('/api/enrollments', {
                    method: 'POST',
                    headers,
                    body: JSON.stringify(payload)
                });
                alert(data?.message ?? 'Enrollment completed.');
                document.getElementById('enrollment-form').reset();
                document.getElementById('enrollment_date').value = new Date().toISOString().split('T')[0];
                await fetchStudents();
            } catch (err) {
                reportError('Enrollment exception encountered', err);
            }
        }

        /* ---------- details modal ---------- */

        async function viewStudent(id) {
            try {
                const s = await requestJson(`/api/students/${id}`);
                const courses = Array.isArray(s.courses) ? s.courses : [];

                const courseRows = courses.length
                    ? courses.map(c => `
                        <li>
                            <code>${escapeHtml(c.course_code)}</code> — ${escapeHtml(c.course_name)}
                            (Enrolled: ${escapeHtml(c.pivot?.enrollment_date)})
                        </li>`).join('')
                    : '<li>No active enrollments for this profile found.</li>';

                document.getElementById('details-body').innerHTML = `
                    <p><b>Name:</b> ${escapeHtml(s.full_name)}</p>
                    <p><b>Email:</b> ${escapeHtml(s.email)}</p>
                    <p><b>Age:</b> ${escapeHtml(s.age)}</p>
                    <p><b>Phone:</b> ${escapeHtml(s.phone_number)}</p>
                    <p><b>Gender:</b> ${escapeHtml(s.gender)}</p>
                    <p><b>Registered on:</b> ${escapeHtml(s.registration_date)}</p>
                    <p><b>Status:</b> <span class="badge ${escapeHtml(s.status)}">${escapeHtml(s.status)}</span></p>
                    <h3>Active Program Course Enrollments</h3>
                    <ul>${courseRows}</ul>
                `;

                document.getElementById('details-modal').style.display = 'flex';
            } catch (err) {
                reportError('Could not load student details', err);
            }
        }

        function closeModal(id) {
            document.getElementById(id).style.display = 'none';
        }
    </script>

</body>

</html>