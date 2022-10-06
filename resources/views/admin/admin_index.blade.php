@extends('layouts.main')

@section('content')

<div class="page-wrapper">
    <!-- Container fluid  -->
    <div class="container-fluid">
        <div class="row">
            <div class="tab-pane fade Student-card active show" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="d-flex align-items-center justify-content-between py-4 nav-tab-heading">
                    <h4 class="heading mb-0">{{__('gobal.admins_list')}}</h4>
                    <div class="btn-wrapper d-flex gap-2">
                        <a href="{{route('admin_create','admin')}}" class="btn btn-save d-flex align-items-center gap-2"><img src="{{ asset('theme/assets/imges/admin.svg')}}" width="25px" alt="">{{__('gobal.add_admin')}}</a>
                    </div>
                </div>
                <div class="gernal-info bg-white">
                    <div class="block">
                        <div class="table-responsive" style="padding-top:28px;">
                            <table class="table no-wrap" id="myTable">
                                <thead>
                                    <tr style="background: #F9F9FA; border-radius: 6px;">
                                        <th class="border-top-0">#</th>
                                        <th class="border-top-0">
                                            {{__('gobal.first_name')}}
                                        </th>
                                        <th class="border-top-0">
                                            {{__('gobal.last_name')}}
                                        </th>
                                        <th class="border-top-0">
                                            {{__('gobal.hospital')}}
                                        </th>
                                        <th class="border-top-0">
                                            {{__('gobal.email')}}
                                        </th>
                                        <th class="border-top-0">
                                            {{__('gobal.unique_id')}}
                                        </th>
                                        <th class="border-top-0">
                                            {{__('gobal.created_on')}}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < count($admin); $i++) @php $a=$i; $a++ @endphp
                                    <tr>
                                        <td>{{$a}}</td>
                                        <td class="txt-oflo">
                                            <form id='admin{{$i}}' style="display: inline-block" method="POST" action="{{ route('admin_show') }}">
                                                @csrf
                                                <input hidden name="role_id" value="admin"/>
                                                <input hidden name="user_id" value="{{$admin[$i]->id}}"/>
                                                <a herf='{{ route('admin_show') }}' type="submit" class="fw-bolder text-theme" onclick="event.preventDefault(); document.getElementById('admin{{$i}}').submit();">{{ucwords($admin[$i]->first_name)}}</a></td>
                                            </form>
                                        <td class="txt-oflo">{{ucwords($admin[$i]->last_name)}}</td>
                                        <td>{{ucwords($admin[$i]->hospitals->hospital_name)}}</td>
                                        <td>{{$admin[$i]->email}}</td>
                                        <td>{{$admin[$i]->unique_id}}</td>

                                        <td>{{date("Y-m-d",strtotime($admin[$i]->created_at))}}</td>
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