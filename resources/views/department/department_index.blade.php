@extends('layouts.main')

@section('content')

<div class="page-wrapper">
    <!-- Container fluid  -->
    <div class="container-fluid">
        <div class="row">
            <div class="tab-pane fade Student-card active show" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="d-flex align-items-center justify-content-between py-4 nav-tab-heading">
                    <h4 class="heading mb-0">{{__('gobal.Department List')}}</h4>
                    <div class="btn-wrapper d-flex gap-2">
                        <!-- <button class="btn btn-print bg-white d-flex align-items-center gap-2"><img src="./assets/imges/print.svg" alt=""> Print</button> -->
                        <a href="{{route('department.create')}}" class="btn btn-save d-flex align-items-center gap-2"><img src="{{ asset('theme/assets/imges/department.svg')}}" width="25px" alt="">{{__('gobal.Add Department')}}</a>
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
                                            {{__('gobal.Department Name')}}
                                        </th>
                                        <th class="border-top-0">
                                            {{__('gobal.created_on')}}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < count($department); $i++) @php $a=$i; $a++ @endphp
                                    <tr>
                                        <td>{{$a}}</td>
                                        <td class="txt-oflo"><a href="{{route('department.show',$department[$i]->id)}}" class="fw-bolder text-theme">{{ucwords($department[$i]->name)}}</a></td>
                                        <td>{{date('Y-m-d',strtotime($department[$i]->created_at))}}</td>
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