@extends('layouts.main')

@section('content')
<div class="page-wrapper">
    <!-- Container fluid  -->
    <div class="container-fluid">
        <div class="row">
            <div class="tab-pane fade Student-card active show" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="d-flex align-items-center justify-content-between py-4 nav-tab-heading">
                    <h4 class="heading mb-0">Edit Hospital</h4>
                </div>
                <div class="gernal-info bg-white">
                    <div class="block">
                        <p class="mb-3">Please enter the required input fields in order to Edit a Hospital.</p>
                        <form  method="POST" action="{{ route('hospitals.update',$hospital->id) }}" enctype="multipart/form-data">
                            @method("PUT")
                            @csrf
                            <div class="row pb-2">
                                <div class="col-md-6 pb-2">
                                    <label>Hospital Name<span class="required">*</span></label>
                                    <input type="text" name="hospital_name" value="{{$hospital->hospital_name}}" placeholder="Please Enter the name of the Hospital" class="form-control" required>
                                </div>
                                <div class="col-md-6 pb-2">
                                    <label>Phone<span class="required">*</span></label>
                                    <input type="number" name="hospital_phone" value="{{$hospital->hospital_phone}}" placeholder="Please Enter the Phone Number of the Hospital" class="form-control" required>
                                </div>
                                <div class="col-md-6 pb-2">
                                    <label>Email<span class="required">*</span></label>
                                    <input type="email" name="hospital_email" value="{{$hospital->hospital_email}}"  placeholder="Please Enter the Email of the Hospital" class="form-control" required>
                                </div>
                                <div class="col-md-6 pb-2">
                                    <label>Hospital Address<span class="required">*</span></label>
                                    <input type="text" name="hospital_address" value="{{$hospital->hospital_address}}" placeholder="Please Enter the Adddress of the Hospital" class="form-control" required>
                                </div>
                                <div class="col-md-6 pb-2">
                                    <label>SmallLogoURL<span class="required">*</span></label>
                                    <input type="file" name="hospital_small_logo" class="form-control" >
                                </div>
                                <div class="col-md-6 pb-2">
                                    <label>HiResLogoURL<span class="required">*</span></label>
                                    <input type="file" name="hospital_hi_rest_logo" class="form-control" >
                                </div>
                                <div class="col-md-6 pb-2">
                                    <label>PrimaryColor<span class="required">*</span></label>
                                    <input type="color" name="primary_color" value="{{$hospital->primary_color}}" class="form-control form-control-color" value="#563d7c" title="Choose your color" required>
                                </div>
                                <div class="col-md-6 pb-2">
                                    <label>SecondaryColor<span class="required">*</span></label>
                                    <input type="color" name="secondary_color" value="{{$hospital->secondary_color}}"  class="form-control form-control-color" value="#12ad83" title="Choose your color" required>
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