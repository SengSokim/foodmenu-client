<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function telegram()
    {
        return view('setting.telegram.index');
    }
}
