@include('layouts.master_header')

<body class="hold-transition">
    <div class="row" style="width: 100%; margin-left: 0;">
        <div class="col-lg-12">
            <div class="" style="margin-top: 7%;">
                @yield('content')
            </div>
        </div>
    </div>
</body>
<script>
    function togglePass() {
        var x = document.getElementById("password");
        if (x.type === "password" ) {
            x.type = "text";
            document.getElementById("showPassword").style.display="block";
            document.getElementById("hidePassword").style.display="none";

        }else {
            x.type = "password";
            document.getElementById("showPassword").style.display="none";
            document.getElementById("hidePassword").style.display="block";
        }
    }
</script>
@include('layouts.master_footer')
