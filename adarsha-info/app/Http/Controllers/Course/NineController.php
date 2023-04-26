<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NineController extends Controller
{
    public function nine(){
        return view('admin.course.nine');
       }
}
