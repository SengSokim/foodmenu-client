<script>
    window.addEventListener('pageshow', function (event) {
        if (!(event.persisted || window.performance && window.performance.navigation.type == 2))
        {
            @if (session()->has('success'))
                showToastSuccess('{!! session()->get('success') !!}');
                @php session()->forget('success'); @endphp
            @endif

            @if (session()->has('error'))
                @php
                    $message = $error = session()->get('error');
                    if(!is_string($error)){
                        $message = '';
                        foreach ($error as $value){
                            if(!is_string($value)){
                                foreach ($value as $moreValue){
                                    $message .= $moreValue . '\n';
                                }
                            } else {
                                $message .= $value . '\n';
                            }
                        }
                    }
                @endphp
                showAlertError('{{ $message }}');
                @php session()->forget('error'); @endphp
            @endif
        }
    },false);
</script>


