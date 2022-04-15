<?php
namespace App\Helpers;

use App\Models\Grade;
use App\Models\Student;
use App\Models\DatabaseSetting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Malik {
    public static function generateNis()
    {
        $cek_nis = Student::max('nis');
        $nsm = DatabaseSetting::where('name','nsm')->first()->value;
        $tahun = date('y');
        
        if($cek_nis == null){
            $nis_start_from = DatabaseSetting::where('name','nis_start_from')->first()->value;
            $nis_start_from = $nis_start_from + 1;
            $nis = $nsm .' '. $tahun .' '. $nis_start_from;
        }else{
            $pecah_nis = explode(" ", $cek_nis);
            $hasil = (int)$pecah_nis[2] + 1;
            $nis = $nsm .' '. $tahun .' '. $hasil;
        }
        return $nis;
    }
    
    public static function trimNis($nis){
       $nis = str_replace(' ', '', $nis);
        return $nis;
    }
}