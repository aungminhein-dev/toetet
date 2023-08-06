@extends('admin.layouts.master')
@section('title','Edit Exam Result')
@section('content')
<div class="content container-fluid p-5">
<div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title"> Add <span class="text-warning">{{ $student->student_name }}</span>'s exam results </h3>
                       
                    </div>
                </div>
            </div>
        </div>


        <div class="row ">
            <div class="col-sm-12">
                <div class="card comman-shadow  ">
                    <div class="card-body">
                        <form action="{{ route('admin#updateExamResult') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title student-info">Student Information <span><a href="javascript:;"><i class="feather-more-vertical"></i></a></span>
                                    </h5>
                                </div>
                                <input type="hidden" value="{{$student->id}}" name="studentId">
                                <input type="hidden" value="{{$results->id}}" name="examId">

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Given Marks <span class="login-danger">*</span>
                                           
                                        </label>
                                        <select class="form-control select" name="givenMarks">
                                            @if($results->given_marks)
                                            <option value="{{$results->given_marks}}" selected>{{$results->given_marks}}</option>
                                            @endif
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
                                        <input placehodler="dd-mm-yyyy" value="{{ old('examDate',$results->exam_date) }}" type="date"
                                            class="form-control" name="examDate">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Grade<span class="login-danger">*</span>
                                           
                                        </label>
                                        <input class="form-control" value="{{$results->grade }}"  disabled>
                                        <input type="hidden" value="{{$results->grade}}" name="grade">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Myanmar<span class="login-danger">*</span>
                                           
                                        </label>
                                        <input class="form-control" value="{{ old('myanmar',$results->myanmar) }}" name="myanmar"
                                            type="number">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>English<span class="login-danger">*</span>
                                           
                                        </label>
                                        <input class="form-control" value="{{ old('english',$results->english) }}" name="english"
                                            type="number">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Maths<span class="login-danger">*</span>
                                        </label>
                                        <input class="form-control" value="{{ old('maths',$results->maths) }}" name="maths" type="number">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Physics<span class="login-danger">*</span>
                                        </label>
                                        <input class="form-control" value="{{ old('physics',$results->physics) }}" name="physics"
                                            type="number">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Chemistry<span class="login-danger">*</span>
                                        </label>
                                        <input class="form-control" value="{{ old('chemistry',$results->chemistry) }}" name="chemistry"
                                            type="number">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Biology<span class="login-danger">*</span>
                                        </label>
                                        <input class="form-control" value="{{ old('biology',$results->biology) }}" name="biology"
                                            type="number">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Social<span class="login-danger">*</span>
                                        </label>
                                        <input class="form-control" value="{{ old('social',$results->social) }}" name="social"
                                            type="number">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Economy<span class="login-danger">*</span>
                                        </label>
                                        <input class="form-control" value="{{ old('economy',$results->economy) }}" name="economy" type="number">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Science<span class="login-danger">*</span>
                                        </label>
                                        <input class="form-control" value="{{ old('science',$results->science) }}" name="science"
                                            type="number">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Geography<span class="login-danger">*</span>
                                           
                                        </label>
                                        <input class="form-control" value="{{ old('geography',$results->geography) }}" name="geography"
                                            type="number">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>History<span class="login-danger">*</span>
                                        </label>
                                        <input class="form-control" value="{{ old('history',$results->history) }}" name="history"
                                            type="number">
                                    </div>
                                </div> 

                              
                                
                            </div>
                            <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                       <button class="btn btn-primary" type="submit">Save</button>
                                    </div>
                            </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection