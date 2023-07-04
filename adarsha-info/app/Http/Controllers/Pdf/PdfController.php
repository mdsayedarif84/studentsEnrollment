<?php

namespace App\Http\Controllers\Pdf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Pdf;
use DB;
class PdfController extends Controller
{
    public function pdfDownload($id){
        $data = [
            'student' => DB::table('add_students')
            ->where('id',$id)
            ->first(),
        ];
        // $student = DB::table('add_students')
        //     ->where('id',$id)
        //     ->first();
            // return $data;
        $pdf = PDF::loadView('admin.pdf.pdf-download',$data)->setOptions([
                'defaultFont'=>'sans-serif',
                
                ])->setPaper('a4', 'portrait');
        return $pdf->stream('student.pdf');
    }
    public function TeacherpdfDownload($id){
        $teacher = DB::table('add_teachers')
            ->where('id',$id)
            ->first();
        $pdf = PDF::loadView('admin.pdf.teacher-pdf',
            ['teacher'=>$teacher])->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->stream('teacher.pdf');
    }
    public function sixPdfDownload($id){
        $sixStudent = DB::table('add_students')
            ->where('id',$id)
            ->where('class','six')
            ->first();
        $pdf = PDF::loadView('admin.pdf.sixStudent-pdf',
            ['sixStudent'=>$sixStudent])->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->stream('sixStudent.pdf');
    }
    public function sevenPdfDownload($id){
        $sevenStudent = DB::table('add_students')
            ->where('id',$id)
            ->where('class','seven')
            ->first();
        $pdf = PDF::loadView('admin.pdf.sevenStudent-pdf',
            ['sevenStudent'=>$sevenStudent])->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->stream('sevenStudent.pdf');
    }
}
