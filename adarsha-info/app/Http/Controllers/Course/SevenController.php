<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AddStudent;
use DB;

class SevenController extends Controller
{
    public function seven(){
        $sevenStuDatas   = DB::table('add_students')
        ->where('stu_class','seven')
        ->get();
        // return $sevenStuDatas;
        return view('admin.course.seven',['sevenStuDatas' => $sevenStuDatas]);
       }  
}
