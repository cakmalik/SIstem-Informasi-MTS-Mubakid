@extends('layouts.app')
@section('title', 'Edit Student')
@section('content')
    <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="container">
            <div class="d-flex justify-content-between">
                <div>
                    <a href="{{ url()->previous() }}" class="btn btn-info btn-flat btn-sm mb-3"> <i
                            class="fas fa-arrow-left"></i>
                        Kembali</a>
                    @if ($detail_mode)
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-info btn-flat btn-sm mb-3"> <i
                                class="fas fa-edit"></i> Edit</a>
                    @endif
                </div>
                <span class="badge btn-outline-success btn-flat btn-sm mb-3 ml-2">STATUS:
                    {{ str()->upper($student->status) }} </s>
            </div>
            <div class="card p-4">
                <div class="row mb-3 d-flex justify-content-around">

                    @if ($student->foto_siswa != null)
                        <img src="{{ asset('storage/foto_siswa/' . $student->foto_siswa) }}"
                            style="width: 300px; height:auto">
                    @else
                        <img src="{{ asset('MTS2/default.png') }}">
                    @endif

                    @if ($student->foto_ortu != null)
                        <img src="{{ asset('storage/foto_wali/' . $student->foto_ortu) }}"
                            style="width: 300px; height:auto">
                    @else
                        <img src="{{ asset('MTS2/default.png') }}">
                    @endif
                </div>
                <div class="row justify-content-center">
                    <div class="col-sm">

                        <div class="form-group">
                            <label for="nama_lengkap">Nama ({{ $student->user->email }})</label>
                            <input type="text" name="nama_lengkap" value="{{ $student->nama_lengkap }}"
                                class="form-control" id="nama_lengkap" aria-describedby="nama_lengkap"
                                placeholder="Nama Lengkap" @if ($detail_mode) readonly @endif>
                        </div>

                        <div class="form-group">
                            <label for="nisn">NISN (Nomor Induk Siswa Nasional)</label>
                            <input type="number" name="nisn" value="{{ $student->nisn }}" class="form-control"
                                id="nisn" aria-describedby="nisn" placeholder="Contoh : 1231588"
                                @if ($detail_mode) readonly @endif>
                        </div>
                        <div class="form-group">
                            <label for="nik">No. NIK / KTP</label>
                            <input type="number" name="nik" value="{{ $student->nik }}" class="form-control" id="nik"
                                aria-describedby="nik" placeholder="Contoh : 35150518089800002"
                                @if ($detail_mode) readonly @endif>
                        </div>
                        <div class="form-group">
                            <label for="kk">No. KK</label>
                            <input type="number" name="kk" value="{{ $student->kk }}" class="form-control" id="kk"
                                aria-describedby="kk" placeholder="No KK" @if ($detail_mode) readonly @endif>
                        </div>
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" value="{{ $student->tempat_lahir }}"
                                class="form-control" id="tempat_lahir" aria-describedby="tempat_lahir"
                                placeholder="Tempat lahir" @if ($detail_mode) readonly @endif>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal lahir</label>
                            <input type="date" name="tanggal_lahir" value="{{ $student->tanggal_lahir }}"
                                class="form-control" id="tanggal_lahir" aria-describedby="tanggal_lahir"
                                placeholder="Tanggal lahir" @if ($detail_mode) readonly @endif>
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin"
                                @if ($detail_mode) readonly @endif>
                                <option>{{ $student->jenis_kelamin }}</option>
                                <option>Laki-laki</option>
                                <option>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat rumah</label>
                            <input type="text" name="alamat" value="{{ $student->alamat }}" class="form-control"
                                id="alamat" aria-describedby="alamat" placeholder="Alamat rumah"
                                @if ($detail_mode) readonly @endif>
                        </div>
                    </div>
                    <div class="col-sm">

                        <div class="form-group">
                            <label for="desa">Desa/Kelurahan</label>
                            <input type="text" name="desa" value="{{ $student->desa }}" class="form-control" id="desa"
                                aria-describedby="desa" placeholder="Desa"
                                @if ($detail_mode) readonly @endif>
                        </div>
                        <div class="form-group">
                            <label for="kecamatan">Kecamatan</label>
                            <input type="text" name="kecamatan" value="{{ $student->kecamatan }}" class="form-control"
                                id="kecamatan" aria-describedby="kecamatan" placeholder="Desa"
                                @if ($detail_mode) readonly @endif>
                        </div>

                        <div class="form-group">
                            <label for="kota">Kota</label>
                            <select class="selectpicker form-control" data-live-search="true" name="kota" id="kota"
                                @if ($detail_mode) readonly @endif>
                                <option>{{ $student->kota }}</option>
                                @foreach ($kota as $kota)
                                    <option>{{ $kota->nama }} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="provinsi">Provinsi</label>
                            <select class="selectpicker form-control" data-live-search="true" name="provinsi" id="provinsi"
                                @if ($detail_mode) readonly @endif>
                                <option>{{ $student->provinsi }}</option>
                                @foreach ($prov as $prov)
                                    <option>{{ $prov->nama }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kode_pos">Kode Pos</label>
                            <input type="number" name="kode_pos" value="{{ $student->kode_pos }}" class="form-control"
                                id="kode_pos" aria-describedby="kode_pos" placeholder="Kode Pos"
                                @if ($detail_mode) readonly @endif>
                        </div>
                        <div class="form-group">
                            <label for="nisn">No Hp</label>
                            <input type="number" name="no_hp" value="{{ $student->no_hp }}" class="form-control"
                                id="nisn" aria-describedby="emailHelp" placeholder="No Hp / Wa"
                                @if ($detail_mode) readonly @endif>
                        </div>
                        <div class="form-group">
                            <label for="nisn">Hobi</label>
                            <input type="text" name="hobi" value="{{ $student->hobi }}" class="form-control" id="nisn"
                                aria-describedby="emailHelp" placeholder="Hobi"
                                @if ($detail_mode) readonly @endif>
                        </div>
                        <div class="form-group">
                            <label for="nisn">Cita-cita</label>
                            <input type="text" name="cita_cita" value="{{ $student->cita_cita }}" class="form-control"
                                id="nisn" aria-describedby="emailHelp" placeholder="Cita-cita"
                                @if ($detail_mode) readonly @endif>
                        </div>
                    </div>
                </div>
                <div class="separator my-3">Sekolah Asal</div>
                <div class="row">
                    <div class="col-md">
                        <div class="form-group">
                            <label for="asal_sekolah">Nama Sekolah Asal </label>
                            <input type="text" name="asal_sekolah" value="{{ $student->asal_sekolah }}"
                                class="form-control" id="asal_sekolah" aria-describedby="asal_sekolah"
                                placeholder="Contoh : SD AL-Baitul Amien"
                                @if ($detail_mode) readonly @endif>
                        </div>
                        <div class="form-group">
                            <label for="npsn_sekolah">Npsn Sekolah</label>
                            <input type="text" name="npsn_sekolah" value="{{ $student->npsn_sekolah }}"
                                class="form-control" id="npsn_sekolah" aria-describedby="npsn_sekolah"
                                placeholder="Contoh : 20178214" @if ($detail_mode) readonly @endif>
                        </div>
                        <div class="form-group">
                            <label for="alamat_sekolah_asal">Alamat Sekolah Asal</label>
                            <input type="text" name="alamat_sekolah_asal" value="{{ $student->alamat_sekolah_asal }}"
                                class="form-control" id="alamat_sekolah_asal" aria-describedby="alamat_sekolah_asal"
                                placeholder="contoh : Jl. jeruk GG.6 Leces, Probolinggo"
                                @if ($detail_mode) readonly @endif>
                        </div>
                        <div class="form-group">
                            <label for="no_un">No Peserta Ujian Nasional (UN)</label>
                            <input type="text" name="no_un" value="{{ $student->no_un }}" class="form-control"
                                id="no_un" aria-describedby="no_un" placeholder="contoh : 2-18-20-09-110-005-4"
                                @if ($detail_mode) readonly @endif>
                        </div>

                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="no_seri_ijazah">No Seri Ijazah</label>
                            <input type="text" name="no_seri_ijazah" value="{{ $student->no_seri_ijazah }}"
                                class="form-control" id="no_seri_ijazah" aria-describedby="no_seri_ijazah"
                                placeholder="contoh : DN-05 Dl 0014933" @if ($detail_mode) readonly @endif>
                        </div>
                        <div class="form-group">
                            <label for="no_skhun">No SKHUN</label>
                            <input type="text" name="no_skhun" value="{{ $student->no_skhun }}" class="form-control"
                                id="no_skhun" aria-describedby="no_skhun" placeholder="contoh : 1-342-1-11-1445-24225-234"
                                @if ($detail_mode) readonly @endif>
                        </div>
                        <div class="form-group">
                            <label for="prestasi">Prestasi</label>
                            <input type="text" name="prestasi" value="{{ $student->prestasi }}" class="form-control"
                                id="prestasi" aria-describedby="prestasi" placeholder="contoh: futsal 2010, olimpiade MTK"
                                @if ($detail_mode) readonly @endif>
                        </div>
                        <div class="form-group">
                            <label for="tingkat_prestasi">Tingkat prestasi</label>
                            <input type="text" name="tingkat_prestasi" value="{{ $student->tingkat_prestasi }}"
                                class="form-control" id="tingkat_prestasi" aria-describedby="tingkat_prestasi"
                                placeholder="contoh: Sekolah, Provinsi" @if ($detail_mode) readonly @endif>
                        </div>
                    </div>
                </div>
                <div class="separator my-3">Keluarga</div>
                <div class="row">
                    <div class="col-md">
                        <div class="form-group">
                            <label for="status_keluarga">Status dalam keluarga</label>
                            <select class="form-control" name="status_keluarga" id="status_keluarga"
                                @if ($detail_mode) readonly @endif>
                                <option>{{ $student->status_keluarga }}</option>
                                <option>Anak Kandung</option>
                                <option>Anak Tiri</option>
                                <option>Anak Angkat</option>
                                <option>Anak Asuh</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="anak_ke">Anak ke ... dari ... </label>
                            <input type="text" name="anak_ke" value="{{ $student->anak_ke }}" class="form-control"
                                id="anak_ke" aria-describedby="anak_ke" placeholder="Contoh : 3,4 (pisahkan dg koma)"
                                @if ($detail_mode) readonly @endif>
                        </div>
                        <div class="form-group">
                            <label for="nama_ayah">Nama Ayah</label>
                            <input type="text" name="nama_ayah" value="{{ $student->nama_ayah }}" class="form-control"
                                id="nama_ayah" aria-describedby="nama_ayah" placeholder="nama  ayah"
                                @if ($detail_mode) readonly @endif>
                        </div>
                        <div class="form-group">
                            <label for="nik_ayah">NIK ayah</label>
                            <input type="number" name="nik_ayah" value="{{ $student->nik_ayah }}" class="form-control"
                                id="nik_ayah" aria-describedby="nik_ayah" placeholder="Contoh  : 35150518089800002"
                                @if ($detail_mode) readonly @endif>
                        </div>
                        <div class="form-group">
                            <label for="tempatlahir_ayah">Tempat lahir ayah</label>
                            <input type="text" name="tempatlahir_ayah" value="{{ $student->tempatlahir_ayah }}"
                                class="form-control" id="tempatlahir_ayah" aria-describedby="tempatlahir ayah"
                                placeholder="tempatlahir  ayah" @if ($detail_mode) readonly @endif>
                        </div>
                        <div class="form-group">
                            <label for="tanggallahir_ayah">Tanggal lahir ayah</label>
                            <input type="date" name="tanggallahir_ayah" value="{{ $student->tanggallahir_ayah }}"
                                class="form-control" id="tanggallahir_ayah" aria-describedby="tanggallahir ayah"
                                placeholder="tanggallahir  ayah" @if ($detail_mode) readonly @endif>
                        </div>
                        <div class="form-group">
                            <label for="pendidikan_ayah">Pendidikan terakhir ayah</label>
                            <select name="pendidikan_ayah" id="pendidikan_ayah" class="form-control"
                                @if ($detail_mode) readonly @endif
                                @if ($detail_mode) readonly @endif>
                                <option value="-">{{ $student->pendidikan_ayah }}</option>
                                <option>Tidak Sekolah</option>
                                <option>Putus SD</option>
                                <option>SD Sederajat</option>
                                <option>SMP Sederajat</option>
                                <option>SMA Sederajat</option>
                                <option>D1</option>
                                <option>D2</option>
                                <option>D3</option>
                                <option>D4/S1</option>
                                <option>S2</option>
                                <option>S3</option>
                                <option>Lainnya</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan_ayah">Pekerjaan ayah</label>
                            <select name="pekerjaan_ayah" id="pekerjaan_ayah" class="form-control"
                                @if ($detail_mode) readonly @endif
                                @if ($detail_mode) readonly @endif>
                                <option>Tidak Bekerja</option>
                                <option>Nelayan</option>
                                <option>Petani</option>
                                <option>Peternak</option>
                                <option>PNS/TNI/Polri</option>
                                <option>Karyawan Swasta</option>
                                <option>Pedagang Kecil</option>
                                <option>Pedagang Besar</option>
                                <option>Wiraswasta</option>
                                <option>Wirausaha</option>
                                <option>Buruh</option>
                                <option>Pensiunan</option>
                                <option>Tenaga Kerja Indonesia</option>
                                <option>Tidak dapat diterapkan</option>
                                <option>Sudah Meninggal</option>
                                <option>Lainnya</option>
                            </select>
                        </div>


                    </div>

                    <div class="col-md">
                        <div class="form-group">
                            <label for="nama_ibu">Nama ibu</label>
                            <input type="text" name="nama_ibu" value="{{ $student->nama_ibu }}" class="form-control"
                                id="nama_ibu" aria-describedby="nama_ibu" placeholder="nama  ibu"
                                @if ($detail_mode) readonly @endif>
                        </div>
                        <div class="form-group">
                            <label for="nik_ibu">NIK ibu</label>
                            <input type="number" name="nik_ibu" value="{{ $student->nik_ibu }}" class="form-control"
                                id="nik_ibu" aria-describedby="nik_ibu" placeholder="Contoh  : 35150518089800002"
                                @if ($detail_mode) readonly @endif>
                        </div>
                        <div class="form-group">
                            <label for="tempatlahir_ibu">Tempat lahir ibu</label>
                            <input type="text" name="tempatlahir_ibu" value="{{ $student->tempatlahir_ibu }}"
                                class="form-control" id="tempatlahir_ibu" aria-describedby="tempat lahir ibu"
                                placeholder="tempatlahir  ibu" @if ($detail_mode) readonly @endif>
                        </div>
                        <div class="form-group">
                            <label for="tanggallahir_ibu">Tanggal lahir ibu</label>
                            <input type="date" name="tanggallahir_ibu" value="{{ $student->tanggallahir_ibu }}"
                                class="form-control" id="tanggallahir_ibu" aria-describedby="tanggal lahir ibu"
                                placeholder="tanggallahir  ibu" @if ($detail_mode) readonly @endif>
                        </div>
                        <div class="form-group">
                            <label for="pendidikan_ibu">Pendidikan terakhir ibu</label>
                            <select name="pendidikan_ibu" id="pendidikan_ibu" class="form-control"
                                @if ($detail_mode) readonly @endif
                                @if ($detail_mode) readonly @endif>
                                <option value="-">{{ $student->pendidikan_ibu }}</option>
                                <option>Tidak Sekolah</option>
                                <option>Putus SD</option>
                                <option>SD Sederajat</option>
                                <option>SMP Sederajat</option>
                                <option>SMA Sederajat</option>
                                <option>D1</option>
                                <option>D2</option>
                                <option>D3</option>
                                <option>D4/S1</option>
                                <option>S2</option>
                                <option>S3</option>
                                <option>Lainnya</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan_ibu">Pekerjaan ibu</label>
                            <select name="pekerjaan_ibu" id="pekerjaan_ibu" class="form-control"
                                @if ($detail_mode) readonly @endif
                                @if ($detail_mode) readonly @endif>
                                <option>Tidak Bekerja</option>
                                <option>Nelayan</option>
                                <option>Petani</option>
                                <option>Peternak</option>
                                <option>PNS/TNI/Polri</option>
                                <option>Karyawan Swasta</option>
                                <option>Pedagang Kecil</option>
                                <option>Pedagang Besar</option>
                                <option>Wiraswasta</option>
                                <option>Wirausaha</option>
                                <option>Buruh</option>
                                <option>Pensiunan</option>
                                <option>Tenaga Kerja Indonesia</option>
                                <option>Tidak dapat diterapkan</option>
                                <option>Sudah Meninggal</option>
                                <option>Lainnya</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="penghasilan">Penghasilan orang tua</label>
                            <select name="penghasilan" id="penghasilan" class="form-control"
                                @if ($detail_mode) readonly @endif
                                @if ($detail_mode) readonly @endif>
                                <option>Rp. 1.000.000 - Rp. 2.000.000</option>
                                <option>lebh dari Rp. 2.000.000</option>
                                <option>kurang dari Rp. 500.000</option>
                                <option>Rp. 500.000 - Rp. 999.000</option>
                                <option>Rp. 1.000.000 - Rp. 1.999.000</option>
                                <option>Rp. 2.000.000 - Rp. 4.999.000</option>
                                <option>Rp. 5.000.000 - Rp. 20.000.000</option>
                                <option>Lebih dari Rp. 20.000.000</option>
                                <option>Tidak berpenghasilan</option>
                                <option>Lainnya</option>

                            </select>
                        </div>
                    </div>
                </div>
                <div class="separator my-3">Tambahan</div>
                <div class="row">
                    <div class="col-md">
                        <div class="form-group">
                            <label for="no_pkh">No PKH</label>
                            <input type="text" name="no_pkh" value="{{ $student->no_pkh }}" class="form-control"
                                id="no_pkh" aria-describedby="no_pkh" placeholder="no_pkh"
                                @if ($detail_mode) readonly @endif>
                        </div>
                        <div class="form-group">
                            <label for="no_kks_kps">No KKS/KPS</label>
                            <input type="text" name="no_kks_kps" value="{{ $student->no_kks_kps }}"
                                class="form-control" id="no_kks_kps" aria-describedby="no_kks_kps"
                                placeholder="no_kks_kps" @if ($detail_mode) readonly @endif>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="no_kip">No KIP</label>
                            <input type="text" name="no_kip" value="{{ $student->no_kip }}" class="form-control"
                                id="no_kip" aria-describedby="no_kip" placeholder="no_kip"
                                @if ($detail_mode) readonly @endif>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="kelas">Kelas </label>
                            <select name="grade_id" class="form-control" id="kelas"
                                @if ($detail_mode) readonly @endif>
                                <option value="{{ $student->grade->id }}">{{ $student->grade->name }}</option>
                                @foreach ($grades as $grade)
                                    <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                @if ($detail_mode == false)
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="no_kip">Foto Siswa/i (max:500kb)</label>
                                <input type="file" name="foto_siswa" class="form-control">
                            </div>

                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="no_kip">Foto Ayah/Ortu (max:500kb)</label>
                                <input type="file" name="foto_ortu" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="text-right mb-6">
                        <button type="submit" class="btn btn-primary mt-3">Update</button>
                    </div>
                @endif
            </div>
            @if ($student->status == 'aktif')
                @include('students.mutasi')
            @endif
        </div>
    </form>
@endsection
