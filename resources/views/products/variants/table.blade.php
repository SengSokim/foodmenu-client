<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="card-tools">
          <button class="btn btn-warning btn-sm rounded-pill px-4"><i class="far fa-plus fa-fw"></i>Create New</button>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped table-hover table-bordered">
            <thead>
              <tr>
                <th class="text-center">#</th>
                <th scope="col">Variant Name</th>
                <th scope="col">Product</th>
                <th scope="col" class="text-center">Display Sequence</th>
                <th scope="col" class="text-center">Status</th>
                <th class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row" class="text-center">1</th>
                <td>Sugar</td>
                <td>Caffee</td>
                <td class="text-center">0</td>
                <td class="text-center">Active</td>
                <td class="text-center">
                  <a href="#" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></a>
                  <a href="#" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i></a>
                </td>
              </tr>
              <tr class="text-muted font-italic">
                <th scope="row" class="text-center">3</th>
                <td>Bobble</td>
                <td>Caffee</td>
                <td class="text-center">2</td>
                <td class="text-center">Deactive</td>
                <td class="text-center">
                  <a href="#" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></a>
                  <a href="#" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i></a>
                </td>
              </tr>
              <tr>
                <th scope="row" class="text-center">2</th>
                <td>Size</td>
                <td>Caffee</td>
                <td class="text-center">1</td>
                <td class="text-center">Active</td>
                <td class="text-center">
                  <a href="#" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></a>
                  <a href="#" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i></a>
                </td>
              </tr>
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