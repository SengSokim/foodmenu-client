<div class="table-responsive">
  <table class="table table-striped table-hover table-bordered">
    <thead>
      <tr>
        <th class="text-center">#</th>
        <th scope="col">Name</th>
        <th scope="col" class="text-center">Sequence</th>
        <th scope="col" class="text-center">Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="(item, index) in product_categories.data">
        <td class="text-center">@{{ index + 1 }}</td>
        <td>@{{ item.name_en }}</td>
        <td>@{{ item.sequence }}</td>
        <td>@{{ item.enable_status ? "Active" : "Deactive" }}</td>
        <td class="">
          <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editCategory" @click="setData(item)" title="Edit"><i class="fas fa-edit"></i></button>
          <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-category" @click="setData(item)" title="Delete"><i class="fas fa-trash"></i></button>
        </td>
      </tr>
    </tbody>
  </table>
</div>
    