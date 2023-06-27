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
    public function studentLogin(Request $request){
        // $storedHash= DB::table('add_students')->get(['email','password']);
        $data = AddStudent::select('email','password')->get();
        return $data->email;
        $inputPassword = $request->input('password'); 
        $inputEmail = $request->input('email'); 

        if (Hash::check([$storedHash,$inputEmail])) {
            "Password matches";
            // Perform the desired action, such as granting access
            // return redirect()->intended('/dashboard');
        } else {
            "Password does not match";
            // Display an error message or redirect back to the login page
            // return redirect()->back()->withErrors(['password' => 'Invalid password']);
        }
        // $email = $request->email;
        // $password= bcrypt($request->password);
        // $student= DB::table('add_students')
        //         ->where([
        //             'email'=>$email,
        //             'password'=>$password
        //         ])->first();
        //         return $student;
        // if($student){
        //     Session::put('studentData',$student);
        //     Session::put('email',$student->email);
        //     Session::put('student_id',$student->id);
        //     return Redirect::to('/dashboard');
        //     }else{
        //     Session::put('message','Email Or Password InValid');
        //     return Redirect::to('/');
        
    }
}
