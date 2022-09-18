@extends('layouts.main')

@section('content')
<div class="page-wrapper">
    <!-- Container fluid  -->
    <div class="container-fluid">
        <div class="row">
            <div class="tab-pane fade Student-card active show" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="d-flex align-items-center justify-content-between py-4 nav-tab-heading">
                    <h4 class="heading mb-0"> {{__('gobal.Scenarios List')}}</h4>
                    <div class="btn-wrapper d-flex gap-2">
                        <a href="{{route('scenario.create')}}" class="btn btn-save d-flex align-items-center gap-2"><img src="{{ asset('theme/assets/imges/scene.svg')}}" width="25px" alt="">{{__('gobal.Add Scenario')}}</a>
                    </div>
                </div>
                <div class="gernal-info bg-white">
                    <div class="block">
                        <div class="table-responsive" style="padding-top:28px;">
                            <table class="table no-wrap" id="myTable">
                                <thead>
                                    <tr style="background: #F9F9FA; border-radius: 6px;">
                                        <th class="border-top-0">
                                            {{__('gobal.id')}}
                                        </th>
                                        <th class="border-top-0">
                                            {{__('gobal.Scenario ID')}}
                                        </th>
                                       
                                        <th class="border-top-0">
                                            {{__('gobal.Secnario Name')}}
                                        </th>
                                        <th class="border-top-0">
                                            {{__('gobal.Department Name')}}
                                        </th>
                                        <th class="border-top-0">
                                            {{__('gobal.created_on')}}
                                            
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < count($scenario); $i++) @php $a=$i; $a++ @endphp
                                    <tr>
                                        <td>{{$a}}</td>
                                        <td>{{$scenario[$i]->sce_id}}</td>
                                        <td class="txt-oflo"><a href="{{route('scenario.show',$scenario[$i]->id)}}" class="fw-bolder text-theme">{{ucwords($scenario[$i]->secnario_name)}}</a></td>
                                        <td >{{ucwords($scenario[$i]->name)}}</td>
                                        <td>{{date('Y-m-d',strtotime($scenario[$i]->created_at))}}</td>
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