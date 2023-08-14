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
                        @if (checkPermissionOr($auth->user->permissions, ['roles-update', 'roles-delete']))
                            @if ($list->id == 1)
                                <a href="{{ route('roles.show', $list->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye fa-fw"></i></a>
                            @else
                                @if (checkPermission($auth->user->permissions, 'roles-update'))
                                    <a href="{{ route('roles.show', $list->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-edit fa-fw"></i>
                                    </a>
                                @endif

                                @if (checkPermission($auth->user->permissions, 'roles-delete'))
                                    <button data-toggle="modal" data-target="#modal_delete_role_{{ $list->id }}" class="btn btn-danger btn-sm">
                                        <i class="far fa-trash-alt fa-fw"></i>

                                    </button>
                                @endif
                            @endif
                        @endif
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
