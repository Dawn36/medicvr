@extends('layouts.main')

@section('content')

<div class="page-wrapper">
    <!-- Container fluid  -->
    <div class="container-fluid">
        <h3 class="fw-bolder fs-8 text-center mb-4">Teacher's Dashboard</h3>
        <!-- Four charts -->
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-12">
                <div class="white-box analytics-info">
                    <div class="d-flex">
                        <img src="{{ asset('theme/assets/imges/student.svg')}}" class="sidebar-icon custom-widgets-icon" alt="">
                        <p class="box-title mb-0">Total Students</p>
                    </div>
                    <div class="box-data">
                        <p class="bx-value mb-0">{{count($data['student'])}}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="mx-auto my-3 fw-bold fs-5 text-center">Average Session Duration (Per Day)</h3>
                        <div id="chart4"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="mx-auto my-3 fw-bold fs-5 text-center">Number of Sessions (Per Day)</h3>
                        <div id="chart5"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="data-table-wrapper">
                    <div class="d-flex align-items-center justify-content-end nav-tab-heading">
                        <div class="btn-wrapper d-flex gap-2">
                            <div class="dropdown">
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-save dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-plus pe-1"></i> Add
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                        <a class="dropdown-item" href="{{route('student_create','student')}}">Student</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @php $student=$data['student']; @endphp
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="box-title mb-0">Students</h3>
                            <div class="table-responsive" style="padding-top:28px;">
                                <table class="table no-wrap" id="myTable">
                                    <thead>
                                        <tr style="background: #F9F9FA; border-radius: 6px;">
                                            <th class="border-top-0">ID</th>
                                            <th class="border-top-0">
                                                First Name
                                            </th>
                                            <th class="border-top-0">
                                                Last Name
                                            </th>
                                            <th class="border-top-0">
                                                Phone Number
                                            </th>
                                            <th class="border-top-0">
                                                Email
                                            </th>
                                            <th class="border-top-0">
                                                Created On
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for ($i = 0; $i < count($student); $i++) @php $a=$i; $a++ @endphp
                                        <tr>
                                            <td>{{$a}}</td>
                                            <td class="txt-oflo">
                                                <form id='student{{$i}}' style="display: inline-block" method="POST" action="{{ route('student_show') }}">
                                                    @csrf
                                                    <input hidden name="role_id" value="student"/>
                                                    <input hidden name="user_id" value="{{$student[$i]->id}}"/>
                                                    <a herf='{{ route('student_show') }}' type="submit" class="fw-bolder text-theme" onclick="event.preventDefault(); document.getElementById('student{{$i}}').submit();">{{ucwords($student[$i]->first_name)}}</a></td>
                                                </form>
                                            <td class="txt-oflo">{{ucwords($student[$i]->last_name)}}</td>
                                            <td>{{ucwords($student[$i]->hospitals->hospital_name)}}</td>
                                            <td>{{$student[$i]->email}}</td>
                                            <td>{{date("Y-m-d",strtotime($student[$i]->created_at))}}</td>
                                        </tr>
                                        @endfor
    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var options = {
    series: [
        {
            name: "Average Session",
            data: <?php echo $data['number_of_session_per_day_time'] ?>,
        },
    ],
    chart: {
        type: "bar",
        height: 350,
    },
    plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: "55%",
            endingShape: "rounded",
        },
    },
    dataLabels: {
        enabled: false,
    },
    stroke: {
        show: true,
        width: 2,
        colors: ["transparent"],
    },
    xaxis: {
        categories: <?php echo $data['number_of_session_per_day_date'] ?>,
    },
    fill: {
        colors: ["#007860"],
        opacity: 1,
    },
    tooltip: {
        y: {
            formatter: function (val) {
                return val + " Min";
            },
        },
    },
};

var chart = new ApexCharts(document.querySelector("#chart4"), options);
chart.render();

var options = {
    series: [
        {
            name: "Total Session",
            data: <?php echo $data['number_of_session_per_day_value'] ?>,
        },
    ],
    chart: {
        type: "bar",
        height: 350,
    },
    plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: "55%",
            endingShape: "rounded",
        },
    },
    dataLabels: {
        enabled: false,
    },
    stroke: {
        show: true,
        width: 2,
        colors: ["transparent"],
    },
    xaxis: {
        categories: <?php echo $data['number_of_session_per_day_date'] ?>,
    },
    fill: {
        colors: ["#16ab83"],
        opacity: 1,
    },
    tooltip: {
        y: {
            formatter: function (val) {
                return val + " Sessions";
            },
        },
    },
};

var chart = new ApexCharts(document.querySelector("#chart5"), options);
chart.render();

    </script>
@endsection('content')