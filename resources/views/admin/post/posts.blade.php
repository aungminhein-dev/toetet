@extends('admin.layouts.master')
@section('title', 'Posts')
@section('content')

    <div class="content container-fluid">
        <div class="container pb-5">
             <div class="d-flex justify-content-between align-items-center">
                    <h4>Posts</h4>
                    <div class="top-nav-search">
                        <form>
                            <input type="text" name="key" class="form-control" value="{{request('key')}}" placeholder="Search here">
                            <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
             </div>
            <hr>
            <div class="row">
               @if(count($posts))
                <!-- Category 1 -->
                @foreach ($posts as $p)
                    <div class="col-12 col-lg-4  ">
                        <div class="card mb-4 box-shadow post" style="overflow: hidden;" >
                            @if (str_ends_with($p->media, '.jpg') ||
                                    str_ends_with($p->media, '.png') ||
                                    str_ends_with($p->media, '.jpeg') ||
                                    str_ends_with($p->media, '.gif'))
                                <img src="{{ asset('storage/posts/'.$p->media) }}" alt="Image description" >
                            @elseif(str_ends_with($p->media, '.mp4') || str_ends_with($p->media, '.webm') || str_ends_with($p->media, '.ogg'))
                                <video controls poster="{{asset('storage/logo/toetet.svg')}}">
                                    <source src="{{ asset('storage/posts/'.$p->media) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            @elseif(str_ends_with($p->media, '.pdf'))
                                <iframe src="{{ asset('storage/posts/'.$p->media) }}" ></iframe>
                            @endif
                            <div class="card-body bg-light" style="overflow: hidden">
                                 <div class="d-flex justify-content-between">
                                    <h5 class="card-title">{{ $p->title }} </h5>
                                    <h5 class="text-muted">{{$p->viewer_type}}</h5>
                                    <h6 class="text-warning">
                                        {{$p->created_at->format('j-F-Y')}}
                                    </h6>
                                 </div>
                                 <h6 class="text-muted">Category - <span class="text-danger">{{$p->category_name}}</span></h6>
                                <p class="card-text">{{ $p->description }}</p>
                                <a href="{{route('admin#postDetail',$p->id)}}" class="btn btn-primary" >View</a>
                                <a href="{{route('admin#editPost',$p->id)}}" class="btn btn-warning"><i class="fa-solid fa-pen"></i> Edit</a>
                                <a href="{{route('admin#deletePost',$p->id)}}" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Delete</a>

                            </div>
                            <a  href="{{ asset('storage/posts/' . $p->media) }}" class="btn btn-primary" download="{{ asset('storage/posts/' . $p->media) }}">Download</a>
                        </div>
                    </div>
                @endforeach
               @else
               <h2 class="text-muted">No post found.</h2>
               @endif
            </div>
        </div>

    </div>
@endsection
