<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;
use App\Models\AddTeacher;
use Intervention\Image\Facades\Image;

class TeacherController extends Controller
{
    public function addTeacher(){
        return view('admin.teacher.addTeacher');
    }
    protected function DataValidation($request){
        $this->validate($request, 
            [
                'teacher_name' => 'required|min:3|max:50',
                'teacher_email' => 'required|unique:add_teachers|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
                'department' => 'required',
                'joining_date' => 'required',
                'designation' => 'required',
                'address' => 'required',
                'teacher_image' => 'required',
                'teacher_phone' => 'required|max:11',
            ],
            [
                'teacher_name.required' => 'Your name must be required!',
                'department.required' => 'Select Your Department!',
                'joining_date.required' => 'Choose Your Joning Date!',
                'designation.required' => 'Input Your Designation!',
                'teacher_image.required' => 'Choose Your Image!',
                'teacher_email.regex' => 'You Missing dot After gmail,yahoo,hotmail',
                'teacher_phone.max' => 'Not more than 11 digit',
                'teacher_email.required' => 'Please Give a valid Email!',
            ]
        );
    }
    protected function teacherImageUpload($request)
    {
        $teacherImage = $request->file('teacher_image');
        $filetype = $teacherImage->getClientOriginalExtension();
        $imageName = $request->teacher_name.'.'.$filetype;
        $directory = 'teacher_image/';
        $imageUrl = $directory.$imageName;
        Image::make($teacherImage)->resize(300,300)->save($imageUrl);
        return $imageUrl;
    }
    public function saveTeacherInfo($request, $imageUrl)
    {
        $teacher = new AddTeacher();
        $teacher->teacher_name = $request->teacher_name;
        $teacher->teacher_email = $request->teacher_email;
        $teacher->department = $request->department;
        $teacher->designation = $request->designation;
        $teacher->teacher_image = $imageUrl;
        $teacher->address = $request->address;
        $teacher->teacher_phone = $request->teacher_phone;
        $teacher->joining_date = $request->joining_date;
        $teacher->save();
    }
    public function sotreData(Request $request)
    {
        $this->DataValidation($request);
        $imageUrl = $this->teacherImageUpload($request);
        $this->saveTeacherInfo($request, $imageUrl);
        return redirect('/addTeacher')->with('message', 'Teacher Info Save Successfully');
    }
    public function allTeacher()
    {
        $teacherDatas   = DB::table('add_teachers')->get();
        //return $teacherDatas;
        return view('admin.teacher.allTeacher', ['teacherDatas' => $teacherDatas]);
    }
}
