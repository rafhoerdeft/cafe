<div>
    <a class="cart-link" href="javascript:void(0)">
        <i class="icon_bag_alt"></i>
        <span>0</span>
    </a>

    @if ($menu != null)
        <div class="cart-hover">
            <div class="btn-close-box">
                <button type="button" class="btn btn-sm btn-danger rounded-circle" title="Close">
                    <i class="ti-close font-weight-bold"></i>
                </button>
            </div>
            <div class="select-items">
                <table>
                    <tbody>
                        <tr>
                            <td class="si-pic">
                                <img src="{{ asset('landing/img/select-product-1.jpg') }}" alt="">
                            </td>
                            <td class="si-text">
                                <div class="product-selected">
                                    <p>$60.00 x 1</p>
                                    <h6>Kabino Bedside Table</h6>
                                    <span class="badge rounded-pill primary-bg" style="font-size: 10px;">Level 3</span>
                                </div>
                            </td>
                            <td class="si-close">
                                <i class="ti-close"></i>
                            </td>
                        </tr>
                        <tr>
                            <td class="si-pic">
                                <img src="{{ asset('landing/img/select-product-2.jpg') }}" alt="">
                            </td>
                            <td class="si-text">
                                <div class="product-selected">
                                    <p>$60.00 x 1</p>
                                    <h6>Kabino Bedside Table</h6>
                                    <span class="badge rounded-pill primary-bg" style="font-size: 10px;">Level 3</span>
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
                <a href="#" class="primary-btn view-card mb-0">VIEW CART</a>
            </div>
        </div>

        <script>
            $('.cart-icon .cart-hover .btn-close-box button').click(function() {
                $('.cart-icon .cart-hover').removeClass('cart-hover-show');
            });
        </script>
    @endif
</div>
