@extends('dashboard.layout.master')

@section('page-dashboard')

<div class="row">
    <div class="col-md-12">
        <div class="white-box">
            <div class="mb-3">
                <a href="/dashboard/cashier/create" class="btn btn-success text-white shadow-none">Cashier</a>
                <a href="/cashier/export" class="btn btn-info text-white shadow-none ms-2">Export (Excel)</a>
            </div>
            <form>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="pencarian" placeholder="Pencarian" autocomplete="off">
                    <button type="submit" class="btn btn-secondary text-white shadow-none" type="button" id="button-addon2">Cari</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <h3 class="box-title">Tabel Transaksi</h3>
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
                            <th class="border-top-0">Nama Pelanggan</th>
                            <th class="border-top-0">Nama Menu</th>
                            <th class="border-top-0">Jumlah</th>
                            <th class="border-top-0">Total Harga</th>
                            <th class="border-top-0">Nama Pegawai</th>
                            <th class="border-top-0">Tanggal Transaksi</th>
                            <th class="border-top-0 text-white">#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transaksis as $key => $transaksi)
                            <tr>
                                <td>{{ $transaksis->firstItem() + $key }}</td>
                                <td>{{ $transaksi->nama_pelanggan }}</td>
                                <td>{{ $transaksi->nama_menu }}</td>
                                <td>{{ number_format($transaksi->jumlah) }}</td>
                                <td>Rp {{ number_format($transaksi->total_harga) }}</td>
                                <td>{{ $transaksi->nama_pegawai }}</td>
                                <td>{{ $transaksi->created_at }}</td>
                                <td>
                                    <a href="/dashboard/cashier/{{ $transaksi->id }}/edit" class="btn btn-primary shadow-none">Edit</a>
                                    <a href="#" class="btn btn-danger text-white shadow-none" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $transaksi->id }}">Hapus</a>
                                    <form action="/dashboard/cashier/{{ $transaksi->id }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <div class="modal fade" id="deleteModal{{ $transaksi->id }}" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                  <label class="mb-2">Apakah anda yakin ingin menghapus transaksi berikut ?</label>
                                                  <p class="text-nama m-0"><b>Nama Pelanggan</b> {{ $transaksi->nama_pelanggan }}</p>
                                                  <p class="text-nama m-0"><b>Menu Pesanan</b> {{ $transaksi->nama_menu }}</p>
                                                  <p class="text-username m-0"><b>Total Harga</b> Rp {{ number_format($transaksi->total_harga) }}</p>
                                                  <p class="text-nama m-0"><b>Nama Pegawai</b> {{ $transaksi->nama_pegawai }}</p>
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
    {{ $transaksis->onEachSide(0)->links() }}
</div>

@endsection