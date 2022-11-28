<div>
    <section class="hero-section">
        {{-- <div wire:loading>
            Loading...
        </div> --}}
        <div class="hero-items owl-carousel">
            @foreach ($carousel as $item)
                <div class="single-hero-items set-bg" data-setbg="{{ show_file($item->image) }}">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-5">
                                <span>{{ $item->category }}</span>
                                <h1>{{ $item->title }}</h1>
                                <p>{{ $item->description }}</p>
                                {{-- <a href="#" class="primary-btn">Shop Now</a> --}}
                            </div>
                        </div>
                        @if ($item->text_circle != null)
                            <div class="off-card">
                                <h2>{{ $item->text_circle }}</h2>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
            <div class="single-hero-items set-bg"
                data-setbg="https://thumbs.dreamstime.com/b/greek-food-background-traditional-different-greek-dishes-set-greek-food-background-traditional-different-greek-dishes-set-top-view-178761927.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>try</span>
                            <h1>try</h1>
                            <p>try</p>
                            {{-- <a href="#" class="primary-btn">Shop Now</a> --}}
                        </div>
                    </div>
                    @if ($item->text_circle != null)
                        <div class="off-card">
                            <h2>try</h2>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>
