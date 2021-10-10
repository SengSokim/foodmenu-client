<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $response_product_categories = $this->api_get('portal/product_categories/list_all');
        $product_categories = [];
        if($response_product_categories->data){
            $product_categories = $response_product_categories->data;
        }
        return view('products.index', compact('product_categories'));
    }

    public function product()
    {
        $response_products = $this->api_get('portal/products/list');
        $products = [];
        if($response_products->data){
            $products = $response_products->data;
        }
        return ok($products);
    }

    public function store(Request $request)
    {
        $result = $this->api_post('portal/products/create', $request->all());
        if ($result->success == true) {
            session()->put('success', __('dialog_box.create_success', ['name' => 'product']));
            return ok('');
        } else {
            return fail($result->message, 200);
        } 
    }

    public function update(Request $request, $id){
        $result = $this->api_post('portal/products/update/'. $id, $request->all());

        if ($result->success == true) {
            session()->put('success', __('dialog_box.update_success', ['name' => 'product']));

            return ok('');
        } else {
            return fail($result->message, 200);
        }
    }

    public function status(Request $request, $id)
    {
        $result = $this->api_post('portal/products/status/'. $id, $request->all());
        if ($result->success == true) {
            session()->put('success', __('dialog_box.update_success', ['name' => 'product']));

            return ok('');
        } else {
            return fail($result->message, 200);
        }
    }

    public function destroy($id)
    {
        $result = $this->api_post('portal/products/delete/'. $id);

        if ($result->success == true) {
            session()->put('success', __('dialog_box.delete_success', ['name' => 'product']));

            return ok('');
        } else {
            return fail($result->message, 200);
        }

    }
}
