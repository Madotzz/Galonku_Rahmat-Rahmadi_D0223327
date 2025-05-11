<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;

        // Redirect ke view dashboard sesuai role
        if ($role === 'admin') {
            return view('admin');
        } elseif ($role === 'customer') {
            return view('customer');
        } elseif ($role === 'kurir') {
            return view('kurir');
        } else {
            abort(403, 'Role tidak dikenali.');
        }
    }
}
