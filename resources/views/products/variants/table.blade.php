<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="card-tools">
          <button class="btn btn-warning btn-sm rounded-pill px-4" data-toggle="modal" data-target="#create-product-variant" @click="clearData()"><i class="far fa-plus fa-fw"></i>{{ __('app.global.create-new') }}</button>
            @include('products.variants.create')
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped table-hover table-bordered" v-cloak>
            <thead>
              <tr>
                <th class="text-center">#</th>
                <th scope="col"><div style="width: 130px"></div> {{ __('app.product.vaiants.variant-name') }}</th>
                <th scope="col" class="text-center"><div style="width: 120px"></div> {{ __('app.global.sequence') }}</th>
                <th scope="col" class="text-center"><div style="width: 120px"></div> {{ __('app.global.status') }}</th>
                <th class="text-center"><div style="width: 120px"></div> {{ __('app.global.actions') }}</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(item,index) in product_variants.data.list">
                <th scope="row" class="text-center">@{{ index + 1 }}</th>
                <td>@{{item.name}}</td>
                <td class="text-center">@{{item.sequence}}</td>
                <td class="text-center">@{{item.enable_status ? 'Active' : 'Deactive'}}</td>
                <td class="text-center">
                  <button class="btn btn-primary rounded-pill btn-sm" style="padding: .425rem .55rem" title="Edit" data-toggle="modal" data-target="#editVariant" @click="setData(item)"><i class="fas fa-edit fa-fw"></i></button>
                  <button class="btn btn-danger rounded-pill btn-sm" style="padding: .425rem .55rem" data-toggle="modal" data-target="#delete-variant" @click="setData(item)" title="Delete"><i class="fas fa-trash fa-fw"></i></button>
                </td>
              </tr>
               <tr v-if="product_variants.data.length == 0"> 
                <td colspan="99" class="text-center">No data</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer">
        {{-- @include('layouts.pagination')  --}}
      </div>
    </div>
  </div>
</div>
