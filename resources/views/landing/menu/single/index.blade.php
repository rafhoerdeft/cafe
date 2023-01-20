<div>
    <div class="product-item skeleton-content">
        <div class="pi-pic skeleton-wrap">
            <a href="{{ route('landing.menu.detail', ['id' => encode($menu->id)]) }}">
                @livewire('landing.menu.single.picture', ['photo' => $menu->photo], key('pic-' . encode($menu->id)))
                @if (isset($label))
                    <div class="sale {{ $label['color'] }}">{{ $label['name'] }}</div>
                @endif
                {{-- @livewire('landing.menu.single.like', compact('menu_id'), key('like-' . encode($menu->id))) --}}
                {{-- <ul>
                <li class="w-icon active" title="Add to Cart">
                    <a href="javascript:void(0)" wire:click="addToCart">+ <i class="icon_bag_alt"></i></a>
                </li>
                <li class="quick-view" title="View Detail">
                    <a href="{{ route('landing.menu.detail', ['id' => encode($menu->id)]) }}">View</a>
                </li>
            </ul> --}}
            </a>
        </div>
        <div class="pi-text">
            <div class="catagory-name skeleton-wrap">{{ $category_name }}</div>
            <a href="{{ route('landing.menu.detail', ['id' => encode($menu->id)]) }}" class="skeleton-wrap">
                <h5>{{ $menu->name }}</h5>
                <div class="product-price skeleton-wrap">
                    Rp {{ nominal($menu->price) }}
                    {{-- <span>$35.00</span> --}}
                </div>
            </a>
        </div>
    </div>
</div>
