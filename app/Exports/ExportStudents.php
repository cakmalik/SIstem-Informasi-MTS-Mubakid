<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportStudents implements FromQuery, WithHeadings
{
    
    use Exportable;
    
    // public function __construct(int $id)
    // {
        //     $this->id = $id;
        // }
        
        public function query()
        {
            // menggunakan query ini tidak perlu get
            return Student::query()->select(
                'nis',
                'nama_lengkap',
                'nisn',
                'nik',
                'kk',
                'tempat_lahir',
                'tanggal_lahir',
                'jenis_kelamin',
                'alamat',
                'desa',
                'kecamatan',
                'kota',
                'provinsi',
                'kode_pos',
                'no_hp',
                'hobi',
                'cita_cita',
                
                'asal_sekolah',
                'npsn_sekolah',
                'alamat_sekolah_asal',
                'no_un',
                'no_seri_ijazah',
                'no_skhun',
                'prestasi',
                'tingkat_prestasi',
                
                'status_keluarga',
                'anak_ke',
                'nama_ayah',
                'nik_ayah',
                'tempatlahir_ayah',
                'tanggallahir_ayah',
                'pendidikan_ayah',
                'pekerjaan_ayah',
                'nama_ibu',
                'nik_ibu',
                'tempatlahir_ibu',
                'tanggallahir_ibu',
                'pendidikan_ibu',
                'pekerjaan_ibu',
                'penghasilan',
                
                'no_pkh',
                'no_kks_kps',
                'no_kip',
                
                'status',
            );
        }
        
        public function headings(): array
        {
            return [
                'nis',
                'nama_lengkap',
                'nisn',
                'nik',
                'kk',
                'tempat_lahir',
                'tanggal_lahir',
                'jenis_kelamin',
                'alamat',
                'desa',
                'kecamatan',
                'kota',
                'provinsi',
                'kode_pos',
                'no_hp',
                'hobi',
                'cita_cita',
                
                'asal_sekolah',
                'npsn_sekolah',
                'alamat_sekolah_asal',
                'no_un',
                'no_seri_ijazah',
                'no_skhun',
                'prestasi',
                'tingkat_prestasi',
                
                'status_keluarga',
                'anak_ke',
                'nama_ayah',
                'nik_ayah',
                'tempatlahir_ayah',
                'tanggallahir_ayah',
                'pendidikan_ayah',
                'pekerjaan_ayah',
                'nama_ibu',
                'nik_ibu',
                'tempatlahir_ibu',
                'tanggallahir_ibu',
                'pendidikan_ibu',
                'pekerjaan_ibu',
                'penghasilan',
                
                'no_pkh',
                'no_kks_kps',
                'no_kip',
                
                'status',
            ];
        }
        
        // public function collection()
        // {
            //     return Student::select('nama_lengkap','nis','no_hp','kota')->get();
            // }
        }
        