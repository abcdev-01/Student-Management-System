<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Course extends Model
{
    protected $fillable = [
        'course_code',
        'course_name',
    ];

    public function setCourseNameAttribute(string $value): void
    {
        $this->attributes['course_name'] = strtoupper(trim($value));
    }

    public function setCourseCodeAttribute(string $value): void
    {
        $this->attributes['course_code'] = strtoupper(trim($value));

    }

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class, 'enrollments')
                    ->withPivot('enrollment_date')
                    ->withTimestamps();
    }
}