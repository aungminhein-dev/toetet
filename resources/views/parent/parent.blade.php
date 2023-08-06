@extends('parent.master.layouts')
@section('title', 'Home')
@section('content')
    <div class="hero">
        <div class="container container-fluid">
            <div class="d-flex justify-content-center align-items-center">
                <div class="row mt-5">
                    <div class="col-md-8">
                        <div class="home-text">
                            <h5 class="">
                                Welcome to our school website! <span class="text-muted">Stay tuned for your child's
                                    future.</span>
                            </h5>
                            <p class="">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Omnis dignissimos
                                distinctio tempora,
                                animi ipsa, eos enim sed ad quia necessitatibus deleniti nisi non error corporis illo
                                explicabo
                                natus delectus fugiat.</p>
                            <div class="">
                                <a href="" class="btn btn-muted">Post များ Lesson များကိုကြည့်ရန်</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <img class="img-fluid d-none d-lg-block" src="{{ asset('storage/logo/toetet.svg') }}" />
                    </div>
                </div>
            </div>
            {{-- <div class=""></div> | <h5 class=""></h5> --}}
            <div class="row mt-5 p-4">
                <h5 class="text-primary fw-bold">Your Students</h5>
                <hr />
                @if (count($students))
                    @foreach ($students as $student)
                        <div class="col-md-4">
                            <div class="card shadow bg-light border-0 p-4">
                                <div class="text-center bg-primary p-3 rounded">
                                    @if ($student->image)
                                        <img class="avatar-img rounded-circle"src="{{ asset('storage/' . $student->image) }}"
                                            alt="User Image">
                                    @else
                                        @if ($student->gender == 'male')
                                            <img class="avatar-img rounded-circle"
                                                src="{{ asset('storage/unknown/male.jpg') }}" alt="User Image">
                                        @else
                                            <img class="avatar-img rounded-circle"
                                                src="{{ asset('storage/unknown/female.png') }}" alt="User Image">
                                        @endif
                                    @endif
                                </div>

                                <h5 class="text-muted mt-2">အမည် - <span
                                        class="text-primary">{{ $student->student_name }}</span>
                                </h5>
                                <h5 class="text-muted">အတန်း - <span class="text-primary">{{ $student->grade }}</span></h5>
                                <h5 class="text-muted">အဖအမည် - <span
                                        class="text-primary">{{ $student->father_name }}</span>
                                </h5>
                                <h5 class="text-muted">ကျောင်းဝင်အမှတ် -
                                    <span class="text-primary">{{ $student->admission_id }}</span>
                                </h5>
                                <h5>
                                   <form action="{{ route('parent#studentDetails') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="studentId" value="{{$student->id}}">
                                    <input type="hidden" name="parentCode" value="{{Auth::user()->parent_code}}">
                                     <button type="submit" class="btn btn-muted" href="">Check
                                        Progress</button>
                                   </form>
                                </h5>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h3 class="text-danger">No students found!</h3>
                @endif
            </div>
        </div>
    </div>
@endsection
