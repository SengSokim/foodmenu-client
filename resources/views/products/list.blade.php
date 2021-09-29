<div class="row">
    <div class="col-lg-2 col-md-3" v-for="item in resultQuery">
      <div class="card">
        <div class="card-header" style="padding: 10px">
          <div style="width: 100%; height: 100%;">
            <img :src="item.media.url" width="100%" style="border-top-left-radius: 2%; border-top-right-radius: 2%">
          </div>
        </div>
        <div class="card-body p-2 mx-2">
          <span>@{{ formatCurrency(item.price) }}</span>
        </div>
        <div class="overlay">
          <div class="button text-center">
            <a href="#" class="btn btn-warning rounded-pill btn-xs m-1 px-4" data-toggle="modal" data-target="#editProduct" @click="setData(item)">Edit</a><br>
            <a href="{{ route('products.variants') }}" class="btn btn-info rounded-pill btn-xs m-1 px-2">Set Variants</a>
          </div>
        </div>
      </div>
    </div>
</div>