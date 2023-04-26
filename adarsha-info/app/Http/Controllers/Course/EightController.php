<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EightController extends Controller
{
    public function eight(){
        return view('admin.course.eight');
       }
}
