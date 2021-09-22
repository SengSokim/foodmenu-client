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
          <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editCategory" @click="editCategory(item)" title="Edit"><i class="fas fa-edit"></i></button>
          @include('product_categories.edit')

          <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteCategory" @click="selected_index = item.id;" title="Delete"><i class="fas fa-trash"></i></button>
          @include('product_categories.delete')
        </td>
      </tr>
    </tbody>
  </table>
</div>
    