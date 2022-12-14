@extends('layouts.main')

@section('content')
<div class="page-wrapper">
    <!-- Container fluid  -->
    <div class="container-fluid">
        <div class="row">
            <div class="tab-pane fade Student-card active show" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="d-flex align-items-center justify-content-between py-4 nav-tab-heading">
                    <h4 class="heading mb-0">{{__('gobal.Add Scenario')}}</h4>
                </div>
                <div class="gernal-info bg-white">
                    <div class="block">
                        <p class="mb-3">{{__('gobal.please_enter')}}</p>
                        <form  method="POST" action="{{ route('scenario.store') }}" enctype="multipart/form-data" >
                            @csrf
                            <div class="row pb-2">
                                <div class="col-md-6 pb-2">
                                    <label>{{__('gobal.Scenario Name')}}<span class="required">*</span></label>
                                    <input type="text" name="scenario_name" placeholder="{{__('gobal.Enter Scenario Name')}}" class="form-control" required>
                                </div>
                                <div class="col-md-6 pb-2">
                                    <label>{{__('gobal.Scenario id')}}<span class="required">*</span></label>
                                    <input type="text" name="id" placeholder="{{__('gobal.Enter Scenario id')}}" class="form-control" required>
                                    @if($errors->has('id'))
                                    <div class="error" style="color: red"><b>{{ $errors->first('id') }}</b></div>
                                    @endif
                                </div>
                                <div class="col-md-6 pb-2">
                                    <label>{{__('gobal.Scenario logo')}}<span class="required">*</span></label>
                                    <input type="file" accept=".png,.jpg" name="scenario_logo" class="form-control" required>
                                </div>
                                <div class="col-md-6 pb-2">
                                    <label>{{__('gobal.Department')}}<span class="required">*</span></label>
                                    <select name="department_id" class="form-control">
                                        <option>{{__('gobal.Select Department')}}</option>
                                        @for ($i = 0; $i < count($department); $i++) 
                                        <option value="{{$department[$i]->id}}">{{ucwords($department[$i]->name)}}</option>
                                         @endfor
                                        
                                    </select>
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