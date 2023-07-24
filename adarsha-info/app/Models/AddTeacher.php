<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddTeacher extends Model
{
    use HasFactory;
    protected $fillable = [
        'teacher_name', 
        'teacher_email',
        'address',
        'department',
        'designation',
        'teacher_phone',
        'joining_date',
        'teacher_image',
        'teacher_email',
        'teacher_email',
    ];

}
