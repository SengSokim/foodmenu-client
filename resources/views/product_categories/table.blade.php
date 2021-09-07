<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="card-tools">
          <a href="" class="btn btn-warning btn-sm rounded-pill"><i class="far fa-plus fa-fw"></i>Create New</a>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped table-hover table-bordered">
            <thead>
              <tr>
                <th class="text-center">#</th>
                <th scope="col">Category Name</th>
                <th scope="col" class="text-center">Display Sequence</th>
                <th scope="col" class="text-center">Status</th>
                <th class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
              @for($i = 0; $i < 10; $i++)
              <tr>
                <th scope="row" class="text-center">{{ $i + 1 }}</th>
                <td>Drink</td>
                <td class="text-center">0</td>
                <td class="text-center">Active</td>
                <td class="text-center">
                  <a href="#" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></a>
                  <a href="#" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i></a>
                </td>
              </tr>
              @endfor
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer">
        @include('layouts.pagination') 
      </div>

    </div>
  </div>
</div>