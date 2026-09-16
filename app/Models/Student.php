<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Student extends Model
{
    protected $fillable = ['first_name', 'last_name', 'email', 'age', 'course'];
    public function getFullNameAttribute()
    {
        return trim("{$this->first_name} {$this->last_name}");
    }

    public function getFormattedIdAttribute(): string
    {
        return str_pad($this->id, 4, '0', STR_PAD_LEFT);
    }
}

