@extends('layouts.main')

@section('content')

<div class="page-wrapper">
    <!-- Container fluid  -->
    <div class="container-fluid">
        <div class="row">
            <div class="tab-pane fade Student-card covid active show" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="d-flex align-items-center justify-content-between py-4 nav-tab-heading">
                    <h4 class="heading mb-0">{{__('gobal.Session Details')}}</h4>
                </div>
                <p>{{ucwords($userData->first_name)}} {{ucwords($userData->last_name)}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <small class="fw-bold">{{__('gobal.Scenrio Name')}}</small>
                <h1 class="title fw-bold">{{ucwords($scenariosName[0]->name)}}</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="white-box analytics-info">
                    <div class="d-flex">
                        <img src="{{ asset('theme/assets/imges/award.svg')}}" class="sidebar-icon custom-widgets-icon bg-white border" alt="">
                        <p class="box-title mb-0">{{__('gobal.Best Score')}}</p>
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
                        <p class="box-title mb-0">{{__('gobal.Average Score')}}</p>
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
                            <h3 class="heading">{{__('gobal.No. of Questions')}}</h3>
                        </div>
                        <div class="table-responsive" style="padding-top:28px;">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col" class="border-top-0 fw-bold fs-4 text-dark">#</th>
                                        <th scope="col" class="border-top-0 fw-bold fs-4 text-dark w-50">{{__('gobal.Questions')}}</th>
                                        <th scope="col" class="border-top-0 fw-bold fs-4 text-dark">{{__('gobal.Total Score')}}</th>
                                        <th scope="col" class="border-top-0 fw-bold fs-4 text-dark">{{__('gobal.Obtain Score')}}</th>
                                        {{-- <th scope="col" class="border-top-0 fw-bold fs-4 text-dark">{{__('gobal.Date')}}</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @for($i=0; $i < count($gameSessionQuestion); $i++) 
                                    @php $a=$i; $a++ @endphp
                                    <tr>
                                        <td scope="row">{{$a}}</td>
                                        <td>{{ucfirst($gameSessionQuestion[$i]->question)}}</td>
                                        <td>{{$gameSessionQuestion[$i]->total_score}}</td>
                                        <td>{{$gameSessionQuestion[$i]->score}}</td>
                                        {{-- <td>{{DATE("Y-m-d",strtotime($gameSessionQuestion[$i]->created_at))}}</td> --}}
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
                            <h3 class="heading">{{__('gobal.No. of Procedures')}}</h3>
                        </div>
                        <div class="table-responsive" style="padding-top:28px;">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col" class="border-top-0 fw-bold fs-4 text-dark">#</th>
                                        <th scope="col" class="border-top-0 fw-bold fs-4 text-dark w-50">{{__('gobal.Procedures')}}</th>
                                        <th scope="col" class="border-top-0 fw-bold fs-4 text-dark">{{__('gobal.Time')}}</th>
                                        {{-- <th scope="col" class="border-top-0 fw-bold fs-4 text-dark">{{__('gobal.Date')}}</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @for($i=0; $i < count($gameSessionProcedure); $i++)
                                    @php $a=$i; $a++ @endphp
                                    <tr>
                                        <td scope="row">{{$a}}</td>
                                        <td>{{ucfirst($gameSessionProcedure[$i]->procedure)}}</td>
                                        <td>{{$gameSessionProcedure[$i]->time}}</td>
                                        {{-- <td>{{DATE("Y-m-d",strtotime($gameSessionProcedure[$i]->created_at))}}</td> --}}
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