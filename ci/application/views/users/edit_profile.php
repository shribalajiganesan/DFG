<?php $this->load->view('common/header_inner'); ?>
<section id="profile-info" class="color-bg-green section-p-lg ordersection-container main-container clearfix">
    <div class="container">
      <?php if($this->session->flashdata('success') != '') { ?>
      <div class="alert alert-success"><?php echo $this->session->flashdata('success') ?></div>
      <?php } else if($this->session->flashdata('error') != '') { ?>
      <div class="alert alert-danger"><?php echo $this->session->flashdata('error') ?></div>
      <?php } ?>
      <!-- <form action="#" method="POST" name="profile-upadte"> -->
      <?php echo form_open_multipart('users/edit_profile',array("id"=>"profile-upadte")); ?>
      <?php echo form_hidden('id', $this->encryption->encrypt($user['id'])); ?>
        <div class="row">
          <div class="col-md-4 col-sm-4">
            <div class="profileedit-details">
              <h2 class="profileedit-title">Profile Edit</h2>
              <div class="form-group">
                <?php echo form_input('first_name', $user['first_name'], array("placeholder"=>"First Name","id"=>"first_name", "class"=>"form-control form-control-white", "required"=>"required")); ?>
                <?php echo form_error('first_name'); ?>
                <!-- <input type="text" name="first_name" id="first_name" class="form-control form-control-white" placeholder="First Name" value="<?= $user['first_name']; ?>" required> -->
              </div>
              <div class="form-group">
                <?php echo form_input('last_name', $user['last_name'], array("placeholder"=>"Last Name","id"=>"last_name", "class"=>"form-control form-control-white", "required"=>"required")); ?>
                <?php echo form_error('last_name'); ?>
              </div>
              <div class="form-group">
                <?php echo form_input('phone', $user['phone'], array("placeholder"=>"Phone","id"=>"phone", "class"=>"form-control form-control-white", "required"=>"required")); ?>
                <?php echo form_error('last_name'); ?>
              </div>
              <div class="form-group">
                <?php echo form_input('email', $user['email'], array("placeholder"=>"Email Id","id"=>"email", "class"=>"form-control form-control-white", "required"=>"required")); ?>
                <?php echo form_error('last_name'); ?>
                <!-- <input type="eamil" name="user_email" id="user_email" class="form-control form-control-white" placeholder="Email" required> -->
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-4">
            <div class="profileedit-details">
              <h2 class="profileedit-title">Change Password</h2>
              <div class="form-group">
                <?php echo form_password('pass', '',array("placeholder"=>"New Password","id"=>"pass", "class"=>"form-control form-control-white")); ?>
                <?php echo form_error('pass'); ?>
                <!-- <input type="password" name="first_name" id="first_name" class="form-control form-control-white" placeholder="New Password" required> -->
              </div>
              <div class="form-group">
                <?php echo form_password('cpass', '',array("placeholder"=>"Confirm Password","id"=>"cpass", "class"=>"form-control form-control-white")); ?>
                <?php echo form_error('cpass'); ?>
                <!-- <input type="password" name="last_name" id="last_name" class="form-control form-control-white" placeholder="Confirm Password" required> -->
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-4">
            <div class="profileedit-details">
              <h2 class="profileedit-title">Edit Photo</h2>
              <div class="form-group box">
                <div class="box__input">
                  <input type="file" name="files[]" id="file" class="box__file" data-multiple-caption="{count} files selected" multiple />
                  <label for="file"><span class="box__dragndrop">Drag &amp; Drop or Here the</span> <strong>Browse</strong>.</label>
                </div>
              </div>
              <div class="form-group">
                <button type="submit" name="profile_upadte" id="profile_update" class="btn btn-block btn-color btn-edit">Save</button>
              </div>
            </div>
          </div>
        </div>
      <?= form_close(); ?>
    </div>
  </section>
<?php $this->load->view('common/footer_inner'); ?>