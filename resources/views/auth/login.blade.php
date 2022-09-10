<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description" content="Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>{{__('login.title')}}</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('theme/assets/plugins/images/favicon.png')}}">
    <!-- Custom CSS -->
    <link href="{{ asset('theme/assets/plugins/bower_components/chartist/dist/chartist.min.css')}}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <!-- boxicone -->
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('theme/assets/css/style.min.css')}}" rel="stylesheet">
</head>

<body>
  <!-- Session Status -->
  <x-auth-session-status class="mb-4" :status="session('status')" />

  <!-- Validation Errors -->
  <x-auth-validation-errors class="mb-4" :errors="$errors" />
    <div class="sign-in-page">
        <div class="sign-in-page_wrapper">
            <div class="sign-in-page_left">
                <figure class="signin-img-wrapper">
                    <img src="{{ asset('theme/assets/imges/login-grad.jpg')}}" class="signin-img" alt="">
                    <img src="{{ asset('theme/assets/imges/login-logo.svg')}}" class="s-logo" alt="">
                </figure>
            </div>
            <div class="sign-in-page_right">
                <div class="sign-in-form">
                    <h1>{{__('login.welcome')}}</h1>
                    <p>{{__('login.welcome')}} {{__('login.welcomeenteryourdetails')}} </p>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">{{__('login.email')}}</label>
                            <input type="email" class="form-control" name='email' id="email" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">{{__('login.password')}}</label>
                            <div class="position-relative">
                                <input type="password" name='password' class="form-control" id="password" placeholder="***">
                                <img src="{{ asset('theme/assets/imges/password-eye.svg')}}" class="p-eye" alt="">
                            </div>
                        </div>
                        {{-- <div class="forgot-password-wrapper">
                            <div class="form-check d-flex align-items-center gap-2">
                                <input class="form-check-input" type="checkbox" value="" id="check-pass">
                                <label class="form-check-label mb-0 mt-1" for="check-pass">Remember me</label>
                            </div>
                            <a href="" class="forgot">Forgot Password?</a>
                        </div> --}}
                        <button class="btn btn-sign-up">{{__('login.login')}}</button>
                        {{-- <p class="text-center mt-3 note">
                            Don't have an account?<a href="./sign-up.php" class="text-black fw-bold" style="text-decoration:underline; color: black;">Sign up for free</a>
                        </p> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('theme/assets/plugins/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('theme/assets/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('theme/assets/js/app-style-switcher.js')}}"></script>
    <script src="{{ asset('theme/assets/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('theme/assets/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('theme/assets/js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('theme/assets/js/custom.js')}}"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="{{ asset('theme/assets/plugins/bower_components/chartist/dist/chartist.min.js')}}"></script>
    <script src="{{ asset('theme/assets/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js')}}"></script>
    <script src="{{ asset('theme/assets/js/pages/dashboards/dashboard1.js')}}"></script>
</body>

</html>