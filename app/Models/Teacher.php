<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;


    public function getFullNameAttribute()
    {
        return $this->surname . " " . $this->name . " " . $this->last_name;
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}