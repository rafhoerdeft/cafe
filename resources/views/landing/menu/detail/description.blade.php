<div>
    <div class="product-details pt-0">
        <div class="pd-title">
            <span>{{ $menu->menu_categories->name }}</span>
            <h3>{{ $menu->name }}</h3>
            <a href="javascript:void(0)" class="heart-icon" wire:click="updateLike">
                <i class="{{ $like == 0 ? 'icon_heart_alt' : 'icon_heart primary-text' }}"></i>
            </a>
        </div>

        {{-- <div class="pd-rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-o"></i>
            <span>(5)</span>
        </div> --}}
        <div class="pd-desc">
            <p>{{ $menu->description }}</p>
            <h4>Rp {{ nominal($price) }}
                {{-- <span>629.99</span> --}}
            </h4>
        </div>

        <div class="pd-size-choose">
            @foreach ($menu->menu_options as $item)
                <div class="sc-item">
                    <input wire:model.defer="menu_option_id"
                        wire:click="$set('price', {{ $item->extra_price + $menu->price }})" type="radio"
                        id="{{ $item->code }}" value="{{ $item->id }}">
                    <label for="{{ $item->code }}"
                        class="{{ $menu_option_id != null ? ($menu_option_id == $item->id ? 'active' : '') : ($item->type == 0 ? 'active' : '') }}">{{ $item->name }}</label>
                </div>
            @endforeach
        </div>

        <div class="quantity">
            <div class="pro-qty">
                <span class="dec qtybtn" wire:click="updateAmount('minus')">-</span>
                <input type="text" wire:model="amount" readonly>
                <span class="inc qtybtn" wire:click="updateAmount('plus')">+</span>
            </div>
            <button type="button" class="btn primary-btn px-4" wire:click="addToCart">
                @if ($loading_button)
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                @endif
                Add To Cart
            </button>
        </div>
        {{-- <ul class="pd-tags">
                <li><span>CATEGORIES</span>: More Accessories, Wallets &amp; Cases</li>
                <li><span>TAGS</span>: Clothing, T-shirt, Woman</li>
            </ul> --}}
    </div>
</div>

@push('modal')
    <div class="modal fade" id="addToCartModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="addToCartModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    {{-- <i class="fa fa-check-circle primary-text" style="font-size: 20pt;"></i> --}}
                    <div class="swal2-icon swal2-success swal2-icon-show mt-0" style="display: flex;">
                        <div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div>
                        <span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span>
                        <div class="swal2-success-ring"></div>
                        <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>
                        <div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div>
                    </div>
                    <div id="textAlert" class="position-relative"> </div>
                </div>
            </div>
        </div>
    </div>
@endpush

@push('css_plugin')
    <link rel="stylesheet" href="{{ asset_ext('sweetalert/css/sweetalert2.min.css') }}">
@endpush

@push('js_plugin')
    <script src="{{ asset_ext('sweetalert/js/sweetalert2.all.min.js') }}"></script>
@endpush

@push('js_script')
    <script>
        window.addEventListener('show-modal', event => {
            let name = event.detail.name;
            let amount = event.detail.amount;
            $('#addToCartModal .modal-body #textAlert').html('<b class="primary-text">' + name + ' @' + amount +
                '</b> <br>has been added to the cart');
            $('#addToCartModal').modal('show');
            setTimeout(function() {
                $('#addToCartModal').modal('hide');
            }, 1500)
        })
    </script>
@endpush
