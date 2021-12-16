<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <img id="user-upload" class="img-fluid img-circle mb-3" :src="data.image ? data.image : (data.media ? data.media.url : '{{ asset('adminlte/dist/img/placeholder/square-placeholder.png') }}')">
            <input type='file' id="user-input" name="image" accept=".jpg,.png" @change="uploadImage" style="display: none"/>
            <input class="btn-upload btn btn-default" type="button" :class="{'is-invalid' : error.image}" value="{{ __('app.global.browse') }}" onclick="document.getElementById('user-input').click();" style="width: 100%"/>
            <div class="invalid-feedback">@{{ error.image }}</div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="form-group" :class="{'has-error' : error.name}">
            <label class="required">{{ __('app.user.name') }}</label>
            <input type="text" class="form-control" name="name" :class="{'is-invalid': errors.has('name') }" name="name" v-model="data.name" v-validate="'required'" placeholder="{{ __('app.user.name') }}..." >
            <span class="invalid-feedback">@{{errors.first('name')}}</span>
        </div>
        <div class="form-group">
            <label class="required">{{ __('app.user.gender')}}</label>
            <select class="form-control" :class="{'is-invalid': errors.has('gender') }" name="gender" v-model="data.gender" v-validate="'required'">
                <option :value="null">{{ __('app.user.select-gender') }}</option>
                <option value="male">{{ __('app.user.male') }}</option>
                <option value="female">{{ __('app.user.female') }}</option>
            </select>
            <span class="invalid-feedback">@{{ errors.first('gender') }}</span>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label class="required">{{ __('app.user.phone-number') }}</label>
            <input type="tel" class="form-control" name="phone_number" :class="{'is-invalid': errors.has('phone_number') }" v-model="data.phone_number" v-validate="'required'" placeholder="{{ __('app.user.phone-number') }}..." >
            <span class="invalid-feedback">@{{errors.first('phone_number')}}</span>
        </div>
        <div class="form-group" v-show="!data.id">
            <label class="required">{{ __('app.user.password') }}</label>
            <input type="password" class="form-control" name="password" :class="{'is-invalid': errors.has('password') }" v-model="data.password" v-validate="'required'"   placeholder="********">
            <small class="text-muted"><strong>Hint:</strong> Must be at least 8</small> <br>
            <span class="invalid-feedback">@{{ errors.first('password') }}</span>
        </div>
        <div class="form-group">
            <label class="required">{{ __('app.user.role') }}</label>
            <select class="form-control" name="role" :class="{'is-invalid': errors.has('role') }" v-model="data.role" v-validate="'required'" >
                <option :value = "null">{{ __('app.user.select-role') }}</option>
                <option value="manager">{{ __('app.user.manager') }}</option>
                <option value="admin">{{ __('app.user.admin') }}</option>
                <option value="staff">{{ __('app.user.staff') }}</option>
            </select>
            <span class="invalid-feedback">@{{errors.first('role')}}</span>
        </div>      
        <div class="form-group">
            <label>{{ __('app.user.address') }}</label>
            <textarea  rows="3" class="form-control" placeholder="{{ __('app.user.your-address') }}..." v-model="data.address"></textarea>
        </div>
        <div class="form-group m-0">
            <label class="inline-label">
                <input type="checkbox" v-model="data.enable_status">&nbsp; {{ __('app.product.active') }}
            </label>
        </div>
    </div>
</div>