<?php

namespace App\Http\Controllers;

use App\Models\LogUser;
use App\Exports\TransaksiExport;
use App\Models\Menu;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Session;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $transaksis = Transaksi::where('nama_pegawai', auth()->user()->nama)->latest()->paginate(10);
        
        if($request['date1'] || $request['date2']) {
            $transaksis = Transaksi::where('nama_pegawai', auth()->user()->nama)
                                   ->whereBetween('created_at', [$request['date1'], $request['date2']])
                                   ->paginate(10)
                                   ->withQueryString();
        }

        Session::put('transaksis', $transaksis);

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

        $menu = Menu::where('nama_menu', $request['nama_menu'])->get();

        if($menu[0]->ketersediaan < $request['jumlah']) {
            return redirect('/dashboard/cashier')->with('failed', 'Ketersediaan menu tidak mencukupi permintaan pesanan');
        } else {
            $ketersediaan_baru = $menu[0]->ketersediaan - $request['jumlah'];

            $menu_baru = [
                'nama_menu' => $menu[0]->nama_menu,
                'harga' => $menu[0]->harga,
                'deskripsi' => $menu[0]->deskripsi,
                'ketersediaan' => $ketersediaan_baru
            ];

            Menu::where('nama_menu', $request['nama_menu'])->update($menu_baru);
        }

        Transaksi::create($validation);
        LogUser::create($log_user);

        return redirect('/dashboard/cashier')->with('success', 'Berhasil melakukan pemesanan atas nama ' . $request['nama_pelanggan']);
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

        return redirect('/dashboard/cashier')->with('success', 'Berhasil mengubah transaksi atas nama ' . $request['nama_pelanggan']);
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

        return redirect('/dashboard/cashier')->with('success', 'Berhasil menghapus transaksi atas nama ' . $transaksi[0]->nama_pelanggan);
    }

    public function exportExcel() 
    {
        $log_user = [
            'username' => auth()->user()->username,
            'role' => auth()->user()->role,
            'deskripsi' => auth()->user()->username . ' melakukan ekspor (Excel) data transaksi pemesanan'
        ];

        LogUser::create($log_user);

        return Excel::download(new TransaksiExport, Str::random(10) . '.xlsx');
    }

    public function exportPDF() 
    {
        $log_user = [
            'username' => auth()->user()->username,
            'role' => auth()->user()->role,
            'deskripsi' => auth()->user()->username . ' melakukan ekspor (PDF) data transaksi pemesanan'
        ];

        LogUser::create($log_user);

        $data_pegawai = User::where('username', auth()->user()->username)->get();
        $data_transaksi = Session::get('transaksis');

        $data = [
            'nama_pegawai' => $data_pegawai[0]->nama,
            'role' => $data_pegawai[0]->role,
            'transaksis' => $data_transaksi
        ];

        $pdf = PDF::loadView('pdf.cashier-pdf', $data);
        return $pdf->download(Str::random(10) . '.pdf');
    }
}
