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
        return view('studentViewPage.student.view-student',['student'=>$student]); 
    }
   
    public function stuLogout(){
        Session::put('name',null);
        Session::put('id',null);
        return Redirect::to('/');
    }
     
}
