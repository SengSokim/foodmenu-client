<div class="row" style="background-color: #fff; padding: 20px; width: 100%" >
  <div class="col-md-6 col-sm-6 info-line">
    <div class="row" style="border-bottom: solid 1px #ccc; text-align: left;">
      <div class="col-md-6 col-sm-6">{{ __('app.orders.code') }}</div>
      <div class="col-md-6 col-sm-6">
        <label> {{ "#".sprintf("%'.06d", $list->code) }}</label>
      </div>
    </div>
   
    <div class="row" style="border-bottom: solid 1px #ccc; text-align: left;">
      <div class="col-md-6 col-sm-6">
        {{ __('app.global.total') }}
      </div>
      <div class="col-md-6 col-sm-6">
        <label>{{ formatCurrency($list->total) }}</label>
      </div>
    </div>
  </div> 

  <div class="col-md-1 sol-sm-1"></div>

  <div class="col-md-5 col-sm-5 info-line">
    <div class="row" style="border-bottom: solid 1px #ccc; text-align: left;">
      <div class="col-md-6 col-sm-6">{{ __('app.orders.ordered-mode') }}</div>
      <div class="col-md-6 col-sm-6">
        @if ($list->table_id)
          <label>{{ $list->table->name }}</label>
        @else
          <label>Restaurant</label>
        @endif
      </div>
    </div>
    <div class="row" style="border-bottom: solid 1px #ccc; text-align: left;">
        <div class="col-md-6 col-sm-6">
            {{ __('app.orders.order-date') }}
        </div>
        <div class="col-md-6 col-sm-6">
            <label>{{ $list->created_at }}</label>
        </div>
    </div>
    {{-- <div class="row" style="border-bottom: solid 1px #ccc; text-align: left;">
        <div class="col-md-6 col-sm-6">
            {{ __('app.global.status') }}
        </div>
        <div class="col-md-6 col-sm-6">
            <label><em>{{ $list->status }}</em></label>
        </div>
    </div>
    <div class="row" style="border-bottom: solid 1px #ccc; text-align: left;">
        <div class="col-md-6 col-sm-6">
            @if($list->status == 'rejected')
                {{ __('app.orders.rejected-by') }}
            @else
                {{ __('app.orders.seller') }}
            @endif
        </div>
        <div class="col-md-6 col-sm-6">
            <label>{{ $list->user->username ?? 'N/A' }}</label>
        </div>
    </div> --}}
  </div>  
  <div class="col-md-12" style="margin-top:10px;">
    <div class="table-responsive">
      <table class="table table-bordered table-hover table-sm">
        <thead class="table-warning">
          <th class="text-center">#</th>
          <th>{{ __('app.orders.product-name') }}</th>
          <th class="text-center">{{ __('app.orders.qty') }}</th>
          <th class="text-right">{{ __('app.orders.price') }}</th>
          <th class="text-right">{{ __('app.orders.subtotal') }}</th>
          @if ($list->status == 'pending')
            <th class="text-center"></th>
          @endif
        </thead>
        <tbody>
          @foreach($list->products as $index => $item)
          <tr>
              <td class="text-center">{{ $data->firstItem() + $index }}</td>
              <td style="vertical-align: middle">
                <span>{{ $item->name_en }}</span>
                @if ($item->variant_values)
                  <br>
                  <small class="text-muted">
                    @foreach ( $item->variant_values as $v)
                      <span class="bg-light rounded-pill px-2 py-1">{{ $v->variant->name_en }} : {{ $v->name_en }}</span>
                    @endforeach
                    @if($v->extra_price != 0)
                      <br><em class="ml-2">Extra Price: {{  formatCurrency($v->extra_price)  }} </em>
                    @endif
                  </small>
                @endif
              </td>
              <td class="text-center">{{$item->qty}}</td>
              <td class="text-right">{{formatCurrency($item->selling_price)}}</td>
              <td class="text-right">{{formatCurrency($item->sub_total)}}</td>
              @if ($list->status == 'pending')
              <td class="text-center">
                <button class="btn btn-danger rounded-pill btn-sm" style="padding: 0 .38rem" data-toggle="modal" data-target="#remove-item-{{ $item->id }}" title="Remove Item"><i class="fas fa-times"></i></button>
                  @include('orders.tab_order.delete')
              </td>
              @endif
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  @if($list->status == 'pending')
    <div class="row">
      <div class="col-md-12">
        <a href="#modelConfirm_{{$list->id}}" class="btn btn-primary btn-sm " data-toggle="modal">
            {{ __('app.global.confirm') }}
        </a>
        <a href="#modelReject_{{$list->id}}" class="btn btn-danger btn-sm delete-button" data-toggle="modal" >
            {{ __('app.orders.reject') }}
        </a>
        <div class="modal fade" id="modelReject_{{$list->id}}" tabindex="-1" data-keyboard="false" data-backdrop="static" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">{{ __('app.orders.reject-order') }}</h4>
              </div>
              <div class="modal-body">
                {{ __('app.orders.are-you-sure-you-want-to-reject-this-order') }} <span class="text-warning text-bold">{{ "#".sprintf("%'.06d", $list->code) }}</span>?
              </div>
              <div class="modal-footer">
                <form action="{{ route('orders.update', $list->id) }}" method="POST">
                  @csrf
                  <input type="hidden" name="status" value="rejected">
                  <button type="button" class="btn btn-default rounded-pill btn-sm" data-dismiss="modal">{{ __('app.global.cancel') }}</button>
                  <button type="submit" class="btn btn-danger rounded-pill btn-sm">{{ __('app.global.confirm') }}</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="modelConfirm_{{ $list->id }}" tabindex="-1" data-keyboard="false" data-backdrop="static" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">{{ __('app.orders.confirmation-order') }}</h4>
              </div>
              <div class="modal-body">
                {{ __('app.orders.you-are-confirmation-order-code') }}<span class="text-warning text-bold">{{ "#".sprintf("%'.06d", $list->code) }}
              </div>
              <div class="modal-footer">
                <form action="{{ route('orders.update', $list->id) }}" method="POST">
                  @csrf
                  <input type="hidden" name="status" value="confirmed">
                  <button type="button" class="btn btn-default rounded-pill btn-sm" data-dismiss="modal">{{ __('app.global.cancel') }}</button>
                  <button type="submit" class="btn btn-warning rounded-pill btn-sm">{{ __('app.global.confirm') }}</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  @elseif($list->status == 'confirmed')
    <a href="#modelReceive_{{$list->id}}" class="btn btn-success btn-sm" data-toggle="modal" >
      {{ __('app.orders.receive') }}
    </a>
    <div class="modal fade" id="modelReceive_{{ $list->id }}" tabindex="-1" data-keyboard="false" data-backdrop="static" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">{{ __('app.orders.receive-order') }}</h4>
          </div>
          <div class="modal-body">
            {{ __('app.orders.are-you-sure-you-this-order') }} <span class="text-warning text-bold">{{ "#".sprintf("%'.06d", $list->code) }}</span> {{ __('app.orders.is-received') }} ?
          </div>
          <div class="modal-footer">
            <form action="{{ route('orders.update', $list->id) }}" method="POST">
              @csrf
              <input type="hidden" name="status" value="received">
              <button type="button" class="btn btn-default rounded-pill btn-sm" data-dismiss="modal">{{ __('app.global.cancel') }}</button>
              <button type="submit" class="btn btn-warning rounded-pill btn-sm">{{ __('app.orders.receive') }}</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  @endif
</div>
