<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AddStudent;



class AllstudentController extends Controller{
    public function allStudent(){
        $stuDatas    =   AddStudent::all();
        //return $stuDatas;
        return view('admin.student.allStudent', ['stuDatas' => $stuDatas]);
       } 
}
