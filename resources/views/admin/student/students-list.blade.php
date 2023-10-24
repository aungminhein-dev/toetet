@extends('admin.layouts.master')
@section('title', 'Student List')
@section('content')
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Students Table</h3>

                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="students.html">Student</a></li>
                            <li class="breadcrumb-item active">Students</li>
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
                            <input type="text" name="key" value="{{ request('key') }}" class="form-control"
                                placeholder="Search by ID ...">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="form-group">
                            <input type="text" name="studentName" value="{{ request('studentName') }}"
                                class="form-control" placeholder="Search by Name ...">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" value="{{ request('phone') }}" name="phone"
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
            <div class="col-sm-12 pb-5">
                <div class="card card-table comman-shadow ">
                    <div class="card-body">
                        @if (request('key') || request('studentName') || request('phone'))
                            <i class="fa-solid fa-arrow-left" onclick="history.back()"></i>
                        @endif
                        <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="page-title">
                                        <span class=""><i class="fa-solid fa-users text-primary"></i>
                                            {{ $students->total() }}</span>
                                    </h3>
                                </div>

                                <div class="col">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        Add Grade
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade " id="exampleModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('admin#addGrade') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="grade" value="{{ request('grade') }}">
                                                        <input type="hidden" name="username"
                                                            value="{{ Auth::user()->username }}">

                                                        <p class="text-muted">They are currently in
                                                            Grade-{{ request('grade') }}</p>
                                                        <p class="text-danger">Are you sure you want to add this
                                                            childern to next grade?</p>

                                                        <label class="text-danger">Please enter your password to perform
                                                            this action.</label>
                                                        <div class="form-floating">
                                                            <input type="password" class="form-control"
                                                                id="floatingPassword" name="password" placeholder="Password"
                                                                required>
                                                            <label for="floatingPassword">Password</label>
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Let me think for a moment</button>
                                                    <button type="submit" class="btn btn-primary">Confirm</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto text-end float-end ms-auto download-grp">
                                    <form class="d-flex">
                                        <select class="form-select me-2" name="grade" id="gradeBox">
                                            <option value="" {{ request('grade') ? '' : 'selected' }}>All</option>
                                            @foreach ($grades as $grade)
                                                <option value="{{ $grade->grade }}"
                                                    {{ request('grade') == $grade->grade && request('grade') != null ? 'selected' : '' }}>
                                                    {{ $grade->grade == 0 ? 'KG' : 'Grade- ' . $grade->grade }}
                                                </option>
                                            @endforeach
                                        </select>

                                        <button type="submit" class="btn btn-primary">Filter</button>
                                    </form>
                                </div>

                            </div>
                        </div>

                        <div class="table-responsive">
                            @if (count($students) == 0)
                                <div class="text-center">
                                    <div class="">
                                        <h2 class="text-muted">No Student found!</h2>
                                    </div>
                                </div>
                            @else
                                <table
                                    class="table border-0 shadow star-student table-hover table-center mb-0 datatable table-striped">
                                    <thead class="student-thread">

                                        <tr>
                                            <th class="text-center">
                                                <a href="" class="me-2">
                                                    <i class="fa-solid fa-user"></i> <span
                                                        class="text-black ms-2">{{ count($students) }}</span>
                                                </a>
                                            </th>
                                            <th class="text-center">Parent Code</th>
                                            <th class="text-center">Student Name</th>
                                            <th class="text-center">Admission Id</th>
                                            <th class="text-center">Birthday</th>
                                            <th class="text-center">Grade</th>
                                            <th class="text-center">Father Name</th>
                                            <th class="text-center">Mobile Number</th>
                                            <th class="text-center">Address</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $student)
                                            <tr>
                                                <td class="text-center">
                                                    <div class="form-check check-tables">
                                                        <input class="form-check-input" type="checkbox"
                                                            value="something">
                                                    </div>
                                                </td>
                                                <td class="text-center"> <span
                                                        class="badge badge-soft-success ">{{ $student->parent_code }}</span>
                                                    <span class="badge badge-soft-primary clipboard"
                                                        onclick="copyToClipboard({{ json_encode($student->parent_code) }})">
                                                        <i class="fa-solid fa-clipboard"></i>
                                                    </span>
                                                </td>

                                                <td class="text-center">
                                                    <h2 class="table-avatar">
                                                        <a href="student-details.html" class="avatar avatar-sm me-2">
                                                            @if ($student->image)
                                                                <img class="avatar-img rounded-circle"src="{{ asset('storage/' . $student->image) }}"
                                                                    alt="User Image">
                                                            @else
                                                                @if ($student->gender == 'male')
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
                                                            <a href="{{ route('admin#studentDetails', $student->id) }}"
                                                                class="text-info">{{ $student->student_name }}</a>
                                                    </h2>
                                                </td>
                                                <td class="text-center">{{ $student->admission_id }}</td>
                                                <td class="text-center">{{ $student->birthday }}</td>
                                                <td class="text-center">
                                                    <span class="badge badge-soft-success">
                                                        @if ($student->grade == 0)
                                                            KG
                                                        @else
                                                            {{ $student->grade }}
                                                        @endif
                                                    </span>
                                                </td>
                                                <td class="text-center">{{ $student->father_name }}</td>
                                                <td class="text-center">{{ $student->phone }}</td>
                                                <td class="text-center">{{ $student->address }}</td>
                                                <td class="text-center"><span
                                                        class="badge @if ($student->status == 'new') badge-soft-danger @else badge-soft-success @endif">{{ $student->status }}</span>
                                                </td>
                                                <td class="">
                                                    <div class="actions ">
                                                        <a href="{{ route('admin#editStudent', $student->id) }}"
                                                            class="btn btn-sm bg-danger-light">
                                                            <i class="feather-edit"></i>
                                                        </a>
                                                        <a href="{{ route('admin#studentDetails', $student->id) }}"
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
                            {{ $students->appends(request()->query())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('myScript')
        <script>
            // $(document).ready(function() {
            //    $('#gradeBox').change(function(){
            //     let grade = $('#gradeBox').val();

            //     if(grade){
            //         $.ajax({
            //             type:'get',
            //             url:'http://localhost:8000/admin/students-list/sort',
            //             data : {'grade' : grade},
            //             dataType : 'json',
            //         })
            //         console.log('ya tl');
            //     }
            //    })
            // })
        </script>
    @endsection
