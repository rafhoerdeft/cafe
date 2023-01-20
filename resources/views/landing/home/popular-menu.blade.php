<div>
    <section class="product-shop">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Favorite Menu</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-list">
                        <div class="row gx-3">
                            @foreach ($menus as $menu)
                                <div class="col-lg-3 col-6">
                                    @livewire('landing.menu.single.index', ['menu_id' => encode($menu->id), 'category_name' => $menu->menu_categories->name, 'label' => ['name' => 'Favorite', 'color' => 'primary-bg']], key('menu-' . encode($menu->id)))
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
