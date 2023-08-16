<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        list($current_page, $limit, $offset, $search, $order, $sort) = $this->getParams();

        $data = $this->pagination(
            'admin/category/list/web',
            $limit,
            $offset,
            $search,
            $order,
            $sort,
            url(''),
            $current_page
        );
        return view('home.main',compact('data'));
    }
}
