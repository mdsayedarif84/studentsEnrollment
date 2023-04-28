<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AddStudent;
use DB;


class AllstudentController extends Controller{
    public function allStudent(){
        $stuDatas   = DB::table('add_students')->get();
        //return $stuDatas;
        return view('admin.student.allStudent', ['stuDatas' => $stuDatas]);
       } 
}
