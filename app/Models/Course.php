<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    protected $fillable = [
        'course_code',
        'course_name',
    ];

    public function setCourseNameAttribute($value)
    {

        $this->attributes['course_name'] = strtoupper($value);
    }
    public function getCourseCodeAttribute($value)
    {
        return strtoupper($value);

    }
    public function setCourseCodeAttribute($value)
    {
        $this->attributes['course_code'] = strtoupper($value);

    }
    public function getCourseNameAttribute(
        $value
    ) {
        return strtoupper($value);
    }
    public function students(
    ) {
        return $this->belongsToMany(Student::class, 'enrollments')
            ->withPivot('enrollment_date')
            ->withTimestamps();
    }
}