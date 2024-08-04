@extends('layouts.front.master')
@section('meta')
{!! MetaTag::tag('product_description') !!}
{!! MetaTag::tag('product_keywords') !!}
@endsection
@section('content')
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content text-center">
                        <h2>{{ $product->name }}</h2>
                        <ul class="d-flex justify-content-center">
                            <li><a href="{{ route('home') }}">{{ trans('singel_product.home') }}</a></li>
                            <li>></li>
                            <li><a href="{{ route('product_show', encrypt($product->id)) }}">{{ trans('singel_product.product_detail') }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- product gallery section start -->
    <div class="product_gallery_section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_gallery_inner d-flex">
                        <div class="product_gallery_list">
                            <div class="product_gallery_thumb">
                                <a href="#"> <img src="{{ '/images/products/layout/' . $product->image }}"
                                    alt=""></a>
                            </div>
                        </div>

                        @for ($k=0;$k<count($photos);$k=$k+2)
                        <div class="product_gallery_list">
                            @for($i = $k; $i <$k+1; $i++)
                            @for($j =$i; $j <$i+2; $j++)
                            <div class="product_gallery_thumb">
                                    <a href="#"><img src="{{ '/images/products/attachments/' . $photos[$j]}}" alt=""></a>
                                </div>

                             @endfor
                            @endfor
                        </div>
                        @endfor
                        {{-- @foreach (Arr::pluck($product->photos,) as $photo)
                            <div class="product_gallery_list">
                                <div class="product_gallery_thumb">
                                    <a href="#"><img src="{{ '/images/products/attachments/' . $photo->src }}" alt=""></a>
                                </div>
                            </div>
                        @endforeach --}}
                        {{-- <div class="product_gallery_list">
                            <div class="product_gallery_thumb">
                                <a href="#"><img src="assets/img/product/product-gallery3.png" alt=""></a>
                            </div>
                            <div class="product_gallery_thumb">
                                <a href="#"><img src="assets/img/product/product-gallery5.png" alt=""></a>
                            </div>
                        </div> --}}
                    </div>
                    {{-- <div class="product_social">
                        <ul class="d-flex justify-content-center">
                            <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                            <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                            <li><a href="#"><i class="ion-ios-email"></i></a></li>
                            <li><a href="#"><i class="ion-social-pinterest"></i></a></li>
                        </ul>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- product gallery section end -->

    <!-- product details css here -->
    <div class="product_details_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="product_details_left">
                        <form action="#">
                            <div class="product_ratting_stock d-flex">
                                <div class=" product_ratting">
                                    <ul class="d-flex">
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li class="review"><span>5 Reviews</span></li>
                                    </ul>
                                </div>
                                <div class="in_stock">
                                    <span><img src="assets/img/icon/check.png" alt=""> in Stock</span>
                                </div>
                            </div>
                            <div class="product_details_title">
                                <h3>{{ $product->name }}</h3>
                            </div>
                            @if ($product->offerd == true)
                                <div class="product_price_box">
                                    <span class="current_price">L.E{{ $product->offer_price }}</span>
                                </div>
                            @endif

                            <div class="product_desc">
                                <p>{!! $product->description !!} </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product details css end -->

    <!--product info start-->
    <div class="product_d_info">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_d_inner">
                        <div class="product_info_button">
                            <ul class="nav" role="tablist" id="nav-tab">
                                {{-- <li>
                                    <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info"
                                        aria-selected="false">Description</a>
                                </li> --}}
                                <li>
                                    <a data-toggle="tab" href="#sheet" role="tab" aria-controls="sheet"
                                        aria-selected="false">{{ trans('singel_product.additional_information') }}</a>
                                </li>
                                <!-- <li>
                                   <a data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews (3)</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#vendor" role="tab" aria-controls="vendor" aria-selected="false">Vendor info</a>
                                 </li>
                                 <li>
                                    <a data-toggle="tab" href="#brand" role="tab" aria-controls="brand" aria-selected="false">about brand</a>
                                 </li> -->
                            </ul>
                        </div>
                        <div class="tab-content">
                            {{-- <div class="tab-pane fade show active" id="info" role="tabpanel">
                                <div class="product_info__flex d-flex ">
                                    <div class="product_info_thumb">
                                        <img src="assets/img/others/product-info-thumb.png" alt="">
                                    </div>
                                    <div class="product_info_content productinfo_text_flex">
                                        <h4>Premium Luxury Furniture</h4>
                                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quam eligendi labore
                                            atque enim ut itaque aspernatur consequuntur est aut recusandae.</p>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur nihil,
                                            temporibus voluptate incidunt, earum veniam tenetur, vero magni quam at quidem
                                            velit?</p>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="tab-pane fade show active" id="sheet" role="tabpanel">
                                <div class="product_d_table">
                                    <form action="#">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="first_child">{{  trans('singel_product.raw_material')  }}</td>
                                                    <td>{{ $product->material }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="first_child">{{ trans('singel_product.dimensions') }}</td>
                                                    <td>{{ $product->length}} x {{  $product->width }} x {{  $product->height  }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="first_child">{{ trans('singel_product.department') }}</td>
                                                    <td>{{ $product->department->name }}</td>
                                                </tr>
                                                {{-- <tr>
                                                    <td class="first_child">{{ trans('singel_product.category') }}</td>
                                                    <td>{{$product->category->name}}</td>
                                                </tr> --}}
                                                @if ($product->offerd == 'true')
                                                    <tr>
                                                        <td class="first_child">{{ trans('singel_product.price') }}</td>
                                                        <td>{{ $product->offer_price }}</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                                {{-- <div class="product_info_content">
                                    <p>Fashion has been creating well-designed collections since 2010. The brand offers
                                        feminine designs delivering stylish separates and statement dresses which have since
                                        evolved into a full ready-to-wear collection in which every item is a vital part of
                                        a woman's wardrobe. The result? Cool, easy, chic looks with youthful elegance and
                                        unmistakable signature style. All the beautiful pieces are made in Italy and
                                        manufactured with the greatest attention. Now Fashion extends to a range of
                                        accessories including shoes, hats, belts and more!</p>
                                </div> --}}
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--product info end-->

    <!-- product section start -->
    <section class="related_product_section">
        <div class="container">
            <div class="product__title text-center">
                <h2>{{ trans('singel_product.related_products') }}</h2>
            </div>
            <div class="related_product_inner">
                <div class="row">
                    @foreach ($related_product as $r_product )
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a href="{{ route('product_show', encrypt($product->id)) }}"><img src="{{ '/images/products/layout/' . $r_product->image }}"
                                                alt=""></a>
                                                @if($r_product->offerd=='true')
                                                    <div class="label_product">
                                                        <span class="label_sale">Sale</span>
                                                    </div>

                                                @endif
                                    </div>
                                    <figcaption class="product_content">
                                        <h4><a href="single-product.html">{{ $r_product->name }}</a></h4>
                                        @if ($r_product->offerd == 'true')
                                        <div class="price_box">
                                            <span class="current_price">{{ trans('singel_product.price') }} : </span>
                                            <span class="current_price">{{ $r_product->offer_price }}</span>
                                        </div>
                                    @endif
                                    </figcaption>
                                </figure>
                            </article>
                        </div>

                    @endforeach
                    {{-- <div class="col-lg-3 col-md-4 col-sm-6">
                        <article class="single_product">
                            <figure>
                                <div class="product_thumb">
                                    <a href="single-product.html"><img src="assets/img/product/product6.png"
                                            alt=""></a>
                                </div>
                                <figcaption class="product_content">
                                    <h4><a href="single-product.html">Plant Office</a></h4>
                                    <div class="price_box">
                                        <span class="current_price">$129.99</span>
                                    </div>
                                </figcaption>
                            </figure>
                        </article>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <article class="single_product">
                            <figure>
                                <div class="product_thumb">
                                    <a href="single-product.html"><img src="assets/img/product/product7.png"
                                            alt=""></a>
                                </div>
                                <figcaption class="product_content">
                                    <h4><a href="single-product.html">Good Stock</a></h4>
                                    <div class="price_box">
                                        <span class="current_price">$129.99</span>
                                    </div>
                                </figcaption>
                            </figure>
                        </article>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <article class="single_product">
                            <figure>
                                <div class="product_thumb">
                                    <a href="single-product.html"><img src="assets/img/product/product8.png"
                                            alt=""></a>
                                </div>
                                <figcaption class="product_content">
                                    <h4><a href="single-product.html">Fabric Accent Chair</a></h4>
                                    <div class="price_box">
                                        <span class="current_price">$129.99</span>
                                    </div>
                                </figcaption>
                            </figure>
                        </article>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
    <!-- product section end -->
@endsection
@section('scripts')
@endsection
