<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminLoginController;
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
//Teacher
use App\Http\Controllers\Teacher\TeacherController;


// Route::get('/', function () {
//     return view('student-login');
// });
Route::get('/', [StudentLoginController::class, 'index'])->name('student-login');
Route::get('/backend', [AdminLoginController::class, 'index'])->name('admin-login');
Route::post('/admin_login', [AdminLoginController::class, 'adminLogin'])->name('admin-dashboard');
Route::get('/dashboard', [AdminLoginController::class, 'dashboard'])->name('dashboard');

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
Route::get('/seven', [SevenController::class, 'seven'])->name('seven');
Route::get('/eight', [EightController::class, 'eight'])->name('eight');
Route::get('/nine', [NineController::class, 'nine'])->name('nine');
Route::get('/ten', [TenController::class, 'ten'])->name('ten');
//Teachers
Route::get('/allTeacher', [TeacherController::class, 'allTeacher'])->name('all-teacher');





