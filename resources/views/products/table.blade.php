<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered">
      <thead>
        <tr>
          <th class="text-center">#</th>
          <th scope="col">Media</th>
          <th scope="col">Name</th>
          <th scope="col">Description</th>
          <th scope="col">Price</th>
          <th scope="col">Sequence</th>
          <th scope="col">Category Name</th>
          <th scope="col" class="text-center"><div style="width: 100px"></div>Action</th>
        </tr>
      </thead>
      <tbody>
         
            <tr v-for="(item, index) in products.data">
                <td class="text-center">@{{ index + 1 }}</td>
                {{-- :src="data.image ? data.image : (data.media ? data.media.url : '{{ asset('adminlte/dist/img/placeholder/square-placeholder.png') }}')" --}}
                <td>
                    <img data-lity :src="item.media?.url ?? '{{ asset('adminlte/dist/img/placeholder/square-placeholder.png')}}'" alt="" width="50px">
                </td>
                <td>@{{ item.name }}</td>
                <td class="text-center">@{{ item.description }}</td>
                <td class="text-center">@{{ item.price }}</td>
                <td>@{{ item.sequence }}</td>
                <td>@{{ item.category.name }}</td>
                <td class="text-center">
                <button class="btn btn-primary rounded-pill btn-sm" style="padding: .425rem .55rem" data-toggle="modal" data-target="#editProduct" @click="setData(item);" title="Edit"><i class="fas fa-edit fa-fw"></i></button>
                <button class="btn btn-danger rounded-pill btn-sm" style="padding: .425rem .55rem" data-toggle="modal" data-target="#deleteProduct" @click="setData(item)" title="Delete"><i class="fas fa-trash fa-fw"></i></button>
                </td>
            </tr>
        {{-- @foreach ($data as $index => $list)
            <tr>
                <td>{{ $data->firstItem()+$index }}</td>
                <td>
                    <img src="{{ $list->media ? $list->media->url : '' }}" alt="" width="50px">
                </td>
                <td>{{ $list->name }}</td>
                <td>{{ $list->description }}</td>
                <td>{{ $list->price }}</td>
                <td>{{ $list->sequence }}</td>
                <td>{{ $list->category->name }}</td>
                <td>
                    <button class="btn btn-primary rounded-pill btn-sm" style="padding: .425rem .55rem" data-toggle="modal" data-target="#editProduct" @click="setData($list);" title="Edit"><i class="fas fa-edit fa-fw"></i></button>
                    <button class="btn btn-danger rounded-pill btn-sm" style="padding: .425rem .55rem" data-toggle="modal" data-target="#deleteProduct" @click="setData($list)" title="Delete"><i class="fas fa-trash fa-fw"></i></button>
                </td>
            </tr>
        @endforeach --}}
        {{-- <tr v-for="(item, index) in categories.data">
          <td class="text-center">@{{ index + 1 }}</td>
          <td>@{{ item.name }}</td>
          <td class="text-center">@{{ item.sequence }}</td>
          <td class="text-center">@{{ item.enable_status ? "Active" : "Deactive" }}</td>
          <td class="text-center">
            <button class="btn btn-primary rounded-pill btn-sm" style="padding: .425rem .55rem" data-toggle="modal" data-target="#editCategory" @click="setData(item);" title="Edit"><i class="fas fa-edit fa-fw"></i></button>
            <button class="btn btn-danger rounded-pill btn-sm" style="padding: .425rem .55rem" data-toggle="modal" data-target="#delete-category" @click="setData(item)" title="Delete"><i class="fas fa-trash fa-fw"></i></button>
          </td>
        </tr> --}}
      </tbody>
    </table>
  </div>
  