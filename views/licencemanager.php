<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

        <!-- Title of Website -->
        <title>DAM Pro FileName Creator</title>

        <meta name="description"
              content="Multipurpose Landing Page with Page Builder - App Landing Page"/>
        <meta name="keywords"
              content="DFG, html theme, app landing page, app theme, app template, android app theme, ios app theme, html landing page, one page, responsive landing page"/>
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
        <link rel="stylesheet"
              href="<?php echo base_url('assets/css/icons/font-awesome/css'); ?>/font-awesome.min.css">

        <!-- Google Fonts -->
        <link rel="stylesheet" type="text/css"
              href="http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic">

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
    <body>
        <!-- Preloader -->
        <div class="loader bg-grey">
            <div class="loader-inner ball-pulse ball-pulse-color">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <!-- Main -->
        <div id="page" class="dark-version">
            <header id="nav" class="dark-nav-colored-hero">

                <!-- Sticky Navigation -->
                <!-- for static Navbar: remove navbar-fixed-top; add navbar-static-top and navbar-dark -->
                <nav class="navbar navbar-fixed-top headernavbar">
                    <div class="container">
                        <div class="navbar-header">

                            <!-- Menu Button for Mobile Devices -->
                            <button type="button" class="collapse navbar-toggle navbar-icon" data-toggle="collapse"
                                    data-target="#navbar-collapse">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>

                            <!-- Logo -->
                            <a href="#page" class="navbar-brand logo-wg smooth-scroll"><span></span></a>

                        </div>
                        <!-- /End Navbar hero -->

                        <div class="collapse navbar-collapse-md" id="navbar-collapse">

                            <!-- Navigation Links -->
                            <ul class="nav navbar-nav navbar-left">
                                <li class="active"><a href="http://www.codersprint.com/ci/index.php/licencemanager">Licence Manager</a></li>
                                <li><a href="http://www.codersprint.com/ci/index.php/download">Download</a></li>
                                <li><a href="http://www.codersprint.com/ci/index.php/orderhistory">Order History</a></li>
                            </ul>

                            <!-- Social Links -->
                            <ul class="nav navbar-nav navbar-right headeruser">
                                <li>
                                    <ul class="social logged-in_menu">
                                        <li class="dropdown">
                                            <a class="" href="index.php/myaccount"><span class="userImage"><img class="img-circle" src="assets/images/user.png" alt=""></span> Welcome <span class="username">Jhone</span></a>
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="index.php/editprofile"><i class="fa fa-pencil" aria-hidden="true"></i> Profile Edit</a></li>
                                                <li><a href="#"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
                                            </ul>
                                        </li>
                                       
                                    </ul>
                                </li>
                            </ul>
                              
                            </li>
                            <!-- /End Navigation Links -->

                        </div>
                        <!-- /End Navbar Collapse -->

                    </div>
                </nav>
                <!-- /END Sticky Navigation -->

            </header>
            <section id="myaccount" class="bg-color-dark opacity-90 text-white">
                <div class="container">
                    <div class="col-md-12 col-sm-12">
                        <h2>Licence Manager</h2>
                        <div class="myaccount-access">
                            <div class="row">
                                <div class="col-md-4 col-sm-4 text-center">                                    
                                    <div class="icon-md">
                                        <i class="icon icon-basic-gear"></i>
                                    </div>
                                    <h4><a href="#profile-info" class="smooth-scroll text-white">Edit your profile</a></h4>
                                </div>
                                <div class="col-md-4 col-sm-4 text-center">
                                    <div class="icon-md">
                                        <i class="icon icon-basic-key"></i>
                                    </div>
                                    <h4><a href="#change-password" class="smooth-scroll text-white">Change password</a></h4>
                                </div>
                                <div class="col-md-4 col-sm-4 text-center">
                                    <div class="icon-md">
                                        <i class="icon icon-ecommerce-basket-cloud"></i>
                                    </div>
                                    <h4><a href="#order-history" class="smooth-scroll text-white">Orders</a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="profile-info" class="bg-darkgrey section-p-lg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="profile-details">
                                <h2>Your Personal Details</h2>
                                <form action="#" method="POST" name="profile-upadte">
                                    <div class="form-group">
                                        <input type="text" name="first_name" id="first_name" class="form-control form-control-silver" placeholder="First Name" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="last_name" id="last_name" class="form-control form-control-silver" placeholder="Last Name" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="eamil" name="user_email" id="user_email" class="form-control form-control-silver" placeholder="Email" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="user_phone" id="user_phone" class="form-control form-control-silver" placeholder="Telephone" required>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="profile_upadte" id="profile_update" class="btn btn-color">Update Profile</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="change-password" class="bg-color-dark opacity-90 text-white section-p-lg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="password-change">
                                <h2>Change Password</h2>
                                <hr>
                                <form action="#" method="POST" name="password-upadte">
                                    <div class="form-group">
                                        <input type="password" name="new_password" id="new_password" class="form-control" placeholder="Password" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="cnew_password" id="new_password" class="form-control" placeholder="Confirm Password" required>
                                    </div>                                    
                                    <div class="form-group">
                                        <button type="submit" name="profile_upadte" id="profile_update" class="btn btn-color">Change Password</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="order-history" class="bg-darkgrey opacity-90 section-p-lg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="order-details">
                                <h2>Order History</h2>
                                <hr>
                                <p>You have not made any previous orders!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php /* ?><section id="company" class="bg-grey section-p-sm">
                <div class="container reveal-bottom-opacity">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1 col-md-0 col-sm-offset-0 wrapper-v-lg">
                            <div class="row">

                                <!-- Contact Details -->
                                <div class="col-sm-4 wrapper-v-sm block-line">

                                    <!-- Icon -->
                                    <div class="block icon-md icon-color">
                                        <i class="icon icon-basic-geolocalize-01"></i>
                                    </div>
                                    <!-- /End Icon -->

                                    <!-- Address -->
                                    <div class="block text-left">
                                        <p>37 Torres Street Kurnell<br>
                                            NSW Australia 2231</p>
                                    </div>
                                    <!-- /End Address -->

                                </div>
                                <!-- /End Contact Details -->

                                <!-- Contact Details -->
                                <div class="col-sm-4 wrapper-v-sm block-line">

                                    <!-- Icon -->
                                    <div class="block icon-md icon-color">
                                        <i class="icon icon-basic-mail"></i>
                                    </div>
                                    <!-- /End Icon -->

                                    <!-- Address -->
                                    <div class="block text-left">
                                        <p><a class="link-silver" href="mailto:damprofilenamecreator@outlook.com" style="font-size: 13px;">damprofilenamecreator@outlook.com</a></p>
                                    </div>
                                    <!-- /End Address -->

                                </div>
                                <!-- /End Contact Details -->

                                <!-- Contact Details -->
                                <div class="col-sm-4 wrapper-v-sm block-line">

                                    <!-- Icon -->
                                    <div class="block icon-md icon-color">
                                        <i class="icon icon-basic-smartphone"></i>
                                    </div>
                                    <!-- /End Icon -->

                                    <!-- Address -->
                                    <div class="block text-left">
<!--                                        <p>Tel.<a class="link-silver" href="tel:012345678991"> 01 23 456 78 99 1</a><br>-->
                                        Cell <a class="link-silver" href="tel:+61 425 338 003">+61 425 338 003</a></p>
                                    </div>
                                    <!-- /End Address -->

                                </div>
                                <!-- /End Contact Details -->

                            </div>
                        </div>
                    </div>
                </div>
            </section> <?php */?>
            <!-- ============================
                     Footer
                ================================= -->

            <?php /* ?><footer id="footer" class="bg-dark section-p-sm">
                <div class="container">
                    <div class="row">

                        <!-- Company Details -->
                        <div class="col-md-6 wrapper-v-sm text-center-md">
                            <p class="text-light">
                                <a class="link-silver" href="#">Terms</a>
                                <span class="separator">|</span>
                                <a class="link-silver" href="#">Imprint</a>
                                <span class="separator">|</span>
                                <a class="link-silver" href="#">Privacy
                                    Policy</a><br>
                                &copy; 2017 <img src="assets/images/logo-silver.png" alt="..." class="logo-wrapper"
                                                 height="18">.
                                All Rights Reserved. Powered by: <a class="link-silver"
                                                                    href="http://www.zcodiatechnologies.com.au/" target="_blank"
                                                                    >Zcodia Technologies</a>
                            </p>
                        </div>
                        <!-- /End Company Details -->

                        <!-- Buttons Social -->
                        <div class="col-md-6 wrapper-v-sm text-right text-center-md">
                            <ul class="social hide">
                                <li>
                                    <a class="btn-circle btn-circle-sm btn-color" href="https://facebook.com/"
                                       target="_blank"><i
                                            class="fa fa-facebook"></i></a></li>
                                <li><a class="btn-circle btn-circle-sm btn-color" href="https://twitter.com/"
                                       target="_blank"><i
                                            class="fa fa-twitter"></i></a></li>
                                <li><a class="btn-circle btn-circle-sm btn-color" href="https://plus.google.com/"
                                       target="_blank"><i
                                            class="fa fa-google-plus"></i></a></li>
                                <li><a class="btn-circle btn-circle-sm btn-color" href="https://instagram.com/"
                                       target="_blank"><i
                                            class="fa fa-instagram"></i></a></li>
                                <li><a class="btn-circle btn-circle-sm btn-color" href="https://youtube.com/"
                                       target="_blank"><i
                                            class="fa fa-youtube"></i></a></li>
                                <li><a class="btn-circle btn-circle-sm btn-color" href="https://vimeo.com/"
                                       target="_blank"><i
                                            class="fa fa-vimeo"></i></a></li>
                                <li><a class="btn-circle btn-circle-sm btn-color" href="https://www.linkedin.com/"
                                       target="_blank"><i
                                            class="fa fa-linkedin"></i></a></li>
                                <li><a class="btn-circle btn-circle-sm btn-color" href="https://www.pinterest.com/"
                                       target="_blank"><i
                                            class="fa fa-pinterest"></i></a></li>
                                <li><a class="btn-circle btn-circle-sm btn-color" href="https://www.xing.com/"
                                       target="_blank"><i
                                            class="fa fa-xing"></i></a></li>
                            </ul>
                        </div>
                        <!-- /End Buttons Social -->

                    </div>
                </div>
            </footer> <?php */ ?>
            <footer class="footer-container">
              <div class="container">
                  <ul class="footerNavigation clearfix">
                    <li><a href="">Total No.of Licence <span class="footer-linkicon"><span class="footerlinkCount">1</span></span></a></li>
                    <li><a href="">No.of Allocated Licence<span class="footer-linkicon"><span class="footerlinkCount">1</span></span></a></li>
                    <li><a href="">No.of Idle Licence<span class="footer-linkicon"><span class="footerlinkCount">1</span></span></a></li>
                    <li><a href="">No.of Assigned Licence<span class="footer-linkicon"><span class="footerlinkCount">1</span></span></a></li>
                    <li><a href="">Add Licence <span class="footer-linkicon"><i class="fa fa-plus" aria-hidden="true"></i></span></a></li>
                  </ul>
              </div>
            </footer>
        </div>
        <!-- /End Main -->
        <!-- Back to Top Button -->
        <a href="#page" class="btn-circle btn-circle-lg btn-color btn-top smooth-scroll">
            <i class="fa fa-angle-up"></i>
        </a>
        <!-- /End Back to Top Button -->


        <!-- Scripts -->
        <script src="<?php echo base_url('assets/js/plugins'); ?>/jquery1.11.2.min.js"></script>
        <script src="<?php echo base_url('assets/js/plugins'); ?>/bootstrap.min.js"></script>
        <script src="<?php echo base_url('assets/js/plugins'); ?>/circles.min.js"></script>
        <script src="<?php echo base_url('assets/js/plugins'); ?>/owl.carousel.min.js"></script>
        <script src="<?php echo base_url('assets/js/plugins'); ?>/scrollreveal.min.js"></script>
        <script src="<?php echo base_url('assets/js/plugins'); ?>/jquery.ajaxchimp.min.js"></script>
        <script src="<?php echo base_url('assets/js/plugins'); ?>/contact-form.js"></script>
        <script src="<?php echo base_url('assets/js/plugins'); ?>/newsletter-form.js"></script>
        <script src="<?php echo base_url('assets/js/plugins'); ?>/embedvid.js"></script>
        <script src="<?php echo base_url('assets/js/plugins'); ?>/prefixfree.min.js"></script>
        <script src="<?php echo base_url('assets/js/plugins'); ?>/modernizr.js"></script>

        <!-- Custom Script -->
        <script src="assets/js/custom.js"></script>
    </body>
</html>