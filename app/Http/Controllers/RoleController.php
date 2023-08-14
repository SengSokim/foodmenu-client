<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index() {
        list($current_page, $limit, $offset, $search, $order, $sort) = $this->getParams();
        $data = $this->pagination(
            'admin/role/list',
            $limit,
            $offset,
            $search,
            $order,
            $sort,
            url('admin/roles'),
           $current_page,
            [

            ]
        );

        return view('roles.index', compact('data'));
    }

    public function create() {
        return view('roles.create');
    }

    public function store(Request $request) {

        $res = $this->api_post('admin/role/create', $request->all());

        if (!$res->success) return fail($res->message, 200);

        session()->put('success', __('dialog_box.create_success', ['name' => 'Role']));
        return ok($res->data);
    }

    public function show($id) {

        $data = $this->api_get('admin/role/show/'.$id)->data ?? [];

        return view('roles.edit', compact('data'));
    }

    public function update(Request $request, $id) {

        $res = $this->api_post('admin/role/update/'.$id, $request->all());

        if (!$res->success)  return fail($res->message, 200);

        session()->put('success', __('dialog_box.update_success', ['name' => 'Role']));
        return ok($res->data);
    }

    public function destroy($id) {

        try {
            $res = $this->api_post('admin/role/delete/'.$id);

            if (!$res->success) return back()->with('error', errorMessage($res->message));
            return back()->with('success', __('dialog_box.delete_success', ['name' => 'Role']));

        } catch (Exception $e) {
            return back()->with('error', $e->getMessage())->withInput();
        }
    }
}
