@extends('layouts.main')

@section('content')

<div class="page-wrapper">
    <!-- Container fluid  -->
    <div class="container-fluid">
        <div class="row">
            <div class="tab-pane fade Student-card active show" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="d-flex align-items-center justify-content-between py-4 nav-tab-heading">
                    <h4 class="heading mb-0">Teacher List</h4>
                    <div class="btn-wrapper d-flex gap-2">
                        <a href="{{route('teacher_create','teacher')}}" class="btn btn-save d-flex align-items-center gap-2"><img src="{{ asset('theme/assets/imges/teacher.svg')}}" width="25px" alt="">Add Teacher</a>
                    </div>
                </div>
                <div class="gernal-info bg-white">
                    <div class="block">
                        <div class="table-responsive" style="padding-top:28px;">
                            <table class="table no-wrap" id="myTable">
                                <thead>
                                    <tr style="background: #F9F9FA; border-radius: 6px;">
                                        <th class="border-top-0">ID</th>
                                        <th class="border-top-0">
                                            First Name
                                        </th>
                                        <th class="border-top-0">
                                            Last Name
                                        </th>
                                        <th class="border-top-0">
                                            Phone Number
                                        </th>
                                        <th class="border-top-0">
                                            Email
                                        </th>
                                        <th class="border-top-0">
                                            Created On
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < count($teacher); $i++) @php $a=$i; $a++ @endphp;
                                    <tr>
                                        <td>{{$a}}</td>
                                        <td class="txt-oflo">
                                            <form id='teacher{{$i}}' style="display: inline-block" method="POST" action="{{ route('teacher_show') }}">
                                                @csrf
                                                <input hidden name="role_id" value="teacher"/>
                                                <input hidden name="user_id" value="{{$teacher[$i]->id}}"/>
                                                <a herf='{{ route('teacher_show') }}' type="submit" class="fw-bolder text-theme" onclick="event.preventDefault(); document.getElementById('teacher{{$i}}').submit();">{{ucwords($teacher[$i]->first_name)}}</a></td>
                                            </form>
                                        <td class="txt-oflo">{{ucwords($teacher[$i]->last_name)}}</td>
                                        <td>{{$teacher[$i]->phone_number}}</td>
                                        <td>{{$teacher[$i]->email}}</td>
                                        <td>{{date("Y-m-d",strtotime($teacher[$i]->created_at))}}</td>
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