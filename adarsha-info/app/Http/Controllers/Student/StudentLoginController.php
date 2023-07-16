<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AddStudent;
use Hash;
use DB;
use Session;
use Redirect;
class StudentLoginController extends Controller
{
    public function index(){
        return view('student-login');
    }

    public function studentLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $student = AddStudent::where('email', $credentials['email'])->first();
        // return $student;
        if ($student && Hash::check($credentials['password'], $student->password)){
            Session::put('student',$student);
            Session::put('stu_id',$student->id);
            // echo 'Password and email match';
            return Redirect::to('/stuDashboard');
        } else {
            Session::put('message','Invalid email or password');
            return redirect()->back();
        }
    }
    public function StudentProfile()
    {
        $student_id=Session::get('stu_id');
        $student = DB::table('add_students')
            ->select('*')
            ->where('id',$student_id)
            ->first();
            // return $student;
        return view('studentViewPage.student.student-profile',['student'=>$student]); 
    }
    public function StudentProfileSetting()
    {
        $student_id=Session::get('stu_id');
        $student = DB::table('add_students')
            ->select('*')
            ->where('id',$student_id)
            ->first();
        return view('studentViewPage.student.profile-setting',['student'=>$student]); 
    }
    public function StudentProfileUpdate(Request $request)
    {
        $student_id=Session::get('stu_id');
        $data=array();
        $data['phone']=$request->phone;
        if ($request->password != '') {
            $data['password'] = bcrypt($request->password);
        } else {
            $data['password'] = $request->password;
        }
        $data['address']=$request->address;
        DB::table('add_students')
            ->where('id',$student_id)
            ->update($data);
            return redirect('/student-profile')->with('message', 'Student Profile Update Successfully');
    }
   
    public function stuLogout(){
        Session::put('name',null);
        Session::put('id',null);
        return Redirect::to('/');
    }
     
}
