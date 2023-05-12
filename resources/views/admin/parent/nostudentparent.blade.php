@extends('admin.layouts.master')
@section('title', 'Parents without Students')
@section('content')
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Parents</h3>

                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="students.html">Parents</a></li>
                            <li class="breadcrumb-item active">Users</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="student-group-form">
            <form>
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="form-group">
                            <input type="text" name="name" value="{{ request('name') }}" class="form-control"
                                placeholder="Search by Name...">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="form-group">
                            <input type="text" name="nrc" value="{{ request('nrc') }}" class="form-control"
                                placeholder="Search by Nrc ...">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" value="{{ request('parentCode') }}" name="parentCode"
                                placeholder="Search by Parent Code ...">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="search-student-btn">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table comman-shadow">
                    <div class="card-body">
                        @if (request('name') || request('nrc') || request('phone'))
                            <i class="fa-solid fa-arrow-left" onclick="history.back()"></i>
                        @endif

                        <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col justify-content-between">
                                    <h3 class="page-title">Parents Without Student -
                                        <span class="text-warning"> <i class="fa-solid fa-uers"></i>
                                            {{ $parentWithoutStudentCode->total() }}</span>
                                    </h3>
                                    <form class="d-flex">
                                        <select class="form-select me-2" name="status" id="gradeBox">
                                            <option value="">All</option>
                                            <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Active
                                            </option>
                                            <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>In
                                                Active</option>
                                        </select>

                                        <button type="submit" class="btn btn-primary">Filter</button>
                                    </form>
                                </div>

                            </div>
                        </div>

                        <div class="table-responsive">
                            @if (count($parentWithoutStudentCode) ==0 )
                                <div class="text-center">
                                    <div class="">
                                        <h2 class="gradient-large text-center">No Parent found!</h2>
                                        <a href="{{ route('admin#addStudentPage') }}" class="btn btn-primary"><i
                                                class="fa-solid fa-plus"></i> Add A Student</a>
                                    </div>
                                </div>
                            @else
                                <table
                                    class="table border-0 shadow star-student table-hover table-center mb-0 datatable table-striped">
                                    <thead class="student-thread">

                                        <tr>
                                            <th>
                                                <a href="" class="me-2">
                                                    <i class="fa-solid fa-user"></i>
                                                </a>
                                            </th>
                                            <th>Name</th>
                                            <th>Parent Code</th>
                                            <th>NRC</th>
                                            <th>Mobile Number</th>
                                            <th>Address</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($parentWithoutStudentCode as $parent)
                                            <tr>
                                                <td>
                                                    <div class="form-check check-tables">
                                                        <input class="form-check-input" type="checkbox" value="something">
                                                    </div>
                                                </td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="student-details.html" class="avatar avatar-sm me-2">
                                                            @if ($parent->image)
                                                                <img class="avatar-img rounded-circle"src="{{ asset('storage/' . $parent->image) }}"
                                                                    alt="User Image">
                                                            @else
                                                                @if ($parent->gender == 'male')
                                                                    <img class="avatar-img rounded-circle" width="200"
                                                                        height="200"
                                                                        src="{{ asset('storage/unknown/male.jpg') }}"
                                                                        alt="User Image">
                                                                @else
                                                                    <img class="avatar-img rounded-circle"
                                                                        src="{{ asset('storage/unknown/female.png') }}"
                                                                        alt="User Image">
                                                                @endif
                                                            @endif
                                                            <a href="{{ route('admin#parentDetails', $parent->id) }}"
                                                                class="text-info">{{ $parent->username }}</a>
                                                    </h2>
                                                </td>
                                                <td>
                                                    <span
                                                        class="badge  {{ $parent->parent_code == $parent->s_parentCode ? 'badge-soft-success' : 'badge-soft-danger' }} code">{{ $parent->parent_code }}</span>
                                                    <span class="badge badge-soft-primary clipboard"
                                                        onclick="copyToClipboard({{ json_encode($parent->parent_code) }})">
                                                        <i class="fa-solid fa-clipboard"></i>
                                                    </span>
                                                </td>
                                                <td>{{ $parent->nrc }}</td>
                                                <td>{{ $parent->phone }}</td>
                                                <td>{{ $parent->address }}</td>
                                                {{-- @if ($parent->status == 1)
                                                    <td id="badge"> <span class="badge badge-soft-success">Active</span></td>
                                                @else
                                                    <td> <span class="badge badge-soft-danger">In Active</span></td>
                                                @endif --}}
                                                <td><a href="{{ route('admin#addParent') }}"
                                                        class="btn btn-primary text-white"><i
                                                            class="fa-solid fa-plus "></i>Add Student</a>
                                                </td>


                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                        <div class="mt-2 px-2">
                            {{ $parentWithoutStudentCode->appends(request()->query())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
