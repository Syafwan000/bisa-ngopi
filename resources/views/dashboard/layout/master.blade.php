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
    @livewireStyles
    <title>{{ $title }}</title>
</head>
<body>

    <div class="preloader">
      <div class="lds-ripple">
          <div class="lds-pos"></div>
          <div class="lds-pos"></div>
      </div>
    </div>

    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        @include('dashboard.components.nav')
        @include('dashboard.components.sidebar')
        <div class="page-wrapper">
            @include('dashboard.components.header')
            <div class="container-fluid">
              @yield('page-dashboard')
            </div>
            <footer class="footer text-center">
              &copy; BisaNgopi 2022 - Present
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
              <button type="button" class="btn btn-secondary text-white shadow-none" data-bs-dismiss="modal">Tidak</button>
              <a href="/logout" type="submit" class="btn btn-danger text-white shadow-none">Keluar</a>
            </div>
          </div>
        </div>
      </div>

    @livewireScripts
    <script src="{{ asset('js/showPassword.js') }}"></script>
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