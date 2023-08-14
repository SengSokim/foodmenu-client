@extends('layouts.master')
@section('content-header')
    {!! generateContentHeader('categories', 'categories') !!}
@endsection
@section('content')
    <div class="row" id="productCategory">
        <div class="col-md-12" v-cloak>
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-between">
                            <div class="col-md-6">
                                <form action="{{ route('categories') }}">
                                    <div class="input-group">
                                        <input name="search" class="form-control" type="search"
                                            placeholder="{{ __('app.categories.search-category') }}..." aria-label="Search"
                                            value="{{ request('search') }}">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-sm btn-primary"
                                                style="border:1; width: 50px;" title="Search">
                                                <i class="far fa-search"></i>
                                            </button>
                                            <a href="{{ route('categories') }}" style="border: 0; background-color: #F2F2F2"
                                                class="btn btn-default" title="refresh">
                                                <i class="far fa-sync-alt"></i>
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-tools mt-1" style="float:right">
                                <button class="btn btn-primary" @click="clearData()"
                                    title="Create Category" data-toggle="modal" data-target="#modal-category"><i
                                        class="far fa-plus fa-fw"></i>{{ __('app.global.create-new') }}</button>
                                @include('categories.create')
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <form>
        <div class="row py-3 px-3">
          <div class="col-md-3">
            <div class="form-group">
              <label>Status</label>
              <select name="enable_status" class="form-control">
                  <option value="" @if (request('enable_status') == '') selected @endif>All</option>
                  <option value="1" @if (request('enable_status') == '1') selected @endif>Active</option>
                  <option value="0" @if (request('enable_status') == '0') selected @endif>Deactive</option>
              </select>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label>Search</label>
              <div class="input-group">
                <input type="search" class="form-control" name="search" value="{{ request('search') }}" placeholder="Search..." >
              </div>
            </div>
          </div>
        </div>
        <div class="row pb-3 px-3">
          <div class="col-md-12">
            <button type="submit" class="btn btn-sm btn-info text-white">Filter <i class="fas fa-filter"></i></button>
            <a href="{{ url('admin/categories') }}" class="btn btn-sm btn-danger">Clear <i class="fas fa-sync-alt"></i></a>
          </div>
        </div>
      </form> --}}
                <div class="card-body">
                    @include('categories.table')
                    @include('categories.edit')
                    @include('categories.delete')
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
        const categories = @json($data)
        
    </script>
    <script src="{{ mix('dist/js/app.js') }}"></script>
    <script src="{{ mix('dist/js/categories/category.js') }}"></script>
@endsection
