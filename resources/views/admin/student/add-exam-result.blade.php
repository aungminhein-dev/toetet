@extends('admin.layouts.master')
@section('title','Add Exam Result')
@section('content')
<div class="content container-fluid p-5">
<div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title"> Add <span class="text-warning">{{ $student->student_name }}</span>'s exam results </h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="students.html">Student</a></li>
                            <li class="breadcrumb-item active">Add Students</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <div class="row ">
            <div class="col-sm-12">
                <div class="card comman-shadow  ">
                    <div class="card-body">
                        <form action="{{ route('admin#storeExamResult') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title student-info">Student Information <span><a href="javascript:;"><i class="feather-more-vertical"></i></a></span>
                                    </h5>
                                </div>
                                <input type="hidden" value="{{$student->id}}" name="studentId">
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Given Marks <span class="login-danger">*</span>
                                           
                                        </label>
                                        <select class="form-control select" name="givenMarks">
                                            <option value="">Select Given Marks</option>
                                            <option value="25" {{ old('givenMarks') == '25' ? 'selected' : '' }}>25
                                            </option>
                                            <option value="50" {{ old('givenMarks') == '50' ? 'selected' : '' }}>50
                                            </option>
                                            <option value="100" {{ old('givenMarks') == '100' ? 'selected' : '' }}>100
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Date Of Exam <span class="login-danger">*</span>
                                            @error('examDate')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </label>
                                        <input placehodler="dd-mm-yyyy" value="{{ old('examDate') }}" type="date"
                                            class="form-control" name="examDate">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Grade<span class="login-danger">*</span>
                                           
                                        </label>
                                        <input class="form-control" value="{{$student->grade }}"  disabled>
                                        <input type="hidden" value="{{$student->grade}}" name="grade">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Myanmar<span class="login-danger">*</span>
                                           
                                        </label>
                                        <input class="form-control" value="{{ old('myanmar') }}" name="myanmar"
                                            type="number">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>English<span class="login-danger">*</span>
                                           
                                        </label>
                                        <input class="form-control" value="{{ old('english') }}" name="english"
                                            type="number">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Maths<span class="login-danger">*</span>
                                        </label>
                                        <input class="form-control" value="{{ old('maths') }}" name="maths" type="number">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Physics<span class="login-danger">*</span>
                                        </label>
                                        <input class="form-control" value="{{ old('physics') }}" name="physics"
                                            type="number">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Chemistry<span class="login-danger">*</span>
                                        </label>
                                        <input class="form-control" value="{{ old('chemistry') }}" name="chemistry"
                                            type="number">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Biology<span class="login-danger">*</span>
                                        </label>
                                        <input class="form-control" value="{{ old('biology') }}" name="biology"
                                            type="number">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Social<span class="login-danger">*</span>
                                        </label>
                                        <input class="form-control" value="{{ old('social') }}" name="social"
                                            type="number">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Economy<span class="login-danger">*</span>
                                        </label>
                                        <input class="form-control" value="{{ old('economy') }}" name="economy" type="number">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Science<span class="login-danger">*</span>
                                        </label>
                                        <input class="form-control" value="{{ old('science') }}" name="science"
                                            type="number">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Geography<span class="login-danger">*</span>
                                           
                                        </label>
                                        <input class="form-control" value="{{ old('geography') }}" name="geography"
                                            type="number">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>History<span class="login-danger">*</span>
                                        </label>
                                        <input class="form-control" value="{{ old('history') }}" name="history"
                                            type="number">
                                    </div>
                                </div> 

                              
                                
                            </div>
                            <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                       <button class="btn btn-primary" type="submit">Submit</button>
                                    </div>
                            </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection