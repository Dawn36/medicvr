<!DOCTYPE html>
@php
 $locale=Session::get('locale');
 $ltrRtl=$locale=='en' ? 'ltr' : 'rtl'
@endphp
<html dir="{{$ltrRtl}}" lang="en">
    @php 
     $primaryColor="";
     $secondaryColor="";
     if(!Auth::user()->hasRole('superadmin') )
        {
        $hospitalSession= Session::get('hospital');
        $primaryColor = $hospitalSession->primary_color;
        $secondaryColor = $hospitalSession->secondary_color;
        }
    @endphp
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="robots" content="noindex,nofollow">
    <title>{{__('header.title')}}</title>
    <!-- Favicon icon -->
    @if(!Auth::user()->hasRole('superadmin'))
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset($hospitalSession->hospital_small_logo)}}">
    @else
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('theme/assets/imges/sm-logo.jpeg')}}">
    @endif
    <!-- Custom CSS -->
    <link href="plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <!-- Custom CSS -->
    <link href="{{ asset('theme/assets/css/style.min.css')}}" rel="stylesheet">
    <!-- Datatable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <!-- ApexCharts -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="{{ asset('theme/assets/plugins/bower_components/jquery/dist/jquery.min.js')}}"></script>
</head>


<style>
    /* Secondary Color */

    .page-link {
        color: {{$secondaryColor}};
    }

    .page-link:hover {
        color: {{$secondaryColor}};
    }

    .page-link:focus {
        color: {{$secondaryColor}};
    }

    .page-item.active .page-link {
        background-color: {{$secondaryColor}};
        border-color: {{$secondaryColor}};
    }

    .text-theme {
        color: {{$secondaryColor}} !important
    }

    .forms-tabs .nav-link.active {
        background-color: {{$secondaryColor}};
    }

    .btn-save {
        background-color: {{$secondaryColor}};
    }

    .btn.btn-light-success {
        color: {{$secondaryColor}};
        background-color: {{$secondaryColor}}1c;
    }

    .btn.btn-light-success:hover:not(.btn-text):not(:disabled):not(.disabled),
    .btn.btn-light-success:focus:not(.btn-text),
    .btn.btn-light-success.focus:not(.btn-text) {
        background-color: {{$secondaryColor}};
    }

    /* Primary Color */

    .gernal-info input:focus {
        border-color: {{$primaryColor}};
        outline: 1px solid {{$primaryColor}};
    }

    .navbar-brand {
        background-color: {{$primaryColor}};
    }

    #main-wrapper[data-layout=horizontal] .left-sidebar[data-sidebarbg=skin6],
    #main-wrapper[data-layout=vertical] .left-sidebar[data-sidebarbg=skin6] {
        background: {{$primaryColor}};
    }

    #main-wrapper[data-layout=horizontal] .left-sidebar[data-sidebarbg=skin6] .sidebar-nav ul,
    #main-wrapper[data-layout=vertical] .left-sidebar[data-sidebarbg=skin6] .sidebar-nav ul {
        background: {{$primaryColor}};
    }
    
    .custom-widgets-icon {
        background-color: {{$primaryColor}};
    }
        
    .dropdown-item.active, .dropdown-item:active {
    color: #fff;
    text-decoration: none;
    background-color: {{$primaryColor}} ;
}
</style>

<body>
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- Main wrapper - style you can find in pages.scss -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- Topbar header - style you can find in pages.scss -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">

                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <div class="navbar-header" data-logobg="skin6">
                        <!-- toggle and nav items -->
                        <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav d-flex align-items-center">
                        <div class="dropdown dashboard">
                            <h4 class="dropdown-toggle d-heading fw-bold" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Route::currentRouteName() == 'hospitals.create' || Route::currentRouteName() == 'hospitals.edit' || Route::currentRouteName() == 'hospitals.index' || Route::currentRouteName() == 'hospitals.show'  ? __('header.hospitals') : '' }} 
                                {{ Route::currentRouteName() == 'admin' || Route::currentRouteName() == 'admin_show' || Route::currentRouteName() == 'admin_edit' || Route::currentRouteName() == 'admin_create'  ? __('header.admin') : '' }} 
                                {{ Route::currentRouteName() == 'teacher' || Route::currentRouteName() == 'teacher_show' || Route::currentRouteName() == 'teacher_edit' || Route::currentRouteName() == 'teacher_create'  ? __('header.teacher') : '' }} 
                                {{ Route::currentRouteName() == 'student' || Route::currentRouteName() == 'student_show' || Route::currentRouteName() == 'student_edit' || Route::currentRouteName() == 'student_create'  ? __('header.student') : '' }} 
                                {{ Route::currentRouteName() == 'superadmin' || Route::currentRouteName() == 'superadmin_show' || Route::currentRouteName() == 'superadmin_edit' || Route::currentRouteName() == 'superadmin_create'  ? __('header.superadmin') : '' }} 
                                {{ Route::currentRouteName() == 'department.index' || Route::currentRouteName() == 'department.show' || Route::currentRouteName() == 'department.edit' || Route::currentRouteName() == 'department.create'  ? __('header.department') : '' }} 
                                {{ Route::currentRouteName() == 'scenario.index' || Route::currentRouteName() == 'scenario.show' || Route::currentRouteName() == 'scenario.edit' || Route::currentRouteName() == 'scenario.create'  ? __('header.scenario') : '' }} 
                                {{ Route::currentRouteName() == 'settings.create' ? __('header.settings') : '' }} 
                                {{ Route::currentRouteName() == 'student_session_details' ?  __('header.Session Details') : '' }} 
                                {{ Route::currentRouteName() == 'dashboard' ? __('header.Dashboard') : '' }} 
                              
                            </h4>
                           
                        </div>
                        <div class="search-bar">
                            <input class="form-control" type="search" placeholder="{{__('header.searchplaceholder')}}" aria-label="Search">
                            <svg class="search-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.5 21C16.7467 21 21 16.7467 21 11.5C21 6.25329 16.7467 2 11.5 2C6.25329 2 2 6.25329 2 11.5C2 16.7467 6.25329 21 11.5 21Z" stroke="#D2D2D2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M23 22L19 18" stroke="#D2D2D2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="left-content">
                            <div class="language">
                                
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle d-flex gap-3" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <figure class="mb-0 flag-wrapper">
                                            @if(Auth::user()->localization == 'en')
                                            <img src="{{ asset('theme/assets/imges/english-fag.svg')}}" class="mb-0" alt="">
                                            @else
                                            <img src="{{ asset('theme/assets/imges/hebro.svg')}}" class="mb-0" alt="">
                                            @endif
                                        </figure>
                                        <figure class="mb-0 ">
                                            <img src="{{ asset('theme/assets/imges/arrow-down-3-lang.svg')}}" class="mb-0" alt="">
                                        </figure>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li>
                                            <a class="dropdown-item" href="{{route('update_lang')}}"><img src="{{ asset('theme/assets/imges/english-fag.svg')}}" class="mb-0" alt="">English</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{route('update_lang')}}"><img src="{{ asset('theme/assets/imges/hebro.svg')}}" class="mb-0" alt="">Hebrew</a>
                                        </li>
                                        
                                    </ul>
                                </div>

                            </div>
                            
                            <div class="profile-dropdown dropdown">
                                <img src="{{ asset('/profile/' . Auth::user()->profile_picture) }}" alt="user-img" class="img-circle">
                                <div class="name ms-2">
                                    <p class="mb-0">{{ ucwords(Auth::user()->first_name) }} {{ucwords(Auth::user()->last_name)}}</p>
                                    <small>{{ __('header.'.Auth::user()->roles->first()->display_name) }}</small>
                                </div>
                                <div class="dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.29101 1.70743C9.92141 1.07759 9.47534 0 8.58422 0H1.41265C0.521961 0 0.0756964 1.07669 0.705224 1.70679L4.28778 5.29257C4.67813 5.68327 5.31129 5.68356 5.70199 5.29321L9.29101 1.70743Z" fill="#8F92A1" fill-opacity="0.4" />
                                    </svg>
                                </div>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="{{ route('settings.create') }}">{{__('header.settings')}}</a></li>
                                    <form action="{{ route('logout') }}" id='logout-form' method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                   
                                    <li> <a href="{{ route('logout') }}" class="dropdown-item"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{__('header.logout')}}
                                        </a></li>
                                </ul>
                            </div>
                        </div>
                    </ul>
                </div>
            </nav>
        </header>
       
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="modalbody">
                      ...
                    </div>
                    
                  </div>
                </div>
              </div>
        @include('layouts.partials.sidebar')