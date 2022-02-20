@extends('dashboard.layout.master')

@section('page-dashboard')

<div class="row justify-content-center">
    <div class="col-lg-4 col-md-12">
        <div class="white-box analytics-info">
            <h3 class="box-title">Total Admin</h3>
            <ul class="list-inline two-part d-flex align-items-center mb-0">
                <li>
                    <div class="icon-card">
                        <i class="fa-solid fa-user-gear"></i>
                    </div>
                </li>
                <li class="ms-auto"><span class="counter text-success">{{ $total_admin }}</span></li>
            </ul>
        </div>
    </div>
    <div class="col-lg-4 col-md-12">
        <div class="white-box analytics-info">
            <h3 class="box-title">Total Manager</h3>
            <ul class="list-inline two-part d-flex align-items-center mb-0">
                <li>
                    <div class="icon-card">
                        <i class="fa-solid fa-user-tie"></i>
                    </div>
                </li>
                <li class="ms-auto"><span class="counter text-purple">{{ $total_manager }}</span></li>
            </ul>
        </div>
    </div>
    <div class="col-lg-4 col-md-12">
        <div class="white-box analytics-info">
            <h3 class="box-title">Total Cashier</h3>
            <ul class="list-inline two-part d-flex align-items-center mb-0">
                <li>
                    <div class="icon-card">
                        <i class="fa-solid fa-user-pen"></i>
                    </div>
                </li>
                <li class="ms-auto"><span class="counter text-info">{{ $total_cashier }}</span>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <h3 class="box-title">Basic Table</h3>
            <div class="table-responsive">
                <table class="table text-nowrap">
                    <thead>
                        <tr>
                            <th class="border-top-0">#</th>
                            <th class="border-top-0">First Name</th>
                            <th class="border-top-0">Last Name</th>
                            <th class="border-top-0">Username</th>
                            <th class="border-top-0">Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Deshmukh</td>
                            <td>Prohaska</td>
                            <td>@Genelia</td>
                            <td>admin</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Deshmukh</td>
                            <td>Gaylord</td>
                            <td>@Ritesh</td>
                            <td>member</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Sanghani</td>
                            <td>Gusikowski</td>
                            <td>@Govinda</td>
                            <td>developer</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Roshan</td>
                            <td>Rogahn</td>
                            <td>@Hritik</td>
                            <td>supporter</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Joshi</td>
                            <td>Hickle</td>
                            <td>@Maruti</td>
                            <td>member</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Nigam</td>
                            <td>Eichmann</td>
                            <td>@Sonu</td>
                            <td>supporter</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection