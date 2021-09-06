<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">
    <title>SolveAthon</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/theme/blue.css">

    <script src="https://d3js.org/d3.v3.min.js"></script>
    <script src="https://d3js.org/topojson.v1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
    <!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/d3.geo.min.js"></script> -->

</head>

<body class="onepage" data-bs-spy="scroll" data-bs-target=".navbar">
    <div class="content-wrapper">
        <header class="wrapper">
            <nav class="navbar center-nav transparent navbar-expand-lg navbar-dark">
                <div class="container flex-lg-row flex-nowrap align-items-center">
                    <div class="navbar-brand w-100"><a href="<?=base_url();?>"><img
                                src="<?php echo base_url(); ?>assets/img/logo/solveathon_white_logo.png"
                                srcset="<?php echo base_url(); ?>assets/img/logo/solveathon_white_logo.png 5x" alt="" /></a></div>
                    <div class="navbar-collapse offcanvas-nav">
                        <div class="offcanvas-header d-lg-none d-xl-none">
                            <a href="index.html"><img src="<?php echo base_url(); ?>assets/img/logo/solveathon_white_logo.png"
                                    srcset="<?php echo base_url(); ?>assets/img/logo/solveathon_white_logo.png 5x" alt="" /></a>
                            <button type="button" class="btn-close btn-close-white offcanvas-close offcanvas-nav-close"
                                aria-label="Close"></button>
                        </div>
                        <ul class="navbar-nav">
                            <?php if($this->session->userdata('logged_in')){ ?>
                                <li class="nav-item"><?php echo anchor('student/dashboard','Dashboard','class="nav-link"');?></li>
                                <li class="nav-item"><?php echo anchor('student/learning','Learning','class="nav-link"');?></li>
                                <li class="nav-item"><?php echo anchor('student/ideas','Ideas','class="nav-link"');?></li>
                                <li class="nav-item"><?php echo anchor('student/my_team','My Team','class="nav-link"');?></li>
                                <li class="nav-item"><?php echo anchor('student/my_profile','My Profile','class="nav-link"');?></li>
                                <li class="nav-item"><?php echo anchor('student/logout','Logout','class="nav-link"');?></li>
                            <?php } else { ?>
                                <li class="nav-item"><a class="nav-link scroll" href="<?php echo base_url(); ?>">Home</a></li>
                                <li class="nav-item"><a class="nav-link scroll" href="<?php echo base_url().'student/login'; ?>">Login</a></li>
                            <?php } ?>
                            
                            
                        </ul>
                        <!-- /.navbar-nav -->
                    </div>
                    <!-- /.navbar-collapse -->
                    <!-- /.navbar-other -->
                </div>
                <!-- /.container -->
            </nav>
            <!-- /.navbar -->
        </header>
        <!-- /header -->
        <section class="wrapper image-wrapper bg-image bg-overlay bg-overlay-400 text-white"
            data-image-src="<?php echo base_url(); ?>assets/img/photos/bg3.jpg">
            <div class="container pt-5 pb-5 pt-md-5 pb-md-5 text-center">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <h2 class="display-1 mb-3 text-white"><?=$page_title;?></h2>
                        <!-- /nav -->
                    </div>
                    <!-- /column -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </section>
        <!-- /section -->
        
        <section class="wrapper bg-light">
            <div class="container py-10 pt-md-10 pb-md-10">
