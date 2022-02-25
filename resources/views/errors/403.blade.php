<!DOCTYPE html>
<html dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BisaNgopi | 403 Error</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <link rel="stylesheet" href="{{ asset('template/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>

    <div class="main-wrapper">
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <div class="error-box">
            <div class="error-body text-center">
                <h1 class="error-title">403</h1>
                <h3 class="text-uppercase error-subtitle">HALAMAN INI TIDAK DAPAT ANDA AKSES</h3>
                <p class="text-muted mt-4 mb-4">SILAHKAN UNTUK KEMBALI KE HALAMAN AWAL</p>
                <a href="/" class="btn btn-back shadow-none btn-rounded waves-effect waves-light mb-5 text-white">Kembali</a>
            </div>
        </div>
    </div>

    <script src="{{ asset('template/plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('template/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        $(".preloader").fadeOut();
    </script>
</body>
</html>