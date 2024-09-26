@extends('layouts.front.master')

@section('css')
    <style>
        .slider_section2 {
            background-color: white;
        }
    </style>
@endsection
@section('content')
    {{-- <section class=" slider_section2 mb-50" > --}}

    <!-- our images gallery section start -->
    <div class="container mt-5">
        <div class="row">
            <div id="gallery">
                <h2 class="mainTitle text-center pb-3" data-lang="gallery title">gallery</h2>
                <div class="container">
                    <div class="box">
                        @foreach ($medias->where('type', 'image') as $media)
                            <div class="galleryPhoto">
                                <img src="{{ asset('/images/media/' . $media->file) }}" alt="gallery-01" />
                            </div>
                        @endforeach
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
    <div class="container " style="height: 700px">
        <div class="row">
            <div id="topVideos">
                <h2 class="mainTitle text-center pb-3" data-lang="top videos title">top videos</h2>
                <div class="container">
                    <div class="holder">
                        <div class="list">
                            <div class="name" data-lang="top videos name"></div>
                            <ul>
                                @foreach ($medias->where('type', 'video') as $media)


                                <li class="video-item text-center "
                                    data-video-src="{{ $media->file }}">
                                    <span><iframe width="260" height="130" class="rounded mt-0"
                                            src="{{ $media->file }}"
                                            allowfullscreen></iframe>
                                            <span data-lang="video 1" class="text-dark h6">{{ $media->title }}</span>

                                        </span>
                                </li>
                                @endforeach
                                <!-- Repeat for other videos -->
                            </ul>
                        </div>
                        <div class="preview">
                            <!-- <span data-lang="video 1"></span> -->
                            <span><iframe id="preview-frame" width="" height="450px" class="rounded mt-0"
                                    src="{{ $medias->where('type', 'video')->first()->file}}"
                                    allowfullscreen></iframe></span>
                            <!-- <div class="info" data-lang="info"></div> -->
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>




    {{-- </div> --}}

    {{-- </section> --}}
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
