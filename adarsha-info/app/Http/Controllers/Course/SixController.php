<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AddStudent;
use DB;

class SixController extends Controller
{
    public function six(){
        $sixStuDatas   = DB::table('add_students')
        ->where('stu_class','six')
        ->get();
        // return $sixStuDatas;
        return view('admin.course.six',['sixStuDatas' => $sixStuDatas]);
    }  
}
