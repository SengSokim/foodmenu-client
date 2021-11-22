<div class="form-group">
    <label>{{ __('app.table.name') }}<span style="color: red">*</span></label>
    <input type="text" name="name" class="form-control" :class="{'is-invalid': errors.has('name') }" name="name" v-model="data.name" v-validate="'required'" placeholder="Table Name...">
    <span class="invalid-feedback">@{{ errors.first('name') }}</span>
</div>
<div class="form-group m-0">
    <input type="checkbox" v-model="data.enable_status">
    <label for="status">Active</label>
</div>