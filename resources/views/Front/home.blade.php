@extends('layouts.front.master')
@section('css')
<style>
    /* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Hide the images by default */
.mySlides {
  display: none;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  margin-top: -22px;
  padding: 16px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  animation-name: fade;
  animation-duration: 1.5s;
}

@keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}
</style>
@endsection
@section('content')
<section class="slider_section slider_section2 mb-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="slider_swiper swiper-container">
                    <div class="swiper-wrapper">
                        @foreach ($slidbars as $slidbar)
                            <div class="single_slider swiper-slide d-flex">
                                <div class="slider_thumb">
                                    <img src="{{ '/images/sliders/' . $slidbar->image }}" alt="">
                                </div>
                                @php
                                    $parts = explode(' ', $slidbar->title);
                                @endphp
                                <div class="slider_text2">

                                    <h1 >
                                        {{ $slidbar->title }}
                                    </h1 >
                                    <a class="btn btn-link" href="{{ route('product_search') }}">{{ trans('home.shop_now') }}</a>
                                    <p>{{ $slidbar->body }}</p>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <!-- Add Arrows -->
                    <div class="swiper_buttn_area">
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- slider section end -->
    <!-- slider section end -->

    <!-- welcome befurniture area satrt -->
    <section class="welcome_befurniture_area">
        <div class="container-fluid p-0">
            <div class="row no-gutters m-0">
                <div class="col-12">
                    <div class="welcome_befurniture d-flex align-items-center">
                        <div class="befurniture_thumb">
                            <img src="{{ URL::asset('/images/home/Picture10.jpg') }}" alt="">
                        </div>
                        <div class="befurniture_text">
                            <h3 class="wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">
                                {{ trans('home.info_3_h') }}
                            </h3>
                            <p class="wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.2s">
                                {{ trans('home.info_3_p') }}
                            </p>
                            <ul class="wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1.3s">
                                <li>
                                    <img src="{{ URL::asset('/images/others/shipping4.png') }}" alt="">
                                    <span>{{ trans('home.info_3_icon_1') }}</span>
                                </li>
                                <li>
                                    <img src="{{ URL::asset('/images/others/shipping5.png') }}" alt="">
                                    <span>{{ trans('home.info_3_icon_2') }}</span>
                                </li>
                                <li>
                                    <img src="{{ URL::asset('/images/others/shipping6.png') }}" alt="">
                                    <span>{{ trans('home.info_3_icon_3') }}</span>
                                </li>
                            </ul>
                            <a class="btn btn-link wow fadeInUp " style="font-size: large" href="{{ route('contact_us') }}"
                                data-wow-delay="0.4s" data-wow-duration="1.4s">{{ trans('home.contact_us') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- welcome befurniture area end -->

    <!-- product section start -->
    <div class="product_section product_style2 mb-50">
        <div class="container">
            <div class="product_tab_button">
                <ul class="nav justify-content-center" role="tablist" id="nav-tab">
                    <li>
                        <a class="active" data-toggle="tab" href="#products" role="tab" aria-controls="products"
                            aria-selected="false"> {{ trans('home.products') }} </a>
                    </li>
                    <li>
                        {{-- <a data-toggle="tab" href="#seller" role="tab" aria-controls="seller" aria-selected="false"> Best Seller </a> --}}
                    </li>
                    <li>
                        <a data-toggle="tab" href="#sales" role="tab" aria-controls="sales"
                            aria-selected="false">{{ trans('home.On_Sales') }} </a>
                    </li>
                </ul>
            </div>
            <div class="tab-content product_container">
                <div class="tab-pane fade show active" id="products" role="tabpanel">
                    <div class="product_gallery">
                        <div class="row">
                            @foreach ($products as $product)
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <article class="single_product wow fadeInUp" data-wow-delay="0.1s"
                                        data-wow-duration="1.1s">
                                        <figure>
                                            <div class="product_thumb">
                                                <a href="{{ route('product_show', encrypt($product->id)) }}">
                                                    <img src="{{ '/images/products/layout/' . $product->image }}"
                                                        alt="">
                                                </a>
                                                @if ($product->offerd == 'true')
                                                    <div class="label_product">
                                                        <span class="label_sale">Sale</span>
                                                    </div>
                                                @endif
                                            </div>
                                            <figcaption class="product_content">
                                                <h4>
                                                    <a href="single-product.html">{{ $product->name }}</a>
                                                </h4>
                                                @if ($product->offerd == 'true')
                                                    <div class="price_box">
                                                        <span class="current_price">{{ trans('home.price') }} : </span>
                                                        <span class="current_price">{{ $product->offer_price }}</span>
                                                    </div>
                                                @endif
                                                @if ($product->stocked == 'true')
                                                    <div class="">
                                                        <span><img src="{{ URL::asset('/images/icon/check.png') }}"
                                                                alt=""> {{ trans('home.instock') }}</span>
                                                    </div>
                                                @endif
                                            </figcaption>
                                        </figure>
                                    </article>
                                </div>
                            @endforeach
                            <div width="70px" class="text-center">
                                <a class="btn btn-link"
                                    href="{{ route('product_search') }}">{{ trans('home.show_more') }}</a>

                            </div>


                        </div>
                    </div>
                </div>
                {{-- <div class="tab-pane fade" id="seller" role="tabpanel">
                <div class="product_gallery">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a href="single-product.html">
                                            <img src="{{ URL::asset('/images/product/product5.png')}}" alt="">
                                        </a>
                                    </div>
                                    <figcaption class="product_content">
                                        <h4>
                                            <a href="single-product.html">Tufted accent chair with wood legs, Beige</a>
                                        </h4>
                                        <div class="price_box">
                                            <span class="old_price">$399.99</span>
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
                                        <a href="single-product.html">
                                            <img src="{{ URL::asset('/images/product/product5.png')}}" alt="">
                                        </a>
                                        <div class="label_product">
                                            <span class="label_sale">Sale</span>
                                        </div>
                                    </div>
                                    <figcaption class="product_content">
                                        <h4>
                                            <a href="single-product.html">Tufted accent chair with wood legs, Beige</a>
                                        </h4>
                                        <div class="price_box">
                                            <span class="old_price">$399.99</span>
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
                                        <a href="single-product.html">
                                            <img src="assets/slider/img/product/product7.png" alt="">
                                        </a>
                                    </div>
                                    <figcaption class="product_content">
                                        <h4>
                                            <a href="single-product.html">Tufted accent chair with wood legs, Beige</a>
                                        </h4>
                                        <div class="price_box">
                                            <span class="old_price">$399.99</span>
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
                                        <a href="single-product.html">
                                            <img src="{{ URL::asset('/images/product/product8.png')}}" alt="">
                                        </a>
                                    </div>
                                    <figcaption class="product_content">
                                        <h4>
                                            <a href="single-product.html">Tufted accent chair with wood legs, Beige</a>
                                        </h4>
                                        <div class="price_box">
                                            <span class="old_price">$399.99</span>
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
                                        <a href="single-product.html">
                                            <img src="{{ URL::asset('/images/product/product1.png')}}" alt="">
                                        </a>
                                        <div class="label_product">
                                            <span class="label_hot">hot</span>
                                        </div>
                                    </div>
                                    <figcaption class="product_content">
                                        <h4>
                                            <a href="single-product.html">Tufted accent chair with wood legs, Beige</a>
                                        </h4>
                                        <div class="price_box">
                                            <span class="old_price">$399.99</span>
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
                                        <a href="single-product.html">
                                            <img src="{{ URL::asset('/images/product/product2.png')}}" alt="">
                                        </a>
                                    </div>
                                    <figcaption class="product_content">
                                        <h4>
                                            <a href="single-product.html">Tufted accent chair with wood legs, Beige</a>
                                        </h4>
                                        <div class="price_box">
                                            <span class="old_price">$399.99</span>
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
                                        <a href="single-product.html">
                                            <img src="{{ URL::asset('/images/product/product3.png')}}" alt="">
                                        </a>
                                    </div>
                                    <figcaption class="product_content">
                                        <h4>
                                            <a href="single-product.html">Tufted accent chair with wood legs, Beige</a>
                                        </h4>
                                        <div class="price_box">
                                            <span class="old_price">$399.99</span>
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
                                        <a href="single-product.html">
                                            <img src="{{ URL::asset('/images/product/product4.png')}}" alt="">
                                        </a>
                                    </div>
                                    <figcaption class="product_content">
                                        <h4>
                                            <a href="single-product.html">Tufted accent chair with wood legs, Beige</a>
                                        </h4>
                                        <div class="price_box">
                                            <span class="old_price">$399.99</span>
                                            <span class="current_price">$129.99</span>
                                        </div>
                                    </figcaption>
                                </figure>
                            </article>
                        </div>

                    </div>
                </div>
            </div> --}}
                <div class="tab-pane fade" id="sales" role="tabpanel">
                    <div class="product_gallery">
                        <div class="row">
                            @foreach ($products->where('offerd', 'true') as $product)
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a href="{{ route('product_show', encrypt($product->id)) }}">
                                                    <img src="{{ '/images/products/layout/' . $product->image }}"
                                                        alt="">
                                                </a>
                                                <div class="label_product">
                                                    <span class="label_sale">Sale</span>
                                                </div>
                                            </div>
                                            <figcaption class="product_content">
                                                <h4>
                                                    <a href="single-product.html">{{ $product->name }}</a>
                                                </h4>
                                                <div class="price_box">
                                                    <span class="current_price">{{ trans('home.price') }} : </span>
                                                    <span class="current_price">{{ $product->offer_price }}</span>
                                                </div>
                                                <div class="in_stock">
                                                    <span><img src="{{ URL::asset('/images/icon/check.png') }}"
                                                            alt=""> {{ trans('home.instock') }}</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                </div>
                            @endforeach
                            <div width="70px" class="text-center">
                                <a class="btn btn-link"
                                    href="{{ route('product_sales_filter') }}">{{ trans('home.show_more') }}</a>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product section end -->

    <!-- banner advice section start -->
    <section class="modern_banner_section">
        <div class="container">
            <div class="banner_advice_inner">
                @if (app()->getLocale() == 'ar')
                    <div class="row" style="direction: ltr;">
                        <div class="col-lg-5 float-left">
                        @else
                            <div class="row">
                                <div class="col-lg-5 offset-lg-7 col-md-6 offset-md-6">
                @endif
                <div class="modern_advice_text text-center">
                    {{-- <h3 class="wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">Modern Arm Chair</h3> --}}
                    <p class="wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.2s">{{ trans('home.info_1') }}
                    </p>
                    {{-- <a class="btn btn-link wow fadeInUp" href="shop-left-sidebar.html" data-wow-delay="0.3s"
                        data-wow-duration="1.3s">SHOP NOW</a> --}}
                </div>
            </div>
        </div>
        <div class="banner_position_img2">
            <img src="{{ URL::asset('/images/home/Picture1.jpg') }}" alt="">
        </div>
        </div>
        </div>
    </section>
    <!-- banner advice section end -->

    <!-- instagram area start -->
    <section class="instagram_section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="instagram_inner2 d-flex align-items-center justify-content-between">
                        <div class="instagram_text">

                            <p class="wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.2s">
                                {{ trans('home.info_2') }}
                            </p>
                        </div>
                        <div class="instagram_gallery">
                            <div class="instagram_gallery_list d-flex">
                                <div class="instagram_img">
                                    <a href="#">
                                        <img src="{{ URL::asset('/images/home/Picture8.jpg') }}" alt="">
                                    </a>
                                </div>
                                <div class="instagram_img">
                                    <a href="#">
                                        <img src="{{ URL::asset('/images/home/Picture3.jpg') }}" alt="">
                                    </a>
                                </div>
                                <div class="instagram_img">
                                    <a href="#">
                                        <img src="{{ URL::asset('/images/home/Picture4.jpg') }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="instagram_gallery_list d-flex">
                                <div class="instagram_img">
                                    <a href="#">
                                        <img src="{{ URL::asset('/images/home/Picture5.jpg') }}" alt="">
                                    </a>
                                </div>
                                <div class="instagram_img">
                                    <a href="#">
                                        <img src="{{ URL::asset('/images/home/Picture6.jpg') }}" alt="">
                                    </a>
                                </div>
                                <div class="instagram_img">
                                    <a href="#">
                                        <img src="{{ URL::asset('/images/home/Picture7.jpg') }}" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- instagram area end -->

    {{-- <section class="choice_section mb-175">
        <div class="container">
            <div class="section_title text-center mb-105">
                <h2>Best Choice For You</h2>
            </div>
            <div class="choice_container">
                <div class="row choice_slick slick_slider_activation " >
                    <div class="col-lg-2">
                        <div class="single_choice wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">
                            <div class="choice_thumb">
                                <img src="{{ URL::asset('assets/slider/front/others/team3.png')}}" alt="">
                            </div>
                            <div class="choice_text">
                                <h4><a href="#">for Living room</a></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="single_choice wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.2s">
                            <div class="choice_thumb">
                                <img src="{{ URL::asset('assets/slider/front/others/team4.png')}}" alt="">
                            </div>
                            <div class="choice_text">
                                <h4><a href="#">For Out Door & Gardern</a></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="single_choice wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.2s">
                            <div class="choice_thumb">
                                <img src="{{ URL::asset('assets/slider/front/others/team1.png')}}" alt="">
                            </div>
                            <div class="choice_text">
                                <h4><a href="#">For Out Door & Gardern</a></h4>
                            </div>
                        </div>
                    </div> <div class="col-lg-2">
                        <div class="single_choice wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.2s">
                            <div class="choice_thumb">
                                <img src="{{ URL::asset('assets/slider/front/others/team2.png')}}" alt="">
                            </div>
                            <div class="choice_text">
                                <h4><a href="#">For Out Door & Gardern</a></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="single_choice wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1.3s">
                            <div class="choice_thumb">
                                <img src="{{ URL::asset('assets/slider/front/others/team3.png')}}" alt="">
                            </div>
                            <div class="choice_text">
                                <h4><a href="#">For Rest Place</a></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="single_choice wow fadeInUp" data-wow-delay="0.4s" data-wow-duration="1.4s">
                            <div class="choice_thumb">
                                <img src="{{ URL::asset('assets/slider/front/others/team3.png')}}" alt="">
                            </div>
                            <div class="choice_text">
                                <h4><a href="#">for Living room</a></h4>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section> --}}

    <section class="category-carousel container mb-5">
        <h2 class="section-title text-center mb-3 pb-xl-2 mb-xl-4">{{ trans('home.our_partners') }}</h2>

        <div class="position-relative">
          <div class="swiper-container js-swiper-slider" >
            <div class="swiper-wrapper">

          @foreach ($partners as $partner )

              <div class="swiper-slide">
                <img loading="lazy" class="w-100  mb-3" src="{{asset('images/partners/'.$partner->image )}}" width="124"
                  height="124" alt="" />
                <div class="text-center">
                  <a href="#" class="menu-link fw-medium">{{$partner->title}}</a>
                </div>
              </div>
              @endforeach

            </div><!-- /.swiper-wrapper -->
          </div><!-- /.swiper-container js-swiper-slider -->

          {{-- <div
            class="products-carousel__prev products-carousel__prev-1 position-absolute top-50 d-flex align-items-center justify-content-center">
            <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
              <use href="#icon_prev_md" />
            </svg>
          </div><!-- /.products-carousel__prev -->
          <div
            class="products-carousel__next products-carousel__next-1 position-absolute top-50 d-flex align-items-center justify-content-center">
            <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
              <use href="#icon_next_md" />
            </svg>
          </div><!-- /.products-carousel__next --> --}}
        </div><!-- /.position-relative -->
      </section>

@endsection
@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var swiper = new Swiper('.slider_swiper', {
            loop: true,
            autoplay: {
                delay: 2000, // Time between slides in milliseconds (3000ms = 3s)
                disableOnInteraction: true, // Autoplay will not be disabled after user interactions
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            slidesPerView: 1,
            spaceBetween: 30,
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
    var swiper = new Swiper('.js-swiper-slider', {
        loop: true,
            autoplay: {
                delay: 2000, // Time between slides in milliseconds (3000ms = 3s)
                disableOnInteraction: true, // Autoplay will not be disabled after user interactions
            },
        // slidesPerView: 6,
        // slidesPerGroup: 1,
        // loop: true,
        navigation: {
            nextEl: '.products-carousel__next-1',
            prevEl: '.products-carousel__prev-1',
        },
        slidesPerView: 5,
            spaceBetween: 30,

    });
});


</script>
@endsection
