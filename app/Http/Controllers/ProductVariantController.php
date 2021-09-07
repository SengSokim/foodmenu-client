<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductVariantController extends Controller
{
    public function index()
    {
        return view('products.variants.index');
    }
}
