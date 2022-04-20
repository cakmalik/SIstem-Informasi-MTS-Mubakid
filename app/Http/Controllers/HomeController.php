<?php

namespace App\Http\Controllers;

use App\Helpers\Malik;
use stdClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Payment\TransactionController;

class HomeController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function index()
    {
        if(auth()->user()->hasRole('guest')){
            $malik = new Malik();
            $kota = $malik->getKota();
            $prov = $malik->getProvinsi();
            $pesan = Auth::user()->name.', Selangkah lagi pendaftaranmu selesai';
            Alert::toast($pesan, 'success');
            return view('guest.create',compact('kota','prov'));
        }elseif(auth()->user()->hasRole('siswa')){
            $status = Auth::user()->student->status;
            if($status=='baru'){
                $next_step = true;
                $trans = new TransactionController();
                // cek apakah sdh buat methode pembayaran
                $isBill = $trans->isCreateBill();
                if($isBill==true){
                    // jika sudah buat tagihan
                    // cek apa sdh bayar
                    $isPaid = $trans->isPaid(1);
                    // jika sudah bayar
                    if($isPaid==true){
                        $link = 'kosong';
                        // Maka kosongkan penagihan
                    }else{
                        // cek kode tagihan
                        $link = $trans->checkReference(1)->reference;
                    }
                }else{
                    // jika belum buat tagihan
                    // link baru adalah buat tagihan
                    $link = 'baru';
                }
            }else{
                $next_step = false;
            }
            return view('home',compact('next_step', 'link'));
        }else{
            return view('home');
        }
    }
    public function isNewStudent()
    {
        $student = Auth::user()->student->status;
        if ($student == 'baru') {
            $isNewStudent = true;
        } else {
            $isNewStudent = false;
        }
        return $isNewStudent;
    }
    public function tes()
    {
       
    }
}
