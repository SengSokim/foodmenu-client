@extends('layouts.master')
@section('content-header')
{!! generateContentHeader( __('app.orders.order'), __('app.orders.order')) !!}
@endsection
@section('content')
<style>
  .o-hide {
    display: none !important;
  }
  .o-show {
    display: show !important;
  }
</style>
<div class="row">
  <div class="col-md-12">
    <form>
      <div class="row">
        
        <div class="col-md-12">
          <div class="accordion" id="accordionExample">
            <div class="card">
              <div class="card-header" id="headingOne" data-card-widget="collapse" data-toggle="collapse" data-target="#collapseOne" >
                <h3 class="card-title"><i class="fas fa-filter"></i>Filter</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tools" aria-expanded="true" aria-controls="collapseOne"> 
                    <i class="fas fa-plus"></i>
                  </button>
                </div>
              </div>
              {{-- <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                  <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Collapsible Group Item #1
                  </button>
                </h5>
              </div> --}}
          
              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>{{ __('app.orders.from-date') }}</label>
                        <input type="date" name="from_date" class="form-control" value="{{ request('from_date') }}">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>{{ __('app.orders.to-date') }}</label>
                        <input type="date" name="to_date" class="form-control" value="{{ request('to_date') }}">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                      <label>{{ __('app.global.status') }}</label>
                        <select name="status" class="form-control status-select2" style="width: 100%">
                          <option value="">All</option>
                          <option value="pending" @if(request('status') == "pending") selected @endif>Pending</option>
                          <option value="confirmed" @if(request('status') == "confirmed") selected @endif>Confirmed</option>
                          <option value="rejected" @if(request('status') == "rejected") selected @endif>Rejected</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>{{ __('app.global.search') }}</label>
                        <input type="text" name="search" class="form-control" value="{{ request('search') }}" placeholder="Phone Number | Code">
                      </div>
                    </div>
                  </div>
                  <div class="button">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-filter fa-fw"></i>Filter</button>
                    <a href="{{ route('orders') }}" class="btn btn-default"><i class="fas fa-sync-alt fa-fw"></i>Clear</a>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
          
        </div>
      </div>
    </form>
    <div class="card">
      {{-- <div class="card-header">
        <h3 class="card-title"></h3>
      </div> --}}
      <div class="card-body">
        @include('orders.table')
      </div>
      <div class="card-footer">
        @include('layouts.pagination')
      </div>
    </div>
  </div>
</div>
@endsection
@section('footer-content')
<script>
  $('.status-select2').select2({
    minimumResultsForSearch:-1
  })
  </script>
@endsection
