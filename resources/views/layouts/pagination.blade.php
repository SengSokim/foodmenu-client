@if( ($data->total() <= 1) )
    <div class="card-title mt-2">{{ __('app.global.total') }}: {{ $data->total() }} {{ __('app.global.record') }}</div>
@else
    <div class="card-title mt-2">{{ __('app.global.total') }}: {{ $data->total() }} {{ __('app.global.records') }}</div>
@endif
<div class="card-tools float-right">{{  $data->links()  }}</div>