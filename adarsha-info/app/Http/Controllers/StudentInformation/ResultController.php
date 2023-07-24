<?php

namespace App\Http\Controllers\StudentInformation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AddStudent;
use DB;

class ResultController extends Controller
{
    public function result(){
        $classwiseStu= DB::table('add_students')->select('*')->where('class','six')->get();
        // return $classwiseStu;
        return view('admin.StudentInformation.result',compact('classwiseStu'));
       } 
}
