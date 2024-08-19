@extends('layouts.front.master')

@section('content')
    <!-- hero banner section start -->
    <section class="hero_about_section d-flex align-items-center about_img_under_header"
        data-bgimg="{{ URL::asset('/images/about/8.jpg') }}">
        <div class="container">
            <div class="row about_img_under_header">
                <div class="col-12">
                    <div class="hero_about_content text-center" style="margin-right: 50px;">
                    </div>
                </div>
            </div>
        </div>
    </section>

    @foreach ($abouts as $about)
        @if ($loop->iteration % 2 != 0)
            <section class="about_vision_section">
                <div class="container-fluid">
                    <div class="row no-gutters">
                        <div class="col-12">
                            <div class="about_luxury_inner d-flex align-items-center">
                                <div class="about_luxury_thumb">
                                    <img src="{{ '/images/abouts/' . $about->image }}" alt="">
                                </div>
                                <div class="about_luxury_content">
                                    <div class="luxury_content_top">
                                        <h3 class="wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">
                                            {{ $about->title }}</h3>
                                        {!! $about->body !!}
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @else
            <!-- hero banner section end -->
            <section class="about__section">
                <div class="container-fluid">
                    <div class="row no-gutters">
                        <div class="col-12">
                            <div class="about_luxury_inner d-flex align-items-center">

                                <div class="about_luxury_content">
                                    <div class="luxury_content_top">
                                        <h3 class="wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">
                                            {{ $about->title }}</h3>
                                        {!! $about->body !!}
                                    </div>
                                </div>
                                <div class="about_luxury_thumb">
                                    <img src="{{ '/images/abouts/' . $about->image }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endforeach


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
                                    <h5>Mollie Terry <span>CEO</span></h5>
                                    <p>“Gave 5 stars for excellent customer service. I had a couple of questions which they
                                        replied quickly to answer. If I could give multiple reasons for my rating it would
                                        also be for the design quality and customization to go along with the great service.
                                        The theme is excellent, keep up the great work."</p>
                                    <a href="#">Reply</a>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="our_team_inner d-flex justify-content-center">
                        @foreach ($teams as $team)
                            <div class="single_team wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">
                                <div class="team_thumb">
                                    <img class="border_border_redius" src="{{ '/images/teams/' . $team->image }}"
                                        alt="">
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
