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
                        wire:click="updateMenuOptionId({{ $item->extra_price + $menu->price }})" type="radio"
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
            <button type="button" class="btn primary-btn px-4">Add To Cart</button>
        </div>
        {{-- <ul class="pd-tags">
                <li><span>CATEGORIES</span>: More Accessories, Wallets &amp; Cases</li>
                <li><span>TAGS</span>: Clothing, T-shirt, Woman</li>
            </ul> --}}
    </div>
</div>
