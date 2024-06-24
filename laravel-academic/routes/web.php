<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ModuleController;

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
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

//Course routes
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show');
Route::get('/courses/{course}/edit', [CourseController::class, 'edit'])->name('courses.edit');
Route::put('/courses/{course}', [CourseController::class, 'update'])->name('courses.update');
Route::delete('/courses/{course}', [CourseController::class, 'destroy'])->name('courses.destroy');

// Module routes
Route::get('/courses/{course}/modules', [ModuleController::class, 'index'])->name('courses.modules.index');
Route::get('/courses/{course}/modules/create', [ModuleController::class, 'create'])->name('courses.modules.create');
Route::post('/courses/{course}/modules', [ModuleController::class, 'store'])->name('courses.modules.store');
Route::get('/modules/{module}', [ModuleController::class, 'show'])->name('modules.show');
Route::get('/modules/{module}/edit', [ModuleController::class, 'edit'])->name('modules.edit');
Route::put('/modules/{module}', [ModuleController::class, 'update'])->name('modules.update');
Route::delete('/modules/{module}', [ModuleController::class, 'destroy'])->name('modules.destroy');
// Route::get('/mycourses', [ModuleController::class, 'studentCourses'])->name('modules.studentCourses');





Route::middleware(['auth', 'role:Admin,Academic Head'])->group(function () {
    Route::resource('courses', CourseController::class);
    Route::resource('courses.modules', ModuleController::class);
});

Route::middleware(['auth', 'role:Teacher,Student,Admin,Academic Head'])->group(function () {
    Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show');
    Route::get('/modules/{module}', [ModuleController::class, 'show'])->name('modules.show');
    Route::get('/mycourses', [ModuleController::class, 'studentCourses'])->name('modules.studentCourses');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
