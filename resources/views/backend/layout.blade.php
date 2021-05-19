<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>{{ App\Models\WebsiteProperty::first()->web_title}} | @yield('page-title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('/storage/image/'.App\Models\WebsiteProperty::first()->icon)}}">

        <!-- App css -->
        <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/metismenu.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

        <script src="assets/js/modernizr.min.js"></script>
        <style>
            .uimg{
                position: absolute;
            }
            .status{
                position: relative;
                width: 12px;
                height: 12px;
                border-radius: 50%;
                background-color: rgb(19, 167, 19);
                top: 36px;
                left: 29px;
            }
        </style>
        @stack('css')

    </head>


    <body>
        
        <!-- Begin page -->
        <div id="wrapper">

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">

                <div class="slimscroll-menu" id="remove-scroll">

                    <!-- LOGO -->
                    <div class="topbar-left">
                    <a href="{{url('/dashboard')}}" class="logo" style="color:rgba(14, 13, 13, 0.925)">
                            <span>
                               @if (App\Models\WebsiteProperty::first()->logo)
                               <img src="{{asset('/storage/image/'.App\Models\WebsiteProperty::first()->logo)}}" alt="Admin Panel Logo" height="22">
                               @else
                                   {{'Admin Panel'}}
                               @endif
                            </span> 
                        </a>
                    </div>

                    <!-- User box -->
                    <div class="user-box">
                        <div class="user-img">
                            @if (session('user-img'))
                            <img src="{{asset('/storage/users/'.session('user-img'))}}" alt="user-img" title="Admin Image" class="rounded-circle img-fluid uimg">
                            <div class="status"></div>
                            @else
                            <img src="{{asset('assets/images/users/avatar-1.jpg')}}" alt="user-img" title="Mat Helme" class="rounded-circle img-fluid">
                            @endif
                        </div>
                    <h5><a href="#">{{session('name')}}</a> </h5>
                        <p class="text-muted">Admin Head</p>
                    </div>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul class="metismenu" id="side-menu">

                            <!--<li class="menu-title">Navigation</li>-->

                            <li>
                            <a href="{{url('/dashboard')}}">
                                    <i class="fi-air-play"></i> <span> Dashboard </span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript: void(0);"><i class="fa fa-thumb-tack" style="transform: rotate(45deg)"></i><span> Posts </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{route('post.index')}}">All Posts</a></li>
                                <li><a href="{{route('post.create')}}">Add New</a></li>
                                    <li><a href="{{route('category.index')}}">Categories</a> </li>
                                </ul>
                            </li>
                            {{-- message --}}
                            <li>
                            <a href="javascript: void(0);"><i class="fi-mail"></i>
                                @if (count(App\Models\Message::where('status',0)->get())!=0)
                                <span class="badge badge-danger pull-right">
                                    {{count(App\Models\Message::where('status',0)->get())}}
                                </span> 
                               @endif 
                             <span> Message </span>
                            </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{url('/message/inbox')}}">-Inbox</a></li>
                                    <li><a href="form-advanced.html">-Compose Mail</a></li>
                                </ul>
                            </li>
                            {{-- review add --}}
                            <li>
                                <a href="javascript: void(0);"><i class="fa fa-angellist"></i><span> Review </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{url('/add-review')}}">-Add Review</a></li>
                                    <li><a href="{{url('/review-list')}}">-Review List</a></li>
                                    <li><a href="{{url('/review-bg-edit')}}">-Review Background</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);"><i class="fi-layout"></i><span> Layouts </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{url('/main-intro-edit')}}">-Main Intro</a></li>
                                <li><a href="{{url('/about-me')}}">-About Me</a></li>
                                <li><a href="{{url('/add-skill')}}">-Skill</a></li>
                                <li><a href="{{url('/service-section')}}">-Service Section</a></li>
                                <li><a href="{{url('/counter-section')}}">-Counter Section</a></li>
                                <li><a href="{{url('/add-portfolio')}}">-Portfolio Section</a></li>
                                <li><a href="{{url('/contact-edit')}}">-Contact Section</a></li>
                                </ul>
                            </li>

                          

                            <li>
                            <a href="{{url('/website-settings')}}"><i class="fa fa-gears"></i><span>Website Settings </span></a>
                                
                            </li>

                        </ul>

                    </div>
                    <!-- Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->

            <div class="content-page">

                <!-- Top Bar Start -->
                <div class="topbar">

                    <nav class="navbar-custom">

                        <ul class="list-unstyled topbar-right-menu float-right mb-0"> 
                            {{-- User Profile Here --}}
                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                  <i class="fa fa-user-circle"></i>
                                   <span class="ml-1">{{session('name')}}<i class="mdi mdi-chevron-down"></i> </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                                    <!-- item-->
                                    <div class="dropdown-item noti-title">
                                        <h6 class="text-overflow m-0">Welcome !</h6>
                                    </div>

                                    <!-- item-->
                                <a href="{{'/myaccount'}}" class="dropdown-item notify-item">
                                        <i class="fi-head"></i> <span>My Account</span>
                                    </a>

                                    <!-- item-->
                                <a href="{{url('/website-settings')}}" class="dropdown-item notify-item">
                                        <i class="fi-cog"></i> <span>Settings</span>
                                    </a>
                                    <!-- item-->
                                <a href="{{url('logout')}}" class="dropdown-item notify-item">
                                        <i class="fi-power"></i> <span>Logout</span>
                                    </a>

                                </div>
                            </li>

                        </ul>

                        <ul class="list-inline menu-left mb-0">
                            <li class="float-left">
                                <button class="button-menu-mobile open-left disable-btn">
                                    <i class="dripicons-menu"></i>
                                </button>
                            </li>
                            <li>
                                <div class="page-title-box">
                                    <h4 class="page-title">Dashboard </h4>
                                    <p>Welcome {{session('name')}} to Admin Panel !</p>
                                </div>
                            </li>

                        </ul>
                    </nav>
                </div>
                <!-- Top Bar End -->

                <!-- Start Page content -->
                <div class="content">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </div>
                <!-- content -->

                <footer class="footer text-right">
                    {{date('Y')}} © All Rights Reserved.  By <a href="https://aboutmdshojeb.blogspot.com">Shajeeb Mahmud</a>
                </footer>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->



        <!-- jQuery  -->
        <script src="{{asset('assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('assets/js/popper.min.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/js/metisMenu.min.js')}}"></script>
        <script src="{{asset('assets/js/waves.js')}}"></script>
        <script src="{{asset('assets/js/jquery.slimscroll.js')}}"></script>
            {{-- texteditor --}}
        <script src="{{asset('/editor/ckeditor.js')}}"></script>

        {{-- <!-- Flot chart -->
        <script src="{{asset('../plugins/flot-chart/jquery.flot.min.js')}}"></script>
        <script src="{{asset('../plugins/flot-chart/jquery.flot.time.js')}}"></script>
        <script src="{{asset('../plugins/flot-chart/jquery.flot.tooltip.min.js')}}"></script>
        <script src="{{asset('../plugins/flot-chart/jquery.flot.resize.js')}}"></script>
        <script src="{{asset('../plugins/flot-chart/jquery.flot.pie.js')}}"></script>
        <script src="{{asset('../plugins/flot-chart/jquery.flot.crosshair.js')}}"></script>
        <script src="{{asset('../plugins/flot-chart/curvedLines.js')}}"></script>
        <script src="{{asset('../plugins/flot-chart/jquery.flot.axislabels.js')}}"></script> --}}
        <script src="../plugins/jquery-knob/jquery.knob.js"></script>

        <!-- Dashboard Init -->
        <script src="{{asset('assets/pages/jquery.dashboard.init.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('assets/js/jquery.core.js')}}"></script>
        <script src="{{asset('assets/js/jquery.app.js')}}"></script>
        @stack('js')
        <script>
            ClassicEditor
                .create( document.querySelector( '#editor' ), {
                    // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
                } )
                .then( editor => {
                    window.editor = editor;
                } )
                .catch( err => {
                    console.error( err.stack );
                } );
        </script>
        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready( function () {
                $('.mytable').DataTable();
            } );
        </script>

    </body>
</html>