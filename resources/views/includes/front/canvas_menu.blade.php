<div class="body_overlay">

</div>
<div class="offcanvas_menu">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="offcanvas_menu_wrapper">
                    <div class="canvas_close">
                        <a href="javascript:void(0)"><i class="ion-android-close"></i></a>
                    </div>
                    <div id="menu" class="text-left ">
                        <ul class="offcanvas_main_menu">
                            <li class="menu-item-has-children active">
                                <a href="{{ route('home') }}">{{ trans('canvas.home') }}</a>

                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">{{ trans('canvas.products') }}</a>
                                <ul class="sub-menu">
                                    @foreach ($departments as $department)
                                        <li><a href="{{ route('product_department_filter', encrypt($department->id)) }}">{{ $department->name }}</a></li>
                                    @endforeach
                                    <li><a href="{{ route('product_instock_filter') }}">{{trans('canvas.instock')}}</a></li>

                                </ul>
                            </li>
                            <li class="menu-item-has-children active">
                                <a href="{{ route('product_sales_filter') }}">{{ trans('canvas.sales') }}</a>

                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">{{ trans('canvas.our_profile') }}</a>
                                <ul class="sub-menu">

                                    <li><a href="{{ route('profile_projects') }}">{{trans('canvas.projects') }}</a></li>
                                    <li><a href="{{ route('profile_cataloges') }}">{{trans('canvas.cataloges') }}</a></li>

                                </ul>
                            </li>
                            <li class="menu-item-has-children"><a
                                    href="{{ route('about_us') }}">{{ trans('canvas.about_us') }}</a></li>
                            <li class="menu-item-has-children"><a
                                    href="{{ route('contact_us') }}">{{ trans('canvas.contact_us') }}</a></li>

                            <!-- <li class="menu-item-has-children"><a href="single-product.html">Product</a></li>
                            <li class="menu-item-has-children"><a href="contact.html">Contact Us</a></li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
