@extends('layouts.front.master')

@section('css')
<style>
    .slider_section2{
        background-color: white;
    }
</style>
@endsection
@section('content')
<section class=" slider_section2 mb-50" >

   <!-- our images gallery section start -->
   <div class="container mt-5">
    <div class="row">

        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
            <div class="card myCard">
                <img src="{{asset('images/gallary/mountain.jpg')}}" class="card-img-top" alt="Image 1">
                <!-- <div class="card-body">
                    <p class="card-text">Description for Image 1</p>
                </div> -->
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
            <div class="card myCard">
                <img src="{{asset('images/gallary/image2.jpg')}}" class="card-img-top" alt="Image 2">
                <!-- <div class="card-body">
                    <p class="card-text">Description for Image 2</p>
                </div> -->
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 mb-4 ">
            <div class="card myCard">
                <img src="{{asset('images/gallary/image3.jpg')}}" class="card-img-top" alt="Image 3">
                <!-- <div class="card-body">
                    <p class="card-text">Description for Image 3</p>
                </div> -->
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
            <div class="card myCard">
                <img src="{{asset('images/gallary/image4.jpg')}}" class="card-img-top" alt="Image 1">
                <!-- <div class="card-body">
                    <p class="card-text">Description for Image 1</p>
                </div> -->
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
            <div class="card myCard">
                <img src="{{asset('images/gallary/image5.jpg')}}" class="card-img-top" alt="Image 2">
                <!-- <div class="card-body">
                    <p class="card-text">Description for Image 2</p>
                </div> -->
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
            <div class="card myCard">
                <img src="{{asset('images/gallary/image6.jpg')}}" class="card-img-top" alt="Image 3">
                <!-- <div class="card-body">
                    <p class="card-text">Description for Image 3</p>
                </div> -->
            </div>
        <!-- Add more images here -->
    </div>
</div>

{{-- <div class="row"> --}}
{{-- <h1 class="text-center">our videos</h1> --}}

<!-- our images galley section end -->
<!-- our videos gallery section start -->
<div class="modal fade" id="video-modal" tabindex="-1" aria-labelledby="video-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" id="video-player" src="" allowfullscreen></iframe>
                </div>
                <p>Here you can write whatever description you want</p>
            </div>
        </div>
    </div>
</div>

<!-- Video Gallery Container -->
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12">
            <!-- Video 1 -->
            <div class="video-gallery">
                <div class="embed-responsive embed-responsive-16by9 myVideo">
                    <iframe class="embed-responsive-item" data-video-url="https://www.youtube.com/embed/aj-dvRN1SCA" src="https://www.youtube.com/embed/aj-dvRN1SCA" frameborder="0" allowfullscreen></iframe>
                </div>
                <h5>Video 1 Title</h5>
                <p class="video-description" data-description="Description for Video 1">Video 1 Description</p>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <!-- Video 2 -->
            <div class="video-gallery">
                <div class="embed-responsive embed-responsive-16by9 myVideo">
                    <iframe class="embed-responsive-item" data-video-url="https://www.youtube.com/embed/aj-dvRN1SCA" src="https://www.youtube.com/embed/aj-dvRN1SCA" frameborder="0" allowfullscreen></iframe>
                </div>
                <h5>Video 2 Title</h5>
                <p class="video-description" data-description="Description for Video 2">Video 2 Description</p>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <!-- Video 3 -->
            <div class="video-gallery">
                <div class="embed-responsive embed-responsive-16by9 myVideo">
                    <iframe class="embed-responsive-item" data-video-url="https://www.youtube.com/embed/aj-dvRN1SCA" src="https://www.youtube.com/embed/aj-dvRN1SCA" frameborder="0" allowfullscreen></iframe>
                </div>
                <h5>Video 3 Title</h5>
                <p class="video-description" data-description="Description for Video 3">Video 3 Description</p>
            </div>
        </div>
    </div>
</div>


{{-- </div> --}}

</section>
 <!-- our videos galley section end -->
@endsection
@section('scripts')
<script>
    document.querySelectorAll('.video-gallery iframe').forEach(iframe => {
        iframe.parentElement.addEventListener('click', function() {
            const videoUrl = iframe.getAttribute('data-video-url');
            const description = this.nextElementSibling.nextElementSibling.getAttribute('data-description');
            document.getElementById('video-player').setAttribute('src', videoUrl);
            document.querySelector('#video-modal .modal-body p').textContent = description;
            const modal = new bootstrap.Modal(document.getElementById('video-modal'));
            modal.show();
        });
    });
</script>
@endsection
