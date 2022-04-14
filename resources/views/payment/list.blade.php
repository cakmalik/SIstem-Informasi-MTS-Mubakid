@extends('layouts/app')
@section('judul', 'Pembayaran')
@section('prefix', 'List Pembayaran')
<x-datatables />
@section('content')
    <div class="d-lg-flex justify-content-between">
        <div>
            <a href="{{ route('pay.list', 'online') }}" class="mt-2 badge bg-info">Virtual</a>
            <a href="{{ route('pay.list', 'offline') }}" class="mt-2 badge bg-primary">Offline/Tunai</a>
        </div>
    </div>
    <div class="mt-3">
        @if ($transactions == 'offline')
            <livewire:offline-payment />
        @else
            <table id="datatable" class="table table-striped table-bordered nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Kode Transaksi</th>
                        <th>Metode</th>
                        <th>Nama</th>
                        <th>Nominal</th>
                        <th>Status</th>
                        <th>Untuk</th>
                        <th>Tgl Expired</th>
                        <th>Phone</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $item)
                        @php
                            if ($item->status == 'UNPAID') {
                                $status = '<span class="badge bg-danger">UNPAID</span>';
                            } elseif ($item->status == 'PAID') {
                                $status = '<span class="badge bg-success">PAID</span>';
                            } elseif ($item->status == 'EXPIRED') {
                                $status = '<span class="badge bg-warning">EXPIRED</span>';
                            } elseif ($item->status == 'CANCELED') {
                                $status = '<span class="badge bg-secondary">CANCELED</span>';
                            }
                        @endphp
                        <tr>
                            <td>{{ $item->reference }}</td>
                            <td>{{ $item->payment_name }}</td>
                            <td>{{ $item->customer_name }}</td>
                            <td>{{ $item->amount }}</td>
                            <td>{!! $status !!}</td>
                            <td>{{ $item->order_items[0]->name }}</td>
                            <td>{{ Carbon\Carbon::createFromTimestamp($item->expired_at)->isoFormat('D MMM Y H:m') }}</td>
                            <td>{{ $item->customer_phone }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
