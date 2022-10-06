@extends('layouts.main')

@section('content')

<div class="page-wrapper">
    <!-- Container fluid  -->
    <div class="container-fluid">
        <div class="row">
            <div class="tab-pane fade Student-card active show" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="d-flex align-items-center justify-content-between py-4 nav-tab-heading">
                    <h4 class="heading mb-0">{{__('gobal.Hospitals List')}} </h4>
                    <div class="btn-wrapper d-flex gap-2">
                        <!-- <button class="btn btn-print bg-white d-flex align-items-center gap-2"><img src="./assets/imges/print.svg" alt=""> Print</button> -->
                        <a href="{{route('hospitals.create')}}" class="btn btn-save d-flex align-items-center gap-2"><img src="{{ asset('theme/assets/imges/hospital.svg')}}" width="25px" alt="">{{__('gobal.Add Hospital')}}</a>
                    </div>
                </div>
                <div class="gernal-info bg-white">
                    <div class="block">
                        <div class="table-responsive" style="padding-top:28px">
                            <table class="table no-wrap" id="myTable">
                                <thead>
                                    <tr style="background: #F9F9FA; border-radius: 6px;">
                                        <th class="border-top-0">#</th>
                                        <th class="border-top-0">
                                            {{__('gobal.hospital_name')}} 
                                        </th>
                                        <th class="border-top-0">
                                            {{__('gobal.phone')}}  
                                        </th>
                                        <th class="border-top-0">
                                            {{__('gobal.email')}}   
                                        </th>
                                        <th class="border-top-0">
                                            {{__('gobal.created_on')}}  
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < count($hospitals); $i++) @php $a=$i; $a++ @endphp
                                    <tr>
                                        <td>{{$a}}</td>
                                        <td class="txt-oflo"><a href="{{route('hospitals.show',$hospitals[$i]->id)}}" class="fw-bolder text-theme">{{ucwords($hospitals[$i]->hospital_name)}}</a></td>
                                        <td>{{$hospitals[$i]->hospital_phone}}</td>
                                        <td>{{$hospitals[$i]->hospital_email}}</td>
                                        <td>{{date('Y-m-d',strtotime($hospitals[$i]->created_at))}}</td>
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