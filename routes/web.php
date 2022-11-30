<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\HospitalsController;
Use App\Http\Controllers\UserController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ScenarioController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ScenarioMappingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

// Route::Get('language/{locale}', function ($locale) {
//     app()->setLocale($locale);
//     session()->put('locale', $locale);
//     return redirect()->route('update_lang');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
Route::Get('/update_lang', [SettingsController::class, 'updateLang'])->name('update_lang');
Route::Get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('settings', SettingsController::class);
Route::resource('user', UserController::class);
Route::resource('scenario_mapping', ScenarioMappingController::class);
Route::resource('hospitals', HospitalsController::class);
Route::resource('department', DepartmentController::class);
Route::resource('scenario', ScenarioController::class);
// Admin
Route::Get('admin/{status}', [UserController::class, 'index'])->name('admin');
Route::Get('admin_create/{status}', [UserController::class, 'create'])->name('admin_create');
Route::Get('admin_edit/{status}/{userId}', [UserController::class, 'edit'])->name('admin_edit');
Route::Post('admin_show', [UserController::class, 'show'])->name('admin_show');
//Teacher
Route::Get('teacher/{status}', [UserController::class, 'index'])->name('teacher');
Route::Get('teacher_create/{status}', [UserController::class, 'create'])->name('teacher_create');
Route::Get('teacher_edit/{status}/{userId}', [UserController::class, 'edit'])->name('teacher_edit');
Route::Post('teacher_show', [UserController::class, 'show'])->name('teacher_show');
Route::Get('hospital_teacher', [UserController::class, 'hospitalTeacher'])->name('hospital_teacher');

//Student
Route::Get('student/{status}', [UserController::class, 'index'])->name('student');
Route::Get('student_create/{status}', [UserController::class, 'create'])->name('student_create');
Route::Get('student_edit/{status}/{userId}', [UserController::class, 'edit'])->name('student_edit');
Route::Post('student_show', [UserController::class, 'show'])->name('student_show');
Route::Get('student_session_details/{id}', [UserController::class, 'studentSessionDetails'])->name('student_session_details');


//Student
Route::Get('superadmin/{status}', [UserController::class, 'index'])->name('superadmin');
Route::Get('superadmin_create/{status}', [UserController::class, 'create'])->name('superadmin_create');
Route::Get('superadmin_edit/{status}/{userId}', [UserController::class, 'edit'])->name('superadmin_edit');
Route::Post('superadmin_show', [UserController::class, 'show'])->name('superadmin_show');


Route::post('/settings/{id}/updateEmail', [SettingsController::class, 'updateEmail'])->name('updateEmail');
Route::post('/settings/{id}/updatePassword', [SettingsController::class, 'updatePassword'])->name('updatePassword');
});
require __DIR__.'/auth.php';
