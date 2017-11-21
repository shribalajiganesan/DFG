<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<!-- Title of Website -->
<title>DAM Pro FileName Creator</title>
<meta name="description" content="Multipurpose Landing Page with Page Builder - App Landing Page"/>
<meta name="keywords" content="DFG, html theme, app landing page, app theme, app template, android app theme, ios app theme, html landing page, one page, responsive landing page"/>
<meta name="author" content="Egotype">
<base href="<?php echo base_url(''); ?>">
<!-- Favicon -->
<link rel="icon" href="<?php echo base_url('assets'); ?>/Favicon.png" type="image/png">
<link rel="apple-touch-icon" href="<?php echo base_url('assets'); ?>/Favicon.png">
<link rel="shortcut icon" href="<?php echo base_url('assets'); ?>/Favicon.png" type="image/x-icon">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="<?php echo base_url('assets/css/plugins'); ?>/bootstrap.min.css">
<!-- Font Icons -->
<link rel="stylesheet" href="<?php echo base_url('assets/css/icons/linea'); ?>/styles.css">
<link rel="stylesheet" href="<?php echo base_url('assets/css/icons/font-awesome/css'); ?>/font-awesome.min.css">
<!-- Google Fonts -->
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic">
<!-- Plugins CSS -->
<link rel="stylesheet" href="<?php echo base_url('assets/css/plugins'); ?>/loaders.min.css">
<link rel="stylesheet" href="<?php echo base_url('assets/css/plugins'); ?>/owl.carousel.min.css">
<!-- Custom CSS -->
<link rel="stylesheet" href="<?php echo base_url('assets/css'); ?>/style.css">
<!-- Responsive CSS -->
<link rel="stylesheet" href="<?php echo base_url('assets/css'); ?>/responsive.css">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>
<body class="login-admin">
<!-- Preloader -->
<div class="loader bg-grey">
  <div class="loader-inner ball-pulse ball-pulse-color">
    <div></div>
    <div></div>
    <div></div>
  </div>
</div>
<!-- Main -->
<div id="page" class="dark-version color-bg-green">
  <header id="nav" class="dark-nav-colored-hero"> 
    <!-- Sticky Navigation --> 
    <!-- for static Navbar: remove navbar-fixed-top; add navbar-static-top and navbar-dark -->
    <nav class="navbar navbar-fixed-top headernavbar">
      <div class="container">
        <div class="navbar-header"> 
          <!-- Menu Button for Mobile Devices -->
          <button type="button" class="collapse navbar-toggle navbar-icon" data-toggle="collapse" data-target="#navbar-collapse"> <span></span> <span></span> <span></span> </button>
          <!-- Logo --> 
          <a href="<?php echo base_url('/'); ?>" class="navbar-brand logo-wg smooth-scroll"><span></span></a> </div>
        <!-- /End Navbar hero -->
        <div class="collapse navbar-collapse-md" id="navbar-collapse"> 
          <!-- Navigation Links -->
          <ul class="nav navbar-nav navbar-left">
            <li><a href="<?php echo base_url('users/licence_manager'); ?>">Licence Manager</a></li>
            <li><a href="<?php echo base_url('/download'); ?>">Download</a></li>
            <li><a href="<?php echo base_url('/orderhistory'); ?>">Order History</a></li>
          </ul>
          <!-- Social Links -->
          <?php if(count($this->session->userdata('User')) >0) {
                $user = $this->session->userdata('User'); ?>
          <ul class="nav navbar-nav navbar-right headeruser">
            <li>
              <ul class="social logged-in_menu">
                <li class="dropdown"> <a class="" href="<?= base_url('users/myaccount') ?>"><span class="userImage"><img class="img-circle" src="assets/images/user.png" alt=""></span> Welcome <span class="username"><?= $user['name']; ?></span></a> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="<?= base_url('users/edit_profile') ?>"><i class="fa fa-pencil" aria-hidden="true"></i> Profile Edit</a></li>
                    <li><a href="<?= base_url('users/logout') ?>"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
                  </ul>
                </li>
              </ul>
            </li>
          </ul>
          <?php } ?>
          
          </li>
          <!-- /End Navigation Links --> 
        </div>
        <!-- /End Navbar Collapse --> 
      </div>
    </nav>
    <!-- /END Sticky Navigation --> 
  </header>