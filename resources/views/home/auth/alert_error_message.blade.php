@if(session()->get('error') && isset(session()->get('error')['msg']) && isset(session()->get('error')['msg']))
    <div class="alert alert-danger">
        {{ session()->get('error')['msg'] }}
    </div>
@elseif(session()->get('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
