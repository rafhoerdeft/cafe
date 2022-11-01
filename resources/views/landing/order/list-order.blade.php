<div>
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="cart-table">
                        <div class="row gx-0 pb-3">

                            <div class="col-3 col-md-2 cart-pic pe-3 my-auto">
                                <img class="w-100" src="{{ asset('landing/img/select-product-1.jpg') }}" alt="">
                            </div>

                            {{-- Desktop Screen  --}}
                            <div class="col-md-5 d-none d-md-block cart-title my-auto pe-2">
                                <h5 class="fs-6">Ayam geprek teriyaki saos sambal tiram rasa balado korean spicy hot
                                    jeletot huhah huhah</h5>
                                <span class="badge rounded-pill primary-bg">Level 3</span>
                            </div>
                            <div class="col-md-3 d-none d-md-block total-price my-auto">
                                <p class="m-0">$60.00</p>
                            </div>

                            {{-- Mobile Screen  --}}
                            <div class="col-6 d-block d-md-none cart-title my-auto">
                                <p>$60.00</p>
                                <h5>Ayam geprek teriyaki saos sambal tiram rasa balado korean spicy hot jeletot huhah
                                    huhah</h5>
                                <span class="badge rounded-pill primary-bg" style="font-size: 10px;">Level 3</span>
                            </div>
                            <div class="col-3 col-md-2 my-auto order-qty">
                                <div class="row gx-0">
                                    <div class="col-6 my-auto">
                                        <p>x</p>
                                    </div>
                                    <div class="col-6 my-auto">
                                        <p>3</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row gx-0 pb-3">

                            <div class="col-3 col-md-2 cart-pic pe-3 my-auto">
                                <img class="w-100" src="{{ asset('landing/img/select-product-1.jpg') }}"
                                    alt="">
                            </div>

                            {{-- Desktop Screen  --}}
                            <div class="col-md-5 d-none d-md-block cart-title my-auto pe-2">
                                <h5 class="fs-6">Ayam geprek teriyaki saos sambal tiram rasa balado korean spicy hot
                                    jeletot huhah huhah</h5>
                                <span class="badge rounded-pill primary-bg">Level 3</span>
                            </div>
                            <div class="col-md-3 d-none d-md-block total-price my-auto">
                                <p class="m-0">$60.00</p>
                            </div>

                            {{-- Mobile Screen  --}}
                            <div class="col-6 d-block d-md-none cart-title my-auto">
                                <p>$60.00</p>
                                <h5>Ayam geprek teriyaki saos sambal tiram rasa balado korean spicy hot jeletot huhah
                                    huhah</h5>
                                <span class="badge rounded-pill primary-bg" style="font-size: 10px;">Level 3</span>
                            </div>
                            <div class="col-3 col-md-2 my-auto order-qty">
                                <div class="row gx-0">
                                    <div class="col-6 my-auto">
                                        <p>x</p>
                                    </div>
                                    <div class="col-6 my-auto">
                                        <p>3</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="border-bottom border-1 mt-4"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="row">
                        <div class="col-lg-6">
                            @livewire('landing.order.discount-code')
                        </div>
                        <div class="col-lg-6">
                            @livewire('landing.order.total')
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>

@push('css_style')
    <style>
        .order-qty p {
            margin-block: auto;
        }
    </style>
@endpush
