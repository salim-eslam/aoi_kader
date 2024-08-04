@extends('layouts.front.master')

@section('content')
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content text-center">
                        <h2>{{ trans('product_filter.products') }}</h2>
                        <ul class="d-flex justify-content-center">
                            <li><a href="{{ route('home') }}">{{ trans('product_filter.home') }}</a></li>
                            <li>></li>
                            @if(Request::path()=='ar/product/instock')
                            <li><a href="#">{{ trans('header.instock') }}</a></li>
                            @elseif(Request::path()=='ar/product/sales')
                            <li><a href="#">{{ trans('header.sales') }}</a></li>

                            @endif
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
                    <div class="shop_page_inner d-flex ">
                        <div class="shop_sidebar_widget">
                            <div class="shop_widget_list categories">
                                <div class="shop_widget_title categories_title">
                                    <h3>{{ trans('product_filter.categories') }}</h3>
                                </div>
                                <div class="widget_categories">
                                    <ul>
                                        @foreach ( $departments as $department  )

                                        <li><a href="{{ route('product_department_filter', encrypt($department->id)) }}">{{ $department->name }}({{ $department->products->count() }})</a></li>
                                        @endforeach
                                        {{-- <li><a href="#">Desk(2)</a></li>
                                        <li><a href="#">Bedroom(26)</a></li>
                                        <li><a href="#">Chair(11)</a></li>
                                        <li><a href="#">Accessories(13)</a></li>
                                        <li><a href="#">Furniture(23)</a></li> --}}
                                    </ul>
                                </div>
                            </div>

                        </div>
                        {{-- <div class="shop_sidebar_widget">
                        <div class="shop_widget_list categories">
                            <div class="shop_widget_title categories_title">
                                <h3>{{ trans('product_filter.categories') }}</h3>
                            </div>

                        </div>

                    </div> --}}

                        <div class="shop_right_sidaber">

                            <div class="shop_gallery">
                                <div class="row">
                                    @foreach ($products as $product)
                                        <div class="col-lg-4 col-md-4 col-sm-6">
                                            <article class="single_product">
                                                <figure>
                                                    <div class="product_thumb">
                                                        <a href="{{ route('product_show', encrypt($product->id)) }}"><img
                                                                src="{{ '/images/products/layout/' . $product->image }}"
                                                                alt=""></a>
                                                        @if ($product->offerd == 'true')
                                                            <div class="label_product">
                                                                <span class="label_sale">Sale</span>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <figcaption class="product_content">
                                                        <h4><a href="single-product.html">{{ $product->name }}</a></h4>
                                                        @if ($product->offerd == 'true')
                                                            <div class="price_box">
                                                                <span class="current_price">{{ trans('home.price') }} :
                                                                </span>
                                                                <span
                                                                    class="current_price">{{ $product->offer_price }}</span>
                                                            </div>
                                                        @endif
                                                        @if ($product->stocked == 'true')
                                                            <div class="">
                                                                <span><img
                                                                        src="{{ URL::asset('assets/front/img/icon/check.png') }}"
                                                                        alt=""> in Stock</span>
                                                            </div>
                                                        @endif
                                                    </figcaption>
                                                </figure>
                                            </article>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                            <div class="loding_bar">
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
