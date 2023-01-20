<div>
    @if ($config->carousel == 1)
        @livewire('landing.home.carousel', ['show_popular_menu' => $config->carousel_popular_menu, 'show_blog' => $config->carousel_blog])
    @endif
    @livewire('landing.home.menu-category', ['background' => $config->image_category_menu])
    @livewire('landing.home.best-seller')
    @livewire('landing.home.popular-menu')
    @if ($config->blog == 1)
        @livewire('landing.home.latest-blog')
    @endif
</div>

@push('js_script')
    {{-- show skeleton lazy loading to all who load background image --}}
    <script>
        $(document).ready(function() {
            // Skeleton Background Set
            $('[data-setbg]').each(function(i, obj) {
                let self = this;
                $(self).addClass('opacity-0'); // set opacity text 0
                $(self).wrap('<div class="skeleton wave h-100"></div>'); // to wrap element
                let imgUrl = $(self).data().setbg;
                $('<img>').attr('src', function() {
                    return imgUrl;
                }).on('load', function() {
                    $(self).unwrap();
                    $(self).addClass('opacity-100');
                });
            });

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
