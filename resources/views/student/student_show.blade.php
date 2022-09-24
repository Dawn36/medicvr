@extends('layouts.main')

@section('content')

<style>
    .accordion-button:not(.collapsed):after {
        display: none;
    }
</style>

<div class="page-wrapper">
    <!-- Start::Container fluid  -->
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-between py-4 pt-2 nav-tab-heading">
            <ul class="nav nav-pills forms-tabs" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">{{__('gobal.Gernal')}}</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">{{__('gobal.Session')}}</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-department-tab" data-bs-toggle="pill" data-bs-target="#pills-department" type="button" role="tab" aria-controls="pills-department" aria-selected="false">{{__('gobal.Department')}}</button>
                </li>
            </ul>
            @if(!Auth::user()->hasRole('student'))
            <div class="d-flex align-items-center justify-content-between py-4 nav-tab-heading">
                <div class="btn-wrapper d-flex gap-2">
                    <a href="{{route('student_edit',['status'=>'student','userId'=>$student->id])}}" class="btn btn-print bg-white d-flex align-items-center gap-2"><i class="fas fa-pen"></i>{{__('gobal.edit')}}</a>
                    <form style="display: inline-block" id='delete_student' method="POST" action="{{ route('user.destroy', $student->id) }}">
                        @method('DELETE')
                        @csrf
                        <a href="{{ route('user.destroy', $student->id) }}" onclick="event.preventDefault(); document.getElementById('delete_teacher').submit();" class="btn btn-save d-flex align-items-center gap-2"><i class="fas fa-trash"></i>{{__('gobal.Delete Student')}} </a>
                    </form>
                </div>
            </div>
            @endif
        </div>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="gernal-info">
                    <div class="block studies mb-3 bg-white">
                        <div class="d-flex justify-content-between">
                            <h3 class="heading">{{__('gobal.Gernal Information')}}</h3>
                        </div>
                        <p class="mb-3">{{__('gobal.Sed ut perspiciatis unde omnis iste natus error sit voluptatem')}}</p>

                        <div class="row pb-2">
                            <div class="col-md-6 pb-2">
                                <label class="fw-bold">{{__('gobal.first_name')}}<span class="required">*</span></label>
                                <p class="text-dark">{{ucwords($student->first_name)}}</p>
                            </div>
                            <div class="col-md-6 pb-2">
                                <label class="fw-bold">{{__('gobal.last_name')}}<span class="required">*</span></label>
                                <p class="text-dark">{{ucwords($student->last_name)}}</p>
                            </div>
                            <div class="col-md-6 pb-2">
                                <label class="fw-bold">{{__('gobal.hospital_name')}}</label>
                                <p class="text-dark">{{ucwords($student->hospitals->hospital_name)}}</p>
                            </div>
                            <div class="col-md-6 pb-2">
                                <label class="fw-bold">{{__('gobal.phone')}}</label>
                                <p class="text-dark">{{$student->phone_number}}</p>
                            </div>
                            <div class="col-md-6 pb-2">
                                <label class="fw-bold">{{__('gobal.email')}}</label>
                                <p class="text-dark">{{$student->email}}</p>
                            </div>
                            <div class="col-md-6 pb-2">
                                <label class="fw-bold">{{__('gobal.id')}}</label>
                                <p class="text-dark">{{$student->unique_id}}</p>
                            </div>
                        </div>
                    </div>
                    <form action="">
                        <div class="block studies bg-white mb-3">
                            <div class="d-flex justify-content-between">
                                <h3 class="heading">{{__('gobal.Contact Information')}}</h3>
                            </div>
                            <p class="mb-3">{{__('gobal.Sed ut perspiciatis unde omnis iste natus error sit voluptatem')}}</p>
                            <div class="row">
                                <div class="col-md-6 pb-4">
                                    <label for="" class="fw-bold">{{__('gobal.Address Line')}}*</label>
                                    <input type="text" class="form-control" placeholder="City name">
                                </div>
                                <div class="col-md-6 pb-4">
                                    <label for="" class="fw-bold">{{__('gobal.City')}}*</label>
                                    <input type="text" class="form-control" placeholder="City name">
                                </div>
                            </div>
                        </div>
                        <div class="block studies bg-white mb-3">
                            <div class="d-flex justify-content-between">
                                <h3 class="heading">{{__('gobal.Studies Status')}}</h3>
                            </div>
                            <p class="mb-3">{{__('gobal.Sed ut perspiciatis unde omnis iste natus error sit voluptatem')}}</p>
                            <div class="row">
                                <div class="col-md-6 pb-4">
                                    <label for="" class="fw-bold">{{__('gobal.Subject of study')}}</label>
                                    <select class="form-select" aria-label=".form-select-lg example">
                                        <option selected>{{__('gobal.Select Subject of study')}}</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                                <div class="col-md-6 pb-4">
                                    <label for="" class="fw-bold">{{__('gobal.School Year')}}</label>
                                    <select class="form-select" aria-label=".form-select-lg example">
                                        <option selected>{{__('gobal.Select Year')}}</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                        <option value="4">Four</option>
                                    </select>
                                </div>
                                <div class="col-md-6 pb-4">
                                    <label for="" class="fw-bold">{{__('gobal.Specialzition')}}</label>
                                    <select class="form-select" aria-label=".form-select-lg example">
                                        <option selected>{{__('gobal.Select Specialzition')}}</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                        <option value="4">Four</option>
                                    </select>
                                </div>
                                <div class="col-md-6 pb-4">
                                    <label for="" class="fw-bold">{{__('gobal.Select Role in Hospital')}}</label>
                                    <select class="form-select" aria-label=".form-select-lg example">
                                        <option selected>{{__('gobal.Select Role')}}</option>
                                        <option value="admin">Admin</option>
                                        <option value="teacher">Teacher</option>
                                        <option value="student">Student</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="block studies bg-white mb-3">
                            <div class="d-flex justify-content-between mb-4">
                                <h3 class="heading">{{__('gobal.Details')}}</h3>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pb-4">
                                    <label for="" class="fw-bold">{{__('gobal.Serial Number')}}</label>
                                    <p class="text-dark">00001</p>
                                </div>
                                <div class="col-md-6 pb-4">
                                    <label for="" class="fw-bold">{{__('gobal.created_on')}}</label>
                                    <p class="text-dark">20/05/2021</p>
                                </div>
                                <div class="col-md-6 pb-4">
                                    <label for="" class="fw-bold">{{__('gobal.Last Entrance')}}</label>
                                    <p class="text-dark">31/08/2021</p>
                                </div>
                                
                                
                                <div class="btn-wrapper d-flex gap-2 mt-4">
                                    <button type="submit" class="btn btn-save d-flex align-items-center gap-2"><i class="fas fa-check fs-4"></i>{{__('gobal.Update')}}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade covid" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                <div class="gernal-info bg-white">
                    <div class="block">
                        <div class="d-flex justify-content-between">
                            <h3 class="heading">{{__('gobal.Session')}}</h3>
                        </div>
                        <p class="mb-3">{{__('gobal.No. of Sessions played by this Student')}}</p>

                        <div class="table-responsive" style="padding-top:28px;">
                            <table class="table no-wrap" id="myTable">
                                <thead>
                                    <tr style="background: #F9F9FA; border-radius: 6px;">
                                        <th class="border-top-0">{{__('gobal.id')}}</th>
                                        <th class="border-top-0">{{__('gobal.Scenario Name')}}</th>
                                        <th class="border-top-0">{{__('gobal.Department Name')}}</th>
                                        <th class="border-top-0">{{__('gobal.Score')}}</th>
                                        <th class="border-top-0">{{__('gobal.Time Taken')}}</th>
                                        <th class="border-top-0">{{__('gobal.Date')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for($i=0; $i<count($session); $i++) @php $a=$i; $a++ @endphp
                                    <tr>
                                        <td><a href="{{route('student_session_details',$session[$i]->id)}}" class="fw-bolder text-theme">{{$a}}</a></td>
                                        <td><a href="{{route('student_session_details',$session[$i]->id)}}" class="fw-bolder text-theme">{{ucwords($session[$i]->s_name)}}</a></td>
                                        <td>{{ucwords($session[$i]->d_name)}}</td>
                                        <td>{{$session[$i]->score}}</td>
                                        <td>{{$session[$i]->time_taken}} Min</td>
                                        <td>{{date("Y-m-d",strtotime($session[$i]->created_at))}}</td>
                                    </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade covid" id="pills-department" role="tabpanel" aria-labelledby="pills-department-tab">
                <div class="gernal-info bg-white">
                    <div class="block">
                        <div class="d-flex justify-content-between">
                            <h3 class="heading">{{__('gobal.Department')}}</h3>
                        </div>

                        <!-- Department -->
                        <div class="pt-1">
                            <ul class="nav nav-pills forms-tabs" id="pills-tab" role="tablist">
                                @for($i=0; $i< count($sessionDepartmentTab); $i++)
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link departments-tabs {{$i == 0 ? 'active' : ''}}" id="pills-emergency-tab" data-bs-toggle="pill" data-bs-target="#pills-{{ucwords($sessionDepartmentTab[$i]->department_name)}}" type="button" role="tab" aria-controls="pills-emergency" aria-selected="false">{{ucwords($sessionDepartmentTab[$i]->department_name)}}</button>
                                </li>
                                @endfor
                                
                            </ul>

                            <!-- Scenarios -->
                            <div class="tab-content">
                                @for($i=0; $i< count($sessionDepartmentTab); $i++)
                                <div class="tab-pane fade show {{ $i == 0 ? 'active' : ''}}" id="pills-{{ucwords($sessionDepartmentTab[$i]->department_name)}}" role="tabpanel" aria-labelledby="pills-emergency-tab">
                                    <div class="gernal-info bg-white">
                                        <div class="mt-5">
                                            <div class="d-flex justify-content-between">
                                                <h3 class="heading">{{__('gobal.Session')}}</h3>
                                            </div>
                                            <p class="mb-3">{{__('gobal.All the Scenarios of this Department')}}</p>
                                            @php 
                                            $sName=explode(",",$sessionDepartmentTab[$i]->s_name);
                                            $sId=explode(",",$sessionDepartmentTab[$i]->s_id);
                                            
                                            @endphp
                                            <ul class="nav nav-pills forms-tabs" id="pills-tab" role="tablist">
                                                @for($j=0; $j< count($sName); $j++)
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link departments-tabs {{$j == 0 && $i == 0 ? 'active' : ''}}" id="pills-covid-tab" data-bs-toggle="pill" data-bs-target="#pills-{{ucwords($sName[$j])}}" type="button" role="tab" aria-controls="pills-covid" aria-selected="true">{{ucwords($sName[$j])}}</button>
                                                </li>
                                                @endfor
                                            </ul>
                                            <div class="tab-content">
                                                @for($j=0; $j< count($sName); $j++)
                                                @php  $data=\App\Http\Controllers\UserController::showTab($sessionDepartmentTab[$i]->department_id,$sId[$j],$student->id) @endphp
                                                <div class="tab-pane fade show {{$j == 0 && $i == 0 ? 'active' : ''}}" id="pills-{{ucwords($sName[$j])}}" role="tabpanel" aria-labelledby="pills-covid-tab">
                                                    <div class="gernal-info bg-white">
                                                        <div class="mt-5">
                                                            <div class="d-flex justify-content-center">
                                                                <h3 class="fw-bolder fs-8 text-center mb-4">{{ucwords($sName[$j])}}</h3>
                                                            </div>
                                                            <div class="row justify-content-center">
                                                                <div class="col-lg-3 col-md-12">
                                                                    <div class="white-box analytics-info">
                                                                        <div class="d-flex">
                                                                            <img src="{{ asset('theme/assets/imges/hospital.svg')}}" class="sidebar-icon custom-widgets-icon" alt="">
                                                                            <p class="box-title mb-0">{{__('gobal.You Played')}}</p>
                                                                        </div>
                                                                        <div class="box-data">
                                                                            @php 
                                                                            $dataArrTime=array();
                                                                            $dataArrScore=array();
                                                                            for ($k=0; $k < count($data) ; $k++) {
                                                                                array_push($dataArrTime,  $data[$k]->time_taken);
                                                                                array_push($dataArrScore,  $data[$k]->score);
                                                                            }
                                                                            @endphp
                                                                            <p class="bx-value mb-0">{{array_sum($dataArrTime)}} min Times</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3 col-md-12">
                                                                    <div class="white-box analytics-info">
                                                                        <div class="d-flex">
                                                                            <img src="{{ asset('theme/assets/imges/sessions.svg')}}" class="sidebar-icon custom-widgets-icon" alt="">
                                                                            <p class="box-title mb-0">{{__('gobal.Your Average Score Is')}}</p>
                                                                        </div>
                                                                        <div class="box-data">
                                                                            <p class="bx-value mb-0">{{number_format(array_sum($dataArrScore)/count($data),2)}}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3 col-md-12">
                                                                    <div class="white-box analytics-info">
                                                                        <div class="d-flex">
                                                                            <img src="{{ asset('theme/assets/imges/sessions.svg')}}" class="sidebar-icon custom-widgets-icon" alt="">
                                                                            <p class="box-title mb-0">{{__('gobal.Your Best Score Is')}}</p>
                                                                        </div>
                                                                        <div class="box-data">
                                                                            <p class="bx-value mb-0">{{max($dataArrScore)}}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="table-responsive" style="padding-top:28px;">
                                                                        <table class="table no-wrap" id="myTable">
                                                                            <thead>
                                                                                <tr style="background: #F9F9FA; border-radius: 6px;">
                                                                                    <th class="border-top-0">{{__('gobal.id')}}</th>
                                                                                    <th class="border-top-0">{{__('gobal.Scenario Name')}}</th>
                                                                                    <th class="border-top-0">{{__('gobal.Department Name')}}</th>
                                                                                    <th class="border-top-0">{{__('gobal.Score')}}</th>
                                                                                    <th class="border-top-0">{{__('gobal.Time Taken')}}</th>
                                                                                    <th class="border-top-0">{{__('gobal.Date')}}</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @for ($k=0; $k < count($data) ; $k++) @php $a=$k; $a++ @endphp
                                                                                <tr>
                                                                                    <td><a href="{{route('student_session_details',$data[$k]->id)}}" class="fw-bolder text-theme">{{$a}}</a></td>
                                                                                    <td><a href="{{route('student_session_details',$data[$k]->id)}}" class="fw-bolder text-theme">{{ucwords($data[$k]->s_name)}}</a></td>
                                                                                    <td><a href="{{route('student_session_details',$data[$k]->id)}}" class="fw-bolder text-theme">{{ucwords($data[$k]->d_name)}}</a></td>
                                                                                    <td>{{$data[$k]->score}}</td>
                                                                                    <td>{{$data[$k]->time_taken}} mins</td>
                                                                                    <td>{{Date("Y-m-d",strtotime($data[$k]->created_at))}}</td>
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
                                                @endfor
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End::Container fluid  -->
</div>

@endsection('content')