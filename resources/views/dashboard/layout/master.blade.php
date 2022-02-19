<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('template/plugins/bower_components/chartist/dist/chartist.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/style.min.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <title>{{ $title }}</title>
</head>

<body>
<body>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        @include('dashboard.components.nav')
        @include('dashboard.components.sidebar')
        <div class="page-wrapper">
            @include('dashboard.components.header')
            @yield('page-dashboard')
            <footer class="footer text-center"> 2021 © Ample Admin brought to you by <a 
              href="https://www.wrappixel.com/">wrappixel.com</a>
            </footer>
        </div>
    </div>

    <div class="modal fade" id="logoutModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Apakah anda yakin ingin keluar ?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary shadow-none" data-bs-dismiss="modal">Tidak</button>
              <a href="/logout" type="submit" class="btn btn-primary shadow-none">Keluar</a>
            </div>
          </div>
        </div>
      </div>

    <script src="{{ asset('template/plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('template/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('template/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('template/js/waves.js') }}"></script>
    <script src="{{ asset('template/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('template/js/custom.js') }}"></script>
    <script src="{{ asset('template/plugins/bower_components/chartist/dist/chartist.min.js') }}"></script>
    <script src="{{ asset('template/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}"></script>
    <script src="{{ asset('template/js/pages/dashboards/dashboard1.js') }}"></script>
</body>

</html>