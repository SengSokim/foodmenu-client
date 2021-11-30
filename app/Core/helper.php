<?php 
    function generateContentHeader($parent, $child = null, $action = null)
    {
        $output = '<div class="row mb-2">';
        $output .= '<div class="col-sm-6">';
        $output .= '<h1 class="m-0">'. ucwords($parent).'</h1>';

        if($child)
        {
            $output .= '</div>';
            $output .= '<div class="col-sm-6">';
            $output .= '<ol class="breadcrumb float-sm-right">';
            $output .= '<li class="breadcrumb-item"><a href="'.route('dashboard').'">Dashboard</a></li>';

            if($action) {
                $output .= '<li class="breadcrumb-item"><a href="'. route(str_replace(' ', '-', strtolower($child))) .'">'. ucwords($child) .'</a></li>';
                $output .= '<li class="breadcrumb-item active">'. ucwords($action) .'</li>';
            } else {
                $output .= '<li class="breadcrumb-item  active">'. ucwords($child) .'</li>';
            }

            $output .= '</ol>';
            $output .= '</div>';
        } else {
            $output .= '</div>';
            $output .= '</div>';
        }
        return $output;
    }

    function getGeneralData($auth)
    {
        if ($auth) {
            $controller = new \App\Http\Controllers\Controller();
            $controller->setAuth($auth);

            $response_restaurant = $controller->api_get('portal/restaurants');
            $response_count_oder = $controller->api_get('portal/orders/count');
            
            view()->share('restaurant_info', $response_restaurant->data ?? null);
            view()->share('count_order', $response_count_oder->data ?? 0);
        }

    }

    function formatCurrency($money, $code = 'usd')
    {
        switch ($code) {
            case 'riel':
                return number_format($money, 0, '', ',') . '';
            default:
                return '$' . number_format($money, 2, '.', ',');
        }
    }

    function ok($data = null)
    {
        return response()->json(['success' => true, 'data' => $data]);
    }

    function fail($message, $code = 400)
    {
        return response()->json(["success" => false, "message" => $message], $code);
    }