<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable =
    [
        'title',
        'description',
        "max_students",
        'instructor_id',
        'image',
        "video",
        "status",
        "category_id"
    ];
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function students()
    {
        return $this->belongsToMany(User::class, 'enrollments');
    }
    public function isEnrolled($userId)
    {
        return $this->enrollments()->where('user_id', $userId)->exists();
    }

    public function getSeatsLeftAttribute(): int
    {
        return $this->max_students - $this->enrollments()->count();
    }
}
