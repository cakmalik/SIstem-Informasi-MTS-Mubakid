@extends('layouts.app')
@push('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
        integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@push('foot')
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $("#teacher_id").select2({
                placeholder: "Search"
            });
            $("#wali_kelas").select2({
                placeholder: "Search"
            });

            if (window.localStorage.getItem('pahamGradeDelete') == 'true') {
                const alertuser = document.getElementById('alertuser');
                alertuser.style.display = 'none';
            }

            function sayaMemahami() {
                window.localStorage.setItem('pahamGradeDelete', 'true');
                alert(
                    'Di Ingat ya kang, saya tidak akan mengingatkannya lagi. jadi kalau ada user tidak bisa login, maka cek dulu disini'
                );
            }
        });
    </script>
@endpush
@section('content')
    <div class="alert alert-danger alet-dismissable" id="alertuser">
        Menghapus kelas beresiko siswa akan error, karena kelasnya tidak ditemukan.
        <a href="#" onclick="sayaMemahami()" type="button" data-dismiss="alert">Saya Memahaminya</a>
    </div>
    <button href="#" data-toggle="modal" data-target="#modal_ubah" class="btn btn-info btn-sm btn-flat mb-2">Set
        wali kelas</button>
    <a href="#" class="btn btn-info btn-sm btn-flat mb-2" data-toggle="modal" data-target="#tambah_kelas">Tambah kelas</a>
    <div class="card p-3">
        <x-datatables />
        <table id="datatable" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Rombel</th>
                    <th>Desc</th>
                    {{-- <th>Wali kelas</th>
                    <th>Jml Guru</th> --}}
                    <th>Kuota</th>
                    <th>Jml Siswa</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                {{-- {{ dd($grades) }} --}}
                @foreach ($grades as $grade)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $grade->name }}</td>
                        <td>{{ $grade->description }}</td>
                        {{-- <td>{{ $grade->walas }}</td> --}}
                        {{-- <td>{{ $grade->teachers->count() }}</td> --}}
                        </td>
                        <td>{{ $grade->qty }}</td>
                        <td>{{ $grade->students->count() }}</td>
                        <td>
                            <form action="{{ route('grades.destroy', $grade->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger show_confirm" data-toggle="tooltip"
                                    title='Delete'> <i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <x-modal id="modal_ubah" :modalHeader="false">
        <x-slot name="body">
            <form action="{{ route('grades.apply') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <select id="grade_id" name="grade_id" class="form-control">
                    <option>Pilih kelas</option>
                    @foreach ($grades as $gr)
                        <option value="{{ $gr->id }}">{{ $gr->name }}</option>
                    @endforeach
                </select>
                Pilih guru
                <select id="teacher_id" name="teacher_id" class="form-control" style="width: 100%;">
                    <option selected disabled>-</option>
                    @foreach ($teachers as $tc)
                        <option value="{{ $tc->id }}">{{ $tc->name }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-info btn-flat btn-sm mt-3">Terapkan</button>
            </form>
        </x-slot>
    </x-modal>
    <x-modal id="tambah_kelas" :modalHeader="false">
        <x-slot name='body'>
            <form action="{{ route('grades.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" placeholder="nama rombel" class="form-control">
                    <input type="text" name="description" placeholder="deskripsi" class="form-control">
                    <select name="wali_kelas" id="wali_kelas" class="form-control" style="width: 100%">
                        <option selected disabled>wali kelas</option>
                        @foreach ($teachers as $tc)
                            <option value="{{ $tc->id }}">{{ $tc->name }}</option>
                        @endforeach
                    </select>
                    <input type="number" name="qty" placeholder="kuota kelas" class="form-control">
                </div>
                <button type="submit" class="btn btn-sm btn-flat btn-info">Tambah</button>
            </form>
        </x-slot>
    </x-modal>
@endsection
