<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
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
                'search' => request('search'),
                'role_id' => request('role_id'),
                'is_active' => request('is_active')
            ],
        );

        $roles = $this->api_get('admin/role/list/all')->data ?? [];

        return view('users.index', compact('data', 'roles'));
    }

    public function create()
    {
        $roles = $this->api_get('admin/role/list/all')->data ?? [];

        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $res = $this->api_post('admin/users/create', $request->all());

        if ($res->success) {
            session()->put('success', __('dialog_box.create_success', ['name' => 'User']));
            return ok($res->data);
        } else {
            return fail($res->message, 200);
        }
    }
    public function show($id)
    {
        $data = $this->api_get('admin/users/show/' . $id)->data ?? [];

        $roles = $this->api_get('admin/role/list/all')->data ?? [];

        return view('users.edit', compact('data', 'roles'));
    }

    public function update(Request $request, $id)
    {
       $result = $this->api_post('admin/users/update/'. $id, $request->all());
        if ($result->success) {
            session()->put('success', __('dialog_box.update_success', ['name' => 'User']));

            return ok('');
        } else {
            return fail($result->message, 200);
        }
    }

    public function updatePassword(Request $request, $id)
    {
       $result = $this->api_post('admin/users/update_password/'. $id, $request->all());

        if (!$result->success) {
            return back()->with('error', errorMessage($result->message));
        }

        return back()->with('success', 'Change password successfully');
    }

    public function destroy($id)
    {
        $res = $this->api_post('admin/users/delete/'. $id);

        if (!$res->success) {
            return back()->with('error', errorMessage($res->message));
        }

        return back()->with('success', __('dialog_box.delete_success', ['name' => 'User']));

    }
}
