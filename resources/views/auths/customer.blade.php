<div>
    <div class="check-in-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="login-form">
                        <h2>Check In</h2>
                        <form action="#">
                            <div class="group-input">
                                <input type="text" id="code" class="text-center" placeholder="Insert Code"
                                    maxlength="6" style="letter-spacing: 10px; font-size: 25px;">
                            </div>

                            <button type="submit" class="site-btn login-btn">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('css_style')
    <style>
        .check-in-section {
            top: 40%;
            transform: translate(0, -40%);
            position: absolute;
            width: 100%;
        }

        .check-in-section h2 {
            font-size: 25px;
        }
    </style>
@endpush
