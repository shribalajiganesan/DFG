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
<a href="#page" class="btn-circle btn-circle-lg btn-color btn-top smooth-scroll"> <i class="fa fa-angle-up"></i> </a> 
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
<script>
$(function($) {
    // show the alert
    setTimeout(function() {
        $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
	        $(this).remove(); 
	    });
    }, 5000);

    $('#add_form').on('submit',function(e){
      e.preventDefault();
      $('.modal_tb').attr('style','');
      $(".succ_msg").html('');
      $(".err_msg").html('');
      $(".vaidate_msg").html('');
      if($.trim($("#modal_first_name").val()) == ''){
          $("#modal_first_name").css('border','1px solid #f00');
      } 
      if($.trim($("#modal_last_name").val()) == ''){
          $("#modal_last_name").css('border','1px solid #f00');
      }
      if($.trim($("#modal_email_id").val()) == ''){
          $("#modal_email_id").css('border','1px solid #f00');
      }
      if($.trim($("#modal_email_id").val()) != ''){
          _fname = $.trim($("#modal_first_name").val());
          _lname = $.trim($("#modal_last_name").val());
          _email = $.trim($("#modal_email_id").val());
          _phone = $.trim($("#modal_phone").val());
          $("#modal_email_id").css('border','1px solid #0f0');
          var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
          if(!re.test(_email)){
            $("#modal_email_id").css('border','1px solid #f00');
            $(".vaidate_msg").html('Please provide valid Email.');
          } else {
            $.ajax({
              url: '<?= base_url('Customers/add'); ?>',
              type: 'post',
              data: {fname:_fname,lname:_lname,email:_email,phone:_phone},
              async: false,
              success : function(data){
                if($.trim(data) == 'success'){
                  $('.modal_tb').val('');
                  $('.succ_msg').html('User added successfully.');
                  $.ajax({
                    url: '<?= base_url('Customers/list_by_owner'); ?>',
                    type: 'post',
                    data: {},
                    async: false,
                    success : function(data){
                      $('#list_customers').html(data);
                    }
                  });
                } else if($.trim(data) == 'customer exists'){
                    $("#modal_email_id").css('border','1px solid #f00');
                    $(".vaidate_msg").html('Email already exists.');
                } else {
                    $('.modal_tb').val('');
                    $('.err_msg').html('User added failed.');
                }
              }
            });
          }
      }  else {
        //$("#modal_first_name").attr('style','');
      }
      //alert(1);
    });

    $('#search_customer').on('keyup',function(){
        _key = $.trim($('#search_customer').val());
        $.ajax({
          url: '<?= base_url('Customers/list_by_owner'); ?>',
          type: 'post',
          data: {key:_key},
          async: false,
          success : function(data){
            $('#list_customers').html(data);
          }
        });
    })

    /*$('#modal_email_id').on('blur', function(){
        _email = $.trim($("#modal_email_id").val());
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if(!re.test(_email)){
          $("#modal_email_id").css('border','1px solid #f00');
          $(".vaidate_msg").html('Please provide valid Email.');
        } else {
            $.ajax({
              url: '<?= base_url(''); ?>'
              type: 'post',
              data : {},
              success : function(data){

              }
            });
            //$(".vaidate_msg").html('Email already exixts.');
        }
    });*/
});
</script>
</body>
</html>