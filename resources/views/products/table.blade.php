<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th scope="col">Media</th>
                <th scope="col">Product Code</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Sequence</th>
                <th scope="col">Category Name</th>
                <th scope="col" class="text-center">
                    <div style="width: 100px"></div>Action
                </th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(item, index) in products.data">
                <td class="text-center">@{{ index + 1 }}</td>
                {{-- :src="data.image ? data.image : (data.media ? data.media.url : '{{ asset('adminlte/dist/img/placeholder/square-placeholder.png') }}')" --}}
                <td>
                    <img data-lity
                        :src="item.media?.url ?? '{{ asset('adminlte/dist/img/placeholder/square-placeholder.png') }}'"
                        alt="" width="50px">
                </td>
                <td>@{{ item.code ?? '' }}</td>
                <td>@{{ item?.name }}</td>
                <td class="text-center">@{{ item.description }}</td>
                <td class="text-center">$@{{ item.price }}</td>
                <td>@{{ item.sequence }}</td>
                <td>@{{ item.category?.name }}</td>
                <td class="text-center">
                    @if (checkPermission($auth->user->permissions, 'product-update-status'))
                        <a href="#" class="btn btn-outline-success btn-sm" v-if="item.enable_status"
                            style="padding: .425rem .55rem" data-toggle="modal" data-target="#status"
                            @click="setData(item)" title="Status"><i class="fas fa-check"></i></a>
                        <a href="#" class="btn btn-outline-warning btn-sm" v-else style="padding: .425rem .75rem"
                            data-toggle="modal" data-target="#status" @click="setData(item)" title="Status"><i
                                class="fas fa-times"></i></a>
                    @endif
                    @if (checkPermission($auth->user->permissions, 'product-update'))
                        <button class="btn btn-primary btn-sm" style="padding: .425rem .55rem" data-toggle="modal"
                            data-target="#editProduct" @click="setData(item);" title="Edit"><i
                                class="fas fa-edit fa-fw"></i></button>
                    @endif
                    @if (checkPermission($auth->user->permissions, 'product-delete'))
                        <button class="btn btn-danger btn-sm" style="padding: .425rem .55rem" data-toggle="modal"
                            data-target="#deleteProduct" @click="setData(item)" title="Delete"><i
                                class="fas fa-trash fa-fw"></i></button>
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
</div>
