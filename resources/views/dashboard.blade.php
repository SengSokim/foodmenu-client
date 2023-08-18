@extends('layouts.master')
@section('content-header')
{!! generateContentHeader(__('app.sidebar.dashboard'), __('app.sidebar.dashboard')) !!}
@endsection
@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box" style="background: var(--french-blue); color: white">
                    <div class="inner">
                        <h4><b>{{ $data->count_all_category ?? 0 }}</b></h4>
                        <p>All Categories</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{ route('categories') }}" class="small-box-footer">See more... <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h4><b>{{ $data->count_all_products ?? 0 }}</b></h4>
                        <p>All Products</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{ route('products') }}" class="small-box-footer">See more... <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box text-white" style="background: var(--blue-lzis);">
                    <div class="inner">
                        <h4><b>{{ $data->count_pending_orders ?? 0 }}</b></h4>
                        <p>Pending Orders</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{ route('orders', ['status' => 'pending']) }}" class="small-box-footer">See more... <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h4><b>{{ $data->count_all_orders ?? 0 }}</b></h4>
                        <p>All Orders</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{ route('orders') }}" class="small-box-footer">See more... <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="row" id="chart">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Daily Order</h4>
                        <div class="card-tools">
                            <div class="form-group">
                                <div class="input-group date_confirmed_order" id="filter_date_confirmed_order"
                                    data-target-input="nearest">
                                    <input type="text" value="{{ request('date') }}"
                                        class="form-control datetimepicker-input" id="filter_date_confirmed_order_input"
                                        data-target="#filter_date_confirmed_order" name="date" autocomplete="off"
                                        placeholder="YYYY-MM">
                                    <div class="input-group-append" data-target="#filter_date_confirmed_order"
                                        data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div>
                            <div id="block_confirmed_order">
                                <canvas id="daily_order" class="rounded shadow"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Monthly Order</h4>
                        <div class="card-tools">
                            <div class="form-group">
                                <div class="input-group date_confirmed_order" id="filter_date_pending_order"
                                    data-target-input="nearest">
                                    <input type="text" value="{{ request('date') }}"
                                        class="form-control datetimepicker-input" id="filter_date_pending_order_input"
                                        data-target="#filter_date_pending_order" name="date" autocomplete="off"
                                        placeholder="YYYY-MM">
                                    <div class="input-group-append" data-target="#filter_date_pending_order"
                                        data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div>
                            <div id="block_confirmed_order">
                                <canvas id="monthly_order" class="rounded shadow"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer-content')
    <script>
        var current_month_year = @json($current_month_year);
        var daily_order = @json($daily_order->total ?? []);
        var monthly_order = @json($monthly_order->total ?? []);
    </script>
    <script src="{{ asset('adminlte/plugins/chart.js/Chart.min.js') }}"></script>
    <script src="{{ mix('dist/js/app.js') }}"></script>
    <script src="{{ mix('dist/js/chart/chart.js') }}"></script>
@endsection
