<div>
    <header class="header-section">

        {{-- @include('landing.layouts.header-top') --}}

        {{-- HEADER --}}
        <div class="container">
            <div class="inner-header">
                <div class="row">

                    {{-- LOGO --}}
                    <div class="col-lg-3 col-md-3">
                        <div class="logo">
                            <a href="./index.html">
                                <img src="{{ asset('landing/img/logo.png') }}" alt="" class="align-baseline">
                                {{-- <label class="text-logo">Fashi.</label> --}}
                            </a>
                        </div>
                    </div>

                    {{-- SEARCH --}}
                    <div class="col-lg-6 col-md-6">
                        <div class="advanced-search">
                            {{-- <button type="button" class="category-btn">All Categories</button> --}}
                            {{-- <style>
                                .select-option .sorting {
                                    /* font-size: 0.9em !important; */
                                    width: 30%;
                                    height: 50px;
                                    float: left;
                                    background: transparent;
                                    border: none;
                                    padding-left: 23px;
                                    padding-block: 3px;
                                    padding-right: 60px;
                                    font-size: 16px;
                                    color: #252525;
                                    position: relative;
                                }

                                .select-option .sorting::before {
                                    position: absolute;
                                    right: 0;
                                    top: 14px;
                                    width: 1px;
                                    height: 20px;
                                    background: #e5e5e5;
                                    content: "";
                                }
                            </style> --}}
                            {{-- <div class="select-option">
                                <select class="sorting">
                                    <option value="">Semua Kategori</option>
                                    <option value="">Makanan</option>
                                    <option value="">Minuman</option>
                                </select>
                            </div> --}}
                            <div class="input-group mw-100">
                                <input type="text" placeholder="What do you need?" class="text-secondary">
                                <button type="button"><i class="ti-search"></i></button>
                            </div>
                        </div>
                    </div>

                    {{-- CART --}}
                    <div class="col-lg-3 text-right col-md-3">
                        <ul class="nav-right">

                            <li class="cart-icon">
                                <a href="#">
                                    <i class="icon_bag_alt"></i>
                                    <span>3</span>
                                </a>

                                <div class="cart-hover">
                                    <div class="btn-close">
                                        <button type="button" class="btn btn-sm btn-danger rounded-circle"
                                            title="Close">
                                            <i class="ti-close font-weight-bold"></i>
                                        </button>
                                    </div>
                                    <div class="select-items">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="si-pic">
                                                        <img src="{{ asset('landing/img/select-product-1.jpg') }}"
                                                            alt="">
                                                    </td>
                                                    <td class="si-text">
                                                        <div class="product-selected">
                                                            <p>$60.00 x 1</p>
                                                            <h6>Kabino Bedside Table</h6>
                                                        </div>
                                                    </td>
                                                    <td class="si-close">
                                                        <i class="ti-close"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="si-pic">
                                                        <img src="{{ asset('landing/img/select-product-2.jpg') }}"
                                                            alt="">
                                                    </td>
                                                    <td class="si-text">
                                                        <div class="product-selected">
                                                            <p>$60.00 x 1</p>
                                                            <h6>Kabino Bedside Table</h6>
                                                        </div>
                                                    </td>
                                                    <td class="si-close">
                                                        <i class="ti-close"></i>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="select-total">
                                        <span>total:</span>
                                        <h5>$120.00</h5>
                                    </div>
                                    <div class="select-button">
                                        <a href="#" class="primary-btn view-card">VIEW ALL</a>
                                        <a href="#" class="primary-btn checkout-btn">CHECK OUT</a>
                                    </div>
                                </div>
                            </li>

                            <li class="cart-price">$150.00</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{-- NAVIGATION --}}
        <div class="nav-item">
            <div class="container">
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li class="active"><a href="./index.html">Home</a></li>
                        {{-- <li><a href="./shop.html">Shop</a></li> --}}
                        <li><a href="#">Menu</a>
                            <ul class="dropdown">
                                <li><a href="#">Food</a></li>
                                <li><a href="#">Drink</a></li>
                                <li><a href="#">Snack</a></li>
                                <li><a href="#">Desert</a></li>
                            </ul>
                        </li>
                        {{-- <li><a href="./blog.html">Galery</a></li> --}}
                        <li><a href="./contact.html">Blog</a></li>
                    </ul>
                </nav>

                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
</div>

@push('js_script')
    <script>
        $('.cart-icon a').click(function() {
            if ($('.cart-hover').hasClass('cart-hover-show')) {
                $('.cart-hover').removeClass('cart-hover-show');
            } else {
                $('.cart-hover').addClass('cart-hover-show');
            }
        });

        $('.cart-hover .btn-close button').click(function() {
            $('.cart-hover').removeClass('cart-hover-show');
        });

        $(document).ready(function() {
            let width = screen.width;
            if (width >= 400) {
                width = 350 + 10;
            }
            $(".cart-hover").css("width", (width - 10) + 'px');
        });
    </script>
@endpush
