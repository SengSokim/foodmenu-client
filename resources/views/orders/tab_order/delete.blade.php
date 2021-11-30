<div class="modal fade" id="remove-item-{{ $item->id }}" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{ __('app.ordera.delete-product') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('orders.product.delete', $item->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <div class="modal-body text-center">
            <h6>{{ __('app.order.do-you-want-to-delete-this-item:') }} ?</h6>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default rounded-pill btn-sm" data-dismiss="modal">{{ __('app.global.cancel') }}</button>
          <button type="submit" class="btn btn-danger rounded-pill btn-sm">{{ __('app.global.confirm') }}</button>
        </div>
      </form>
    </div>
  </div>
</div>
