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
                'name' => 'required|min:3|max:50',
                'roll' => 'required|regex:/^[0-9]+$/',
                'father_name' => 'required|regex:/^[a-zA-Z\s]+$/',
                'mother_name' => 'required|regex:/^[a-zA-Z\s]+$/',
                'email' => 'required|unique:add_students|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
                'password' => 'required||regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/|min:6|',
                'class' => 'required',
                'admission_year' => 'required',
                'address' => 'required',
                'image' => 'required',
                'phone' => 'required|max:11',
            ],
            [
                'name.required' => 'Your name must be required!',
                'roll.required' => 'Please Fill Up This Roll',
                'roll.regex' => 'Only Number Accepted',
                'email.regex' => 'You Missing dot After gmail,yahoo,hotmail',
                'phone.max' => 'Not more than 11 digit',
                'father_name.regex' => 'Letter & Space only Accepted!',
                'mother_name.regex' => 'Letter & Space only Accepted!',
                'email.required' => 'Please Give a valid Email!',
                'password.regex' => 'Password must be minimum 6 characters with at least 1 upper case, 1 lower case, 1 numeric character and 1 special character.',
            ]
        );
    }
    protected function studentImageUpload($request)
    {
        $studentImage = $request->file('image');
        $filetype = $studentImage->getClientOriginalExtension();
        $imageName = $request->name.'.'.$filetype;
        $directory = 'stu_image/';
        $imageUrl = $directory.$imageName;
        Image::make($studentImage)->resize(300,300)->save($imageUrl);
        return $imageUrl;
    }
    public function saveStudentInfo($request, $imageUrl)
    {
        $student = new AddStudent();
        $student->name = $request->name;
        $student->roll = $request->roll;
        $student->father_name = $request->father_name;
        $student->mother_name = $request->mother_name;
        $student->email = $request->email;
        $student->class = $request->class;
        $student->image = $imageUrl;
        $student->address = $request->address;
        $student->phone = $request->phone;
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
        $student->name = $request->name;
        $student->roll = $request->roll;
        $student->father_name = $request->father_name;
        $student->mother_name = $request->mother_name;
        if($request->email){
            $student->email = $request->email;
        }
        $student->class = $request->class;
        if ($imageUrl) {
            $student->image = $imageUrl;
        }
        $student->address = $request->address;
        $student->phone = $request->phone;
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
