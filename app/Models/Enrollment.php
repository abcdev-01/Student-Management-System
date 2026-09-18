<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    protected $fillable = ['student_id', 'course_id', 'enrollment_date'];

    protected $casts = [
        'enrollment_date' => 'date:Y-m-d',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);   // uses student_id
    }

    public function course()
    {
        return $this->belongsTo(Course::class);    // uses course_id
    }
}