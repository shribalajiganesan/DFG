<?php $this->load->view('common/header'); ?>
<section id="licencemaneger" class="color-bg-green section-p-lg main-container clearfix text-white">
  <div class="container">
    <div class="row">
            <?php if($this->session->flashdata('success') != '') { ?>
            <div class="alert alert-success"><?php echo $this->session->flashdata('success') ?></div>
            <?php } else if($this->session->flashdata('error') != '') { ?>
            <div class="alert alert-danger"><?php echo $this->session->flashdata('error') ?></div>
            <?php } ?>
            <div class="col-md-6 col-sm-12">
                <h2>Login</h2>
                <?php echo form_open('checkout/checkout_login',array("id"=>"login-from")); ?>
                <!-- <form action="" method="POST" name="login-from" id="login-from"> -->
                    <div class="form-group">
                        <?php echo form_input('username', '',array("placeholder"=>"Username / Email Id","id"=>"username", "class"=>"form-control form-control-silver")); ?>
                        <?php echo form_error('username'); ?>
                    </div>
                    <div class="form-group">
                        <?php echo form_password('pass', '',array("placeholder"=>"Password","id"=>"pass", "class"=>"form-control form-control-silver")); ?>
                        <?php echo form_error('pass'); ?>
                    </div>
                    <div class="form-group">
                        <?php echo form_submit('login','Login',array("id"=>"login-btn", "class"=>"btn btn-color")); ?>
                        <!-- <button type="submit" name="login" id="login-btn" class="btn btn-color">Login</button>
                        <a href="index.php/myaccount" name="login" id="login-btn" class="btn btn-color">Login</a> -->
                    </div>
                <?php echo form_close() ?>
            </div>
            <div class="col-md-6 col-sm-12">
                <h2>Register</h2>
                
                <?php echo form_open('checkout/checkout_register',array("id"=>"register-from","class"=>"text-center")); ?>
                <!-- <form action="" method="POST" name="register-from" id="register-from" class="text-center"> -->
                    <div class="row">
                        <div class="col-md-12 hide">
                            <div class="form-group">
                                <input type="text" name="username" id="username" class="form-control form-control-silver" placeholder="Username">
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-6 col-ms-6">
                            <div class="form-group">
                                <?php echo form_input('first_name', '',array("placeholder"=>"First Name","id"=>"first-name", "class"=>"form-control form-control-silver")); ?>
                                <?php echo form_error('first_name'); ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-ms-6">
                            <div class="form-group">
                                <?php echo form_input('last_name', '',array("placeholder"=>"Last Name","id"=>"last-name", "class"=>"form-control form-control-silver")); ?>
                                <?php echo form_error('last_name'); ?>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-6 col-ms-6">
                            <div class="form-group">
                                <?php echo form_input('u_email', '',array("placeholder"=>"Email","id"=>"u_email", "class"=>"form-control form-control-silver")); ?>
                                <?php echo form_error('u_email'); ?>
                                <!-- <input type="email" name="u_email" id="u_email" class="form-control form-control-silver" placeholder="Email"> -->
                            </div>
                        </div>
                        <div class="col-md-6 col-ms-6">
                            <div class="form-group">
                                <?php echo form_input('u_phone', '',array("placeholder"=>"Telephone","id"=>"u_phone", "class"=>"form-control form-control-silver")); ?>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-6 col-ms-6">
                            <div class="form-group">
                                <?php echo form_password('pass', '',array("placeholder"=>"Password","id"=>"pass", "class"=>"form-control form-control-silver")); ?>
                                <?php echo form_error('pass'); ?>
                                <!-- <input type="password" name="u_secret" id="u_secret" class="form-control form-control-silver" placeholder="Password"> -->
                            </div>
                        </div>
                        <div class="col-md-6 col-ms-6">
                            <div class="form-group">
                                <?php echo form_password('cpass', '',array("placeholder"=>"Confirm Password","id"=>"cpass", "class"=>"form-control form-control-silver")); ?>
                                <?php echo form_error('cpass'); ?>
                                <!-- <input type="password" name="c_u_secret" id="c_u_secret" class="form-control form-control-silver" placeholder="Confirm Password"> -->
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <?php echo form_submit('register','Register',array("id"=>"register", "class"=>"btn btn-color")); ?>
                            </div>
                        </div>
                    </div>
                <?php echo  form_close() ?>
            </div>
        </div>
  </div>
</section>
<!-- <div class="adduserlightbox-bg">
  <div class="adduserlightbox-block">
    <a href="" class="userlightclose"> <i class="fa fa-times" aria-hidden="true"></i> </a>
    <h4>Please Enter User Name</h4>
    <form action="">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Add Iser">
        <span class="input-group-btn">
          <button class="btn btn-default" type="button"><i class="fa fa-plus" aria-hidden="true"></i> Add</button>
        </span>
      </div>
    </form>
  </div>
</div>
<div class="selectproductlightbox-bg">
  <div class="selectproductlightbox-area"> <a href="" class="lightclose"> <i class="fa fa-times" aria-hidden="true"></i> </a>
    <div class="selectproductlightbox-block">
      <div class="selectproductlightbox-row clearfix">
        <div class="selectproductlightbox-col">
          <div class="selectproductlightbox-select">
            <h4 class="selectproductlightbox-title">Select Product</h4>
            <div class="selectproductlightbox-select-content">
              <div class="form-group">
                <select class="form-control">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
              </div>
              <h5 class="selectproductlightbox-con-title">Famous Products</h5>
              <p>Qwt54-3245-2548-Normal</p>
              <p>Qwt54-3245-2548-Normal</p>
              <p>Qwt54-3245-2548-Normal</p>
              <h5 class="selectproductlightbox-con-title">Recent Search</h5>
              <p>Qwt54-3245-2548-Normal</p>
            </div>
          </div>
        </div>
        <div class="selectproductlightbox-col">
          <div class="selectproductlightbox-details">
            <h4 class="selectproductlightbox-title">Product Details</h4>
            <p class="selectproductlightbox-price">50.00$/piece</p>
            <div class="selectproductlightbox-select-content">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi architecto totam possimus voluptatum nulla, neque repudiandae iure.</p>
            </div>
            <div class="lmanegerBlock-creation licence-block">
              <div class="countlicence-block">
                <div class="form-inline">
                  <button type="submit" class="btn btn-default btn-mins"><i class="fa fa-minus" aria-hidden="true"></i></button>
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="01">
                  </div>
                  <button type="submit" class="btn btn-default btn-plus"><i class="fa fa-plus" aria-hidden="true"></i></button>
                </div>
              </div>
              <div class="buttonlicence-block">
                <button type="submit" name="profile_upadte" id="checkoutliccence-li" class="btn btn-block btn-color btn-edit">Checkout</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> -->
<?php $this->load->view('common/footer'); ?>