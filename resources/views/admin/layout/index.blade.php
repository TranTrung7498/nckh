<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý đề tài nghiên cứu khoa học sinh viên HUNRE</title>
    <meta name="description" content="NCKH HUNRE">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('admin_assets/images/favicon.ico')}}">
    <!-- Bootstrap CSS -->
    <link href="{{asset('admin_assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome CSS -->
    <link href="{{asset('admin_assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Custom CSS -->
    <link href="{{asset('admin_assets/css/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin_assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css"/>
</head>

<body class="adminbody">

<div id="main">
    <!--Nav bar-->
    <div class="headerbar">
        <!-- LOGO -->
        <div class="headerbar-left">
            <a href="http://hunre.edu.vn/hre/trang-chu" class="logo"><img alt="Logo" src="{{asset('admin_assets/images/logo.png')}}" /> <span>Quản trị</span></a>
        </div>
        <nav class="navbar-custom">
            <ul class="list-inline float-right mb-0">
                <li class="list-inline-item dropdown notif">
                    <a class="nav-link dropdown-toggle arrow-none" href="{{url('logout')}}">
                        <i class="fa fa-sign-out"> Đăng xuất</i>
                    </a>
                </li>
            </ul>
            <ul class="list-inline menu-left mb-0">
                <li class="float-left">
                    <button class="button-menu-mobile open-left">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                </li>
            </ul>
        </nav>
    </div>
    <!-- End nav bar-->

    <!-- Side bar-->
    <div class="left main-sidebar">
        <div class="sidebar-inner leftscroll">
            <div id="sidebar-menu">
                <ul>
                    <li class="submenu">
                        <a class="" href="{{url('admin/home')}}"><i class="fa fa-fw fa-bars"></i><span> Trang chủ </span> </a>
                    </li>
                    <li><a href="{{url('admin/search')}}"><i class="fa fa-search"></i> Tra cứu đề tài</a></li>
                    <li><a href="{{url('admin/tested')}}"><i class="fa fa-files-o"></i> Kiểm tra trùng lặp</a></li>
                    <li class="submenu">
                        <a href="#"><i class="fa fa-book"></i> <span> Quản lý đề tài </span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="{{url('admin/regtopic')}}">Đăng ký đề tài</a></li>
                            <li><a href="{{url('admin/outline')}}">Xét duyệt đề cương</a></li>
                            <li><a href="{{url('admin/report')}}">Báo cáo tiến độ đề tài</a></li>
                            <li><a href="{{url('admin/accept')}}">Nghiệm thu đề tài</a></li>
                            <li><a href="{{url('admin/search/export')}}">Báo cáo thống kê</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="{{url('admin/account')}}"><i class="fa fa-user-circle-o"></i><span> Quản lý tài khoản </span> </a>
                    </li>
                    <li class="submenu">
                        <a href="#"><i class="fa fa-address-card-o"></i><span> Quản lý nhóm  </span><span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="{{url('admin/group')}}">Danh sách nhóm</a></li>
                            <li><a href="{{url('admin/group/addStudent')}}">Thêm sinh viên</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="#"><i class="fa fa-bell-o"></i><span> Thông báo </span><span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="{{url('admin/message/send')}}">Gửi thông báo</a></li>
                            <li><a href="{{url('admin/message/received')}}">Các thông báo đã nhận</a></li>
                            <li><a href="{{url('admin/message/sent')}}">Các thông báo đã gửi</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="{{url('admin/form/list')}}"><i class="fa fa-file-text-o"></i> <span> Quản lý biểu mẫu </span></a>
                    </li>
                    <li class="submenu">
                        <a href="#"><i class="fa fa-plus-circle"></i><span> Chức năng hỗ trợ </span><span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="{{url('admin/secondary/teacher')}}">Danh sách Giảng viên</a></li>
                            <li><a href="{{url('admin/secondary/classes')}}">Danh sách lớp</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!--End side bar-->
    @yield('content')
</div>
<script src="{{asset('js/style.js')}}"></script>
<script src="{{asset('admin_assets/js/modernizr.min.js')}}"></script>
<script src="{{asset('admin_assets/js/jquery.min.js')}}"></script>
<script src="{{asset('admin_assets/js/moment.min.js')}}"></script>
<script src="{{asset('admin_assets/js/popper.min.js')}}"></script>
<script src="{{asset('admin_assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('admin_assets/js/detect.js')}}"></script>
<script src="{{asset('admin_assets/js/fastclick.js')}}"></script>
<script src="{{asset('admin_assets/js/jquery.blockUI.js')}}"></script>
<script src="{{asset('admin_assets/js/jquery.nicescroll.js')}}"></script>
<!-- App js -->
<script src="{{asset('admin_assets/js/pikeadmin.js')}}"></script>
<!-- Counter-Up-->
<script src="{{asset('admin_assets/plugins/waypoints/lib/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('admin_assets/plugins/counterup/jquery.counterup.min.js')}}"></script>
<script src="{{asset('admin_assets/plugins/select2/js/select2.min.js')}}"></script>
@yield('page-scripts')
</body>
</html>