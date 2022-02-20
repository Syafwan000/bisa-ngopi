<?php

namespace App\Http\Controllers;

use App\Models\LogUser;
use Illuminate\Http\Request;

class LogUserController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.log-user', [
            'title' => 'Dashboard | Log Users',
            'logs' => LogUser::latest()->paginate(10)
        ]);
    }
}
