@extends('layouts.main')

@section('content')
<div class="page-wrapper">
    <!-- Container fluid  -->
    <div class="container-fluid">
        <div class="row">
            <div class="tab-pane fade Student-card active show" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="d-flex align-items-center justify-content-between py-4 nav-tab-heading">
                    <h4 class="heading mb-0">Edit Scenario</h4>
                </div>
                <div class="gernal-info bg-white">
                    <div class="block">
                        <p class="mb-3">Please enter the required input fields in order to Edit a Scenario.</p>
                        <form  method="POST" action="{{ route('scenario.update',$scenario->id) }}" enctype="multipart/form-data">
                            @method("PUT")
                            @csrf
                            <div class="row pb-2">
                                <div class="col-md-6 pb-2">
                                    <label>Scenario Name<span class="required">*</span></label>
                                    <input type="text" name="scenario_name" value="{{$scenario->name}}" placeholder="Please Enter the name of the scenario" class="form-control" required>
                                </div>
                                <div class="col-md-6 pb-2">
                                    <label>Scenario id<span class="required">*</span></label>
                                    <input type="number" name="scenario_id" value="{{$scenario->sce_id}}" placeholder="Enter Scenario id" class="form-control" required>
                                </div>
                                <div class="col-md-6 pb-2">
                                    <label>Scenario logo</label>
                                    <input type="file" name="scenario_logo" class="form-control" >
                                </div>
                                <div class="col-md-6 pb-2">
                                    <label>Department<span class="required">*</span></label>
                                    <select name="department_id" class="form-control">
                                        <option>Select Department</option>
                                        @for ($i = 0; $i < count($department); $i++) 
                                        <option value="{{$department[$i]->id}}" {{$scenario->department_id == $department[$i]->id ? "selected" : ""}}>{{ucwords($department[$i]->name)}}</option>
                                         @endfor
                                        
                                    </select>
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