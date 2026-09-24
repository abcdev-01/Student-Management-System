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

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'enrollments')
            ->withPivot('enrollment_date')
            ->withTimestamps();
    }
}