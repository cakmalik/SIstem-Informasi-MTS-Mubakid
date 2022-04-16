<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>@yield('title') (MTS-MU 2)</title>
    <style>
        .bg-custom-1 {
            background-color: #85144b;
        }

        .bg-custom-2 {
            background-image: linear-gradient(15deg, #27ae60 0%, #80d0c7 100%);
        }

        .progressbar {
            counter-reset: step;
        }

        .progressbar li {
            list-style-type: none;
            width: 25%;
            float: left;
            font-size: 12px;
            position: relative;
            text-align: center;
            text-transform: uppercase;
            color: #7d7d7d;
            margin-bottom: 50px;
        }

        .progressbar li:before {
            width: 30px;
            height: 30px;
            content: counter(step);
            counter-increment: step;
            line-height: 30px;
            border: 2px solid #7d7d7d;
            display: block;
            text-align: center;
            margin: 0 auto 10px auto;
            border-radius: 50%;
            background-color: white;
        }

        .progressbar li:after {
            width: 100%;
            height: 2px;
            content: '';
            position: absolute;
            background-color: #7d7d7d;
            top: 15px;
            left: -50%;
            z-index: -1;
        }

        .progressbar li:first-child:after {
            content: none;
        }

        .progressbar li.active {
            color: green;
        }

        .progressbar li.active:before {
            border-color: #55b776;
        }

        .progressbar li.active+li:after {
            background-color: #55b776;
        }

        .separator {
            display: flex;
            align-items: center;
            text-align: center;
        }

        .separator::before,
        .separator::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #000;
        }

        .separator:not(:empty)::before {
            margin-right: .25em;
        }

        .separator:not(:empty)::after {
            margin-left: .25em;
        }

    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
        integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    @include('sweetalert::alert')
    <nav class="navbar navbar-dark bg-custom-2 justify-content-center">
        <a class="navbar-brand text-center" href="#a">PENDAFTARAN MTS-MU 2</a>
    </nav>
    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container my-5">
            <div class="row">
                <div class="col-sm">
                    <div class="form-group">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" value="{{ Auth::user()->name }}" class="form-control"
                            id="nama_lengkap" aria-describedby="nama_lengkap" placeholder="Nama Lengkap"
                            value="{{ Auth::user()->name }}">
                    </div>

                    <div class="form-group">
                        <label for="nisn">NISN (Nomor Induk Siswa Nasional)</label>
                        <input type="number" name="nisn" value="{{ old('nisn') }}" class="form-control" id="nisn"
                            aria-describedby="nisn" placeholder="Contoh : 1231588">
                    </div>
                    <div class="form-group">
                        <label for="nik">No. NIK / KTP</label>
                        <input type="number" name="nik" value="{{ old('nik') }}" class="form-control" id="nik"
                            aria-describedby="nik" placeholder="Contoh : 35150518089800002">
                    </div>
                    <div class="form-group">
                        <label for="kk">No. KK</label>
                        <input type="number" name="kk" value="{{ old('kk') }}" class="form-control" id="kk"
                            aria-describedby="kk" placeholder="No KK">
                    </div>
                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}"
                            class="form-control" id="tempat_lahir" aria-describedby="tempat_lahir"
                            placeholder="Tempat lahir">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal lahir</label>
                        <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                            class="form-control" id="tanggal_lahir" aria-describedby="tanggal_lahir"
                            placeholder="Tanggal lahir">
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                            <option>Laki-laki</option>
                            <option>Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat rumah</label>
                        <input type="text" name="alamat" value="{{ old('alamat') }}" class="form-control"
                            id="alamat" aria-describedby="alamat" placeholder="Alamat rumah">
                    </div>
                </div>
                <div class="col-sm">

                    <div class="form-group">
                        <label for="desa">Desa/Kelurahan</label>
                        <input type="text" name="desa" value="{{ old('desa') }}" class="form-control" id="desa"
                            aria-describedby="desa" placeholder="Desa">
                    </div>
                    <div class="form-group">
                        <label for="kecamatan">Kecamatan</label>
                        <input type="text" name="kecamatan" value="{{ old('kecamatan') }}" class="form-control"
                            id="kecamatan" aria-describedby="kecamatan" placeholder="Desa">
                    </div>

                    <div class="form-group">
                        <label for="kota">Kota</label>
                        <select class="selectpicker form-control" data-live-search="true" name="kota" id="kota"
                            value="{{ old('kota') }}">
                            @foreach ($kota as $kota)
                                <option>{{ $kota->nama }} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="provinsi">Provinsi</label>
                        <select class="selectpicker form-control" data-live-search="true" name="provinsi" id="provinsi"
                            value="{{ old('provinsi') }}">
                            @foreach ($prov as $prov)
                                <option>{{ $prov->nama }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kode_pos">Kode Pos</label>
                        <input type="number" name="kode_pos" value="{{ old('kode_pos') }}" class="form-control"
                            id="kode_pos" aria-describedby="kode_pos" placeholder="Kode Pos">
                    </div>
                    <div class="form-group">
                        <label for="nisn">No Hp</label>
                        <input type="number" name="no_hp" value="{{ old('no_hp') }}" class="form-control" id="nisn"
                            aria-describedby="emailHelp" placeholder="No Hp / Wa">
                    </div>
                    <div class="form-group">
                        <label for="nisn">Hobi</label>
                        <input type="text" name="hobi" value="{{ old('hobi') }}" class="form-control" id="nisn"
                            aria-describedby="emailHelp" placeholder="Hobi">
                    </div>
                    <div class="form-group">
                        <label for="nisn">Cita-cita</label>
                        <input type="text" name="cita_cita" value="{{ old('cita_cita') }}" class="form-control"
                            id="nisn" aria-describedby="emailHelp" placeholder="Cita-cita">
                    </div>
                </div>
            </div>
            <div class="separator my-3">Sekolah Asal</div>
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                        <label for="asal_sekolah">Nama Sekolah Asal </label>
                        <input type="text" name="asal_sekolah" value="{{ old('asal_sekolah') }}"
                            class="form-control" id="asal_sekolah" aria-describedby="asal_sekolah"
                            placeholder="Contoh : SD AL-Baitul Amien">
                    </div>
                    <div class="form-group">
                        <label for="npsn_sekolah">Npsn Sekolah</label>
                        <input type="text" name="npsn_sekolah" value="{{ old('npsn_sekolah') }}"
                            class="form-control" id="npsn_sekolah" aria-describedby="npsn_sekolah"
                            placeholder="Contoh : 20178214">
                    </div>
                    <div class="form-group">
                        <label for="alamat_sekolah_asal">Alamat Sekolah Asal</label>
                        <input type="text" name="alamat_sekolah_asal" value="{{ old('alamat_sekolah_asal') }}"
                            class="form-control" id="alamat_sekolah_asal" aria-describedby="alamat_sekolah_asal"
                            placeholder="contoh : Jl. jeruk GG.6 Leces, Probolinggo">
                    </div>
                    <div class="form-group">
                        <label for="no_un">No Peserta Ujian Nasional (UN)</label>
                        <input type="text" name="no_un" value="{{ old('no_un') }}" class="form-control" id="no_un"
                            aria-describedby="no_un" placeholder="contoh : 2-18-20-09-110-005-4">
                    </div>

                </div>
                <div class="col-md">
                    <div class="form-group">
                        <label for="no_seri_ijazah">No Seri Ijazah</label>
                        <input type="text" name="no_seri_ijazah" value="{{ old('no_seri_ijazah') }}"
                            class="form-control" id="no_seri_ijazah" aria-describedby="no_seri_ijazah"
                            placeholder="contoh : DN-05 Dl 0014933">
                    </div>
                    <div class="form-group">
                        <label for="no_skhun">No SKHUN</label>
                        <input type="text" name="no_skhun" value="{{ old('no_skhun') }}" class="form-control"
                            id="no_skhun" aria-describedby="no_skhun" placeholder="contoh : 1-342-1-11-1445-24225-234">
                    </div>
                    <div class="form-group">
                        <label for="prestasi">Prestasi</label>
                        <input type="text" name="prestasi" value="{{ old('prestasi') }}" class="form-control"
                            id="prestasi" aria-describedby="prestasi" placeholder="contoh: futsal 2010, olimpiade MTK">
                    </div>
                    <div class="form-group">
                        <label for="tingkat_prestasi">Tingkat prestasi</label>
                        <input type="text" name="tingkat_prestasi" value="{{ old('tingkat_prestasi') }}"
                            class="form-control" id="tingkat_prestasi" aria-describedby="tingkat_prestasi"
                            placeholder="contoh: Sekolah, Provinsi">
                    </div>
                </div>
            </div>
            <div class="separator my-3">Keluarga</div>
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                        <label for="status_keluarga">Status dalam keluarga</label>
                        <select class="form-control" name="status_keluarga" id="status_keluarga">
                            <option>Anak Kandung</option>
                            <option>Anak Tiri</option>
                            <option>Anak Angkat</option>
                            <option>Anak Asuh</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="anak_ke">Anak ke ... dari ... </label>
                        <input type="text" name="anak_ke" value="{{ old('anak_ke') }}" class="form-control"
                            id="anak_ke" aria-describedby="anak_ke" placeholder="Contoh : 3,4 (pisahkan dg koma)">
                    </div>
                    <div class="form-group">
                        <label for="nama_ayah">Nama Ayah</label>
                        <input type="text" name="nama_ayah" value="{{ old('nama_ayah') }}" class="form-control"
                            id="nama_ayah" aria-describedby="nama_ayah" placeholder="nama ayah">
                    </div>
                    <div class="form-group">
                        <label for="nik_ayah">NIK ayah</label>
                        <input type="number" name="nik_ayah" value="{{ old('nik_ayah') }}" class="form-control"
                            id="nik_ayah" aria-describedby="nik_ayah" placeholder="Contoh : 35150518089800002">
                    </div>
                    <div class="form-group">
                        <label for="tempatlahir_ayah">Tempat lahir ayah</label>
                        <input type="text" name="tempatlahir_ayah" value="{{ old('tempatlahir_ayah') }}"
                            class="form-control" id="tempatlahir_ayah" aria-describedby="tempatlahir ayah"
                            placeholder="tempatlahir ayah">
                    </div>
                    <div class="form-group">
                        <label for="tanggallahir_ayah">Tanggal lahir ayah</label>
                        <input type="date" name="tanggallahir_ayah" value="{{ old('tanggallahir_ayah') }}"
                            class="form-control" id="tanggallahir_ayah" aria-describedby="tanggallahir ayah"
                            placeholder="tanggallahir ayah">
                    </div>
                    <div class="form-group">
                        <label for="pendidikan_ayah">Pendidikan terakhir ayah</label>
                        <select name="pendidikan_ayah" id="pendidikan_ayah" class="form-control">
                            <option value="-">{{ old('pendidikan_ayah') }}</option>
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
                        <select name="pekerjaan_ayah" id="pekerjaan_ayah" class="form-control">
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
                        <input type="text" name="nama_ibu" value="{{ old('nama_ibu') }}" class="form-control"
                            id="nama_ibu" aria-describedby="nama_ibu" placeholder="nama ibu">
                    </div>
                    <div class="form-group">
                        <label for="nik_ibu">NIK ibu</label>
                        <input type="number" name="nik_ibu" value="{{ old('nik_ibu') }}" class="form-control"
                            id="nik_ibu" aria-describedby="nik_ibu" placeholder="Contoh : 35150518089800002">
                    </div>
                    <div class="form-group">
                        <label for="tempatlahir_ibu">Tempat lahir ibu</label>
                        <input type="text" name="tempatlahir_ibu" value="{{ old('tempatlahir_ibu') }}"
                            class="form-control" id="tempatlahir_ibu" aria-describedby="tempat lahir ibu"
                            placeholder="tempatlahir ibu">
                    </div>
                    <div class="form-group">
                        <label for="tanggallahir_ibu">Tanggal lahir ibu</label>
                        <input type="date" name="tanggallahir_ibu" value="{{ old('tanggallahir_ibu') }}"
                            class="form-control" id="tanggallahir_ibu" aria-describedby="tanggal lahir ibu"
                            placeholder="tanggallahir ibu">
                    </div>
                    <div class="form-group">
                        <label for="pendidikan_ibu">Pendidikan terakhir ibu</label>
                        <select name="pendidikan_ibu" id="pendidikan_ibu" class="form-control">
                            <option value="-">{{ old('pendidikan_ibu') }}</option>
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
                        <select name="pekerjaan_ibu" id="pekerjaan_ibu" class="form-control">
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
                        <select name="penghasilan" id="penghasilan" class="form-control">
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
                        <input type="text" name="no_pkh" value="{{ old('no_pkh') }}" class="form-control"
                            id="no_pkh" aria-describedby="no_pkh" placeholder="no_pkh">
                    </div>
                    <div class="form-group">
                        <label for="no_kks_kps">No KKS/KPS</label>
                        <input type="text" name="no_kks_kps" value="{{ old('no_kks_kps') }}" class="form-control"
                            id="no_kks_kps" aria-describedby="no_kks_kps" placeholder="no_kks_kps">
                    </div>
                </div>

                <div class="col-md">
                    <div class="form-group">
                        <label for="no_kip">No KIP</label>
                        <input type="text" name="no_kip" value="{{ old('no_kip') }}" class="form-control"
                            id="no_kip" aria-describedby="no_kip" placeholder="no_kip">
                    </div>
                </div>
            </div>
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
                <button type="submit" class="btn btn-primary mt-3">Kirim</button>
            </div>

        </div>
    </form>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $("#kota").select2({
                placeholder: "Please Select"
            });

            $("#provinsi").select2({
                placeholder: "Please Select"
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>

</body>

</html>
