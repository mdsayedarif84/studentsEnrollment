<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AddStudent;
use DB;

class EightController extends Controller
{
    public function eight(){
        $eightStuDatas   = DB::table('add_students')
        ->where('stu_class','eight')
        ->get();
        // return $eightStuDatas;
        return view('admin.course.eight',['eightStuDatas' => $eightStuDatas]);
    }
    public function eightStudnetView($id)
    {
        $student = DB::table('add_students')
            ->where('id',$id)
            ->first();
        return view('admin.student.view-student',['student'=>$student]); 
    } 
}