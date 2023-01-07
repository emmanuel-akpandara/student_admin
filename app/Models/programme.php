<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class programme extends Model
{
    use HasFactory;

    public function students()
    {
        return $this->hasMany(students::class);
    }

    public function courses()
    {
        return $this->hasMany(courses::class);
    }

    protected function CourseName(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => courses::find($attributes['course_id'])->name,
        );
    }
    protected $appends = ['course_name'];

}
