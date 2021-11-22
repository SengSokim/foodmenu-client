<div class="table-responsive">
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
      <tr class="text-center" v-for="(item, index) in restaurant_tables.data">
        <td >@{{ index + 1 }}</td>
        <td>@{{ item.name }}</td>
        <td class="text-center">@{{ item.enable_status ? "Active" : "Deactive" }}</td>
        <td class="text-center"> 
          <a :href='"{{ url('admin/tables/qr_generate').'/' }}" + item.id' target="_blank">
            <button class="btn btn-warning btn-sm rounded-pill" title="QR Code" style="padding: .425rem .70rem"><i class="fas fa-qrcode"></i></button>
          </a>
          <button class="btn btn-primary rounded-pill btn-sm" style="padding: .425rem .55rem" data-toggle="modal" data-target="#editTable" @click="setData(item);" title="Edit"><i class="fas fa-edit fa-fw"></i></button>
          <button class="btn btn-danger rounded-pill btn-sm" style="padding: .425rem .55rem" data-toggle="modal" data-target="#delete-table" @click="setData(item)" title="Delete"><i class="fas fa-trash fa-fw"></i></button>
        </td>
      </tr>
    </tbody>
  </table>
</div>