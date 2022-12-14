@extends('layouts.main')

@section('content')

<div class="page-wrapper">
    <!-- Container fluid  -->
    <div class="container-fluid">
        <div class="row">
            <div class="tab-pane fade covid Student-card active show" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="d-flex align-items-center justify-content-between py-4 nav-tab-heading">
                    <h4 class="heading mb-0">{{__('gobal.Scenario Details')}}</h4>
                    <div class="btn-wrapper d-flex gap-2">
                        <a href="{{route('scenario.edit',$scenario[0]->id)}}" class="btn btn-print bg-white d-flex align-items-center gap-2"><i class="fas fa-pen"></i>{{__('gobal.edit')}}</a>
                        
                        <form style="display: inline-block" id='delete_scenario' method="POST" action="{{ route('scenario.destroy', $scenario[0]->id) }}">
                            @method('DELETE')
                            @csrf
                            <a href="{{ route('scenario.destroy', $scenario[0]->id) }}" onclick="event.preventDefault(); document.getElementById('delete_scenario').submit();" class="btn btn-save d-flex align-items-center gap-2"><i class="fas fa-trash"></i>{{__('gobal.Delete Scenario')}} </a>
                        </form>
                    </div>
                </div>
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="">
                                <div>
                                    <small>{{__('gobal.Scenario Name')}}</small>
                                    <h1 class="title">{{ucwords($scenario[0]->secnario_name)}}</h1>
                                </div>
                            </button>
                        </h2>
                    </div>
                </div>
                <div class="gernal-info bg-white">
                    <div class="block">
                        <div class="row pb-2">
                            <div class="col-md-6 pb-2">
                                <label class="fw-bold">{{__('gobal.Scenario id')}}<span class="required">*</span></label>
                                <p class="text-dark">{{$scenario[0]->id}}</p>
                            </div>
                            <div class="col-md-6 pb-2">
                                <label class="fw-bold">{{__('gobal.Scenario logo')}}</label>
                                <p><img class="img-fluid" width="70px" src="{{ asset($scenario[0]->path)}}" alt=""></p>
                            </div>
                            <div class="col-md-6 pb-2">
                                <label class="fw-bold">{{__('gobal.Department Name')}}<span class="required">*</span></label>
                                <p class="text-dark">{{ucwords($scenario[0]->name)}}</p>
                            </div>
                            <div class="col-md-6 pb-2">
                                <label class="fw-bold">{{__('gobal.Department logo')}}</label>
                                <p><img class="img-fluid" width="70px" src="{{ asset($scenario[0]->d_path)}}" alt=""></p>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection('content')