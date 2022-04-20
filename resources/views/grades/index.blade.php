@extends('layouts.app')
@section('content')
    {{-- <div class="alert alert-info alet-dismissable" id="alertuser">
        Menghapus akun beresiko Siswa tidak dapat login ke akunnya.
        <a href="#" onclick="sayaMemahami()" type="button" data-dismiss="alert">Saya Memahaminya</a>
    </div> --}}
    <div class="card p-3">
        <x-datatables />
        <table id="datatable" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Wali kelas</th>
                    <th>Jumlah siswa</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($grades as $grade)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $grade->name }}</td>
                        <td></td>
                        <td>{{ $grade->students->count() }}</td>
                        <td>
                            <a href="">Lihat</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- <script>
        if (window.localStorage.getItem('pahamUserDelete') == 'true') {
            const alertuser = document.getElementById('alertuser');
            alertuser.style.display = 'none';
        }

        function sayaMemahami() {
            window.localStorage.setItem('pahamUserDelete', 'true');
            alert(
                'Di Ingat ya kang, saya tidak akan mengingatkannya lagi. jadi kalau ada user tidak bisa login, maka cek dulu disini'
            );
        }
    </script> --}}
@endsection
