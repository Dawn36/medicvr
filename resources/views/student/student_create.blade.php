@extends('layouts.main')

@section('content')
<div class="page-wrapper">
    <!-- Container fluid  -->
    <div class="container-fluid">
        <div class="row">
            <div class="tab-pane fade student-card active show" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="d-flex align-items-center justify-content-between py-4 nav-tab-heading">
                    <h4 class="heading mb-0">Add Student</h4>
                </div>
                <div class="gernal-info bg-white">
                    <div class="block">
                        <p class="mb-3">Please enter the required input fields in order to add a student.</p>
                        <form  method="POST" action="{{ route('user.store') }}" >
                            @csrf
                            <input hidden name='role_id' value="student"/>
                            <div class="row pb-2">
                                <div class="col-md-6 pb-2">
                                    <label>First Name<span class="required">*</span></label>
                                    <input type="text" name="first_name" placeholder="Please Enter the First name of the student" class="form-control" required>
                                </div>
                                <div class="col-md-6 pb-2">
                                    <label>Last Name<span class="required">*</span></label>
                                    <input type="text" name="last_name" placeholder="Please Enter the Last name of the student" class="form-control" required>
                                </div>
                                <div class="col-md-6 pb-2">
                                    <label>Phone<span class="required">*</span></label>
                                    <input type="tel" name="phone_number" placeholder="Please Enter the Phone Number of the student" class="form-control" required>
                                </div>
                                <div class="col-md-6 pb-2">
                                    <label>Email<span class="required">*</span></label>
                                    <input type="email" name="email" placeholder="Please Enter the Email of the student" class="form-control" required>
                                </div>
                                <div class="col-md-6 pb-2">
                                    <label>Unique ID<span class="required">*</span></label>
                                    <input type="number" name="unique_id" placeholder="Please Enter the Unique ID of the student" class="form-control" required>
                                </div>
                                <div class="col-md-6 pb-2">
                                    <label>Teacher<span class="required">*</span></label>
                                    <select name="parent_id" class="form-control" required>
                                        @for ($i = 0; $i < count($teacher); $i++)
                                        <option value="{{$teacher[$i]->id}}">{{ucwords($teacher[$i]->first_name)}} {{ucwords($teacher[$i]->last_name)}}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-6 pb-2">
                                    <label>Password<span class="required">*</span></label>
                                    <input type="password" name="password" placeholder="Please Enter the Password" class="form-control" required>
                                </div>
                                <div class="btn-wrapper d-flex gap-2 mt-4">
                                    <button type="submit" class="btn btn-save d-flex align-items-center gap-2"><i class="fas fa-check fs-4"></i>Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection('content')