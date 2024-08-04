@extends('layouts.front.master')
@section('meta')
{!! MetaTag::tag('previos_work_description') !!}
{!! MetaTag::tag('previos_work_keywords') !!}
@endsection
@section('content')
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content text-center">
                        <h2>{{ $previos_work->title }}</h2>
                        <ul class="d-flex justify-content-center">
                            <li><a href="{{ route('home') }}">{{ trans('singel_project.home') }}</a></li>
                            <li>></li>
                            <li><a href="{{ route('project_show', encrypt($previos_work->id)) }}">{{ trans('singel_project.project_detail') }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_gallery_inner d-flex">
                        <div class="product_gallery_list">
                            <div class="product_gallery_thumb">
                                <a href="#"> <img src="{{ '/images/previos_work/layout/' . $previos_work->image }}"
                                        alt=""></a>
                            </div>
                        </div>

                        @for ($k = 0; $k < count($photos); $k = $k + 2)
                            <div class="product_gallery_list">
                                @for ($i = $k; $i < $k + 1; $i++)
                                    @for ($j = $i; $j < $i + 2; $j++)
                                        <div class="product_gallery_thumb">
                                            <a href="#"><img
                                                    src="{{ '/images/previos_work/attachments/' . $photos[$j] }}"
                                                    alt=""></a>
                                        </div>
                                    @endfor
                                @endfor
                            </div>
                        @endfor
                        {{-- @foreach (Arr::pluck($product->photos) as $photo)
                        <div class="product_gallery_list">
                            <div class="product_gallery_thumb">
                                <a href="#"><img src="{{ '/images/products/attachments/' . $photo->src }}" alt=""></a>
                            </div>
                        </div>
                    @endforeach --}}
                        {{-- <div class="product_gallery_list">
                        <div class="product_gallery_thumb">
                            <a href="#"><img src="assets/img/product/product-gallery3.png" alt=""></a>
                        </div>
                        <div class="product_gallery_thumb">
                            <a href="#"><img src="assets/img/product/product-gallery5.png" alt=""></a>
                        </div>
                    </div> --}}
                    </div>
                    {{-- <div class="product_social">
                    <ul class="d-flex justify-content-center">
                        <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                        <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                        <li><a href="#"><i class="ion-ios-email"></i></a></li>
                        <li><a href="#"><i class="ion-social-pinterest"></i></a></li>
                    </ul>
                </div> --}}
                </div>
            </div>
        </div>
    </div>
    <section class="blog_details_section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="blog_details_content">
                        <div class="blog_details_title">
                            <h2>{{ $previos_work->title }}</h2>
                        </div>
                        <div class="blog_d_meta ">
                            {{-- <span>01-11-2020 / by John Snow</span> --}}
                        </div>
                        <div class="blog_details_desc">
                            <p>{!! $previos_work->description !!}</p>
                            <p>{!! $previos_work->body !!}</p>
                        </div>
                        {{-- <div class="blog_details_blockquote">
                        <blockquote class="d-flex align-items-center">
                            <img src="assets/img/icon/blockcode2.png" alt="">
                            <h4>Lorem ipsum dolor sit amet consectetur adipisicing elit. voluptatum repellat adipisci odit nemo pariatur esse!</h4>
                        </blockquote>
                    </div> --}}
                        {{-- <div class="blog_details_desc">
                        <h4>Any mechanical keyboard enthusiasts in design?</h4>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Non, libero eaque. Tempora consequuntur quibusdam exercitationem aliquid a perspiciatis magnam quas nobis culpa pariatur cupiditate iusto, necessitatibus natus. Error eos obcaecati harum recusandae. Illum, sapiente repudiandae cum vero voluptatum architecto quae magni officiis delectus corporis! Quo laborum ipsa iusto aspernatur maxime nobis minus voluptatibus alias dicta voluptatem magnam praesentium nihil asperiores, ea libero quibusdam unde animi vero ab error exercitationem soluta et, distinctio atque. Itaque odit impedit fuga inventore dolore labore cum dolores necessitatibus natus atque cupiditate quam, rem, ullam in reprehenderit, accusantium nobis modi maxime. In libero laudantium possimus vero consequuntur. Harum, reprehenderit ex provident quod assumenda quis pariatur impedit ipsam quia et earum aliquam facilis cupiditate! Ut ipsa eius quas, cumque quos voluptatem aspernatur fuga ipsum accusamus. Ipsam necessitatibus placeat doloribus ad nemo quas voluptates quasi corrupti at illum. Adipisci neque saepe id nobis aut atque, dicta nam velit.</p>
                     </div>
                    <div class="post_tags_social d-flex justify-content-between">
                        <div class="post_tags d-flex align-items-center" >
                            <span>Tags: </span>
                            <ul class="d-flex">
                                <li><a href="#">Construction,</a></li>
                                <li><a href="#">Building,</a></li>
                                <li><a href="#">Structure</a></li>
                            </ul>
                        </div>
                        <div class="post__social d-flex align-items-center" >
                            <span>Share:</span>
                            <ul class="d-flex">
                                <li><a href="#"><img src="assets/img/icon/facebook.png" alt=""></a></li>
                                <li><a href="#"><img src="assets/img/icon/twitter.png" alt=""></a></li>
                                <li><a href="#"><img src="assets/img/icon/youtv.png" alt=""></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="blog_post_nav d-flex justify-content-between">
                        <div class="single_post_nav">
                            <div class="post_nav_top d-flex">
                                <div class="post_nav_thumb">
                                    <img src="assets/img/others/post-nav1.png" alt="">
                                </div>
                                <div class="post_nav_text left">
                                    <h4>How To Put Movies On <br> Iphone</h4>
                                    <span>24 Apr 2021 45 mins ago</span>
                                </div>
                            </div>
                            <div class="post_nav_link">
                                <a href="#">previous post</a>
                            </div>
                        </div>
                        <div class="single_post_nav right_post_nav">
                            <div class="post_nav_top d-flex">
                                <div class="post_nav_text right">
                                    <h4>How Does An Lcd Screen <br> Work</h4>
                                    <span>24 Apr 2021 45 mins ago</span>
                                </div>
                                <div class="post_nav_thumb">
                                    <img src="assets/img/others/post-nav2.png" alt="">
                                </div>
                            </div>
                            <div class="post_nav_link">
                                <a href="#">next post</a>
                            </div>
                        </div>
                    </div> --}}
                        <div class="blog_comment_wrapper">
                            <div class="comments_box">
                                <div class="comments_title">
                                    <h2>02 {{ trans('singel_project.comments') }}</h2>
                                </div>
                                @foreach ($previos_work->comments_show as $comment)
                                    <div class="comment_list d-flex">
                                        {{-- <div class="comment_thumb">
                                    <img src="assets/img/blog/post-comment1.png" alt="">
                                </div> --}}
                                        <div class="comment_content border">
                                            <h5>{{ $comment->name }} <span> {{ $comment->created_at }}</span><span>
                                                    {{ $comment->role }}</span></h5>
                                            <p>{!! $comment->comment !!}</p>
                                            {{-- <a href="#">Reply</a> --}}
                                        </div>
                                    </div>
                                @endforeach
                                {{-- <div class="comment_list d-flex">
                                <div class="comment_thumb">
                                    <img src="assets/img/blog/post-comment2.png" alt="">
                                </div>
                                <div class="comment_content border">
                                    <h5>Ricky Warren <span> 08-14-2021</span></h5>
                                    <p>This is a great theme, had a tiny discrepancy with an image size, but it was minor and they responded with above and beyond service. I own numerous elementor themes, and this is the best so far, as it's simple to change menus, footers, etc.</p>
                                    <a href="#">Reply</a>
                                </div>
                            </div> --}}
                            </div>
                            <div class="comments_form">
                                <div class="comments_title">
                                    <h2>{{ trans('singel_project.leave_reply') }}</h2>
                                </div>
                                <div class="comments_form_inner">
                                    <form action="{{ route('comment.project_detail.store') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <input class="form-control" type="text" name="previos_work_id"
                                                    style="display: none" value="{{ $previos_work->id }}">

                                                <div class="comments_form_input">
                                                    <textarea class="border" placeholder="{{ trans('singel_project.comments') }}" name="comment"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="comments_form_input">
                                                    <input class="border" placeholder="{{ trans('singel_project.name') }} *"  name="name" type="text">
                                                </div>

                                            </div>
                                            {{--
                                        <div class="col-lg-4 ">
                                            <div class="comments_form_input">
                                                <input class="border" placeholder="Email *" type="text">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="comments_form_input">
                                                <input class="border" placeholder="website" type="text">
                                            </div>
                                        </div> --}}

                                        </div>
                                        <button class="btn btn-link" type="submit">{{ trans('singel_project.comment') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
@endsection
