<?php

namespace App\Http\Controllers\Payment;

use Illuminate\Http\Request;
use App\Services\TripayService;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Models\BillType;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class TransactionController extends Controller
{
    public function checkout()
    {
        $tripay = new TripayService();
        $channels= $tripay->getPaymentChannels();
        return view('payment.checkout',compact('channels'));
    }
    public function store(Request $request)
    {
        $method = $request->method;
        $bill = BillType::where('name',$request->bill_type_id)->first();
        if($bill!=null){
            $bill_type_id = $bill->id;
            $amount = $bill->amount;    
            $user = Auth::user();
            // dd($amount);
            if($method=='tunaicash'){ 
                $reference = 'MBKD-'.time();
                $this->storeToDatabase($bill_type_id,$user,$reference,$amount);
                return redirect()->route('pay.detail', ['reference'=>$reference]);
            }else{
                $tripay = new TripayService();
                $transaction = $tripay->requestTransaction($method,$bill);
                
                Transaction::create([
                    'user_id'=>$user->id,
                    'bill_type_id'=>$bill_type_id,
                    'reference'=>$transaction->reference,
                    'merchant_ref'=>$transaction->merchant_ref,
                    'total_amount'=>$transaction->amount,
                    'status'=>$transaction->status
                ]);
                return redirect()->route('pay.detail', ['reference'=>$transaction->reference]);
            }
        }else{
            return back()->with('error','Bill type not found');
        }
    }
    public function show($reference){   
        $transaksi = Transaction::where('reference',$reference)->first();
        $bill_type_id = $transaksi->bill_type_id;
        if($transaksi->is_cash==true){            
            $transaction = $this->_cashSteps($bill_type_id, $transaksi);
            $transaction = (object) $transaction;
            return view('payment.show', compact('transaction'));
        }else{
            $tripay = new TripayService();
            $transaction = $tripay->detail($reference);
            return view('payment.show', compact('transaction'));
        }
    }
    public function storeToDatabase($bill_type_id,$user,$reference,$amount)
    {
        $merchant_ref = 'REG'.time();
        Transaction::create([
            'user_id'=>$user->id,
            'bill_type_id'=>$bill_type_id,
            'reference'=>$reference,
            'merchant_ref'=>$merchant_ref,
            'total_amount'=>$amount,
            'is_cash'=>true,
        ]);
    }
    public function guestBills()
    {
        $bill_type_id = BillType::where('name','pendaftaran')->first()->id;
        $bills = Transaction::where('user_id',Auth::user()->id)
        ->where('bill_type_id',$bill_type_id)
        ->latest()->first();
        return redirect()->route('pay.detail', ['reference'=>$bills->reference]);
    }
    public function _cashSteps($id, $transaksi)
    {
        $transaction = [
            'reference' => $transaksi->reference, 
            'merchant_ref' => $transaksi->merchant_reff, 
            'payment_method' => 'TUNAI', 
            'payment_name' => 'Tunai', 
            'customer_name' => Auth::user()->name, 
            'customer_email' => Auth::user()->email, 
            'customer_phone' => Auth::user()->student->no_hp, 
            // 'callback_url' => null, 
            // 'return_url' => null, 
            'amount' => $transaksi->total_amount, 
            'fee_merchant' => 0, 
            'fee_customer' => 0, 
            'total_fee' => $transaksi->total_amount, 
            'status' => 'UNPAID', 
            'paid_at' => null, 
            'expired_time' => null, 
            'order_items' => collect([
                (object)[
                    "name" => "Pendaftaran", 
                    "price" => $transaksi->total_amount, 
                    "quantity" => 1, 
                    "subtotal" => $transaksi->total_amount, 
                    "product_url" => null, 
                    "image_url" => null 
                ], 
            ]), 
            "instructions" => collect([
                (object)[
                    "title" => "Tunai", 
                    "steps" => [
                        "Mendatangi kantor kami di Pondok pesantren PP Miftahul Ulum Banyuputih Kidul Lumajang", 
                        "Berikan Kode beserta uang tunai kepada Petugas",
                        "Kami akan memberikan bukti pembayaran berupa Nota/struk atau",
                        "Kami akan mengirimkan bukti pembayaran ke email/wa anda",
                        "Transaksi sukses, simpan bukti transaksi Anda" 
                    ], 
                ], 
            ]),
        ];
        return $transaction;
    }
    public function isCreateBill()
    {
        $bill_type_id = BillType::where('name','pendaftaran')->first()->id;
        $bill = Transaction::where('user_id',Auth::user()->id)
        ->where('bill_type_id',$bill_type_id)
        ->latest()->first();
        if($bill==null){
            return false;
        }else{
            return true;
        }
    }
    public function isPaid($bill_type_id){
        $transaksi = Transaction::where('bill_type_id',$bill_type_id)
        ->where('user_id',Auth::user()->id)
        ->where('status','PAID')
        ->first();
        if($transaksi==null){
            return false;
        }else{
            return $transaksi;
        }
    }
    public function checkReference($bill_type_id)
    {
        $reference = Auth::user()->transactions
        ->where('status','unpaid')
        ->where('bill_type_id',$bill_type_id)
        ->first();
        return $reference;
    }
    public function changeMethod($reference)
    {
        // sebelum mengubah pastikan dulu, bahwa ia belum membayar
        if($this->checkStatus($reference)=='unpaid'){
            //hapus methode lama
            Transaction::where('reference',$reference)->delete();
            return redirect()->route('pay.checkout','pendaftaran');
        }
    }
    public function checkStatus($reference)
    {
        $transaksi = Transaction::where('reference',$reference)->first();
        return $transaksi->status;
    }
    public function daftarTransaksi($method)
    {
        if($method=='offline'){
            $transactions = 'offline';
        }else{
            $tripay = new TripayService();
            $transactions = $tripay->daftarTransaksi();
        }
        return view('payment.list', compact('transactions'));
    }
    // public function payCash(Request $request)
    // {
    //     $transaksi = Transaction::where('reference',$request->reference)->update(['status'=>'PAID']);
    //     Alert::success('Success','Pembayaran Berhasil');
    //     return redirect()->route('pay.list','offline');
    // }
}
