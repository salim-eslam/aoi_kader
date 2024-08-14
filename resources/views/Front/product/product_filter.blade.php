@extends('layouts.front.master')

@section('content')
<br>
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content text-center">
                    <h2>{{ trans('product_filter.products') }}</h2>
                    <ul class="d-flex justify-content-center">
                        <li><a href="{{ route('home') }}">{{ trans('product_filter.home') }}</a></li>
                        <li>></li>
                        <li><a href="shop-left-sidebar.html">{{ $department->name }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- shop page section satrt -->
<div class="shop_page_section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="shop_page_inner d-flex">
                    <!-- Categories Sidebar -->
                    <div class="shop_sidebar_widget mt-5 order-2 order-md-1">
                        <div class="shop_widget_list categories">
                            <div class="shop_widget_title categories_title">
                                <h3>{{ trans('product_filter.categories') }}</h3>
                            </div>
                            <div class="widget_categories">
                                <ul>
                                    @foreach ( $departments as $department )
                                    <li>
                                        <a href="{{ route('product_department_filter', encrypt($department->id)) }}">
                                            {{ $department->name }} ({{ $department->products->count() }})
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Product Gallery -->
                    <div class="shop_right_sidebar order-1 order-md-2">
                        <div class="shop_gallery">
                            <div class="row">
                                @foreach ($products as $product)
                                <div class="col-lg-6 col-md-6 mt-3">
                                    <div class="card card-product">
                                        <a href="{{ route('product_show', encrypt($product->id)) }}">
                                            <img src="{{ asset('/images/products/layout/' . $product->image) }}" class="product-image" alt="">
                                        </a>
                                        <div class="card-body mt-5">
                                            <h5 class="card-title">{{ $product->description }}</h5>
                                        </div>
                                        <div class="card-body">
                                            <a href="{{ route('product_show', encrypt($product->id)) }}">
                                            <button class="w-100 btn btn-secondary">More Details</button>

                                            </a> </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="loading_bar">
                            <ul class="d-flex justify-content-center">
                                {{ $products->links('') }}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- shop page section end -->

@endsection
@section('scripts')

@endsection
