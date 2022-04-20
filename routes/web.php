<?php

use App\Helpers\Malik;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ImportExportController;
use App\Http\Controllers\Payment\TransactionController;
use App\Http\Controllers\Payment\TripayCallbackController;
use App\Http\Controllers\TeacherController;

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(PDFController::class)->name('pdf.')->group(function ()
{
    Route::get('/pdf/biodata/{id}','biodata')->name('biodata');
    Route::get('/pdf/mou/{id}','mou')->name('mou');
});

// NOTE:PAYMENT
Route::group(['middleware'=>['role:siswa|admin|super admin']], function ()
{
   Route::controller(TransactionController::class)->group(function ()
   {
       Route::post('/transaction/cash','payCash')->name('pay.cash');
       Route::get('/transaction/detail/{reference}','show')->name('pay.detail');
       Route::get('/transaction/change-method/{reference}','changeMethod')->name('pay.change');
       Route::get('/transaction/list/{method}','daftarTransaksi')->name('pay.list');
       Route::get('/checkout/{for}','checkout')->name('pay.checkout');
       Route::post('/checkout_proses','store')->name('pay.request');   
       Route::get('/guest/bills','guestBills')->name('guest.bills');
   });
});
Route::post('callback',[TripayCallbackController::class,'handle']);

Route::controller(StudentController::class)->name('students.')->group(function ()
{
    Route::get('/student/verify/{student}','verify')->name('verify');
    Route::get('/student/status/{status}','status')->name('status');
});

Route::resource('students', StudentController::class);
Route::group(['middleware'=>['role:admin|super admin']], function ()
{
});

Route::controller(ImportExportController::class)->name('import.')->group(function ()
{
    Route::get('import','index')->name('index');
    Route::post('import/students','importStudents')->name('students');
});
Route::controller(ImportExportController::class)->name('export.')->group(function ()
{
    Route::get('export/students','exportStudents')->name('students');
});

Route::resource('users', UserController::class);
Route::resource('grades', GradeController::class);
Route::resource('teachers', TeacherController::class);