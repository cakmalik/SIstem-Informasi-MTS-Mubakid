<?php

namespace Database\Factories;

use App\Models\User;
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
            'nis'=>$this->faker->name,
            'nama_lengkap'=>$this->faker->name,
            'nisn'=>$this->faker->name,
            'nik'=>$this->faker->name,
            'kk'=>$this->faker->name,
            'tempat_lahir'=>$this->faker->name,
            'tanggal_lahir'=>$this->faker->date(),
            'jenis_kelamin'=>$this->faker->randomElement(['Laki-laki','Perempuan']),
            'alamat'=>$this->faker->name,
            'desa'=>$this->faker->name,
            'kecamatan'=>$this->faker->name,
            'kota'=>$this->faker->city(),
            'provinsi'=>$this->faker->name,
            'kode_pos'=>$this->faker->name,
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
            
            'foto_siswa'=>$this->faker->name,
            'foto_ortu'=>$this->faker->name,
            'status'=>$this->faker->name,
            'urutan'=>$this->faker->numberBetween(1111,9999),
            
            
        ];
    }
}