<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Dashboard\DashboardController;
//Student
use App\Http\Controllers\Student\StudentLoginController;
use App\Http\Controllers\Student\AddstudentController;
use App\Http\Controllers\Student\AllstudentController;
//StudentInformation
use App\Http\Controllers\StudentInformation\TutionFeeController;
use App\Http\Controllers\StudentInformation\ResultController;
//Course
use App\Http\Controllers\Course\SixController;
use App\Http\Controllers\Course\SevenController;
use App\Http\Controllers\Course\EightController;
use App\Http\Controllers\Course\NineController;
use App\Http\Controllers\Course\TenController;
use App\Http\Controllers\Pdf\PdfController;
//Teacher
use App\Http\Controllers\Teacher\TeacherController;


// Route::get('/', function () {
//     return view('student-login');
// });
//student user login section
Route::get('/stuDashboard', [DashboardController::class, 'stuDashboard'])->name('stuDashboard');
Route::get('/', [StudentLoginController::class, 'index']);
Route::post('/stu-login', [StudentLoginController::class, 'studentLogin'])->name('student-dashboard');
Route::get('/student-profile', [StudentLoginController::class, 'StudentProfile'])->name('student_profile');
Route::get('/student-profile-setting', [StudentLoginController::class, 'StudentProfileSetting'])->name('profile_setting');
Route::post('/student-profile-update', [StudentLoginController::class, 'StudentProfileUpdate'])->name('profile_update');

Route::get('/stu-logout', [StudentLoginController::class, 'stuLogout'])->name('stuLogout');

//admin login section
Route::get('/backend', [AdminLoginController::class, 'index'])->name('admin-login');
Route::post('/admin_login', [AdminLoginController::class, 'adminLogin'])->name('admin-dashboard');
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

Route::get('/logout', [AdminLoginController::class, 'logout'])->name('logout');
Route::get('/email-check/{email}', [AddstudentController::class, 'emailCheck'])->name('email-check');

Route::get('/myprofile', [AdminLoginController::class, 'myProfile'])->name('my-profile');
Route::get('/setting', [AdminLoginController::class, 'setting'])->name('setting');
//Student
Route::get('/addStudent', [AddstudentController::class, 'addStudent'])->name('add-student');
Route::post('/saveStudent', [AddstudentController::class, 'sotre'])->name('save-student');
Route::get('/edit-student/{id}', [AddstudentController::class, 'editStudent'])->name('edit-student');
Route::post('/update-student', [AddstudentController::class, 'studnetFinalUpdateInfo'])->name('update-student');

Route::get('/allStudent', [AllstudentController::class, 'allStudent'])->name('all-student');
Route::get('/delete/{id}', [AllstudentController::class, 'deleteStudent'])->name('delete-student');
Route::get('/view-student/{id}', [AllstudentController::class, 'studnetView'])->name('view-student');

//StudentInformation
Route::get('/tutionfee', [TutionFeeController::class, 'tutionfee'])->name('tution-fee');
Route::get('/result', [ResultController::class, 'result'])->name('result');
//Course
Route::get('/six', [SixController::class, 'six'])->name('six');
Route::get('/view-student/{id}', [SixController::class, 'sixStudnetView'])->name('view-student');
Route::get('/sixPdf/{id}', [PdfController::class, 'sixPdfDownload'])->name('six-pdf');

Route::get('/seven', [SevenController::class, 'seven'])->name('seven');
Route::get('/view-student/{id}', [SevenController::class, 'sevenStudnetView'])->name('view-student');
Route::get('/sevenPdf/{id}', [PdfController::class, 'sevenPdfDownload'])->name('sevenStudent-pdf');

Route::get('/eight', [EightController::class, 'eight'])->name('eight');
Route::get('/view-student/{id}', [EightController::class, 'eightStudnetView'])->name('view-student');

Route::get('/nine', [NineController::class, 'nine'])->name('nine');
Route::get('/view-student/{id}', [NineController::class, 'nineStudnetView'])->name('view-student');

Route::get('/ten', [TenController::class, 'ten'])->name('ten');
Route::get('/view-student/{id}', [TenController::class, 'tenStudnetView'])->name('view-student');
Route::get('/studnetPdf/{id}', [PdfController::class, 'pdfDownload'])->name('student-pdf');
//Teachers
Route::get('/addTeacher', [TeacherController::class, 'addTeacher'])->name('add-teacher');
Route::post('/saveTeacher', [TeacherController::class, 'sotreData'])->name('save-teacher');
Route::get('/teacherPdf/{id}', [PdfController::class, 'TeacherpdfDownload'])->name('teacher-pdf');

Route::get('/allTeacher', [TeacherController::class, 'allTeacher'])->name('all-teacher');
Route::get('/editTeacher/{id}', [TeacherController::class, 'editTeacher'])->name('edit-teacher');
Route::post('/updateTeacher', [TeacherController::class, 'teacherFinalUpdate'])->name('update-teacher');





