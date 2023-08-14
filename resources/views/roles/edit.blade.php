@extends('layouts.master')
@section('header-content')
<style>
  table td {
    padding-left: 20px;
    width: 140px;
    font-size: 15px
  }

  table th {
    padding-top: 10px
  }
</style>    
@endsection
@section('content-header')
{!! generateContentHeader('Roles','Roles', 'Edit') !!}
<div class="button mt-2 ml-2">
  <a href="{{ route('roles') }}" class="btn btn-default"><i class="fas fa-share fa-flip-horizontal fa-fw"></i>Back</a>
  @if($data->id != 1)
  <button type="submit" form="editRole" class="btn btn-primary"><i class="fas fa-save fa-fw"></i> Save Changes</button>
  @endif
</div>
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-default">
      <div class="card-header">
        <h3 class="card-title">Role Information</h3>
      </div>
      <div class="card-body p-3">
        <div class="bs-stepper linear">
          <div class="bs-stepper-content">
            <form @submit.prevent="submit" id="editRole" v-cloak>
              @if($data->id == 1)
                <div class="card my-3">
                    <div class="card-body">
                    <label class="text-center" style="font-size: 18px">Admin has all permissions</label>
                    </div>
                </div>
              @else
                @include('roles.form')
              @endif
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('footer-content')
    <script>
        const data = @json($data);
        var editRole;
    </script>
    
    <script src="{{ mix('dist/js/app.js') }}"></script>
    <script src="{{ mix('dist/js/roles/edit.js') }}"></script>
   
@endsection
