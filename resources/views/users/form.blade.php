<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="required">Name</label>
            <input type="text" class="form-control" :class="{'is-invalid' : errors.first('name')}" name="name"
                v-model="data.name" placeholder="Name" v-validate="'required'">
            <span class="text-danger">@{{ errors.first('name') }}</span>
        </div>
        <div class="form-group">
            <label class="required">Email</label>
            <input type="text" class="form-control" :class="{'is-invalid' : errors.first('email')}"
                v-model="data.email" placeholder="Email" v-validate="'required'" name="email"
                data-vv-as="phone">
            <span class="text-danger">@{{ errors.first('email') }}</span>
        </div>
        <div class="form-group" v-if="!data.id">
            <label class="required">Password</label>
            <input type="password" class="form-control"
                v-model="data.password" placeholder="password" v-validate="'required|min:8'" name="password"
                data-vv-as="password">
            <span class="text-danger">@{{ errors.first('password') }}</span>
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" class="form-control" :class="{'is-invalid' : errors.first('phone')}"
                v-model="data.phone" placeholder="Phone" name="phone" data-vv-as="phone">
            <span class="text-danger">@{{ errors.first('phone') }}</span>
        </div>
        <div class="form-group" :class="{'is-invalid' : errors.first('role')}">
            <label class="required">Role</label>
            <select name="role_id" class="form-control select2"
                v-validate="'required'" v-select2 v-model="data.role_id" data-vv-as="Role">
                <option value="null">Select an option</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
            <span class="text-danger">@{{ errors.first('role') }}</span>
        </div>
        <div class="form-group" :class="{'is-invalid' : errors.first('gender')}">
            <label class="required">Gender</label>
            <select name="gender" class="form-control select2"
                v-validate="'required'" v-select2 v-model="data.gender" data-vv-as="Gender">
                <option value="">Select an option</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            <span class="text-danger">@{{ errors.first('gender') }}</span>
        </div>
        <div class="form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" v-model="data.is_active">
                    Active
                </label>
            </div>
        </div>
    </div>
</div>
