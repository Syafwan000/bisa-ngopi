<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
    <header class="topbar" data-navbarbg="skin5">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
            <div class="navbar-header" data-logobg="skin6">
                <a class="navbar-brand" href="/dashboard">
                    <b class="logo-icon ps-1">
                        <img width="40px" src="{{ asset('img/logo.png') }}" alt="Dashboard Logo" />
                    </b>
                    <span class="logo-text ps-3">
                        <img width="120px" src="{{ asset('img/logo-text.png') }}" alt="homepage" />
                    </span>
                </a>
                <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
                    href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
            </div>
            <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                <ul class="navbar-nav ms-auto d-flex align-items-center">
                    <li>
                        <a class="profile-pic" href="/dashboard/profile">
                            <img src="{{ asset('img/user.jpg') }}" alt="user-img" width="36"class="img-circle"><span class="text-white font-medium">{{ Auth::user()->nama }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
</div>