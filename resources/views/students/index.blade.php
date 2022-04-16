@extends('layouts.app')
<x-datatables />
@section('content')
    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <x-modal id="modal-default" :modalHeader="false">
            <x-slot name="body">
                <div class="separator my-3">Wajib Diisi</div>
                <div class="row">
                    <div class="col">
                        <input type="text" name="nama_lengkap" class="form-control" placeholder="nama_lengkap">
                        <input type="text" name="tempat_lahir" class="form-control" placeholder="tempat_lahir">
                    </div>
                    <div class="col">
                        <input type="text" name="tanggal_lahir" class="form-control" placeholder="tanggal_lahir">
                        <input type="text" name="jenis_kelamin" class="form-control" placeholder="jenis_kelamin">
                        <input type="text" name="no_hp" class="form-control" placeholder="no_hp">
                    </div>
                </div>
                <div class="separator my-3">Keluarga</div>
                <div class="row">
                    <div class="col">
                        <input type="text" name="status_keluarga" class="form-control" placeholder="status_keluarga">
                        <input type="text" name="anak_ke" class="form-control" placeholder="anak_ke">
                        <input type="text" name="nama_ayah" class="form-control" placeholder="nama_ayah">
                        <input type="text" name="tempatlahir_ayah" class="form-control" placeholder="tanggal_lahir_ayah">
                        <input type="text" name="tanggallahir_ayah" class="form-control" placeholder="tanggal_lahir_ayah">
                        <input type="text" name="pendidikan_ayah" class="form-control" placeholder="pendidikan_ayah">
                        <input type="text" name="pekerjaan_ayah" class="form-control" placeholder="pekerjaan_ayah">
                    </div>
                    <div class="col">
                        <input type="text" name="penghasilan" class="form-control" placeholder="penghasilan">
                        <input type="text" name="nama_ibu" class="form-control" placeholder="nama_ibu">
                        <input type="text" name="tempatlahir_ibu" class="form-control" placeholder="tanggal_lahir_ibu">
                        <input type="text" name="tanggallahir_ibu" class="form-control" placeholder="tanggal_lahir_ibu">
                        <input type="text" name="pendidikan_ibu" class="form-control" placeholder="pendidikan_ibu">
                        <input type="text" name="pekerjaan_ibu" class="form-control" placeholder="pekerjaan_ibu">
                    </div>
                </div>
                <div class="separator my-3">Alamat</div>
                <div class="row">
                    <div class="col">
                        <input type="text" name="alamat" class="form-control" placeholder="alamat">
                        <input type="text" name="desa" class="form-control" placeholder="desa">
                        <input type="text" name="kecamatan" class="form-control" placeholder="kecamatan">
                    </div>
                    <div class="col">
                        <input type="text" name="kota" class="form-control" placeholder="kota">
                        <input type="text" name="provinsi" class="form-control" placeholder="provinsi">
                        <input type="text" name="kode_pos" class="form-control" placeholder="kode_pos">
                    </div>
                </div>
                <div class="separator my-3">Nomor-nomor</div>
                <div class="row">
                    <div class="col">
                        <input type="text" name="nik" class="form-control" placeholder="nik ananda">
                        <input type="text" name="kk" class="form-control" placeholder="kk">
                        <input type="text" name="nik_ayah" class="form-control" placeholder="nik_ayah">
                        <input type="text" name="nik_ibu" class="form-control" placeholder="nik_ibu">
                        <input type="text" name="no_pkh" placeholder="no_pkh" class="form-control">
                        <input type="text" name="nisn" placeholder="nisn" class="form-control">
                    </div>
                    <div class="col">
                        <input type="text" name="no_kks_kps" placeholder="no_kks_kps" class="form-control">
                        <input type="text" name="no_kip" placeholder="no_kip" class="form-control">
                        <input type="text" name="no_un" placeholder="no_un" class="form-control">
                        <input type="text" name="no_seri_ijazah" placeholder="no_seri_ijazah" class="form-control">
                        <input type="text" name="no_skhun" placeholder="no_skhun" class="form-control">
                    </div>
                </div>
                <div class="separator my-3">Tambahan</div>
                <div class="row">
                    <div class="col">
                        <input type="text" name="asal_sekolah" placeholder="asal_sekolah" class="form-control">
                        <input type="text" name="npsn_sekolah" placeholder="npsn_sekolah" class="form-control">
                        <input type="text" name="alamat_sekolah_asal" placeholder="alamat_sekolah_asal"
                            class="form-control">
                        <input type="text" name="prestasi" placeholder="prestasi" class="form-control">
                        <input type="text" name="tingkat_prestasi" placeholder="tingkat_prestasi" class="form-control">
                    </div>
                    <div class="col">
                        <input type="text" name="hobi" class="form-control" placeholder="hobi">
                        <input type="text" name="cita_cita" class="form-control" placeholder="cita_cita">
                        <input type="file" name="foto_siswa" class="form-control" placeholder="foto_siswa">
                        <input type="file" name="foto_ortu" class="form-control" placeholder="foto_ortu">
                    </div>
                </div>

            </x-slot>
            <x-slot name="footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
            </x-slot>
        </x-modal>
    </form>
    <div class=" d-flex justify-content-between mb-2">
        <div>
            <a href="{{ route('students.status', 'baru') }}" class="btn btn-flat btn-outline-primary btn-sm">Baru</a>
            <a href="{{ route('students.status', 'aktif') }}" class="btn btn-flat btn-outline-primary btn-sm">Aktif</a>
        </div>
        <button type="button" class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#modal-default">
            Tambah Siswa
        </button>
    </div>
    <table id="datatable" class="display" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Kota</th>
                <th>Jenis kelamin</th>
                <th>No Hp</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($collection as $item)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <th>{{ $item->nama_lengkap }}</th>
                    <th>{{ $item->kota }}</th>
                    <th>{{ $item->jenis_kelamin }}</th>
                    <th>{{ $item->no_hp }}</th>
                    <th>
                        <div class="btn-group">
                            <button type="button" class="btn btn-info">Detail</button>
                            <button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Edit</a>
                                <a class="dropdown-item" href="#">Cetak Kts</a>
                                <a class="dropdown-item" href="#">Biodata</a>
                                <div class="dropdown-divider"></div>
                                <a class="btn btn-block btn-danger" href="#"><i class="fas fa-trash"></i> </a>
                            </div>
                        </div>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
