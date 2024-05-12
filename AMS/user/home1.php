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
	<?php if ($user) { ?>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
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

        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Profile</h4>
                        <?php if(isset($_GET['error'])){ ?>
                          <div class="alert alert-danger" role="alert">
                            <?php echo $_GET['error']; ?>
                          </div>
                          <?php } ?>

                          <?php if(isset($_GET['success'])){ ?>
                          <div class="alert alert-success" role="alert">
                            <?php echo $_GET['success']; ?>
                          </div>
                          <?php } ?>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-30"> <img src="upload/profiles/<?=$user['image']?>"
                alt="No image" class="rounded-circle" width="150" />
                                    <h4 class="card-title m-t-10"><?=$user['fullname']?></h4>
                                    <h6 class="card-subtitle"><?=$user['position']?>, <?=$user['company']?></h6>
                                        
                                </center>
                            </div>
                            <div>
                                <hr> </div>
                            <div class="card-body"> 
                                
                                <div class="map-box">
                                    
                                </div> <small class="text-muted p-t-30 db">Social Profile</small>
                                <br/>
                                <a href="<?=$user['facebook']?>">
                                <button class="btn btn-circle btn-secondary"><i class="fab fa-facebook-f"></i></button></a>
                                
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Tabs -->
                            <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                                
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#last-month" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-setting-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-setting" aria-selected="false">Setting</a>
                                </li>
                            </ul>
                            <!-- Tabs -->
                            <div class="tab-content" id="pills-tabContent">
                                
                                <div class="tab-pane fade" id="last-month" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Full Name</strong>
                                                <br>
                                                <p class="text-muted"><?=$user['fullname']?></p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Mobile</strong>
                                                <br>
                                                <p class="text-muted"><?=$user['contact']?></p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                                                <br>
                                                <p class="text-muted"><?=$user['gmail']?></p>
                                            </div>
                                            <div class="col-md-3 col-xs-6"> <strong>Birthday</strong>
                                                <br>
                                                <p class="text-muted"><?=$user['birthday']?></p>
                                            </div>

                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Company Name</strong>
                                                <br>
                                                <p class="text-muted"><?=$user['company']?></p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Contact</strong>
                                                <br>
                                                <p class="text-muted"><?=$user['compcontact']?></p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Address</strong>
                                                <br>
                                                <p class="text-muted"><?=$user['compaddress']?></p>
                                            </div>
                                            <div class="col-md-3 col-xs-6"> <strong>Job</strong>
                                                <br>
                                                <p class="text-muted"><?=$user['position']?></p>
                                            </div>
                                            <div class="col-md-3 col-xs-6"> <strong>Job Description</strong>
                                                <br>
                                                <p class="text-muted"><?=$user['description']?></p>
                                            </div>
                                            <div class="col-md-3 col-xs-6"> <strong>Years Worked</strong>
                                                <br>
                                                <p class="text-muted"><?=$user['years']?></p>
                                            </div>
                                        </div>
                                        <hr>
                                       <div class="row">
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Resume</strong>
                                                <br>
                                                <p class="text-muted"><a href="<?=$user['documents']?>" style="color: gray;"><?=$user['documents']?></a></p>
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                                    <div class="card-body">
                                        <form action="php/edit.php" class="form-horizontal form-material" method="POST" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label class="col-md-12">Full Name</label>
                                                <div class="col-md-12">
                                                    <input type="text" value="<?=$user['fullname']?>" class="form-control form-control-line" name="fullname" id="fullname">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="gmail" class="col-md-12">Email</label>
                                                <div class="col-md-12">
                                                    <input type="email" value="<?=$user['gmail']?>" class="form-control form-control-line" name="gmail" id="gmail">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-md-12">Contact</label>
                                                <div class="col-md-12">
                                                    <input type="number" value="<?=$user['contact']?>" class="form-control form-control-line" name="contact" id="contact">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Birthday</label>
                                                <div class="col-md-12">
                                                    <input type="date" value="<?=$user['birthday']?>" class="form-control form-control-line" name="birthday" id="birthday">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Facebook Link</label>
                                                <div class="col-md-12">
                                                    <input type="url" value="<?=$user['facebook']?>" class="form-control form-control-line" name="facebook" id="facebook">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Company Name</label>
                                                <div class="col-md-12">
                                                    <input type="text" value="<?=$user['company']?>" class="form-control form-control-line" name="company" id="company">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Company Contact</label>
                                                <div class="col-md-12">
                                                    <input type="text" value="<?=$user['compcontact']?>" class="form-control form-control-line" name="compcontact" id="compcontact">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Company Address</label>
                                                <div class="col-md-12">
                                                    <input type="text" value="<?=$user['compaddress']?>" class="form-control form-control-line" name="compaddress" id="compaddress">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Job</label>
                                                <div class="col-md-12">
                                                    <input type="text" value="<?=$user['position']?>" class="form-control form-control-line" name="position" id="position">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12"> Job Description</label>
                                                <div class="col-md-12">
                                                    <input type="text" value="<?=$user['description']?>" class="form-control form-control-line" name="description" id="description">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Years Worked</label>
                                                <div class="col-md-12">
                                                    <input type="text" value="<?=$user['years']?>" class="form-control form-control-line" name="years" id="years">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Update Profile</label>
                                                <div class="col-md-12">
                                                    <input type="file" class="form-control form-control-line" name="image" id="image">
                                                    <input type="text" class="form-control form-control-line" hidden="hidden" name="old_pp" id="old_pp" value="<?=$user['image']?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Resume</label>
                                                <div class="col-md-12">
                                                    <input type="file" class="form-control form-control-line" name="document" id="document">
                                                    <input type="text" class="form-control form-control-line" hidden="hidden" name="old_doc" id="old_doc" value="<?=$user['documents']?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-success" type="submit">Update Profile</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
           
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
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
    
    <div class="chat-windows"></div>
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
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
</body>
<?php }else{ 
        header("Location: home.php");
        exit;

    } ?>

</html>


<?php }else {
    header("Location: index.php");
    exit;
} ?>