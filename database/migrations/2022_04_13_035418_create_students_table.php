<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('nis')->nullable();
            $table->string('nama_lengkap');
            $table->string('nisn')->nullable();
            $table->string('nik');
            $table->string('kk');
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('alamat');
            $table->string('desa');
            $table->string('kecamatan');
            $table->string('kota');
            $table->string('provinsi');
            $table->string('kode_pos');
            $table->string('no_hp');
            $table->string('hobi');
            $table->string('cita_cita');
            
            $table->string('asal_sekolah')->nullable();
            $table->string('npsn_sekolah')->nullable();
            $table->string('alamat_sekolah_asal')->nullable();
            $table->string('no_un')->nullable();
            $table->string('no_seri_ijazah')->nullable();
            $table->string('no_skhun')->nullable();
            $table->string('prestasi')->nullable();
            $table->string('tingkat_prestasi')->nullable();
            
            $table->string('status_keluarga')->nullable();
            $table->string('anak_ke')->nullable();
            $table->string('nama_ayah')->nullable();
            $table->string('nik_ayah')->nullable();
            $table->string('tempatlahir_ayah')->nullable();
            $table->string('tanggallahir_ayah')->nullable();
            $table->string('pendidikan_ayah')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('nik_ibu')->nullable();
            $table->string('tempatlahir_ibu')->nullable();
            $table->string('tanggallahir_ibu')->nullable();
            $table->string('pendidikan_ibu')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->string('penghasilan')->nullable();
            
            $table->string('no_pkh')->nullable();
            $table->string('no_kks_kps')->nullable();
            $table->string('no_kip')->nullable();

            $table->string('foto_siswa')->nullable();
            $table->string('foto_ortu')->nullable();
            $table->string('status')->default('baru');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
