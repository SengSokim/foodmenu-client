@extends('layouts.master')
@section('content')
<div id="tables">
    <div class="row"> 
        <div class="col-md-6">
            <h4>Restaurant Table</h4>
        </div>
        <div class="col-md-6 text-right">
            <h5>
                <a href="{{ route('dashboard') }}">Dashboard</a> / Table
            </h5>
        </div>
    </div>
    @include('tables.table')
    @include('tables.create')
    @include('tables.edit')
</div>
@endsection
@section('footer-content')
    <script src="{{ mix('dist/js/tables/table.js')}}"></script>
@endsection