@extends('layouts.master')
@section('content-header')
{!! generateContentHeader("Find Driver", "Find Driver") !!}
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
      <form>
        <div class="row">
          <div class="col-md-12">
            <div class="card bg-light {{ request('search') ? '' : 'collapsed-card' }}">
              <div class="card-header" data-card-widget="collapse">
                <h3 class="card-title"><i class="fas fa-filter"></i> Filter</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-plus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>{{ __('app.global.search') }}</label>
                      <input type="text" name="search" class="form-control" value="{{ request('search') }}" placeholder="District...">
                    </div>
                  </div>
                </div>
                <div class="button">
                  <button type="submit" class="btn btn-primary"><i class="fas fa-filter fa-fw"></i>Filter</button>
                  <a href="{{ route('drivers')}}" class="btn btn-default"><i class="fas fa-sync-alt fa-fw"></i>Clear</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
      <div class="card">
        <div class="card-body">      
          @include('drivers.table')
        </div>
        <div class="card-footer">
          @include('layouts.pagination')
        </div>
      </div>
    </div>
  </div>
@endsection