<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Exports\UsersExport;
use App\Models\LogUser;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::latest()->paginate(10);

        if($request['pencarian']) {
            $users = User::where('nama', 'like', '%' . $request['pencarian'] . '%')
                         ->orWhere('username', 'like', '%' . $request['pencarian'] . '%')
                         ->orWhere('role', 'like', '%' . $request['pencarian'] . '%')
                         ->paginate(10)
                         ->withQueryString();
        }

        return view('dashboard.admin.users', [
            'title' => 'Dashboard | Users',
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.create', [
            'title' => 'Dashboard | Create User'
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
            'nama' => 'required|max:255|min:3',
            'username' => 'required|max:55|min:5|unique:users',
            'role' => 'required',
            'password' => 'required|min:5'
        ]);

        $log_user = [
            'username' => auth()->user()->username,
            'role' => auth()->user()->role,
            'deskripsi' => auth()->user()->username . ' menambahkan user baru dengan username ' . $request['username']
        ];

        $validation['password'] = bcrypt($request['password']);

        User::create($validation);
        LogUser::create($log_user);

        return redirect('/dashboard/users')->with('success', 'Berhasil menambahkan user baru dengan username ' . $request['username']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user = User::where('id', $user->id)->get();

        return view('dashboard.admin.edit', [
            'title' => 'Dashboard | Edit User',
            'user' => $user[0]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validation = $request->validate([
            'nama' => 'required|max:255|min:3',
            'username' => 'required|max:55|min:5',
            'role' => 'required',
            'password' => 'min:5'
        ]);

        $log_user = [
            'username' => auth()->user()->username,
            'role' => auth()->user()->role,
            'deskripsi' => auth()->user()->username . ' merubah user dengan username ' . $request['username']
        ];

        if($request['password']) {
            $validation['password'] = bcrypt($request['password']);
        }

        User::where('id', $user->id)->update($validation);
        LogUser::create($log_user);

        return redirect('/dashboard/users')->with('success', 'Berhasil mengubah user dengan username ' . $request['username']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $log_user = [
            'username' => auth()->user()->username,
            'role' => auth()->user()->role,
            'deskripsi' => auth()->user()->username . ' menghapus user dengan username ' . $user->username
        ];

        User::destroy($user->id);
        LogUser::create($log_user);

        return redirect('/dashboard/users')->with('success', 'Berhasil menghapus user dengan username ' . $user->username);
    }

    public function exportExcel() 
    {
        $log_user = [
            'username' => auth()->user()->username,
            'role' => auth()->user()->role,
            'deskripsi' => auth()->user()->username . ' melakukan ekspor (Excel) data user'
        ];

        LogUser::create($log_user);

        return Excel::download(new UsersExport, Str::random(10) . '.xlsx');
    }

    public function exportPDF() 
    {
        $log_user = [
            'username' => auth()->user()->username,
            'role' => auth()->user()->role,
            'deskripsi' => auth()->user()->username . ' melakukan ekspor (PDF) data user'
        ];

        LogUser::create($log_user);

        $data_pegawai = User::where('username', auth()->user()->username)->get();
        $users = User::all();

        $data = [
            'nama_pegawai' => $data_pegawai[0]->nama,
            'role' => $data_pegawai[0]->role,
            'users' => $users
        ];

        $pdf = PDF::loadView('pdf.users-pdf', $data);
        return $pdf->download(Str::random(10) . '.pdf');
    }
}
