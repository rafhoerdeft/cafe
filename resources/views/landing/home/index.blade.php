<div>
    @if ($config['carousel'] == 1)
        @livewire('landing.home.carousel', ['show_popular_menu' => $config['carousel_popular_menu'], 'show_blog' => $config['carousel_blog']])
    @endif
    @livewire('landing.home.menu-category', ['background' => $config['image_category_menu']])
    @livewire('landing.home.best-seller')
    @livewire('landing.home.popular-menu')
    @if ($config['blog'] == 1)
        @livewire('landing.home.latest-blog')
    @endif

</div>

@push('js_script')
    {{-- show skeleton lazy loading to all who load background image --}}
    <script>
        $(document).ready(function() {
            // Background Carousel
            $('[data-setbg]').each(function(i, obj) {
                let self = this;
                $(self).wrap('<div class="skeleton wave h-100"></div>'); // to wrap element
                let imgUrl = $(self).data().setbg;
                $('<img>').attr('src', function() {
                    return imgUrl;
                }).on('load', function() {
                    $(self).unwrap();
                });
            });

            // Product Item
            $('.product-item .pi-pic .img').each(function(i, obj) {
                let self = this;
                $(self).wrap('<div class="skeleton wave"></div>'); // to wrap element

                $(self).closest('.product-item')
                    .find('.pi-text>div, .pi-text>a')
                    .addClass('opacity-0'); // set opacity text 0

                $(self).closest('.product-item')
                    .find('.pi-text>div, .pi-text>a')
                    .wrap('<div class="skeleton wave"></div>'); // to wrap element

                let imgUrl = $(self).data().src;
                $('<img>').attr('src', function() {
                    return imgUrl;
                }).on('load', function() {
                    $(self).unwrap();

                    $(self).closest('.product-item')
                        .find('.pi-text .catagory-name, .pi-text .product-price, .pi-text a')
                        .unwrap();

                    $(self).closest('.product-item')
                        .find('.pi-text>div, .pi-text>a')
                        .addClass('opacity-100');
                });
            });

            // Blog
            $('.single-latest-blog .img').each(function(i, obj) {
                let self = this;
                $(self).wrap('<div class="skeleton wave"></div>'); // to wrap element

                $(self).closest('.single-latest-blog')
                    .find('.latest-text .tag-item, .latest-text>a, .latest-text>p')
                    .addClass('opacity-0'); // set opacity text 0

                $(self).closest('.single-latest-blog')
                    .find('.latest-text .tag-item, .latest-text>a, .latest-text>p')
                    .wrap('<div class="skeleton wave"></div>'); // to wrap element

                let imgUrl = $(self).data().src;
                $('<img>').attr('src', function() {
                    return imgUrl;
                }).on('load', function() {
                    $(self).unwrap();

                    $(self).closest('.single-latest-blog')
                        .find(
                            '.latest-text .tag-item, .latest-text a, .latest-text p'
                        )
                        .unwrap();

                    $(self).closest('.single-latest-blog')
                        .find('.latest-text .tag-item, .latest-text a, .latest-text p')
                        .addClass('opacity-100');
                });
            });
        });
    </script>
@endpush
