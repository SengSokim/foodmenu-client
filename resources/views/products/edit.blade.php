<div class="modal fade" id="editProduct" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Product Information</h5>
      </div>
      <div class="modal-body m-1">
        <div class="row">
          <div class="col-md-3">
              <div class="form-group">
                <img id="img-upload" class="img-fluid img-circle mb-3" src="{{ asset('adminlte/dist/img/logo/emenu-square-black-bg-with-stroke.png') }}">
                <input type='file' id="img-input" name="image" accept=".jpg,.png" style="display: none"/>
                <input class="btn-upload btn btn-primary form-control" type="button" value="Browse" onclick="document.getElementById('img-input').value='';document.getElementById('img-input').click();">
              </div>
            </div>
            <div class="col-md-9">
              <div class="form-group">
                <label class="required">Name</label>
                <input type="text" name="name" class="form-control" :class="{'is-invalid': errors.has('name') }" v-model="data.name"  v-validate="'required'" placeholder="Product name"/> 
                <div class="invalid-feedback">@{{ errors.first('name') }}</div>
              </div>
              <div class="form-group">
                <label class="required">Price</label>
                <input type="number" name="price" class="form-control" :class="{'is-invalid': errors.has('price') }" v-model="data.price"  v-validate="'required'" step="0.01"/> 
                <div class="invalid-feedback">@{{ errors.first('phone_number') }}</div>
              </div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label class="required">Product Category</label>
              <select name="product_categories_id" class="form-control product-category-select2" :class="{'is-invalid': errors.has('product_category_id') }" style="width: 100%">
                <option value="1">Beer</option>
                <option value="2">Drinnk</option>
              </select>
              <div class="invalid-feedback">@{{ errors.first('product_categories_id') }}</div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label>Display Sequence</label>
              <input type="number" name="sequence" class="form-control" step="1"/> 
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label class="required">Description</label>
              <textarea class="form-control" name="description" rows="3" placeholder="Write something..."></textarea>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning rounded-pill">Deactive</button>
        <button type="button" class="btn btn-secondary rounded-pill" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary rounded-pill">Save changes</button>
      </div>
    </div>
  </div>
</div>