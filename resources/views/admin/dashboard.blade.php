@extends('admin.layouts.master')
@section('title', 'Dashboard')

@section('content')
    <div class="content container-fluid py-lg-5">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Welcome Admin!</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">Admin</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Students</h6>
                                <h3><span class="badge badge-soft-success">{{ $studentCount }}</span></h3>
                            </div>
                            <div class="db-icon">
                                <img src="{{ asset('admin/assets/img/icons/dash-icon-01.svg') }}" alt="Dashboard Icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Parents</h6>
                                <h3><span class="badge badge-soft-success">{{ $parentCount }}</span></h3>
                            </div>
                            <div class="db-icon">
                                <img src="{{ asset('admin/assets/img/icons/dash-icon-02.svg') }}" alt="Dashboard Icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Posts</h6>
                                <h3><span class="badge badge-soft-success">{{ $postCount }}</span></h3>
                            </div>
                            <div class="db-icon">
                                <img src="{{ asset('admin/assets/img/icons/dash-icon-03.svg') }}" alt="Dashboard Icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Admins</h6>
                                <h3><span class="badge badge-soft-success">{{$adminCount}}</span></h3>
                            </div>
                            <div class="db-icon">
                                <img src="{{ asset('admin/assets/img/icons/dash-icon-04.svg') }}" alt="Dashboard Icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-lg-6">

                <div class="card card-chart">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h5 class="card-title">Overview</h5>
                            </div>
                            <div class="col-6 text-end">
                                <ul class="chart-list-out">
                                    <li><span class="circle-blue"></span>Teacher</li>
                                    <li><span class="circle-green"></span>Student</li>
                                    <li class="star-menus"><a href="javascript:;"><i class="fas fa-ellipsis-v"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="apexcharts-area"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6">
                <div class="card card-chart">
                    <div class="card-header">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-6">
                                <h5 class="card-title">Number of Students</h5>
                            </div>
                            <div class="col-3">
                                <select id="period">
                                    <option value="month">Monthly</option>
                                    <option value="year">Yearly</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="my-area"></div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 d-flex">

                <div class="card flex-fill student-space comman-shadow">
                    <div class="card-header d-flex align-items-center">
                        <h5 class="card-title">Recently Added Parents</h5>
                        <ul class="chart-list-out student-ellips">
                            <li class="star-menus"><a href="javascript:;"><i class="fas fa-ellipsis-v"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table star-student table-hover table-center table-borderless table-striped">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Parent Code</th>
                                        <th>Name</th>
                                        <th class="text-center">Phone</th>
                                        <th class="text-center">Address</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($latestParents))
                                        @foreach ($latestParents as $p)
                                            <tr>
                                                <td class="text-nowrap">
                                                    <div>
                                                        <span
                                                            class="badge  {{ $p->parent_code == $p->s_parentCode ? 'badge-soft-success' : 'badge-soft-danger' }}">{{ $p->parent_code }}
                                                            <span class="badge badge-soft-primary clipboard"
                                                                onclick="copyToClipboard({{ json_encode($p->parent_code) }})">
                                                                <i class="fa-solid fa-clipboard"></i>
                                                            </span>
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="text-nowrap">
                                                    <a href="{{ route('admin#parentDetails', $p->id) }}"
                                                        class="text-primary">
                                                        <img class="rounded-circle" src="assets/img/profiles/avatar-02.jpg"
                                                            width="25" alt="Star Students">
                                                        {{ $p->username }}
                                                    </a>
                                                </td>
                                                <td class="text-center">{{ $p->phone }}</td>
                                                <td class="text-center">{{ $p->address }}</td>

                                            </tr>
                                        @endforeach
                                    @else
                                    <tr >
                                        <td class="text-muted">
                                            No recently added parents right now.
                                        </td>
                                      </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-xl-6 d-flex">

                <div class="card flex-fill comman-shadow">
                    <div class="card-header d-flex align-items-center">
                        <h5 class="card-title ">Student Activity </h5>
                        <ul class="chart-list-out student-ellips">
                            <li class="star-menus"><a href="javascript:;"><i class="fas fa-ellipsis-v"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="activity-groups">
                            <div class="activity-awards">
                                <div class="award-boxs">
                                    <img src="assets/img/icons/award-icon-01.svg" alt="Award">
                                </div>
                                <div class="award-list-outs">
                                    <h4>1st place in "Chess”</h4>
                                    <h5>John Doe won 1st place in "Chess"</h5>
                                </div>
                                <div class="award-time-list">
                                    <span>1 Day ago</span>
                                </div>
                            </div>
                            <div class="activity-awards">
                                <div class="award-boxs">
                                    <img src="assets/img/icons/award-icon-02.svg" alt="Award">
                                </div>
                                <div class="award-list-outs">
                                    <h4>Participated in "Carrom"</h4>
                                    <h5>Justin Lee participated in "Carrom"</h5>
                                </div>
                                <div class="award-time-list">
                                    <span>2 hours ago</span>
                                </div>
                            </div>
                            <div class="activity-awards">
                                <div class="award-boxs">
                                    <img src="assets/img/icons/award-icon-03.svg" alt="Award">
                                </div>
                                <div class="award-list-outs">
                                    <h4>Internation conference in "St.John School"</h4>
                                    <h5>Justin Leeattended internation conference in "St.John School"</h5>
                                </div>
                                <div class="award-time-list">
                                    <span>2 Week ago</span>
                                </div>
                            </div>
                            <div class="activity-awards mb-0">
                                <div class="award-boxs">
                                    <img src="assets/img/icons/award-icon-04.svg" alt="Award">
                                </div>
                                <div class="award-list-outs">
                                    <h4>Won 1st place in "Chess"</h4>
                                    <h5>John Doe won 1st place in "Chess"</h5>
                                </div>
                                <div class="award-time-list">
                                    <span>3 Day ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card flex-fill fb sm-box">
                    <div class="social-likes">
                        <p>Like us on facebook</p>
                        <h6>50,095</h6>
                    </div>
                    <div class="social-boxs">
                        <img src="assets/img/icons/social-icon-01.svg" alt="Social Icon">
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card flex-fill twitter sm-box">
                    <div class="social-likes">
                        <p>Follow us on twitter</p>
                        <h6>48,596</h6>
                    </div>
                    <div class="social-boxs">
                        <img src="assets/img/icons/social-icon-02.svg" alt="Social Icon">
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card flex-fill insta sm-box">
                    <div class="social-likes">
                        <p>Follow us on instagram</p>
                        <h6>52,085</h6>
                    </div>
                    <div class="social-boxs">
                        <img src="assets/img/icons/social-icon-03.svg" alt="Social Icon">
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card flex-fill linkedin sm-box">
                    <div class="social-likes">
                        <p>Follow us on linkedin</p>
                        <h6>69,050</h6>
                    </div>
                    <div class="social-boxs">
                        <img src="assets/img/icons/social-icon-04.svg" alt="Social Icon">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('myScript')
    <script>
        let horizontal = {!! json_encode($horizontal) !!}
        let vertical =  {!! json_encode($vertical) !!}
        // {!! json_encode($vertical) !!}
       let y =  {!! json_encode($studentArray) !!}
       let x =  {!! json_encode($chartGrade) !!}


        var options = {
            chart: {
                height: 350,
                type: 'area',
                zoom: {
                    enabled: false
                },
                toolbar: {
                    show: false,
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            series: [{
                name: 'Student',
                data: vertical
            }],
            xaxis: {
                categories: horizontal
            }
        };
        var chart = new ApexCharts(document.querySelector('#my-area'), options);
        chart.render();
        $('#period').change(function() {
            let period = $('#period').val()
            let options;
            $.ajax({
                type: 'get',
                url: '/admin/dashboard/statitics',
                data: {
                    'key': period
                },
                success: function(response) {
                    // response.x_data.length >12 ? response.x_data.slice(1) :  response.x_data
                    chart.updateOptions({
                        xaxis: {
                            categories: response.x_data // Update the chart's categories
                        }
                    });
                    chart.updateSeries([{
                        data: response.y_data
                    }]);
                }
            })
        })
    </script>
@endsection
