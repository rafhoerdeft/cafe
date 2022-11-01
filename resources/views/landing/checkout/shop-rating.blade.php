<div>
    <span class="gl-star-rating">
        <select id="rating-shop" class="star-rating-prebuilt">
            <option value="">Select Rating</option>
            <option value="5">Satisfied</option>
            <option value="4">Good</option>
            <option value="3">Not Bad</option>
            <option value="2">Bad</option>
            <option value="1">Very Bad</option>
        </select>
        <span class="gl-star-rating--stars mx-auto">
            <span data-value="1" class=""><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                    class="gl-emote" style="pointer-events: none;">
                    <circle class="gl-emote-bg" fill="#f06b4a" cx="12" cy="12" r="10">
                    </circle>
                    <path fill="#393939"
                        d="M12 14.6c1.48 0 2.9.38 4.15 1.1a.8.8 0 01-.79 1.39 6.76 6.76 0 00-6.72 0 .8.8 0 11-.8-1.4A8.36 8.36 0 0112 14.6zm4.6-6.25a1.62 1.62 0 01.58 1.51 1.6 1.6 0 11-2.92-1.13c.2-.04.25-.05.45-.08.21-.04.76-.11 1.12-.18.37-.07.46-.08.77-.12zm-9.2 0c.31.04.4.05.77.12.36.07.9.14 1.12.18.2.03.24.04.45.08a1.6 1.6 0 11-2.34-.38z">
                    </path>
                </svg></span>
            <span data-value="2" class=""><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                    class="gl-emote" style="pointer-events: none;">
                    <circle class="gl-emote-bg" fill="#fcbe58" cx="12" cy="12" r="10">
                    </circle>
                    <path fill="#393939"
                        d="M12 14.8c1.48 0 3.08.28 3.97.75a.8.8 0 11-.74 1.41A8.28 8.28 0 0012 16.4a9.7 9.7 0 00-3.33.61.8.8 0 11-.54-1.5c1.35-.48 2.56-.71 3.87-.71zM15.7 8c.25.31.28.34.51.64.24.3.25.3.43.52.18.23.27.33.56.7A1.6 1.6 0 1115.7 8zM8.32 8a1.6 1.6 0 011.21 2.73 1.6 1.6 0 01-2.7-.87c.28-.37.37-.47.55-.7.18-.22.2-.23.43-.52.23-.3.26-.33.51-.64z">
                    </path>
                </svg></span>
            <span data-value="3" class=""><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                    class="gl-emote" style="pointer-events: none;">
                    <circle class="gl-emote-bg" fill="#fcdc4c" cx="12" cy="12" r="10">
                    </circle>
                    <path fill="#393939"
                        d="M15.33 15.2a.8.8 0 01.7.66.85.85 0 01-.68.94h-6.2c-.24 0-.67-.26-.76-.7-.1-.38.17-.81.6-.9zm.35-7.2a1.6 1.6 0 011.5 1.86A1.6 1.6 0 1115.68 8zM8.32 8a1.6 1.6 0 011.21 2.73A1.6 1.6 0 118.33 8z">
                    </path>
                </svg></span>
            <span data-value="4" class=""><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                    class="gl-emote" style="pointer-events: none;">
                    <circle class="gl-emote-bg" fill="#c8de3c" cx="12" cy="12" r="10">
                    </circle>
                    <path fill="#393939"
                        d="M15.45 15.06a.8.8 0 11.8 1.38 8.36 8.36 0 01-8.5 0 .8.8 0 11.8-1.38 6.76 6.76 0 006.9 0zM15.68 8a1.6 1.6 0 011.5 1.86A1.6 1.6 0 1115.68 8zM8.32 8a1.6 1.6 0 011.21 2.73A1.6 1.6 0 118.33 8z">
                    </path>
                </svg></span>
            <span data-value="5" class=""><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                    class="gl-emote" style="pointer-events: none;">
                    <circle class="gl-emote-bg" fill="#81e364" cx="12" cy="12" r="10">
                    </circle>
                    <path fill="#393939"
                        d="M16.8 14.4c.32 0 .59.2.72.45.12.25.11.56-.08.82a6.78 6.78 0 01-10.88 0 .78.78 0 01-.05-.87c.14-.23.37-.4.7-.4zM15.67 8a1.6 1.6 0 011.5 1.86A1.6 1.6 0 1115.68 8zM8.32 8a1.6 1.6 0 011.21 2.73A1.6 1.6 0 118.33 8z">
                    </path>
                </svg></span>
        </span>
    </span>
</div>

@push('css_plugin')
    <link rel="stylesheet" href="{{ asset_ext('rating-js/dist/star-rating-new.css?ver=4.3.0') }}">
    <link rel="stylesheet" href="{{ asset_ext('rating-js/demo/styles-new.css') }}">
@endpush

@push('js_plugin')
    <script src="{{ asset_ext('rating-js/dist/star-rating.min.js?ver=4.3.0') }}"></script>
@endpush

@push('js_script')
    <script>
        var starratingPrebuilt = new StarRating('.star-rating-prebuilt', {
            prebuilt: true,
            maxStars: 5,
        });
    </script>

    {{-- <script>
        $('#rating-shop').change(function() {
            let text = $(this).find('option:selected').text();
            $('#text-selected').html(text);
        });
    </script> --}}
@endpush
