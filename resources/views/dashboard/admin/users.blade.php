@extends('dashboard.layout.master')

@section('page-dashboard')

<div class="row">
    <div class="col-md-12">
        <div class="white-box">
            <h3 class="box-title">Admin Dashboard</h3>
            <div class="mb-3">
                <a href="/dashboard/users/create" class="btn btn-success text-white shadow-none"><i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;Tambah User</a>
                <a href="/users/export/excel" class="btn btn-info text-white shadow-none ms-2"><i class="fa-solid fa-table"></i>&nbsp;&nbsp;Export (Excel)</a>
                <a href="/users/export/pdf" class="btn btn-danger text-white shadow-none ms-2"><i class="fa-solid fa-file-pdf"></i>&nbsp;&nbsp;Export (PDF)</a>
            </div>
            <form>
                <label class="form-label">Filter Data</label>
                <div class="mb-3">
                    <input type="text" class="form-control pencarian" name="pencarian" placeholder="Pencarian" autocomplete="off">
                </div>
                <button type="submit" class="btn btn-secondary text-white shadow-none" type="button" id="button-addon2"><i class="fa-solid fa-magnifying-glass"></i>&nbsp;&nbsp;Cari</button>
            </form>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <h3 class="box-title">Tabel Users</h3>
            <div class="table-responsive">
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        <i class="fa-solid fa-circle-check"></i>&nbsp;&nbsp;{{ session('success') }}
                    </div>
                @endif
                <table class="table text-nowrap">
                    <thead>
                        <tr>
                            <th class="border-top-0">No</th>
                            <th class="border-top-0">Nama</th>
                            <th class="border-top-0">Username</th>
                            <th class="border-top-0">Role</th>
                            <th class="border-top-0">Tanggal Dibuat</th>
                            <th class="border-top-0 text-white">#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $key => $user)
                            <tr>
                                <td>{{ $users->firstItem() + $key }}</td>
                                <td>{{ $user->nama }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->role }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>
                                    <a href="/dashboard/users/{{ $user->id }}/edit" class="btn btn-primary shadow-none">Edit</a>
                                    <a href="#" class="btn btn-danger text-white shadow-none" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $user->id }}">Hapus</a>
                                    <form action="/dashboard/users/{{ $user->id }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <div class="modal fade" id="deleteModal{{ $user->id }}" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                  <label class="mb-2">Apakah anda yakin ingin menghapus user berikut ?</label>
                                                  <p class="m-0"><b>Nama</b> {{ $user->nama }}</p>
                                                  <p class="m-0"><b>Username</b> {{ $user->username }}</p>
                                                  <p class="m-0"><b>Role</b> {{ $user->role }}</p>
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary text-white shadow-none" data-bs-dismiss="modal">Tidak</button>
                                                  <button type="submit" class="btn btn-danger text-white shadow-none">Hapus</button>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{ $users->onEachSide(0)->links() }}
</div>

@endsection