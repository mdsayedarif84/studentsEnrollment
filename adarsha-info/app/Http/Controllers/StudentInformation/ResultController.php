<?php

namespace App\Http\Controllers\StudentInformation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function result(){
        return view('admin.StudentInformation.result');
       } 
}
