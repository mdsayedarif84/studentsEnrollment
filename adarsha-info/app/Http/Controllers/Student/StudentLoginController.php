<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use Session;
use Redirect;
class StudentLoginController extends Controller
{
    public function index()
    {
        return view('student-login');
    }
    public function studentLogin(Request $request)
    {
        $email= $request->email;
        $password= bcrypt($request->password);
        $student= DB::table('add_students')
                ->where([
                    'email'=>$email,
                    'password'=>$password
                ])->first();
                return $student;
                if($student){
                    Session::put('studentData',$student);
                    Session::put('email',$student->email);
                    Session::put('student_id',$student->id);
                    return Redirect::to('/dashboard');
                }else{
                    Session::put('message','Email Or Password Invalid');
                    return Redirect::to('/');
                }
    }
}
