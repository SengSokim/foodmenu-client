<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="required">Name</label>
                        <input type="text" class="form-control" :class="{'is-invalid' : errors.first('name')}"
                            name="name" v-model="data.name" placeholder="Name" v-validate="'required'">
                        <span class="invalid-feedback">@{{ errors . first('name') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    @include('roles.features.category')
    @include('roles.features.product')
    @include('roles.features.orders')
    @include('roles.features.security')
</div>
