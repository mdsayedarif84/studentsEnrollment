<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
class DashboardController extends Controller
{
    public function dashboard(){
        $total = [
            'allStudent'    => DB::table('add_students')->count('id'),
            'sixCount'      => DB::table('add_students')->where('stu_class','six')->count('id'),
            'sevenCount'      => DB::table('add_students')->where('stu_class','seven')->count('id'),
            'eightCount'      => DB::table('add_students')->where('stu_class','eight')->count('id'),
            'nineCount'      => DB::table('add_students')->where('stu_class','nine')->count('id'),
            'tenCount'      => DB::table('add_students')->where('stu_class','ten')->count('id'),
            'allTeacher'    =>   DB::table('add_teachers')->count('id'),
        ];
        return view('admin.body.main-body',['total'=>$total]);
    }
}
