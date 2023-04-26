<?php

namespace App\Http\Controllers\StudentInformation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TutionFeeController extends Controller
{
    public function tutionfee(){
        return view('admin.StudentInformation.tutionFee');
       }  
}
