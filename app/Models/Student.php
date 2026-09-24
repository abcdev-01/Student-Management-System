<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $fillable = [
        'full_name',
        'email',
        'age',
        'phone_number',
        'gender',
        'registration_date',
        'status',
    ];

    public function setFullNameAttribute($value)
    {
        $this->attributes['full_name'] = strtoupper($value);
    }

    public function getFullNameAttribute($value)
    {
        return strtoupper($value);
    }

    public function courses(
    ) {
        return $this->belongsToMany(Course::class, 'enrollments')
            ->withPivot('enrollment_date')
            ->withTimestamps();
    }
}