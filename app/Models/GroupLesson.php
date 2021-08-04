<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupLesson extends Model
{
    use HasFactory;

    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'id', 'lesson_id');
    }

    public function groups()
    {
        return $this->hasMany(Group::class, 'id', 'group_id');
    }
}
