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
        <div id="gallery">
            <h2 class="mainTitle" data-lang="gallery title">gallery</h2>
            <div class="container">
              <div class="box">
                <div class="galleryPhoto">
                  <img src="{{asset('images/gallary/gallery-01.png')}}" alt="gallery-01" />
                 </div>
              </div>
              <div class="box">
                <div class="galleryPhoto">
                  <img src="{{asset('images/gallary/gallery-02.png')}}" alt="gallery-02" />
                </div>
              </div>
              <div class="box">
                <div class="galleryPhoto">
                  <img src="{{asset('images/gallary/gallery-03.jpg')}}" alt="gallery-03" />
                </div>
              </div>
              <div class="box">
                <div class="galleryPhoto">
                  <img src="{{asset('images/gallary/gallery-04.png')}}" alt="gallery-04" />
                </div>
              </div>
              <div class="box">
                <div class="galleryPhoto">
                  <img src="{{asset('images/gallary/gallery-05.jpg')}}" alt="gallery-04" />
                </div>
              </div>
              <div class="box">
                <div class="galleryPhoto">
                  <img src="{{asset('images/gallary/gallery-02.png')}}" alt="gallery-05" />
                </div>
              </div>
              <div class="box">
                <div class="galleryPhoto">
                  <img src="{{asset('images/gallary/gallery-04.png')}}" alt="gallery-04" />
                </div>
              </div>
              <div class="box">
                <div class="galleryPhoto">
                  <img src="{{asset('images/gallary/gallery-05.jpg')}}" alt="gallery-04" />
                </div>
              </div>

            </div>
          </div>
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
        <div id="topVideos">
            <h2 class="mainTitle" data-lang="top videos title">top videos</h2>
            <div class="container">
                <div class="holder">
                    <div class="list">
                        <div class="name" data-lang="top videos name"></div>
                        <ul>
                            <li class="video-item" data-video-src="https://www.youtube.com/embed/t9UVx2ZervM?si=KtCKLI3mkh2KI3Wy">
                                <span data-lang="video 1">video 1</span>
                                <span><iframe width="260" height="75" src="https://www.youtube.com/embed/t9UVx2ZervM?si=KtCKLI3mkh2KI3Wy" allowfullscreen></iframe></span>
                            </li>
                    <li class="video-item" data-video-src="https://www.youtube.com/embed/TeIqHn4SoWE?si=vvVK3W5hRJ9xJx37" >
                        <span data-lang="video 2">video 2</span>
                        <span><iframe width="260" height="75" src="https://www.youtube.com/embed/TeIqHn4SoWE?si=vvVK3W5hRJ9xJx37"  allowfullscreen></iframe></span>
                    </li>
                    <li class="video-item" data-video-src="https://www.youtube.com/embed/wyOJfLSeZIE?si=zr8qBII8XNWnU_FW" >
                        <span data-lang="video 3"></span>video 3<span><iframe width="260" height="75" src="https://www.youtube.com/embed/wyOJfLSeZIE?si=zr8qBII8XNWnU_FW"  allowfullscreen></iframe></span>
                    </li>
                    <li class="video-item" data-video-src="https://www.youtube.com/embed/t9UVx2ZervM?si=KtCKLI3mkh2KI3Wy">
                        <span data-lang="video 4"></span>video 4<span><iframe width="260" height="75" src="https://www.youtube.com/embed/t9UVx2ZervM?si=KtCKLI3mkh2KI3Wy" allowfullscreen></iframe></span></li>
                    <li class="video-item" data-video-src="https://www.youtube.com/embed/t9UVx2ZervM?si=KtCKLI3mkh2KI3Wy">
                        <span data-lang="video 4"></span>video 5<span><iframe width="260" height="75" src="https://www.youtube.com/embed/t9UVx2ZervM?si=KtCKLI3mkh2KI3Wy" allowfullscreen></iframe></span></li>
                    <li class="video-item" data-video-src="https://www.youtube.com/embed/t9UVx2ZervM?si=KtCKLI3mkh2KI3Wy" >
                        <span data-lang="video 6"></span>video 6<span><iframe width="260" height="75" src="https://www.youtube.com/embed/t9UVx2ZervM?si=KtCKLI3mkh2KI3Wy" allowfullscreen></iframe></span></li>
                    <li class="video-item" data-video-src="https://www.youtube.com/embed/t9UVx2ZervM?si=KtCKLI3mkh2KI3Wy" >
                        <span data-lang="video 7"></span>video 7<span><iframe width="260" height="75" src="https://www.youtube.com/embed/t9UVx2ZervM?si=KtCKLI3mkh2KI3Wy" allowfullscreen></iframe></span></li>
                    <li class="video-item" data-video-src="https://www.youtube.com/embed/t9UVx2ZervM?si=KtCKLI3mkh2KI3Wy">
                        <span data-lang="video 8"></span>video 8<span><iframe width="260" height="75" src="https://www.youtube.com/embed/t9UVx2ZervM?si=KtCKLI3mkh2KI3Wy" allowfullscreen></iframe></span></li>
                            <!-- Repeat for other videos -->
                        </ul>
                    </div>
                    <div class="preview">
                        <!-- <span data-lang="video 1"></span> -->
                        <span><iframe id="preview-frame" width="100%" height="450px" src="https://www.youtube.com/embed/t9UVx2ZervM?si=KtCKLI3mkh2KI3Wy" allowfullscreen></iframe></span>
                        <!-- <div class="info" data-lang="info"></div> -->
                    </div>
                </div>
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
    // JavaScript to change the video in the preview section
    document.querySelectorAll('.video-item').forEach(item => {
        item.addEventListener('click', function() {
            var videoSrc = this.getAttribute('data-video-src');
            document.getElementById('preview-frame').src = videoSrc;
        });
    });
</script>
@endsection
