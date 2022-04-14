@extends('layouts/app')
@section('judul', 'Pembayaran')
@section('prefix', 'Checkout')

@section('content')
<table id="datatable" class="table">
    <tr>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Tagihan</th>
        <th>Status</th>
    </tr>
    @foreach ($bills as $bill)
    <tr>
        <td>{{ $bill->student->name }}</td>
        <td>{{ $bill->student->class->name }}</td>
        <td>{{ $bill->amount }}</td>
        <td>{{ $bill->status }}</td>
    </tr>
    @endforeach
</table>
@endsection