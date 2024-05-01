<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'instructor_id',
        'name',
        'image',
        'short_description',
        'long_description'
    ];
}
