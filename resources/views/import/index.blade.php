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
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @include('comingsoon')
                    <div class="card-body">
                        <a href="{{ asset('MTS2/contoh_format_import_siswa.xlsx') }}" type="button"
                            class="btn btn-info btn-sm btn-flat">
                            Download Contoh Format
                        </a>
                        <button type="button" class="btn btn-info btn-sm btn-flat" data-toggle="modal"
                            data-target="#modal_import_students">
                            Import Students
                        </button>
                        <a href="{{ route('export.students') }}" type="button" class="btn btn-info btn-sm btn-flat">
                            Export Students
                        </a>
                    </div>
                    <form action="{{ route('import.students') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <x-modal id="modal_import_students" :modalHeader="false">
                            <x-slot name="body">
                                <input type="file" name="file_students" id="file">
                            </x-slot>
                            <x-slot name="footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-info btn-sm">Tambah</button>
                            </x-slot>
                        </x-modal>
                    </form>
                </div>
            </div>
        </div>
    @endsection
