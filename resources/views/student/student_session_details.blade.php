@extends('layouts.main')

@section('content')

<div class="page-wrapper">
    <!-- Container fluid  -->
    <div class="container-fluid">
        <div class="row">
            <div class="tab-pane fade Student-card covid active show" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="d-flex align-items-center justify-content-between py-4 nav-tab-heading">
                    <h4 class="heading mb-0">Session Details</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <small class="fw-bold">Scenrio Name</small>
                <h1 class="title fw-bold">COVID</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="white-box analytics-info">
                    <div class="d-flex">
                        <img src="{{ asset('theme/assets/imges/award.svg')}}" class="sidebar-icon custom-widgets-icon bg-white border" alt="">
                        <p class="box-title mb-0">Best Score</p>
                    </div>
                    <div class="box-data">
                        <p class="bx-value mb-0">{{$aveScore[0]->max_score}}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="white-box analytics-info">
                    <div class="d-flex">
                        <img src="{{ asset('theme/assets/imges/calculator.svg')}}" class="sidebar-icon custom-widgets-icon bg-white border" alt="">
                        <p class="box-title mb-0">Average Score</p>
                    </div>
                    <div class="box-data">
                        <p class="bx-value mb-0">{{$aveScore[0]->avg_score}}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-7">
                <div class="gernal-info bg-white">
                    <div class="block">
                        <div class="d-flex justify-content-between">
                            <h3 class="heading">No. of Questions</h3>
                        </div>
                        <div class="table-responsive" style="padding-top:28px;">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col" class="border-top-0 fw-bold fs-4 text-dark">ID</th>
                                        <th scope="col" class="border-top-0 fw-bold fs-4 text-dark w-50">Questions</th>
                                        <th scope="col" class="border-top-0 fw-bold fs-4 text-dark">Score</th>
                                        <th scope="col" class="border-top-0 fw-bold fs-4 text-dark">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for($i=0; $i < count($gameSessionQuestion); $i++) 
                                    @php $a=$i; $a++ @endphp
                                    <tr>
                                        <td scope="row">{{$a}}</td>
                                        <td>{{ucfirst($gameSessionQuestion[$i]->question)}}</td>
                                        <td>{{$gameSessionQuestion[$i]->score}}</td>
                                        <td>{{DATE("Y-m-d",strtotime($gameSessionQuestion[$i]->created_at))}}</td>
                                    </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="gernal-info bg-white">
                    <div class="block">
                        <div class="d-flex justify-content-between">
                            <h3 class="heading">No. of Procedures</h3>
                        </div>
                        <div class="table-responsive" style="padding-top:28px;">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col" class="border-top-0 fw-bold fs-4 text-dark">ID</th>
                                        <th scope="col" class="border-top-0 fw-bold fs-4 text-dark w-50">Procedures</th>
                                        <th scope="col" class="border-top-0 fw-bold fs-4 text-dark">Score</th>
                                        <th scope="col" class="border-top-0 fw-bold fs-4 text-dark">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for($i=0; $i < count($gameSessionProcedure); $i++)
                                    @php $a=$i; $a++ @endphp
                                    <tr>
                                        <td scope="row">{{$a}}</td>
                                        <td>{{ucfirst($gameSessionProcedure[$i]->procedure)}}</td>
                                        <td>{{$gameSessionProcedure[$i]->time}}</td>
                                        <td>{{DATE("Y-m-d",strtotime($gameSessionProcedure[$i]->created_at))}}</td>
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
@endsection('content')