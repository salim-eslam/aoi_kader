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
                <div class="shop_page_inner d-flex ">
                    <div class="shop_sidebar_widget mt-5">
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

                    <div class="shop_right_sidaber">
                        <div class="shop_top_bar d-flex justify-content-between">
                            {{-- <div class="shop_product_count">
                                <span>Show 9 / 12  / 18 / 24</span>
                            </div>
                            <div class="shop_top_right d-flex">
                                <div class="product_sorting">
                                    <select>
                                        <option selected value="1">Default Sorting</option>
                                        <option value="1">Default Sorting2</option>
                                        <option value="1">Default Sorting3</option>
                                        <option value="1">Default Sorting3</option>
                                    </select>
                                </div>
                                <div class="shop_filter">
                                    <select>
                                        <option selected value="1">Filter</option>
                                        <option value="1">Filter2</option>
                                        <option value="1">Filter3</option>
                                        <option value="1">Filter4</option>
                                    </select>
                                </div>
                            </div> --}}
                        </div>
                        <div class="shop_gallery">
                            <div class="row">
                                @foreach ($products as $product )
                                    <div class="col-lg-4 col-md-4 col-sm-6">
                                        <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a href="{{ route('product_show', encrypt($product->id)) }}"><img src="{{ '/images/products/layout/' . $product->image }}"
                                                        alt="" width="100%"></a>
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
                                                        <span class="current_price">{{ trans('home.price') }} : </span>
                                                        <span class="current_price">{{ $product->offer_price }}</span>
                                                    </div>
                                                @endif
                                                </figcaption>
                                            </figure>
                                        </article>
                                    </div>

                                @endforeach
                                {{-- <div class="col-lg-4 col-md-4 col-sm-6">
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a href="single-product.html"><img src="assets/img/product/product2.png" alt=""></a>
                                                <div class="label_product">
                                                    <span class="label_hot">hot</span>
                                                </div>
                                            </div>
                                            <figcaption class="product_content">
                                                <h4><a href="single-product.html">Kendal Dark Teal Fabric Accent Chair</a></h4>
                                                <div class="price_box">
                                                    <span class="old_price">$399.99</span>
                                                    <span class="current_price">$129.99</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a href="single-product.html"><img src="assets/img/product/product3.png" alt=""></a>

                                            </div>
                                            <figcaption class="product_content">
                                                <h4><a href="single-product.html">Tufted accent chair with wood legs, Beige</a></h4>
                                                <div class="price_box">
                                                    <span class="old_price">$399.99</span>
                                                    <span class="current_price">$129.99</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a href="single-product.html"><img src="assets/img/product/product4.png" alt=""></a>

                                            </div>
                                            <figcaption class="product_content">
                                                <h4><a href="single-product.html">Kendal Dark Teal Fabric Accent Chair</a></h4>
                                                <div class="price_box">
                                                    <span class="old_price">$399.99</span>
                                                    <span class="current_price">$129.99</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a href="single-product.html"><img src="assets/img/product/product5.png" alt=""></a>
                                                <div class="label_product">
                                                    <span class="label_hot">hot</span>
                                                </div>
                                            </div>
                                            <figcaption class="product_content">
                                                <h4><a href="single-product.html"> Contemporary Round Living Room Coffee</a></h4>
                                                <div class="price_box">
                                                    <span class="old_price">$399.99</span>
                                                    <span class="current_price">$129.99</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a href="single-product.html"><img src="assets/img/product/product6.png" alt=""></a>
                                                <div class="label_product">
                                                    <span class="label_sale">Sale</span>
                                                </div>
                                            </div>
                                            <figcaption class="product_content">
                                                <h4><a href="single-product.html">Tufted accent chair with wood legs, Beige</a></h4>
                                                <div class="price_box">
                                                    <span class="old_price">$399.99</span>
                                                    <span class="current_price">$129.99</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a href="single-product.html"><img src="assets/img/product/product7.png" alt=""></a>
                                                <div class="label_product">
                                                    <span class="label_sale">Sale</span>
                                                </div>
                                            </div>
                                            <figcaption class="product_content">
                                                <h4><a href="single-product.html"> Contemporary Round Living Room Coffee</a></h4>
                                                <div class="price_box">
                                                    <span class="old_price">$399.99</span>
                                                    <span class="current_price">$129.99</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a href="single-product.html"><img src="assets/img/product/product8.png" alt=""></a>
                                            </div>
                                            <figcaption class="product_content">
                                                <h4><a href="single-product.html">Kendal Dark Teal Fabric Accent Chair</a></h4>
                                                <div class="price_box">
                                                    <span class="old_price">$399.99</span>
                                                    <span class="current_price">$129.99</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a href="single-product.html"><img src="assets/img/product/product9.png" alt=""></a>

                                            </div>
                                            <figcaption class="product_content">
                                                <h4><a href="single-product.html">Tufted accent chair with wood legs, Beige</a></h4>
                                                <div class="price_box">
                                                    <span class="old_price">$399.99</span>
                                                    <span class="current_price">$129.99</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a href="single-product.html"><img src="assets/img/product/product10.png" alt=""></a>
                                            </div>
                                            <figcaption class="product_content">
                                                <h4><a href="single-product.html">Kendal Dark Teal Fabric Accent Chair</a></h4>
                                                <div class="price_box">
                                                    <span class="old_price">$399.99</span>
                                                    <span class="current_price">$129.99</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a href="single-product.html"><img src="assets/img/product/product11.png" alt=""></a>
                                                <div class="label_product">
                                                    <span class="label_sale">Sale</span>
                                                </div>
                                            </div>
                                            <figcaption class="product_content">
                                                <h4><a href="single-product.html">Kendal Dark Teal Fabric Accent Chair</a></h4>
                                                <div class="price_box">
                                                    <span class="old_price">$399.99</span>
                                                    <span class="current_price">$129.99</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a href="single-product.html"><img src="assets/img/product/product12.png" alt=""></a>
                                            </div>
                                            <figcaption class="product_content">
                                                <h4><a href="single-product.html">Tufted accent chair with wood legs, Beige</a></h4>
                                                <div class="price_box">
                                                    <span class="old_price">$399.99</span>
                                                    <span class="current_price">$129.99</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                </div> --}}
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
