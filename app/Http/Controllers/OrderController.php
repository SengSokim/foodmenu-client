<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class OrderController extends Controller
{
    public function index()
    {
        list($current_page, $limit, $offset, $search, $order, $sort) = $this->getParams();

        $data = $this->pagination(
            'admin/order/list',
            $limit,
            $offset,
            $search,
            $order,
            $sort,
            url('admin/orders'),
            $current_page,
            [
                'search' => request('search'),
                'status' => request('status'),
                'from_date' => request('from_date'),
                'to_date' => request('to_date'),
            ]
        );

        return view('orders.index', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $result = $this->api_post('portal/orders/update/'. $id, $request->all());
        if ($result->success == true) {
            session()->put('success', __('dialog_box.update_success', ['name' => 'order']));
            return redirect()->route('orders.index')->with('success','Order updated successfully');

        } else {
            return fail($result->message, 200);
        }
    }

    public function deleteOrder($id)
    {
        try {
            $result = $this->api_post('portal/orders/delete/'. $id);
            if ($result->success == false) {
                $msg = self::getErrorMessage($result->message);
                return back()->with('error', $msg);
            }

            return back()->with('success', __('dialog_box.delete_success', ['name' => 'order']));
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage())->withInput();
        }
    }

    public function deleteProduct($id)
    {
        try {
            $result = $this->api_post('portal/orders/product/delete/'. $id);
            if ($result->success == false) {
                $msg = self::getErrorMessage($result->message);
                return back()->with('error', $msg);
            }

            return back()->with('success', __('dialog_box.delete_success', ['name' => 'product']));
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage())->withInput();
        }
    }
}
