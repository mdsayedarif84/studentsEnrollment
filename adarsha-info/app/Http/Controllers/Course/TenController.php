<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AddStudent;
use DB;
class TenController extends Controller
{
    public function ten(){
        $tenStuDatas   = DB::table('add_students')
        ->where('class','ten')
        ->get();
        // return $tenStuDatas;
        return view('admin.course.ten',['tenStuDatas' => $tenStuDatas]);
    }
    public function tenStudnetView($id)
    {
        $student = DB::table('add_students')
            ->where('id',$id)
            ->first();
        return view('admin.student.view-student',['student'=>$student]); 
    } 
}
