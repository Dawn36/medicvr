<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <a class="navbar-brand" href="{{route('dashboard')}}">
            <!-- Logo text -->
            <span class="logo-text">
                <!-- dark Logo text -->
                @if(!Auth::user()->hasRole('superadmin'))
                <img src="{{ asset($hospitalSession->hospital_hi_rest_logo)}}" class="lg-logo" alt="homepage" />
                <img src="{{ asset($hospitalSession->hospital_hi_rest_logo)}}" class="sm-logo" alt="">
                @else
                <img src="{{ asset('theme/assets/imges/dashboard-logo.png')}}" class="lg-logo" alt="homepage" />
                <img src="{{ asset('theme/assets/imges/sm-logo.jpeg')}}" class="sm-logo" alt="">
                @endif
            </span>
        </a>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('dashboard')}}" aria-expanded="false">
                        <img src="{{ asset('theme/assets/imges/dashboard-icon.svg')}}" class="sidebar-icon" alt="">
                        <span class="hide-menu">{{__('sidebar.dashboard')}}</span>
                    </a>
                    <div class="ative-tab"></div>
                </li>
                @if(Auth::user()->hasRole('superadmin'))
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link  {{ Route::currentRouteName() == 'hospitals.create' || Route::currentRouteName() == 'hospitals.edit' || Route::currentRouteName() == 'hospitals.index' || Route::currentRouteName() == 'hospitals.show'  ? 'active' : '' }} " 
                    href="{{route('hospitals.index')}}" aria-expanded="false">
                        <img src="{{ asset('theme/assets/imges/hospital.svg')}}" class="sidebar-icon" alt="">
                        <span class="hide-menu">{{__('sidebar.hospitals')}}</span>
                    </a>
                    <div class="ative-tab"></div>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ Route::currentRouteName() == 'admin' || Route::currentRouteName() == 'admin_show' || Route::currentRouteName() == 'admin_edit' || Route::currentRouteName() == 'admin_create'  ? 'active' : '' }} " 
                    href="{{route('admin','admin')}}" aria-expanded="false">
                        <img src="{{ asset('theme/assets/imges/admin.svg')}}" class="sidebar-icon" alt="">
                        <span class="hide-menu">{{__('sidebar.admin')}}</span>
                    </a>
                    <div class="ative-tab"></div>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ Route::currentRouteName() == 'teacher' || Route::currentRouteName() == 'teacher_show' || Route::currentRouteName() == 'teacher_edit' || Route::currentRouteName() == 'teacher_create'  ? 'active' : '' }} " 
                    href="{{route('teacher','teacher')}}" aria-expanded="false">
                        <img src="{{ asset('theme/assets/imges/teacher.svg')}}" class="sidebar-icon" alt="">
                        <span class="hide-menu">{{__('sidebar.teacher')}}</span>
                    </a>
                    <div class="ative-tab"></div>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ Route::currentRouteName() == 'student' || Route::currentRouteName() == 'student_show' || Route::currentRouteName() == 'student_edit' || Route::currentRouteName() == 'student_create'  ? 'active' : '' }} " 
                    href="{{route('student','student')}}" aria-expanded="false">
                        <img src="{{ asset('theme/assets/imges/student.svg')}}" class="sidebar-icon" alt="">
                        <span class="hide-menu">{{__('sidebar.student')}}</span>
                    </a>
                    <div class="ative-tab"></div>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ Route::currentRouteName() == 'superadmin' || Route::currentRouteName() == 'superadmin_show' || Route::currentRouteName() == 'superadmin_edit' || Route::currentRouteName() == 'superadmin_create'  ? 'active' : '' }} " 
                    href="{{route('superadmin','superadmin')}}" aria-expanded="false">
                        <img src="{{ asset('theme/assets/imges/super_admin.svg')}}" class="sidebar-icon" alt="">
                        <span class="hide-menu">{{__('sidebar.superadmin')}}</span>
                    </a>
                    <div class="ative-tab"></div>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('department.index')}}" aria-expanded="false">
                        <img src="{{ asset('theme/assets/imges/department.svg')}}" class="sidebar-icon" alt="">
                        <span class="hide-menu">{{__('sidebar.department')}}</span>
                    </a>
                    <div class="ative-tab"></div>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('scenario.index')}}" aria-expanded="false">
                        <img src="{{ asset('theme/assets/imges/scene.svg')}}" class="sidebar-icon" alt="">
                        <span class="hide-menu">{{__('sidebar.scenarios')}}</span>
                    </a>
                    <div class="ative-tab"></div>
                </li>
                @elseif(Auth::user()->hasRole('admin'))
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ Route::currentRouteName() == 'teacher' || Route::currentRouteName() == 'teacher_show' || Route::currentRouteName() == 'teacher_edit' || Route::currentRouteName() == 'teacher_create'  ? 'active' : '' }} " 
                    href="{{route('teacher','teacher')}}" aria-expanded="false">
                        <img src="{{ asset('theme/assets/imges/teacher.svg')}}" class="sidebar-icon" alt="">
                        <span class="hide-menu">{{__('sidebar.teacher')}}</span>
                    </a>
                    <div class="ative-tab"></div>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ Route::currentRouteName() == 'student' || Route::currentRouteName() == 'student_show' || Route::currentRouteName() == 'student_edit' || Route::currentRouteName() == 'student_create'  ? 'active' : '' }} " 
                    href="{{route('student','student')}}" aria-expanded="false">
                        <img src="{{ asset('theme/assets/imges/student.svg')}}" class="sidebar-icon" alt="">
                        <span class="hide-menu">{{__('sidebar.student')}}</span>
                    </a>
                    <div class="ative-tab"></div>
                </li>
                @elseif(Auth::user()->hasRole('teacher'))
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ Route::currentRouteName() == 'student' || Route::currentRouteName() == 'student_show' || Route::currentRouteName() == 'student_edit' || Route::currentRouteName() == 'student_create'  ? 'active' : '' }} " 
                    href="{{route('student','student')}}" aria-expanded="false">
                        <img src="{{ asset('theme/assets/imges/student.svg')}}" class="sidebar-icon" alt="">
                        <span class="hide-menu">{{__('sidebar.student')}}</span>
                    </a>
                    <div class="ative-tab"></div>
                </li>
                @elseif(Auth::user()->hasRole('student'))
                <form id='student{{Auth::user()->id}}'  method="POST" action="{{ route('student_show') }}">
                    @csrf
                    <input hidden name="role_id" value="student"/>
                    <input hidden name="user_id" value="{{Auth::user()->id}}"/>
                    <li class="sidebar-item">
                       
                        <a class="sidebar-link waves-effect waves-dark sidebar-link {{ Route::currentRouteName() == 'student' || Route::currentRouteName() == 'student_show' || Route::currentRouteName() == 'student_edit' || Route::currentRouteName() == 'student_create'  ? 'active' : '' }} " 
                    href="{{ route('student_show') }}" type="submit" onclick="event.preventDefault(); document.getElementById('student{{Auth::user()->id}}').submit();" aria-expanded="false">
                        <img src="{{ asset('theme/assets/imges/student.svg')}}" class="sidebar-icon" alt="">
                        <span class="hide-menu">{{__('sidebar.student')}}</span>
                    </a>
                    <div class="ative-tab"></div>
                </li>
             </form>
                @endif
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('settings.create') }}" aria-expanded="false">
                        <img src="{{ asset('theme/assets/imges/Group.svg')}}" class="sidebar-icon" alt="">
                        <span class="hide-menu">{{__('sidebar.setting')}}</span>
                    </a>
                    <div class="ative-tab"></div>
                </li>
                <li class="sidebar-item logout-item">
                    <form action="{{ route('logout') }}" id='logout-form' method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="{{ route('logout') }}" class="sidebar-link waves-effect waves-dark sidebar-link"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <img src="{{ asset('theme/assets/imges/Login.svg')}}" alt="">
                        
                        <span class="hide-menu">{{__('sidebar.logout')}}</span>
                    </a>
               
                </li>
            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>