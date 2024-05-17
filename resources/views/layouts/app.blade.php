<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    @include('landing.layouts.meta')

    <meta name="turbolinks-cache-control" content="no-cache">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    {{-- <link rel="stylesheet" href="{{ asset('landing/css/bootstrap.min.css') }}" type="text/css"> --}}
    <link rel="stylesheet" href="{{ asset_ext('bootstrap-5.1.3/css/bootstrap.min.css') }}" type="text/css">
    {{-- <link rel="stylesheet" href="{{ asset_ext('fontawesome-6.2.0/css/all.min.css') }}" type="text/css"> --}}
    <link rel="stylesheet" href="{{ asset('landing/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('landing/css/themify-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('landing/css/glyphter-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('landing/css/elegant-icons.css') }}" type="text/css">
    {{-- <link rel="stylesheet" href="{{ asset('landing/css/owl.carousel.min.css') }}" type="text/css"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('landing/css/nice-select.css') }}" type="text/css"> --}}
    <link rel="stylesheet" href="{{ asset('landing/css/jquery-ui.min.css') }}" type="text/css">
    {{-- <link rel="stylesheet" href="{{ asset('landing/css/slicknav-new.min.css') }}" type="text/css"> --}}
    <link rel="stylesheet" href="{{ asset('landing/css/style-new.css') }}" type="text/css">

    <link rel="stylesheet" href="{{ asset('landing/css/theme/' . $theme_color) }}" type="text/css">

    <!-- Skeleton Lazy Load -->
    <link rel="stylesheet" href="/css/skeleton.css">

    <!-- Animate Transition -->
    {{-- <link rel="stylesheet" href="/css/turn.css"> --}}

    <!-- Plugin CSS -->
    @stack('css_plugin')

    <!-- Style CSS -->
    @stack('css_style')

    @livewireStyles

    @livewireScripts

    <!-- Js Plugins -->
    <script src="{{ asset('landing/js/jquery-3.3.1.min.js') }}"></script>

</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    {{ $slot }}

    {{-- <button class="back-to-top rounded-circle" id="myBtn" title="Go to top">
        <i class="fa fa-arrow-up"></i>
    </button> --}}

    <!-- Js Plugins -->
    {{-- <script src="{{ asset('landing/js/bootstrap.min.js') }}"></script> --}}
    <script src="{{ asset_ext('bootstrap-5.1.3/js/bootstrap.bundle.min.js') }}"></script>
    {{-- <script src="{{ asset_ext('fontawesome-6.2.0/js/all.min.js') }}"></script> --}}
    <script src="{{ asset('landing/js/jquery-ui.min.js') }}"></script>

    {{-- <script src="{{ asset('landing/js/jquery.zoom.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('landing/js/jquery.dd.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('landing/js/jquery.slicknav.js') }}"></script> --}}
    {{-- <script src="{{ asset('landing/js/owl.carousel.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('landing/js/main_new.js') }}"></script> --}}

    {{-- <script src="{{ asset_js_config('localstorage_conf.js') }}"></script> --}}
    {{-- <script src="{{ asset_js_config('block.js') }}"></script> --}}

    <!-- Plugin JS -->
    @stack('js_plugin')

    <!-- Script JS -->
    @stack('js_script')

    <script>
        $(window).on('load', function() {
            $(".loader").fadeOut();
            $("#preloder").delay(200).fadeOut("slow");
        });

        /* Back To Top */
        $(document).ready(function() {
            $(window).on("scroll", function() {
                if ($(this).scrollTop() > 300) {
                    $('.back-to-top').fadeIn();
                } else {
                    $('.back-to-top').fadeOut();
                }
            });
            $('.back-to-top').on("click", function() {
                $("html, body").animate({
                    scrollTop: 0
                }, 600);
                return false;
            });
        });
    </script>

</body>

</html>
