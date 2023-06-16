<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <!--     CSS    -->
    <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">
    <style>
        a {
            text-decoration: none !important;
        }
    </style>


    <!-- Scripts -->

</head>

<body>

    @include('layouts.inc.frontnavbar')


    <div class="content">
        @yield('content')
    </div>


    <div class="whatsapp-chat">
        <a href="https://wa.me/0602959869?text=I'm%20interested%20in%20your%20car%20for%20sale" target="_blank">
            <img src="{{ asset('assets/images/WhatsApp_icon.png') }}" alt="" width="100px" height="100px">
        </a>
    </div>



    <script src="{{ asset('frontend/js/jquery-3.6.4.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    <script src="{{ asset('frontend/js/checkout.js') }}"></script>


    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/647620d774285f0ec46e8972/1h1mn0jid';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script> --}}

    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <script>
        $(function() {
            var availableTags = [];

            $.ajax({
                method: "GET",
                url: "product-list",
                success: function(response) {
                    // console.log(response);
                    startAutocomplete(response)
                }
            });

            function startAutocomplete(availableTags) {
                $("#search_product").autocomplete({
                    source: availableTags
                });
            }
        });
    </script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if (session('status'))
        <script>
            swal("{{ session('status') }}");
        </script>
    @endif

    @yield('scripts')
</body>

</html>
