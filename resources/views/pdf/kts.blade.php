<html>

<head>
    <style>
        #left-panel {
            height: auto;
            width: 23%;
            float: left;
            /* border: 1px solid sa:    ;lmon; */
        }

        #right-panel {
            float: right;
            width: 75%;
            /* border: 1px solid salmo: ;n; */
            height: auto;
            padding-top: 200px;

        }

        #fotosiswa {
            margin-top: 550px;
            margin-left: 130px;
            /* border: 1px solid s: ;almon; */
            width: 550px;
            height: 700px;
        }

        #tgl-panel {
            float: right;
            width: 32%;
            /* border: 1px solid sa: ;lmon; */
            /* height: auto; */
        }

        img {
            width: 250px;
        }


        table {
            /* vertical-align: top; */
            font-family: 'gotik';
            text-transform: capitalize;
            font-size: 76px;
            /* font-size: 400%; */
            padding-top: 550px;
            padding-left: 110px;
            padding-bottom: 4px;
            padding-right: 40px;
            line-height: 140%;
        }

        td,
        th {
            text-align: left;
        }

        p {
            text-transform: capitalize;
        }

        img.barcode {
            padding-top: 380px;
            height: 400px;
            width: 700px;
        }

        p {
            margin: 0;
            padding: 0;
        }

        p.nis {
            /* font-weight: bold; */
            font-size: 100px;
            text-align: left;
            padding-left: -14px;
            padding-top: 350px;
            font-family: Arial, Helvetica, sans-serif;
        }

        p.nama {
            font-weight: bold;
            font-size: 100px;
            text-align: left;
            padding-left: -14px;
            padding-top: 30px;
            font-family: Arial, Helvetica, sans-serif;
        }

        p.ttl {
            font-size: 100px;
            text-align: left;
            padding-left: -14px;
            padding-top: 30px;
            font-family: Arial, Helvetica, sans-serif;
            /* padding-top: 350px; */
        }

        p.tgl {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 50px;
            margin-top: 0px;
            padding-left: 22px;
        }

        .button {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #4CAF50;
            /* Green */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 20px;
        }

    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"
        integrity="sha512-s/XK4vYVXTGeUSv4bRPOuxSDmDlTedEpMEcAQk0t/FMd9V6ft8iXdwSBxV0eD60c6w/tjotSlKu9J2AAW1ckTA=="
        crossorigin="anonymous"></script>

</head>

<body>
    <a id="btn-Convert-Html2Image" class="button" href="#">Klik 2X untuk DOWNLOAD</a>
    <br />
    <br>

    {{-- DISINI KONTENNYA --}}
    <div id="html-content-holder"
        style="background-image:url('{{ asset('assets/img/kts-depan.png') }}'); width: 3000px;height: 1893px;">
        <div id="left-panel">
            <img src="{{ asset('storage/foto_siswa/' . $data->foto_siswa) }}" id="fotosiswa">
        </div>

        @php
            $kota = explode(' ', $data->kota);
        @endphp
        <div id="right-panel">
            <p class="nis">{{ $data->nis . ' / ' . $data->nisn }}</p>
            <p class="nama">{{ Illuminate\Support\Str::upper($data->nama_lengkap) }}</p>
            <p class="ttl">
                {{ $data->tempat_lahir . ', ' . Carbon\Carbon::parse($data->tanggal_lahir)->isoFormat('D MMMM Y') }}
            </p>
            <p class="ttl">
                {{ $alamat }}</p>
        </div>
        <div id="tgl-panel">
            <p class="tgl">Lumajang,
                {{ Carbon\Carbon::now()->isoFormat('D MMMM Y') }}</p>
        </div>

    </div>

    <h3>Preview :</h3>
    <div id="previewImage">
    </div>


    <script>
        $(document).ready(function() {


            var element = $("#html-content-holder"); // global variable
            var getCanvas; // global variable

            $("#btn-Convert-Html2Image").on('click', function() {
                html2canvas(element, {
                    onrendered: function(canvas) {
                        $("#previewImage").append(canvas);
                        getCanvas = canvas;
                    }
                });

                var imgageData = getCanvas.toDataURL("image/png");
                // Now browser starts downloading it instead of just showing it
                var newData = imgageData.replace(/^data:image\/png/, "data:application/octet-stream");
                $("#btn-Convert-Html2Image").attr("download", "kts.png").attr("href", newData);
            });

        });
    </script>
</body>

</html>
