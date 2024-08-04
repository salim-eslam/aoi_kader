@extends('layouts.front.master')

@section('content')

    <!-- hero banner section start -->
    <section class="hero_about_section d-flex align-items-center about_img_under_header" data-bgimg="{{ URL::asset('/images/about/8.jpg') }}" >
        <div class="container">
            <div class="row about_img_under_header" >
                <div class="col-12">
                    <div class="hero_about_content text-center" style="margin-right: 50px;">
                        {{-- <h2 class="wow fadeInUp" style="color: black" data-wow-delay="0.1s" data-wow-duration="1.1s">مرحبا بك <br> <span>مصنع اتــكــو</span></h2> --}}
                        {{-- <ul class="d-flex wow fadeInUp text-center" data-wow-delay="0.2s" data-wow-duration="1.2s">
                            <li><a href="{{ route('home') }}">{{ trans('about.home') }}</a></li>
                            <li>></li>
                            <li><a href="{{ route('about_us') }}">{{ trans('about.about_us') }}</a></li>
                        </ul> --}}

                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="about_vision_section">
        <div class="container-fluid">
            <div class="row no-gutters">
                <div class="col-12">
                    <div class="about_luxury_inner d-flex align-items-center">
                        <div class="about_luxury_thumb">
                            <img src="{{ URL::asset('/images/about/15.JPG') }}" alt="">
                        </div>
                        <div class="about_luxury_content">
                            <div class="luxury_content_top">
                                <h3 class="wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">{{ trans('about.factory_info') }}</h3>
                                <p class="mb-30 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.2s">{{ trans('about.factory_info_p1') }}</p>
                                <p class="mb-30 wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1.3s">{{ trans('about.factory_info_p2') }}</p>
                                <p class="mb-30 wow fadeInUp" data-wow-delay="0.4s" data-wow-duration="1.4s">{{ trans('about.factory_info_p3') }}</p>
                                <p class="mb-30 wow fadeInUp" data-wow-delay="0.5s" data-wow-duration="1.5s">{{ trans('about.factory_info_p4') }}</p>
                                <p class="mb-30 wow fadeInUp" data-wow-delay="0.6s" data-wow-duration="1.6s">{{ trans('about.factory_info_p5') }}</p>
                            </div>
                            {{-- <div class="luxury_blockquote d-flex wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">
                                <img src="{{ URL::asset('assets/front/img/icon/blockcode.png') }}" alt="">
                                <p>Guys, you don't just buy the theme, you also buy excellent support from the devs, so be sure that whatever problem you face, they will help you with it ;) 5 stars!</p>
                            </div> --}}
                            {{-- <div class="luxury_author d-flex align-items-center wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.2s">
                                <img src="{{ URL::asset('assets/front/img/others/testi-author1.png') }}" alt="">
                                <h3><a href="#">Jerome Bell • Indiana</a></h3>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- hero banner section end -->
    <section class="about__section">
        <div class="container-fluid">
            <div class="row no-gutters">
                <div class="col-12">
                    <div class="about_luxury_inner d-flex align-items-center">

                        <div class="about_luxury_content">
                            <div class="luxury_content_top">
                                <h3 class="wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">{{ trans('about.production_lines') }}</h3>
                                <p class="mb-30 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.2s">{{ trans('about.production_lines_p1') }}</p>
                                <p class="mb-30 wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1.3s">{{ trans('about.production_lines_p2') }}</p>
                                <p class="mb-30 wow fadeInUp" data-wow-delay="0.4s" data-wow-duration="1.4s">{{ trans('about.production_lines_p3') }}</p>
                                <p class="mb-30 wow fadeInUp" data-wow-delay="0.5s" data-wow-duration="1.5s">{{ trans('about.production_lines_p4') }}</p>
                            </div>
                            {{-- <div class="luxury_blockquote d-flex wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">
                                <img src="{{ URL::asset('assets/front/img/icon/blockcode.png') }}" alt="">
                                <p>Guys, you don't just buy the theme, you also buy excellent support from the devs, so be sure that whatever problem you face, they will help you with it ;) 5 stars!</p>
                            </div> --}}
                            {{-- <div class="luxury_author d-flex align-items-center wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.2s">
                                <img src="{{ URL::asset('assets/front/img/others/testi-author1.png') }}" alt="">
                                <h3><a href="#">Jerome Bell • Indiana</a></h3>
                            </div> --}}
                        </div>
                        <div class="about_luxury_thumb">
                            <img src="{{ URL::asset('images/about/3.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about_vision_section">
        <div class="container-fluid">
            <div class="row no-gutters">
                <div class="col-12">
                    <div class="about_luxury_inner d-flex align-items-center">
                        <div class="about_luxury_thumb">

                            @if (app()->getLocale() == 'ar')
                            <img src="{{ URL::asset('images/about/201.jpg') }}" alt="">

                            @else
                            <img src="{{ URL::asset('images/about/18.jpg') }}" alt="">

                            @endif

                        </div>
                        <div class="about_luxury_content">
                            <div class="luxury_content_top">
                                <h3 class="wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">{{ trans('about.factory_vision') }}</h3>
                                <p class="mb-30 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.2s">{{ trans('about.factory_vision_p1') }}</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about__section">
        <div class="container-fluid">
            <div class="row no-gutters">
                <div class="col-12">
                    <div class="about_luxury_inner d-flex align-items-center">

                        <div class="about_luxury_content">
                            <div class="luxury_content_top">
                                <h3 class="wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">{{ trans('about.factory_mission') }}</h3>
                                <p class="mb-30 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.2s">{{ trans('about.factory_mission_p1') }}</p>
                            </div>
                            {{-- <div class="luxury_blockquote d-flex wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">
                                <img src="{{ URL::asset('assets/front/img/icon/blockcode.png') }}" alt="">
                                <p>Guys, you don't just buy the theme, you also buy excellent support from the devs, so be sure that whatever problem you face, they will help you with it ;) 5 stars!</p>
                            </div> --}}
                            {{-- <div class="luxury_author d-flex align-items-center wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.2s">
                                <img src="{{ URL::asset('assets/front/img/others/testi-author1.png') }}" alt="">
                                <h3><a href="#">Jerome Bell • Indiana</a></h3>
                            </div> --}}
                        </div>
                        <div class="about_luxury_thumb">
                            <img src="{{ URL::asset('images/about/17.jpg') }}" height="387px" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about luxury section start -->
    <section class="about_vision_section">
        <div class="container-fluid">
            <div class="row no-gutters">
                <div class="col-12">
                    <div class="about_luxury_inner d-flex align-items-center">
                        <div class="about_luxury_thumb">
                            <img src="{{ URL::asset('images/about/200.jpg') }}" alt="">
                        </div>
                        <div class="about_luxury_content">
                            <div class="luxury_content_top">
                                <h3 class="wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">{{ trans('about.current_activities') }}</h3>
                                <p class="mb-30 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.2s">{{ trans('about.current_activities_p1') }}</p>
                                <p class="mb-30 wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1.3s">{{ trans('about.current_activities_p2') }}</p>
                                <p class="mb-30 wow fadeInUp" data-wow-delay="0.4s" data-wow-duration="1.4s">{{ trans('about.current_activities_p3') }}</p>
                                <p class="mb-30 wow fadeInUp" data-wow-delay="0.5s" data-wow-duration="1.5s">{{ trans('about.current_activities_p4') }}</p>
                                <p class="mb-30 wow fadeInUp" data-wow-delay="0.6s" data-wow-duration="1.6s">{{ trans('about.current_activities_p5') }}</p>
                                <p class="mb-30 wow fadeInUp" data-wow-delay="0.7s" data-wow-duration="1.7s">{{ trans('about.current_activities_p6') }}</p>
                            </div>
                            {{-- <div class="luxury_blockquote d-flex wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">
                                <img src="{{ URL::asset('assets/front/img/icon/blockcode.png') }}" alt="">
                                <p>Guys, you don't just buy the theme, you also buy excellent support from the devs, so be sure that whatever problem you face, they will help you with it ;) 5 stars!</p>
                            </div> --}}
                            {{-- <div class="luxury_author d-flex align-items-center wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.2s">
                                <img src="{{ URL::asset('assets/front/img/others/testi-author1.png') }}" alt="">
                                <h3><a href="#">Jerome Bell • Indiana</a></h3>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- about luxury section end -->

     <!-- about vision section start -->

    <section class="our_team_section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="our_team_title text-center wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">
                        <h2>Our Talent Team</h2>
                    </div>
                    <div class="blog_comment_wrapper">
                        <div class="comments_box">

                            <div class="comment_list d-flex">
                                <div class="comment_thumb">
                                    <img src="{{ URL::asset('images/about/9.jpg') }}" alt="">
                                </div>
                                <div class="comment_content border">
                                    <h5>Mollie Terry  <span>CEO</span></h5>
                                    <p>“Gave 5 stars for excellent customer service. I had a couple of questions which they replied quickly to answer. If I could give multiple reasons for my rating it would also be for the design quality and customization to go along with the great service. The theme is excellent, keep up the great work."</p>
                                    <a href="#">Reply</a>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="our_team_inner d-flex justify-content-center">
                        @foreach ($teams as $team )
                            <div class="single_team wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">
                                <div class="team_thumb">
                                    <img class="border_border_redius" src="{{'/images/teams/'.$team->image }}" alt="">
                                </div>
                                <div class="team_name">
                                    <h3><a href="#">{{ $team->name }}</a></h3>
                                </div>
                            </div>

                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- our team section end -->

@endsection
@section('scripts')

@endsection
