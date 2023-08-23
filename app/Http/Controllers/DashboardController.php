<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $m = date('m');
        $y = date('Y');
        $current_month_year = date('Y-m');

        $data = $this->api_get('admin/dashboard/dashboard_count')->data ?? [];
        $daily_order = $this->api_get('admin/dashboard/daily_order/' . $y . '/' . $m)->data ?? [];
        $monthly_order = $this->api_get('admin/dashboard/monthly_order/' . $y)->data ?? [];
        return view('dashboard', compact('data', 'daily_order', 'monthly_order', 'current_month_year'));
    }

    public function dailyOrder($y, $m)
    {
        $res = $this->api_get('admin/dashboard/daily_order/' . $y . '/' . $m);
        
        if (!$res->success) {
            return fail($res->message, 200);
        }

        return ok($res->data);
    }

    public function monthlyOrder($y)
    {
        $res = $this->api_get('admin/dashboard/monthly_order/' . $y);
        if (!$res->success) {
            return fail($res->message, 200);
        }

        return ok($res->data);
    }
}
