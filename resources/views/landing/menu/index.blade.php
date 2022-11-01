@extends('landing.layouts.app')

@section('content')
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        {{-- <a href="#"><i class="fa fa-home"></i> Home</a>
                    <span>Shop</span> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="product-shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Beverage</h2>
                    </div>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-6 col-lg-3 offset-6 offset-lg-9 product-show-option">
                    <div class="select-option">
                        <select name="sort" class="sorting w-100" id="">
                            <option value="">Poppular <i class="fa fa-user"></i></option>
                            <option value="">Favorite</option>
                            <option value="">Latest</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    @livewire('landing.menu.list-menu')
                </div>
            </div>
        </div>
    </section>
@endsection

@push('css_plugin')
    <link rel="stylesheet" href="{{ asset('landing/css/nice-select.css') }}" type="text/css">
@endpush

@push('css_style')
    <style>
        .product-show-option .select-option .sorting.nice-select {
            margin: 0px;
        }
    </style>
@endpush

@push('js_plugin')
    <script src="{{ asset('landing/js/jquery.nice-select.min.js') }}"></script>
@endpush

@push('js_script')
    <script>
        $('.sorting').niceSelect();
    </script>
@endpush
