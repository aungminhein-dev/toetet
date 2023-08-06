@extends('admin.layouts.master')
@section('title', 'Edit Post')
@section('content')
    <div class="content container-fluid">
        <div class="row pb-5">
            <div class="col-xl-8">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Add Post</h3>
                        </div>
                    </div>
                </div>

                <form action="{{ route('admin#updatePost') }}" method="post" enctype="multipart/form-data" onsubmit="loading()">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <div class="bank-inner-details">
                                <input type="hidden" value="{{$post->id}}" name="id">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Title<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control"
                                                value="{{ old('title', $post->title) }}" name="title">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Grade</label>
                                            <select name="grade" id="" class="form-control">
                                                <option>Select Grade</option>
                                                @foreach ($grades as $g)
                                                    <option value="">Select Grade</option>
                                                    <option value="{{ old('grade', $g->grade) }} "
                                                        @if ($post->grade == $g->grade) selected @endif>
                                                        @if ($g->grade == '0')
                                                            KG
                                                        @else
                                                            Grade - {{ $g->grade }}
                                                        @endif
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 mb-1">
                                        <div class="form-group">
                                            <label>Viewer Type<span class="text-danger">*</span></label>
                                            <select name="viewerType" id="" class="form-control">
                                                <option value="public">Public</option>
                                               <option value="users">Parents</option>
                                               <option value="admin">Admins</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 mb-1">
                                        <div class="form-group">
                                            <label>Post Type<span class="text-danger">*</span></label>
                                            <select name="postType" id="" class="form-control">
                                                <option vaue="lesson">Lessons</option>
                                                <option value="normal">Normal</option>
                                            </select>
                                        </div>
                                    </div>

                                    <input type="hidden" name="authorName" value="{{ Auth::user()->username }}">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Attachments</label>
                                            <div class="change-photo-btn">
                                                <input type="file" class="form-control" name="media">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Description</label>
                                                <textarea class="form-control" name="description" id="" rows="3">{{ old('description', $post->description) }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" blog-categories-btn pt-0">
                            <div class="bank-details-btn ">
                                <button type="submit " class="btn bank-cancel-btn me-2">Save</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
