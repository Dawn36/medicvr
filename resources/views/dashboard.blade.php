@extends('layouts.main')

@section('content')

<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- Container fluid  -->
    <div class="container-fluid">
    <h3 class="fw-bolder fs-8 text-center mb-4">Super Admin's Dashboard</h3>
        <!-- Four charts -->
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-12">
                <div class="white-box analytics-info">
                    <div class="d-flex">
                        <img src="{{ asset('theme/assets/imges/hospital.svg')}}" class="sidebar-icon custom-widgets-icon" alt="">
                        <p class="box-title mb-0">Total Hospitals</p>
                    </div>
                    <div class="box-data">
                        <p class="bx-value mb-0">23</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12">
                <div class="white-box analytics-info">
                    <div class="d-flex">
                        <img src="{{ asset('theme/assets/imges/sessions.svg')}}" class="sidebar-icon custom-widgets-icon" alt="">
                        <p class="box-title mb-0">Total Sessions Played</p>
                    </div>
                    <div class="box-data">
                        <p class="bx-value mb-0">115</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Recent Comments -->
        <!-- <div class="dropdown">
            <button class="btn year-btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                This Year
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
        </div> -->

        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="mx-auto my-3 fw-bold fs-5 text-center">Average Session Duration (Per Day)</h3>
                        <div id="chart"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="mx-auto my-3 fw-bold fs-5 text-center">Number of Sessions (Per Day)</h3>
                        <div id="chart1"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <h3 class="mx-auto my-5 fw-bolder fs-10 text-center">Hospitals</h3>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-center align-items-center my-3">
                            <img src="{{ asset('theme/assets/imges/hospital3.png')}}" class="img-fluid" width="6%" alt="">
                            <h3 class="mx-1 my-3 fw-bolder fs-7 text-center">Tel Aviv Clinic</h3>
                        </div>
                        <!-- Start: Stats -->
                        <div class="row">
                            <div class="col">
                                <div class="white-box analytics-info">
                                    <div class="d-flex">
                                        <img src="{{ asset('theme/assets/imges/hospital.svg')}}" class="sidebar-icon custom-widgets-icon" alt="">
                                        <p class="box-title mb-0">Sessions Played</p>
                                    </div>
                                    <div class="box-data">
                                        <p class="bx-value mb-0">23</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="white-box analytics-info">
                                    <div class="d-flex">
                                        <img src="{{ asset('theme/assets/imges/hospital.svg')}}" class="sidebar-icon custom-widgets-icon" alt="">
                                        <p class="box-title mb-0">Hours Played</p>
                                    </div>
                                    <div class="box-data">
                                        <p class="bx-value mb-0">3 <small>hrs</small></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="white-box analytics-info">
                                    <div class="d-flex">
                                        <img src="{{ asset('theme/assets/imges/hospital.svg')}}" class="sidebar-icon custom-widgets-icon" alt="">
                                        <p class="box-title mb-0">Number of Admins</p>
                                    </div>
                                    <div class="box-data">
                                        <p class="bx-value mb-0">5</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="white-box analytics-info">
                                    <div class="d-flex">
                                        <img src="{{ asset('theme/assets/imges/hospital.svg')}}" class="sidebar-icon custom-widgets-icon" alt="">
                                        <p class="box-title mb-0">Number of Teachers</p>
                                    </div>
                                    <div class="box-data">
                                        <p class="bx-value mb-0">9</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="white-box analytics-info">
                                    <div class="d-flex">
                                        <img src="{{ asset('theme/assets/imges/hospital.svg')}}" class="sidebar-icon custom-widgets-icon" alt="">
                                        <p class="box-title mb-0">Number of Students</p>
                                    </div>
                                    <div class="box-data">
                                        <p class="bx-value mb-0">33</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End: Stats -->
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-center align-items-center my-3">
                            <img src="{{ asset('theme/assets/imges/hospital1.png')}}" class="img-fluid" width="6%" alt="">
                            <h3 class="mx-1 my-3 fw-bolder fs-7 text-center">St. Joseph's Hospital</h3>
                        </div>
                        <!-- Start: Stats -->
                        <div class="row">
                            <div class="col">
                                <div class="white-box analytics-info">
                                    <div class="d-flex">
                                        <img src="{{ asset('theme/assets/imges/hospital.svg')}}" class="sidebar-icon custom-widgets-icon" alt="">
                                        <p class="box-title mb-0">Sessions Played</p>
                                    </div>
                                    <div class="box-data">
                                        <p class="bx-value mb-0">23</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="white-box analytics-info">
                                    <div class="d-flex">
                                        <img src="{{ asset('theme/assets/imges/hospital.svg')}}" class="sidebar-icon custom-widgets-icon" alt="">
                                        <p class="box-title mb-0">Hours Played</p>
                                    </div>
                                    <div class="box-data">
                                        <p class="bx-value mb-0">3 <small>hrs</small></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="white-box analytics-info">
                                    <div class="d-flex">
                                        <img src="{{ asset('theme/assets/imges/hospital.svg')}}" class="sidebar-icon custom-widgets-icon" alt="">
                                        <p class="box-title mb-0">Number of Admins</p>
                                    </div>
                                    <div class="box-data">
                                        <p class="bx-value mb-0">5</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="white-box analytics-info">
                                    <div class="d-flex">
                                        <img src="{{ asset('theme/assets/imges/hospital.svg')}}" class="sidebar-icon custom-widgets-icon" alt="">
                                        <p class="box-title mb-0">Number of Teachers</p>
                                    </div>
                                    <div class="box-data">
                                        <p class="bx-value mb-0">9</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="white-box analytics-info">
                                    <div class="d-flex">
                                        <img src="{{ asset('theme/assets/imges/hospital.svg')}}" class="sidebar-icon custom-widgets-icon" alt="">
                                        <p class="box-title mb-0">Number of Students</p>
                                    </div>
                                    <div class="box-data">
                                        <p class="bx-value mb-0">33</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End: Stats -->
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="data-table-wrapper">
                    <div class="d-flex align-items-center justify-content-between nav-tab-heading">
                        <h3 class="box-title mb-0">Guided Information</h3>
                        <div class="btn-wrapper d-flex gap-2">
                            <div class="dropdown">
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-save dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-plus pe-1"></i> Add
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                        <a class="dropdown-item" href="add_hospital.php">Hospital</a>
                                        <a class="dropdown-item" href="add_admin.php">Admin</a>
                                        <a class="dropdown-item" href="add_teacher.php">Teacher</a>
                                        <a class="dropdown-item" href="add_student.php">Student</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive" style="padding-top:28px;">
                        <table class="table no-wrap" id="myTable">
                            <thead>
                                <tr style="background: #F9F9FA; border-radius: 6px;">
                                    <th class="border-top-0">ID</th>
                                    <th class="border-top-0">Private Name</th>
                                    <th class="border-top-0">Last Name</th>
                                    <th class="border-top-0">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10.5743 11.5241L9.28866 10.9983C8.70436 11.6996 7.71102 12.1669 6.54217 12.1669C5.37358 12.1669 4.3217 11.6994 3.79568 10.9983L2.51006 11.5241C1.92577 11.7579 1.575 12.4007 1.69198 12.985L2.68532 18.6531C2.8021 19.2374 3.38659 19.705 3.97093 19.705H9.11314C9.69744 19.705 10.2817 19.2374 10.3988 18.6531L11.3921 12.985C11.5093 12.4005 11.1 11.6994 10.5742 11.5241H10.5743Z" fill="#84818A" />
                                            <path d="M8.99656 6.79102C8.99656 6.79102 8.87978 6.44047 8.7043 5.85595C8.35375 4.92089 7.41868 4.27832 6.42534 4.27832C5.54877 4.33681 4.84771 4.80413 4.49694 5.56394C4.49694 5.56394 4.26318 5.91448 4.08791 6.79107C3.91264 7.55067 3.79565 8.60249 3.73737 9.30376C3.73737 9.53753 3.91264 9.7128 4.1464 9.7128H9.05482C9.28858 9.7128 9.46385 9.53752 9.46385 9.30376C9.34707 8.54416 9.23008 7.49234 8.99653 6.79107L8.99656 6.79102Z" fill="#84818A" />
                                            <path d="M21.56 11.5242L18.9888 10.4724L17.528 15.3226L16.0671 10.4724L13.4959 11.5242C12.9116 11.758 12.5608 12.4008 12.6778 12.9851L13.6712 18.6533C13.7879 19.2376 14.3724 19.7051 14.9568 19.7051H20.099C20.6833 19.7051 21.2676 19.2376 21.3846 18.6533L22.3779 12.9851C22.4951 12.4006 22.1446 11.6995 21.5601 11.5242H21.56Z" fill="#84818A" />
                                            <path d="M20.216 6.96632C20.216 8.45103 19.0126 9.65448 17.528 9.65448C16.0435 9.65448 14.84 8.45103 14.84 6.96632C14.84 5.48182 16.0435 4.27832 17.528 4.27832C19.0126 4.27832 20.216 5.48176 20.216 6.96632Z" fill="#84818A" />
                                        </svg>
                                    </th>
                                    <th class="border-top-0">Phone</th>
                                    <th class="border-top-0">Email</th>
                                    <th class="border-top-0">City</th>
                                    <th class="border-top-0">Grade</th>
                                    <th class="border-top-0">Best Grade</th>
                                    <th class="border-top-0">Role</th>
                                    <th class="border-top-0">Year of Study</th>
                                    <th class="border-top-0">Specializition</th>
                                    <th class="border-top-0">Interence Date</th>
                                    <th class="border-top-0">Last-interence Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>03-445</td>
                                    <td class="txt-oflo">Kristin</td>
                                    <td>Stewart</td>
                                    <td class="txt-oflo"><img src="{{ asset('theme/assets/imges/Gendar.png')}}" alt=""></td>
                                    <td>(907) 555-0101</td>
                                    <td>oevans@icloud.com</td>
                                    <td>Tel Aviv</td>
                                    <td class="tr-grade">
                                        <p class="position-relative">
                                            <span>4.3</span>
                                        </p>
                                        <p class="position-relative">
                                            <span>4.3</span>
                                        </p>
                                        <p class="position-relative">
                                            <span>4.2</span>
                                        </p>
                                    </td>
                                    <td class="text-center">4.9</td>
                                    <td>Student</td>
                                    <td>5</td>
                                    <td>Emergency</td>
                                    <td>01 Nov 2022</td>
                                    <td>12 Nov 2022</td>
                                </tr>
                                <tr style="background: #F9F9FA;">
                                    <td>03-445</td>
                                    <td class="txt-oflo">Kristin</td>
                                    <td>Lane</td>
                                    <td class="txt-oflo"><img src="{{ asset('theme/assets/imges/Gendar.png')}}" alt=""></td>
                                    <td>(907) 555-0101</td>
                                    <td>oevans@icloud.com</td>
                                    <td>Tel Aviv</td>
                                    <td class="tr-grade">
                                        <p class="position-relative">
                                            <span>4.3</span>
                                        </p>
                                        <p class="position-relative">
                                            <span>4.3</span>
                                        </p>
                                        <p class="position-relative">
                                            <span>4.2</span>
                                        </p>
                                    </td>
                                    <td class="text-center">4.9</td>
                                    <td>Student</td>
                                    <td>3</td>
                                    <td>Nursing</td>
                                    <td>01 Nov 2022</td>
                                    <td>12 Nov 2022</td>
                                </tr>
                                <tr>
                                    <td>03-445</td>
                                    <td class="txt-oflo">Kristin</td>
                                    <td>Lane</td>
                                    <td class="txt-oflo"><img src="{{ asset('theme/assets/imges/Gendar.png')}}" alt=""></td>
                                    <td>(907) 555-0101</td>
                                    <td>oevans@icloud.com</td>
                                    <td>Tel Aviv</td>
                                    <td class="tr-grade">
                                        <p class="position-relative">
                                            <span>4.3</span>
                                        </p>
                                        <p class="position-relative">
                                            <span>4.3</span>
                                        </p>
                                        <p class="position-relative">
                                            <span>4.2</span>
                                        </p>
                                    </td>
                                    <td class="text-center">4.9</td>
                                    <td>Student</td>
                                    <td>2</td>
                                    <td>Cardio</td>
                                    <td>01 Nov 2022</td>
                                    <td>12 Nov 2022</td>
                                </tr>
                                <tr style="background: #F9F9FA;">
                                    <td>03-445</td>
                                    <td class="txt-oflo">Kristin</td>
                                    <td>Lane</td>
                                    <td class="txt-oflo"><img src="{{ asset('theme/assets/imges/Gendar.png')}}" alt=""></td>
                                    <td>(907) 555-0101</td>
                                    <td>oevans@icloud.com</td>
                                    <td>Tel Aviv</td>
                                    <td class="tr-grade">
                                        <p class="position-relative">
                                            <span>4.3</span>
                                        </p>
                                        <p class="position-relative">
                                            <span>4.3</span>
                                        </p>
                                        <p class="position-relative">
                                            <span>4.2</span>
                                        </p>
                                    </td>
                                    <td class="text-center">4.9</td>
                                    <td>Student</td>
                                    <td>1</td>
                                    <td>Heart</td>
                                    <td>01 Nov 2022</td>
                                    <td>12 Nov 2022</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->

@endsection('content')