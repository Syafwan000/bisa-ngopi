<?php

namespace App\Http\Controllers;

use App\Models\LogUser;
use Illuminate\Http\Request;

class LogUserController extends Controller
{
    public function index(Request $request)
    {
        $logs = LogUser::latest()->paginate(10);

        if($request['date1'] || $request['date2']) {
            $logs = LogUser::whereBetween('created_at', [$request['date1'], $request['date2']])
                                   ->paginate(10)
                                   ->withQueryString();
        }

        return view('dashboard.admin.log-user', [
            'title' => 'Dashboard | Log Users',
            'logs' => $logs
        ]);
    }
}
