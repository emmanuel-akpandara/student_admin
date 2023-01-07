<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class courses extends Model
{
    use HasFactory;

    public function programme()
    {
        return $this->belongsTo(programme::class);
    }

    public function student_courses()
    {
        return $this->hasMany(student_courses::class);
    }
    protected $hidden = ['created_at', 'updated_at'];


    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn($value) => ucfirst($value),         // accessor
            set: fn($value) => strtolower($value)      // mutator
        );
    }

    protected function programmeName(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => programme::find($attributes['programme_id'])->name,
        );
    }
    protected $appends = ['programme_name'];
}
