<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th>Image</th>
                <th>Category</th>
                <th>Code</th>
                <th>Name</th>
                <th>Price</th>
                <th>Sequence</th>
                <th>Description</th>
                <th class="text-center">
                    <div style="width: 100px"></div>Action
                </th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(item, index) in products.data">
                <td class="text-center">@{{ index + 1 }}</td>
                <td>
                    <img data-lity
                        :src="item.media?.url ?? '{{ asset('adminlte/dist/img/placeholder/square-placeholder.png') }}'"
                        alt="" width="50px">
                </td>
                <td>@{{ item.category?.name }}</td>
                <td>@{{ item.code ?? '' }}</td>
                <td>@{{ item?.name }}</td>
                <td class="text-center">$@{{ item.price }}</td>
                <td>@{{ item.sequence }}</td>
                <td class="text-center">@{{ item.description }}</td>
                <td class="d-flex">
                    @if (checkPermission($auth->user->permissions, 'product-update-status'))
                        <button class="btn btn-outline-success btn-sm mr-1" v-if="item.enable_status"
                         data-toggle="modal" data-target="#status"
                            @click="setData(item)" title="Status"><i class="fas fa-check"></i></button>
                        <button class="btn btn-outline-warning btn-sm mr-1" v-else
                            data-toggle="modal" data-target="#status" @click="setData(item)" title="Status"><i
                                class="fas fa-times"></i></button>
                    @endif
                    @if (checkPermission($auth->user->permissions, 'product-update'))
                        <button class="btn btn-primary btn-sm mr-1" data-toggle="modal"
                            data-target="#editProduct" @click="setData(item);" title="Edit"><i
                                class="fas fa-edit fa-fw"></i></button>
                    @endif
                    @if (checkPermission($auth->user->permissions, 'product-delete'))
                        <button class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#deleteProduct" @click="setData(item)" title="Delete"><i
                                class="fas fa-trash fa-fw"></i></button>
                    @endif
                </td>
            </tr>
            <tr class="text-center" v-if="!products.data.length">
                <td colspan="99">No Record</td>
            </tr>
        </tbody>
    </table>
</div>
