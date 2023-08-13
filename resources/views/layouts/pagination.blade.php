<div class="pull-right my-2">
    Total : {{ $total ?? $data->total() }} record{{ ($total ?? $data->total()) > 1 ? 's' : '' }}
</div>
<div class="pull-right">
    {{ $data->links() }}
</div>
