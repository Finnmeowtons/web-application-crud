<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherAndStudentController;
use App\Http\Controllers\TeacherController;

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// Route::middleware('auth:sanctum')->get('/user', function(Request $request) {
//     return $request->user();
// });

Route::get('/index', [TeacherAndStudentController::class, 'index'])->name('index');

Route::get('/index/teacher/create', [TeacherAndStudentController::class, 'create_teacher'])->name('teacher.create');
Route::post('/index/teacher', [TeacherAndStudentController::class, 'store_teacher'])->name('teacher.store');
Route::get('/index/teacher/{teacher}/edit', [TeacherAndStudentController::class, 'edit_teacher'])->name('teacher.edit');
Route::put('/index/teacher/{teacher}/update', [TeacherAndStudentController::class, 'update_teacher'])->name('teacher.update');
Route::delete('/index/teacher/{teacher}/delete', [TeacherAndStudentController::class, 'delete_teacher'])->name('teacher.delete');


Route::get('/index/student/create', [TeacherAndStudentController::class, 'create_student'])->name('student.create');
Route::post('/index/student', [TeacherAndStudentController::class, 'store_student'])->name('student.store');
Route::get('/index/student/{student}/edit', [TeacherAndStudentController::class, 'edit_student'])->name('student.edit');
Route::put('/index/student/{student}/update', [TeacherAndStudentController::class, 'update_student'])->name('student.update');
Route::delete('/index/student/{student}/delete', [TeacherAndStudentController::class, 'delete_student'])->name('student.delete');



Route::get('testing', function(){
    return 'tesst';
});

// Route::post('add_teacher', [TeacherController::class, "add_teacher"]);

require __DIR__.'/auth.php';
