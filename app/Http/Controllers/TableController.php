<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class TableController extends Controller
{
    public function index() {
        list($current_page, $limit, $offset, $search, $order, $sort) = $this->getParams();
        $data = $this->pagination(
            'portal/tables/list',
            $limit,
            $offset,
            $search,
            $order,
            $sort,
            url('admin/tables'),
            $current_page,
            [
                'enable_status' => request('enable_status')
            ]
        );
        return view('tables.index', compact('data'));
    }
    public function store(Request $request){
        $result = $this->api_post('portal/tables/create', $request->all());
        if($result->success == true){
            session()->put('success', __('dialog_box.create_success', ['name' => 'Table']));
            return ok($result);
        
        }else{
            return fail($result->message, 200);
        }
    }
    public function update(Request $request, $id){

        $result = $this->api_post('portal/tables/update/'.$id, $request->all());
        if($result->success == true){
            session()->put('success', __('dialog_box.update_success', ['name' => 'Table']));
            return ok($result);
        }else{
            return fail($result->message, 200);
        }
    }
    public function destroy($id){

        $result = $this->api_post('portal/tables/delete/' . $id);
        
        if($result->success){
            session()->put('success', __('dialog_box.delete_success', ['name' => 'Table']));
            return ok('');
        }else{
            return fail($result->message, 200);
        }
    }

    public function qr_generate($id){

        $response = $this->api_get('portal/tables/qr_generate/'.$id);

        if($response->data)
        {
            $data = $response->data;
        }

        if($response->data->restaurant)
        {
            $restaurant = $response->data->restaurant;
        }
        return view('tables.qr-code', compact('restaurant','data'));
    }
    
}
