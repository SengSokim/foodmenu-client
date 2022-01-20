<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = $this->api_get('portal/dashboard');

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

    // public function totalPerMonth($year, $month) 
    // {
    //     $totalPerMonth = $this->api_get('portal/chartMonthly/'. $year. '/'.$month);
        
    //     if(!$totalPerMonth->success) {
    //         return fail($totalPerMonth->message);
    //     }
    //     return ok($totalPerMonth->data);
    // }
}