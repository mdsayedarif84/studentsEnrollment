<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function index()
    {
        return view('admin.admin-login');
    }
    public function dashboard()
    {
        return view('admin.body.main-body');
    }
}
