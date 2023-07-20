<?php

namespace App\Http\Controllers\Subject;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use Session;
use DB;

class SubjectController extends Controller
{
    public function index()
    {
        return view('admin.subject.add-subject');
    }
    protected function validData($request){
        $this->validate($request,
            [
                'subject_name'  => 'required|unique:subjects|regex:/^[a-zA-Z\s]+$/',
                'status'        => 'required',
            ],
            [
                'subject_name.required' => 'You have to choose subject name!',
                'subject_name.regex'    => 'Letter & Space only Accepted!',
                'status.required'       => 'Please choose type status!',
            ]
        );
    }
    public function store(Request $request)
    {
        $this->validData($request);
        $subject                =   new Subject();
        $subject->subject_name  =   $request->subject_name;
        $subject->status        =   $request->status;
        $subject->save();
        return redirect('/add-subject')->with('message','Subject Info Save Successfully');
    }
    public function manageSubject()
    {
        $getSubjects     =   Subject::select('*')->orderBy('id','DESC')->get();
        return view('admin.subject.manage-subject',['getSubjects'=>$getSubjects]);
    }
    public function inactiveSubject($id){
        $subject       =   Subject::find($id);
        $subject->status   =   0;
        $subject->save();
        return redirect('/manage-subject')->with('message','Subject info inactive successfully');
    }
    public function activeSubject($id){
        $subject       =   Subject::find($id);
        $subject->status   =   1;
        $subject->save();
        return redirect('/manage-subject')->with('message','Subject info active successfully');
    }
    public function editSubject($id)
    {
        $editSubject = Subject::find($id);
        return view('admin.subject.edit-subject',compact('editSubject'));
    }
    public function updateSubject(Request $request){
        $subjectById   =   Subject::find($request->sub_id);
        $subjectById->subject_name  =   $request->subject_name;
        $subjectById->status        =   $request->status;
        $subjectById->save();
        return redirect('/manage-subject')->with('message', 'Subject Update Successfully');
        
    }
      
}
