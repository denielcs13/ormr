<?php include_once '../config/config.php';
$DB = new DBHandler(); 
$rac_admin_id=$_SESSION["rac_super_admin_id"];
$ta_query=$DB->runQuery($conn,"SELECT * FROM `login` WHERE `id`='$rac_admin_id'");
if(empty($ta_query)){
	echo '<script>window.location="login";</script>';
}
$website_type='rideacar_admin';
$website_type_id=$rac_admin_id;
$cur_page=$_SERVER["PHP_SELF"];
$cur_pagename=explode('/',$cur_page);
$page=explode('.php',$cur_pagename[3]);

?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Ride a Car | Dashboard</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="site.webmanifest">
		<link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
        <!-- Place favicon.png in the root directory -->

		<!-- CSS here -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <link rel="stylesheet" href="css/animate.min.css">
        <link rel="stylesheet" href="css/magnific-popup.css">
        <link rel="stylesheet" href="css/fontawesome-all.min.css">
        <link rel="stylesheet" href="css/et-line-fonts.css">
        <link rel="stylesheet" href="css/themify-icons.css">
        <link rel="stylesheet" href="css/meanmenu.css">
        <link rel="stylesheet" href="css/ionicons.min.css">
        <link rel="stylesheet" href="css/vanillaCalendar.css">
        <link rel="stylesheet" href="css/chart.css">
        <link rel="stylesheet" href="css/default.css">
        <!-- sidebar menu -->
        <link rel="stylesheet" href="css/vendor.css">
        <link rel="stylesheet" href="css/sidebar-menu.css">
        <!-- sidebar menu end -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
    </head>
    <body>
        <input type="hidden" value="<?= $rac_admin_id;?>" id="user_id"/>
        <style>.btn-xs{padding: 2px;display: block;}</style>
        <?php $admin_id= $rac_admin_id; ?>
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

        <!-- Add your site or application content here -->




    <!-- begin .app -->
    <div class="app body-bg">
        <!-- begin .app-wrap -->
        <div class="app-wrap">
            <!-- begin .app-heading -->
            <header class="app-heading">
                <div class="canvas is-fixed is-top bg-white p-v-15 shadow-4dp" id="top-search">

                    <div class="container-fluid">
                        <form class="topheadersearch">
                            <div class="input-group input-group-lg icon-before-input">
                                <input type="text" name="s" class="form-control input-lg b-0" placeholder="Search for...">
                                <div class="icon z-3">
                                    <i class="fa fa-fw fa-lg fa-search"></i>
                                </div>
                                <span class="input-group-btn">
                                    <button data-target="#top-search" data-toggle="canvas" class="btn btn-danger btn-line b-0">
                                        <i class="fa fa-fw fa-lg fa-times"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </form>
                    </div>

                </div>
<!-- begin .navbar -->
                <nav class="navbar navbar-default navbar-static-top shadow-2dp">
                    <!-- begin .navbar-header -->
                    <div class="navbar-header">
                        <!-- begin .navbar-header-left with image -->
                        <div class="navbar-header-left b-r">
                            <!--begin logo-->
                            <a class="logo mt-0" href="index.html">
                                <span class="logo-xs hidden-md">
                                    <img src="img/logo/rideacar_logo.png" alt="logo-sm">
                                </span>
                                <span class="logo-lg visible-md">
                                    <img src="img/logo/rideacar_logo.png" alt="logo">
                                </span>
                            </a>
                            <!--end logo-->
                        </div>
                        <!-- end .navbar-header-left with image -->
                        <nav class="nav navbar-header-nav">

                            <a class="hidden-md b-r" href="#" data-side=collapse>
                                <i class="fa fa-fw fa-bars"></i>
                            </a>

                            <a class="visible-md b-r" href="#" data-side=mini>
                                <i class="fa fa-fw fa-bars"></i>
                            </a>

                            <form class="navbar-form visible-md b-r">
                                <div class="icon-after-input">
                                    <input type="text" name="s" class="form-control" placeholder="Search">
                                    <div class="icon">
                                        <a href="#">
                                            <i class="fa fa-fw fa-search"></i>
                                        </a>
                                    </div>
                                </div>
                            </form>

                        </nav>

                        <ul class="nav navbar-header-nav m-l-a">
                            <li class="hidden-md b-l">
                                <a href="#top-search" data-toggle="canvas">
                                    <i class="fa fa-fw fa-search"></i>
                                </a>
                            </li>
                            <!--<li class="dropdown b-l">
                                <a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <span class="b-wisteria fa fa-fw fa-envelope-o u-posRelative"></span>
                                    <span class="label label-notify b-orange">
                                        6
                                        <span class="waves"></span>
                                    </span>
                                </a>
                               <ul class="dropdown-menu animated fadeInDown w-sm pull-right">
                                    <li class="b-b">
                                        <div class="media">
                                            <div class="media-left">
                                                <a class="profile-pic" href="#">
                                                    <img class="media-object" src="img/logo/img1.jpg" alt="img">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="media-heading">
                                                    <small class="pull-right">2 hours ago</small>
                                                    <b>Salim Rana</b>
                                                </h5>
                                                started following
                                                <strong>John Hughes</strong>
                                                <p class="text-muted">2 hours ago at 7:12 pm - 12th March, 2018</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="b-b">
                                        <div class="media">
                                            <div class="media-left">
                                                <a class="profile-pic" href="#">
                                                    <img class="media-object" src="img/logo/img2.jpg" alt="img">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="media-heading">
                                                    <small class="pull-right">2 hours ago</small>
                                                    <b>Mehedi Hasan</b>
                                                </h5>
                                                started following
                                                <strong>John Hughes</strong>
                                                <p class="text-muted">2 hours ago at 7:12 pm - 12th March, 2018</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="text-center u-block btn-2-all" href="#">
                                            <i class="fa fa-envelope"></i> Read All Messages
                                        </a>
                                    </li>
                                </ul>
                            </li>-->
<!--                            <li class="dropdown b-l">
                                <a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-fw fa-bell"></i>
                                    <span class="point bg-carrot b-peter-river">
                                        <span class="waves"></span>
                                    </span>
                                </a>
                                <ul class="dropdown-menu pull-right w-sm animated fadeInUp message-note">
                                    <li class="p-tb-5">
                                        <a href="#">
                                            <div class="clearfix">
                                                <span class="pull-right text-muted small">4 minutes ago</span>
                                                <i class="fa fa-envelope fa-fw"></i>
                                                <span>6 Messages</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="p-tb-5">
                                        <a href="#">
                                            <div class="clearfix">
                                                <span class="pull-right text-muted small">3 minutes ago</span>
                                                <i class="fa fa-twitter fa-fw"></i>
                                                <span>4 Follower</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li class="p-tb-5 text-center">
                                        <a class="text-btn-note" href="#">
                                            <i class="fa fa-fw fa-bell"></i> See all Notification</a>
                                    </li>
                                </ul>
                            </li>-->

                            <li class="dropdown b-l">
                                <a class="dropdown-toggle profile-pic" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <img class="img-circle" src="img/logo/admin-icon.png" alt="Super admin">
                                    <b class="visible-md hidden-sm logged-user-display-name">Super admin</b>
                                </a>
                                <ul class="dropdown-menu animated flipInY pull-right admin-user">
                                    <li>
                                        <a href="#">Profile</a>
                                    </li>
                                    <li>
                                        <a href="#">Contacts</a>
                                    </li>
<!--                                    <li>
                                        <a href="#">Mail Box</a>
                                    </li>-->
                                    <li role="separator" class="divider"></li>
                                    <li>
                                        <a href="./superadmin-logout">
                                            <i class="fa fa-fw fa-sign-out"></i> Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- end .navbar-header -->
                </nav>
                <!-- end .navbar -->
            </header>
            <!-- end  .app-heading -->