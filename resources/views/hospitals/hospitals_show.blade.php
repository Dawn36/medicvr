@extends('layouts.main')

@section('content')

<div class="page-wrapper">
    <!-- Container fluid  -->
    <div class="container-fluid">
        <div class="row">
            <div class="tab-pane fade covid Student-card active show" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="d-flex align-items-center justify-content-between py-4 nav-tab-heading">
                    <h4 class="heading mb-0">Hospital Details</h4>
                    <div class="btn-wrapper d-flex gap-2">
                        <a href="{{route('hospitals.edit',$hospital->id)}}" class="btn btn-print bg-white d-flex align-items-center gap-2"><i class="fas fa-pen"></i> Edit</a>
                        
                        <form style="display: inline-block" id='delete_hospital' method="POST" action="{{ route('hospitals.destroy', $hospital->id) }}">
                            @method('DELETE')
                            @csrf
                            <a href="{{ route('hospitals.destroy', $hospital->id) }}" onclick="event.preventDefault(); document.getElementById('delete_hospital').submit();" class="btn btn-save d-flex align-items-center gap-2"><i class="fas fa-trash"></i> Delete Hospital</a>
                        </form>
                    </div>
                </div>
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="">
                                <div>
                                    <small>Hospital Name</small>
                                    <h1 class="title">{{ucwords($hospital->hospital_name)}}</h1>
                                </div>
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="covid-reports">
                                    <div class="executions">
                                        <div class="executions-wrapper">
                                            <div class="icone-wrapper">
                                                <img src="{{ asset('theme/assets/imges/admin-green.svg')}}" class="img-fluid w-75" alt="">
                                            </div>
                                            <div>
                                                <small>Number of Admins</small>
                                                <h1>{{$adminCount[0]->count_id}}</h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="executions">
                                        <div class="executions-wrapper">
                                            <div class="icone-wrapper">
                                                <img src="{{ asset('theme/assets/imges/teacher-green.svg')}}" class="img-fluid w-75" alt="">
                                            </div>
                                            <div>
                                                <small>Number of Teachers</small>
                                                <h1>{{$teacherCount[0]->count_id}}</h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="executions">
                                        <div class="executions-wrapper">
                                            <div class="icone-wrapper">
                                                <img src="{{ asset('theme/assets/imges/student-green.svg')}}" class="img-fluid w-75" alt="">
                                            </div>
                                            <div>
                                                <small>Number of Students</small>
                                                <h1>{{$studentCount[0]->count_id}}</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gernal-info bg-white">
                    <div class="block">
                        <div class="row pb-2">
                            <div class="col-md-6 pb-2">
                                <label class="fw-bold">Hospital Name</label>
                                <p class="text-dark">{{ucwords($hospital->hospital_name)}}</p>
                            </div>
                            <div class="col-md-6 pb-2">
                                <label class="fw-bold">Phone</label>
                                <p class="text-dark">{{$hospital->hospital_phone}}</p>
                            </div>
                            <div class="col-md-6 pb-2">
                                <label class="fw-bold">Email</label>
                                <p class="text-dark">{{$hospital->hospital_email}}</p>
                            </div>
                            <div class="col-md-6 pb-2">
                                <label class="fw-bold">Hospital Address</label>
                                <p class="text-dark">{{ucwords($hospital->hospital_address)}}</p>
                            </div>
                            <div class="col-md-6 pb-2">
                                <label class="fw-bold">SmallLogoURL</label>
                                <p><img class="img-fluid" width="70px" src="{{ asset($hospital->hospital_small_logo)}}" alt=""></p>
                            </div>
                            <div class="col-md-6 pb-2">
                                <label class="fw-bold">HiResLogoURL</label>
                                <p><img class="img-fluid" width="70px" src="{{ asset($hospital->hospital_hi_rest_logo)}}" alt=""></p>
                            </div>
                            <div class="col-md-6 pb-2">
                                <label class="fw-bold">PrimaryColor</label>
                                <input type="color" disabled name="primary_color" class="form-control form-control-color" value="{{$hospital->primary_color}}" title="Choose your color">
                            </div>
                            <div class="col-md-6 pb-2">
                                <label class="fw-bold">SecondaryColor</label>
                                <input type="color" disabled name="secondary_color" class="form-control form-control-color" value="{{$hospital->secondary_color}}" title="Choose your color">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection('content')