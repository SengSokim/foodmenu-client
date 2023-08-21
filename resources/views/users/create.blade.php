@extends('layouts.master')
@section('content-header')
{!! generateContentHeader('Users','Users', 'Add New') !!}
<div class="button mt-2 ml-2">
  <a href="{{ route('users') }}" class="btn btn-default"><i class="fas fa-share fa-flip-horizontal fa-fw"></i>Back</a>
  <button type="submit" form="createUser" class="btn btn-primary"><i class="fas fa-save fa-fw"></i>Save</button>
</div>
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-default">
      <div class="card-header">
        <h3 class="card-title">User Information</h3>
      </div>
      <div class="card-body p-3">
        <div class="bs-stepper linear">
          <div class="bs-stepper-content">
            <form @submit.prevent="submit" id="createUser" v-cloak>
              @include('users.form')
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('footer-content')
    <script src="{{ mix('dist/js/app.js') }}"></script>
    <script src="{{ mix('dist/js/users/create.js') }}"></script>
    <script type="text/javascript">
        $(".select2").select2();
    </script>
@endsection
