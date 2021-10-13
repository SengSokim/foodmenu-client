<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductVariantController extends Controller
{
    public function index(Request $request)
    {
        $data = $this->api_get('portal/product_variants/list?product_id='. $request->product_id);
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

    public function update(Request $request, $id)
    {
        $result = $this->api_post('portal/product_variants/update/'. $id, $request->all());

        if ($result->success == true) {
            session()->put('success', __('dialog_box.update_success', ['name' => 'product variant']));
            
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
