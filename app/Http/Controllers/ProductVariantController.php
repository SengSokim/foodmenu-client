<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductVariantController extends Controller
{
    public function index(Request $request)
    {
         list($current_page, $limit, $offset, $search, $order, $sort) = $this->getParams();

        $data = $this->pagination(
            'portal/product_variants/list?product_id='. $request->product_id,
            $limit,
            $offset,
            $search,
            $order,
            $sort,
            url('portal/product-varirants'),
            $current_page,
            [
                'enable_status' => request('enable_status')
            ]
        );
        return view('products.variants.index', compact('data'));
    }

    public function store(Request $request)
    {
        $result = $this->api_post('portal/product_variants/create', $request->all());
        if ($result->success == true) {
            session()->put('success', __('dialog_box.create_success', ['name' => 'product variant']));

            return ok('');
        } else {
            return fail($result->message, 200);
        }
    }

    public function destroy($id)
    {
        $result = $this->api_post('portal/product_variants/delete/'. $id);

        if ($result->success == true) {
            session()->put('success', __('dialog_box.delete_success', ['name' => 'product variant']));

            return ok('');
        } else {
            return fail($result->message, 200);
        }

    }
}
