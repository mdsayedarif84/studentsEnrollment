<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Student\StudentLoginController;


// Route::get('/', function () {
//     return view('student-login');
// });
Route::get('/', [StudentLoginController::class, 'index'])->name('student-login');
Route::get('/backend', [AdminLoginController::class, 'index'])->name('admin-login');
Route::post('/dashboard', [AdminLoginController::class, 'dashboard'])->name('dasboard');

