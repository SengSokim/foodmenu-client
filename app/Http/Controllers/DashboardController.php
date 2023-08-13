<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $data = $this->api_get('admin/dashboard/dashboard_count')->data ?? [];
        return view('dashboard', compact('data'));
    }

    public function chart($year, $month)
    {
        $chart = $this->api_get('portal/chart/'. $year.'/'.$month);

        if(!$chart->success) {
            return fail($chart->message);
        }
        return ok($chart->data);
    }

    public function totalPerMonth($year)
    {
        $totalPerMonth = $this->api_get('portal/chartMonthly/'. $year);

        if(!$totalPerMonth->success) {
            return fail($totalPerMonth->message);
        }
        return ok($totalPerMonth->data);
    }
}
