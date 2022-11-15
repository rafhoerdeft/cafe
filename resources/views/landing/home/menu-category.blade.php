<div>
    <section class="product-category spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="product-large set-bg" data-setbg="{{ show_file('image/products/women-large.jpg') }}">
                        <h2 class="d-none d-lg-block label-box">Menu Category</h2>
                        <h2 class="d-block d-lg-none">Menu Category</h2>
                        {{-- <a href="#">Discover More</a> --}}
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-1">
                    <div class="filter-control">
                        <ul class="nav slick-tab">
                            <li class="nav-item active">
                                <a class="nav-link" href="#" data-bs-toggle="tab" data-bs-target="#first"
                                    role="tab">Food</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-bs-toggle="tab" data-bs-target="#second"
                                    role="tab">Drink</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-bs-toggle="tab" data-bs-target="#third"
                                    role="tab">Snack</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-bs-toggle="tab" data-bs-target="#fourth"
                                    role="tab">Desert</a>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="first" role="tabpanel"
                            aria-labelledby="first-tab">
                            <div class="product-slider owl-carousel">
                                <div class="product-item">
                                    <div class="pi-pic">
                                        <img src="{{ show_file('image/products/women-1.jpg') }}" alt="">
                                        <div class="sale">Favorite</div>
                                        <div class="icon">
                                            <i class="icon_heart_alt"></i>
                                        </div>
                                        <ul>
                                            <li class="w-icon active" title="Add to Cart">
                                                <a href="#">+ <i class="icon_bag_alt"></i></a>
                                            </li>
                                            <li class="quick-view" title="View Detail">
                                                <a href="#">Quick View</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="pi-text">
                                        <div class="catagory-name">Coat</div>
                                        <a href="#">
                                            <h5>Pure Pineapple</h5>
                                        </a>
                                        <div class="product-price">
                                            $14.00
                                            <span>$35.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item">
                                    <div class="pi-pic">
                                        <img src="{{ show_file('image/products/women-2.jpg') }}" alt="">
                                        <div class="icon">
                                            <i class="icon_heart_alt"></i>
                                        </div>
                                        <ul>
                                            <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a>
                                            </li>
                                            <li class="quick-view"><a href="#">Quick View</a></li>
                                        </ul>
                                    </div>
                                    <div class="pi-text">
                                        <div class="catagory-name">Shoes</div>
                                        <a href="#">
                                            <h5>Guangzhou sweater</h5>
                                        </a>
                                        <div class="product-price">
                                            $13.00
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item">
                                    <div class="pi-pic">
                                        <img src="{{ show_file('image/products/women-3.jpg') }}" alt="">
                                        <div class="icon">
                                            <i class="icon_heart_alt"></i>
                                        </div>
                                        <ul>
                                            <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a>
                                            </li>
                                            <li class="quick-view"><a href="#">Quick View</a></li>
                                        </ul>
                                    </div>
                                    <div class="pi-text">
                                        <div class="catagory-name">Towel</div>
                                        <a href="#">
                                            <h5>Pure Pineapple</h5>
                                        </a>
                                        <div class="product-price">
                                            $34.00
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item">
                                    <div class="pi-pic">
                                        <img src="{{ show_file('image/products/women-4.jpg') }}" alt="">
                                        <div class="icon">
                                            <i class="icon_heart_alt"></i>
                                        </div>
                                        <ul>
                                            <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a>
                                            </li>
                                            <li class="quick-view"><a href="#">Quick View</a></li>
                                        </ul>
                                    </div>
                                    <div class="pi-text">
                                        <div class="catagory-name">Towel</div>
                                        <a href="#">
                                            <h5>Converse Shoes</h5>
                                        </a>
                                        <div class="product-price">
                                            $34.00
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 offset-sm-4 mt-3 d-grid gap-2">
                                    <a class="primary-btn text-center" href="#">View All
                                        Food</a>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="second" role="tabpanel" aria-labelledby="second-tab">
                            SECOND
                        </div>

                        <div class="tab-pane fade" id="third" role="tabpanel" aria-labelledby="third-tab">
                            THIRD
                        </div>

                        <div class="tab-pane fade" id="fourth" role="tabpanel" aria-labelledby="fourth-tab">
                            FOURTH
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>

@push('js_plugin')
    <script type="text/javascript" src="{{ asset_ext('slick/slick.min.js') }}"></script>
@endpush

@push('js_script')
    <script>
        $('.filter-control .nav .nav-item').on('click', function() {
            $('.filter-control .nav').find('li.active').removeClass('active');
            $('.filter-control .nav').find('li a.active').removeClass('active');
            $(this).addClass('active');
        });
    </script>

    <script>
        $('.slick-tab').slick({
            infinite: false,
            arrows: false,
            dots: false,
            slidesToShow: 3,
            // slidesToScroll: 3,
            // centerMode: true,
            variableWidth: true
        });
    </script>
@endpush
