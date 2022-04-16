@extends('layouts.app')
@section('title', 'Import')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <button type="button" class="btn btn-info btn-sm btn-flat" data-toggle="modal"
                            data-target="#modal_import_students">
                            Download Contoh Format
                        </button>
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
