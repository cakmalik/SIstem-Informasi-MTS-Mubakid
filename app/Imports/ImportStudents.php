<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ImportStudents implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure
{
    use Importable, SkipsErrors, SkipsFailures;
    
    public function model(array $row)
    {
        return new Student([
            'id'=>$row['id'],
            'user_id'=>$row['user_id'],
            'nis'=>$row['nis'],
            'nama_lengkap'=>$row['nama_lengkap'],
            'nisn'=>$row['nisn'],
            'nik'=>$row['nik'],
            'kk'=>$row['kk'],
            'tempat_lahir'=>$row['tempat_lahir'],
            'tanggal_lahir'=>$row['tanggal_lahir'],
            'jenis_kelamin'=>$row['jenis_kelamin'],
            'alamat'=>$row['alamat'],
            'desa'=>$row['desa'],
            'kecamatan'=>$row['kecamatan'],
            'kota'=>$row['kota'],
            'provinsi'=>$row['provinsi'],
            'kode_pos'=>$row['kode_pos'],
            'no_hp'=>$row['no_hp'],
            'hobi'=>$row['hobi'],
            'cita_cita'=>$row['cita_cita'],
            
            'asal_sekolah'=>$row['asal_sekolah'],
            'npsn_sekolah'=>$row['npsn_sekolah'],
            'alamat_sekolah_asal'=>$row['alamat_sekolah_asal'],
            'no_un'=>$row['no_un'],
            'no_seri_ijazah'=>$row['no_seri_ijazah'],
            'no_skhun'=>$row['no_skhun'],
            'prestasi'=>$row['prestasi'],
            'tingkat_prestasi'=>$row['tingkat_prestasi'],
            
            'status_keluarga'=>$row['status_keluarga'],
            'anak_ke'=>$row['anak_ke'],
            'nama_ayah'=>$row['nama_ayah'],
            'nik_ayah'=>$row['nik_ayah'],
            'tempatlahir_ayah'=>$row['tempatlahir_ayah'],
            'tanggallahir_ayah'=>$row['tanggallahir_ayah'],
            'pendidikan_ayah'=>$row['pendidikan_ayah'],
            'pekerjaan_ayah'=>$row['pekerjaan_ayah'],
            'nama_ibu'=>$row['nama_ibu'],
            'nik_ibu'=>$row['nik_ibu'],
            'tempatlahir_ibu'=>$row['tempatlahir_ibu'],
            'tanggallahir_ibu'=>$row['tanggallahir_ibu'],
            'pendidikan_ibu'=>$row['pendidikan_ibu'],
            'pekerjaan_ibu'=>$row['pekerjaan_ibu'],
            'penghasilan'=>$row['penghasilan'],
            
            'no_pkh'=>$row['no_pkh'],
            'no_kks_kps'=>$row['no_kks_kps'],
            'no_kip'=>$row['no_kip'],
            'foto_siswa'=>$row['foto_siswa'],
            'foto_ortu'=>$row['foto_ortu'],
            
            'status'=>$row['status'],
        ]);
    }

    public function rules():array
    {
        return [
            '*.nik'=>['unique:students,nik']
        ];
    }

    public function customValidationMessages()
    {
        return [
            'nik.unique' => ' :attribute sudah ada.',
        ];
    }
}
