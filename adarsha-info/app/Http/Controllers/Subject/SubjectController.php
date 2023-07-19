<?php

namespace App\Http\Controllers\Subject;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;


class SubjectController extends Controller
{
    public function index()
    {
        return view('admin.subject.add-subject');
    }
    protected function validData($request){
        $this->validate($request,
            [
                'subject_name' => 'required|unique:subjects|regex:/^[a-zA-Z\s]+$/',
                'status' => 'required',
            ],
            [
                'subject_name.required' => 'You have to choose subject name!',
                'subject_name.regex' => 'Letter & Space only Accepted!',
                'status.required' => 'Please choose type status!',
            ]
        );
    }
    public function store(Request $request)
    {
        $this->validData($request);
        $subject                           =   new Subject();
        $subject->subject_name            =   $request->subject_name;
        $subject->status       =   $request->status;
        $subject->save();
        return redirect('/add-subject')->with('message','Subject Info Save Successfully');
    }
}
