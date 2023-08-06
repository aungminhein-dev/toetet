@extends('HomeLayout')
@section('content')
    <div class="container-fluid p-3">
        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs" data-aos="fade-in">
            <div class="container">
                <h2>Post Details</h2>
                <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit
                    quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
            </div>
        </div><!-- End Breadcrumbs -->
        <!-- ======= Cource Details Section ======= -->
        <section id="course-details" class="course-details">
            <div class="container" data-aos="fade-up">

                <div class="row">
                    <div class="col-lg-8">
                        @if (str_ends_with($post->media, '.jpg') ||
                                str_ends_with($post->media, '.png') ||
                                str_ends_with($post->media, '.jpeg') ||
                                str_ends_with($post->media, '.gif'))
                            <img src="{{ asset('storage/posts/' . $post->media) }}" class="img-fluid" alt="Image">
                        @elseif (str_ends_with($post->media, '.mp4') || str_ends_with($post->media, '.webm') || str_ends_with($post->media, '.mkv'))
                            <video src="{{ asset('storage/posts/' . $post->media) }}" controls></video>
                        @elseif (str_ends_with($post->media, '.pdf'))
                            <embed src="{{ asset('storage/posts/' . $post->media) }}" type="application/pdf" width="100%"
                                height="600px">
                        @endif
                        <h3>{{ $post->title }}</h3>
                        <p>
                            {{ $post->description }}
                        </p>
                    </div>
                    <div class="col-lg-4">

                        <div class="course-info d-flex justify-content-between align-items-center">
                            <h5>Author</h5>
                            <p><a href="#">{{ $post->author_name }}</a></p>
                        </div>

                        <div class="course-info d-flex justify-content-between align-items-center">
                            <h5>View</h5>
                            <p>{{ $post->view_count }}</p>
                        </div>

                        <div class="course-info d-flex justify-content-between align-items-center">
                            <h5>Date</h5>
                            <p>{{ $post->created_at->format('j-F-Y') }}</p>
                        </div>
                        <input type="hidden" id="postId" value="{{$post->id}}"/>
                    </div>
                </div>

            </div>
        </section><!-- End Cource Details Section -->
    </div>
@endsection
@section('myScript')
 <script>
   $(document).ready(function(){
    let postId = $('#postId').val();
        $.ajax({
            type: 'get',
            url : '/add/viewCount',
            data: {
                postId : postId
            }
        })
    })
</script>

@endsection
