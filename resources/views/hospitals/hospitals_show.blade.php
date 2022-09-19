@extends('layouts.main')

@section('content')

<div class="page-wrapper">
    <!-- Container fluid  -->
    <div class="container-fluid">
        <div class="row">
            <div class="tab-pane fade covid Student-card active show" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="d-flex align-items-center justify-content-between py-4 nav-tab-heading">
                    <h4 class="heading mb-0">{{__('gobal.Hospital Details')}}</h4>
                    <div class="btn-wrapper d-flex gap-2">
                        <a href="{{route('hospitals.edit',$hospital->id)}}" class="btn btn-print bg-white d-flex align-items-center gap-2"><i class="fas fa-pen"></i>{{__('gobal.edit')}}</a>
                        
                        {{-- <form style="display: inline-block" id='delete_hospital' method="POST" action="{{ route('hospitals.destroy', $hospital->id) }}">
                            @method('DELETE')
                            @csrf
                            <a href="{{ route('hospitals.destroy', $hospital->id) }}" onclick="event.preventDefault(); document.getElementById('delete_hospital').submit();" class="btn btn-save d-flex align-items-center gap-2"><i class="fas fa-trash"></i> Delete Hospital</a>
                        </form> --}}
                    </div>
                </div>
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="">
                                <div>
                                    <small>{{__('gobal.hospital_name')}}</small>
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
                                                <small>{{__('gobal.Number of Admins')}}</small>
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
                                                <small>{{__('gobal.Number of Teachers')}}</small>
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
                                                <small>{{__('gobal.Number of Students')}}</small>
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
                                <label class="fw-bold">{{__('gobal.hospital_name')}}</label>
                                <p class="text-dark">{{ucwords($hospital->hospital_name)}}</p>
                            </div>
                            <div class="col-md-6 pb-2">
                                <label class="fw-bold">{{__('gobal.phone')}}</label>
                                <p class="text-dark">{{$hospital->hospital_phone}}</p>
                            </div>
                            <div class="col-md-6 pb-2">
                                <label class="fw-bold">{{__('gobal.email')}}</label>
                                <p class="text-dark">{{$hospital->hospital_email}}</p>
                            </div>
                            <div class="col-md-6 pb-2">
                                <label class="fw-bold">{{__('gobal.Hospital Address')}}</label>
                                <p class="text-dark">{{ucwords($hospital->hospital_address)}}</p>
                            </div>
                            <div class="col-md-6 pb-2">
                                <label class="fw-bold">{{__('gobal.SmallLogoURL')}}</label>
                                <p><img class="img-fluid" width="70px" src="{{ asset($hospital->hospital_small_logo)}}" alt=""></p>
                            </div>
                            <div class="col-md-6 pb-2">
                                <label class="fw-bold">{{__('gobal.HiResLogoURL')}}</label>
                                <p><img class="img-fluid" width="70px" src="{{ asset($hospital->hospital_hi_rest_logo)}}" alt=""></p>
                            </div>
                            <div class="col-md-6 pb-2">
                                <label class="fw-bold">{{__('gobal.PrimaryColor')}}</label>
                                <input type="color" disabled name="primary_color" class="form-control form-control-color" value="{{$hospital->primary_color}}" title="Choose your color">
                            </div>
                            <div class="col-md-6 pb-2">
                                <label class="fw-bold">{{__('gobal.SecondaryColor')}}</label>
                                <input type="color" disabled name="secondary_color" class="form-control form-control-color" value="{{$hospital->secondary_color}}" title="Choose your color">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gernal-info bg-white">
                    <div class="block">
                       
                        
                        <div class="d-flex align-items-center justify-content-between py-4 nav-tab-heading">
                            <h4 class="heading mb-0">{{__('gobal.Scenario')}} </h4>
                            <div class="btn-wrapper d-flex gap-2">
                                <!-- <button class="btn btn-print bg-white d-flex align-items-center gap-2"><img src="./assets/imges/print.svg" alt=""> Print</button> -->
                                <button class="btn btn-save d-flex align-items-center gap-2" onclick="scenarioMapping('{{$hospital->id}}')"><img src="{{ asset('theme/assets/imges/hospital.svg')}}" width="25px" alt="">{{__('gobal.Map Scenario to Hospital')}}</button>
                            </div>
                        </div>

                        <div class="table-responsive" style="padding-top:28px;">
                            <table class="table no-wrap" id="myTable">
                                <thead>
                                    <tr style="background: #F9F9FA; border-radius: 6px;">
                                        <th class="border-top-0">{{__('gobal.id')}}</th>
                                        <th class="border-top-0">{{__('gobal.Scenario Name')}}</th>
                                        <th class="border-top-0">{{__('gobal.created_on')}}</th>
                                        <th class="border-top-0">{{__('gobal.Action')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < count($scenariosMapping); $i++) @php $a=$i; $a++ @endphp
                                    <tr>
                                        <td>{{$a}}</td>
                                       <td>{{ucwords($scenariosMapping[$i]->name)}}</td>
                                       <td>{{Date("Y-m-d",strtotime($scenariosMapping[$i]->created_at) )}}</td>
                                       <td>
                                        <button onclick="editScenarioMapping('{{$scenariosMapping[$i]->id}}','{{$scenariosMapping[$i]->scenario_id}}','{{$hospital->id}}')"  class="btn "><i class="fas fa-pen"></i></button>
                                        <form style="display: inline-block" id='delete_scenariosMapping' method="POST" action="{{ route('scenario_mapping.destroy', $scenariosMapping[$i]->id) }}">
                                            @method('DELETE')
                                            @csrf
                                            <a href="{{ route('scenario_mapping.destroy', $scenariosMapping[$i]->id) }}" onclick="event.preventDefault(); document.getElementById('delete_scenariosMapping').submit();" class="btn btn-save "><i class="fas fa-trash"></i></a>
                                        </form>
                                        </td>
                                    </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                        <!-- Button trigger modal -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function scenarioMapping(hospitalId)
   {
     var value = {
        hospitalId: hospitalId,
           };
       $.ajax({
           type: 'GET',
           url: "{{ route('scenario_mapping.create') }}",
           data: value,
           success: function(result) {
               $('#exampleModalLabel').html('Scenario Mapping Add');
               $('#modalbody').html(result);
               $('#exampleModal').modal('show');
           }
          
       });
   }
   function editScenarioMapping(mappingId,scenarioId,hospitalId)
   {
    var value = {
        scenarioId: scenarioId,
        mappingId: mappingId,
        hospitalId: hospitalId,
           };
    url = "{{ route('scenario_mapping.edit', ':id') }}";
        url = url.replace(':id', mappingId);
        $.ajax({
            type: 'GET',
            url: url,
            data: value,
            success: function(result) {
                $('#exampleModalLabel').html('Scenario Mapping Edit');
                $('#modalbody').html(result);
                $('#exampleModal').modal('show');
            }
        });
   }
</script>
@endsection('content')