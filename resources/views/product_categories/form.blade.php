<div class="form-group">
    <label class="required">Name</label>
    <input type="text" class="form-control" :class="{'is-invalid': errors.has('name') }" name="name" v-model="data.name" v-validate="'required'" placeholder="Category Name...">
    <div class="invalid-feedback">@{{ errors.first('name') }}</div>
</div>
<div class="form-group">
    <label>Display Sequence</label>
    <input type="number" class="form-control" :class="{'is-invalid': errors.has('sequence') }" name="sequence" v-model="data.sequence" step="1" v-validate="'required'">
    <div class="invalid-feedback">@{{ errors.first('sequence') }}</div>
</div>
<div class="form-group m-0">
    <input type="checkbox" v-model="data.enable_status"> <label>Active</label>
</div>