@extends('dashboard.layout.master')

@section('page-dashboard')

<div class="row">
    <div class="col-md-12">
        <div class="white-box">
            <h3 class="box-title">Transaksi</h3>
            <div class="mb-3">
                <a href="/transaksi/export/excel" class="btn btn-info text-white shadow-none"><i class="fa-solid fa-table"></i>&nbsp;&nbsp;Export (Excel)</a>
                <a href="/transaksi/export/pdf" class="btn btn-danger text-white shadow-none ms-2"><i class="fa-solid fa-file-pdf"></i>&nbsp;&nbsp;Export (PDF)</a>
            </div>
            <form>
                <label class="form-label">Filter Data</label>
                <div class="input-group mb-3">
                    <div class="me-2">
                        <input type="date" class="form-control date" name="date1">
                    </div>
                    <span class="m-0 py-2">to</span>
                    <div class="ms-2">
                        <input type="date" class="form-control date" name="date2">
                    </div>
                </div>
                <button type="submit" class="btn btn-secondary text-white shadow-none" type="button" id="button-addon2"><i class="fa-solid fa-magnifying-glass"></i>&nbsp;&nbsp;Cari</button>
            </form>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <h3 class="box-title">Semua Transaksi</h3>
            <div class="table-responsive">
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transaksis as $key => $transaksi)
                            <tr>
                                <td>{{ $transaksis->firstItem() + $key }}</td>
                                <td>{{ $transaksi->nama_pelanggan }}</td>
                                <td>{{ $transaksi->nama_menu }}</td>
                                <td>{{ $transaksi->jumlah }}</td>
                                <td>Rp {{ number_format($transaksi->total_harga) }}</td>
                                <td>{{ $transaksi->nama_pegawai }}</td>
                                <td>{{ $transaksi->created_at }}</td>
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