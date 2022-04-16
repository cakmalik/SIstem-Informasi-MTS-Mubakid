<?php
namespace App\Helpers;

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
    public static function sendWa($student_id, $message)
    {     
        $student = Student::where('id',$student_id)->first();
        if($student!=null){
            $no_wa = $student->no_hp;
            $no_wa = Str::substr($no_wa, 1);
            $no_wa = '62'.$no_wa;
            // $message = DatabaseSetting::where('name',$message)->first()->value;
            $message = "Assalamualaikum. Wr. Wb \n Terimakasih Ayah/Ibu yang telah melakukan registrasi untuk ananda #nama di MTs. Miftahul ulum 2 Banyaputih Kidul Jatiroto Lumajang. \n\nTerimakasih atas perhatiannya. \n\n_(Wa ini dikirim otomatis. untuk informasi lebih lanjut 081336163361)_";
            $yang_mau_diganti = ['#nama','#email','#password'];
            $ganti_dengan = [$student->nama_lengkap,$student->user->email,$student->user->password];
            $message = str_replace($yang_mau_diganti, $ganti_dengan, $message);

            $client = new Client();
            try {
                $res = $client->post('http://sister.sditharum.id:1234/send-message', [
                    
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
    }