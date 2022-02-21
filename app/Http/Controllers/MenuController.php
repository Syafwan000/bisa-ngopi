<?php

namespace App\Http\Controllers;

use App\Models\LogUser;
use App\Exports\MenuExport;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;


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

        return view('dashboard.manager.menu', [
            'title' => 'Dashboard | Menu',
            'menus' => $menus
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

        return redirect('/dashboard/menu')->with('success', 'Berhasil Menambahkan Menu Baru');
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
            'deskripsi' => auth()->user()->username . ' merubah menu dengan nama menu ' . $request['nama_menu']
        ];

        Menu::where('id', $menu->id)->update($validation);
        LogUser::create($log_user);

        return redirect('/dashboard/menu')->with('success', 'Berhasil Mengubah Menu');
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
            'deskripsi' => auth()->user()->username . ' menghapus menu dengan nama menu ' . $menu->username
        ];

        Menu::destroy($menu->id);
        LogUser::create($log_user);

        return redirect('/dashboard/menu')->with('success', 'Berhasil Menghapus Menu');
    }

    public function export() 
    {
        $log_user = [
            'username' => auth()->user()->username,
            'role' => auth()->user()->role,
            'deskripsi' => auth()->user()->username . ' melakukan ekspor data menu'
        ];

        LogUser::create($log_user);

        return Excel::download(new MenuExport, Str::random(10) . '.xlsx');
    }
}
