<?php
namespace App\Helpers;

use stdClass;
use App\Models\Grade;
use GuzzleHttp\Client;
use App\Models\Student;
use Illuminate\Support\Str;
use App\Models\DatabaseSetting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Malik {
    
    public static function generateNis()
    {
        $cek_nis = Student::max('urutan');
        $nsm = DatabaseSetting::where('name','nsm')->first()->value;
        $tahun = date('y');
        
        if($cek_nis == null){
            $nis_start_from = DatabaseSetting::where('name','nis_start_from')->first()->value;
            $nis = $nsm .' '. $tahun .' '. $nis_start_from;
            $urutan = $nis_start_from;
        }else{
            $nis = $nsm .' '. $tahun .' '. $cek_nis+1;
            $urutan = $cek_nis+1;   
        }
        $nis_n_urutan = [$nis, $urutan];
        return $nis_n_urutan;
    }
    
    public static function trimNis($nis){
        $nis = str_replace(' ', '', $nis);
        return $nis;
    }
    // wa malik
    public static function sendWa($student_id)
    {     
        $student = Student::where('id',$student_id)->first();
        if($student!=null){
            $no_wa = $student->no_hp;
            $no_wa = Str::substr($no_wa, 1);
            $no_wa = '62'.$no_wa;
            // $message = DatabaseSetting::where('name',$message)->first()->value;
            $message = "Assalamualaikum. Wr. Wb \nTerimakasih Ayah/Ibu yang telah melakukan registrasi untuk ananda *#nama* di MTs. Miftahul ulum 2 Banyaputih Kidul Jatiroto Lumajang.\nBerikut kami lampirkan informasi login akun SIM (Sistem Informasi Madrasah). yang Insyaallah akan dapat digunakan untuk memantau kegiatan ananda selama di Madrasah. Presensi kehadiran, Rekap Izin, Hasil Ujian, dan rekap pembayaran. \n\nEmail : #email  \n\nTerimakasih atas perhatiannya. \n\n_(Wa ini dikirim otomatis. untuk informasi lebih lanjut dapat menghubungi 081336163361)_";
            $yang_mau_diganti = ['#nama','#email'];
            $ganti_dengan = [$student->nama_lengkap,$student->user->email];
            $message = str_replace($yang_mau_diganti, $ganti_dengan, $message);

            $client = new Client();
            try {
                $res = $client->post('http://sister.sditharum.id:1705/send-message', [
                    
                    'headers' => [
                        'Content-Type' => 'application/x-www-form-urlencoded',
                    ],
                    'form_params' => [
                        'number' => $no_wa,
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
    }