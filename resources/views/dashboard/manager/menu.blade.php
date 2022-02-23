@extends('dashboard.layout.master')

@section('page-dashboard')

<div class="row">
    <div class="col-md-12">
        <div class="white-box">
            <h3 class="box-title">Manager Dashboard</h3>
            <div class="mb-3">
                <a href="/dashboard/menu/create" class="btn btn-success text-white shadow-none"><i class="fa-brands fa-readme"></i>&nbsp;&nbsp;Tambah Menu</a>
                <a href="/menu/export/excel" class="btn btn-info text-white shadow-none ms-2"><i class="fa-solid fa-table"></i>&nbsp;&nbsp;Export (Excel)</a>
                <a href="/menu/export/pdf" class="btn btn-danger text-white shadow-none ms-2"><i class="fa-solid fa-file-pdf"></i>&nbsp;&nbsp;Export (PDF)</a>
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
            <h3 class="box-title">Tabel Menu</h3>
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
                            <th class="border-top-0">Nama Menu</th>
                            <th class="border-top-0">Harga</th>
                            <th class="border-top-0">Deskripsi</th>
                            <th class="border-top-0">Ketersediaan</th>
                            <th class="border-top-0">Tanggal Ditambahkan</th>
                            <th class="border-top-0 text-white">#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($menus as $key => $menu)
                            <tr>
                                <td>{{ $menus->firstItem() + $key }}</td>
                                <td>{{ $menu->nama_menu }}</td>
                                <td>Rp {{ number_format($menu->harga) }}</td>
                                <td>{{ $menu->deskripsi }}</td>
                                <td>{{ number_format($menu->ketersediaan) }}</td>
                                <td>{{ $menu->created_at }}</td>
                                <td>
                                    <a href="/dashboard/menu/{{ $menu->id }}/edit" class="btn btn-primary shadow-none">Edit</a>
                                    <a href="#" class="btn btn-danger text-white shadow-none" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $menu->id }}">Hapus</a>
                                    <form action="/dashboard/menu/{{ $menu->id }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <div class="modal fade" id="deleteModal{{ $menu->id }}" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                  <label class="mb-2">Apakah anda yakin ingin menghapus menu berikut ?</label>
                                                  <p class="m-0"><b>Nama Menu</b> {{ $menu->nama_menu }}</p>
                                                  <p class="m-0"><b>Harga</b> Rp {{ number_format($menu->harga) }}</p>
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
    {{ $menus->onEachSide(0)->links() }}
</div>

@endsection