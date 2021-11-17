<div class="table-responsive">
  <table class="table table-striped table-hover table-bordered">
    <thead>
      <tr>
        <th class="text-center">#</th>
        <th scope="col"><div style="width: 120px"></div> {{ __('app.categories.name') }}</th>
        <th scope="col" class="text-center">{{ __('app.categories.sequence') }}</th>
        <th scope="col" class="text-center">{{ __('app.global.status') }}</th>
        <th scope="col" class="text-center"><div style="width: 100px"></div> {{ __('app.global.actions') }}</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="(item, index) in product_categories.data">
        <td class="text-center">@{{ index + 1 }}</td>
        <td>@{{ item.name_en }}</td>
        <td class="text-center">@{{ item.sequence }}</td>
        <td class="text-center">@{{ item.enable_status ? "Active" : "Deactive" }}</td>
        <td class="text-center">
          <button class="btn btn-primary rounded-pill btn-sm" style="padding: .425rem .55rem" data-toggle="modal" data-target="#editCategory" @click="setData(item);" title="Edit"><i class="fas fa-edit fa-fw"></i></button>
          <button class="btn btn-danger rounded-pill btn-sm" style="padding: .425rem .55rem" data-toggle="modal" data-target="#delete-category" @click="setData(item)" title="Delete"><i class="fas fa-trash fa-fw"></i></button>
        </td>
      </tr>
    </tbody>
  </table>
</div>
    