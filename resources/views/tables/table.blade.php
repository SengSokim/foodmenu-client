<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <div class="text-right pb-2">
            <button class="btn btn-warning btn-sm rounded-pill" data-toggle="modal" data-target="#createTable">+ Create New</button>
          </div>
          @include('tables.create')
          <table class="table table-striped table-hover table-bordered">
            <thead>
              <tr class="text-center">
                <th>#</th>
                <th>Name</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @for($i = 1; $i <= 5; $i++)
              <tr class="text-center">
                <td>{{ $i }}</td>
                <td>Table {{$i}}</td>
                <td>Active</td>
                <td>
                  <a href="{{route('tables.qr_generate')}}" target="_blank"><button class="btn btn-warning btn-sm rounded-pill" title="QR Code" style="padding: .425rem .70rem"><i class="fas fa-qrcode"></i></button></a>
                  <button class="btn btn-primary btn-sm rounded-pill" title="Edit" data-toggle="modal" data-target="#editTable" style="padding: .425rem .55rem"><i class="fas fa-edit fa-fw"></i></button>
                  <button class="btn btn-danger btn-sm rounded-pill"  title="Delete" data-toggle="modal" data-target="#deleteTable" style="padding: .425rem .55rem"><i class="fas fa-trash-alt fa-fw"></i></button>
                  <div class="text-left">
                      @include('tables.edit')
                      @include('tables.delete')
                  </div>
                </td>
              </tr>
              @endfor
            </tbody>
          </table>
        </div>
      </div>
      {{-- <div class="row card-footer">
          <div class="col-md-6">
              <h5>Total: <span class="text-danger">{{ $i - 1 }}</span>{{ $i - 1 > 1 ? 'records' : 'record' }}</h5>
          </div>
          <div class="col-md-6">
              @include('layouts.pagination') 
          </div>
      </div> --}}
    </div>
  </div>
</div>