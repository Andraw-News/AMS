<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['fullname'])) {

include "conn.php";
include 'php/user.php';
$user = getUserById($_SESSION['id'], $conn);

 ?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Trimex Colleges - General Service Office</title>
    <!-- This page css -->
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i>
                    </a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <a href="index.php" class="logo">
                            <!-- Logo icon -->
                            <b class="logo-icon">
                                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                                <!-- Dark Logo icon -->
                                <img src="assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                                <!-- Light Logo icon -->
                                <img src="assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                            </b>
                            <!--End Logo icon -->
                            <!-- Logo text -->
                            <span class="logo-text">
                                <!-- dark Logo text -->
                                <img src="assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                                <!-- Light Logo text -->
                                <img src="assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
                            </span>
                        </a>
                        <a class="sidebartoggler d-none d-md-block" href="javascript:void(0)" data-sidebartype="mini-sidebar">
                            <i class="mdi mdi-toggle-switch mdi-toggle-switch-off font-20"></i>
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti-more"></i>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <!-- <li class="nav-item d-none d-md-block">
                            <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar">
                                <i class="mdi mdi-menu font-24"></i>
                            </a>
                        </li> -->
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item search-box">
                            <a class="nav-link waves-effect waves-dark" href="javascript:void(0)">
                                <div class="d-flex align-items-center">
                                    <i class="mdi mdi-magnify font-20 mr-1"></i>
                                    <div class="ml-1 d-none d-sm-block">
                                        <span>Search</span>
                                    </div>
                                </div>
                            </a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter">
                                <a class="srh-btn">
                                    <i class="ti-close"></i>
                                </a>
                            </form>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                        

                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                        

                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="upload/profiles/<?=$user['image']?>" alt="user" class="rounded-circle" width="40">
                                <span class="m-l-5 font-medium d-none d-sm-inline-block"><?=$user['fullname']?> <i class="mdi mdi-chevron-down"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <span class="with-arrow">
                                    <span class="bg-primary"></span>
                                </span>
                                <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
                                    <div class="">
                                        <img src="upload/profiles/<?=$user['image']?>" alt="user" class="rounded-circle" width="60">
                                    </div>
                                    <div class="m-l-10">
                                        <h4 class="m-b-0"><?=$user['fullname']?></h4>
                                        <p class=" m-b-0"><?=$user['gmail']?></p>
                                    </div>
                                </div>
                                <div class="profile-dis scrollable">
                                    <a class="dropdown-item" href="home1.php">
                                        <i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                                    
                                   
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="ti-settings m-r-5 m-l-5"></i> Account Setting</a>
                                    <div class="dropdown-divider"></div>
                                    
                                    <div class="dropdown-divider"></div>
                                </div>
                                <div class="p-l-30 p-10">
                                    <a href="logout.php" class="btn btn-sm btn-danger btn-rounded">Logout</a>
                                </div>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="home1.php" aria-expanded="false">
                                <i class="mdi mdi-cube-send"></i>
                                <span class="hide-menu">Home</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="messages.php" aria-expanded="false">
                                <i class="mdi mdi-creation"></i>
                                <span class="hide-menu">Message</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Left Part  -->
            <!-- ============================================================== -->
            <div class="left-part bg-white fixed-left-part">
                <!-- Mobile toggle button -->
                <a class="ti-menu ti-close btn btn-success show-left-part d-block d-md-none" href="javascript:void(0)"></a>
                <!-- Mobile toggle button -->
                <div class="p-15">
                    <h4>Chat Sidebar</h4>
                </div>
                <div class="scrollable position-relative" style="height:100%;">
                    <div class="p-15">
                        <h5 class="card-title">Search Contact</h5>
                        <form>
                            <input class="form-control" type="search" placeholder="Search Contact" autocomplete="off">
                            <button type="button" class="btn bg-transparent" style="margin-left: -40px; z-index: 100;" onclick="$('#search').val('').trigger('focus')">
                            <i class="fa fa-times"></i>
                            </button>
                        </form>
                    </div>
                    <hr>
                    <ul class="mailbox list-style-none">
                        <li>
                            <div class="message-center chat-scroll">
                                <a href="javascript:void(0)" class="message-item" id='chat_user_1' data-user-id='1'>
                                    <span class="user-img"> <img src="assets/images/users/1.jpg" alt="user" class="rounded-circle"> <span class="profile-status online pull-right"></span> </span>
                                    <div class="mail-contnet">
                                        <h5 class="message-title">Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span> </div>
                                </a>
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item" id='chat_user_2' data-user-id='2'>
                                    <span class="user-img"> <img src="assets/images/users/2.jpg" alt="user" class="rounded-circle"> <span class="profile-status busy pull-right"></span> </span>
                                    <div class="mail-contnet">
                                        <h5 class="message-title">Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span> </div>
                                </a>
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item" id='chat_user_3' data-user-id='3'>
                                    <span class="user-img"> <img src="assets/images/users/3.jpg" alt="user" class="rounded-circle"> <span class="profile-status away pull-right"></span> </span>
                                    <div class="mail-contnet">
                                        <h5 class="message-title">Arijit Sinh</h5> <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span> </div>
                                </a>
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item" id='chat_user_4' data-user-id='4'>
                                    <span class="user-img"> <img src="assets/images/users/4.jpg" alt="user" class="rounded-circle"> <span class="profile-status offline pull-right"></span> </span>
                                    <div class="mail-contnet">
                                        <h5 class="message-title">Nirav Joshi</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                </a>
                                <!-- Message -->
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item" id='chat_user_5' data-user-id='5'>
                                    <span class="user-img"> <img src="assets/images/users/5.jpg" alt="user" class="rounded-circle"> <span class="profile-status offline pull-right"></span> </span>
                                    <div class="mail-contnet">
                                        <h5 class="message-title">Sunil Joshi</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                </a>
                                <!-- Message -->
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item" id='chat_user_6' data-user-id='6'>
                                    <span class="user-img"> <img src="assets/images/users/6.jpg" alt="user" class="rounded-circle"> <span class="profile-status offline pull-right"></span> </span>
                                    <div class="mail-contnet">
                                        <h5 class="message-title">Akshay Kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                </a>
                                <!-- Message -->
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item" id='chat_user_7' data-user-id='7'>
                                    <span class="user-img"> <img src="assets/images/users/7.jpg" alt="user" class="rounded-circle"> <span class="profile-status offline pull-right"></span> </span>
                                    <div class="mail-contnet">
                                        <h5 class="message-title">Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                </a>
                                <!-- Message -->
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item" id='chat_user_8' data-user-id='8'>
                                    <span class="user-img"> <img src="assets/images/users/8.jpg" alt="user" class="rounded-circle"> <span class="profile-status offline pull-right"></span> </span>
                                    <div class="mail-contnet">
                                        <h5 class="message-title">Varun Dhavan</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                </a>
                                <!-- Message -->
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Left Part  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Right Part  Mail Compose -->
            <!-- ============================================================== -->
            <div class="right-part">
                <div class="p-20">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Chat Messages</h4>
                            <div class="chat-box scrollable" style="height:calc(100vh - 300px);">
                                <!--chat Row -->
                                <ul class="chat-list">
                                    <!--chat Row -->
                                    <li class="chat-item">
                                        <div class="chat-img"><img src="assets/images/users/1.jpg" alt="user"></div>
                                        <div class="chat-content">
                                            <h6 class="font-medium">James Anderson</h6>
                                            <div class="box bg-light-info">Lorem Ipsum is simply dummy text of the printing &amp; type setting industry.</div>
                                        </div>
                                        <div class="chat-time">10:56 am</div>
                                    </li>
                                    <!--chat Row -->
                                    <li class="chat-item">
                                        <div class="chat-img"><img src="assets/images/users/2.jpg" alt="user"></div>
                                        <div class="chat-content">
                                            <h6 class="font-medium">Bianca Doe</h6>
                                            <div class="box bg-light-info">It’s Great opportunity to work.</div>
                                        </div>
                                        <div class="chat-time">10:57 am</div>
                                    </li>
                                    <!--chat Row -->
                                    <li class="odd chat-item">
                                        <div class="chat-content">
                                            <div class="box bg-light-inverse">I would love to join the team.</div>
                                            <br>
                                        </div>
                                    </li>
                                    <!--chat Row -->
                                    <li class="odd chat-item">
                                        <div class="chat-content">
                                            <div class="box bg-light-inverse">Whats budget of the new project.</div>
                                            <br>
                                        </div>
                                        <div class="chat-time">10:59 am</div>
                                    </li>
                                    <!--chat Row -->
                                    <li class="chat-item">
                                        <div class="chat-img"><img src="assets/images/users/3.jpg" alt="user"></div>
                                        <div class="chat-content">
                                            <h6 class="font-medium">Angelina Rhodes</h6>
                                            <div class="box bg-light-info">Well we have good budget for the project</div>
                                        </div>
                                        <div class="chat-time">11:00 am</div>
                                    </li>
                                    <!--chat Row -->
                                </ul>
                            </div>
                        </div>
                        <div class="card-body border-top">
                            <div class="row">
                                <div class="col-9">
                                    <div class="input-field m-t-0 m-b-0">
                                        <input id="textarea1" placeholder="Type and enter" class="form-control border-0" type="text">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <a class="btn-circle btn-lg btn-cyan float-right text-white" href="javascript:void(0)"><i class="fas fa-paper-plane"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                All Rights Reserved by Nice admin. Designed and Developed by
                <a href="https://wrappixel.com">WrapPixel</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- customizer Panel -->
    <!-- ============================================================== -->
    <aside class="customizer">
        <a href="javascript:void(0)" class="service-panel-toggle"><i class="fa fa-spin fa-cog"></i></a>
        <div class="customizer-body">
            <ul class="nav customizer-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><i class="mdi mdi-wrench font-20"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#chat" role="tab" aria-controls="chat" aria-selected="false"><i class="mdi mdi-message-reply font-20"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false"><i class="mdi mdi-star-circle font-20"></i></a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <!-- Tab 1 -->
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="p-15 border-bottom">
                        <!-- Sidebar -->
                        <h5 class="font-medium m-b-10 m-t-10">Layout Settings</h5>
                        <div class="custom-control custom-checkbox m-t-10">
                            <input type="checkbox" class="custom-control-input" name="theme-view" id="theme-view">
                            <label class="custom-control-label" for="theme-view">Dark Theme</label>
                        </div>
                        <div class="custom-control custom-checkbox m-t-10">
                            <input type="checkbox" class="custom-control-input sidebartoggler" name="collapssidebar" id="collapssidebar">
                            <label class="custom-control-label" for="collapssidebar">Collapse Sidebar</label>
                        </div>
                        <div class="custom-control custom-checkbox m-t-10">
                            <input type="checkbox" class="custom-control-input" name="sidebar-position" id="sidebar-position">
                            <label class="custom-control-label" for="sidebar-position">Fixed Sidebar</label>
                        </div>
                        <div class="custom-control custom-checkbox m-t-10">
                            <input type="checkbox" class="custom-control-input" name="header-position" id="header-position">
                            <label class="custom-control-label" for="header-position">Fixed Header</label>
                        </div>
                        <div class="custom-control custom-checkbox m-t-10">
                            <input type="checkbox" class="custom-control-input" name="boxed-layout" id="boxed-layout">
                            <label class="custom-control-label" for="boxed-layout">Boxed Layout</label>
                        </div>
                    </div>
                    <div class="p-15 border-bottom">
                        <!-- Logo BG -->
                        <h5 class="font-medium m-b-10 m-t-10">Logo Backgrounds</h5>
                        <ul class="theme-color">
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-logobg="skin1"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-logobg="skin2"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-logobg="skin3"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-logobg="skin4"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-logobg="skin5"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-logobg="skin6"></a></li>
                        </ul>
                        <!-- Logo BG -->
                    </div>
                    <div class="p-15 border-bottom">
                        <!-- Navbar BG -->
                        <h5 class="font-medium m-b-10 m-t-10">Navbar Backgrounds</h5>
                        <ul class="theme-color">
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-navbarbg="skin1"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-navbarbg="skin2"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-navbarbg="skin3"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-navbarbg="skin4"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-navbarbg="skin5"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-navbarbg="skin6"></a></li>
                        </ul>
                        <!-- Navbar BG -->
                    </div>
                    <div class="p-15 border-bottom">
                        <!-- Logo BG -->
                        <h5 class="font-medium m-b-10 m-t-10">Sidebar Backgrounds</h5>
                        <ul class="theme-color">
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-sidebarbg="skin1"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-sidebarbg="skin2"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-sidebarbg="skin3"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-sidebarbg="skin4"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-sidebarbg="skin5"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-sidebarbg="skin6"></a></li>
                        </ul>
                        <!-- Logo BG -->
                    </div>
                </div>
                <!-- End Tab 1 -->
                <!-- Tab 2 -->
                <div class="tab-pane fade" id="chat" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <ul class="mailbox list-style-none m-t-20">
                        <li>
                            <div class="message-center chat-scroll">
                                <a href="javascript:void(0)" class="message-item" id='chat_user_11' data-user-id='1'>
                                    <span class="user-img"> <img src="assets/images/users/1.jpg" alt="user" class="rounded-circle"> <span class="profile-status online pull-right"></span> </span>
                                    <div class="mail-contnet">
                                        <h5 class="message-title">Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span> </div>
                                </a>
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item" id='chat_user_21' data-user-id='2'>
                                    <span class="user-img"> <img src="assets/images/users/2.jpg" alt="user" class="rounded-circle"> <span class="profile-status busy pull-right"></span> </span>
                                    <div class="mail-contnet">
                                        <h5 class="message-title">Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span> </div>
                                </a>
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item" id='chat_user_31' data-user-id='3'>
                                    <span class="user-img"> <img src="assets/images/users/3.jpg" alt="user" class="rounded-circle"> <span class="profile-status away pull-right"></span> </span>
                                    <div class="mail-contnet">
                                        <h5 class="message-title">Arijit Sinh</h5> <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span> </div>
                                </a>
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item" id='chat_user_41' data-user-id='4'>
                                    <span class="user-img"> <img src="assets/images/users/4.jpg" alt="user" class="rounded-circle"> <span class="profile-status offline pull-right"></span> </span>
                                    <div class="mail-contnet">
                                        <h5 class="message-title">Nirav Joshi</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                </a>
                                <!-- Message -->
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item" id='chat_user_51' data-user-id='5'>
                                    <span class="user-img"> <img src="assets/images/users/5.jpg" alt="user" class="rounded-circle"> <span class="profile-status offline pull-right"></span> </span>
                                    <div class="mail-contnet">
                                        <h5 class="message-title">Sunil Joshi</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                </a>
                                <!-- Message -->
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item" id='chat_user_61' data-user-id='6'>
                                    <span class="user-img"> <img src="assets/images/users/6.jpg" alt="user" class="rounded-circle"> <span class="profile-status offline pull-right"></span> </span>
                                    <div class="mail-contnet">
                                        <h5 class="message-title">Akshay Kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                </a>
                                <!-- Message -->
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item" id='chat_user_71' data-user-id='7'>
                                    <span class="user-img"> <img src="assets/images/users/7.jpg" alt="user" class="rounded-circle"> <span class="profile-status offline pull-right"></span> </span>
                                    <div class="mail-contnet">
                                        <h5 class="message-title">Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                </a>
                                <!-- Message -->
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item" id='chat_user_81' data-user-id='8'>
                                    <span class="user-img"> <img src="assets/images/users/8.jpg" alt="user" class="rounded-circle"> <span class="profile-status offline pull-right"></span> </span>
                                    <div class="mail-contnet">
                                        <h5 class="message-title">Varun Dhavan</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                </a>
                                <!-- Message -->
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- End Tab 2 -->
                <!-- Tab 3 -->
                <div class="tab-pane fade p-15" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <h6 class="m-t-20 m-b-20">Activity Timeline</h6>
                    <div class="steamline">
                        <div class="sl-item">
                            <div class="sl-left bg-success"> <i class="ti-user"></i></div>
                            <div class="sl-right">
                                <div class="font-medium">Meeting today <span class="sl-date"> 5pm</span></div>
                                <div class="desc">you can write anything </div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left bg-info"><i class="fas fa-image"></i></div>
                            <div class="sl-right">
                                <div class="font-medium">Send documents to Clark</div>
                                <div class="desc">Lorem Ipsum is simply </div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left"> <img class="rounded-circle" alt="user" src="assets/images/users/2.jpg"> </div>
                            <div class="sl-right">
                                <div class="font-medium">Go to the Doctor <span class="sl-date">5 minutes ago</span></div>
                                <div class="desc">Contrary to popular belief</div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left"> <img class="rounded-circle" alt="user" src="assets/images/users/1.jpg"> </div>
                            <div class="sl-right">
                                <div><a href="javascript:void(0)">Stephen</a> <span class="sl-date">5 minutes ago</span></div>
                                <div class="desc">Approve meeting with tiger</div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left bg-primary"> <i class="ti-user"></i></div>
                            <div class="sl-right">
                                <div class="font-medium">Meeting today <span class="sl-date"> 5pm</span></div>
                                <div class="desc">you can write anything </div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left bg-info"><i class="fas fa-image"></i></div>
                            <div class="sl-right">
                                <div class="font-medium">Send documents to Clark</div>
                                <div class="desc">Lorem Ipsum is simply </div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left"> <img class="rounded-circle" alt="user" src="assets/images/users/4.jpg"> </div>
                            <div class="sl-right">
                                <div class="font-medium">Go to the Doctor <span class="sl-date">5 minutes ago</span></div>
                                <div class="desc">Contrary to popular belief</div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left"> <img class="rounded-circle" alt="user" src="assets/images/users/6.jpg"> </div>
                            <div class="sl-right">
                                <div><a href="javascript:void(0)">Stephen</a> <span class="sl-date">5 minutes ago</span></div>
                                <div class="desc">Approve meeting with tiger</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Tab 3 -->
            </div>
        </div>
    </aside>
    <div class="chat-windows"></div>
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/extra-libs/taskboard/js/jquery.ui.touch-punch-improved.js"></script>
    <script src="assets/extra-libs/taskboard/js/jquery-ui.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="dist/js/app.min.js"></script>
    <script src="dist/js/app.init.js"></script>
    <script src="dist/js/app-style-switcher.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <script>
    $(function() {
        $(document).on('keypress', "#textarea1", function(e) {
            if (e.keyCode == 13) {
                var id = $(this).attr("data-user-id");
                var msg = $(this).val();
                msg = msg_sent(msg);
                $("#someDiv").append(msg);
                $(this).val("");
                $(this).focus();
            }
        });
    });
    </script>
    <script>
    var message_limit = '<?php echo $message_limit ?>';
    var message_offset = '<?php echo $message_offset ?>';
    var messages = $.parseJSON('<?php echo json_encode($messages_arr) ?>');
    var mids = $.parseJSON('<?php echo json_encode($messages_ids) ?>');
    var last_id = mids[0]
    var messageInterval;
    var nmInterval;
    var deleteInterval;
    function search_user($keyword){
        $('#list-search-items').html('')
        $('#search-loader').removeClass('d-none')
        $.ajax({
            url:'php/Actions.php?a=find_user',
            method:'POST',
            data:{'keyword':$keyword},
            dataType:'json',
            error:err=>{
                console.log(err)
            },
            success:function(resp){
                if(resp.length > 0){
                    Object.keys(resp).map((k)=>{
                        var list = $('#user-item-clone .list-item').clone()
                        list.attr('href','./?eid='+resp[k].id)
                        list.find('.user-name').text(resp[k].name)
                        list.find('.search-user-email').text(resp[k].email)
                        list.find('.user-search-avatar').attr('src',resp[k].avatar)
                        $('#list-search-items').append(list)
                    })
                    $('#search-no-data').addClass('d-none')
                }else{
                    $('#search-no-data').removeClass('d-none')
                }
            },
            complete:()=>{
                $('#search-loader').addClass('d-none')
            }
        })
    }
    window.addEventListener("resize", function(){
        $('#convo-field').height('100%')
        $('#convo-field').height($('#right-panel').height() - $('#right-panel .card-header').height() - $('#message-form-holder').height()-50)
    });
    if($("#convo-field").length > 0){
    document.getElementById('convo-field').addEventListener('scroll',function(){
        if($('#convo-field').get(0).scrollTop > -30 && $('#scroll-bottom').hasClass('d-none') == false){
            $('#scroll-bottom').addClass('d-none')
        }
        if(Math.abs($('#convo-field').get(0).scrollTop) + $('#convo-field').get(0).offsetHeight + 1 >= $('#convo-field').get(0).scrollHeight && $('#prev-loader').hasClass('d-none') == true && $('#end-prev-data').hasClass('d-none') == true){
            $('#prev-loader').removeClass('d-none')
            message_offset = parseFloat(message_limit) + parseFloat(message_offset)
            setTimeout(() => {
            var convo_with = '<?php echo $convo_with ?>'
            $.ajax({
                url:'Actions.php?a=get_prev_messages',
                method:'POST',
                data:{message_offset:message_offset,message_limit:message_limit,convo_with:convo_with},
                dataType:'json',
                error:err=>{
                    console.log(err)
                    $('#prev-loader').addClass('d-none')
                },
                success:function(resp){
                    if(resp.length > 0){
                        var sid = '<?php echo $_SESSION['id'] ?>';
                        var process = new Promise((resolve)=>{
                            Object.keys(resp).map(k=>{
                                if(resp[k].from_user == sid){
                                    var bubble = $('#bubble_clone .bubble-from').clone()
                                }else{
                                    var bubble = $('#bubble_clone .bubble-to').clone()
                                }
                                bubble.find('.bubble').text(resp[k].message)
                                $('#convo-box').prepend(bubble)
                            })
                            resolve()
                        }) 
                        process.then(()=>{
                        $('#convo-field').animate({scrollTop:$('#convo-field').get(0).scrollTop - 150},'fast')
                        $('#prev-loader').addClass('d-none')
                       })
                        
                    }else{
                        $('#end-prev-data').removeClass('d-none')
                        $('#prev-loader').addClass('d-none')
                    }
                }
            })
        }, 1500);
        }else{
            // console.log('Top false')
        }
    })
}
function delete_message($id =''){
    var _conf = confirm('Are you sure to delete this message?')
    if(_conf == true){
        $.ajax({
            url:'Actions.php?a=delete_message',
            method:'POST',
            data:{id:$id},
            dataType:'json',
            error:err=>{
                console.log(err)
                alert('Deleting Message Failed due to error occured while processing the action.')
            },
            success:function(resp){
                if(resp.status == 'success'){
                    $('.bubble-from[data-id="'+$id+'"] .bubble').addClass('deleted').text('This message has been deleted')
                    $('.bubble-from[data-id="'+$id+'"]').find('.delete-message').remove()
                    $('.bubble-from[data-id="'+$id+'"]').removeAttr('data-id')
                }else if(!!resp.err){
                alert('Deleting Message Failed due to error occured while processing the action. Error: '+resp.err)
                }else{
                alert('Deleting Message Failed due to error occured while processing the action.')
                }
            }
        })
    }
}
    $(function(){
        $('#scroll-bottom>a').click(function(){
            $('#convo-field').animate({scrollTop:1},'fast')
        })
        $('#convo-field').height($('#right-panel').height() - $('#right-panel .card-header').height() - $('#message-form-holder').height() - 50)
        Object.keys(messages).map(k=>{
            var sid = '<?php echo $_SESSION['id'] ?>';
            if(messages[k].from_user == sid){
                var bubble = $('#bubble_clone .bubble-from').clone()
            }else{
                var bubble = $('#bubble_clone .bubble-to').clone()
            }
            if(messages[k].delete_flag == 1){
                bubble.find('.bubble').addClass('deleted').text('This message has been deleted')
                bubble.find('.delete-message').remove()
            }else{
                bubble.attr('data-id',messages[k].id)
                bubble.find('.bubble').html((messages[k].message).replace('\r','<br>'))
            }
            $('#convo-box').append(bubble)
            bubble.find('.delete-message').click(function(){
                delete_message(messages[k].id)
            })
        })
        deleteInterval = setInterval(() => {
            var ids_arr = []
            $('.bubble-from,.bubble-to').each(function(){
                if($(this).attr('data-id') != undefined){
                    ids_arr.push($(this).attr('data-id'))
                }
            })
            var ids = ids_arr.join(',')
            $.ajax({
                url:'Actions.php?a=check_deleted',
                method:'POST',
                data:{ids:ids},
                dataType:'json',
                error:err=>{
                    console.log(err)
                    clearInterval(deleteInterval)
                },
                success:function(resp){
                    if(resp.length > 0){
                        Object.keys(resp).map(k=>{
                            $('.bubble-to[data-id="'+resp[k]+'"] .bubble').addClass('deleted').text('This message has been deleted')
                            $('.bubble-to[data-id="'+resp[k]+'"]').find('.delete-message').remove()
                            $('.bubble-to[data-id="'+resp[k]+'"]').removeAttr('data-id')
                        })
                    }
                }
            })
        }, 750);
        messageInterval =setInterval(() => {
            var convo_with = '<?php echo $convo_with ?>'
            $.ajax({
                url:'Actions.php?a=get_messages',
                method:'POST',
                data:{last_id:last_id,convo_with:convo_with},
                dataType:'json',
                error:err=>{
                    console.log(err)
                },
                success:function(resp){
                    if(resp.length > 0){
                        var sid = '<?php echo $_SESSION['id'] ?>';
                        Object.keys(resp).map(k=>{
                            if(resp[k].from_user == sid){
                                var bubble = $('#bubble_clone .bubble-from').clone()
                            }else{
                                var bubble = $('#bubble_clone .bubble-to').clone()
                            }
                            bubble.attr('data-id',resp[k].id)
                            if(resp[k].delete_flag == 1){
                                bubble.find('.bubble').addClass('deleted').text('This message has been deleted')
                                bubble.find('.delete-message').remove()
                            }else{
                                bubble.find('.bubble').html((resp[k].message).replace('\r','<br>'))
                            }
                            $('#convo-box').append(bubble)
                            bubble.find('.delete-message').click(function(){
                                delete_message(resp[k].id)
                            })
                                last_id = resp[k].id
                            resp[k].message = (resp[k].from_user == sid) ? "You: "+ resp[k].message : resp[k].message;
                            if($('.convo_with[data-id="'+convo_with+'"]').length >0){
                                var convo = $('.convo_with[data-id="'+convo_with+'"]').clone()
                                convo.find('.last-message-field').text(resp[k].message)
                                $('.convo_with[data-id="'+convo_with+'"]').remove()
                                $('#convo_list').prepend(convo)
                            }else{
                                var convo = $('#convo-user-clone .convo_with').clone()
                                convo.attr('href',"./?eid=<?php echo isset($_GET['eid']) ? $_GET['eid'] : '' ?>")
                                convo.attr('data-id','<?php echo isset($user_to['id']) ? $user_to['id'] :'' ?>')
                                convo.find('.last-message-field').text(resp[k].message)
                                convo.find('.user-search-avatar').attr('src','<?php echo isset($user_to_avatar) ? $user_to_avatar :'' ?>')
                                convo.find('.user-name').text('<?php echo isset($user_to_name) ? $user_to_name :'' ?>')
                                convo.find('.email-field').text('<?php echo isset($user_to['email']) ? $user_to['email'] :'' ?>')
                                $('#convo_list').prepend(convo)
                            }
                        })

                        if($('#convo-field').get(0).scrollTop < -200 && $('#scroll-bottom').hasClass('d-none') == true){
                            $('#scroll-bottom').removeClass('d-none')
                        }else{
                            $('#convo-field').animate({scrollTop:1},'fast')
                        }
                    }
                }
            })
        }, 750);
        nmInterval = setInterval(() => {
            $.ajax({
                url:'Actions.php?a=get_unread',
                data:{eid:'<?php echo isset($_GET['eid']) ? $_GET['eid'] : '' ?>'},
                method:'POST',
                dataType:'json',
                error:err=>{
                    console.log(err)
                    clearInterval(nmInterval)
                },
                success:function(resp){
                    if(resp.length > 0){
                        Object.keys(resp).map(k=>{
                            var convo_with = resp[k].convo_with
                            if($('.convo_with[data-id="'+convo_with+'"]').length >0){
                                var convo = $('.convo_with[data-id="'+convo_with+'"]').clone()
                                convo.find('.last-message-field').text(resp[k].message)
                                convo.find('.notif-count').text(resp[k].un_read > 0 ? resp[k].un_read : '')

                                $('.convo_with[data-id="'+convo_with+'"]').remove()
                                $('#convo_list').prepend(convo)
                            }else{
                                var convo = $('#convo-user-clone .convo_with').clone()
                                convo.attr('href',"./?eid="+resp[k].eid)
                                convo.attr('data-id',resp[k].convo_with)
                                convo.find('.notif-count').text(resp[k].un_read > 0 ? resp[k].un_read : '')
                                convo.find('.last-message-field').text(resp[k].message)
                                convo.find('.user-search-avatar').attr('src',resp[k].avatar)
                                convo.find('.user-name').text(resp[k].name)
                                convo.find('.email-field').text(resp[k].email)
                                $('#convo_list').prepend(convo)
                            }
                        })
                    }
                }
            })
        }, 750);
        $('#search').on('focus input',function(){
            if($(this).val() != ''){
                $('#search-suggest').removeClass('d-none')
                search_user($(this).val())
            }else{
                $('#search-suggest').addClass('d-none')
                $('#list-search-items').html('')
            }
        })
        $(document).click((e)=>{
            if($('#search-suggest').hasClass('d-none') != true && document.querySelector('#search-area').contains(e.target) == false)
            $('#search-suggest').addClass('d-none');
        })

        $('#message-form').submit(function(e){
            e.preventDefault();
            $('.pop_msg').remove()
            var _this = $(this)
            var _el = $('<div>')
                _el.addClass('pop_msg')
            _this.find('button').attr('disabled',true)
            _this.find('button[type="submit"]').text('Sending...')
            $.ajax({
                url:'./Actions.php?a=send_message',
                method:'POST',
                data:$(this).serialize(),
                dataType:'JSON',
                error:err=>{
                    console.log(err)
                   alert('An error occured')
                    _this.find('button[type="submit"]').text('Send')
                    _this.find('button[type="submit"]').attr('disabled',false)
                    $('#page-container,html,body').animate({scrollTop:0},'fast')
                },
                success:function(resp){
                    if(resp.status == 'success'){
                        _this.get(0).reset()
                        $('#message').trigger('focus')
                    }else{
                        _el.addClass('alert alert-danger')
                    }
                    $('#convo-field').animate({scrollTop:1},'fast')

                    
                    _this.find('button[type="submit"]').text('Send')
                    _this.find('button[type="submit"]').attr('disabled',false)
                }
            })
        })
        $('#message').on('keydown',function(e){
            if(e.which == 13 && e.shiftKey==false){
                e.preventDefault()
                $('#message-form').submit()
                // console.log(e)
            }
        })
    })
</script>
</body>
<?php }else{ 
        header("Location: home1.php");
        exit;

    } ?>

</html>
