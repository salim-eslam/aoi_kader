
    <!-- footer section start -->
    <footer class="footer_section footer_style2 footer_bg2">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="main_footer d-flex justify-content-center">
                        <div class="footer_widget_list">
                            <div class="footer_widget_title">
                                <h3>{{ trans('footer.atico') }}</h3>
                            </div>
                            <div class="footer_menu">
                                <ul>
                                    <li>
                                        <a href="{{ route('home') }}">{{ trans('footer.home') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('profile_projects') }}">{{ trans('footer.our_profile') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('about_us') }}">{{ trans('footer.about_us') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('contact_us') }}">{{ trans('footer.contact_us') }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="footer_widget_list">
                            <div class="footer_widget_title">
                                <h3>{{ trans('footer.products') }}</h3>
                            </div>
                            <div class="footer_menu">
                                <ul>
                                    @foreach ( $departments as $department )
                                    <li>
                                        <a href="shop-left-sidebar-rtl.html">{{ $department->name }}</a>
                                    </li>

                                    @endforeach

                                </ul>
                            </div>
                        </div>
                        <div class="footer_widget_list">
                            <div class="footer_widget_title">
                                <h3>{{ trans('footer.address') }}</h3>
                            </div>
                            <div class="map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2897.941676057003!2d31.355258443273524!3d30.258375800581273!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14580d721ee6bc9b%3A0x9f4f5ecb09f24699!2z2YXYtdmG2Lkg2KfYqtmK2YPZiA!5e0!3m2!1sar!2seg!4v1690874956831!5m2!1sar!2seg"
                                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>


                            <div class="footer_social">
                                <ul class="d-flex">
                                    <li>
                                        <a href="#">
                                            <i class="ion-social-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="ion-social-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="ion-social-vimeo"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.aoi.org.eg/en">
                                            <img src="{{ URL::asset('/images/logo/logo0.png') }}" >
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_bottom footer_bottom2">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="copyright_right text-center">
                            <p>&copy; 2023 All rights reserved Made By AOI Atico For Wooding Products</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
