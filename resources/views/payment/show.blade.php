@extends('layouts/app')
@section('judul', 'Detail')
@section('prefix', 'Detail')
@section('content')
    <div class="content">
        <div class="container-fluid">
            @if ($transaction->expired_time == null)
                <div class="alert alert-success">Pembayaran dilakukan di pondok pesantren</div>
            @else
                <div class="alert alert-success">Segera lakukan pembayaran sebelum <strong
                        style="color: white">{{ Carbon\Carbon::createFromTimestamp($transaction->expired_time)->isoFormat('dddd, D MMMM Y') }}
                        Jam: {{ Carbon\Carbon::createFromTimestamp($transaction->expired_time)->isoFormat('H:m') }}
                    </strong>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title">Detail Transaksi</h5>
                                <p class="card-text text-muted">
                                    #{{ $transaction->reference }}
                                </p>
                            </div>
                            <a href="#" class="card-link">Total :</a>
                            <h2>Rp. {{ number_format($transaction->amount) }}</h2>
                        </div>
                        <div class="card-footer text-right">
                            <span class="badge badge-pill badge-primary"> {{ str()->upper($transaction->status) }}</span>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h5 class="m-0">Rincian</h5>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                @foreach ($transaction->order_items as $item)
                                    <tr>
                                        <th>{{ $item->name }}</th>
                                        <td>Rp. {{ number_format($item->price) }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <th>Admin</th>
                                    <td>Rp. {{ number_format($transaction->fee_customer) }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.col-md-6 -->
                <div class="col-lg-6">


                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="m-0">Cara Bayar</h5>
                        </div>

                    </div>
                    @foreach ($transaction->instructions as $intruksi)
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left" type="button"
                                            data-toggle="collapse" data-target="#{{ str()->snake($intruksi->title) }}"
                                            aria-expanded="true" aria-controls="collapseOne">
                                            {{ $intruksi->title }}
                                        </button>
                                    </h2>
                                </div>

                                <div id="{{ str()->snake($intruksi->title) }}" class="collapse"
                                    aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        @foreach ($intruksi->steps as $step)
                                            <li class="text-sm list">{{ $loop->iteration }}.
                                                {!! $step !!}</li>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
