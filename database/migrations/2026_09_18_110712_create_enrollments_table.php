<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('student_id')
                ->constrained('students')            // student_id → students.id
                ->cascadeOnDelete();                 // deleting a student removes their enrollments

            $table->foreignId('course_id')
                ->constrained('courses')             // course_id → courses.id
                ->restrictOnDelete();                // a course with enrollments cannot be deleted

            $table->date('enrollment_date');
            $table->timestamps();

            // Part C: prevent duplicate enrollment at the DB level
            $table->unique(['student_id', 'course_id'], 'uniq_student_course');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};