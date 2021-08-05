<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $appends = [
        'full_name',
    ];


    public function getFullNameAttribute()
    {
        return trim($this->surname) . " " . trim($this->name) . " " . trim($this->last_name);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function groups()
    {
        return $this->belongsToMany('App\Models\Group', 'teacher_group', 'teacher_id', 'group_id');
    }
}
