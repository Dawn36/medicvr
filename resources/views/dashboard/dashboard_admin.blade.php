@extends('layouts.main')

@section('content')

<div class="page-wrapper">
    <!-- Container fluid  -->
    <div class="container-fluid">
    <h3 class="fw-bolder fs-8 text-center mb-4">{{__("dashboard.Admin's Dashboard")}}</h3>
        <!-- Four charts -->
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-12">
                <div class="white-box analytics-info">
                    <div class="d-flex">
                        <img src="{{ asset('theme/assets/imges/teacher.svg')}}" class="sidebar-icon custom-widgets-icon" alt="">
                        <p class="box-title mb-0">{{__("dashboard.Total Teachers")}}</p>
                    </div>
                    <div class="box-data">
                        <p class="bx-value mb-0">{{count($data['teacher'])}}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12">
                <div class="white-box analytics-info">
                    <div class="d-flex">
                        <img src="{{ asset('theme/assets/imges/student.svg')}}" class="sidebar-icon custom-widgets-icon" alt="">
                        <p class="box-title mb-0">{{__("dashboard.Total Students")}}</p>
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
                        <h3 class="mx-auto my-3 fw-bold fs-5 text-center">{{__("dashboard.Average Session Duration (Per Day)")}}</h3>
                        <div id="chart2"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="mx-auto my-3 fw-bold fs-5 text-center">{{__("dashboard.Number of Sessions (Per Day)")}}</h3>
                        <div id="chart3"></div>
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
                                        <i class="fas fa-plus pe-1"></i> {{__("dashboard.Add")}}
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                        <a class="dropdown-item" href="{{route('teacher_create','teacher')}}">{{__("dashboard.Teacher")}}</a>
                                        <a class="dropdown-item" href="{{route('student_create','student')}}">{{__("dashboard.Student")}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <h3 class="box-title mb-0">{{__("dashboard.Teacher")}}</h3>
                            <div class="table-responsive" style="padding-top:28px;">
                                <table class="table no-wrap" id="myTable">
                                    <thead>
                                        <tr style="background: #F9F9FA; border-radius: 6px;">
                                            <th class="border-top-0">{{__("gobal.id")}}</th>
                                            <th class="border-top-0">
                                                {{__("gobal.first_name")}} 
                                            </th>
                                            <th class="border-top-0">
                                                {{__("gobal.last_name")}}
                                            </th>
                                            <th class="border-top-0">
                                                {{__("gobal.phone")}} 
                                            </th>
                                            <th class="border-top-0">
                                                {{__("gobal.email")}} 
                                            </th>
                                            <th class="border-top-0">
                                                {{__("gobal.created_on")}} 
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $teacher=$data['teacher']; @endphp
                                        @for ($i = 0; $i < count($teacher); $i++) @php $a=$i; $a++ @endphp
                                    <tr>
                                        <td>{{$a}}</td>
                                        <td class="txt-oflo">
                                            <form id='teacher{{$i}}' style="display: inline-block" method="POST" action="{{ route('teacher_show') }}">
                                                @csrf
                                                <input hidden name="role_id" value="teacher"/>
                                                <input hidden name="user_id" value="{{$teacher[$i]->id}}"/>
                                                <a herf='{{ route('teacher_show') }}' type="submit" class="fw-bolder text-theme" onclick="event.preventDefault(); document.getElementById('teacher{{$i}}').submit();">{{ucwords($teacher[$i]->first_name)}}</a></td>
                                            </form>
                                        <td class="txt-oflo">{{ucwords($teacher[$i]->last_name)}}</td>
                                        <td>{{$teacher[$i]->phone_number}}</td>
                                        <td>{{$teacher[$i]->email}}</td>
                                        <td>{{date("Y-m-d",strtotime($teacher[$i]->created_at))}}</td>
                                    </tr>
                                    @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <h3 class="box-title mb-0">{{__("dashboard.Student")}}</h3>
                            <div class="table-responsive" style="padding-top:28px;">
                                <table class="table no-wrap" id="myTable2">
                                    <thead>
                                        <tr style="background: #F9F9FA; border-radius: 6px;">
                                            <th class="border-top-0">{{__("gobal.id")}}</th>
                                            <th class="border-top-0">
                                                {{__("gobal.first_name")}} 
                                            </th>
                                            <th class="border-top-0">
                                                {{__("gobal.last_name")}}
                                            </th>
                                            <th class="border-top-0">
                                                {{__("gobal.phone")}} 
                                            </th>
                                            <th class="border-top-0">
                                                {{__("gobal.email")}} 
                                            </th>
                                            <th class="border-top-0">
                                                {{__("gobal.created_on")}} 
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $student=$data['student']; @endphp
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
                                        <td>{{ucwords($student[$i]->phone_number)}}</td>
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

var chart = new ApexCharts(document.querySelector("#chart2"), options);
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

var chart = new ApexCharts(document.querySelector("#chart3"), options);
chart.render();
</script>
@endsection('content')