@extends('layouts.main')

@section('content')
<div class="page-wrapper">
    <!-- Container fluid  -->
    <div class="container-fluid">
        <div class="row">
            <div class="tab-pane fade Student-card active show" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="d-flex align-items-center justify-content-between py-4 nav-tab-heading">
                    <h4 class="heading mb-0">{{__('gobal.Add Department')}}</h4>
                </div>
                <div class="gernal-info bg-white">
                    <div class="block">
                        <p class="mb-3">{{__('gobal.please_enter')}}</p>
                        <form  method="POST" action="{{ route('department.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row pb-2">
                                <div class="col-md-6 pb-2">
                                    <label>{{__('gobal.Department Name')}}<span class="required">*</span></label>
                                    <input type="text" name="department_name" placeholder="{{__('gobal.Please Enter the name of the department')}}" class="form-control" required>
                                </div>
                                <div class="col-md-6 pb-2">
                                    <label>{{__('gobal.Department logo')}}<span class="required">*</span></label>
                                    <input type="file" name="department_logo" class="form-control" required>
                                </div>
                                
                                <div class="btn-wrapper d-flex gap-2 mt-4">
                                    <button type="submit" class="btn btn-save d-flex align-items-center gap-2"><i class="fas fa-check fs-4"></i>{{__('gobal.save')}}</button>
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