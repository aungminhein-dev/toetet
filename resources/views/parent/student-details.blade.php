@extends('parent.master.layouts')
@section('title', 'Student Details')
@section('content')
    <div class="p-5">
        <div class="row">
            <div class="col-md-3">
                <div class="card shadow bg-light border-0 p-4">
                    <div class="text-center bg-primary p-3 rounded">
                        @if ($student->image)
                            <img class="avatar-img rounded-circle"src="{{ asset('storage/' . $student->image) }}"
                                alt="User Image">
                        @else
                            @if ($student->gender == 'male')
                                <img class="avatar-img rounded-circle" src="{{ asset('storage/unknown/male.jpg') }}"
                                    alt="User Image">
                            @else
                                <img class="avatar-img rounded-circle" src="{{ asset('storage/unknown/female.png') }}"
                                    alt="User Image">
                            @endif
                        @endif
                    </div>

                    <h5 class="text-muted mt-2">အမည် - <span class="text-primary">{{ $student->student_name }}</span>
                    </h5>
                    <h5 class="text-muted">အတန်း - <span class="text-primary">{{ $student->grade }}</span></h5>
                    <h5 class="text-muted">အဖအမည် - <span class="text-primary">{{ $student->father_name }}</span>
                    </h5>
                    <h5 class="text-muted">ကျောင်းဝင်အမှတ် -
                        <span class="text-primary">{{ $student->admission_id }}</span>
                    </h5>
                </div>
            </div>
            <div class="col-md-9 mt-sm-5">
                <div class="card p-3">
                    @if (count($reportMarks) != 0)
                        <p class="text-muted p-5 text-center">
                            အောက်ဖော်ပြပါဇယားတွင် သင့်ကလေး၏ စာမေးပွဲဖြေဆိုမှုရလဒ်များကို ဖြေဆိုသည့်နေ့ရက်နှင့်
                            အတန်းအလိုက်ပြသထားပါသည်။ မေးမြန်းလိုမှုရှိပါက Admin Team သို့ ဖုန်းမှတစ်ဆင့်ဆက်သွယ်နိုင်ပါသည်။
                        </p>
                    @endif
                    <div class="heading-detail d-flex justify-content-between">
                        <h4 class="text-success">Report Card </h4>
                        <div class="">
                            <span class="text-warning">ဖြေရန်မလို</span>
                            <span class="text-danger">ကျရှုံး</span>
                            <span class="text-success">A အဆင့်အဆင့်</span>
                            <span class="text-primary">B အဆင့်</span>
                        </div>
                        <div class="form-group">
                            <select name="" id="" class="form-control">
                                <option value="">June</option>
                            </select>
                        </div>
                    </div>
                    <div class="table-responsive">
                        @if (count($reportMarks) == 0)
                            <div class="text-center">
                                <div class="">
                                    <h2 class="text-muted">No exam progress data</h2>
                                </div>
                            </div>
                        @else
                            <table
                                class="table border-0 shadow star-student table-hover table-center mb-0 datatable table-striped">
                                <thead class="student-thread">
                                    <tr>
                                        <th class="text-center"></th>
                                        <th class="text-center">Myanmar</th>
                                        <th class="text-center">English</th>
                                        <th class="text-center">Maths</th>
                                        <th class="text-center">Science</th>
                                        <th class="text-center">Physics</th>
                                        <th class="text-center">Chemistry</th>
                                        <th class="text-center">Biology</th>
                                        <th class="text-center">Economy</th>
                                        <th class="text-center">Social</th>
                                        <th class="text-center">Geography</th>
                                        <th class="text-center">History</th>
                                        <th class="text-center">Exam Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reportMarks as $rm)
                                        <tr>
                                            <td class="text-center">Grade - {{ $rm->grade }}</td>
                                            <td class="text-center">
                                                @if ($rm->myanmar === null)
                                                    <span class="text-warning">ဖြေရန်မလို</span>
                                                @else
                                                    <span class="text-success">{{ $rm->myanmar }}</span>
                                                @endif
                                            </td>

                                            <td class="text-center">
                                                @if ($rm->english === null)
                                                    <span class="text-warning">ဖြေရန်မလို</span>
                                                @else
                                                    <span class="text-success">{{ $rm->english }}</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($rm->maths === null)
                                                    <span class="text-warning">ဖြေရန်မလို</span>
                                                @else
                                                    <span class="text-success">{{ $rm->maths }}</span>
                                                @endif
                                            </td>

                                            <td class="text-center">
                                                @if ($rm->science === null)
                                                    <span class="text-warning">ဖြေရန်မလို</span>
                                                @else
                                                    <span class="text-success">{{ $rm->science }}</span>
                                                @endif
                                            </td>

                                            <td class="text-center">
                                                @if ($rm->physics === null)
                                                    <span class="text-warning">ဖြေရန်မလို</span>
                                                @else
                                                    <span class="text-success">{{ $rm->physics }}</span>
                                                @endif
                                            </td>

                                            <td class="text-center">
                                                @if ($rm->chemistry === null)
                                                    <span class="text-warning">ဖြေရန်မလို</span>
                                                @else
                                                    <span class="text-success">{{ $rm->chemistry }}</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($rm->biology === null)
                                                    <span class="text-warning">Notc</span>
                                                @else
                                                    <span class="text-success">{{ $rm->biology }}</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($rm->economy === null)
                                                    <span class="text-warning">ဖြေရန်မလို</span>
                                                @else
                                                    <span class="text-success">{{ $rm->economy }}</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($rm->social === null)
                                                    <span class="text-warning">ဖြေရန်မလို</span>
                                                @else
                                                    <span class="text-success">{{ $rm->social }}</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($rm->geography === null)
                                                    <span class="text-warning">ဖြေရန်မလို</span>
                                                @else
                                                    <span class="text-success">{{ $rm->geography }}</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($rm->history === null)
                                                    <span class="text-warning">ဖြေရန်မလို</span>
                                                @else
                                                    <span class="text-success">{{ $rm->history }}</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <span class="text-success">{{ $rm->exam_date }}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
                <div class="hello-park">
                    @foreach ($comments as $comment)
                        <div class="border p-2 mb-2 ာအ-ာအ-၂">
                            <div class="d-flex flex-row user-info">
                                <img class="rounded-circle" src="{{ asset('storage/unknown/male.jpg') }}" width="40">
                                <div class="d-flex flex-column justify-content-start ml-2">
                                    <span class="d-block font-weight-bold name">{{ $comment->username }}</span><span
                                        class="date text-black-50">{{ $comment->created_at->format('j-F-Y') }}</span>
                                </div>
                            </div>
                            <div class="mt-2">
                                <p class="comment-text">{{ $comment->comment }}</p>
                            </div>
                            <div class="bg-white">

                                <div class="like p-2 cursor"><i class="fa fa-commenting-o"></i>
                                    <a href="{{ route('admin#deleteComment', $comment->id) }}" class="ml-1">Delete</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
            </div>
            </div>


        </div>
    </div>
@endsection
