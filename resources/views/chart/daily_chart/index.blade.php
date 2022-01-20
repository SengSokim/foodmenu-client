<div id="barChart">
  <div class="d-flex justify-content-between">
    <div class="chart-title">
      <h5>Daily Sale Chart</h5> 
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
        <option :value="null">Select Year & Month</option>
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
@section('footer-content')
  <script src="{{ mix('dist/js/charts/daily.js')}}"></script>
@endsection