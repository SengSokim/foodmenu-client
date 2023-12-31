<div class="table-responsive">
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>
                    <div style="width: 120px"></div>{{ __('app.orders.code') }}
                </th>
                <th>
                    <div style="width: 120px"></div>Customer Name
                </th>
                <th>
                    <div style="width: 120px"></div>{{ __('app.orders.phone-number') }}
                </th>
                <th>
                    <div style="width: 120px"></div>{{ __('app.orders.order-date') }}
                </th>
                <th class="text-center">{{ __('app.global.status') }}</th>
                <th class="text-center">
                    <div style="width: 90px"></div>{{ __('app.global.actions') }}
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $index => $list)
                <tr id='tr{{ $index }}'>
                    <td class="text-primary text-bold">{{ '#' . sprintf("%'.06d", $list->code) }}</td>
                    <td class="text-capitalize">{{ $list->customer_name }}</td>
                    <td>{{ $list->phone_number }}</td>
                    <td>{{ $list->created_at }}</td>
                    <td class="text-center">
                        @if ($list->status == 'pending')
                            <span class="badge badge-info"><em>{{ $list->status }}</em></span>
                        @elseif($list->status == 'confirmed')
                            <span class="badge badge-primary"><em>{{ $list->status }}</em></span>
                        @elseif($list->status == 'received')
                            <span class="badge badge-success"><em>{{ $list->status }}</em></span>
                        @elseif($list->status == 'rejected')
                            <span class="badge badge-danger"><em>{{ $list->status }}</em></span>
                        @endif
                    </td>
                    <td class="text-center">
                        @if ($list->status == 'confirmed')
                            @if (checkPermission($auth->user->permissions, 'orders-delete'))
                                <button class="btn btn-danger btn-sm" style="padding: .425rem .55rem"
                                    title="Order confirmed, you cannot delete the order!" disabled><i
                                        class="fas fa-ban fa-fw"></i></button>
                            @endif
                        @else
                            @if (checkPermission($auth->user->permissions, 'orders-delete'))
                                <button class="btn btn-danger btn-sm" style="padding: .425rem .55rem"
                                    data-toggle="modal" data-target="#delete-order-{{ $list->id }}"
                                    title="Delete"><i class="fas fa-trash fa-fw"></i></button>
                                @include('orders.delete')
                            @endif
                        @endif
                    </td>
                </tr>
                <tr id="trdetail{{ $index }}" class="table-detail o-hide tabs-card-container"
                    style="padding: 10px;">
                    <td colspan="9">
                        <div class="card card-warning card-outline card-outline-tabs">
                            <div class="card-header p-0 border-bottom-0">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item"><a class="nav-link active" data-toggle="pill"
                                            href="#tabOrderDetail{{ $index }}" role="tab"
                                            aria-controls="custom-tabs-four-home" aria-selected="false"><b>Order
                                                Details</b></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabOrderDetail{{ $index }}"
                                        role="tabpanel">
                                        @include('orders.tab_order.order-detail')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
                <script type="text/javascript">
                    $('#tr{{ $index }}').click(function() {
                        if ($('#trdetail{{ $index }}').hasClass('o-show')) {
                            $('#trdetail{{ $index }}').removeClass('o-show');
                            $('#trdetail{{ $index }}').addClass('o-hide');
                        } else {
                            $('.table-detail').addClass("o-hide");
                            $('#trdetail{{ $index }}').removeClass('o-hide');
                            $('#trdetail{{ $index }}').addClass('o-show');
                        }
                    });
                </script>
            @empty
                <tr>
                    <td colspan="99">
                        <p class="text-center">No order</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
