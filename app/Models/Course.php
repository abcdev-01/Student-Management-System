<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Course extends Model
{
    protected $fillable = ['course_name', 'course_code', 'duration', 'status'];
    public function getFormattedIdAttribute(): string
    {
        return str_pad($this->id, 4, '0', STR_PAD_LEFT);
    }
    public function setCourseNameAttribute($value)
    {
        $this->attributes['course_name'] = mb_strtoupper(trim((string) $value), 'UTF-8');
    }
    public function setCourseCodeAttribute($value)
    {
        $this->attributes['course_code'] = mb_strtoupper(trim((string) $value), 'UTF-8');
    }
}
