<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Solve-A-Thon</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="<?php echo base_url(); ?>admin_assets/font/iconsmind/style.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>admin_assets/font/simple-line-icons/css/simple-line-icons.css" />

    <link rel="stylesheet" href="<?php echo base_url(); ?>admin_assets/css/vendor/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>admin_assets/css/vendor/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>admin_assets/css/vendor/datatables.responsive.bootstrap4.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>admin_assets/css/vendor/select2.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>admin_assets/css/vendor/owl.carousel.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>admin_assets/css/vendor/bootstrap-stars.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>admin_assets/css/vendor/nouislider.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>admin_assets/css/vendor/bootstrap-datepicker3.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>admin_assets/css/vendor/perfect-scrollbar.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>admin_assets/css/main.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>admin_assets/css/dore.light.blue.css" />
    
    <script src="<?php echo base_url(); ?>admin_assets/js/vendor/jquery-3.3.1.min.js"></script>
    <!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>-->
    
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css" rel="stylesheet">
    
</head>
<body id="app-container" class="menu-default show-spinner">
    <nav class="navbar fixed-top">
        <div class="d-flex align-items-center navbar-left">
            <a href="#" class="menu-button d-none d-md-block">
                <svg class="main" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 17">
                    <rect x="0.48" y="0.5" width="7" height="1" />
                    <rect x="0.48" y="7.5" width="7" height="1" />
                    <rect x="0.48" y="15.5" width="7" height="1" />
                </svg>
                <svg class="sub" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 17">
                    <rect x="1.56" y="0.5" width="16" height="1" />
                    <rect x="1.56" y="7.5" width="16" height="1" />
                    <rect x="1.56" y="15.5" width="16" height="1" />
                </svg>
            </a>

            <a href="#" class="menu-button-mobile d-xs-block d-sm-block d-md-none">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 17">
                    <rect x="0.5" y="0.5" width="25" height="1" />
                    <rect x="0.5" y="7.5" width="25" height="1" />
                    <rect x="0.5" y="15.5" width="25" height="1" />
                </svg>
            </a>
            <div class="search ml-5">
                <?=form_open('admin/search/','name="form" novalidate class="form-horizontal" method="post"');?>
                <!--<input placeholder="Search...">-->
                <input type="text" placeholder="Search by Mobile" name="search" id="search">
                <span class="search-icon">
                    <i class="simple-icon-magnifier"></i>
                </span>
                <?=form_close();?>
            </div>
        </div>


        <a class="navbar-logo" href="<?=base_url();?>admin/dashboard">
            <span class="logo d-none d-xs-block"></span>
            <span class="logo-mobile d-block d-xs-none"></span>
        </a>

        <div class="navbar-right">
            <div class="user d-inline-block">
                <button class="btn btn-empty p-0" type="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <span class="name h6">Welcome <?=$username;?></span>
                    <!--<span>-->
                    <!--    <img alt="Profile Picture" src="img/profile-pic-l.jpg" />-->
                    <!--</span>-->
                </button>

                <div class="dropdown-menu dropdown-menu-right mt-3">
                    <a class="dropdown-item" href="#">Account</a>
                    <a class="dropdown-item" href="#">Change Password</a>
                    <!--<a class="dropdown-item" href="#">History</a>-->
                    <!--<a class="dropdown-item" href="#">Support</a>-->
                    <?php echo anchor('admin/logout','Logout','class="dropdown-item"'); ?>
                </div>
            </div>
        </div>
    </nav>
    
    <div class="sidebar">
        <div class="main-menu">
            <div class="scroll">
                <ul class="list-unstyled">
                    <li class=<?php echo ($menu_active == 'dashboard') ? 'active' :''; ?>>
                        <?php echo anchor('admin/dashboard','<img src="'.base_url().'assets/img/icons/dashboard.png" class="sidebar-icon"/> <span>Dashboard</span>',''); ?>
                    </li>
                    <li class=<?php echo ($menu_active == 'students') ? 'active' :''; ?>>
                        <?php echo anchor('admin/students','<img src="'.base_url().'assets/img/icons/students.png" class="sidebar-icon"/> <span>Students</span>',''); ?>
                    </li>
                    <li class=<?php echo ($menu_active == 'evaluators') ? 'active' :''; ?>>
                        <?php echo anchor('admin/evaluators','<img src="'.base_url().'assets/img/icons/evaluator.png" class="sidebar-icon"/> <span>Evaluators</span>',''); ?>
                    </li>
                    <li class=<?php echo ($menu_active == 'ideas') ? 'active' :''; ?>>
                        <?php echo anchor('admin/ideas','<img src="'.base_url().'assets/img/icons/idea.png" class="sidebar-icon"/> <span>Ideas</span>',''); ?>
                    </li>
                    <li class=<?php echo ($menu_active == 'learning') ? 'active' :''; ?>>
                        <?php echo anchor('admin/learning','<img src="'.base_url().'assets/img/icons/learning.png" class="sidebar-icon"/> <span>Learning</span>',''); ?>
                    </li>
                    <li class=<?php echo ($menu_active == 'users') ? 'active' :''; ?>>
                        <?php echo anchor('admin/users','<img src="'.base_url().'assets/img/icons/admins.png" class="sidebar-icon"/> Users',''); ?>
                    </li>
                    <li class=<?php echo ($menu_active == 'reports') ? 'active' :''; ?>>
                        <?php echo anchor('admin/dashboard','<img src="'.base_url().'assets/img/icons/report.png" class="sidebar-icon"/> Reports',''); ?>
                    </li>
                    <li class=<?php echo ($menu_active == 'logout') ? 'active' :''; ?>>
                        <?php echo anchor('admin/logout','<img src="'.base_url().'assets/img/icons/logout.png" class="sidebar-icon"/> Logout',''); ?>
                    </li>
                     
                </ul>
            </div>
        </div>
    </div>
    <main>
        <div class="container-fluid">
            <!--<div class="row">-->
            <!--    <div class="col-12">-->
            <!--        <h1><?=$page_title;?></h1>-->
                    <!--<nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">-->
                    <!--    <ol class="breadcrumb pt-0">-->
                    <!--        <li class="breadcrumb-item">-->
                    <!--            <a href="#">Home</a>-->
                    <!--        </li>-->
                    <!--        <li class="breadcrumb-item">-->
                    <!--            <a href="#">Library</a>-->
                    <!--        </li>-->
                    <!--        <li class="breadcrumb-item active" aria-current="page">Data</li>-->
                    <!--    </ol>-->
                    <!--</nav>-->
            <!--        <div class="separator mb-5"></div>-->
            <!--    </div>-->
            <!--</div>-->
        