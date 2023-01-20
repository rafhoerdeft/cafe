<div>
    <div class="product-list">
        <div class="row gx-3">
            @foreach ($menus as $menu)
                <div class="col-lg-3 col-6">
                    @livewire('landing.menu.single.index', ['menu_id' => encode($menu->id), 'category_name' => $menu->menu_categories->name], key('menu-' . encode($menu->id)))
                </div>
            @endforeach
        </div>
    </div>
</div>

@push('js_script')
    <script>
        window.addEventListener('menuChanged', event => {
            $('.img').each(function() {
                var bg = $(this).data('src');
                $(this).css('background-image', 'url(' + bg + ')');
            });

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
        })
    </script>
@endpush
