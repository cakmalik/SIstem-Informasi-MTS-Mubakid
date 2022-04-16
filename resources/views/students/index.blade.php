@extends('layouts.app')
<x-datatables />
@push('head')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@push('foot')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
@endpush
@hasrole('admin|super admin')
    @section('content')
        @include('students.create')
        <div class=" d-flex justify-content-between mb-2">
            <div>
                {{-- <a href="{{ route('students.status', 'baru') }}" class="btn btn-flat btn-outline-info btn-sm">Baru</a>
        <a href="{{ route('students.status', 'aktif') }}" class="btn btn-flat btn-outline-info btn-sm">Aktif</a> --}}
            </div>
            <button type="button" class="btn btn-info btn-sm btn-flat" data-toggle="modal" data-target="#modal-default">
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
                                    <a class="dropdown-item" target="_blank"
                                        href="{{ route('pdf.biodata', $item->id) }}">Biodata</a>
                                    <a class="dropdown-item" target="_blank" href="{{ route('pdf.mou', $item->id) }}">MoU</a>
                                    {{-- <a class="dropdown-item" href="{{ route('pdf.biodata') }}">Cetak Kts</a> --}}
                                    <div class="dropdown-divider"></div>
                                    <form action="{{ route('students.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="confirm('Yakin mau di hapus?')" type="submit"
                                            class="btn btn-block btn-danger"><i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endsection
@endhasrole
