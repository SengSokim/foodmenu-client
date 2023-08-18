<div class="row">
  <div class="col-md-3">
      <div class="form-group">
        <img data-lity id="product-upload" class="img-fluid mb-3" :src="data.image ? data.image : (data.media ? data.media.url : '{{ asset('adminlte/dist/img/placeholder/square-placeholder.png') }}')">
        <input type='file' id="product-input" name="image" accept=".jpg,.png" @change="uploadImage"  style="display: none"/>
        <input class="btn-upload btn btn-default" type="button" :class="{'is-invalid' : error.image}" value="Browse" onclick="document.getElementById('product-input').click();" style="width: 100%"/>
        <div class="invalid-feedback">@{{ error.image }}</div>
      </div>
    </div>
    <div class="col-md-9">
      <div class="form-group">
        <label class="required">Product Code</label>
        <input type="text" class="form-control" :class="{'is-invalid': errors.has('code') }" name="code" v-model="data.code" v-validate="'required'" placeholder="Product Code...">
        <div class="invalid-feedback">@{{ errors.first('code') }}</div>
      </div>
      <div class="form-group">
        <label class="required">{{ __('app.product.name') }}</label>
        <input type="text" class="form-control" :class="{'is-invalid': errors.has('name') }" name="name" v-model="data.name" v-validate="'required'" placeholder="Product Name...">
        <div class="invalid-feedback">@{{ errors.first('name') }}</div>
      </div>
      
    </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="form-group">
      <label class="required">{{ __('app.product.price') }}</label>
      <input type="number" name="price" class="form-control" :class="{'is-invalid': errors.has('price') }" v-model="data.price"  v-validate="'required'" step="0.01" min="0"/>
      <div class="invalid-feedback">@{{ errors.first('price') }}</div>
    </div>
  </div>
  
  <div class="col-md-12">
    <div class="form-group">
      <label class="required">{{ __('app.product.product-category') }}</label>
      <select name="category_id" id="product_category" v-model="data.category_id" v-select2 class="form-control select2" v-validate="'required'" data-vv-as="product category">
        <option v-for="item in product_categories" :value="item.id">@{{ item.name }}</option>
      </select>
      <div class="invalid-feedback">@{{ errors.first('category_id') }}</div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="form-group">
      <label>{{ __('app.product.display-sequence') }}</label>
      <input type="number" class="form-control" :class="{'is-invalid': errors.has('sequence') }" name="sequence" v-model="data.sequence" step="1" v-validate="'required'">
      <div class="invalid-feedback">@{{ errors.first('sequence') }}</div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="form-group">
      <label>{{ __('app.product.description') }}</label>
      <textarea class="form-control" name="description" v-model="data.description" rows="3" placeholder="Write something..."></textarea>
    </div>
  </div>
</div>
