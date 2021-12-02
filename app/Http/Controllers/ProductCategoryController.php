<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function index(){
        list($current_page, $limit, $offset, $search, $order, $sort) = $this->getParams();

        $data = $this->pagination(
            'portal/product_categories/list',
            $limit,
            $offset,
            $search,
            $order,
            $sort,
            url('admin/product-categories'),
            $current_page,
            [
                'enable_status' => request('enable_status')
            ]
        );
        return view('product_categories.index', compact('data'));
    }

    public function store(Request $request)
    {
        $result = $this->api_post('portal/product_categories/create', $request->all());
        if ($result->success == true) {
            session()->put('success', __('dialog_box.create_success', ['name' => 'product category']));
            return ok('');
        } else {
            return fail($result->message, 200);
        } 
    }

    public function update(Request $request, $id){
        $result = $this->api_post('portal/product_categories/update/'. $id, $request->all());

        if ($result->success == true) {
            session()->put('success', __('dialog_box.update_success', ['name' => 'product category']));

            return ok('');
        } else {
            return fail($result->message, 200);
        }
    }

    public function destroy($id)
    {
        $result = $this->api_post('portal/product_categories/delete/'. $id);

        if ($result->success == true) {
            session()->put('success', __('dialog_box.delete_success', ['name' => 'product category']));

            return ok('');
        } else {
            return fail($result->message, 200);
        }

    }
}
