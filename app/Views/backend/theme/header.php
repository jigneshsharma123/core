<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Woodbridge | </title>
<link rel="shortcut icon" type="image/x-icon" href="<? echo base_url(); ?>assets/puresoftware/images/logo.ico">
    <!-- Bootstrap -->
    <link href="<?php echo base_url() ?>assets/admin/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url() ?>assets/admin/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url() ?>assets/admin/css/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo base_url() ?>assets/admin/css/animate.min.css" rel="stylesheet">
		<!-- Select2 -->
    <link href="<?php echo base_url() ?>assets/admin/css/select2.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url() ?>assets/admin/css/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>
    <link href="<?php echo base_url() ?>assets/admin/css/custom.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<? echo base_url(); ?>assets/admin/css/jquery-ui.css">
 
    <!-- jQuery -->
    <script src="<?php echo base_url() ?>assets/admin/js/jquery.min.js"></script>
    <script src="<? echo base_url(); ?>assets/admin/js/jquery-ui.js"></script>
    <script src="<? echo base_url(); ?>assets/admin/js/datatables.min.js"></script>
		<script>
		BASE_URL = '<?php echo base_url(); ?>';
		</script>
			<!-- bootstrap-daterangepicker -->
    <link href="<? echo base_url(); ?>assets/admin/css/datepicker/daterangepicker.css" rel="stylesheet">
<script type="text/javascript" src="<? echo base_url(); ?>assets/admin/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<? echo base_url(); ?>assets/admin/ckfinder/ckfinder.js"></script>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo base_url() ?>admin" class="site_title"> <span>Woodbridge!</span></a>
            </div>

            <div class="clearfix"></div>


            <br />

            <!-- sidebar menu -->
            <?= $this->load->view('backend/theme/left_menu') ?>
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <?php $current_user_details = current_user_details(); ?>
                    <img src="<?php echo base_url('/assets/admin/images/userlogo.png'); ?>" alt=""><?=$current_user_details['name']?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="<?=base_url('/admin/dashboard/change_password')?>"> Change Password</a></li>
                    <li><a href="<?=base_url('/admin/dashboard/logout')?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
