@extends('layouts.app')
@section('title', 'Import')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container">
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-exclamation-triangle"></i>Peringatan </h5>
            Boleh melakukan Import Hanya jika anda telah mengetahui <strong>PROSEDURNYA</strong>
        </div>
        <div class="row justify-content-start">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Siswa</div>
                    <div class="card-body">
                        <div class="d-flex justify-content-around">
                            <a href="{{ asset('MTS2/contoh_format_import_siswa.xlsx') }}" type="button"
                                class="btn btn-info btn-sm btn-flat">
                                <i class="fas fa-file-excel"></i> Contoh
                            </a>
                            <button type="button" class="btn btn-info btn-sm btn-flat" data-toggle="modal"
                                data-target="#modal_import_students"> <i class="fas fa-solid fa-upload"></i>
                                Import
                            </button>
                            <a href="{{ route('export.students') }}" type="button" class="btn btn-info btn-sm btn-flat">
                                <i class="fas fa-solid fa-download"></i> Export
                            </a>
                        </div>
                    </div>
                </div>
                @csrf
                <x-modal id="modal_import_students" :modalHeader="false">
                    <x-slot name="body">
                        <form action="{{ route('import.students') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <input type="file" name="file_students" id="file">
                            <button type="submit" class="btn btn-info btn-sm">Tambah</button>
                    </x-slot>
                    <x-slot name="footer">
                        {{-- <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button> --}}
                    </x-slot>
                    </form>
                </x-modal>
            </div>
            {{-- IMPORT EXPORT GURU --}}
            {{-- <div class="col-md-6">
                <div class="card">
                    @include('comingsoon')
                    <div class="card-header">Guru</div>
                    <div class="card-body">
                        <div class="d-flex justify-content-around">
                            <a href="{{ asset('MTS2/contoh_format_import_siswa.xlsx') }}" type="button"
                                class="btn btn-info btn-sm btn-flat">
                                <i class="fas fa-file-excel"></i> Contoh
                            </a>
                            <button type="button" class="btn btn-info btn-sm btn-flat" data-toggle="modal"
                                data-target="#modal_import_students"> <i class="fas fa-solid fa-upload"></i>
                                Import
                            </button>
                            <a href="{{ route('export.students') }}" type="button" class="btn btn-info btn-sm btn-flat">
                                <i class="fas fa-solid fa-download"></i> Export
                            </a>
                        </div>      
                    </div>
                </div>
                @csrf
                <x-modal id="modal_import_students" :modalHeader="false">
                    <form action="{{ route('import.students') }}" enctype="multipart/form-data" method="POST">
                        <x-slot name="body">
                            <input type="file" name="file_students" id="file">
                        </x-slot>
                        <x-slot name="footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-info btn-sm">Tambah</button>
                        </x-slot>
                    </form>
                </x-modal>
            </div> --}}
        </div>
    </div>
@endsection
