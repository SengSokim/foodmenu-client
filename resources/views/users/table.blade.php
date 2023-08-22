<div class="table-responsive text-nowrap">
    <table class="table table-bordered table-striped table-hover">
      <thead>
        <tr>
            <th class="text-center">#</th>
            <th class="{{ getSortClassFor('name') }}" onclick="window.location.href = '{{getSortUrlFor('name')}}'">
                Name
            </th>
            <th class="{{ getSortClassFor('email') }}" onclick="window.location.href = '{{getSortUrlFor('email')}}'">
                Email
            </th>
            <th class="{{ getSortClassFor('phone') }}" onclick="window.location.href = '{{getSortUrlFor('phone')}}'">
                Phone
            </th>
            <th class="{{ getSortClassFor('roles.name') }}" onclick="window.location.href = '{{getSortUrlFor('roles.name')}}'">
                Role
            </th>
            <th class="{{ getSortClassFor('gender') }}" onclick="window.location.href = '{{getSortUrlFor('gender')}}'">
                Gender
            </th>
            <th class="{{ getSortClassFor('status') }}" onclick="window.location.href = '{{getSortUrlFor('status')}}'">
                Status
            </th>
            <th class="text-center" style="width: 90px;">Action</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($data as $index => $list)
          {{-- @if($list->is_active == request('is_active') && $list->role == request('role')) --}}
          <tr style="color: {{ $list->is_active?'black':'grey' }}">
            <td class="text-center">{{ $data->firstItem() + $index }}</td>
            <td>{!! hightlight($list->name, request('search')) !!}</td>
            <td>{!! hightlight($list->email, request('search')) !!}</td>
            <td>{!! hightlight($list->phone, request('search')) !!}</td>
            <td>{{ $list->role->name ?? '---' }}</td>
            <td style="text-transform: capitalize">{{ $list->gender }}</td>
            <td>{{ $list->is_active ? 'Active' : 'Deactive'}}</td>
            <td class="text-center">
              @if(checkPermission($auth->user->permissions, 'users-update'))
                <a href="{{ route('users.update', $list->id) }}" class="btn btn-success btn-sm" title="Edit"><i class="far fa-edit fa-fw"></i></a>
              @endif

              <!-- Button trigger modal -->
              @if(checkPermission($auth->user->permissions, 'users-delete'))
                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteUser">
                  <i class="fas fa-trash"></i>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="deleteUser" tabindex="-1" aria-labelledby="deleteUserLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="{{ route('users.delete', $list->id) }}" method="POST">
                          @csrf
                          @method('DELETE')

                          <div class="modal-body">
                            <h6>Do you want to delete this user?</h6>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                          </div>
                      </form>
                    </div>
                  </div>
                </div>
              @endif
            </td>
          </tr>
        @empty
        <tr>
          <td colspan="99" class="text-center">{{__('general.no_record')}}</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
