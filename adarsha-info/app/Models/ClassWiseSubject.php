<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassWiseSubject extends Model
{
    use HasFactory;
    protected $fillable = [
        'class_id', 
        'status',
        'subject_id',
    ];
}
