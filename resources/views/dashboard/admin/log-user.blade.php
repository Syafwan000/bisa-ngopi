@extends('dashboard.layout.master')

@section('page-dashboard')

<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <h3 class="box-title">Log Users</h3>
            <div class="table-responsive">
                <table class="table text-nowrap">
                    <thead>
                        <tr>
                            <th class="border-top-0">No</th>
                            <th class="border-top-0">Username</th>
                            <th class="border-top-0">Role</th>
                            <th class="border-top-0">Deskripsi</th>
                            <th class="border-top-0">Tanggal</th>
                            <th class="border-top-0">Waktu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($logs as $key => $log)
                            <tr>
                                <td>{{ $logs->firstItem() + $key }}</td>
                                <td>{{ $log->username }}</td>
                                <td>{{ $log->role }}</td>
                                <td>{{ $log->deskripsi }}</td>
                                <td>{{ $log->created_at->toDateString() }}</td>
                                <td>{{ $log->created_at->diffForHumans() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{ $logs->onEachSide(0)->links() }}
</div>

@endsection