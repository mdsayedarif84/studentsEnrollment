<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function allTeacher(){
        return view('admin.teacher.allTeacher');
       }  
}
