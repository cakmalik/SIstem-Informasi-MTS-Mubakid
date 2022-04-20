<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Grade;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
* @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
*/
class StudentFactory extends Factory
{
    /**
    * Define the model's default state.
    *
    * @return array<string, mixed>
    */
    public function definition()
    {
        return [
            'user_id'=>User::factory(),
            'nis'=>'121235080122 22 '.$this->faker->numberBetween(1000,10000),
            'nama_lengkap'=>$this->faker->name,
            'nisn'=>$this->faker->name,
            'nik'=>$this->faker->numberBetween(10000000000,99999999999),
            'kk'=>$this->faker->numberBetween(10000000000,99999999999),
            'tempat_lahir'=>$this->faker->city(),
            'tanggal_lahir'=>$this->faker->date(),
            'jenis_kelamin'=>$this->faker->randomElement(['Perempuan']),
            // 'jenis_kelamin'=>$this->faker->randomElement(['Laki-laki','Perempuan']),
            'alamat'=>$this->faker->citySuffix(),
            'desa'=>$this->faker->address(),
            'kecamatan'=>$this->faker->citySuffix(),
            'kota'=>$this->faker->city(),
            'provinsi'=>$this->faker->city(),
            'kode_pos'=>$this->faker->numberBetween(10000,99999),
            'no_hp'=>$this->faker->phoneNumber(),
            'hobi'=>$this->faker->name,
            'cita_cita'=>$this->faker->name,
            
            'asal_sekolah'=>$this->faker->name,
            'npsn_sekolah'=>$this->faker->name,
            'alamat_sekolah_asal'=>$this->faker->name,
            'no_un'=>$this->faker->name,
            'no_seri_ijazah'=>$this->faker->name,
            'no_skhun'=>$this->faker->name,
            'prestasi'=>$this->faker->name,
            'tingkat_prestasi'=>$this->faker->name,
            
            'status_keluarga'=>$this->faker->name,
            'anak_ke'=>$this->faker->name,
            'nama_ayah'=>$this->faker->name,
            'nik_ayah'=>$this->faker->name,
            'tempatlahir_ayah'=>$this->faker->name,
            'tanggallahir_ayah'=>$this->faker->date(),
            'pendidikan_ayah'=>$this->faker->name,
            'pekerjaan_ayah'=>$this->faker->name,
            'nama_ibu'=>$this->faker->name,
            'nik_ibu'=>$this->faker->name,
            'tempatlahir_ibu'=>$this->faker->name,
            'tanggallahir_ibu'=>$this->faker->date(),
            'pendidikan_ibu'=>$this->faker->name,
            'pekerjaan_ibu'=>$this->faker->name,
            'penghasilan'=>$this->faker->name,
            
            'no_pkh'=>$this->faker->name,
            'no_kks_kps'=>$this->faker->name,
            'no_kip'=>$this->faker->name,
            
            'urutan'=>$this->faker->numberBetween(1111,9999),
            'status'=>'baru',
            // 'grade_id'=>11,  
            // 'status'=>$this->faker->randomElement(['baru','aktif']),
            // 'grade_id'=>$this->faker->randomElement(Grade::all())['id'],
            
            
        ];
    }
}