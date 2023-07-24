<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddStudent extends Model
{
    use HasFactory;
    protected $fillable = [
        'stu_name', 
        'stu_roll',
        'father_name',
        'mother_name',
        'stu_email',
        'password',
        'stu_class',
        'address',
        'stu_phone',
        'admission_year',
        'stu_image',
    ];
}
