@extends('parent.master.layouts')
@section('content')
    <div class="students">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
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
                                        <img src="{{ asset('admin/assets/img/icons/buliding-icon.svg') }}" alt="">
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
                </div>
                <div class="col-md-8">

                </div>
            </div>
        </div>
    </div>
@endsection
