<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function groupLessons()
    {
        return $this->belongsTo(GroupLesson::class, 'id', 'lesson_id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
