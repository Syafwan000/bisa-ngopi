<?php

namespace App\Http\Controllers;

use App\Models\LogUser;
use App\Exports\MenuExport;
use App\Exports\AllTransaksiExport;
use App\Models\Menu;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Session;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $menus = Menu::latest()->paginate(10);

        if($request['pencarian']) {
            $menus = Menu::where('nama_menu', 'like', '%' . $request['pencarian'] . '%')
                         ->orWhere('harga', 'like', '%' . $request['pencarian'] . '%')
                         ->orWhere('deskripsi', 'like', '%' . $request['pencarian'] . '%')
                         ->orWhere('ketersediaan', 'like', '%' . $request['pencarian'] . '%')
                         ->paginate(10)
                         ->withQueryString();
        }

        Session::put('menus', $menus);

        return view('dashboard.manager.menu', [
            'title' => 'Dashboard | Menu',
            'menus' => $menus
        ]);
    }

    public function transaksi(Request $request)
    {
        $transaksis = Transaksi::latest()->paginate(10);

        if($request['date1'] || $request['date2']) {
            $transaksis = Transaksi::whereBetween('created_at', [$request['date1'], $request['date2']])
                                   ->paginate(10)
                                   ->withQueryString();
        }

        Session::put('all_transaksis', $transaksis);

        return view('dashboard.manager.transaksi', [
            'title' => 'Dashboard | Transaksi',
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
        return view('dashboard.manager.create', [
            'title' => 'Dashboard | Create Menu'
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
            'nama_menu' => 'required|max:255|min:3',
            'harga' => 'required',
            'deskripsi' => 'required|max:500|min:15',
            'ketersediaan' => 'required'
        ]);

        $log_user = [
            'username' => auth()->user()->username,
            'role' => auth()->user()->role,
            'deskripsi' => auth()->user()->username . ' menambahkan menu baru dengan nama ' . $request['nama_menu']
        ];

        Menu::create($validation);
        LogUser::create($log_user);

        return redirect('/dashboard/menu')->with('success', 'Berhasil menambahkan menu baru dengan nama ' . $request['nama_menu']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        $menu = Menu::where('id', $menu->id)->get();

        return view('dashboard.manager.edit', [
            'title' => 'Dashboard | Edit Menu',
            'menu' => $menu[0]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $validation = $request->validate([
            'nama_menu' => 'required|max:255|min:3',
            'harga' => 'required',
            'deskripsi' => 'required|max:500|min:15',
            'ketersediaan' => 'required'
        ]);

        $log_user = [
            'username' => auth()->user()->username,
            'role' => auth()->user()->role,
            'deskripsi' => auth()->user()->username . ' merubah menu dengan nama ' . $request['nama_menu']
        ];

        Menu::where('id', $menu->id)->update($validation);
        LogUser::create($log_user);

        return redirect('/dashboard/menu')->with('success', 'Berhasil mengubah menu dengan nama ' . $request['nama_menu']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $log_user = [
            'username' => auth()->user()->username,
            'role' => auth()->user()->role,
            'deskripsi' => auth()->user()->username . ' menghapus menu dengan nama ' . $menu->nama_menu
        ];

        Menu::destroy($menu->id);
        LogUser::create($log_user);

        return redirect('/dashboard/menu')->with('success', 'Berhasil menghapus menu dengan nama ' . $menu->nama_menu);
    }

    public function exportExcel() 
    {
        $log_user = [
            'username' => auth()->user()->username,
            'role' => auth()->user()->role,
            'deskripsi' => auth()->user()->username . ' melakukan ekspor (Excel) data menu'
        ];

        LogUser::create($log_user);

        return Excel::download(new MenuExport, Str::random(10) . '.xlsx');
    }

    public function exportPDF() 
    {
        $log_user = [
            'username' => auth()->user()->username,
            'role' => auth()->user()->role,
            'deskripsi' => auth()->user()->username . ' melakukan ekspor (PDF) data menu'
        ];

        LogUser::create($log_user);

        $data_pegawai = User::where('username', auth()->user()->username)->get();
        $menus = Session::get('menus');

        $data = [
            'nama_pegawai' => $data_pegawai[0]->nama,
            'role' => $data_pegawai[0]->role,
            'menus' => $menus
        ];

        $pdf = PDF::loadView('pdf.menu-pdf', $data);
        return $pdf->download(Str::random(10) . '.pdf');
    }

    public function transaksiExcel() 
    {
        $log_user = [
            'username' => auth()->user()->username,
            'role' => auth()->user()->role,
            'deskripsi' => auth()->user()->username . ' melakukan ekspor (Excel) semua data transaksi pemesanan'
        ];

        LogUser::create($log_user);

        return Excel::download(new AllTransaksiExport, Str::random(10) . '.xlsx');
    }

    public function transaksiPDF() 
    {
        $log_user = [
            'username' => auth()->user()->username,
            'role' => auth()->user()->role,
            'deskripsi' => auth()->user()->username . ' melakukan ekspor (PDF) semua data transaksi pemesanan'
        ];

        LogUser::create($log_user);

        $data_pegawai = User::where('username', auth()->user()->username)->get();
        $transaksis = Session::get('all_transaksis');

        $data = [
            'nama_pegawai' => $data_pegawai[0]->nama,
            'role' => $data_pegawai[0]->role,
            'transaksis' => $transaksis
        ];

        $pdf = PDF::loadView('pdf.transaksi-pdf', $data);
        return $pdf->download(Str::random(10) . '.pdf');
    }
}
