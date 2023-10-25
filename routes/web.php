<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\ClassController;
use App\Http\Controllers\Admin\AttendanceController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\DashboardController;

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
Route::group(
    [
        'prefix' => 'admin',
        'middleware' => [ 'auth:sanctum' ,'Admin'],
    ],
    function () {
            Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
            Route::resource('groups', GroupController::class);
            Route::get('create_group_students/{id}', [GroupController::class, 'createStudent'])->name('create_group_students');
            Route::post('store_group_students', [GroupController::class, 'storeGroupStudent'])->name('store_group_students');
            
            Route::resource('levels', LevelController::class);
            Route::post('level-store-month', [LevelController::class, 'storeMonth'])->name('level-store-month');
            Route::resource('courses', CourseController::class);
            Route::resource('students', StudentController::class);
            Route::get('printbarcode/{id}', [StudentController::class, 'printBarcode'])->name('printbarcode');
            Route::get('printallbarcode/{id}', [GroupController::class, 'printAllBarcode'])->name('printallbarcode');
            Route::resource('classes', ClassController::class);
            Route::get('end-class/{id}', [ClassController::class, 'endClass'])->name('end-class');
            Route::resource('attendances', AttendanceController::class);
            Route::post('attend-and-skip', [AttendanceController::class, 'attendAndSkip'])->name('attend-and-skip');
            Route::post('pay-and-attend', [AttendanceController::class, 'payAndAttend'])->name('pay-and-attend');
            Route::post('pay-per-class', [AttendanceController::class, 'payPerClass'])->name('pay-per-class');
            Route::post('pay-per-month', [AttendanceController::class, 'payPerMonth'])->name('pay-per-month');
            Route::resource('invoices', InvoiceController::class);
            Route::resource('attendances', AttendanceController::class);
            Route::post('attendance_show', [AttendanceController::class, 'attendanceShow'])->name('attendance_show');
            Route::post('fetch-monthes', [AttendanceController::class, 'fetchMonthes'])->name('fetch-monthes');
            Route::get('pay_create/{id}', [InvoiceController::class, 'payCreate'])->name('pay_create');
            Route::get('student_pay/{student_id}/{group_id}', [InvoiceController::class, 'studentPay'])->name('student_pay');
            
            
    }
);
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';