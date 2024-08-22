<!DOCTYPE html>
<html lang="en" class="h-100">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<title></title>
		<link href="<?= base_url(); ?>/assets/coreitx/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?= base_url(); ?>/assets/coreitx/css/style.css" rel="stylesheet">
		<link href="<?= base_url(); ?>/assets/coreitx/css/font-awesome.min.css" rel="stylesheet">
		<link href="<?= base_url(); ?>/assets/coreitx/css/slick.css" rel="stylesheet" type="text/css">
		<link href="<?= base_url(); ?>/assets/coreitx/css/slick-theme.css" rel="stylesheet" type="text/css">
		<link href="<?= base_url(); ?>/assets/coreitx/css/easy-responsive-tabs.css" rel="stylesheet" type="text/css">
		<link href="<?= base_url(); ?>/assets/coreitx/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<header class="header">
			<nav id="navbar-main">
				<div class="page-header container-fluid">
					<nav role="navigation" class="top-menu">
						<ul>
							<li>
								<i class="mail-icon">
									<img src="<?= base_url(); ?>/assets/coreitx/images/icons/mail-icon.svg" alt="">
								</i>
								<a href="mailto:info@coreitx.com">info@coreitx.com</a>
							</li>
							<li class="call-bx">
								<i class="call-icon">
									<img src="<?= base_url(); ?>/assets/coreitx/images/icons/call-icon.svg" alt="">
								</i>
								1.212.271.8732
							</li>
						</ul>
					</nav>
					
					
				</div>
			</nav>
			
			<!-- Fixed navbar -->
			<div class="header-main-navigation">
				<div class="page-primary-menu container">
					<nav class="navbar navbar-expand-md navbar-dark fixed-top1 bg-dark" role="navigation">
						<div class="container-fluid">
							<a class="navbar-brand" href="<?= base_url(); ?>">
								<img src="<?= base_url(); ?>/assets/coreitx/images/logo.png" class="logo" alt="">
							</a>
							<button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<div class="collapse navbar-collapse" id="navbarCollapse">
                                <?php use App\Libraries\Dynamic_menu;
                                $menu_object = new Dynamic_menu(); 
                                $menu_object->config = array(
                                'showicon' => true,
                                'id_menu' => '',
                                'class_nav_item' => 'nav-item dropdown',
                                'class_nav_item_a' => 'nav-link',
                                'class_nav_parent_item' => 'nav-item dropdown',
                                'class_nav_parent_item_a' => 'nav-link dropdown-toggle',
                                'class_child_nav' => 'dropdown-menu',
                                'class_child_nav_item' => '',
                                'class_child_nav_item_a' => 'dropdown-item',
                                'class_menu_parent' => '',
                                'class_menu' => '',
                                'class_nav' => 'navbar-nav ms-auto mb-2 mb-lg-0',
                                'class_nav_a' => 'nav-link dropdown-toggle',
                                'class_parent' => 'nav-item dropdown',
                                'class_parent_a' => 'dropdown-item',
                                );
                                echo $menu_object->build_menu('top');
                                ?>
							</div>
						</div>
					</nav>
				</div>
			</div>
		</header>
		
		<!-- Begin page content -->
		<main id="main-wrapper" class="layout-main-wrapper clearfix">
