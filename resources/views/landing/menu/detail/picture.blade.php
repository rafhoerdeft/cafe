<div class="skeleton-content-bg">
    <div class="product-pic-zoom skeleton-wrap h350" style="position: relative; overflow: hidden;">
        <img class="product-big-img" src="{{ show_file($photo) }}" alt="">
        <div class="zoom-icon">
            <i class="fa fa-search-plus"></i>
        </div>
    </div>
    {{-- <div class="product-thumbs">
        <div class="product-thumbs-track ps-slider owl-carousel">
            <div class="pt active" data-imgbigurl="{{ asset('landing/img/product-single/product-1.jpg') }}">
                <img src="{{ asset('landing/img/product-single/product-1.jpg') }}" alt="">
            </div>
            <div class="pt" data-imgbigurl="{{ asset('landing/img/product-single/product-2.jpg') }}">
                <img src="{{ asset('landing/img/product-single/product-2.jpg') }}" alt="">
            </div>
            <div class="pt" data-imgbigurl="{{ asset('landing/img/product-single/product-3.jpg') }}">
                <img src="{{ asset('landing/img/product-single/product-3.jpg') }}" alt="">
            </div>
            <div class="pt" data-imgbigurl="{{ asset('landing/img/product-single/product-3.jpg') }}">
                <img src="{{ asset('landing/img/product-single/product-3.jpg') }}" alt="">
            </div>
        </div>
    </div> --}}
</div>

@push('css_style')
    <style>
        .h350 {
            height: 350px;
        }
    </style>
@endpush

@push('js_script')
    {{-- show skeleton lazy loading to all who load background image --}}
    <script>
        $(document).ready(function() {
            // Skeleton Content
            $('.skeleton-content-bg').each(function(i, obj) {
                let self = this;
                $(self).find('.skeleton-wrap').addClass('opacity-0'); // set opacity text 0
                $(self).find('.skeleton-wrap').wrap('<div class="skeleton wave"></div>'); // to wrap element

                let imgUrl = $(self).find('.product-big-img').attr('src');

                var tmpImg = new Image();
                tmpImg.src = imgUrl;
                tmpImg.onload = function() {
                    $(self).find('.skeleton-wrap').unwrap();
                    $(self).find('.skeleton-wrap').addClass('opacity-100');
                    $(self).find('.skeleton-wrap').removeClass('h350');
                };
            });
        });
    </script>
@endpush
