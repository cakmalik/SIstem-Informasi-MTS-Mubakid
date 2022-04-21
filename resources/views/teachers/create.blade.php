@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Data Pribadi</div>
                    <div class="card-body">
                        <form action="{{ route('teachers.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <x-form.input name='name' />
                                    <x-form.input name='niy' type='number' />
                                    <x-form.input name='tempat_lahir' />
                                    <x-form.input name='tanggal_lahir' type='date' />
                                    <x-form.input name='alamat' />
                                    <x-form.input name='desa' />
                                    <x-form.input name='kecamatan' />
                                    <x-form.input name='kota' />
                                    <x-form.input name='kode_pos' type='number' />
                                    <x-form.input name='no_hp' type='number' />
                                    <x-form.input name='email' type='email' />
                                    <x-form.select name='jenis_kelamin' :options="['Laki-laki', 'Perempuan']" />
                                </div>
                                <div class="col">
                                    <x-form.select name='status_perkawinan' :options="['Kawin', 'Belum kawin']" />
                                    <x-form.input name='nik' type='number' />
                                    <x-form.input name='kk' type='number' />
                                    <x-form.input name='nama_ibu' />
                                    <x-form.input name='tempat_tugas' />
                                    <x-form.input name='mulai_bertugas_tanggal' />
                                    <x-form.input name='jabatan' />
                                    <x-form.input name='status_jabatan' />
                                    <x-form.input name='mengajar_mapel' />
                                    <x-form.input name='sergu' />
                                    <x-form.input name='nrg' />
                                </div>
                            </div>
                            <button type="submit" class="btn btn-sm btn-secondary">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
