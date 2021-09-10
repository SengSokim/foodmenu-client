<style>
  .card:hover{
    transform: translate(0, -8px);
    transition: transform 1s;
  }
 
 .overlay{
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    height: 100%;
    width: 100%;
    opacity: 0;
    transition: .4s ease;
  }

  .card:hover .overlay {
    opacity: 1;
    background-color: rgba(0,0,0,0.8);
  }
</style>
<div class="row">
    <div class="col-lg-2 col-md-3">
      <div class="card">
        <div class="card-header" style="padding: 10px">
          <div style="width: 100%; height: 100%;">
            <img src="https://www.gourmetfoodworld.com/images/product/large/2306_1_.jpg" width="100%" style="border-top-left-radius: 2%; border-top-right-radius: 2%">
          </div>
        </div>
        <div class="card-body p-2 mx-2">
          <span>$3.50</span>
        </div><!-- /.card-body -->
        <div class="overlay">
          <div class="button text-center">
            <a href="#" class="btn btn-warning rounded-pill btn-xs m-1 px-3" data-toggle="modal" data-target="#editProduct">Edit</a><br>
            <a href="{{ route('products.variants') }}" class="btn btn-info rounded-pill btn-xs m-1 px-3">Set Variants</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-2 col-md-3">
      <div class="card">
        <div class="card-header" style="padding: 10px">
          <div style="width: 100%; height: 100%;">
            <img src="https://previews.123rf.com/images/larryratt/larryratt1711/larryratt171100027/89263818-mini-rice-sushi-burgers-with-smoked-salmon-green-salad-and-sauces-black-sesame-served-on-white-squar.jpg" width="100%" style="border-top-left-radius: 2%; border-top-right-radius: 2%">
          </div>
        </div>
        <div class="card-body p-2 mx-2">
          <span>$2.50</span>
        </div><!-- /.card-body -->
      </div>
    </div>
    <div class="col-lg-2 col-md-3">
      <div class="card">
        <div class="card-header" style="padding: 10px">
          <div style="width: 100%; height: 100%;">
            <img src="https://previews.123rf.com/images/larryratt/larryratt1711/larryratt171100027/89263818-mini-rice-sushi-burgers-with-smoked-salmon-green-salad-and-sauces-black-sesame-served-on-white-squar.jpg" width="100%" style="border-top-left-radius: 2%; border-top-right-radius: 2%">
          </div>
        </div>
        <div class="card-body p-2 mx-2">
          <span>$3.50</span>
        </div><!-- /.card-body -->
      </div>
    </div>
    <div class="col-lg-2 col-md-3">
      <div class="card">
        <div class="card-header" style="padding: 10px">
          <div style="width: 100%; height: 100%;">
            <img src="https://previews.123rf.com/images/profotokris/profotokris1501/profotokris150100061/35844659-canapes-with-smoked-salmon-healthy-food-square-composition-.jpg" width="100%" style="border-top-left-radius: 2%; border-top-right-radius: 2%">
          </div>
        </div>
        <div class="card-body p-2 mx-2">
          <span>$2.50</span>
        </div><!-- /.card-body -->
      </div>
    </div>
    <div class="col-lg-2 col-md-3">
      <div class="card">
        <div class="card-header" style="padding: 10px">
          <div style="width: 100%; height: 100%;">
            <img src="https://www.crippsfamilyfishfarm.com.au/wp-content/uploads/Seafood-Platter-Large.jpg" width="100%" style="border-top-left-radius: 2%; border-top-right-radius: 2%">
          </div>
        </div>
        <div class="card-body p-2 mx-2">
          <span>$2.50</span>
        </div><!-- /.card-body -->
      </div>
    </div>
    <div class="col-lg-2 col-md-3">
      <div class="card">
        <div class="card-header" style="padding: 10px">
          <div style="width: 100%; height: 100%;">
            <img src="https://www.drinksonwheels.asia/wp-content/uploads/2020/05/Tiger-bottle-beer-case.png" width="100%" style="border-top-left-radius: 2%; border-top-right-radius: 2%">
          </div>
        </div>
        <div class="card-body p-2 mx-2">
          <span>$2.50</span>
        </div><!-- /.card-body -->
      </div>
    </div>
    <div class="col-lg-2 col-md-3">
      <div class="card">
        <div class="card-header" style="padding: 10px">
          <div style="width: 100%; height: 100%;">
            <img src="https://previews.123rf.com/images/larryratt/larryratt1711/larryratt171100027/89263818-mini-rice-sushi-burgers-with-smoked-salmon-green-salad-and-sauces-black-sesame-served-on-white-squar.jpg" width="100%" style="border-top-left-radius: 2%; border-top-right-radius: 2%">
          </div>
        </div>
        <div class="card-body p-2 mx-2">
          <span>$2.50</span>
        </div><!-- /.card-body -->
      </div>
    </div>
    <div class="col-lg-2 col-md-3">
      <div class="card">
        <div class="card-header" style="padding: 10px">
          <div style="width: 100%; height: 100%;">
            <img src="https://www.gourmetfoodworld.com/images/product/large/2306_1_.jpg" width="100%" style="border-top-left-radius: 2%; border-top-right-radius: 2%">
          </div>
        </div>
        <div class="card-body p-2 mx-2">
          <span>$4.50</span>
        </div><!-- /.card-body -->
      </div>
    </div>
    <div class="col-lg-2 col-md-3">
      <div class="card">
        <div class="card-header" style="padding: 10px">
          <div style="width: 100%; height: 100%;">
            <img src="https://previews.123rf.com/images/larryratt/larryratt1711/larryratt171100027/89263818-mini-rice-sushi-burgers-with-smoked-salmon-green-salad-and-sauces-black-sesame-served-on-white-squar.jpg" width="100%" style="border-top-left-radius: 2%; border-top-right-radius: 2%">
          </div>
        </div>
        <div class="card-body p-2 mx-2">
          <span>$5.50</span>
        </div><!-- /.card-body -->
      </div>
    </div>
    <div class="col-lg-2 col-md-3">
      <div class="card">
        <div class="card-header" style="padding: 10px">
          <div style="width: 100%; height: 100%;">
            <img src="https://www.gourmetfoodworld.com/images/product/large/2306_1_.jpg" width="100%" style="border-top-left-radius: 2%; border-top-right-radius: 2%">
          </div>
        </div>
        <div class="card-body p-2 mx-2">
          <span>$2.50</span>
        </div><!-- /.card-body -->
      </div>
    </div>
    <div class="col-lg-2 col-md-3">
      <div class="card">
        <div class="card-header" style="padding: 10px">
          <div style="width: 100%; height: 100%;">
            <img src="https://www.gourmetfoodworld.com/images/product/large/2306_1_.jpg" width="100%" style="border-top-left-radius: 2%; border-top-right-radius: 2%">
          </div>
        </div>
        <div class="card-body p-2 mx-2">
          <span>$1.50</span>
        </div><!-- /.card-body -->
      </div>
    </div>
    <div class="col-lg-2 col-md-3">
      <div class="card">
        <div class="card-header" style="padding: 10px">
          <div style="width: 100%; height: 100%;">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQx-5f126FMW_3et2KEtfkuF-lyJ58TT0FvyHDac0aQlcnQgwsWsFZqmtwAm4_aXaug930&usqp=CAU" width="100%" style="border-top-left-radius: 2%; border-top-right-radius: 2%">
          </div>
        </div>
        <div class="card-body p-2 mx-2">
          <span>$2.50</span>
        </div><!-- /.card-body -->
      </div>
    </div>
    <div class="col-lg-2 col-md-3">
      <div class="card">
        <div class="card-header" style="padding: 10px">
          <div style="width: 100%; height: 100%;">
            <img src="https://previews.123rf.com/images/profotokris/profotokris1501/profotokris150100061/35844659-canapes-with-smoked-salmon-healthy-food-square-composition-.jpg" width="100%" style="border-top-left-radius: 2%; border-top-right-radius: 2%">
          </div>
        </div>
        <div class="card-body p-2 mx-2">
          <span>$8.50</span>
        </div><!-- /.card-body -->
      </div>
    </div>
    <div class="col-lg-2 col-md-3">
      <div class="card">
        <div class="card-header" style="padding: 10px">
          <div style="width: 100%; height: 100%;">
            <img src="https://ocs-k8s-prod-cm.s3.ap-southeast-1.amazonaws.com/PRODUCT_1591070336806.jpeg" width="100%" style="border-top-left-radius: 2%; border-top-right-radius: 2%">
          </div>
        </div>
        <div class="card-body p-2 mx-2">
          <span>$2.50</span>
        </div><!-- /.card-body -->
      </div>
    </div>
    <div class="col-lg-2 col-md-3">
      <div class="card">
        <div class="card-header" style="padding: 10px">
          <div style="width: 100%; height: 100%;">
            <img src="https://www.gourmetfoodworld.com/images/product/large/2306_1_.jpg" width="100%" style="border-top-left-radius: 2%; border-top-right-radius: 2%">
          </div>
        </div>
        <div class="card-body p-2 mx-2">
          <span>$2.50</span>
        </div><!-- /.card-body -->
      </div>
    </div>
    <div class="col-lg-2 col-md-3">
      <div class="card">
        <div class="card-header" style="padding: 10px">
          <div style="width: 100%; height: 100%;">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQx-5f126FMW_3et2KEtfkuF-lyJ58TT0FvyHDac0aQlcnQgwsWsFZqmtwAm4_aXaug930&usqp=CAU" width="100%" style="border-top-left-radius: 2%; border-top-right-radius: 2%">
          </div>
        </div>
        <div class="card-body p-2 mx-2">
          <span>$2.50</span>
        </div><!-- /.card-body -->
      </div>
    </div>
    <div class="col-lg-2 col-md-3">
      <div class="card">
        <div class="card-header" style="padding: 10px">
          <div style="width: 100%; height: 100%;">
            <img src="https://previews.123rf.com/images/profotokris/profotokris1501/profotokris150100061/35844659-canapes-with-smoked-salmon-healthy-food-square-composition-.jpg" width="100%" style="border-top-left-radius: 2%; border-top-right-radius: 2%">
          </div>
        </div>
        <div class="card-body p-2 mx-2">
          <span>$2.50</span>
        </div><!-- /.card-body -->
      </div>
    </div>
    <div class="col-lg-2 col-md-3">
      <div class="card">
        <div class="card-header" style="padding: 10px">
          <div style="width: 100%; height: 100%;">
            <img src="https://previews.123rf.com/images/profotokris/profotokris1501/profotokris150100061/35844659-canapes-with-smoked-salmon-healthy-food-square-composition-.jpg" width="100%" style="border-top-left-radius: 2%; border-top-right-radius: 2%">
          </div>
        </div>
        <div class="card-body p-2 mx-2">
          <span>$2.50</span>
        </div><!-- /.card-body -->
      </div>
    </div>
  </div>