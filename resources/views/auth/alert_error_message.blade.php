@if(session()->get('error'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        @if(is_string(session()->get('error')))
            {{ session()->get('error') }}
        @elseif(isset(session()->get('error')['val']))
            @foreach(session()->get('error')['val'] as $error)
                {{ $error }}<br>
            @endforeach
        @endif
    </div>
@elseif(session()->get('message'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ session()->get('message') }}
    </div>
@endif
