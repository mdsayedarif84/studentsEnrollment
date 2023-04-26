<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SevenController extends Controller
{
    public function seven(){
        return view('admin.course.seven');
       }
}
