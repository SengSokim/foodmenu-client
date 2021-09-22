<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function view()
    {
        $result = $this->api_get('portal/auth/profile/');
        dd($result);
    }
}
