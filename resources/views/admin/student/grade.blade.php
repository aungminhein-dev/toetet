@extends('admin.layouts.master')
@section('title', 'Grades')

@section('content')
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Grades</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="students.html">Grades</a></li>
                            <li class="breadcrumb-item active">Add Grades</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-lg-3 offset-lg-1">
                <div class="card shadow p-3">
                    <form action="{{ route('admin#addgrade') }}" method="post">
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
                        <div class="form-group">
                            <label class="text-warning">Add grade just numbers! Insert 0 if the student is
                                KinderGarden!<span class="login-danger">*</span></label>
                            Grade- <input type="number" class="form-control @error('grade') is-invalid  @enderror"
                                name="grade" id="">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">
                            Add
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card shadow p-lg-4 p-2">
                    <div class="tableresponsive">
                        <table class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                            <tr>
                                <th>Grades</th>
                                <th class="text-end">Action</th>
                            </tr>
                            @foreach ($grades as $grade)
                                <tr>
                                    <td>
                                        @if ($grade->grade == 0)
                                            KG
                                        @else
                                            Grade {{ $grade->grade }}
                                        @endif
                                    </td>
                                    <td class="text-start">
                                        <div class="actions ">
                                            <a href="{{ route('admin#gradeRemove', $grade->id) }}"
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

@endsection
