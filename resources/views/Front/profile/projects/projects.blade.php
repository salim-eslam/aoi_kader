@extends('layouts.front.master')

@section('content')
    <div class="breadcrumbs_area blog_list_bg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content text-center">
                        <h2>{{ trans('projects.projects') }}</h2>
                        <ul class="d-flex justify-content-center">
                            <li><a href="{{ route('home') }}">{{ trans('projects.home') }}</a></li>
                            <li>></li>
                            <li><a href="{{ route('profile_projects') }}">{{ trans('projects.projects') }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- blog page section start -->
    <section class="blog_page_section">
        <div class="container-fluid">
            <div class="row no-gutters">
                <div class="col-12">
                    @foreach ($previos_works as $previos_work)
                        @if ($loop->iteration % 2 != 0)
                        <div class="blog_list">
                            <div class="single_blog_page d-flex align-items-center justify-content-between">
                                <div class="blog_page_content left"  >
                                    {{-- <span class="wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">01-11-2021 / by
                                        John Snow</span> --}}
                                    <h3 class="wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.2s"><a
                                            href="{{ route('project_show', encrypt($previos_work->id)) }}">{{ $previos_work->title }}</a>
                                    </h3>
                                    <p class="wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1.3s">{!! $previos_work->description !!}</p>
                                    <a class="btn btn-link wow fadeInUp" href="{{ route('project_show', encrypt($previos_work->id)) }}" data-wow-delay="0.4s"
                                        data-wow-duration="1.4s">{{ trans('projects.read_more') }}</a>
                                </div>
                                <div class="blog_page_thumb" >
                                    <img src="{{ '/images/previos_work/layout/' . $previos_work->image }}" alt="">
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="blog_list blog_list_bg">
                            <div class="single_blog_page d-flex align-items-center justify-content-start">
                                <div class="blog_page_thumb" style="order: 1">
                                    <img src="{{ '/images/previos_work/layout/' . $previos_work->image }}" alt="">
                                </div>
                                <div class="blog_page_content right" style="order: 2">
                                    {{-- <span class="wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">01-11-2021 / by
                                        John Snow</span> --}}
                                    <h3 class="wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.2s"><a
                                            href="{{ route('project_show', encrypt($previos_work->id)) }}">{{ $previos_work->title }}</a></h3>
                                    <p class="wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1.3s">{!! $previos_work->description !!}
                                    </p>
                                    <a class="btn btn-link wow fadeInUp" data-wow-delay="0.4s" data-wow-duration="1.4s"
                                        href="{{ route('project_show', encrypt($previos_work->id)) }}">{{ trans('projects.read_more') }}</a>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach




                </div>
            </div>
        </div>
    </section>
    <!-- blog page section end -->
@endsection
