<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Transaction;
use RealRashid\SweetAlert\Facades\Alert;

class OfflinePayment extends Component
{
    
    // public $message;
    public function render()
    {
        $transactions = Transaction::where('is_cash',true)->get();
        return view('livewire.offline-payment',compact('transactions'));
    }
    public function bayar($id)
    {
        Transaction::find($id)->update(['status'=>'paid']);
        Alert::success('Success','Pembayaran Berhasil');
    }
}