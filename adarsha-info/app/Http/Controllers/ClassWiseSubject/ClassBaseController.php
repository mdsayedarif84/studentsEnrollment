<?php

namespace App\Http\Controllers\ClassWiseSubject;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AddClass;
use App\Models\Subject;
use App\Models\ClassWiseSubject;
Use DB;


class ClassBaseController extends Controller
{
    public function index()
    {
        $getClasses     =   AddClass::where('status',1)->get();
        $getSubjects     =   Subject::where('status',1)->get();
        return view('admin.ClassWiseSubject.add-classBaseSubject',compact('getClasses','getSubjects'));
    }
    public function Store(Request $request){
        $data = [];
        $subNames =  $request->subName;
        foreach($subNames as $key => $item){
            $data['class_id']= $request->class_id;
            $data['status']= $request->status;
            $data['subject_id']= $item;
            DB::table('class_wise_subjects')->insert($data);
        } 
        return redirect('/classwise/subject')->with('message','Class Wise Subject Save Successfully');
    }
    public function ManageClassWiseSubject(){
        // $classWiseSubjects  = ClassWiseSubject::all();
        $classWiseSubjects   =   DB::table('class_wise_subjects')
                                ->join('add_classes', 'class_wise_subjects.class_id','=','add_classes.id')
                                ->join('subjects', 'class_wise_subjects.subject_id','=','subjects.id')
                                ->select('class_wise_subjects.*','add_classes.class_name','subjects.subject_name')
                                ->get();
                                
        $classWiseData = [];
        // Iterate through the retrieved data
            foreach ($classWiseSubjects as $row) {
                $classId = $row->class_id;
                $className = $row->class_name;
                $subjectName = $row->subject_name;
                $status = $row->status;
                $id = $row->id;

                // Check if the class is already in the array, if not, initialize it
                if (!isset($classWiseData[$classId])) {
                    $classWiseData[$classId] = [
                        'class_name' => $className,
                        'status' => $status,
                        'id' => $id,
                        'subjects' => [],
                    ];
                }
                // Add the subject to the class's subjects array
                $classWiseData[$classId]['subjects'][] = $subjectName;
            }
//  return $classWiseData;
            // Now $classWiseData contains the classwise data
        return view('admin.ClassWiseSubject.manage-classwisesubject',compact('classWiseData'));
    }
    public function editClassWiseSubject($id)
    {
        $classId   =   ClassWiseSubject::findOrFail($id);
        // return $classWiseSubjects;
        $getClasses     =   AddClass::where('status',1)->get();
        $getSubjects     =   Subject::where('status',1)->get();
        // return $getSubjects;
        return view('admin.ClassWiseSubject.edit-classBaseSubject',compact('getClasses','getSubjects','classId'));
    }
}
