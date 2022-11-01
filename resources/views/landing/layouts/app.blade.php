<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    @include('landing.layouts.meta')

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
    <link rel="stylesheet" href="{{ asset('landing/css/owl.carousel.min.css') }}" type="text/css">
    {{-- <link rel="stylesheet" href="{{ asset('landing/css/nice-select.css') }}" type="text/css"> --}}
    <link rel="stylesheet" href="{{ asset('landing/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('landing/css/slicknav-new.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('landing/css/style-new.css') }}" type="text/css">

    <link rel="stylesheet" href="{{ asset('landing/css/theme/color1.css') }}" type="text/css">

    <link rel="stylesheet" type="text/css" href="{{ asset_ext('slick/slick.css') }}" />

    <!-- Plugin CSS -->
    @stack('css_plugin')

    <!-- Style CSS -->
    @stack('css_style')

    <style>
        body {
            background-color: white;
        }

        a {
            text-decoration: none;
        }

        .text-logo {
            color: #252525;
            font-weight: 900;
            font-size: 21pt;
            margin: 0px;
        }

        .filter-control ul li {
            font-size: 16px;
        }

        .product-large {
            /* height: 420px; */
            height: 100%;
            padding-top: 0px;
            padding: 15px;
        }

        .product-large h2 {
            position: relative;
            font-size: 35pt;
        }

        .label-box {
            top: 40%;
        }

        .filter-control .nav {
            display: contents;
        }

        .filter-control .nav-item {
            background: none;
            margin-inline: 5px;
        }

        .filter-control .nav-item .nav-link {
            color: #b2b2b2;
        }

        .filter-control .nav-item .nav-link:hover {
            color: #252525;
            /* font-weight: bold; */
        }

        .filter-control .nav-item.active .nav-link {
            color: #252525;
            /* font-weight: bold; */
        }

        .filter-control ul li::before {
            background: var(--main-color);
        }

        .product-item .pi-pic ul li a {
            padding: 5px 8px;
        }

        @media only screen and (min-width: 1200px) and (max-width: 1920px) {
            .product-item .pi-pic ul li a {
                padding: 10px 12px;
            }
        }

        .slick-tab .slick-list {
            padding-bottom: 3px;
        }
    </style>

    @livewireStyles

</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    @include('landing.layouts.header')

    {{-- @livewire('landing.header') --}}

    @yield('content')

    <button class="back-to-top rounded-circle" id="myBtn" title="Go to top">
        <i class="fa fa-arrow-up"></i>
    </button>

    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-left">
                        <div class="footer-logo">
                            <a href="#"><img src="{{ asset('landing/img/footer-logo.png') }}" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: 60-49 Road 11378 New York</li>
                            <li>Phone: +65 11.188.888</li>
                            <li>Email: hello.colorlib@gmail.com</li>
                        </ul>
                        <div class="footer-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-youtube"></i></a>
                            <a href="#"><i class="icon icon-tiktok"></i></a>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-2 offset-lg-1">
                    <div class="footer-widget">
                        <h5>Menu Category</h5>
                        <ul>
                            <li><a href="#">Food</a></li>
                            <li><a href="#">Drink</a></li>
                            <li><a href="#">Snack</a></li>
                            <li><a href="#">Desert</a></li>
                        </ul>
                    </div>
                </div> --}}
                {{-- <div class="col-lg-2">
                    <div class="footer-widget">
                        <h5>My Account</h5>
                        <ul>
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Shopping Cart</a></li>
                            <li><a href="#">Shop</a></li>
                        </ul>
                    </div>
                </div> --}}
                {{-- <div class="col-lg-4">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63291.69535092096!2d110.13578695820311!3d-7.494927699999981!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a8f9282097a29%3A0xb29e7a4504007f89!2sSeroja%20Cafe%20%26%20Resto!5e0!3m2!1sid!2sid!4v1663947081355!5m2!1sid!2sid"
                        width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div> --}}
            </div>
        </div>
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;
                            {{ date('Y') }}
                            <a class="primary-text" href="https://erdevapp.com">ErdevApp</a>
                            {{-- | This template is made with <i
                                class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com"
                                target="_blank">Colorlib</a> --}}
                        </div>
                        {{-- <div class="payment-pic">
                            <img src="{{ asset('landing/img/payment-method.png') }}" alt="">
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    @livewireScripts

    <!-- Js Plugins -->
    <script src="{{ asset('landing/js/jquery-3.3.1.min.js') }}"></script>
    {{-- <script src="{{ asset('landing/js/bootstrap.min.js') }}"></script> --}}
    <script src="{{ asset_ext('bootstrap-5.1.3/js/bootstrap.bundle.min.js') }}"></script>
    {{-- <script src="{{ asset_ext('fontawesome-6.2.0/js/all.min.js') }}"></script> --}}
    <script src="{{ asset('landing/js/jquery-ui.min.js') }}"></script>
    {{-- <script src="{{ asset('landing/js/jquery.countdown.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('landing/js/jquery.nice-select.min.js') }}"></script> --}}
    <script src="{{ asset('landing/js/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('landing/js/jquery.dd.min.js') }}"></script>
    <script src="{{ asset('landing/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('landing/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('landing/js/main_new.js') }}"></script>

    {{-- <script src="{{ asset_js_config('block.js') }}"></script> --}}

    <!-- Plugin JS -->
    @stack('js_plugin')

    <!-- Script JS -->
    @stack('js_script')

    {{-- <script type="module">
        import hotwiredTurbo from 'https://cdn.skypack.dev/@hotwired/turbo';
    </script>

    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js"
        data-turbolinks-eval="false"></script>

    <script src="{{ mix('js/app.js') }}"></script> --}}
</body>

</html>
