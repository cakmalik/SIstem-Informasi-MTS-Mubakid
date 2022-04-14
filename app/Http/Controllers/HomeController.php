<?php

namespace App\Http\Controllers;

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
            $kota = $this->getKota();
            $prov = $this->getProvinsi();
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
    public function getKota()
    {
        $curl_kota = curl_init();
        
        curl_setopt_array($curl_kota, [
            CURLOPT_URL => 'http://api.rajaongkir.com/starter/city',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => ['key: 656724c6467711a1a6adfa81ff5e97ce'],
        ]);
        
        $response = curl_exec($curl_kota);
        $err = curl_error($curl_kota);
        
        curl_close($curl_kota);
        
        $listKota = []; //bikin array untuk nampung list kota
        
        if ($err) {
            echo 'cURL Error #:' . $err;
        } else {
            $arrayResponse = json_decode($response, true); //decode response dari raja ongkir, json ke array
            
            $tempListKota = $arrayResponse['rajaongkir']['results']; // ambil array yang dibutuhin aja, disini resultnya aja
            
            //looping array temporary untuk masukin object yang kita butuhin
            foreach ($tempListKota as $value) {
                //bikin object baru
                $kota = new stdClass();
                $kota->id = $value['city_id']; //id kotanya
                $kota->nama = $value['city_name']; //nama kotanya
                $kota->type = $value['type']; //nama kotanya
                
                array_push($listKota, $kota); //push object kota yang kita bikin ke array yang nampung list kota
            }
            return $listKota;
        }
    }
    public function getProvinsi()
    {
        $curl_prov = curl_init();
        
        curl_setopt_array($curl_prov, [
            CURLOPT_URL => 'http://api.rajaongkir.com/starter/province',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => ['key: 656724c6467711a1a6adfa81ff5e97ce'],
        ]);
        
        $response = curl_exec($curl_prov);
        $err = curl_error($curl_prov);
        
        curl_close($curl_prov);
        
        $listprov = []; //bikin array untuk nampung list kota
        
        if ($err) {
            echo 'cURL Error #:' . $err;
        } else {
            $arrayResponse = json_decode($response, true); //decode response dari raja ongkir, json ke array
            
            $templistprov = $arrayResponse['rajaongkir']['results']; // ambil array yang dibutuhin aja, disini resultnya aja
            
            //looping array temporary untuk masukin object yang kita butuhin
            foreach ($templistprov as $value) {
                //bikin object baru
                $prov = new stdClass();
                //  $prov->id = $value['province_id']; //id provnya
                $prov->nama = $value['province']; //nama provnya
                //  $prov->type = $value['type']; //nama provnya
                
                array_push($listprov, $prov); //push object prov yang kita bikin ke array yang nampung list prov
            }
            
            return $listprov;
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
}
