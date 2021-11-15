<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TableController extends Controller
{
    public function index() {
        return view('tables.index');
    }
    public function qr_generate(){
        return view('tables.qr-code');
    }
}
