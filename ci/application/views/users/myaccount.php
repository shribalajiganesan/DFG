<?php $this->load->view('common/header_inner'); ?>
<section id="myaccount" class="bg-color-dark opacity-90 text-white">
    <div class="container">
      <div class="col-md-12 col-sm-12">
        <h2>My account</h2>
        <div class="myaccount-access">
          <div class="row">
            <div class="col-md-4 col-sm-4 text-center">
              <div class="icon-md"> <i class="icon icon-basic-gear"></i> </div>
              <h4><a href="#profile-info" class="smooth-scroll text-white">Edit your profile</a></h4>
            </div>
            <div class="col-md-4 col-sm-4 text-center">
              <div class="icon-md"> <i class="icon icon-basic-key"></i> </div>
              <h4><a href="#change-password" class="smooth-scroll text-white">Change password</a></h4>
            </div>
            <div class="col-md-4 col-sm-4 text-center">
              <div class="icon-md"> <i class="icon icon-ecommerce-basket-cloud"></i> </div>
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
  <section id="company" class="bg-grey section-p-sm">
    <div class="container reveal-bottom-opacity">
      <div class="row">
        <div class="col-md-10 col-md-offset-1 col-md-0 col-sm-offset-0 wrapper-v-lg">
          <div class="row"> 
            
            <!-- Contact Details -->
            <div class="col-sm-4 wrapper-v-sm block-line"> 
              
              <!-- Icon -->
              <div class="block icon-md icon-color"> <i class="icon icon-basic-geolocalize-01"></i> </div>
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
              <div class="block icon-md icon-color"> <i class="icon icon-basic-mail"></i> </div>
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
              <div class="block icon-md icon-color"> <i class="icon icon-basic-smartphone"></i> </div>
              <!-- /End Icon --> 
              
              <!-- Address -->
              <div class="block text-left"> 
                <!--                                        <p>Tel.<a class="link-silver" href="tel:012345678991"> 01 23 456 78 99 1</a><br>--> 
                Cell <a class="link-silver" href="tel:+61 425 338 003">+61 425 338 003</a>
                </p>
              </div>
              <!-- /End Address --> 
              
            </div>
            <!-- /End Contact Details --> 
            
          </div>
        </div>
      </div>
    </div>
  </section>
<?php $this->load->view('common/footer'); ?>