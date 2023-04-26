<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TenController extends Controller
{
    public function ten(){
        return view('admin.course.ten');
       }
}
