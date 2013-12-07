<div class="container">
  <div class="row">
    <div class="span12">
    <hr>
    <h4>CHANGE PASSWORD</h4>
    <?php $this->load->view('messages'); ?>

      <div class="span7">
        <div class="form-unit">        
         <form action="<?php echo site_url('User/Profile/passwordsave'); ?>" method="post" id="changePasswordForm" class="cmxform" novalidate="novalidate">
          <fieldset>
            <p class="span3">
              <label for="old_password">Old Password *</label>
              <input name="old_password" type="password" id="old_password" maxlength="40" tabindex="1">
              <label for="password">New Password *</label>
              <input name="password" type="password" id="password" maxlength="40" tabindex="2">
              <label for="confirm_password">Confirm Password *</label>
              <input name="confirm_password" type="password" id="confirm_password" maxlength="40" tabindex="3">
              <button type="submit" class="btn btn-primary" tabindex="4"> <i class="icon-white icon-ok"></i> Change Password</button>
              </span> </p>
          </fieldset>
              </form>
        </div>
      </div>
      <div class="span4"> </div>
      <br/>
      </div>

  </div>
  <!-- /row --> 
</div>
<!-- /container --> 
<script type="text/javascript">	 		
		$().ready(function() {					
			$("#changePasswordForm").validate({
				rules: {
					old_password: {
						required: true
					},					 
					password: {
						required: true,
						minlength: 5
					},
					confirm_password: {
						required: true,
						minlength: 5,
						equalTo: "#password"
					}	 
					 
				},
				messages: {					 
					old_password: {
						required: "Please provide your old password"
					},					 
					password: {
						required: "Please provide a new password",
						minlength: "Your password must be at least 5 characters long"
					},
					confirm_password: {
						required: "Please confirm password",
						minlength: "Your password must be at least 5 characters long",
						equalTo: "Please enter the same password as above"
					}					 				
				}
			}); 	
			 
		});
		</script>