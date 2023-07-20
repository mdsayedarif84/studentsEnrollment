<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AddStudent;
use DB;
use Redirect;


class AllstudentController extends Controller{
    public function allStudent()
    {
        $stuDatas   = DB::table('add_students')->orderBy('id','DESC')->get();
        //return $stuDatas;
        return view('admin.student.allStudent', ['stuDatas' => $stuDatas]);
    }
    public function deleteStudent($id)
    {
        // $stuId= AddStudent::find($id);
        // return $stuId;
         DB::table('add_students')
            ->where('id',$id)
            ->delete();
        return Redirect::to('/allStudent');
        
    }
    public function studnetView($id)
    {
        $student = DB::table('add_students')
            ->where('id',$id)
            ->first();
        return view('admin.student.view-student',['student'=>$student]); 
    }
}
