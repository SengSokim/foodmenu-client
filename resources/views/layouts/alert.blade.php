<script>
    window.addEventListener('pageshow', function (event) {
        if (!(event.persisted || window.performance && window.performance.navigation.type == 2))
        {
            @if (session()->has('success'))
                $.toast({
                    heading: 'Success',
                    text: '{!! session()->get('success') !!}',
                    showHideTransition: 'slide',
                    icon: 'success'
                })
                localStorage.setItem('action', '');
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
                $.alert({
                    title: 'Message!',
                    content: '{{ $message }}',
                    type: 'orange',
                    typeAnimated: true,
                    escapeKey: 'close',
                    buttons: {
                        close: function () {
                        }
                    }
                });
                @php session()->forget('error'); @endphp
            @endif
        }
    },false);
</script>


