<div>
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="cart-table">
                        @foreach ($list_cart as $key => $item)
                            <div class="skeleton-content">
                                <div class="row gx-0 pb-3 skeleton-wrap">

                                    <div class="col-3 col-md-2 cart-pic pe-3 m-auto">
                                        <img class="w-100 img-cart" src="{{ show_file($item['photo']) }}" alt="">
                                    </div>

                                    {{-- Desktop Screen  --}}
                                    <div class="col-md-5 d-none d-md-block cart-title my-auto pe-2">
                                        <h5 class="fs-6">{{ $item['name'] }}</h5>
                                        <span class="badge rounded-pill primary-bg">{{ $item['option_name'] }}</span>
                                    </div>
                                    <div class="col-md-2 d-none d-md-block total-price my-auto">
                                        <p class="m-0">Rp {{ nominal($item['price']) }}</p>
                                    </div>

                                    {{-- Mobile Screen  --}}
                                    <div class="col-5 d-block d-md-none cart-title my-auto">
                                        <p>Rp {{ nominal($item['price']) }}</p>
                                        <h5>{{ $item['name'] }}</h5>
                                        <span class="badge rounded-pill primary-bg"
                                            style="font-size: 10px;">{{ $item['option_name'] }}</span>
                                    </div>
                                    <div class="col-3 col-md-2 my-auto">
                                        <div class="quantity">
                                            <div class="pro-qty qty-sm">
                                                <span class="dec qtybtn"
                                                    wire:click="updateAmount('minus', {{ $key }})">-</span>
                                                <input type="text" wire:model="list_cart.{{ $key }}.amount"
                                                    readonly>
                                                <span class="inc qtybtn"
                                                    wire:click="updateAmount('plus', {{ $key }})">+</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-1 col-md-1 close-td">
                                        <div class="border-start border-1">
                                            <i class="ti-close" wire:click="showDeleteDialog({{ $key }})"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="border-bottom border-1 mt-4"></div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 offset-lg-4 skeleton-content-total">
                    <div class="proceed-checkout skeleton-wrap">
                        <ul>
                            {{-- <li class="subtotal">Subtotal <span>$240.00</span></li> --}}
                            <li class="cart-total">
                                Total <span class="text-capitalize"> Rp {{ nominal($total) }}</span>
                            </li>
                        </ul>
                        <a href="javascript:void(0)" class="proceed-btn" wire:click="showOrderDialog">PROCEED TO
                            ORDER</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Delete Dialog Modal  --}}
    <div class="modal fade" id="removeListCartModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="removeListCartModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div class="swal2-icon swal2-warning swal2-icon-show mt-0"
                        style="display: flex; width: 4em; height: 4em">
                        <div class="swal2-icon-content" style="font-size: 2.75rem">!</div>
                    </div>
                    <div id="textAlert"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn primary-btn py-2 px-4" wire:click="removeList">Yes</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Order Dialog Modal  --}}
    <div class="modal fade" id="orderModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="orderModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div class="swal2-icon swal2-question swal2-icon-show mt-0"
                        style="display: flex; width: 4em; height: 4em">
                        <div class="swal2-icon-content" style="font-size: 2.75rem">?</div>
                    </div>
                    <div id="textAlert">
                        Are you sure to order the menu? <br> Menu that have been ordered cannot be cancelled.
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn primary-btn py-2 px-4" wire:click="orderProcess">Yes</button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('css_plugin')
    <link rel="stylesheet" href="{{ asset_ext('sweetalert/css/sweetalert2.min.css') }}">
@endpush

@push('js_plugin')
    <script src="{{ asset_ext('sweetalert/js/sweetalert2.all.min.js') }}"></script>
@endpush


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

@push('js_script')
    <script>
        $(document).ready(function() {
            $('.skeleton-content-total').each(function(i, obj) {
                let self = this;
                $(self).find('.skeleton-wrap').addClass('opacity-0'); // set opacity text 0
                $(self).find('.skeleton-wrap').wrap(
                    '<div class="skeleton wave"></div>'); // to wrap element
                setTimeout(function() {
                    $(self).find('.skeleton-wrap').unwrap();
                    $(self).find('.skeleton-wrap').addClass('opacity-100');
                }, 1000);

            });

            $('.skeleton-content').each(function(i, obj) {
                let self = this;
                $(self).find('.skeleton-wrap').addClass('opacity-0'); // set opacity text 0
                $(self).find('.skeleton-wrap').addClass('mb-3'); // set opacity text 0
                $(self).find('.skeleton-wrap').wrap(
                    '<div class="skeleton wave"></div>'); // to wrap element

                let imgUrl = $(self).find('.img-cart').attr('src');

                var tmpImg = new Image();
                tmpImg.src = imgUrl;
                tmpImg.onload = function() {
                    $(self).find('.skeleton-wrap').unwrap();
                    $(self).find('.skeleton-wrap').addClass('opacity-100');
                    $(self).find('.skeleton-wrap').removeClass('mb-3');
                };
            });
        })
    </script>
@endpush

@push('js_script')
    <script>
        window.addEventListener('show-delete-dialog', event => {
            let name = event.detail.name;
            $('#removeListCartModal .modal-body #textAlert').html('<b class="primary-text">' + name +
                '</b> <br> Do you want to remove it from the list?');
            $('#removeListCartModal').modal('show');
        })
    </script>

    <script>
        window.addEventListener('close-delete-dialog', event => {
            $('#removeListCartModal').modal('hide');
        })
    </script>
@endpush

@push('js_script')
    <script>
        window.addEventListener('show-order-dialog', event => {
            $('#orderModal').modal('show');
        })
    </script>

    <script>
        window.addEventListener('close-order-dialog', event => {
            $('#orderModal').modal('hide');
        })
    </script>
@endpush
