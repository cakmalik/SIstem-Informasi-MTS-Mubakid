<?php

use App\Helpers\Malik;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Payment\TransactionController;
use Illuminate\Support\Facades\Artisan;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('sendWa',function ()
// {
//     Malik::sendWa(1,'wa_success_reg');
//     return 'berhasil';
// });

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

Route::get('student/status/{status}', [StudentController::class, 'status'])->name('students.status');
Route::resource('students', StudentController::class);
Route::group(['middleware'=>['role:admin|super admin']], function ()
{
});