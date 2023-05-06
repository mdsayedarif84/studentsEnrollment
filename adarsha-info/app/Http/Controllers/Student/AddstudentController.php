<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;
use App\Models\AddStudent;
use Intervention\Image\Facades\Image;

class AddstudentController extends Controller
{
   public function addStudent(){
    return view('admin.student.addStudent');
   }
   protected function DataValidation($request){
        $this->validate($request, 
            [
                'stu_name' => 'required|min:3|max:50',
                'stu_roll' => 'required|regex:/^[0-9]+$/',
                'father_name' => 'required|regex:/^[a-zA-Z\s]+$/',
                'mother_name' => 'required|regex:/^[a-zA-Z\s]+$/',
                'stu_email' => 'required|unique:add_students|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
                'password' => 'required||regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/|min:6|',
                'stu_class' => 'required',
                'admission_year' => 'required',
                'address' => 'required',
                'stu_image' => 'required',
                'stu_phone' => 'required|max:11',
            ],
            [
                'stu_name.required' => 'Your name must be required!',
                'stu_roll.required' => 'Please Fill Up This Roll',
                'stu_roll.regex' => 'Only Number Accepted',
                'stu_email.regex' => 'You Missing dot After gmail,yahoo,hotmail',
                'stu_phone.max' => 'Not more than 11 digit',
                'father_name.regex' => 'Letter & Space only Accepted!',
                'mother_name.regex' => 'Letter & Space only Accepted!',
                'stu_email.required' => 'Please Give a valid Email!',
                'password.regex' => 'Password must be minimum 6 characters with at least 1 upper case, 1 lower case, 1 numeric character and 1 special character.',
            ]
        );
    }
    protected function studentImageUpload($request)
    {
        $studentImage = $request->file('stu_image');
        $filetype = $studentImage->getClientOriginalExtension();
        $imageName = $request->stu_name.'.'.$filetype;
        $directory = 'stu_image/';
        $imageUrl = $directory.$imageName;
        Image::make($studentImage)->resize(300,300)->save($imageUrl);
        return $imageUrl;
    }
    public function saveStudentInfo($request, $imageUrl)
    {
        $student = new AddStudent();
        $student->stu_name = $request->stu_name;
        $student->stu_roll = $request->stu_roll;
        $student->father_name = $request->father_name;
        $student->mother_name = $request->mother_name;
        $student->stu_email = $request->stu_email;
        $student->stu_class = $request->stu_class;
        $student->stu_image = $imageUrl;
        $student->address = $request->address;
        $student->stu_phone = $request->stu_phone;
        $student->admission_year = $request->admission_year;
        $student->password = bcrypt($request->password);
        $student->save();
    }
    public function sotre(Request $request)
    {
        $this->DataValidation($request);
        $imageUrl = $this->studentImageUpload($request);
        $this->saveStudentInfo($request, $imageUrl);
        return redirect('/addStudent')->with('message', 'Student Info Save Successfully');
    }

    public function editStudent($id)
    {
        $student = DB::table('add_students')
            ->where('id',$id)
            ->first();
        return view('admin.student.edit-student',['student'=>$student]); 
    }
    public function updateStudentBsicInfo($student,$request,$imageUrl = null){
        $student->stu_name = $request->stu_name;
        $student->stu_roll = $request->stu_roll;
        $student->father_name = $request->father_name;
        $student->mother_name = $request->mother_name;
        $student->stu_email = $request->stu_email;
        $student->stu_class = $request->stu_class;
        if ($imageUrl) {
            $student->stu_image = $imageUrl;
        }
        $student->address = $request->address;
        $student->stu_phone = $request->stu_phone;
        $student->admission_year = $request->admission_year;
        if ($request->password != '') {
            $student->password = bcrypt($request->password);
        } else {
            $student->password = $request->password;
        }
        $student->save();
    }
    public function studnetFinalUpdateInfo(Request $request)
    {
        $studentImage = $request->file('stu_image');
        $student   =   AddStudent::find($request->stu_id);
        if ($studentImage) {
            unlink($student->stu_image);
            $imageUrl = $this->studentImageUpload($request);
            $this->updateStudentBsicInfo($student,$request, $imageUrl);
        } else {
            $this->updateStudentBsicInfo($student,$request);
        }
        return redirect('/allStudent')->with('message', 'Student Info Update Successfully');
    }
   public function emailCheck($email)
    {
        $studentEmail = AddStudent::where('email', $email)->first();
        if ($studentEmail) {
            echo 'This Email Already exist.Try new email !';
        } else {
            echo 'This Email Available for you !';
        }
    }
    
}
