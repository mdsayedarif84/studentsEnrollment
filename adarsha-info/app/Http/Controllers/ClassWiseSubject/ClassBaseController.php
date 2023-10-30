<?php

namespace App\Http\Controllers\ClassWiseSubject;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AddClass;
use App\Models\Subject;


class ClassBaseController extends Controller
{
    public function index()
    {
        $getClasses     =   AddClass::where('status',1)->get();
        $getSubjects     =   Subject::where('status',1)->get();
        return view('admin.ClassWiseSubject.add-classBaseSubject',compact('getClasses','getSubjects'));
    }
}
