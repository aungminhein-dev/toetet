@extends('HomeLayout')
@section('content')
    <div class="container-fluid">
        <!-- ======= Popular Courses Section ======= -->
        <section id="popular-courses" class="courses">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Posts</h2>
                </div>

                <div class="row" data-aos="zoom-in" data-aos-delay="100">

                    @foreach ($posts as $post)
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                            <div class="course-item">
                                @if (str_ends_with($post->media, '.jpg') ||
                                        str_ends_with($post->media, '.png') ||
                                        str_ends_with($post->media, '.jpeg') ||
                                        str_ends_with($post->media, '.gif'))
                                    <img src="{{ asset('storage/posts/' . $post->media) }}" class="img-fluid" alt="Image">
                                @elseif (str_ends_with($post->media, '.mp4') || str_ends_with($post->media, '.webm') || str_ends_with($post->media, '.mkv'))
                                    <video src="{{ asset('storage/posts/' . $post->media) }}" controls></video>
                                @elseif (str_ends_with($post->media, '.pdf'))
                                    <embed src="{{ asset('storage/posts/' . $post->media) }}" type="application/pdf"
                                        width="100%" height="600px">
                                @endif
                                <div class="course-content">
                                    <div class="d-flex justify-content-between align-items-center mb-3">

                                            <a href="{{ route('postDetails', $post->id) }}"
                                                class="btn btn-success">read</a>

                                        <p class="price">{{ $post->created_at->format('j-F-Y') }}</p>
                                    </div>

                                    <h3><a href="course-details.html">{{ $post->title }}</a></h3>
                                    <p>{{ Str::words($post->description, 20) }}</p>
                                    <div class="trainer d-flex justify-content-between align-items-center">
                                        <div class="trainer-profile d-flex align-items-center">
                                            @if (str_ends_with($post->media, '.jpg') ||
                                                    str_ends_with($post->media, '.png') ||
                                                    str_ends_with($post->media, '.jpeg') ||
                                                    str_ends_with($post->media, '.gif'))
                                                <img src="{{ asset('storage/posts/' . $post->media) }}" alt="Image">
                                            @elseif (str_ends_with($post->media, '.mp4') || str_ends_with($post->media, '.webm') || str_ends_with($post->media, '.mkv'))
                                                <video src="{{ asset('storage/posts/' . $post->media) }}" controls></video>
                                            @elseif (str_ends_with($post->media, '.pdf'))
                                                <embed src="{{ asset('storage/posts/' . $post->media) }}"
                                                    type="application/pdf" width="100%" height="600px">
                                            @endif
                                            <span>Antonio</span>
                                        </div>
                                        <div class="trainer-rank d-flex align-items-center">
                                            <i class="bi bi-eye"></i>&nbsp;{{ $post->view_count }}
                                            &nbsp;&nbsp;

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- End Course Item-->
                    @endforeach

                </div>

            </div>
        </section><!-- End Popular Courses Section -->

    </div>
@endsection
