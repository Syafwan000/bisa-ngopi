<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('dashboard.profile', [
            'title' => 'Dashboard | Profile'
        ]);
    }
}
