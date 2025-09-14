<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends MainModel
{
    protected $fillable = [
        'name',
        'description',
        'status',
    ];
    protected $casts = [
        'name' => 'array',
        'description' => 'array',
    ];
}
