<div>
    <section class="product-shop">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Popular Menu</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-list">
                        <div class="row gx-3">
                            @foreach ($menus as $item)
                                <div class="col-lg-3 col-6">
                                    <div class="product-item skeleton-content">
                                        <div class="pi-pic skeleton-wrap">
                                            <div class="img" data-src="{{ show_file($item->photo) }}">
                                            </div>
                                            <div class="sale pp-sale">Sale</div>
                                            <div class="icon">
                                                <i class="icon_heart_alt"></i>
                                            </div>
                                            <ul>
                                                <li class="w-icon active" title="Add to Cart">
                                                    <a href="#">+ <i class="icon_bag_alt"></i></a>
                                                </li>
                                                <li class="quick-view" title="View Detail">
                                                    <a
                                                        href="{{ route('landing.menu.detail', ['id' => encode($item->id)]) }}">View</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="pi-text">
                                            <div class="catagory-name skeleton-wrap">{{ $item->menu_categories->name }}
                                            </div>
                                            <a href="{{ route('landing.menu.detail', ['id' => encode($item->id)]) }}"
                                                class="skeleton-wrap">
                                                <h5>{{ $item->name }}</h5>
                                                <div class="product-price skeleton-wrap">
                                                    Rp {{ nominal($item->price) }}
                                                    {{-- <span>$35.00</span> --}}
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
