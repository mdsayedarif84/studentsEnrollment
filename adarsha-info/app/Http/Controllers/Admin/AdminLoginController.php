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
                ->where('email',$email)
                ->where('password',$password)
                ->first();
                if($admin){
                    Session::put('email',$admin->email);
                    Session::put('admin_id',$admin->id);
                    return Redirect::to('/dashboard');
                }else{
                    Session::put('msg','Email Or Password Invalid');
                    return Redirect::to('/backend');
                }
    }
    public function dashboard(){
        return view('admin.body.main-body');

    }
}
