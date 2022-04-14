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
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('adminlte3') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte3') }}/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo mb-3">
            <img style="height:70px" src="{{ asset('assets/img/icon.png') }}" alt="">
            {{-- <a href="{{ asset('adminlte3') }}/index2.html"><b>{{ env('APP_NAME') }}</b>2</a> --}}
        </div>

        @yield('content')
        {{-- <div class="social-auth-links text-center mb-3">
            <p>- Atau -</p>
            <a href="#" class="btn btn-block btn-success">
                <i class="fab fa-facebook mr-2"></i> Login dengan Facebook
            </a>
            <a href="#" class="btn btn-block btn-danger">
                <i class="fab fa-google-plus mr-2"></i> Login dengan Google
            </a>
        </div> --}}
        <!-- /.social-auth-links -->

        {{-- <p class="mb-1">
            <a href="forgot-password.html">Lupa password</a>
        </p> --}}
        <p class="mb-0 mt-3 text-center">
            @if (Request::segment(1) == 'login')
                <a href="{{ route('register') }}" class="btn btn-block btn-outline-success">
                    MENDAFTAR
                </a>
            @else
                <a href="{{ route('login') }}" class="btn btn-block btn-outline-success">
                    LOGIN
                </a>
            @endif
        </p>

    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('adminlte3') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminlte3') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminlte3') }}/dist/js/adminlte.min.js"></script>
</body>

</html>
