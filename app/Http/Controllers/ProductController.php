<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        list($current_page, $limit, $offset, $search, $order, $sort) = $this->getParams();
        $data = $this->pagination(
            'admin/product/list',
            $limit,
            $offset,
            $search,
            $order,
            $sort,
            url('admin/products'),
            $current_page,
            [
                'enable_status' => request('enable_status')
            ]
        );
        $categories = $this->api_get('admin/category/list/all');
        $product_categories = [];
        if($categories->data){
            $product_categories = $categories->data;
        }
       
        return view('products.index', compact('data','product_categories'));
    }

    public function product()
    {
        $search = request('search');
        $limit = request('limit');
        $offset = request('offset');
        $response_products = $this->api_get('portal/products/list?search='. $search . '&limit=' . $limit . '&offset=' . $offset);
        $products = [];
        if($response_products->data){
            $products = $response_products->data;
        }
        return ok($products);
    }

    public function store(Request $request)
    {
        $result = $this->api_post('admin/product/create', $request->all());
        
        if ($result->success == true) {
            // session()->put('success', __('dialog_box.create_success', ['name' => 'product']));
            return ok('');
        } else {
            return fail($result->message, 200);
        }
    }

    public function update(Request $request, $id){
        $result = $this->api_post('admin/product/update/'. $id, $request->all());

        if ($result->success == true) {
            // session()->put('success', __('dialog_box.update_success', ['name' => 'product']));

            return ok('');
        } else {
            return fail($result->message, 200);
        }
    }

    public function status(Request $request, $id)
    {
        $result = $this->api_post('admin/product/status/'. $id, $request->all());
        if ($result->success == true) {
            session()->put('success', __('dialog_box.update_success', ['name' => 'product']));

            return ok('');
        } else {
            return fail($result->message, 200);
        }
    }

    public function destroy($id)
    {
        $result = $this->api_post('admin/product/delete/'. $id);

        if ($result->success == true) {
            session()->put('success', __('dialog_box.delete_success', ['name' => 'product']));

            return ok('');
        } else {
            return fail($result->message, 200);
        }

    }
}
