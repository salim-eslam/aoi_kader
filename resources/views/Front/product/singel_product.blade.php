@extends('layouts.front.master')
@section('meta')
{!! MetaTag::tag('product_description') !!}
{!! MetaTag::tag('product_keywords') !!}
@endsection
@section('css')
<style>
.img1 {
  vertical-align: middle;
}

/* Position the image container (needed to position the left and right arrows) */
.con1 {
  position: relative;
}

/* Hide the images by default */
.mySlides {
  display: none;
}

/* Add a pointer when hovering over the thumbnail images */
.cursor {
  cursor: pointer;
}

/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 40%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* Container for image text */
.caption-container {
  text-align: center;
  background-color: #222;
  padding: 2px 16px;
  color: white;
}

.row1:after {
  content: "";
  display: table;
  clear: both;
}

/* Six columns side by side */
.col1{
  float: left;
  width: 16.66%;
}

/* Add a transparency effect for thumnbail images */
.demo {
  opacity: 0.6;
}

.active,
.demo:hover {
  opacity: 1;
}
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
    <h2 style="text-align:center">Slideshow Gallery</h2>

    <div class="con1">
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
</div>


    <!-- product gallery section start -->
    <div class="product_gallery_section mt-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_gallery_inner d-flex">
                        {{-- <div class="product_gallery_list"> --}}
                            {{-- <div class="product_gallery_thumb" > --}}
                                {{-- <a href="#"> <img src="{{ '/images/products/layout/' . $product->image }}"   alt=""></a> --}}
                            {{-- </div> --}}
                        {{-- </div> --}}

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
                    </div>
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
                                <div class="product_ratting">
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
            <div class="related_product_inner">
                <div class="row">
                    @foreach ($related_product as $r_product)
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a href="{{ route('product_show', encrypt($r_product->id)) }}"><img src="{{ '/images/products/layout/' . $r_product->image }}" alt=""></a>
                                        @if($r_product->offerd=='true')
                                            <div class="label_product">
                                                <span class="label_sale">Sale</span>
                                            </div>
                                        @endif
                                    </div>
                                    <figcaption class="product_content">
                                        <h4><a href="{{ route('product_show', encrypt($r_product->id)) }}">{{ $r_product->name }}</a></h4>
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
                </div>
            </div>
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
