<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="card-tools">
          <button class="btn btn-warning btn-sm rounded-pill px-4" data-toggle="modal" data-target="#create-product-variant" @click="clearData()"><i class="far fa-plus fa-fw"></i>Create New</button>
            @include('products.variants.create')
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped table-hover table-bordered">
            <thead>
              <tr>
                <th class="text-center">#</th>
                <th scope="col">Variant Name</th>
                <th scope="col" class="text-center">Display Sequence</th>
                <th scope="col" class="text-center">Status</th>
                <th class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
              {{-- @forelse ($data as $index => $list) --}}
              <tr v-for="(item,index) in product_variants.data">
                {{-- <th scope="row" class="text-center">{{$data->firstItem() + $index}}</th>
                <td>{{$list->name_en}}</td>
                <td class="text-center">{{$list->sequence}}</td>
                <td class="text-center">{{$list->enable_status ? 'Active' : 'Deactive'}}</td>
                <td>
                  <button class="btn btn-primary btn-sm" title="Edit" data-toggle="modal" data-target="#editVariant" ><i class="fas fa-edit"></i></button>
                  <a href="#" class="btn btn-danger btn-sm" title="Delete"><i class="fas fa-trash"></i></a>
                  @include('products.variants.edit')
                </td> --}}
                <th scope="row" class="text-center">@{{ index + 1 }}</th>
                <td>@{{item.name_en}}</td>
                <td class="text-center">@{{item.sequence}}</td>
                <td class="text-center">@{{item.enable_status ? 'Active' : 'Deactive'}}</td>
                <td>
                  <button class="btn btn-primary btn-sm" title="Edit" data-toggle="modal" data-target="#editVariant" @click="setData(item)"><i class="fas fa-edit"></i></button>
                  <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-variant" @click="setData(item)" title="Delete"><i class="fas fa-trash"></i></button>
                </td>
                
              </tr>
              {{-- @empty --}}
                  
              {{-- @endforelse --}}
             
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
