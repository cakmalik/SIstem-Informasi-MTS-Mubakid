@extends('layouts.app')
@section('content')
    <x-datatables />

    <div class="mb-2 d-flex justify-content-between">
        <button type="button" class="btn btn-outline-info btn-sm btn-flat" data-toggle="modal" data-target="#modal-default">
            <i class="fas fa-plus"></i> Tambah
        </button>
        <div>
            <a href="{{ route('students.status', 'baru') }}"
                class="mx-1 btn btn-flat @if (Request::segment(3) == 'baru') btn-info @else btn-outline-info @endif btn-sm">Baru</a>
            <a href="{{ route('students.status', 'aktif') }}"
                class="btn btn-flat @if (Request::segment(3) == 'aktif') btn-info @else btn-outline-info @endif btn-sm">Aktif</a>
        </div>


    </div>
    <table id="datatable" class="display" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                @if (Request::segment(3) == 'aktif')
                    <th>Kelas</th>
                @else
                    <th>Kota</th>
                @endif
                <th>Jk</th>
                <th>No Hp</th>
                <th>Terdaftar</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($collection as $item)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <th>{{ $item->nama_lengkap }}</th>
                    @if (Request::segment(3) == 'aktif')
                        <th>{{ $item->grade->name }}</th>
                    @else
                        <th>{{ $item->kota }}</th>
                    @endif
                    <th>{{ $item->jenis_kelamin }}</th>
                    <th>{{ $item->no_hp }}</th>
                    <th>{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</th>
                    <th>
                        <div class="btn-group">
                            @if ($item->status == 'baru')
                                <a href="{{ route('students.verify', $item->id) }}" data-toggle="tooltip"
                                    title="Verifikasi" type="button" class="btn btn-success"> <i class="fas fa-check"></i>
                                </a>
                            @endif
                            <button type="button" class="btn btn-default dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu">
                                <a href="{{ route('students.show', $item->id) }}" class="dropdown-item">Detail</a>
                                <a class="dropdown-item" href="{{ route('students.edit', $item->id) }}">Edit</a>
                                <a class="dropdown-item" target="_blank"
                                    href="{{ route('pdf.biodata', $item->id) }}">Biodata</a>
                                <a class="dropdown-item" target="_blank"
                                    href="{{ route('pdf.mou', $item->id) }}">MoU</a>
                                {{-- <a class="dropdown-item" href="{{ route('pdf.biodata') }}">Cetak Kts</a> --}}
                                <div class="dropdown-divider"></div>
                                <form method="POST" action="{{ route('students.destroy', $item->id) }}">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm"
                                        data-toggle="tooltip" title='Delete'> <i class="fas fa-trash"></i> Hapus</button>
                                </form>
                            </div>
                        </div>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- @include('layouts.partials.confirm') --}}
    @include('students.create')
@endsection
