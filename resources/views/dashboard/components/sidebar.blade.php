<aside class="left-sidebar" data-sidebarbg="skin6">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item pt-2">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ Request::is('/dashboard') ? 'active' : '' }}" href="/dashboard"
                        aria-expanded="false">
                        <i class="far fa-clock" aria-hidden="true"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                @can('admin')
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ Request::is('/dashboard/users*') ? 'active' : '' }}" href="/dashboard/users"
                        aria-expanded="false">
                        <i class="fa-solid fa-users" aria-hidden="true"></i>
                        <span class="hide-menu">Users</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ Request::is('/dashboard/log-users*') ? 'active' : '' }}" href="/dashboard/log-users"
                        aria-expanded="false">
                        <i class="fa-solid fa-circle-info" aria-hidden="true"></i>
                        <span class="hide-menu">Log User</span>
                    </a>
                </li>
                @endcan
                @can('manager')
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ Request::is('/dashboard/menu*') ? 'active' : '' }}" href="/dashboard/menu"
                        aria-expanded="false">
                        <i class="fa-brands fa-readme" aria-hidden="true"></i>
                        <span class="hide-menu">Menu</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ Request::is('/dashboard/transaksi*') ? 'active' : '' }}" href="/dashboard/transaksi"
                        aria-expanded="false">
                        <i class="fa-solid fa-circle-dollar-to-slot" aria-hidden="true"></i>
                        <span class="hide-menu">Transaksi</span>
                    </a>
                </li>
                @endcan
                @can('cashier')
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ Request::is('/dashboard/cashier*') ? 'active' : '' }}" href="/dashboard/cashier"
                        aria-expanded="false">
                        <i class="fa-solid fa-cash-register" aria-hidden="true"></i>
                        <span class="hide-menu">Cashier</span>
                    </a>
                </li>
                @endcan
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ Request::is('/dashboard/profile') ? 'active' : '' }}" href="/dashboard/profile"
                        aria-expanded="false">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span class="hide-menu">Profile</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" data-bs-toggle="modal" data-bs-target="#logoutModal" href="#" aria-expanded="false">
                        <i class="fa-solid fa-power-off" aria-hidden="true"></i>
                        <span class="hide-menu">Logout</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>