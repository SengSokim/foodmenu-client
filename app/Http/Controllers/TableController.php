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
            url('portal/tables'),
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

        $response_table_qr_generate = $this->api_get('portal/tables/qr_generate/'.$id);
        if($response_table_qr_generate->data)
         {
            $data = $response_table_qr_generate->data;
         }
         if($data->restaurant)
         {
             $restaurant = $data->restaurant; 
         }

         $url = $response_table_qr_generate->data->website_url;
         $qr = null;
        $url = 'http://localhost:8001/restaurant/'.$restaurant->id.'?table_id='. $id;
        $qr = QrCode::format('png')->merge('http://w3adda.com/wp-content/uploads/2019/07/laravel.png', 0.3, true)
           ->size(100)->errorCorrection('H')
           ->generate($url);

            $qr = QrCode::format('png')->merge('adminlte/dist/img/logo/emenu-square-black-bg-with-stroke.png', 0.3, true)
                ->size(200)->errorCorrection('H')
                ->generate($url);
        return view('tables.qr-code', compact('qr','restaurant','url','data'));
    }
    
}
