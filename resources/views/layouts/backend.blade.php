<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Victory Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('backend_asset') }}/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ asset('backend_asset') }}/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="{{ asset('backend_asset') }}/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{ asset('backend_asset') }}/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('backend_asset') }}/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="{{ asset('backend_asset') }}/vendors/jquery-bar-rating/fontawesome-stars.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('backend_asset') }}/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('backend_asset') }}/images/favicon.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center"><h1>Ahsan</h1></div>
            <div class="navbar-menu-wrapper d-flex align-items-center">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>
                <ul class="navbar-nav">
                    @yield('journal')
                    @yield('user')
                </ul>
                <ul class="navbar-nav navbar-nav-right">
                    <li>
                        <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
                            <button type="submit" class="btn btn-danger"> Logout</button>
                        </form>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#"
                            data-toggle="dropdown">
                            <i class="icon-bell mx-0"></i>
                            <span class="count"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                            aria-labelledby="notificationDropdown">
                            <a class="dropdown-item">
                                <p class="mb-0 font-weight-normal float-left">You have 4 new notifications
                                </p>
                                <span class="badge badge-pill badge-warning float-right">View all</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-success">
                                        <i class="icon-info mx-0"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject font-weight-medium">Application Error</h6>
                                    <p class="font-weight-light small-text">
                                        Just now
                                    </p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-warning">
                                        <i class="icon-speech mx-0"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject font-weight-medium">Settings</h6>
                                    <p class="font-weight-light small-text">
                                        Private message
                                    </p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-info">
                                        <i class="icon-envelope mx-0"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject font-weight-medium">New user registration</h6>
                                    <p class="font-weight-light small-text">
                                        2 days ago
                                    </p>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#"
                            data-toggle="dropdown" aria-expanded="false">
                            <i class="icon-envelope mx-0"></i>
                            <span class="count"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                            aria-labelledby="messageDropdown">
                            <div class="dropdown-item">
                                <p class="mb-0 font-weight-normal float-left">You have 7 unread mails
                                </p>
                                <span class="badge badge-info badge-pill float-right">View all</span>
                            </div>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <img src="images/faces/face4.jpg" alt="image" class="profile-pic">
                                </div>
                                <div class="preview-item-content flex-grow">
                                    <h6 class="preview-subject ellipsis font-weight-medium">David Grey
                                        <span class="float-right font-weight-light small-text">1 Minutes ago</span>
                                    </h6>
                                    <p class="font-weight-light small-text">
                                        The meeting is cancelled
                                    </p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <img src="images/faces/face2.jpg" alt="image" class="profile-pic">
                                </div>
                                <div class="preview-item-content flex-grow">
                                    <h6 class="preview-subject ellipsis font-weight-medium">Tim Cook
                                        <span class="float-right font-weight-light small-text">15 Minutes ago</span>
                                    </h6>
                                    <p class="font-weight-light small-text">
                                        New product launch
                                    </p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <img src="images/faces/face3.jpg" alt="image" class="profile-pic">
                                </div>
                                <div class="preview-item-content flex-grow">
                                    <h6 class="preview-subject ellipsis font-weight-medium"> Johnson
                                        <span class="float-right font-weight-light small-text">18 Minutes ago</span>
                                    </h6>
                                    <p class="font-weight-light small-text">
                                        Upcoming board meeting
                                    </p>
                                </div>
                            </a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="icon-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <div class="row row-offcanvas row-offcanvas-right">
                <!-- partial:partials/_sidebar.html -->
                <nav class="sidebar sidebar-offcanvas" id="sidebar">
                    <ul class="nav">
                        {{-- <li class="nav-item nav-profile">
                            <div class="nav-link">
                                <div class="profile-image">
                                    <img src="images/faces/face10.jpg" alt="image" />
                                    <span class="online-status online"></span>
                                    <!--change class online to offline or busy as needed-->
                                </div>
                                <div class="profile-name">
                                    <p class="name">
                                        Marina Michel
                                    </p>
                                    <p class="designation">
                                        Super Admin
                                    </p>
                                </div>
                            </div>
                        </li> --}}
                        <li class="nav-item" style="border-bottom: 1px solid gray;border-top: 1px solid gray;">
                            <a class="nav-link" href="{{ route('dashboard') }}">
                                <i class="icon-rocket menu-icon"></i>
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item" style="border-bottom: 1px solid gray;">
                            <a class="nav-link" href="{{ route('department.index') }}">
                                <i class="icon-anchor menu-icon"></i>
                                <span class="menu-title">Department</span>
                            </a>
                        </li>
                        <li class="nav-item" style="border-bottom: 1px solid gray;">
                            <a class="nav-link" href="{{ route('journal.index') }}">
                                <i class="icon-layers menu-icon"></i>
                                <span class="menu-title">Journal & Research Paper</span>
                            </a>
                        </li>
                        <li class="nav-item" style="border-bottom: 1px solid gray;">
                            <a class="nav-link" href="{{ route('user.index') }}" >
                                <i class="icon-user menu-icon"></i>
                                <span class="menu-title">User</span>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false"
                                aria-controls="form-elements">
                                <i class="icon-flag menu-icon"></i>
                                <span class="menu-title">Form elements</span>
                                <span class="badge badge-danger">3</span>
                            </a>
                            <div class="collapse" id="form-elements">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"><a class="nav-link"
                                            href="pages/forms/basic_elements.html">Basic Elements</a></li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="pages/forms/advanced_elements.html">Advanced Elements</a></li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="pages/forms/validation.html">Validation</a></li>
                                    <li class="nav-item"><a class="nav-link" href="pages/forms/wizard.html">Wizard</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#editors" aria-expanded="false"
                                aria-controls="editors">
                                <i class="icon-anchor menu-icon"></i>
                                <span class="menu-title">Editors</span>
                                <span class="badge badge-info">3</span>
                            </a>
                            <div class="collapse" id="editors">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"><a class="nav-link" href="pages/forms/text_editor.html">Text
                                            editors</a></li>
                                    <li class="nav-item"><a class="nav-link" href="pages/forms/code_editor.html">Code
                                            editors</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false"
                                aria-controls="charts">
                                <i class="icon-pie-chart menu-icon"></i>
                                <span class="menu-title">Charts</span>
                                <span class="badge badge-warning">4</span>
                            </a>
                            <div class="collapse" id="charts">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"> <a class="nav-link"
                                            href="pages/charts/chartjs.html">ChartJs</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="pages/charts/morris.html">Morris</a>
                                    </li>
                                    <li class="nav-item"> <a class="nav-link"
                                            href="pages/charts/flot-chart.html">Flot</a></li>
                                    <li class="nav-item"> <a class="nav-link"
                                            href="pages/charts/google-charts.html">Google charts</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/ui-features/popups.html">
                                <i class="icon-diamond menu-icon"></i>
                                <span class="menu-title">Popups</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/ui-features/notifications.html">
                                <i class="icon-bell menu-icon"></i>
                                <span class="menu-title">Notifications</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false"
                                aria-controls="auth">
                                <i class="icon-bubbles menu-icon"></i>
                                <span class="menu-title">User Pages</span>
                                <span class="badge badge-danger">5</span>
                            </a>
                            <div class="collapse" id="auth">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"> <a class="nav-link" href="pages/samples/login-2.html"> Login 2
                                        </a></li>

                                    <li class="nav-item"> <a class="nav-link" href="pages/samples/register-2.html">
                                            Register 2 </a></li>
                                    <li class="nav-item"> <a class="nav-link" href="pages/samples/lock-screen.html">
                                            Lockscreen </a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/apps/email.html">
                                <i class="icon-cursor menu-icon"></i>
                                <span class="menu-title">E-mail</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/apps/gallery.html">
                                <i class="icon-picture menu-icon"></i>
                                <span class="menu-title">Gallery</span>
                            </a>
                        </li> --}}
                    </ul>
                </nav>
                <!-- partial -->
                <div class="content-wrapper">
                    @yield('content')

                    <!-- partial:partials/_footer.html -->
                    <footer class="footer">
                        <div class="container-fluid clearfix">
                            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © {{ date('Y') }}
                                <a href="#">Ahsan</a>. All rights reserved.</span>
                            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made
                                with <i class="mdi mdi-heart text-danger"></i></span>
                        </div>
                    </footer>
                    <!-- partial -->
                </div>
                <!-- content-wrapper ends -->
            </div>
            <!-- row-offcanvas ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="{{ asset('backend_asset') }}/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <script src="{{ asset('backend_asset') }}/vendors/jquery-bar-rating/jquery.barrating.min.js"></script>
    <script src="{{ asset('backend_asset') }}/vendors/chart.js/Chart.min.js"></script>
    <script src="{{ asset('backend_asset') }}/vendors/raphael/raphael.min.js"></script>
    <script src="{{ asset('backend_asset') }}/vendors/morris.js/morris.min.js"></script>
    <script src="{{ asset('backend_asset') }}/vendors/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{ asset('backend_asset') }}/js/off-canvas.js"></script>
    <script src="{{ asset('backend_asset') }}/js/hoverable-collapse.js"></script>
    <script src="{{ asset('backend_asset') }}/js/misc.js"></script>
    <script src="{{ asset('backend_asset') }}/js/settings.js"></script>
    <script src="{{ asset('backend_asset') }}/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="js/dashboard.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <!-- End custom js for this page-->
    @yield('footer_script')
</body>

</html>
