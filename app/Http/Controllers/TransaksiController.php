<?php

namespace App\Http\Controllers;

use App\Models\LogUser;
use App\Models\Menu;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksis = Transaksi::where('nama_pegawai', auth()->user()->nama)->latest()->paginate(10);

        return view('dashboard.cashier.cashier', [
            'title' => 'Dashboard | Cashier',
            'transaksis' => $transaksis
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::all();

        return view('dashboard.cashier.create', [
            'title' => 'Dashboard | Cashier',
            'menus' => $menus
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'nama_pelanggan' => 'required|max:255|min:3',
            'nama_menu' => 'required',
            'jumlah' => 'required',
            'total_harga' => 'required',
            'nama_pegawai' => 'required'
        ]);

        $log_user = [
            'username' => auth()->user()->username,
            'role' => auth()->user()->role,
            'deskripsi' => auth()->user()->username . ' melayani pelanggan atas nama ' . $request['nama_pelanggan']
        ];

        Transaksi::create($validation);
        LogUser::create($log_user);

        return redirect('/dashboard/cashier')->with('success', 'Berhasil Melakukan Pemesanan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaksi = Transaksi::where('id', $id)->get();

        return view('dashboard.cashier.edit', [
            'title' => 'Dashboard | Cashier',
            'transaksi' => $transaksi[0]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'nama_pelanggan' => 'required|max:255|min:3',
            'nama_menu' => 'required',
            'jumlah' => 'required',
            'total_harga' => 'required',
            'nama_pegawai' => 'required'
        ]);

        $log_user = [
            'username' => auth()->user()->username,
            'role' => auth()->user()->role,
            'deskripsi' => auth()->user()->username . ' merubah transaksi atas nama ' . $request['nama_pelanggan']
        ];

        Transaksi::where('id', $id)->update($validation);
        LogUser::create($log_user);

        return redirect('/dashboard/cashier')->with('success', 'Berhasil Mengubah Transaksi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi = Transaksi::where('id', $id)->get();

        $log_user = [
            'username' => auth()->user()->username,
            'role' => auth()->user()->role,
            'deskripsi' => auth()->user()->username . ' menghapus transaksi atas nama ' . $transaksi[0]->nama_pelanggan
        ];

        Transaksi::destroy($id);
        LogUser::create($log_user);

        return redirect('/dashboard/cashier')->with('success', 'Berhasil Menghapus Transaksi');
    }
}
