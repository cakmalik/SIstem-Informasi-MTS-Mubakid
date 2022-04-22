@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Rombel</div>

                    <div class="card-body">
                        <form action="{{ route('grades.update', $grade->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Nama Kelas</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $grade->name }}">
                            </div>

                            <div class="form-group">
                                <label for="wali_kelas">Wali kelas</label>
                                <select class="form-control" id="wali_kelas" name="wali_kelas">
                                    @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->id }}"
                                            {{ $teacher->id == $grade->teacher_id ? 'selected' : '' }}>
                                            {{ $teacher->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="qty">Kuota</label>
                                <input type="number" class="form-control" id="qty" name="qty" value="{{ $grade->qty }}">
                            </div>
                            <div class="form-group">
                                <label for="description">Deskripsi</label>
                                <small class="text-muted">(Pastikan terdapat kata laki-laki atau perempuan, agar tidak
                                    terjadi error)</small>
                                <textarea class="form-control" id="description" name="description">{{ $grade->description }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-info">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
