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
}
