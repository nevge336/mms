<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CustomAuthController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/student', [StudentController::class, 'index'])->name('students.index');
Route::get('/student/{student}', [StudentController::class, 'show'])->name('students.show');
Route::get('/student-create', [StudentController::class, 'create'])->name('students.create');
Route::post('/student-create', [StudentController::class, 'store'])->name('students.store');
Route::get('/student-edit/{student}', [StudentController::class, 'edit'])->name('students.edit');
Route::put('/student-edit/{student}', [StudentController::class, 'update'])->name('students.edit');
Route::delete('/student/{student}', [StudentController::class, 'destroy'])->name('students.destroy');

Route::get('/registration', [CustomAuthController::class, 'create'])->name('registration');
Route::post('/registration', [CustomAuthController::class, 'store'])->name('registration');
Route::get('/login',[CustomAuthController::class, 'index'])->name('login');
Route::post('/authentication', [CustomAuthController::class, 'authentication'])->name('authentication');
Route::get('/logout', [CustomAuthController::class, 'logout'])->name('logout');
