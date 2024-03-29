<div>
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="product-shop spad page-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-6">
                            @livewire('landing.menu.detail.picture', ['photo' => $menu->photo])
                        </div>

                        <div class="col-lg-6">
                            @livewire('landing.menu.detail.description', ['menu' => $menu])
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 mt-5">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title">
                                <h2>Related Products</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            @livewire('landing.menu.detail.related', ['category_id' => encode($menu->menu_categories->id), 'menu_id' => encode($menu->id)])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
