<?php

namespace App\Http\Controllers\StudentInformation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AddStudent;
use DB;
use App\Http\Controllers\Student\AddstudentController;

class ResultController extends Controller
{
    protected $AddstudentController;
    public function __construct(AddstudentController $AddstudentController)
    {
        $this->AddstudentController = $AddstudentController;
    }
    public function result(){
        $activeClasses = $this->AddstudentController->activeClasses();
        
        // return $classwiseStu;
        return view('admin.StudentInformation.result',compact('activeClasses'));
    }
    public function classWiseStuName(){
        $classwiseStu= DB::table('add_students')->select('*')->where('class','six')->get();
    }
}


























