<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        list($current_page, $limit, $offset, $search, $order, $sort) = $this->getParams();
        $data = $this->pagination(
            'admin/users/list',
            $limit,
            $offset,
            $search,
            $order,
            $sort,
            url('admin/users'),
            $current_page,
            [
                'enable_status' => request('enable_status')
            ]

        );
        // dd($data);

        return view('users.index', compact('data'));
    }

    public function store(Request $request) {
        $result = $this->api_post('admin/users/create', $request->all());

        if($result->success == true) {
            session()->put('success', __('dialog_box.create_success', ['name' => 'User']));
            return ok($result);
        } else {
            return fail($result->message, 200);
        }
    }

    public function update(Request $request, $id) {
        $result = $this->api_post('admin/users/update/' . $id, $request->all());
        // dd($request);
        if($result->success== true) {
            session()->put('success', __('dialog_box.update_success', ['name' => 'User']));
            return ok($result);
        } else {
            return fail($result->message, 200);
        }
    }
    public function destroy($id) {

        $result = $this->api_post('admin/users/delete/' . $id);

        if($result->success == true) {
            session()->put('success', __('dialog_box.delete_success', ['name' => 'User']));
            return ok($result);
        } else {
            return fail($result->message, 200);
        }
    }

}
