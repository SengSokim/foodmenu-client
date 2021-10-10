<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function edit()
    {
        $response_restaurant = $this->api_get('portal/restaurants/show');
        
        $restaurant = [];
        if($response_restaurant->data){
            $restaurant = $response_restaurant->data;
        }
        return ok($restaurant);
    }

    public function update(Request $request)
    {
        $result = $this->api_post('portal/restaurants/update', $request->all());
        if ($result->success == true) {
            session()->put('success', __('dialog_box.update_success', ['name' => 'Restaurant']));

            return ok('');
        } else {
            return fail($result->message, 200);
        }
    }
}
