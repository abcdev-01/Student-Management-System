<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Appends;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Student extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'age',
        'phone_number',
        'gender',
        'registration_date',
        'status',
    ];
    protected $appends='full_name';

    public function getFullNameAttribute(): string
    {
        return strtoupper(trim($this->first_name . ' ' . $this->last_name));
    }

    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'enrollments')
                    ->withPivot('enrollment_date')
                    ->withTimestamps();
    }
}