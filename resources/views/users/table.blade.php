<div class="table-responsive">
  <table class="table table-striped table-hover table-bordered" v-cloak>
    <thead>
      <tr class="text-center">
        <th>#</th>
        <th>{{ __('app.user.image') }}</th>
        <th>{{ __('app.user.name') }}</th>
        <th>{{ __('app.user.gender') }}</th>
        <th>{{ __('app.user.phone-number') }}</th>
        <th>{{ __('app.user.role') }}</th>
        <th>{{ __('app.global.status') }}</th>
        <th>{{ __('app.global.actions') }}</th>
      </tr>
    </thead>
    <tbody>
      <tr class="text-center" v-for="(item, index) in restaurant_users.data">
        <td>@{{ index + 1 }}</td>
        <td><img :src="item.media.url" class="user_image"></td>
        <td>@{{ item.name}}</td>
        <td >@{{ item.gender }}</td>
        <td>@{{ item.phone_number }}</td>
        <td style="text-transform: capitalize">@{{ item.role }}</td>
        <td>@{{ item.enable_status ? 'Active' : 'Deactive' }}</td>
        <td>
          <button @click="setData(item)" class="btn btn-primary btn-sm rounded-pill" title="Edit" data-toggle="modal" data-target="#editUser" style="padding: .425rem .55rem"><i class="fas fa-edit fa-fw"></i></button>
          <button @click="setData(item)" class="btn btn-danger btn-sm rounded-pill"  title="Delete" data-toggle="modal" data-target="#delete-user" style="padding: .425rem .55rem"><i class="fas fa-trash-alt fa-fw"></i></button>
        </td>
      </tr>
    </tbody>
  </table>
</div>