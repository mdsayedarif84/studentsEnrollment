<?php

namespace App\Http\Controllers\Class;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AddClass;

class ClassController extends Controller
{
    public function index()
    {
        return view('admin.class.add-class');
    }
    protected function validData($request){
        $this->validate($request,
            [
                'class_name' => 'required|unique:add_classes|regex:/^[a-zA-Z\s]+$/',
                'status' => 'required',
            ],
            [
                'class_name.required' => 'You have to choose class name!',
                'class_name.regex' => 'Letter & Space only Accepted!',
                'status.required' => 'Please choose type status!',
            ]
        );
    }
    public function store(Request $request)
    {
        $this->validData($request);
        $class              =   new AddClass();
        $class->class_name  =   $request->class_name;
        $class->status      =   $request->status;
        $class->save();
        return redirect('/add-class')->with('message','Class Info Save Successfully');
    }
    public function manageClass()
    {
        $getClasses     =   AddClass::select('*')->orderBy('id','DESC')->get();
        // return $getClasses;
        return view('admin.class.manage-class',['getClasses'=>$getClasses]);
    }
    public function inactiveClass($id){
        $class       =   AddClass::find($id);
        $class->status   =   0;
        $class->save();
        return redirect('/manage-class')->with('message','Class info inactive successfully');
    }
    public function activeClass($id){
        $class       =   AddClass::find($id);
        $class->status   =   1;
        $class->save();
        return redirect('/manage-class')->with('message','Class info active successfully');
    }
}
