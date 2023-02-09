<div>
    <a class="cart-link" href="javascript:void(0)">
        <i class="icon_bag_alt"></i>
        <span>{{ $count_list_cart }}</span>
    </a>

    @if ($list_cart != null)
        <div class="cart-hover">
            <div class="btn-close-box">
                <button type="button" class="btn btn-sm btn-danger rounded-circle" title="Close">
                    <i class="ti-close font-weight-bold"></i>
                </button>
            </div>
            <div class="select-items">
                <table>
                    <tbody>
                        @foreach ($list_cart as $item)
                            <tr>
                                <td class="si-pic">
                                    <img src="{{ show_file($item['photo']) }}" alt="">
                                </td>
                                <td class="si-text">
                                    <div class="product-selected">
                                        <p>Rp {{ nominal($item['price']) }} x {{ $item['amount'] }}</p>
                                        <h6>{{ $item['name'] }}</h6>
                                        <span class="badge rounded-pill primary-bg" style="font-size: 10px;">
                                            {{ $item['option_name'] }}
                                        </span>
                                    </div>
                                </td>
                                {{-- <td class="si-close">
                                    <i class="ti-close"></i>
                                </td> --}}
                            </tr>
                        @endforeach
                        @if ($count_list_cart > count($list_cart))
                            @php
                                $more = $count_list_cart - count($list_cart);
                            @endphp
                            <tr>
                                <td class="si-text">
                                    <div style="margin-top: -10px">...</div>
                                    <h6>{{ $more }} more</h6>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="select-total mb-0">
                {{-- <span>total:</span>
                <h5>$120.00</h5> --}}
            </div>
            <div class="select-button">
                <a href="{{ route('landing.cart') }}" class="primary-btn view-card mb-0">VIEW CART</a>
            </div>
        </div>

        <script>
            $('.cart-icon .cart-hover .btn-close-box button').click(function() {
                $('.cart-icon .cart-hover').removeClass('cart-hover-show');
            });
        </script>
    @endif
</div>
