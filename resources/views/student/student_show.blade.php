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
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Gernal</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Scenarios</button>
                </li>
            </ul>
            @if(!Auth::user()->hasRole('student'))
            <div class="d-flex align-items-center justify-content-between py-4 nav-tab-heading">
                <div class="btn-wrapper d-flex gap-2">
                    <a href="{{route('student_edit',['status'=>'student','userId'=>$student->id])}}" class="btn btn-print bg-white d-flex align-items-center gap-2"><i class="fas fa-pen"></i> Edit</a>
                    <form style="display: inline-block" id='delete_student' method="POST" action="{{ route('user.destroy', $student->id) }}">
                        @method('DELETE')
                        @csrf
                        <a href="{{ route('user.destroy', $student->id) }}" onclick="event.preventDefault(); document.getElementById('delete_teacher').submit();" class="btn btn-save d-flex align-items-center gap-2"><i class="fas fa-trash"></i> Delete Student</a>
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
                            <h3 class="heading">Gernal Information</h3>
                        </div>
                        <p class="mb-3">Sed ut perspiciatis unde omnis iste natus error sit voluptatem</p>

                        <div class="row pb-2">
                            <div class="col-md-6 pb-2">
                                <label class="fw-bold">First Name<span class="required">*</span></label>
                                <p class="text-dark">{{ucwords($student->first_name)}}</p>
                            </div>
                            <div class="col-md-6 pb-2">
                                <label class="fw-bold">Last Name<span class="required">*</span></label>
                                <p class="text-dark">{{ucwords($student->last_name)}}</p>
                            </div>
                            <div class="col-md-6 pb-2">
                                <label class="fw-bold">Hospital Name</label>
                                <p class="text-dark">{{ucwords($student->hospitals->hospital_name)}}</p>
                            </div>
                            <div class="col-md-6 pb-2">
                                <label class="fw-bold">Phone</label>
                                <p class="text-dark">{{$student->phone_number}}</p>
                            </div>
                            <div class="col-md-6 pb-2">
                                <label class="fw-bold">Email</label>
                                <p class="text-dark">{{$student->email}}</p>
                            </div>
                            <div class="col-md-6 pb-2">
                                <label class="fw-bold">ID</label>
                                <p class="text-dark">{{$student->unique_id}}</p>
                            </div>
                        </div>
                    </div>
                    <form action="">
                        <div class="block studies bg-white mb-3">
                            <div class="d-flex justify-content-between">
                                <h3 class="heading">Contact Information</h3>
                            </div>
                            <p class="mb-3">Sed ut perspiciatis unde omnis iste natus error sit voluptatem</p>
                            <div class="row">
                                <div class="col-md-6 pb-4">
                                    <label for="" class="fw-bold">Address Line*</label>
                                    <input type="text" class="form-control" placeholder="City name">
                                </div>
                                <div class="col-md-6 pb-4">
                                    <label for="" class="fw-bold">City*</label>
                                    <input type="text" class="form-control" placeholder="City name">
                                </div>
                            </div>
                        </div>
                        <div class="block studies bg-white mb-3">
                            <div class="d-flex justify-content-between">
                                <h3 class="heading">Studies Status</h3>
                            </div>
                            <p class="mb-3">Sed ut perspiciatis unde omnis iste natus error sit voluptatem</p>
                            <div class="row">
                                <div class="col-md-6 pb-4">
                                    <label for="" class="fw-bold">Subject of study</label>
                                    <select class="form-select" aria-label=".form-select-lg example">
                                        <option selected>Select Subject of study</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                                <div class="col-md-6 pb-4">
                                    <label for="" class="fw-bold">School Year</label>
                                    <select class="form-select" aria-label=".form-select-lg example">
                                        <option selected>Select Year</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                        <option value="4">Four</option>
                                    </select>
                                </div>
                                <div class="col-md-6 pb-4">
                                    <label for="" class="fw-bold">Specialzition</label>
                                    <select class="form-select" aria-label=".form-select-lg example">
                                        <option selected>Select Specialzition</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                        <option value="4">Four</option>
                                    </select>
                                </div>
                                <div class="col-md-6 pb-4">
                                    <label for="" class="fw-bold">Role in Hospital</label>
                                    <select class="form-select" aria-label=".form-select-lg example">
                                        <option selected>Select Role</option>
                                        <option value="admin">Admin</option>
                                        <option value="teacher">Teacher</option>
                                        <option value="student">Student</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="block studies bg-white mb-3">
                            <div class="d-flex justify-content-between mb-4">
                                <h3 class="heading">Details</h3>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pb-4">
                                    <label for="" class="fw-bold">Serial Number</label>
                                    <p class="text-dark">00001</p>
                                </div>
                                <div class="col-md-6 pb-4">
                                    <label for="" class="fw-bold">Created On</label>
                                    <p class="text-dark">20/05/2021</p>
                                </div>
                                <div class="col-md-6 pb-4">
                                    <label for="" class="fw-bold">Last Entrance</label>
                                    <p class="text-dark">31/08/2021</p>
                                </div>
                                
                                
                                <div class="btn-wrapper d-flex gap-2 mt-4">
                                    <button type="submit" class="btn btn-save d-flex align-items-center gap-2"><i class="fas fa-check fs-4"></i>Update</button>
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
                            <h3 class="heading">Sessions</h3>
                        </div>
                        <p class="mb-3">No. of Sessions played by this Student</p>

                        <div class="table-responsive" style="padding-top:28px;">
                            <table class="table no-wrap" id="myTable">
                                <thead>
                                    <tr style="background: #F9F9FA; border-radius: 6px;">
                                        <th class="border-top-0">ID</th>
                                        <th class="border-top-0">Scenario ID</th>
                                        <th class="border-top-0">Score</th>
                                        <th class="border-top-0">Time Taken</th>
                                        <th class="border-top-0">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for($i=0; $i<count($session); $i++) @php $a=$i; $a++ @endphp
                                    <tr>
                                        <td><a href="{{route('student_session_details',$session[$i]->id)}}" class="fw-bolder text-theme">{{$a}}</a></td>
                                        <td><a href="{{route('student_session_details',$session[$i]->id)}}" class="fw-bolder text-theme">{{$session[$i]->scenario_id}}</a></td>
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
        </div>
    </div>
    <!-- End::Container fluid  -->
</div>

@endsection('content')