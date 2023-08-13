<!--daily Chart-->
<div class="col-md-6">
  <div class="card">
    <div class="col-md-12">
      <div class="d-flex justify-content-between">
        <div class="chart-title">
          <h5> {{ __('app.chart.daily_sale_chart')}} </h5>
        </div>
        <div class="select-date pt-1">
          @php
            $monthOfYear = [];
            for($i=1;$i<=12;$i++) {
              if($i <= now()->format('m')) {
                if($i < 10) {
                  $i = '0' . $i;
                }
                $monthOfYear[] = now()->format('Y-').$i;
              }
            }
          @endphp
          <select class="form-control" v-model="selected_month_year" @change="changeSaleDate()" style="cursor: pointer;">
            <option :value="null">{{ __('app.chart.select_month_year') }}</option>
            @foreach ($monthOfYear as $item)
              <option value="{{ $item }}" @if(request('date') == $item) selected @endif>{{ $item }}</option>
            @endforeach
          </select>
        </div>
      </div>
        <div id="saleDivChart">
          <canvas id="saleChart" style="width:100%; max-width: 100%"></canvas>
        </div>
    </div>
  </div>
</div>
<!--Monthly Chart-->
<div class="col-md-6">
  <div class="card">
    <div class="col-md-12">
      <div class="d-flex justify-content-between">
        <div class="chart-title">
          <h5>{{ __('app.chart.monthly_sale_chart') }}</h5>
        </div>
        <div class="select-date pt-1">
          <select class="form-control" v-model="selected_year" @change="changeSalePerMonth()" style="cursor: pointer;">
            <option :value="null">{{ __('app.chart.select_year') }}</option>
            @foreach(range(0, now()->format('Y') - 2022) as $year)
              <option value="{{ 2022 + $year }}">{{ 2022 + $year }}</option>
            @endforeach
          </select>
        </div>
      </div>
        <div id="MonthlySaleDiv">
          <canvas id="saleMonthly" style="width:100%; max-width: 100%"></canvas>
        </div>
    </div>
  </div>
</div>
@section('footer-content')
  <script src="{{ mix('dist/js/charts/chart.js')}}"></script>
@endsection
