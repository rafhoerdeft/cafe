<div>
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        {{-- <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Shop</span> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="product-shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>{{ text_uc($category_name) }}</h2>
                    </div>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-6 col-lg-3 offset-6 offset-lg-9 product-show-option">
                    @livewire('landing.menu.sorting')
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    @livewire('landing.menu.list-menu', ['category_name' => $category_name])
                </div>
            </div>
        </div>
    </section>

    @push('css_style')
        <style>
            .product-show-option .select-option .sorting.nice-select {
                margin: 0px;
            }
        </style>
    @endpush

    @push('js_script')
        {{-- show skeleton lazy loading to all who load background image --}}
        <script>
            $(document).ready(function() {
                // Skeleton Content
                $('.skeleton-content').each(function(i, obj) {
                    let self = this;
                    $(self).find('.skeleton-wrap').addClass('opacity-0'); // set opacity text 0
                    $(self).find('.skeleton-wrap').wrap('<div class="skeleton wave"></div>'); // to wrap element

                    let imgUrl = $(self).find('.img').data().src;
                    $('<img>').attr('src', function() {
                        return imgUrl;
                    }).on('load', function() {
                        $(self).find('.skeleton-wrap').unwrap();
                        $(self).find('.skeleton-wrap').addClass('opacity-100');
                    });
                });
            });
        </script>
    @endpush
</div>
