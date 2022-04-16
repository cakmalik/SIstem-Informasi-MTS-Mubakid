<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Biodata</title>
    <style>
        @page {
            margin: 20px;
        }

        @font-face {
            font-family: 'bookman';
            src: url({{ storage_path('fonts/bookman old style.ttf') }}) format("truetype");
        }

        body {
            font-family: "bookman";
            font-size: 12px;
            /* margin: 0px; */
        }

        .capitalize {
            text-transform: capitalize;
        }

        header,
        footer {
            position: fixed;
            left: 0px;
            right: 0px;
        }

        header {
            height: 60px;
            margin-top: -60px;
        }

        footer {
            height: 50px;
            margin-bottom: -50px;
        }

    </style>
    <style>
        #content {
            position: relative;
        }

        #content img {
            position: absolute;
            top: 0px;
            right: 0px;
        }

    </style>
</head>

<body>
    <img style="width: 100%" src="{{ public_path('assets/img/KOPBARU22.jpg') }}" alt="assets/img/kop.png">
    <div style="text-align:center"><b>
            <h3> <b> {{ $data->title }}</b></h3>
    </div>

    <div id="content">
        @if ($data->foto_siswa != null)
            <img src="{{ public_path('storage/foto_siswa/') . $data->foto_siswa }}" style="width: 150px;">
        @endif
    </div>
    <table class="table table-striped">
        <tr>
            <td style="padding-left: 30px">Nama lengkap</td>
            <td style="width: 300px" class="capitalize">: {{ str()->title($data->nama_lengkap) }}</td>
        </tr>

        <tr>
            <td style="padding-left: 30px">NIS</td>
            <td style="width: 300px" class="capitalize">: {{ App\Helpers\Malik::trimNis($data->nis) }}</td>
        </tr>
        <tr>
            <td style="padding-left: 30px">NISN</td>
            <td style="width: 300px" class="capitalize">: {{ str()->title($data->nisn) }}</td>
        </tr>
        <tr>
            <td style="padding-left: 30px">Tempat, Tanggal lahir</td>
            <td style="width: 300px" class="capitalize">: {{ str()->title($data->tempat_lahir) }},
                {{ date('d-m-Y', strtotime($data->tanggal_lahir)) }}
            </td>
        </tr>
        <tr>
            <td style="padding-left: 30px">Jenis kelamin</td>
            <td style="width: 300px" class="capitalize">: {{ str()->title($data->jenis_kelamin) }}</td>
        </tr>
        <tr>
            <td style="padding-left: 30px">Alamat</td>
            <td style="width: 300px" class="capitalize">: {{ str()->title($data->alamat) }}</td>
        </tr>
        <tr>
            <td style="padding-left: 30px">Desa</td>
            <td style="width: 300px" class="capitalize">: {{ str()->title($data->desa) }}</td>
        </tr>
        <tr>
            <td style="padding-left: 30px">Kecamatan</td>
            <td style="width: 300px" class="capitalize">: {{ str()->title($data->kecamatan) }}</td>
        </tr>
        <tr>
            <td style="padding-left: 30px">Kota</td>
            <td style="width: 300px" class="capitalize">: {{ str()->title($data->kota) }}</td>
        </tr>
        <tr>
            <td style="padding-left: 30px">Provinsi</td>
            <td style="width: 300px" class="capitalize">: {{ str()->title($data->provinsi) }}</td>
        </tr>
        <tr>
            <td style="padding-left: 30px">Kode pos</td>
            <td style="width: 300px" class="capitalize">: {{ str()->title($data->kode_pos) }}</td>
        </tr>
        <tr>
            <td style="padding-left: 30px">No Hp</td>
            <td style="width: 300px" class="capitalize">: {{ str()->title($data->no_hp) }}</td>
        </tr>
        <tr>
            <td style="padding-left: 30px">Hobi</td>
            <td style="width: 300px" class="capitalize">: {{ str()->title($data->hobi) }}</td>
        </tr>
        <tr>
            <td style="padding-left: 30px">Cita-cita</td>
            <td style="width: 300px" class="capitalize">: {{ str()->title($data->cita_cita) }}</td>
        </tr>
        <tr>
            <td style="padding-left: 30px">Status keluarga</td>
            <td style="width: 300px" class="capitalize">: {{ str()->title($data->status_keluarga) }}</td>
        </tr>
        <tr>
            <td style="padding-left: 30px">Anak ke</td>
            <td style="width: 300px" class="capitalize">: {{ str()->title($data->anak_ke) }}</td>
        </tr>
        <tr>
            <td style="padding-left: 30px">Nama ayah</td>
            <td style="width: 300px" class="capitalize">: {{ str()->title($data->nama_ayah) }}</td>
        </tr>
        <tr>
            <td style="padding-left: 30px">Tempat, Tanggal lahir ayah</td>
            <td style="width: 300px" class="capitalize">: {{ str()->title($data->tempatlahir_ayah) }},
                {{ date('d-m-Y', strtotime($data->tanggallahir_ayah)) }}</td>
        </tr>
        <tr>
            <td style="padding-left: 30px">Pendidikan Ayah</td>
            <td style="width: 300px" class="capitalize">: {{ str()->title($data->pendidikan_ayah) }}</td>
        </tr>
        <tr>
            <td style="padding-left: 30px">pekerjaan Ayah</td>
            <td style="width: 300px" class="capitalize">: {{ str()->title($data->pekerjaan_ayah) }}</td>
        </tr>
        <tr>
            <td style="padding-left: 30px">Nama Ibu</td>
            <td style="width: 300px" class="capitalize">: {{ str()->title($data->nama_ibu) }}</td>
        </tr>
        <tr>
            <td style="padding-left: 30px">Tempat, tanggal lahir ibu</td>
            <td style="width: 300px" class="capitalize">: {{ str()->title($data->tempatlahir_ibu) }},
                {{ date('d-m-Y', strtotime($data->tanggallahir_ibu)) }}</td>
        </tr>
        <tr>
            <td style="padding-left: 30px">Pendidikan ibu</td>
            <td style="width: 300px" class="capitalize">: {{ str()->title($data->pendidikan_ibu) }}</td>
        </tr>
        <tr>
            <td style="padding-left: 30px">Pekerjaan ibu</td>
            <td style="width: 300px" class="capitalize">: {{ str()->title($data->pekerjaan_ibu) }}</td>
        </tr>
        <tr>
            <td style="padding-left: 30px">Asal sekolah</td>
            <td style="width: 300px" class="capitalize">: {{ str()->title($data->asal_sekolah) }}</td>
        </tr>
        <tr>
            <td style="padding-left: 30px">NPSN sekolah</td>
            <td style="width: 300px" class="capitalize">: {{ str()->title($data->npsn_sekolah) }}</td>
        </tr>
        <tr>
            <td style="padding-left: 30px">Alamat sekolah asal</td>
            <td style="width: 300px" class="capitalize">: {{ str()->title($data->alamat_sekolah_asal) }}</td>
        </tr>
        <tr>
            <td style="padding-left: 30px">No Ujian Nasional</td>
            <td style="width: 300px" class="capitalize">: {{ str()->title($data->no_un) }}</td>
        </tr>
        <tr>
            <td style="padding-left: 30px">No seri ijazah</td>
            <td style="width: 300px" class="capitalize">: {{ str()->title($data->no_seri_ijazah) }}</td>
        </tr>
        <tr>
            <td style="padding-left: 30px">No SKHUN</td>
            <td style="width: 300px" class="capitalize">: {{ str()->title($data->no_skhun) }}</td>
        </tr>
        <tr>
            <td style="padding-left: 30px">Prestasi</td>
            <td style="width: 300px" class="capitalize">: {{ str()->title($data->prestasi) }}</td>
        </tr>

    </table>

    <table>
        <tr>
            <td align="left" valign="top">

            </td>
            <td align="left" width="200" height="105">
            </td>
            <td align="left" width="150" height="105">
            </td>
            <td align="left" valign="top">
                Lumajang,{{ Carbon\Carbon::now()->isoFormat('D MMMM Y') }} <br>
                Ttd
                {{-- @if ($jenis_kelamin == 'Perempuan')
                    Siswi
                @else
                    Siswa
                @endif --}}
                <br>
                <br>
                <br>
                <br>
                <br>
                <div class="capitalize"> {{ $data->nama_lengkap }}</div>
            </td>
        </tr>
    </table>
    <i style="color:slategray; margin-left:40px"> NB: Dokumen ini di bawa ketika validasi data</i>
</body>

</html>
