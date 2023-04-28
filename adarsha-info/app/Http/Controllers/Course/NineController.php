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
        ->where('stu_class','nine')
        ->get();
        // return $eightStuDatas;
        return view('admin.course.nine',['nineStuDatas' => $nineStuDatas]);
    }
}
