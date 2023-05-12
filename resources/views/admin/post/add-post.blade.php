@extends('admin.layouts.master')
@section('title', 'Add Post')
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

                <form action="{{ route('admin#addPost') }}" method="post" enctype="multipart/form-data" onsubmit="submitForm()">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="bank-inner-details">
                                <div class="row">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Title<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="title">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 mb-1">
                                        <div class="form-group">
                                            <label>Category<span class="text-danger">*</span></label>
                                            <select name="postCategoryName" id="" class="form-control">
                                                <option>Select A Category</option>
                                                @foreach ($categories as $c)
                                                    <option value="{{ $c->category_name }}">{{ $c->category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 mb-1">
                                        <div class="form-group">
                                            <label>Viewer Type<span class="text-danger">*</span></label>
                                            <select name="viewerType" id="" class="form-control">
                                                <option selected>All</option>
                                               <option value="users">Parents</option>
                                               <option value="admin">Admins</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Grade</label>
                                            <select name="grade" id="" class="form-control">
                                                <option>Select Grade</option>
                                                @foreach ($grades as $g)
                                                    <option value="">Select Grade</option>
                                                    <option value="{{ old('grade', $g->grade) }}">
                                                        @if ($g->grade == '0')
                                                            KG
                                                        @else
                                                            Grade - {{ $g->grade }}
                                                        @endif
                                                    <option value="13">General</option>
                                                    </option>
                                                @endforeach
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
                                                <textarea class="form-control" name="description" id="" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" blog-categories-btn pt-0">
                            <div class="bank-details-btn ">
                                <button type="submit " class="btn bank-cancel-btn me-2">Add Post</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
            <div class="col-xl-4 mt-5">
                <div class="row mt-3">

                    <div class="card shadow p-3">
                        <form action="{{ route('admin#addCategory') }}" method="post">
                            @csrf

                            <div class="form-group">
                                <label class="text-warning">Add category for your future posts.
                                    <input type="text" class="form-control r " name="categoryName" id="">
                            </div>
                            <button type="submit" class="btn btn-primary w-100">
                                Add
                            </button>
                        </form>
                    </div>
                    <div class="">
                        <div class="card shadow p-3">
                            <div class="tableresponsive">
                                <table
                                    class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                    <tr>
                                        <th>Catrgories</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                    @foreach ($categories as $c)
                                        <tr>
                                            <td>
                                                {{ $c->category_name }}
                                            </td>
                                            <td class="text-start">
                                                <div class="actions ">
                                                    <a href="{{ route('admin#deleteCategory', $c->id) }}"
                                                        class="btn btn-sm bg-success-light me-2 shadow-sm">
                                                        <i class="fa-solid fa-trash"></i> </a>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
