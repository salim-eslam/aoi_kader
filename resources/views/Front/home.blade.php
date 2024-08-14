@extends('layouts.front.master')
@section('css')
<style>
    /* Slideshow container */

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
                            <div class="single_slider swiper-slide d-flex flex-wrap">
                                <div class="col-12 col-md-6 slider_thumb order-2 order-md-1">
                                    <img src="{{ '/images/sliders/' . $slidbar->image }}" alt="{{ $slidbar->title }}">
                                </div>
                                <div class="col-12 col-md-6 slider_text2 order-1 order-md-2">
                                    <h1>{{ $slidbar->title }}</h1>
                                    <p>{{ $slidbar->body }}</p>
                                    <a class="btn btn-link" href="{{ route('product_search') }}">{{ trans('home.shop_now') }}</a>
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
    <div class="product_section product_style2 mb-105">

        <div class="container mb-5">
            <div class="row">
                <h1 class="section-title text-center mb-3 pb-xl-2 mb-xl-4">{{ trans('home.our_products') }}</h1>
                @foreach ($products as $product)
                <div class="col-lg-3 col-md-8 mt-5">
                    <div class="card card-product"  >
                        <a href="{{ route('product_show', encrypt($product->id)) }}">
                            <img src="{{ asset('/images/products/layout/' . $product->image) }}" class="product-image" alt="">
                        </a>
                        <div class="card-body mt-5">
                            <h5 class="card-title">{{$product->description}}</h5>
                        </div>
                        <div class="card-body">
                            <button class="w-100 btn btn-secondary">More Details</button>
                        </div>
                    </div>
                </div>
                @endforeach
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
                <img loading="lazy" class="w-100  mb-3" src="{{asset('images/partners/'.$partner->image )}}" width="100%"
                  height="100vh" alt="" />
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
    </div>


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
