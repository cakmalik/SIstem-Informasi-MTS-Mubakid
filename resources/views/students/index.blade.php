@extends('layouts.app')

@section('content')
    <x-datatables />
    <div class="card">
        <div class="card-body">
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>ALamat</th>
                        <th>Hp</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_lengkap }}</td>
                            {{-- <td>{{ $item->address }}</td>
                    <td>{{ $item->phone }}</td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
