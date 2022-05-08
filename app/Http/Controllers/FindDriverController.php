<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FindDriverController extends Controller
{
    public function list() {
        list($current_page, $limit, $offset, $search, $order, $sort) = $this->getParams();

        $data = $this->pagination(
            'portal/drivers/list',
            $limit,
            $offset,
            $search,
            $order,
            $sort,
            url('admin/drivers'),
            $current_page
        );
        
        return view('drivers.index', compact('data'));
    }
}