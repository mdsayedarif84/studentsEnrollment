<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;

class AdminLoginController extends Controller
{
    public function index()
    {
        return view('admin.admin-login');
    }
    public function adminLogin(Request $request)
    {
        $email= $request->email;
        $password= md5($request->password);
        $admin= DB::table('admin_logins')
                ->where([
                    'email'=>$email,
                    'password'=>$password
                ])->first();
                if($admin){
                    Session::put('adminData',$admin);
                    Session::put('email',$admin->email);
                    Session::put('admin_id',$admin->id);
                    return Redirect::to('/dashboard');
                }else{
                    Session::put('message','Email Or Password Invalid');
                    return Redirect::to('/backend');
                }
    }
    //adminLogout
    public function logout(){
        Session::put('name',null);
        Session::put('id',null);
        return Redirect::to('/backend');
    }
    
    public function myProfile(){
        return view('admin.headerDopMenu.myProfile');

    }
    public function setting(){
        return view('admin.headerDopMenu.setting');

    }
}
