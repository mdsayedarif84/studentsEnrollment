<?php

namespace App\Http\Controllers\Pdf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Pdf;
use DB;
class PdfController extends Controller
{
    public function pdfDownload($id){
        $student = DB::table('add_students')
            ->where('id',$id)
            ->first();
        $pdf = PDF::loadView('admin.pdf.pdf-download',
            ['student'=>$student])->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->stream('student.pdf');
    }
}
