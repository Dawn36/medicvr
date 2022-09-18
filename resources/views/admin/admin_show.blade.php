@extends('layouts.main')

@section('content')

<div class="page-wrapper">
    <!-- Container fluid  -->
    <div class="container-fluid">
        <div class="row">
            <div class="tab-pane fade Student-card active show" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="d-flex align-items-center justify-content-between py-4 nav-tab-heading">
                    <h4 class="heading mb-0">{{__('gobal.admin_details')}}</h4>
                    <div class="btn-wrapper d-flex gap-2">
                        <a href="{{route('admin_edit',['status'=>'admin','userId'=>$admin->id])}}" class="btn btn-print bg-white d-flex align-items-center gap-2"><i class="fas fa-pen"></i> {{__('gobal.edit')}}</a>
                        {{-- <form style="display: inline-block" id='delete_admin' method="POST" action="{{ route('user.destroy', $admin->id) }}">
                            @method('DELETE')
                            @csrf
                            <a href="{{ route('user.destroy', $admin->id) }}" onclick="event.preventDefault(); document.getElementById('delete_admin').submit();" class="btn btn-save d-flex align-items-center gap-2"><i class="fas fa-trash"></i> Delete Admin</a>
                        </form> --}}
                    </div>
                </div>
                <div class="gernal-info bg-white">
                    <div class="block">
                        <form action="">
                            <div class="row pb-2">
                                <div class="col-md-6 pb-2">
                                    <label class="fw-bold">{{__('gobal.first_name')}}<span class="required">*</span></label>
                                    <p class="text-dark">{{ucwords($admin->first_name)}}</p>
                                </div>
                                <div class="col-md-6 pb-2">
                                    <label class="fw-bold">{{__('gobal.last_name')}}<span class="required">*</span></label>
                                    <p class="text-dark">{{ucwords($admin->last_name)}}</p>
                                </div>
                                <div class="col-md-6 pb-2">
                                    <label class="fw-bold">{{__('gobal.hospital_name')}}</label>
                                    <p class="text-dark">{{ucwords($admin->hospitals->hospital_name)}}</p>
                                </div>
                                <div class="col-md-6 pb-2">
                                    <label class="fw-bold">{{__('gobal.phone')}}</label>
                                    <p class="text-dark">{{$admin->phone_number}}</p>
                                </div>
                                <div class="col-md-6 pb-2">
                                    <label class="fw-bold">{{__('gobal.email')}}</label>
                                    <p class="text-dark">{{$admin->last_name}}</p>
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