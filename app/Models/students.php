<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class students extends Model
{
    use HasFactory;

    public function programme()
    {
        return $this->belongsTo(programme::class, 'programme_id', 'id');
    }

    public function student_courses()
    {
        return $this->hasMany(student_courses::class);
    }
}
