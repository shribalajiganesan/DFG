<?php $this->load->view('common/header_inner'); ?>
<style>
/*.search-box,.close-icon {
	position: relative;
	padding: 10px;
}
.search-box {
	
	width: 100%;
	border: 1px solid #fff;
  outline: 0;
  border-radius: 15px;
  background-color: transparent;
}
.search-box:search_customer {
	box-shadow: 0 0 15px 5px #b0e0ee;
	border: 2px solid #bebede;
}
.close-icon {
	border:1px solid transparent;
	background-color: transparent;
	display: inline-block;
	vertical-align: middle;
  outline: 0;
  cursor: pointer;
}
.close-icon:after {
	content: "X";
	display: block;
	width: 15px;
	height: 15px;
	position: absolute;
	background-color: #FA9595;
	z-index:1;
	right: 35px;
	top: 0;
	bottom: 0;
	margin: auto;
	padding: 2px;
	border-radius: 50%;
	text-align: center;
	color: white;
	font-weight: normal;
	font-size: 12px;
	box-shadow: 0 0 2px #E50F0F;
	cursor: pointer;
}
.search-box:not(:valid) ~ .close-icon {
	display: none;
}*/
#clear {
  position: relative;
  float: right;
  height: 20px;
  width: 20px;
  top: -28px;
  right: 5px;
  border-radius: 20px;
  background: #333;
  color: white;
  font-weight: bold;
  text-align: center;
  cursor: pointer;
}
#clear:hover {
  background: #1b763b;
}
/*.btn-mins i {
  margin-right: 0px !important;
}
.btn-plus i {
  margin-right: 0px !important;
}*/
</style>
<section id="licencemaneger" class="color-bg-green section-p-lg licenmaneger-container main-container clearfix">
  <div class="container">
    <?php if($this->session->flashdata('success') != '') { ?>
    <div class="alert alert-success"><?php echo $this->session->flashdata('success') ?></div>
    <?php } else if($this->session->flashdata('error') != '') { ?>
    <div class="alert alert-danger"><?php echo $this->session->flashdata('error') ?></div>
    <?php } ?>
    <form action="">
    <div class="row">
    <div class="col-sm-4">
    <div class="lmanegerBlock">
    <h4 class="lmanegerBlock-title"> User Lists </h4>
    <div class="lmanegerBlock-formbb">
    <form action="">
      <div class="form-group" id="input-outer">
        <input type="text" name="search_customer" id="search_customer" class="search-box form-control form-control-white" placeholder="Search...">
        <div id="clear">X</div>
        <!-- <button class="close-icon" type="reset"></button> -->
        <!-- <input type="text" name="search_customer" required class="search-box" placeholder="Search..." /> -->
      </div>
      <button class="btn add-btn adduserClick"> <i class="fa fa-plus" aria-hidden="true"></i> Add User </button>
    </form>
  </div>
  <div class="lmanegerBlock-creation">
    <ul class="lmanegerBlock-userl" id="list_customers">
      <?php if(count($customers) > 0) { 
          foreach($customers as $customer) { ?>
          <li data-customer="<?= $customer['id']; ?>" class="single_customer">
            <div class="userl-item"><?= $customer['first_name'].' '.$customer['last_name'] ?>
              <div class="userl-item-right"> <span class="badge">4</span> <span class="badge">4</span> </div>
            </div>
          </li>
      <?php }
      } else { }?>
      <!-- <li class="active">
        <div class="userl-item">User Name
          <div class="userl-item-right"> <span class="badge">4</span> <span class="badge">4</span> </div>
        </div>
      </li>
      <li>
        <div class="userl-item">User Name
          <div class="userl-item-right"> <span class="badge">4</span> <span class="badge">4</span> </div>
        </div>
      </li>
      <li>
        <div class="userl-item">User Name
          <div class="userl-item-right"> <span class="badge">4</span> <span class="badge">4</span> </div>
        </div>
      </li>
      <li>
        <div class="userl-item">User Name
          <div class="userl-item-right"> <span class="badge">4</span> <span class="badge">4</span> </div>
        </div>
      </li> -->
    </ul>
  </div>
</div>
</div>
<div class="col-sm-4">
  <div class="lmanegerBlock">
    <h4 class="lmanegerBlock-title">Seat Allocation</h4>
    <div class="lmanegerBlock-formbb text-right"> <a href="" class="remove-btn"> <i class="fa fa-trash" aria-hidden="true"></i> Remove </a> </div>
    <div class="lmanegerBlock-creation">
      <ul class="lmanegerBlock-seat">
      <?php if(count($licences) > 0) { 
            foreach($licences as $licence) { ?>
            <li>
              <div class="seat-item">
                <div class="seat-item-header">
                  <div class="checkbox licence-checkbox">
                    <label>
                      <?php if($licence['is_active'] == 1) { ?>
                        <input type="checkbox">
                      <?php } else { ?>
                        <input type="checkbox" disabled="disabled"> 
                      <?php } ?>
                      
                      Licence No </label>
                  </div>
                  <div class="licence-number"> <?= $licence['licence'] ?> </div>
                  <div class="userl-item-right"> <span class="badge-link"><i class="fa fa-external-link" aria-hidden="true"></i></span> </div>
                </div>
                <div class="seat-item-lists">
                  <div class="seat-item-list">
                    <div class="licence-checkbox licence-checkbox-title"> Machine Name </div>
                    <div class="licence-number"> Paranormal-DRV_PC </div>
                  </div>
                  <div class="seat-item-list">
                    <div class="licence-checkbox licence-checkbox-title"> Machine Name </div>
                    <div class="licence-number"> Paranormal-DRV_PC </div>
                  </div>
                </div>
              </div>
            </li>
      <?php } ?>
      <?php } else { ?>
          <li>No licence available in list.</li>
      <?php } ?>
      </ul>
    </div>
  </div>
</div>
<div class="col-sm-4">
  <div class="lmanegerBlock">
    <h4 class="lmanegerBlock-title">Profile Edit</h4>
    <div class="lmanegerBlock-formbb"> </div>
    <span class="edit_succ_msg" style="color:#0f0"></span>
    <span class="edit_err_msg" style="color:#f00"></span>
    <form id="edit_form">
    <div class="lmanegerBlock-creation">
      <div class="row">
      <input type="hidden" name="edit_id" value="" id="edit_id">
        <div class="col-md-6">
          <div class="form-group">
            <input type="text" name="edit_first_name" id="edit_first_name" class="form-control form-control-white" placeholder="First Name" >
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <input type="text" name="edit_last_name" id="edit_last_name" class="form-control form-control-white" placeholder="First Name" >
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <input type="text" name="edit_email" id="edit_email" class="form-control form-control-white" placeholder="First Name" >
            <span id="validate_edit_email" style="color:#f00;"></span>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <input type="text" name="edit_phone" id="edit_phone" class="form-control form-control-white" placeholder="First Name" >
          </div>
        </div>
      </div>
      <div class="form-group">
        <button type="submit" name="profile_upadte" id="profile_update" class="btn btn-block btn-color btn-edit">Save</button>
      </div>
    </div>
    </form>
    <h4 class="lmanegerBlock-title">Add Licence</h4>
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
        <button type="submit" name="profile_upadte" id="checkoutliccence" class="btn btn-block btn-color btn-edit">Checkout</button>
      </div>
    </div>
  </div>
</div>
</div>
</form>
</div>
</section>
<div class="adduserlightbox-bg" >
  <!--<div class="adduserlightbox-block" style="background-color: #ff9999 !important;">-->
  <div class="adduserlightbox-block" style="background-color: #379255 !important;">
    <a href="" class="userlightclose"> <i class="fa fa-times" aria-hidden="true"></i> </a>
    <!--<h4 style="color: #330000;">Add New User</h4>-->
    <h4 style="color: #ffffff;">Add New User</h4>
    <!-- <form action=""> -->
    <?php echo form_open('',array("id"=>"add_form")); ?>
      <div class="lmanegerBlock-creation" >
          
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" name="first_name" id="modal_first_name" class="form-control form-control-white modal_tb" placeholder="First Name" >
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" name="last_name" id="modal_last_name" class="form-control form-control-white modal_tb" placeholder="Last Name" >
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <input type="text" name="email_id" id="modal_email_id" class="form-control form-control-white modal_tb" placeholder="Email Id" >
                <span class="vaidate_msg" style="color:#f00"></span>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <input type="text" name="phone" id="modal_phone" class="form-control form-control-white modal_tb" placeholder="Phone" >
              </div>
            </div>
          </div>
          <div class="form-group">
            <button type="submit" name="profile_upadte" id="profile_update" class="btn btn-block btn-color btn-edit">Save</button>
          </div>
          <span class="succ_msg" style="color:#0f0"></span>
          <span class="err_msg" style="color:#f00"></span>
        </div><!-- /input-group -->
        <!-- <div class="input-group">
          <input type="text" class="form-control" placeholder="Add Iser">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button"><i class="fa fa-plus" aria-hidden="true"></i> Add</button>
          </span>
        </div> -->
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
              <?php if(count($products) > 0) { 
                  echo '<select class="form-control" id="product_id">';
                  foreach($products as $item) { 
                    echo '<option value="'.$item['id'].'">'.$item['name'].'</option>';
                  }
                  echo '</select>';
              ?>
              <?php } else { ?>
                <select class="form-control" id="product_id">
                  <option></option>
                </select>
              <?php } ?>
                <!-- <select class="form-control">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select> -->
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
            <p class="selectproductlightbox-price" id="product_price">50.00$/piece</p>
            <div class="selectproductlightbox-select-content" id="product_desc">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi architecto totam possimus voluptatum nulla, neque repudiandae iure.</p>
            </div>
            <div class="lmanegerBlock-creation licence-block">
              <?php echo form_open('checkout/product_payment',array("id"=>"product-payment-from")); ?>
              <input type="hidden" name="item_id" id="item_id" value="">
              <input type="hidden" name="item_name" id="item_name" value="">
                  <div class="countlicence-block">
                    <div class="form-inline">
                      <button type="submit" class="btn btn-default btn-mins" id="product-mins"><i class="fa fa-minus" aria-hidden="true"></i></button>
                      <div class="form-group">
                        <input type="text" class="form-control" name="quantity" id="product-qty">
                      </div>
                      <button type="submit" class="btn btn-default btn-plus" id="product-plus"><i class="fa fa-plus" aria-hidden="true"></i></button>
                    </div>
                  </div>
                  <input type="hidden" name="item_amount" id="item_amount" value="">
                  <div class="buttonlicence-block">
                    <button type="submit" name="profile_upadte" id="checkoutliccence-li" class="btn btn-block btn-color btn-edit">Checkout</button>
                  </div>
              <?php echo form_close() ?>
              <!-- <form action="https://www.paypal.com/cgi-bin/webscr" method="post" id="paypal_form"> -->
              <!-- <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" id="paypal_form">
                  <input type="hidden" name="cmd" value="_xclick">
                  <input type="hidden" name="business" value="websalvia@gmail.com">
                  <input type="hidden" name="item_name" id="item_name" value="">
                  <div class="countlicence-block">
                    <div class="form-inline">
                      <button type="submit" class="btn btn-default btn-mins" id="product-mins"><i class="fa fa-minus" aria-hidden="true"></i></button>
                      <div class="form-group">
                        <input type="text" class="form-control" name="quantity" id="product-qty">
                      </div>
                      <button type="submit" class="btn btn-default btn-plus" id="product-plus"><i class="fa fa-plus" aria-hidden="true"></i></button>
                    </div>
                  </div>
                  <input type="hidden" name="amount" id="item_amount" value="">
                  <input type="hidden" name="no_shipping" value="0">
                  <input type="hidden" name="no_note" value="1">
                  <input type="hidden" name="currency_code" value="USD">
                  <input type="hidden" name="lc" value="AU">
                  <input type="hidden" name="bn" value="PP-BuyNowBF">
                  <input type="hidden" name="return" value="<?= base_url('checkout/product_payment_success') ?>">
                  <input type="hidden" name="cancel_return" value="<?= base_url('checkout/product_payment_failed') ?>" />
                  <div class="buttonlicence-block">
                    <button type="submit" name="profile_upadte" id="checkoutliccence-li" class="btn btn-block btn-color btn-edit">Checkout</button>
                  </div>
              </form> -->
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('common/footer_inner'); ?>