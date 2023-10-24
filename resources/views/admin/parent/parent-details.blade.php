@extends('admin.layouts.master')
@section('title', 'Parent Details')
@section('content')
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Parent Details</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin#parentsList') }}">Parents</a></li>
                            <li class="breadcrumb-item active">Parent Details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="about-info">
                            <h4>Profile <span><a href="javascript:;"><i class="feather-more-vertical"></i></a></span></h4>
                        </div>
                        <div class="student-profile-head">
                            <div class="profile-bg-img">
                                <img src="{{ asset('admin/assets/img/profile-bg.jpg') }}" alt="Profile">
                            </div>
                            <div class="row p-4">
                                <div class="col-lg-3 col-md-3">
                                    <div class="profile-user-box">
                                        <div class="profile-user-img">
                                            @if ($parent->image)
                                                <img src="{{ asset('storage/' . $parent->image) }}" alt="Profile">
                                            @else
                                                @if ($parent->gender == 'male')
                                                    <img src="{{ asset('storage/unknown/male.jpg') }}" alt="Profile">
                                                @else
                                                    <img src="{{ asset('storage/unknown/female.png') }}" alt="Profile">
                                                @endif
                                            @endif

                                            <div class="form-group students-up-files profile-edit-icon mb-0">
                                                <div class="uplod d-flex">
                                                    <label class="file-upload profile-upbtn mb-0">
                                                        <i class="feather-edit-3"></i><input type="file">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="names-profiles">
                                            <h5 class="text-center">{{ $parent->username }}</h5>
                                            <h4 class="text-center">{{ $parent->phone }}</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 d-flex align-items-center">
                                    <div class="follow-group">
                                        <div class="students-follows">
                                            <h5 class="text-center">Parent Code</h5>
                                            <h4 class="text-center">
                                                <span class="badge @if($parent->parent_code == $parent->s_parentCode)badge-soft-success @else badge-soft-danger @endif ">{{ $parent->parent_code }}</span>
                                                <span class="badge badge-soft-primary clipboard"
                                                    onclick="copyToClipboard({{ json_encode($parent->parent_code) }})">
                                                    <i class="fa-solid fa-clipboard"></i>
                                                </span>
                                            </h4>
                                        </div>
                                        <div class="students-follows">
                                            <h5 class="text-center">NRC</h5>
                                            <h4 class="text-center text-muted">{{ $parent->nrc }}</h4>
                                        </div>
                                        <div class="students-follows">
                                            <h5>Parent Id</h5>
                                            <h4>12468</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 d-flex align-items-center">
                                        <a href="{{ route('admin#editParent', $parent->id) }}"
                                            class="btn btn-info btn-sm me-2"><i class="fa-solid fa-pen"></i></a>
                                        <a href="{{ route('admin#deleteParent', $parent->id) }}"
                                            class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="student-personals-grp">
                            <div class="card">
                                <div class="card-body">
                                    <div class="heading-detail">
                                        <h4>Personal Details :</h4>

                                    </div>
                                    <div class="personal-activity">

                                        <div class="personal-activity mb-0">
                                            <div class="personal-icons">
                                                <i class="fas fa-envelope"></i>
                                            </div>
                                            <div class="views-personal">
                                                <h4>Mail</h4>
                                                <h4 class="text-muted">{{ $parent->email }}</h4>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="personal-activity mb-0">
                                        <div class="personal-icons">
                                            <i class="feather-map-pin"></i>
                                        </div>
                                        <div class="views-personal">
                                            <h4>Address</h4>
                                            <h4 class="text-muted">{{ $parent->address }}</h4>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 bg-light p-5">
                        <div class="student-personals-grp">
                            @if (count($students) != 0)
                                @foreach ($students as $student)
                                    <div class="card mb-2">
                                        <div class="card-body">
                                            <div class="heading-detail">
                                                <h5><span class="text-primary">{{ $parent->username }}</span> 's
                                                    {{ $student->gender == 'male' ? 'Son' : 'Daughter' }} - </h5>
                                                </h5>
                                                <h4 class="text-muted">{{ $student->student_name }}'s Details</h4>
                                            </div>
                                            <div class="hello-park">

                                                @if ($student->image)
                                                    <img src="{{ asset('storage/' . $student->image) }}" alt=""
                                                        class="img-fluid img-thumbnail" width="200">
                                                @else
                                                    @if ($student->gender == 'male')
                                                        <img class="avatar-img rounded-circle" width="200" height="200"
                                                            src="{{ asset('storage/unknown/male.jpg') }}" alt="User Image">
                                                    @else
                                                        <img class="avatar-img rounded-circle"
                                                            src="{{ asset('storage/unknown/female.png') }}"
                                                            alt="User Image" width="200" height="200">
                                                    @endif
                                                @endif
                                                <p><a href="{{ route('admin#studentDetails', $student->id) }}"
                                                        class="text-primary"> {{ $student->student_name }}</a></p>
                                            </div>
                                            <div class="hello-park">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                    tempor
                                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                    quis
                                                    nostrud exercitation ullamco laboris nisi ut aliquip ex commodo
                                                    consequat.
                                                    Duis
                                                    aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
                                                    eu
                                                    fugiat nulla pariatur. Excepteur officia deserunt mollit anim id est
                                                    laborum.
                                                </p>
                                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                                                    accusantium
                                                    doloremque laudantium, totam inventore veritatis et quasi architecto
                                                    beatae
                                                    vitae dicta sunt explicabo. </p>
                                            </div>
                                            <div class="hello-park">
                                                <div class="educate-year">
                                                    <h6>{{ $student->birthday }}</h6>
                                                    <p>Secondary Schooling at xyz school of secondary education, Mumbai.</p>
                                                </div>
                                                <div class="educate-year">
                                                    <h6>{{ $student->admission_id }}</h6>
                                                    <p>Higher Secondary Schooling at xyz school of higher secondary
                                                        education,
                                                        Mumbai.</p>
                                                </div>
                                                <div class="educate-year">
                                                    <h6>2012 - 2015</h6>
                                                    <p>Bachelor of Science at Abc College of Art and Science, Chennai.</p>
                                                </div>
                                                <div class="educate-year">
                                                    <h6>2015 - 2017</h6>
                                                    <p class="mb-0">Master of Science at Cdm College of Engineering and
                                                        Technology, Pune.</p>
                                                </div>
                                                <div class="educate-year mt-2 text-end">
                                                    <a href="{{ route('admin#editStudent', $student->id) }}"
                                                        class="btn btn-warning"><i class="fa-solid fa-pen"></i> Edit
                                                        {{ $student->student_name }}'s Info</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="card p-5">
                                    <h4 class="text-center"><span class="text-primary">{{ $parent->username }}</span>'s
                                        children has not added yet!</h4>
                                    <a href="{{ route('admin#addStudentPage') }}" class="btn btn-primary">Add <i
                                            class="fa-solid fa-plus"></i></a>
                                </div>
                            @endif

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
