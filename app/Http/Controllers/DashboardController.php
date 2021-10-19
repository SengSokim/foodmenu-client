<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = $this->api_get('portal/dashboard');

        return view('dashboard', compact('data'));
    }
}
