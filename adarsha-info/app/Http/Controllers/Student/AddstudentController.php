<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;
use Redirect;
use App\Models\AddStudent;


class AddstudentController extends Controller
{
   public function addStudent(){
    return view('admin.student.addStudent');
   }
   protected function DataValidation($request){
        $this->validate($request, [
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
   
   public function saveStudent(Request $request){
      $this->DataValidation($request);
      $studentData=array();
      $studentData["stu_name"]       = $request->stu_name;
      $studentData["stu_roll"]       = $request->stu_roll;
      $studentData["father_name"]    = $request->father_name;
      $studentData["mother_name"]    = $request->mother_name;
      $studentData["stu_email"]      = $request->stu_email;
      $studentData["password"]       = bcrypt($request->password);
      $studentData["stu_class"]      = $request->stu_class;
      $studentData["address"]        = $request->address;
      $studentData["stu_phone"]      = $request->stu_phone;
      $studentData["admission_year"] = $request->admission_year	;
      $image      =$request->file('stu_image');
      if($image){
         $image_name    =  $request->stu_name;
         $ext           =  strtolower($image->getClientOriginalExtension());
         $img_full_name =  $image_name.'.'.$ext;  
         $upload_path   =  'stu_image/';
         $image_url     =  $upload_path.$img_full_name;
         $success       =  $image->move($upload_path,$img_full_name);
         if($success){
            $studentData["stu_image"]  =  $image_url;
            DB::table('add_students')->insert($studentData);
            Session::put('message','Student Data Save Successfully');
            // return $studentData;
            return Redirect::to('/addStudent');
         }
      }
      // $studentData["stu_image"]  =  $image_url;
      // DB::table('add_students')->insert($studentData);
      // Session::put('message','Studen Data Save Successfully');
      // return Redirect::to('/addStudent');

      // DB::table('add_students')->insert($studentData);
      // Session::put('message','Studen Data Save Successfully');
      // return Redirect::to('/addStudent');
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
