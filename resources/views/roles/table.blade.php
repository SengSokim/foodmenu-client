<div class="table-responsive text-nowrap">
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th class="text-center" style="width: 10%;">#</th>
                <th class="{{ getSortClassFor('name') }}" onclick="window.location.href = '{{ getSortUrlFor('name') }}'">
                    Name
                </th>
                <th class="text-center" style="width: 7%"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $index => $list)
                <tr>
                    <td class="text-center">{{ $data->firstItem() + $index }}</td>
                    <td>{!! hightlight($list->name, request('search')) !!}</td>
                    <td class="text-center">
                        <div class="dropdown">
                            @if (checkPermissionOr($auth->user->permissions, ['roles-update', 'roles-delete']))
                                <button class="btn btn-sm btn-default" type="button" id="dropdownMenu2"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    @if ($list->id == 1)
                                        <a href="{{ route('roles.show', $list->id) }}" class="dropdown-item">
                                            <span style="margin: 0 5px"><i class="fas fa-eye fa-fw"></i> Show</span>
                                        </a>
                                    @else
                                        @if (checkPermission($auth->user->permissions, 'roles-update'))
                                            <a href="{{ route('roles.show', $list->id) }}" class="dropdown-item">
                                                <span style="margin: 0 5px"><i class="fas fa-edit fa-fw"></i> Edit</span>
                                            </a>
                                        @endif

                                        @if (checkPermission($auth->user->permissions, 'roles-delete'))
                                            <button class="dropdown-item" data-toggle="modal" data-target="#modal_delete_user_{{ $list->id }}" style="color: red; cursor: pointer;">
                                                <span style="margin: 0 5px"><i class="far fa-trash-alt fa-fw"></i> Delete</span>
                                            </button>
                                        @endif
                                    @endif
                                </div>
                            @endif
                        </div>
                        @include('roles.modals.delete')
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="99" class="text-center">{{ __('general.no_record') }}</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
