<?php
namespace App\Helpers;

use App\Models\Grade;
use App\Models\Student;
use App\Models\DatabaseSetting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
 
class Malik {
    public static function nis()
    {
        $nis_start_from = DatabaseSetting::where('name','nis_start_from')->first();
        dd($nis_start_from);
        $thn = date('y');
        $nsm = DatabaseSetting::where('name','nsm')->first()->value;
        $latestNis= Student::orderBy('nis','desc')->first();

        if($latestNis->nis){
            $pecah_nis = explode(" ", $latestNis->nis);
            //mencari element array 0
            $hasil = $pecah_nis[2];
            //tampilkan hasil pemecahan
            $no_urut_berikutnya = $hasil+1;
            $nis = $nsm.' '.$thn.' '.$no_urut_berikutnya;
        }else{
            $nis = $nsm.' '.$thn.' '.$nis_start_from;
        }
        return $nis;
    }
    
    public static function cekRoleId()
    {
        $email = Auth::user()->email;
        $cekrole = Student::where('email',$email)->first()->role_id;
        return $cekrole;
    }
}