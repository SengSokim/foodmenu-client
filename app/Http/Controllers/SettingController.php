<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function telegram($id)
    {
        $restaurant = $this->api_get('web/restaurants/show/' . $id)->data ?? [];
        return view('setting.telegram.index',compact('restaurant'));
    }
}
