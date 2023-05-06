<?php

namespace App\Http\Controllers\Pdf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function pdfDownload($id){
        $pdf = Pdf::loadView('admin.pdf.pdf-download');
        return $pdf->stream('student.pdf');
    }
}
