<div v-if="is_loaded_product == 1 && resultQuery.length === 0" class="d-flex justify-content-center align-items-center">
  <img src="{{ asset('adminlte/dist/img/other/noProductFound.png') }}" alt="" width="35%">
</div>
<div class="row" v-else>
  <div class="col-xs-1 col-lg-2 col-md-3" v-for="item in resultQuery">
    <div class="card" id="margin-product">
      <div class="card-header" style="padding: 10px;">
        <div style="width: 100%; height: 100%;">
          <img :src="item.media.url" width="100%" style="border-top-left-radius: 2%; border-top-right-radius: 2%">
        </div>
      </div>
      <div class="card-body p-2 mx-2" style="font-size: 12px">
        <span>@{{item.name_en | str_limit(10)}}</span><br>
        <span>@{{ formatCurrency(item.price) }}</span>
      </div>
      <div class="overlay">
        <div class="button text-center">
          <a href="#" class="btn btn-success rounded-pill btn-xs  mx-2 my-3" style="padding: .8rem .99rem" data-toggle="modal" data-target="#status" @click="setData(item)" title="Status"><i class="fas fa-check"></i></a>
          <a :href="'{{ url('admin/product_variants') }}?product_id=' + item.id" class="btn btn-info rounded-pill btn-xs my-3" style="padding: .8rem .9rem" title="Set Variant"><i class="fas fa-sitemap"></i></a> <br>
          <a href="#" class="btn btn-primary rounded-pill btn-xs mx-2" style="padding: .8rem .9rem" data-toggle="modal" data-target="#editProduct" @click="setData(item)" title="Edit"><i class="fas fa-edit"></i></a>
          <a href="#" class="btn btn-danger rounded-pill btn-xs mx-1" style="padding: .8rem 1rem" data-toggle="modal" data-target="#deleteProduct" @click="setData(item)" title="Delete"><i class="fas fa-trash"></i></a> <br>
          
          {{-- <a href="#" class="btn btn-warning rounded-pill btn-xs mx-1" style="padding: .8rem .9rem;" title="Share" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-share" style="opacity:1;"></i></a>
          <div class="dropdown-menu" style="cursor: pointer;">
            <a class="dropdown-item" href="https://www.facebook.com/sharer/sharer.php?u={{ $restaurant_info->website_url }}&display=popup"  target="_blank"><i class="fab fa-facebook fa-fw"></i>Facebook</a>
            <a class="dropdown-item" href="https://twitter.com/intent/tweet?url={{ $restaurant_info->website_url }}" target="_blank"><i class="fab fa-twitter fa-fw"></i>Twitter</a>
            <a class="dropdown-item" href="https://t.me/share/url?url={{ $restaurant_info->website_url }}" target="_blank"><i class="fab fa-telegram fa-fw"></i>Telegram</a>
          </div> --}}
        </div>
      </div>
    </div>
  </div>
</div>
<button class="btn btn-warning btn-sm rounded-pill px-3" style="position: fixed; bottom: 10%; right: 20%; z-index: 1" data-toggle="modal" data-target="#create-product" @click="clearData()">
  <i class="far fa-plus fa-fw"></i>{{ __('app.product.create-product') }}
</button>