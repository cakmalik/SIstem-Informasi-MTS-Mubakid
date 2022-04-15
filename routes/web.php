<?php

use App\Helpers\Malik;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Payment\TransactionController;


Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('students', StudentController::class);

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





Route::get('/coba', function ()
{
    $number = 6282247345660;
        $message = "TEST WA";
        $client = new Client();
        try {
            $res = $client->post('http://sister.sditharum.id:1234/send-message', [
                
                'headers' => [
                    'Content-Type' => 'application/x-www-form-urlencoded',
                ],
                'form_params' => [
                    // 'number' => sprintf('%08d', 85233002598),
                    'number' => $number,
                    'message' => $message
                    ]
                ]);
                $res = json_decode($res->getBody()->getContents(), true);
                return back()->with('success','Terkirim');
            }
            catch (Exception $e) {
                $response = $e->getresponse();
                $result =  json_decode($response->getBody()->getContents());
                return response()->json(['data' => $result]);
            }
});