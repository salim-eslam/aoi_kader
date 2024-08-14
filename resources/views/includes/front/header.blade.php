<!--header area start-->
<header class="header_section header_style2 header_transparent mb-30">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="main_header d-flex justify-content-between align-items-center">
                    <div class="header_logo">
                        <a class="sticky_none" href="{{ route('home') }}">
                            @if (app()->getLocale() == 'ar')
                            <img src="{{ URL::asset('/images/logo/logo1.jpg') }}" style="height: 80px !important; width:110px; margin-right:20px" alt="">
                            @else
                            <img src="{{ URL::asset('/images/logo/logo1.jpg') }}" style="height: 80px !important ;width:110px; margin-left:20px " alt="">
                            @endif
                        </a>
                    </div>
                    <div class="header_sidebar d-flex align-items-center">
                        <!--main menu start-->
                        <div class="main_menu d-none d-lg-block">
                            <nav>
                                <ul class="d-flex">
                                    <li>
                                        <a class="active" href="{{ route('home') }}">{{ trans('header.home') }}</a>
                                    </li>
                                    <li>
                                        <a class="active" href="#">{{ trans('header.products') }}</a>
                                        <ul class="sub_menu">
                                            @foreach ( $departments as $department )
                                             <li><a href="{{ route('product_department_filter', encrypt($department->id)) }}">{{ $department->name }}</a></li>

                                            @endforeach
                                             <li><a href="{{ route('product_instock_filter') }}">{{trans('header.instock')  }}</a></li>

                                        </ul>
                                    </li>
                                    {{-- <li>
                                        <a class="active" href="{{ route('product_sales_filter') }}">{{ trans('header.sales') }}</a> --}}

                                    <li>
                                        <a class="active" href="#">{{ trans('header.our_profile') }}</a>
                                        <ul class="sub_menu">
                                            <li><a href="{{ route('profile_projects') }}">{{ trans('header.projects') }}</a></li>
                                            <li><a href="{{ route('profile_cataloges') }}">{{ trans('header.cataloges') }}</a></li>

                                        </ul>
                                    </li>
                                    <li >
                                        <a class="active" href="{{ route('video_library') }}">{{ trans('header.Video_library') }}</a></li>
                                    <li>
                                        <a class="active" href="{{ route('about_us') }}">{{ trans('header.about_us') }}</a>
                                    </li>

                                    <li>
                                        <a class="active" href="{{ route('contact_us') }}">{{ trans('header.contact_us') }}</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <!--main menu end-->
                        <div class="header__ridebar d-flex align-items-center">
                            <div class="header_account">
                                <ul class="d-flex">

                                    <li class="header_search_btn">
                                        <a href="#">
                                            <img src="{{ URL::asset('/images/icon/search.png') }}"
                                                alt="">
                                        </a>
                                    </li>
                                    <li class="shopping_cart">
                                        @if (app()->getLocale() == 'en')
                                            <a rel="alternate" hreflang="ar"
                                                href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}">

                                                <img src="{{ URL::asset('/images/icon/Lang_ar.png') }}"
                                                    alt="">

                                            </a>
                                        @else
                                            <a rel="alternate" hreflang="en"
                                                href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">

                                                <img src="{{ URL::asset('/images/icon/Lang_en.png') }}"
                                                    alt="">

                                            </a>
                                        @endif
                                    </li>

                                    <li class="account_link_menu">
                                        <a href="#">
                                            <img src="{{ URL::asset('/images/icon/contact_us.png') }}"
                                                alt="">
                                        </a>
                                        <ul class="dropdown_account_link">
                                            <li>
                                                <a class="active" href="{{ route('about_us') }}">{{ trans('header.about_us') }} </a>
                                            </li>
                                            <li>
                                                <a class="active" href="{{ route('contact_us') }}">{{ trans('header.contact_us') }}</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="canvas_open">
                                <a href="javascript:void(0)">
                                    <i class="ion-navicon"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</header>
<!--mini cart-->
<!-- <div class="mini_cart">
        <div class="cart_gallery">
            <div class="cart_close">
                <div class="cart_text">
                    <h3>cart</h3>
                </div>
                <div class="mini_cart_close">
                    <a href="javascript:void(0)"><i class="ion-android-close"></i></a>
                </div>
            </div>
            <div class="cart_item">
               <div class="cart_img">
                   <a href="#"><img src="assets/img/product/small-product1.png" alt=""></a>
               </div>
                <div class="cart_info">
                    <a href="#">Primis In Faucibus</a>
                    <p>1 x <span> $65.00 </span></p>
                </div>
                <div class="cart_remove">
                    <a href="#"><i class="icon-close icons"></i></a>
                </div>
            </div>
            <div class="cart_item">
               <div class="cart_img">
                <a href="#"><img src="assets/img/product/small-product2.png" alt=""></a>
               </div>
                <div class="cart_info">
                    <a href="#">Letraset Sheets</a>
                    <p>1 x <span> $60.00 </span></p>
                </div>
                <div class="cart_remove">
                    <a href="#"><i class="icon-close icons"></i></a>
                </div>
            </div>
        </div>
        <div class="mini_cart_table">
            <div class="cart_table_border">
                <div class="cart_total">
                    <span>Sub total:</span>
                    <span class="price">$125.00</span>
                </div>
                <div class="cart_total mt-10">
                    <span>total:</span>
                    <span class="price">$125.00</span>
                </div>
            </div>
        </div>
        <div class="mini_cart_footer">
           <div class="cart_button">
                <a href="#"><i class="fa fa-shopping-cart"></i> View cart</a>
            </div>
            <div class="cart_button">
                <a href="#"><i class="fa fa-sign-in"></i> Checkout</a>
            </div>
        </div>
    </div> -->
<!--mini cart end-->
<!-- page search box -->
<div class="page_search_box">
    <div class="search_close">
        <i class="ion-close-round"></i>
    </div>
    <form class="border-bottom" action="{{ route('product_search') }}" method="GET">
        @csrf
        <input  name="name" class="border-0" placeholder="Search products..." type="text">
        <button type="submit"><i class="icofont-search"></i></button>
    </form>
</div>
<!--header area end-->
