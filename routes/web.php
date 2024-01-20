<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\App;


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
    // Use 'en' as default if no 'lang' query parameter is provided
    $locale = request()->get('lang', 'en');
    App::setLocale($locale);
    return view('home');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/student', [StudentController::class, 'index'])->name('students.index');
    Route::get('/student/{student}', [StudentController::class, 'show'])->name('students.show');
    Route::get('/student-create', [StudentController::class, 'create'])->name('students.create');
    Route::post('/student-create', [StudentController::class, 'store'])->name('students.store');
    Route::get('/student-edit/{student}', [StudentController::class, 'edit'])->name('students.edit');
    Route::put('/student-edit/{student}', [StudentController::class, 'update'])->name('students.edit');
    Route::delete('/student/{student}', [StudentController::class, 'destroy'])->name('students.destroy');
    Route::get('/dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');
});





Route::get('/registration', [CustomAuthController::class, 'create'])->name('registration');
Route::post('/registration', [CustomAuthController::class, 'store'])->name('registration');
Route::get('/login', [CustomAuthController::class, 'index'])->name('login');
Route::post('/authentication', [CustomAuthController::class, 'authentication'])->name('authentication');
Route::get('/logout', [CustomAuthController::class, 'logout'])->name('logout');


Route::get('/lang/{locale}', [LanguageController::class, 'index'])->name('lang');
