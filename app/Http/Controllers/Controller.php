<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $auth;
    public $limit_page = 10;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->auth = session()->get('auth');
            if($this->auth) {
                // $user_per = $request->user_per;
                // if(!isset($user_per))
                // {
                //     $response = $this->api_get('admin/auth/user_per');

                //     if ($response->success) {
                //         $user_per = (array)$response->data;
                //     }
                // }
                if(!$request->isJson()) {
                    $response_restaurant = $this->api_get('portal/restaurants');
                    $response_count_oder = $this->api_get('portal/orders/count');

                    view()->share('restaurant_info', $response_restaurant->data ?? null);
                    view()->share('count_order', $response_count_oder->data ?? 0);
                }
            }

            view()->share('auth', $this->auth);
            view()->share('user_per', $user_per ?? null);
            return $next($request);
        });
    }

    public function getErrorMessage($error)
    {
        $msg = [];
        if (is_object($error) || is_array($error)) {
            foreach ($error as $key => $value) {
                $msg['val'][$key] = $value[0];
            }
        } else {
            $msg['msg'] = $error;
        }

        return $msg;
    }

    public function setAuth($auth){
        $this->auth = $auth;
    }

    public function api_get_v2($url, $more_query_string)
    {
        foreach ($more_query_string as $key => $item)
            $url .= '&' . $key . '=' . $item;

        return $this->request('GET', $url);
    }

    public function api_get($url)
    {
        return $this->request('GET', $url);
    }

    public function api_post($url, $data=null)
    {
        return $this->request('POST', $url, $data);
    }

    private function request($method, $url, $data = null)
    {
        $headers = [
            'Accept' => 'application/json'
        ];

        if($this->auth) $headers['Authorization'] = 'Bearer ' . $this->auth->access_token;

        $request = new Client([
            'base_uri' => config('app.api_url'),
            'http_errors' => false,
            'headers' => $headers,
            'verify' => false
        ]);

        $response = $request->request($method, $url, ['json' => $data]);

        $data = json_decode($response->getBody());

        $status_code = $response->getStatusCode();

        if ($status_code == 500) {
            if(config('app.debug')) dd($data);

            return redirect()->to('/error');
        }else if ($status_code == 401) {
            self::clearAuth();

            return (object) [
                'success' => false,
                'data' => 401
            ];
        }

        return $data;
    }

    public function clearAuth()
    {
        self::api_post('admin/auth/logout');
        session()->put('auth', null);
        return redirect()->to('auth/login');
    }


    public function all($api ,$limit, $offset, $search, $order, $sort, $more_query_string = [])
    {
        $url = $api.'?limit=' . $limit . '&offset=' . $offset . '&search=' . $search . '&order=' . $order . '&sort=' . $sort;

        foreach ($more_query_string as $key => $item) {
            $url .= '&' . $key . '=' . $item;
        }

        return (object) $this->api_get($url);
    }

    public function paginator($data, $limit, $offset, $search, $order, $sort, $url, $page, $more_query_string = []) {
        $itemsForCurrentPage = array_slice($data->list->all(), $startIndex = 0, $limit, true);
        $url = $url . '?limit=' . $limit . '&offset=' . $offset . '&search=' . $search . '&order=' . $order . '&sort=' . $sort;

        foreach ($more_query_string as $key => $item) {
            $url .= '&' . $key . '=' . $item;
        }

        $data = new LengthAwarePaginator($itemsForCurrentPage, $data->total, $limit, $page);
        $data->withPath($url);

        return $data;
    }

    public function pagination($api, $limit, $offset, $search, $order, $sort, $url, $page, $more_query_string = [])
    {
        $data = $this->all(
            $api, $limit, $offset, $search, $order, $sort, $more_query_string
        );

        $res = (object) [
            'list' => [],
            'total' => 0,
        ];
        $message = null;
        if ($data->success){
            $res = $data->data;
        } else {
            $message = $data->message;
        }

        $res->list = collect($res->list);

        $data = $this->paginator(
            $res,
            $limit,
            $offset,
            $search,
            $order,
            $sort,
            $url,
            $page,
            $more_query_string
        );

        $data->message = $message != null ? $message : '';


        $more_data = $res;
        unset($more_data->list);
        unset($more_data->total);

        foreach ($more_data as $key => $item) {
            $data->$key = $item;
        }

        return $data;
    }

    protected function isPageNotFound($api)
    {
        $data = $this->api_get($api);

        if (empty($data->data)) {
            abort(404);
        }

        return $data->data;
    }

    /**
     * get all variable for listing
     *
     * @return array
     */
    public function getParams()
    {
        $limit = $this->limit_page;
        $current_page = request('page') ?? 1;
        $offset = ($current_page * $limit) - $limit;
        $search = request('search');
        $order = request('order') ?? 'created_at';
        $sort = request('sort') ?? 'desc';

        return [
            $current_page,
            $limit,
            $offset,
            $search,
            $order,
            $sort,
        ];
    }
}
