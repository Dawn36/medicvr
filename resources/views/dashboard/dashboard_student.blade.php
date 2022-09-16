@extends('layouts.main')

@section('content')

<div class="page-wrapper">
    <!-- Container fluid  -->
    <div class="container-fluid">
        <h3 class="fw-bolder fs-8 text-center mb-4">Student's Dashboard</h3>
        <!-- Four charts -->
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-12">
                <div class="white-box analytics-info">
                    <div class="d-flex">
                        <img src="{{ asset('theme/assets/imges/student.svg')}}" class="sidebar-icon custom-widgets-icon" alt="">
                        <p class="box-title mb-0">Total Sessions Played</p>
                    </div>
                    <div class="box-data">
                        <p class="bx-value mb-0">{{count($data['session'])}}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12">
                <div class="white-box analytics-info">
                    <div class="d-flex">
                        <img src="{{ asset('theme/assets/imges/sessions.svg')}}" class="sidebar-icon custom-widgets-icon" alt="">
                        <p class="box-title mb-0">Average Time Of All The Sessions Played</p>
                    </div>
                    <div class="box-data">
                        <p class="bx-value mb-0">{{$data['avg_time']}} <small>hrs</small></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="mx-auto my-3 fw-bold fs-5 text-center">Number Of Sessions Played (Per Day)</h3>
                        <div id="chart6"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="data-table-wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="box-title mb-0">Scoring Of All The Sessions Played</h3>
                            <div class="table-responsive" style="padding-top:28px;">
                                <table class="table no-wrap" id="myTable">
                                    <thead>
                                        <tr style="background: #F9F9FA; border-radius: 6px;">
                                            <th class="border-top-0">ID</th>
                                            <th class="border-top-0">Scenario ID</th>
                                            <th class="border-top-0">Score</th>
                                            <th class="border-top-0">Time Taken</th>
                                            <th class="border-top-0">Date</th>
                                        </tr>
                                    </thead>
                                    @php $session=$data['session'] @endphp
                                    <tbody>
                                        @for($i=0; $i<count($session); $i++)  @php $a=$i; $a++ @endphp
                                        <tr>
                                            <td><a href="{{route('student_session_details',$session[$i]->id)}}" class="fw-bolder text-theme">{{$a}}</a></td>
                                            <td><a href="{{route('student_session_details',$session[$i]->id)}}" class="fw-bolder text-theme">{{$session[$i]->scenario_id}}</a></td>
                                            <td>{{$session[$i]->score}}</td>
                                            <td>{{$session[$i]->time_taken }} Min</td>
                                            <td>{{date("Y-m-d",strtotime($session[$i]->created_at))}}</td>
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
</div><script>
    var options = {
    series: [
        {
            name: "No. of Sessions",
            data: <?php echo $data['number_of_session_per_day_value'] ?>,
        },
    ],
    chart: {
        height: 350,
        type: "line",
    },
    forecastDataPoints: {
        count: 7,
    },
    stroke: {
        width: 5,
        curve: "smooth",
    },
    xaxis: {
        type: "datetime",
        categories: <?php echo $data['number_of_session_per_day_date'] ?>,
        tickAmount: 10,
        labels: {
            formatter: function (value, timestamp, opts) {
                return opts.dateFormatter(new Date(timestamp), "dd MMM");
            },
        },
    },
    fill: {
        type: "gradient",
        gradient: {
            shade: "dark",
            gradientToColors: ["#FDD835"],
            shadeIntensity: 1,
            type: "horizontal",
            opacityFrom: 1,
            opacityTo: 1,
            stops: [0, 100, 100, 100],
        },
    },
};

var chart = new ApexCharts(document.querySelector("#chart6"), options);
chart.render();
</script>
@endsection('content')