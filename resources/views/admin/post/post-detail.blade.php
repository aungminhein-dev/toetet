@extends('admin.layouts.master')
@section('title', 'Post Detail')
@section('content')
    <style>
        .card img {
            transition: 0.5s;
            overflow: hidden;
            cursor: pointer;
        }

        .card img:hover {
            transform: scale(1.3);
            opacity: 0.6;
        }
    </style>
    <div class="content container-fluid">
        <div class="row">
            <div class="col-3">
                <i class="fa-solid fa-arrow-left" onclick="history.back()"></i>
            </div>
            <div class="col-6 ">

                <div class="card shadow mb-4 box-shadow" style="overflow: hidden;">
                    @if (str_ends_with($post->media, '.jpg') ||
                            str_ends_with($post->media, '.png') ||
                            str_ends_with($post->media, '.jpeg') ||
                            str_ends_with($post->media, '.gif'))
                     <img src="{{ asset('storage/posts/' . $post->media) }}" alt="Image description">
                    @elseif(str_ends_with($post->media, '.mp4') || str_ends_with($post->media, '.webm') || str_ends_with($post->media, '.ogg'))
                        <video controls>
                            <source src="{{ asset($post->media) }}" type="video/mp4">

                        </video>
                    @elseif(str_ends_with($post->media, '.pdf'))
                        <iframe src="{{ asset($post->media) }}" width="100%" height="500"></iframe>
                    @endif
                    <div class="card-body bg-light" style="overflow: hidden">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title">{{ $post->title }} </h5>
                            <h6 class="text-warning">
                                {{ $post->created_at->format('j-F-Y') }}
                            </h6>
                        </div>
                        <h6 class="text-muted">Category - <span class="text-danger">{{ $post->category_name }}</span></h6>
                        <p class="card-text">{{ $post->description }}</p>
                        <a href="#" class="btn btn-primary">View</a>
                        <a href="#" class="btn btn-warning"><i class="fa-solid fa-pen"></i> Edit</a>
                        <a href="#" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Delete</a>
                        <a  href="{{ asset('storage/posts/' . $post->media) }}" class="btn btn-primary" download="{{ asset('storage/posts/' . $post->media) }}">Download File</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3"></div>
    </div>

    </div>
@endsection
