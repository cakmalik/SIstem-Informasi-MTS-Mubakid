<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte3') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte3') }}/dist/css/adminlte.min.css">

    <link rel="stylesheet" href="{{ asset('adminlte3') }}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('adminlte3') }}/plugins/toastr/toastr.min.css">
    <style>
        .separator {
            display: flex;
            align-items: center;
            text-align: center;
        }

        .separator::before,
        .separator::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #000;
        }

        .separator:not(:empty)::before {
            margin-right: .25em;
        }

        .separator:not(:empty)::after {
            margin-left: .25em;
        }

    </style>
    @stack('head')
    @livewireStyles
</head>

<body class="hold-transition sidebar-mini">
    @include('sweetalert::alert')


    <div class="wrapper">

        @include('layouts.partials.navbar')

        @include('layouts.partials.sidebar-menu')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>@yield('heading')</h1>
                        </div>
                        <div class="col-sm-6">
                            {{-- <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Blank Page</li>
                            </ol> --}}
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
                {{-- <livewire:hello-world /> --}}
                @yield('content')
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        @if (Request::segment(1) == 'transaction' && Request::segment(2) == 'detail')
            <div class="btn fixed-bottom btn-flat btn-block">
                <a href="{{ route('pay.change', $transaction->reference) }}" class="btn btn-primary btn-block">UBAH
                    METODE
                    PEMBAYARAN</a>
            </div>
        @else
            {{-- <footer class="main-footer mt-6">
                <div class="float-right d-none d-sm-block">
                    <b>Version</b> 3.2.0
                </div>
                <strong>&copy;<a href="https://wa.me/6285333920007"> BakidDev</a>.</strong> Template By AdminLTE3.
            </footer> --}}
        @endif

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    @livewireScripts
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @stack('foot')
    @include('sweetalert::alert')
    <!-- jQuery -->
    {{-- <script src="{{ asset('adminlte3') }}/plugins/jquery/jquery.min.js"></script> --}}
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminlte3') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- sweet alert2-->
    {{-- <script src="{{ asset('adminlte3') }}/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="{{ asset('adminlte3') }}/plugins/toastr/toastr.min.js"></script> --}}
    <!-- AdminLTE App -->
    <script src="{{ asset('adminlte3') }}/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    @include('layouts.partials.scripts')
</body>

</html>
