@extends('layouts.app')
@push('header')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endpush
@push('footer')
    <script>
        $(function() {
            //Initialize Select2 Elements
            $(".select2").select2();

            //Initialize Select2 Elements
            $(".select2bs4").select2({
                theme: "bootstrap4",
            });
        });
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
@endpush

@section('content')
    @hasrole('siswa')
        @if ($next_step == true)
            <div class="alert alert-secondary alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i>Terima kasih </h5>
                Telah menyelesaikan pendaftaran, Download dan Cetak <strong> Biodata </strong>beserta <strong> MOU
                </strong> dan dibawa saat Registrasi ulang.
            </div>
            <div class="row">
                <div class="col-md-12">
                    @if ($link == 'kosong')
                    @elseif($link == 'baru')
                        <a href="{{ route('pay.checkout', 'pendaftaran') }}" class="small-box-footer">
                            <div class="small-box bg-info py-2">
                                <div class="inner text-center">
                                    <h4>Pembayaran</h4>
                                    <p>Administrasi pendaftaran dapat klik disini</p>
                                </div>
                            </div>
                        </a>
                    @else
                        <a href="{{ route('pay.detail', $link) }}" class="small-box-footer">
                            <div class="small-box bg-info py-2">
                                <div class="inner text-center">
                                    <h4>Detail</h4>
                                    <p>Tagihan pembayaran</p>
                                </div>
                            </div>
                        </a>
                    @endif

                </div>
                <div class="col-md-6">
                    <a target="_blank" href="{{ route('pdf.biodata', Auth::user()->student->id) }}" class="small-box-footer">
                        <div class="small-box bg-success py-2">
                            <div class="inner text-center">
                                <h4>Biodata<sup style="font-size: 20px"></sup></h4>
                                {{-- <p>Bounce Rate</p> --}}
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6">
                    <a target="_blank" href="{{ route('pdf.mou', Auth::user()->student->id) }}" class="small-box-footer">
                        <div class="small-box bg-warning py-2">
                            <div class="inner text-center">
                                <h4>Persetujuan<sup style="font-size: 20px"></sup></h4>
                                {{-- <p>Bounce Rate</p> --}}
                            </div>
                        </div>
                    </a>
                </div>

            </div>
        @endif
    @endhasrole
    @hasrole('admin|super admin')
        @include('comingsoon')
    @endhasrole
@endsection
