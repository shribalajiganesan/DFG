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
                <h2>Payment Completed Successfully.</h2>
                <h2>Order Placed Successfully.</h2>
                <h2>Thanks for your interest.</h2>
                
                
                <!-- <form action="" method="POST" name="register-from" id="register-from" class="text-center"> -->
                    <div class="row">
                        
                        <div class="clearfix"></div>
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <a href="<?= base_url('users/licence_manager') ?>" class="btn btn-color">Proceed to Licence Manager </a>
                            </div>
                        </div>
                    </div>
                
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