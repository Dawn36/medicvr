@extends('layouts.main')

@section('content')
<div class="page-wrapper">
    <!-- Container fluid  -->
    <div class="container-fluid">
        <div class="row">
            <div class="tab-pane fade Student-card active show" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="d-flex align-items-center justify-content-between py-4 nav-tab-heading">
                    <h4 class="heading mb-0">{{__('gobal.Edit Student')}}</h4>
                </div>
                <div class="gernal-info bg-white">
                    <div class="block">
                        <p class="mb-3">{{__('gobal.please_enter')}}</p>
                        <form method="POST" action="{{ route('user.update',$student->id) }}" >
                            @method("PUT")
                            @csrf
                            <input hidden name='role_id' value="student"/>
                            <div class="row pb-2">
                                <div class="col-md-6 pb-2">
                                    <label>{{__('gobal.first_name')}}<span class="required">*</span></label>
                                    <input type="text" name="first_name" value="{{$student->first_name}}" placeholder="{{__('gobal.first_name_placeholder')}}" class="form-control" required>
                                </div>
                                <div class="col-md-6 pb-2">
                                    <label>{{__('gobal.last_name')}}<span class="required">*</span></label>
                                    <input type="text" name="last_name"  value="{{$student->last_name}}" placeholder="{{__('gobal.last_name_placeholder')}}" class="form-control" required>
                                </div>
                                <div class="col-md-6 pb-2">
                                    <label>{{__('gobal.phone')}}<span class="required">*</span></label>
                                    <input type="tel" name="phone_number" value="{{$student->phone_number}}" placeholder="{{__('gobal.phone_placeholder')}}" class="form-control" required>
                                </div>
                                <div class="col-md-6 pb-2">
                                    <label>{{__('gobal.email')}}<span class="required">*</span></label>
                                    <input type="email" name="email" value="{{$student->email}}" placeholder="{{__('gobal.email_placeholder')}}" class="form-control" required>
                                </div>
                                <div class="col-md-6 pb-2">
                                    <label>{{__('gobal.unique_id')}}<span class="required">*</span></label>
                                    <input type="number" name="unique_id" value="{{$student->unique_id}}" placeholder="{{__('gobal.unique_id_placeholder')}}" class="form-control" required>
                                </div>
                                <div class="col-md-6 pb-2">
                                    <label>{{__('gobal.Teacher')}}<span class="required">*</span></label>
                                    <select name="parent_id" class="form-control" required>
                                        @for ($i = 0; $i < count($teacher); $i++)
                                        <option value="{{$teacher[$i]->id}}" {{$student->parent_id == $teacher[$i]->id ? "selected" : "" }} >{{ucwords($teacher[$i]->first_name)}} {{ucwords($teacher[$i]->last_name)}}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-6 pb-2">
                                    <label>{{__('gobal.password')}}<span class="required">*</span></label>
                                    <input type="password" name="password" placeholder="{{__('gobal.password_placeholder')}}" class="form-control" >
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