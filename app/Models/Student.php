<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Student extends Model
{
    protected $fillable = ['first_name', 'last_name', 'email', 'phone_number', 'age', 'gender', 'course', 'status'];
    public function getFormattedIdAttribute(): string
    {
        return str_pad($this->id, 4, '0', STR_PAD_LEFT);
    }
    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = mb_strtoupper(trim((string) $value), 'UTF-8');
    }

    public function setLastNameAttribute($value)
    {
        $this->attributes['last_name'] = mb_strtoupper(trim((string) $value), 'UTF-8');
    }

    public function getFullNameAttribute()
    {
        return trim("{$this->first_name} {$this->last_name}");
    }
    public function setCourseAttribute($value)
    {
        $this->attributes['course'] = mb_strtoupper(trim((string) $value), 'UTF-8');
    }
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
}

