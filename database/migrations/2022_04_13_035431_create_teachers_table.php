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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('grade_id')->nullable();
            $table->string('name');
            $table->string('niy')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->string('alamat')->nullable();
            $table->string('desa')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kota')->nullable();
            $table->string('kode_pos')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('email')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('status_perkawinan')->nullable();
            $table->string('nik')->nullable();
            $table->string('kk')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('tempat_tugas')->nullable();
            $table->string('mulai_bertugas_tanggal')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('status_jabatan')->nullable();
            $table->string('mengajar_mapel')->nullable();
            $table->string('sergu')->nullable();
            $table->string('nrg')->nullable();
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
        Schema::dropIfExists('teachers');
    }
};
