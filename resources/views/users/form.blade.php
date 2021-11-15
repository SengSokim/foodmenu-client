<div class="form-group">
    <div class="col-md-3">
        <div class="form-group" :class="{'has-error' : error.image}">
            <img id="img-upload" class="img-profile img-thumbnail" src="{{ asset('img/img-placeholder.png') }}">
            <input type='file' id="img-input" name="file_upload" class="hide-file-name" @change="uploadImage" accept=".jpg,.png"/>
            <input class="btn-upload btn btn-primary form-control" type="button" value="Browse" onclick="document.getElementById('img-input').click();">
        </div>
    </div>
    <span class="invalid-feedbacks">@{{ error.image }}</span>
</div>
<div class="form-group" :class="{'has-error' : error.username}">
    <label>Username<span style="color: red; margin-left: 2px">*</span></label>
    <input type="text" class="form-control" name="username" :class="{'is-invalid': errors.has('username') }" name="username" v-model="data.username" v-validate="'required'" placeholder="User Name..." >
    <span class="invalid-feedback">@{{errors.first('username')}}</span>
</div>
<div class="form-group">
    <label>Gender</label>
    <select class="form-control" name="gender" :class="{'is-invalid': errors.has('gender') }" name="gender" v-model="data.gender" >
        <option :value="null">Select Gender</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
    </select>
</div>
<div class="form-group">
    <label>Phone Number<span style="color: red; margin-left: 2px">*</span></label>
    <input type="tel" class="form-control" name="phone_number" :class="{'is-invalid': errors.has('phone_number') }" v-model="data.phone_number" v-validate="'required'" placeholder="Phone Number..." >
    <span class="invalid-feedback">@{{errors.first('phone_number')}}</span>
</div>
@if(isset($data->id))
    <div class="form-group">
        <input type="hidden" class="form-control" readonly >
    </div>
@else
    <div class="form-group">
        <label>Password<span style="color: red; margin-left: 2px">*</span></label>
        <input type="password" class="form-control" name="password" :class="{'is-invalid': errors.has('password') }" v-model="data.password" v-validate="'required'"   placeholder="********">
        <small class="text-muted"><strong>Hint:</strong> Must be at least 8</small> <br>
        <span class="invalid-feedback">@{{ errors.first('password') }}</span>
    </div>
@endif
<div class="form-group">
    <label>Role <span style="color: red">*</span></label>
    <select class="form-control" name="roles" :class="{'is-invalid': errors.has('roles') }" name="roles" v-model="data.roles" v-validate="'required'" >
        <option :value = "null">Select Role</option>
        <option value="male">Manager</option>
        <option value="female">admin</option>
    </select>
    <span class="invalid-feedback">@{{errors.first('roles')}}</span>
</div>      
<div class="form-group">
    <label>Desciption</label>
    <textarea  rows="3" class="form-control" placeholder="Write some description..."></textarea>
</div>
<div class="form-group m-0">
    <label class="inline-label">
        <input type="checkbox" v-model="data.enable_status">Active
    </label>
</div>