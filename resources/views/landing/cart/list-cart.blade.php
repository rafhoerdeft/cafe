<div>
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="cart-table">
                        <div class="row gx-0 pb-3">

                            <div class="col-3 col-md-2 cart-pic pe-3 m-auto">
                                <img class="w-100" src="{{ asset('landing/img/select-product-1.jpg') }}" alt="">
                            </div>

                            {{-- Desktop Screen  --}}
                            <div class="col-md-5 d-none d-md-block cart-title my-auto pe-2">
                                <h5 class="fs-6">Kabino Bedside Table</h5>
                                <span class="badge rounded-pill primary-bg">Level 3</span>
                            </div>
                            <div class="col-md-2 d-none d-md-block total-price my-auto">
                                <p class="m-0">$60.00</p>
                            </div>

                            {{-- Mobile Screen  --}}
                            <div class="col-5 d-block d-md-none cart-title my-auto">
                                <p>$60.00</p>
                                <h5>Kabino Bedside Table</h5>
                                <span class="badge rounded-pill primary-bg" style="font-size: 10px;">Level 3</span>
                            </div>
                            <div class="col-3 col-md-2 my-auto">
                                {{-- <p>$60.00</p> --}}
                                <div class="quantity">
                                    <div class="pro-qty qty-sm">
                                        <input type="text" value="1">
                                    </div>
                                </div>
                            </div>
                            <div class="col-1 col-md-1 close-td">
                                <div class="border-start border-1">
                                    <i class="ti-close"></i>
                                </div>
                            </div>
                        </div>

                        <div class="row gx-0 pb-3">

                            <div class="col-3 col-md-2 cart-pic pe-3 m-auto">
                                <img class="w-100" src="{{ asset('landing/img/select-product-1.jpg') }}"
                                    alt="">
                            </div>

                            {{-- Desktop Screen  --}}
                            <div class="col-md-5 d-none d-md-block cart-title my-auto pe-2">
                                <h5 class="fs-6">Kabino Bedside Table</h5>
                                <span class="badge rounded-pill primary-bg">Level 3</span>
                            </div>
                            <div class="col-md-2 d-none d-md-block total-price my-auto">
                                <p class="m-0">$60.00</p>
                            </div>

                            {{-- Mobile Screen  --}}
                            <div class="col-5 d-block d-md-none cart-title my-auto">
                                <p>$60.00</p>
                                <h5>Kabino Bedside Table</h5>
                                <span class="badge rounded-pill primary-bg" style="font-size: 10px;">Level 3</span>
                            </div>
                            <div class="col-3 col-md-2 my-auto">
                                {{-- <p>$60.00</p> --}}
                                <div class="quantity">
                                    <div class="pro-qty qty-sm">
                                        <input type="text" value="1">
                                    </div>
                                </div>
                            </div>
                            <div class="col-1 col-md-1 close-td">
                                <div class="border-start border-1">
                                    <i class="ti-close"></i>
                                </div>
                            </div>
                        </div>

                        <div class="border-bottom border-1 mt-4"></div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 offset-lg-4">
                    <div class="proceed-checkout">
                        <ul>
                            {{-- <li class="subtotal">Subtotal <span>$240.00</span></li> --}}
                            <li class="cart-total">Total <span>$240.00</span></li>
                        </ul>
                        <a href="#" class="proceed-btn">PROCEED TO ORDER</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@push('css_style')
    <style>
        .shopping-cart .quantity {
            padding: 0px !important;
        }

        .shopping-cart .pro-qty {
            width: 70px !important;
            height: 35px !important;
            padding: 0px 3px !important;
            border: 2px solid #ebebeb;
            float: unset !important;
            margin: auto !important;
        }

        .shopping-cart .pro-qty input {
            text-align: center;
            width: 35px !important;
            font-size: 14px;
            font-weight: 700;
            border: none;
            color: #4c4c4c;
            line-height: 40px;
            float: left;
            height: 32px !important;
        }

        .shopping-cart .pro-qty .qtybtn {
            font-size: 18px !important;
            color: #b2b2b2;
            float: left;
            line-height: 28px !important;
            cursor: pointer;
            width: 13px;
        }

        .cart-table table tr td.qua-col .pro-qty .qtybtn.dec {
            font-size: 22px !important;
        }
    </style>
@endpush
