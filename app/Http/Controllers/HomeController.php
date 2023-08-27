<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        list($current_page, $limit, $offset, $search, $order, $sort) = $this->getParams();

        $data = $this->api_get('admin/category/list/web');
        // self::clearAuth();

        return view('home.main',compact('data'));
    }
}
