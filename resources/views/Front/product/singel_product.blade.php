@extends('layouts.front.master')
@section('meta')
{!! MetaTag::tag('product_description') !!}
{!! MetaTag::tag('product_keywords') !!}
@endsection
@section('css')
<style>

    </style>
@endsection
@section('content')
<br>
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

<div class="container mt-5">
<div class="row">
    {{-- <h2 style="text-align:center">Slideshow Gallery</h2> --}}
    <div class="col-3"></div>

    <div class="con1 col-lg-6 col-md-10">
        @for($j = 0; $j < count($photos); $j++)
            <div class="mySlides">
                <div class="numbertext">{{ $j + 1 }} / {{ count($photos) }}</div>
                <img class="img1" src="{{ asset('images/products/attachments/' . $photos[$j]) }}" style="width:100%;height:400px">
            </div>
        @endfor

        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>

        <div class="caption-container">
            <p id="caption"></p>
        </div>

        <div class="row row1 mt-1">
            @for($j = 0; $j < count($photos); $j++)
                <div class="column col1">
                    <img class="demo cursor" src="{{ asset('images/products/attachments/' . $photos[$j]) }}" style="width:100%;height:100%" onclick="currentSlide({{ $j + 1 }})" alt="">
                </div>
            @endfor
        </div>
    </div>
    <div class="col-3"></div>

</div>
</div>


    <!-- product gallery section start -->
    {{-- <div class="product_gallery_section mt-5">
        <div class="container">
            <div class="row">
                <!-- Single Product Image -->
                <div class="col-4">
                    <a href="#">
                        <img src="{{ asset('/images/products/layout/' . $product->image) }}" width="100%" height="400px" alt="">
                    </a>
                </div>
                <!-- Gallery Images -->
                <div class="col-8">
                    <div class="row">
                        @foreach ($photos as $index => $photo)
                            <div class="col-6 mb-2">
                                <img class="demo cursor" src="{{ asset('images/products/attachments/' . $photo) }}" alt="" style="width: 100%; height: auto;">
                            </div>
                        @endforeach

                        <!-- Add empty divs if the number of images is odd -->
                        @if (count($photos) % 2 != 0)
                            <div class="col-6 mb-2" style="visibility: hidden;"></div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- product gallery section end -->

    <!-- product details css here -->
    <div class="product_details_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="product_details_left">
                        <form action="#">
                            <div class="product_ratting_stock d-flex">
                                <div class="product_ratting">
                                    <ul class="d-flex">
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li class="review"><span>5 Reviews</span></li>
                                    </ul>$photos[0]
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
                            </div>$photos[0]
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
                                <li>
                                    <a data-toggle="tab" href="#sheet" role="tab" aria-controls="sheet"
                                        aria-selected="false">{{ trans('singel_product.additional_information') }}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="sheet" role="tabpanel">
                                <div class="product_d_table">
                                    <form action="#">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="first_child">{{ trans('singel_product.raw_material') }}</td>
                                                    <td>{{ $product->material }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="first_child">{{ trans('singel_product.dimensions') }}</td>
                                                    <td>{{ $product->length}} x {{ $product->width }} x {{ $product->height }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="first_child">{{ trans('singel_product.department') }}</td>
                                                    <td>{{ $product->department->name }}</td>
                                                </tr>
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
            {{-- <div class="related_product_inner"> --}}
                <div class="row">
                    {{-- <h1 class="section-title text-center mb-3 pb-xl-2 mb-xl-4">{{ trans('home.our_products') }}</h1> --}}
                    @foreach ($related_product as $product)
                    <div class="col-lg-4 col-md-8 mt-5">
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
            {{-- </div> --}}
        </div>
    </section>

    <!-- product section end -->









@endsection
@section('scripts')
<script>
    let slideIndex = 1;
      showSlides(slideIndex);

      function plusSlides(n) {
        showSlides(slideIndex += n);
      }

      function currentSlide(n) {
        showSlides(slideIndex = n);
      }

      function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("demo");
        let captionText = document.getElementById("caption");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
        captionText.innerHTML = dots[slideIndex-1].alt;
      }
    </script>
@endsection
