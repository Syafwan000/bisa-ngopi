<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $total_admin = User::where('role', 'Admin')->get();
        $total_manager = User::where('role', 'Manager')->get();
        $total_cashier = User::where('role', 'Cashier')->get();

        return view('dashboard.dashboard', [
            'title' => 'Dashboard',
            'total_admin' => count($total_admin),
            'total_manager' => count($total_manager),
            'total_cashier' => count($total_cashier)
        ]);
    }
}
