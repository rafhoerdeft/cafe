<div>
    <section class="checkout-section py-5">
        <div class="container">
            <form action="#" class="checkout-form">
                <div class="row">
                    <div class="col-lg-4 offset-lg-4">
                        <h4>Customer Data</h4>
                        <form class="row">
                            <div class="col-lg-12">
                                <label for="first_name">Full Name<span>*</span></label>
                                <input type="text" id="first_name">
                            </div>
                            {{-- <div class="col-lg-12">
                                <label for="last_name">Last Name</label>
                                <input type="text" id="last_name">
                            </div> --}}
                            <div class="col-lg-12">
                                <label for="email">Email Address<span>*</span></label>
                                <input type="text" id="email" class="mb-0">
                            </div>
                            <div class="col-lg-12 mb-4">
                                <span class="fst-italic text-muted">
                                    <i class="fa fa-exclamation-circle"></i>
                                    Invoice will be sent to your email
                                </span>
                            </div>
                            <div class="col-lg-12">
                                <label for="phone_number">Phone Number</label>
                                <input type="text" id="phone_number">
                            </div>
                            <div class="col-lg-12">
                                <label for="rating">Rate Us<span>*</span></label>
                                @livewire('landing.checkout.shop-rating')
                            </div>
                            <div class="col-lg-12 mt-4">
                                <button type="submit" class="btn primary-btn d-block text-center w-100" value="">
                                    Pay Now
                                </button>
                            </div>
                        </form>
                    </div>

                    {{-- <div class="col-lg-6">
                        <div class="place-order">
                            <h4>Your Order</h4>
                            <div class="order-total">
                                <ul class="order-table">
                                    <li>Product <span>Total</span></li>
                                    <li class="fw-normal">Combination x 1 <span>$60.00</span></li>
                                    <li class="fw-normal">Combination x 1 <span>$60.00</span></li>
                                    <li class="fw-normal">Combination x 1 <span>$120.00</span></li>
                                    <li class="fw-normal">Subtotal <span>$240.00</span></li>
                                    <li class="total-price">Total <span>$240.00</span></li>
                                </ul>
                                <div class="payment-check">
                                    <div class="pc-item">
                                        <label for="pc-check">
                                            Cheque Payment
                                            <input type="checkbox" id="pc-check">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="pc-item">
                                        <label for="pc-paypal">
                                            Paypal
                                            <input type="checkbox" id="pc-paypal">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="order-btn">
                                    <button type="submit" class="site-btn place-btn">Place Order</button>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </form>
        </div>
    </section>
</div>
