<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AddStudent;
use DB;

class NineController extends Controller
{
    public function nine(){
        $nineStuDatas   = DB::table('add_students')
        ->where('class','nine')
        ->get();
        // return $eightStuDatas;
        return view('admin.course.nine',['nineStuDatas' => $nineStuDatas]);
    }
    public function nineStudnetView($id)
    {
        $student = DB::table('add_students')
            ->where('id',$id)
            ->first();
        return view('admin.student.view-student',['student'=>$student]); 
    }
}