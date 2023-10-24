@extends('admin.layouts.master')
@section('title', 'Parent List')

@section('content')
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Parents Table</h3>

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
                        @if (request('name') || request('nrc') || request('parentCode'))
                            <i class="fa-solid fa-arrow-left" onclick="history.back()"></i>
                        @endif

                        <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col justify-content-between">
                                    <h3 class="page-title"> <span class="text-warning">Count - <i
                                                class="fa-solid fa-users"></i>
                                            {{ $parents->total() }}</span>
                                    </h3>
                                    @if ($parentWithStudentCode)
                                        <div class="alert alert-danger mt-2">
                                            <a class="text-danger" href="{{ route('admin#noStudentParents') }}">
                                                Parents without Students -
                                                {{ $parents->total() - $parentWithStudentCode }}
                                            </a>
                                        </div>
                                    @else
                                        <div class="alert alert-danger">
                                            <a href="{{ route('admin#noStudentParents') }}">
                                                Parents with Students -
                                                {{ $parentWithStudentCode }}
                                            </a>
                                        </div>
                                    @endif

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
                            @if (count($parents) == 0)
                                <div class="text-center">
                                    <div class="">
                                        <h2 class="text-muted">No Parent found!</h2>
                                        <a href="{{ route('admin#addParentPage') }}" class="btn btn-primary"><i
                                                class="fa-solid fa-plus"></i> Add A Parent</a>
                                    </div>
                                </div>
                            @else
                                <table
                                    class="table border-0 shadow star-student table-hover table-center mb-0 datatable table-striped">
                                    <thead class="student-thread">

                                        <tr>
                                            <th class="text-center">
                                                <a href="" class="me-2">
                                                    <i class="fa-solid fa-user"></i>
                                                </a>
                                            </th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Parent Code</th>
                                            <th class="text-center">NRC</th>
                                            <th class="text-center">Mobile Number</th>
                                            <th class="text-center">Address</th>
                                            <th class="text-center">Active Status</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($parents as $parent)
                                            <tr data-user-id="{{ $parent->id }}">
                                                <td class="text-center">
                                                    <div class="form-check check-tables">
                                                        <input class="form-check-input" type="checkbox" value="something">
                                                    </div>
                                                </td>
                                                <td class="text-center">
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
                                                <td class="text-center"><span
                                                        class="badge code {{ $parent->parent_code == $parent->s_parentCode ? 'badge-soft-success' : 'badge-soft-danger' }}">{{ $parent->parent_code }}</span>
                                                    <span class="badge badge-soft-primary clipboard"
                                                        onclick="copyToClipboard({{ json_encode($parent->parent_code) }})">
                                                        <i class="fa-solid fa-clipboard"></i>
                                                    </span>
                                                </td>
                                                <td class="text-center">{{ $parent->nrc }}</td>
                                                <td class="text-center">{{ $parent->phone }}</td>
                                                <td class="text-center">{{ $parent->address }}</td>
                                                <input type="hidden" name="" class="role" value="{{$parent->role}}">
                                                {{-- @if ($parent->status == 1)
                                                    <td id="badge"> <span class="badge badge-soft-success">Active</span></td>
                                                @else
                                                    <td class="text-center"> <span class="badge badge-soft-danger">In Active</span></td>
                                                @endif --}}
                                                <td class="text-center"> <span class="badge my-badge"></span></td>
                                                <td class="">
                                                    <div class="actions ">
                                                        <a href="{{ route('admin#editParent', $parent->id) }}"
                                                            class="btn btn-sm bg-danger-light">
                                                            <i class="feather-edit"></i>
                                                        </a>
                                                        <a href="{{ route('admin#parentDetails', $parent->id) }}"
                                                            class="btn btn-sm bg-danger-light">
                                                            <i class="fa-solid fa-comment"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                        <div class="mt-2 px-2">
                            {{ $parents->appends(request()->query())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('myScript')
        {{-- <script>
            $(document).ready(function() {
                setInterval(function() {
                    $('tr[data-user-id]').each(function() {
                        var userId = $(this).data('user-id');
                        var role = $(this).find('.role').val()
                        // console.log('/admin/parent/' + userId+'/' +role + '/status')

                        var statusSpan = $(this).find('.my-badge');
                        $.get('/admin/parent/' + userId +'/'+role + '/status', function(data) {
                            if (data.status == 0) {
                                statusSpan.addClass('badge-soft-danger');
                                statusSpan.html('In Active');

                            } else {
                                statusSpan.addClass('badge-soft-success');
                                statusSpan.removeClass('badge-soft-danger')
                                statusSpan.html('Active');
                            }
                        });
                    });
                }, 1000);
            });
        </script> --}}
    @endsection
