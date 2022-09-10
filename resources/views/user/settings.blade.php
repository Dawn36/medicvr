@extends('layouts.main')

@section('content')
<div class="page-wrapper">
    <!-- Start::Container fluid  -->
    <div class="container-fluid">
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="d-flex align-items-center justify-content-between py-4 nav-tab-heading">
                    <h4 class="heading fw-bold fs-7 mb-0">{{__('setting.settings')}}</h4>
                </div>
                <div class="gernal-info">
                    <div class="block studies mb-3 bg-white">
                        <div class="d-flex justify-content-between">
                            <h3 class="heading">{{__('setting.gernalinformation')}}</h3>
                        </div>
                        <p class="mb-3">{{__('setting.updateyourinfo')}}</p>
                        <form class="form" method="POST" action="{{ route('settings.update', $user->id) }}" enctype="multipart/form-data">
                            <!--begin::Scroll-->
                            @method("PUT")
                            @csrf
                            <div class="row pb-2">
                                <div class="col-md-6 pb-2">
                                    <label for="">{{__('setting.photo')}}<span class="required"></span></label>
                                    <img src="{{ asset('/profile/' . $user->profile_picture) }}" alt="user-img" class="img-circle img-fluid w-25 ms-3 mb-3">
                                    <input type="file" name="profile_picture" class="form-control">
                                </div>
                            </div>
                            <div class="row pb-2">
                                <div class="col-md-6 pb-2">
                                    <label for="">{{__('setting.firstname')}}<span class="required">*</span></label>
                                    <input type="text" name='first_name' value="{{$user->first_name}}" class="form-control" required>
                                </div>
                                <div class="col-md-6 pb-2">
                                    <label for="">{{__('setting.lastname')}}<span class="required">*</span></label>
                                    <input type="text" name='last_name' value="{{$user->last_name}}" class="form-control" required>
                                </div>
                                <div class="col-md-6 pb-2">
                                    <label for="">{{__('setting.phone')}}<span class="required">*</span></label>
                                    <input type="tel" name="phone_number" value="{{$user->phone_number}}" class="form-control" required>
                                </div>
                                <div class="col-md-6 pb-2">
                                    <label for="">{{__('setting.email')}}<span class="required">*</span></label>
                                    <input type="email" name="email" value="{{$user->email}}" class="form-control" required>
                                </div>
                                <div class="col-md-6 pb-4">
                                    <label for="">{{__('setting.address')}}</label>
                                    <input type="text" name="address" value="{{$user->address}}" class="form-control" placeholder="{{__('setting.address')}}" >
                                </div>
                                <div class="col-md-6 pb-4">
                                    <label for="">{{__('setting.city')}}</label>
                                    <input type="text" name="city" value="{{$user->city}}" class="form-control" placeholder="{{__('setting.city')}}" >
                                </div>
                                <div class="btn-wrapper d-flex gap-2 mt-4">
                                    <button type="submit" class="btn btn-save d-flex align-items-center gap-2"><i class="fas fa-check fs-4"></i>{{__('setting.update')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="block studies mb-3 bg-white">
                        <div class="d-flex justify-content-between">
                            <h3 class="heading">{{__('setting.changepassword')}}</h3>
                        </div>
                        <p class="mb-3">{{__('setting.updateyourpassword')}}</p>
                        <form method="POST" action="{{ route('updatePassword', ['id' => $user->id]) }}">
                            @csrf
                            <div class="row pb-2">
                                <div class="col-md-6 pb-2">
                                    <label for="">{{__('setting.currentpassword')}}<span class="required">*</span></label>
                                    <input type="password" name="old_password" class="form-control" required>
                                </div>
                            </div>
                            <div class="row pb-2">
                                <div class="col-md-6 pb-2">
                                    <label for="">{{__('setting.newpassword')}}<span class="required">*</span></label>
                                    <input type="password"  name="password" class="form-control" required>
                                </div>
                                <div class="col-md-6 pb-2">
                                    <label for="">{{__('setting.confirmpassword')}}<span class="required">*</span></label>
                                    <input type="password" name="password_confirmation" class="form-control" required>
                                </div>
                                <div class="btn-wrapper d-flex gap-2 mt-4">
                                    <button type="submit" class="btn btn-save d-flex align-items-center gap-2"><i class="fas fa-check fs-4"></i>{{__('setting.updatepassword')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End::Container fluid  -->
</div>
<script>

    
</script>




@endsection('content')