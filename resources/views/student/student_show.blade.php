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
            <div class="d-flex align-items-center justify-content-between py-4 nav-tab-heading">
                <div class="btn-wrapper d-flex gap-2">
                    <a href="{{route('student_edit',['status'=>'student','userId'=>$student->id])}}" class="btn btn-print bg-white d-flex align-items-center gap-2"><i class="fas fa-pen"></i> Edit</a>
                    <form style="display: inline-block" id='delete_student' method="POST" action="{{ route('user.destroy', $student->id) }}">
                        @method('DELETE')
                        @csrf
                        <a href="{{ route('user.destroy', $student->id) }}" onclick="event.preventDefault(); document.getElementById('delete_teacher').submit();" class="btn btn-save d-flex align-items-center gap-2"><i class="fas fa-trash"></i> Delete teacher</a>
                    </form>
                </div>
            </div>
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
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#" aria-expanded="true" aria-controls="collapseOne">
                                <div>
                                    <small>Scenrio Name</small>
                                    <h1 class="title">COVID <img src="{{ asset('theme/assets/imges/fi_edit.svg')}}" alt=""></h1>
                                </div>
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="covid-reports">
                                    <div class="executions">
                                        <div class="executions-wrapper">
                                            <div class="icone-wrapper">
                                                <img src="{{ asset('theme/assets/imges/book.svg" class="img-fluid')}}" alt="">
                                            </div>
                                            <div>
                                                <small>Number of executions</small>
                                                <h1>54</h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="executions">
                                        <div class="executions-wrapper">
                                            <div class="icone-wrapper">
                                                <img src="{{ asset('theme/assets/imges/award.svg" class="img-fluid')}}" alt="">
                                            </div>
                                            <div>
                                                <small>Best Score</small>
                                                <h1>54</h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="executions">
                                        <div class="executions-wrapper">
                                            <div class="icone-wrapper">
                                                <img src="{{ asset('theme/assets/imges/calculator.svg" class="img-fluid')}}" alt="">
                                            </div>
                                            <div>
                                                <small>Average Score</small>
                                                <h1>54</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="question-table">
                    <div class="question-table_wrapper">
                        <h1 class="heading">Question</h1>
                        <div class="question-item table-title">
                            <p class="number">NO</p>
                            <p class="question">QUESTION</p>
                            <p class="date">DATE CREATED</p>
                            <p class="icon"></p>
                        </div>
                        <div class="question-item">
                            <p class="number">01</p>
                            <p class="question">Q: What should I do with hand sanitizer on the FDA's list of hand sanitizers that consumers should not use?</p>
                            <p class="date">16 Apr 2022</p>
                            <p class="icon"><img src="{{ asset('theme/assets/imges/dotes.svg" class="img-fluid')}}" alt=""></p>
                        </div>
                        <div class="question-item">
                            <p class="number">02</p>
                            <p class="question">Q: Does spraying people with disinfectant, or having people go through disinfectant tunnels, walkways, or chambers, lower the spread of COVID-19?
                            </p>
                            <p class="date">14 Apr 2022</p>
                            <p class="icon"><img src="{{ asset('theme/assets/imges/dotes.svg" class="img-fluid')}}" alt=""></p>
                        </div>
                        <div class="question-item">
                            <p class="number">03</p>
                            <p class="question">Q: What is the FDA process for a COVID-19 vaccine authorized for emergency use versus an FDA-approved COVID-19 vaccine?</p>
                            <p class="date">14 Apr 2022</p>
                            <p class="icon"><img src="{{ asset('theme/assets/imges/dotes.svg" class="img-fluid')}}" alt=""></p>
                        </div>
                        <div class="question-item">
                            <p class="number">04</p>
                            <p class="question">Q: Am I eligible for a second COVID-19 vaccine booster dose?</p>
                            <p class="date">14 Apr 2022</p>
                            <p class="icon"><img src="{{ asset('theme/assets/imges/dotes.svg" class="img-fluid')}}" alt=""></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End::Container fluid  -->
</div>

@endsection('content')