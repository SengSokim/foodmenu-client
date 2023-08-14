<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function index(){
        list($current_page, $limit, $offset, $search, $order, $sort) = $this->getParams();
        $data = $this->pagination(
            'admin/category/list',
            $limit,
            $offset,
            $search,
            $order,
            $sort,
            url('admin/categories'),
            $current_page,
            [
                'enable_status' => request('enable_status')
            ]
        );
        return view('categories.index', compact('data'));
    }

    public function store(Request $request)
    {
        $result = $this->api_post('admin/category/create', $request->all());
        if ($result->success == true) {
            session()->put('success', __('dialog_box.create_success', ['name' => 'Category']));
            return ok('');
        } else {
            return fail($result->message, 200);
        }
    }

    public function update(Request $request, $id){
        $result = $this->api_post('admin/category/update/'. $id, $request->all());

        if ($result->success == true) {
            session()->put('success', __('dialog_box.update_success', ['name' => 'category']));

            return ok('');
        } else {
            return fail($result->message, 200);
        }
    }

    public function destroy($id)
    {
        $result = $this->api_post('admin/category/delete/'. $id);

        if ($result->success == true) {
            session()->put('success', __('dialog_box.delete_success', ['name' => 'category']));

            return ok('');
        } else {
            return fail($result->message, 200);
        }

    }
}
