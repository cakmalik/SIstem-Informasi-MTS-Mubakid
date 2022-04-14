@extends('layouts.app')
@push('header')
    <style>
        img.icon {
            max-height: 50px;
            max-width: 50px;
            height: auto;
            width: auto;
        }

    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"
        integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush
@section('content')
    <x-modal id="modal-default">
        <x-slot name="title">
            Modal title
        </x-slot>
        <form action="{{ route('pay.request') }}" method="POST" id="my_form1">
            @csrf
            <input type="hidden" name="bill_type_id" value="{{ Request::segment(2) }}">
            <input type="hidden" name="method" value="tunaicash">
            <a href="javascript:{}" onclick="onSubmit('1')">
                <div class="d-flex justify-content-between my-2">
                    <div class="col-1">
                        <img class="icon" src="{{ asset('assets/bakid/favicon.png') }}">
                    </div>
                    <div class="col-7">
                        <strong>Bayar Tunai / Di Pondok</strong>
                    </div>
                    <span class="primary">></span>
                </div>
            </a>
        </form>
        <hr>
        <x-slot name="body">
            <form action="{{ route('pay.request') }}" method="POST" id="my_form1">
                @csrf
                <input type="hidden" name="bill_type_id" value="{{ Request::segment(2) }}">
                <input type="hidden" name="method" value="tunaicash">
                <a href="javascript:{}" onclick="onSubmit('1')">
                    <div class="d-flex justify-content-between my-2">
                        <div class="col-1">
                            <img class="icon" src="{{ asset('assets/icons/favicon.png') }}">
                        </div>
                        <div class="col-7">
                            <strong>Bayar Tunai / Di Pondok</strong>
                        </div>
                        <span class="primary">></span>
                    </div>
                </a>
            </form>
            <hr>
            @foreach ($channels as $channel)
                <form action="{{ route('pay.request') }}" method="POST" id="my_form{{ $channel->code }}">
                    @csrf
                    <input type="hidden" name="bill_type_id" value="{{ Request::segment(2) }}">
                    <input type="hidden" name="method" value="{{ $channel->code }}">
                    <a href=javascript:{} onclick="onSubmit('{{ $channel->code }}')">
                        <div class="d-flex justify-content-between my-2">
                            <div class="col-1">
                                <img style="width:50px;"
                                    src="{{ asset('assets/icons') . '/' . $channel->code . '.png' }}">
                            </div>
                            <div class="col-7">
                                <strong>{{ $channel->name }}</strong>
                            </div>
                            <span class="primary">></span>
                        </div>
                    </a>
                </form>
                <hr>
            @endforeach
        </x-slot>
        <x-slot name="footer">

        </x-slot>
    </x-modal>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
        Pilih Metode Pembayaran
    </button>

    <script>
        function onSubmit(form_id) {
            $('#my_form' + form_id).submit();
        }
    </script>
@endsection
