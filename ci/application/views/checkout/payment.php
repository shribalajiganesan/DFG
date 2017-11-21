<?php $this->load->view('common/header'); ?>
<?php
$card_types = array(''=>'Select Card Type','Visa'=>'Visa','MasterCard'=>'MasterCard','Amex'=>'Amex');
$expire_months = array();
for($i=1;$i<=12;$i++) { $expire_months[str_pad($i, 2, '0', STR_PAD_LEFT)] = str_pad($i, 2, '0', STR_PAD_LEFT);}
$expire_years = array();
for($i=date('y');$i<=date('y')+10;$i++) { $expire_years[$i] = $i;}
?>
<section id="licencemaneger" class="color-bg-green section-p-lg main-container clearfix text-white">
  <div class="container">
    <div class="row">
            <?php if($this->session->flashdata('success') != '') { ?>
            <div class="alert alert-success"><?php echo $this->session->flashdata('success') ?></div>
            <?php } else if($this->session->flashdata('error') != '') { ?>
            <div class="alert alert-danger"><?php echo $this->session->flashdata('error') ?></div>
            <?php } ?>
            <div class="col-md-12 col-sm-12">
                <h2>Payment</h2>
                
                <?php echo form_open('checkout/payment',array("id"=>"payment-from","class"=>"text-center")); ?>
                <!-- <form action="" method="POST" name="register-from" id="register-from" class="text-center"> -->
                    <div class="row">
                        <div class="col-md-12 col-ms-12">
                            <div class="form-group">
                                <?php echo form_input('card_holder_name', '',array("placeholder"=>"Card holder Name","id"=>"card_holder_name", "class"=>"form-control form-control-silver")); ?>
                                <?php echo form_error('card_holder_name'); ?>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-6 col-ms-6">
                            <div class="form-group">
                                <?php echo form_input('card_number', '',array("placeholder"=>"Card Number","id"=>"card_number", "class"=>"form-control form-control-silver", "maxlength"=>16)); ?>
                                <?php echo form_error('card_number'); ?>
                                <!-- <input type="email" name="u_email" id="u_email" class="form-control form-control-silver" placeholder="Email"> -->
                            </div>
                        </div>
                        <div class="col-md-6 col-ms-6">
                            <div class="form-group">
                                <?php //echo form_dropdown('ECC_CARDTYPE',$card_types, '', 'id="ECC_CARDTYPE" class="span3 form-control"');?>
                                <?php echo form_dropdown('card_type', $card_types, '', 'id="card_type" class="form-control form-control-silver"'); ?>
                                <?php echo form_error('card_type'); ?>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-4 col-ms-4">
                            <div class="form-group">
                                <?php echo form_dropdown('exp_month', $expire_months, '', 'id="exp_month" class="form-control form-control-silver"'); ?>
                                <?php echo form_error('exp_month'); ?>
                                <!-- <input type="password" name="u_secret" id="u_secret" class="form-control form-control-silver" placeholder="Password"> -->
                            </div>
                        </div>
                        <div class="col-md-4 col-ms-4">
                            <div class="form-group">
                                <?php echo form_dropdown('exp_year', $expire_years, '','id="exp_year" class="form-control form-control-silver"'); ?>
                                <?php echo form_error('exp_year'); ?>
                                <!-- <input type="password" name="u_secret" id="u_secret" class="form-control form-control-silver" placeholder="Password"> -->
                            </div>
                        </div>
                        <div class="col-md-4 col-ms-4">
                            <div class="form-group">
                                <?php echo form_password('cvv', '',array("placeholder"=>"CVV","id"=>"cvv", "class"=>"form-control form-control-silver")); ?>
                                <?php echo form_error('cvv'); ?>
                                <!-- <input type="password" name="c_u_secret" id="c_u_secret" class="form-control form-control-silver" placeholder="Confirm Password"> -->
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <?php echo form_submit('payment','Pay and Checkout',array("id"=>"register", "class"=>"btn btn-color")); ?>
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