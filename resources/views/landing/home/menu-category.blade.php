<div>
    <section class="product-category spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="product-large set-bg" data-setbg="{{ $background }}">
                        <h2 class="d-none d-lg-block label-box">Menu Category</h2>
                        <h2 class="d-block d-lg-none">Menu Category</h2>
                        {{-- <a href="#">Discover More</a> --}}
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-1">
                    <div class="filter-control">
                        <ul class="nav slick-tab">
                            @foreach ($menu_categories as $item)
                                <li class="nav-item {{ $item->id == 1 ? 'active' : '' }}">
                                    <a class="nav-link" href="#" data-bs-toggle="tab"
                                        data-bs-target="#{{ $item->code }}"
                                        role="tab">{{ text_uc($item->name) }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="tab-content">
                        @foreach ($menu_categories as $item)
                            <div class="tab-pane fade {{ $item->id == 1 ? 'show active' : '' }}"
                                id="{{ $item->code }}" role="tabpanel" aria-labelledby="{{ $item->code }}-tab">
                                <div class="product-slider owl-carousel">
                                    @foreach ($item->menus->take(5) as $menu)
                                        @livewire('landing.menu.single.index', ['menu_id' => encode($menu->id), 'category_name' => $item->name, 'label' => ['name' => 'Sale', 'color' => '']], key('menu-' . encode($menu->id)))
                                    @endforeach
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 offset-sm-4 mt-3 d-grid gap-2">
                                        <a class="primary-btn text-center" href="#">View All
                                            {{ $item->name }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>

@push('css_plugin')
    <link rel="stylesheet" type="text/css" href="{{ asset_ext('slick/slick.css') }}" />
@endpush

@push('css_style')
    <style>
        .slick-tab .slick-list {
            padding-bottom: 3px;
        }
    </style>
@endpush

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

    {{-- <script>
        $('.tab-content .product-slider .product-item img').on('load', function() {
            console.log(this);
        });
    </script> --}}
@endpush
