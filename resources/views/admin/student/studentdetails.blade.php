@extends('admin.layouts.master')
@section('title', 'Student Details')
@section('content')
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Student Details</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="students.html">Student</a></li>
                            <li class="breadcrumb-item active">Student Details</li>
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
                            <div class="row">
                                <div class="col-lg-4 col-md-4">
                                    <div class="profile-user-box">
                                        <div class="profile-user-img">
                                            @if ($student->image)
                                                <img src="{{ asset('storage/' . $student->image) }}" alt="Profile">
                                            @else
                                                @if ($student->gender == 'male')
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
                                            <h4 class="text-center">{{ $student->student_name }}</h4>
                                            <h5 class="text-center"><span
                                                    class="badge badge-soft-success">{{ $student->status }}</span></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 d-flex align-items-center">
                                    <div class="follow-group">
                                        <div class="students-follows">
                                            <h5 class="text-center">Grade</h5>
                                            <h4 class="text-center">{{ $student->grade }}</h4>
                                        </div>
                                        <div class="students-follows">
                                            <h5 class="text-center">ကျောင်းဝင်အမှတ်</h5>
                                            <h4 class="text-center">{{ $student->admission_id }}</h4>
                                        </div>
                                        <div class="students-follows">
                                            <h5>Parent Code</h5>
                                            <h6><span class="badge badge-soft-success ">{{ $student->parent_code }}</span>
                                                <span class="badge badge-soft-success clipboard"
                                                    onclick="copyToClipboard({{ json_encode($student->parent_code) }})">
                                                    <i class="fa-solid fa-clipboard"></i>
                                                </span>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 d-flex align-items-center">
                                    <div class="follow-btn-group">
                                        <a href="{{ route('admin#editStudent', $student->id) }}"
                                            class="btn btn-info follow-btns">Edit</a>
                                        <a href="{{ route('admin#deleteStudent', $student->id) }}"
                                            class="btn btn-danger follow-btns">Remove</a>
                                    </div>
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
                                        <div class="personal-icons">
                                            <i class="feather-user"></i>
                                        </div>
                                        <div class="views-personal">
                                            <h4>အဖမှတ်ပုံတင်</h4>
                                            <h5>{{ $student->father_nrc }}</h5>
                                        </div>
                                    </div>
                                    <div class="personal-activity">
                                        <div class="personal-icons">
                                            <img src="{{ asset('admin/assets/img/icons/buliding-icon.svg') }}"
                                                alt="">
                                        </div>
                                        <div class="views-personal">
                                            <h4>Current Grade</h4>
                                            <h5>{{ $student->grade }}</h5>
                                        </div>
                                    </div>
                                    <div class="personal-activity">
                                        <div class="personal-icons">
                                            <i class="feather-phone-call"></i>
                                        </div>
                                        <div class="views-personal">
                                            <h4>Parent's Mobile</h4>
                                            <h5>{{ $student->phone }}</h5>
                                        </div>
                                    </div>
                                    <div class="personal-activity">
                                        <div class="personal-icons">
                                            <i class="feather-mail"></i>
                                        </div>
                                        <div class="views-personal">
                                            <h4>Email</h4>
                                            <h5><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                                    data-cfemail="81e5e0e8f2f8c1e6ece0e8edafe2eeec">[email&#160;protected]</a>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="personal-activity">
                                        <div class="personal-icons">
                                            <i class="feather-user"></i>
                                        </div>
                                        <div class="views-personal">
                                            <h4>Gender</h4>
                                            <h5>{{ $student->gender }}</h5>
                                        </div>
                                    </div>
                                    <div class="personal-activity">
                                        <div class="personal-icons">
                                            <i class="feather-calendar"></i>
                                        </div>
                                        <div class="views-personal">
                                            <h4>Date of Birth</h4>
                                            <h5>{{ $student->birthday }}</h5>
                                        </div>
                                    </div>
                                    <div class="personal-activity">
                                        <div class="personal-icons">
                                            <i class="feather-italic"></i>
                                        </div>
                                        <div class="views-personal">
                                            <h4>Language</h4>
                                            <h5>English, French, Bangla</h5>
                                        </div>
                                    </div>
                                    <div class="personal-activity ">
                                        <div class="personal-icons">
                                            <i class="feather-map-pin"></i>
                                        </div>
                                        <div class="views-personal">
                                            <h4>Address</h4>
                                            <h5>{{ $student->address }}</h5>
                                        </div>
                                    </div>

                                    <div class="personal-activity">
                                        <div class="personal-icons">
                                            <i class="fa-solid fa-users"></i>
                                        </div>
                                        <div class="views-personal">
                                            <h4>Parents</h4>
                                            <h5>{{ $student->father_name . ' & ' . $student->mother_name }}</h5>
                                        </div>
                                    </div>

                                    <div class="personal-activity mb-0">
                                        <div class="personal-icons">
                                            <i class="feather-map-pin"></i>
                                        </div>
                                        <div class="views-personal">
                                            <h4>Address</h4>
                                            <h5>{{ $student->address }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="student-personals-grp">
                            <div class="card mb-0">
                                <div class="card-body">
                                    <div class="heading-detail">
                                        <h4>Skills:</h4>
                                    </div>
                                    <div class="skill-blk">
                                        <div class="skill-statistics">
                                            <div class="skills-head">
                                                <h5>Myanmar</h5>
                                                <p>90%</p>
                                            </div>
                                            <div class="progress mb-0">
                                                <div class="progress-bar bg-illustrator" role="progressbar"
                                                    style="width: 90%" aria-valuenow="90" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="skill-statistics">
                                            <div class="skills-head">
                                                <h5>English</h5>
                                                <p>75%</p>
                                            </div>
                                            <div class="progress mb-0">
                                                <div class="progress-bar bg-illustrator" role="progressbar"
                                                    style="width: 75%" aria-valuenow="75" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="skill-statistics">
                                            <div class="skills-head">
                                                <h5>Maths</h5>
                                                <p>95%</p>
                                            </div>
                                            <div class="progress mb-0">
                                                <div class="progress-bar bg-illustrator" role="progressbar"
                                                    style="width: 95%" aria-valuenow="95" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="skill-statistics">
                                            <div class="skills-head">
                                                <h5>Physics</h5>
                                                <p>95%</p>
                                            </div>
                                            <div class="progress ">
                                                <div class="progress-bar bg-illustrator" role="progressbar"
                                                    style="width: 95%" aria-valuenow="95" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="skill-statistics">
                                            <div class="skills-head">
                                                <h5>Chemistry</h5>
                                                <p>95%</p>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-illustrator" role="progressbar"
                                                    style="width: 95%" aria-valuenow="95" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="skill-statistics">
                                            <div class="skills-head">
                                                <h5>Bio</h5>
                                                <p>95%</p>
                                            </div>
                                            <div class="progress mb-0">
                                                <div class="progress-bar bg-illustrator" role="progressbar"
                                                    style="width: 95%" aria-valuenow="95" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="student-personals-grp">
                            <div class="card mb-0">
                                <div class="card-body">
                                    <div class="heading-detail">
                                        <h4>About {{ $student->student_name }}</h4>
                                    </div>
                                    <div class="hello-park">
                                     @if (count($comments))
                                     @foreach ($comments as $comment)
                                     <div class="border p-2 mb-2">
                                         <div class="d-flex flex-row user-info">
                                             <img class="rounded-circle"
                                                 src="{{ asset('storage/unknown/male.jpg') }}" width="40">
                                             <div class="d-flex flex-column justify-content-start ml-2">
                                                 <span
                                                     class="d-block font-weight-bold name">{{ $comment->username }}</span><span
                                                     class="date text-black-50">{{ $comment->created_at->format('j-F-Y') }}</span>
                                             </div>
                                         </div>
                                         <div class="mt-2">
                                             <p class="comment-text">{{ $comment->comment }}</p>
                                         </div>
                                         <div class="bg-white">

                                             <div class="like p-2 cursor"><i class="fa fa-commenting-o"></i>
                                                 <a href="{{ route('admin#deleteComment', $comment->id) }}"
                                                     class="ml-1">Delete</a>
                                             </div>

                                         </div>
                                     </div>
                                 @endforeach
                                     @else
                                        <h5 class="text-muted">A good student with many potentials.</h5>
                                     @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="container mt-5">
                            <div class="row">
                                <div class="shadow p-3 rounded">
                                    <div class="comment-section">
                                        <div class="bg-white p-2">
                                            <form action="{{ route('admin#comment') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="studentId" value="{{ $student->id }}">
                                                <input type="hidden" name="userId" value="{{ Auth::user()->id }}">
                                                <div class="d-flex flex-row align-items-start">
                                                    <img class="rounded-circle"
                                                        src="{{ asset('storage/unknown/male.jpg') }}" width="40">
                                                    <textarea class="form-control ml-1 shadow-none textarea" name="comment"></textarea>
                                                </div>
                                                <div class="mt-2 text-right">
                                                    <button class="btn btn-primary btn-sm shadow-none me-2"
                                                        type="submit">Post comment</button><button
                                                        class="btn btn-outline-primary btn-sm ml-1 shadow-none"
                                                        type="button">Cancel
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
