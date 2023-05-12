@extends('admin.layouts.master')
@section('title', 'Edit Student')
@section('content')
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Edit Students</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="students.html">Student</a></li>
                            <li class="breadcrumb-item active">Edit Students</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card comman-shadow">
                    <div class="card-body">
                        <form action="{{ route('admin#updateStudent') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $student->id }}">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title student-info">Student Information <span><a href="javascript:;"><i
                                                    class="feather-more-vertical"></i></a></span>
                                    </h5>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <div class="form-group local-forms">
                                        <label>Student Name <span class="login-danger">*</span>
                                            @error('studentName')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </label>
                                        <input class="form-control" name="studentName" type="text"
                                            placeholder="Enter Student's Name"
                                            value="{{ old('studentName', $student->student_name) }}">
                                    </div>
                                </div>

                                <div class="col-12 col-lg-4">
                                    <div class="form-group local-forms">
                                        <label>Father Name <span class="login-danger">*</span>
                                            @error('fatherName')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </label>
                                        <input class="form-control" name="fatherName" type="text"
                                            placeholder="Enter Father's Name"
                                            value="{{ old('fatherName', $student->father_name) }}">
                                    </div>
                                </div>

                                <div class="col-12 col-lg-4">
                                    <div class="form-group local-forms">
                                        <label>Mother Name <span class="login-danger">*</span>
                                            @error('motherName')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </label>
                                        <input class="form-control" name="motherName" type="text"
                                            placeholder="Enter Mother's Name"
                                            value="{{ old('motherName', $student->mother_name) }}">
                                    </div>
                                </div>

                                <div class="col-12 col-lg-4">
                                    <div class="form-group local-forms">
                                        <label>Gender <span class="login-danger">*</span>
                                            @error('gender')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </label>
                                        <select class="form-control select" name="gender">
                                            <option value="">Select Gender</option>
                                            <option value="male" @if ($student->gender == 'male' || old('gender') == 'male') selected @endif>Male
                                            </option>
                                            <option value="female" @if ($student->gender == 'female' || old('gender') == 'female') selected @endif>Female
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-4">
                                    <div class="form-group local-forms">
                                        <label>Father's NRC <span class="login-danger">*</span>
                                            @error('fatherNrc')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </label>
                                        <input class="form-control" name="fatherNrc" type="text" placeholder="Enter NRC "
                                            value="{{ old('fatherNrc', $student->father_nrc) }}">
                                    </div>
                                </div>

                                <div class="col-12 col-lg-4">
                                    <div class="form-group local-forms">
                                        <label>Mother's NRC<span class="login-danger">*</span>
                                            @error('motherNrc')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </label>
                                        <input class="form-control" name="motherNrc" type="text" placeholder="Enter NRC "
                                            value="{{ old('motherNrc', $student->mother_nrc) }}">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Parent Code <span class="login-danger">*</span>
                                            @error('parentCode')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </label>
                                        <input class="form-control" value="{{ old('parentCode',$student->parent_code) }}" name="parentCode"
                                            type="number" placeholder="Enter Parent Code">
                                    </div>
                                </div>

                                <div class="col-12 col-lg-4">
                                    <div class="form-group local-forms">
                                        <label>Date Of Birth <span class="login-danger">*</span>
                                            @error('birthday')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </label>
                                        <input placehodler="dd-mm-yyyy" type="date" class="form-control" name="birthday"
                                            value="{{ old('birthday', $student->birthday) }}">
                                    </div>
                                </div>

                                <div class="col-12 col-lg-4">
                                    <div class="form-group local-forms">
                                        <label>Grade<span class="login-danger">*</span>
                                            @error('grade')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </label>
                                        <select class="form-control select" name="grade">
                                            <option value="">Select Grade</option>
                                            @foreach ($grades as $grade)
                                                <option value="{{ old('grade', $grade->grade) }}"
                                                    @if ($grade->grade == $student->grade) selected @endif>
                                                    @if ($grade->grade == 0)
                                                        KG
                                                    @else
                                                        Grade-{{ $grade->grade }}
                                                    @endif
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>




                                <div class="col-12 col-lg-4">
                                    <div class="form-group local-forms">
                                        <label>ကျောင်းဝင်အမှတ်ဝင်အမှတ်<span class="login-danger">*</span>
                                            @error('admissionId')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </label>
                                        <input class="form-control" name="admissionId" type="number"
                                            placeholder="Enter Admission ID"
                                            value="{{ old('admissionId', $student->admission_id) }}">
                                    </div>
                                </div>


                                <div class="col-12 col-lg-4">
                                    <div class="form-group local-forms">
                                        <label>Address
                                            @error('address')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </label>
                                        <textarea name="address" id="" cols="30" rows="10" class="form-control"
                                            placeholder="Enter Address">{{ old('address', $student->address) }}</textarea>
                                    </div>
                                </div>


                                <div class="col-12 col-lg-4">
                                    <div class="form-group local-forms">
                                        <label>ညီအစ်ကိုမောင်နှမ</label>
                                        <textarea name="broSis" id="" cols="30" rows="10" class="form-control"
                                            placeholder="ကျောင်းတွင်တက်ရောက်နေသော မွေးချင်း" value="{{ old('broSis', $student->sibling) }}"></textarea>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-4">
                                    <div class="form-group local-forms">

                                        <label>Contactable Phone Number <span class="login-danger">*</span>
                                            @error('phone')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </label>
                                        <input class="form-control" name="phone" type="text"
                                            placeholder="Enter Phone Number" value="{{ old('phone', $student->phone) }}">
                                    </div>
                                </div>

                                <div class="col-12 col-lg-4">
                                    <div class="form-group ">
                                        <label>Upload Student Photo
                                            @error('image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </label>
                                        <div class="">
                                            <input type="file" class="form-control" name="image">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-12 col-lg-4">
                                    <div class="form-group ">
                                        <img src="{{ asset('storage/' . $student->image) }}" alt="" width="100"
                                            class="img-thumbnail">
                                    </div>
                                </div>


                                <div class="col-12">
                                    <div class="student-submit">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
