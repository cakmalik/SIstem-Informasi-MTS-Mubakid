@extends('layouts.app')
@section('title', 'Students')
<x-datatables />
@section('content')
    <div class=" d-flex justify-content-between mb-2">
        <button type="button" class="btn btn-info btn-sm btn-flat" data-toggle="modal" data-target="#modal-default">
            <i class="fas fa-plus"></i> Tambah Siswa
        </button>
        <div>
            {{-- <a href="{{ route('students.status', 'baru') }}" class="btn btn-flat btn-outline-info btn-sm">Baru</a>
            <a href="{{ route('students.status', 'aktif') }}" class="btn btn-flat btn-outline-info btn-sm">Aktif</a> --}}
        </div>

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
                            <a href="{{ route('students.show', $item->id) }}" type="button"
                                class="btn btn-info">Detail</a>
                            <button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('students.edit', $item->id) }}">Edit</a>
                                <a class="dropdown-item" target="_blank"
                                    href="{{ route('pdf.biodata', $item->id) }}">Biodata</a>
                                <a class="dropdown-item" target="_blank" href="{{ route('pdf.mou', $item->id) }}">MoU</a>
                                {{-- <a class="dropdown-item" href="{{ route('pdf.biodata') }}">Cetak Kts</a> --}}
                                <div class="dropdown-divider">
                                </div>
                                <form method="POST" action="{{ route('students.destroy', $item->id) }}">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm"
                                        data-toggle="tooltip" title='Delete'>Delete</button>
                                </form>
                            </div>

                        </div>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
