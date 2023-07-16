<?php

namespace App\Http\Controllers\StudentInformation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AddStudent;
use DB;

class ResultController extends Controller
{
    public function result(){
        $student= DB::table('add_students')->select('*')->where('id')->get();
        // $student = AddStudent::select('*')->get('id');
        return $student;
        return view('admin.StudentInformation.result');
       } 
}
