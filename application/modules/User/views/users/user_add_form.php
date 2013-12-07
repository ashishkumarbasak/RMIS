<div class="container">
  <div class="row">
    <div class="span12">
    <hr>
    <?php 

		if(count($userInfo) == 1) {
			$actionUrl = site_url('/User/updateuser');
			$mode = "EDIT";
		} else {
			$actionUrl = site_url('/User/saveuser');
			$mode = "ADD";
		}
	?>
    <h4><?php echo $mode; ?> USER</h4>
    <?php $this->load->view('messages'); ?>
    <form action="<?php echo $actionUrl; ?>" method="post" id="signupForm" class="cmxform" novalidate="novalidate">
      <input type="hidden" name="id" value="<?php echo $userInfo->id; ?>"  />
      <div class="span5 offset7">
        <button type="submit" class="btn btn-primary"> <i class="icon-white icon-ok"></i> Submit </button>
        <a href="<?php echo site_url('User/'); ?>" class="btn btn-inverse"><i class="icon-white icon-user"></i> Users</a> 	
		<?php if($mode == "EDIT") { ?>
	        <a href="<?php echo site_url("User/permission/$userInfo->id"); ?>" class="btn btn-inverse"><i class="icon-check icon-white"></i> Change Permission</a> 
        <?php } ?>
        </div>	
        
      <br />
      <br />
      <?php  echo $window; ?>
      <div class="span7">
        <div class="form-unit">
          <h1>User Profile Information</h1>
          <fieldset>
            <?php 
				//dd($userInfo->employee_id);
				if($userInfo->employee_id === NULL) {
					$int = 'checked="checked"';
				} else if ($userInfo->employee_id != 0){
					$int = 'checked="checked"';
				} else {
					$ext = 'checked="checked"';
					$hide = 'style="visibility:hidden"';
				}
		    ?>
            <p class="span6">
              <label for="usertype">User Type</label>
              <label class="radio inline">
                <input name="usertype" type="radio" value="internal" tabindex="1" <?php echo $int; ?>>
                Internal</label>
              <label class="radio inline">
                <input name="usertype" type="radio" value="external" tabindex="2" <?php echo $ext; ?>>
                External</label>
            </p>
            <p class="span3">
              <input type="hidden" name="hremp_id" id="hremp_id" value="<?php echo $userInfo->id; ?>"  />
              <span id="empidzone" <?php echo $hide; ?>>
                  <label for="employeeid">Employee ID</label>
                  <span class="input-append">
                  <input name="employeeid" type="text" class="employeeid" id="employeeid" tabindex="7"  maxlength="40" value="<?php echo set_value('employeeid', $userInfo->employee_id); ?>">
                  <button class="btn btn-info" name="btnPopub" id="btnPopub" type="button">Find</button>
                  </span>
              </span>   
              <label for="firstname">Full Name *</label>
              <input name="firstname" type="text" id="firstname" tabindex="2" value="<?php echo set_value('firstname', $userInfo->first_name); ?>" maxlength="60">
              <label for="password">Password *</label>
              <input name="password" type="password" id="password" maxlength="40" tabindex="4">
              <label for="active">Active</label>
              <label class="radio inline">
                <input name="isactive" type="radio" value="1" 
					<?php if(!isset($userInfo->activated) || $userInfo->activated == 1) { ?>" checked="checked" <?php } ?> tabindex="7">
                Yes</label>
              <label class="radio inline">
                <input name="isactive" type="radio" value="0" <?php if($userInfo->activated == (int)0) { ?>" checked="checked" <?php } ?> tabindex="8">
                No</label>
            </p>
            <p class="span3">
              <label for="login_id">Login ID *</label>
              <input name="login_id" type="text" id="login_id" maxlength="40" tabindex="1" value="<?php echo set_value('login_id', $userInfo->email); ?>" >
              <label for="email">Email *</label>
              <input name="email" type="email" id="email" tabindex="6" value="<?php echo set_value('email', $userInfo->official_email); ?>">
              <label for="confirm_password">Confirm Password *</label>
              <input name="confirm_password" type="password" id="confirm_password" maxlength="40" tabindex="5">
            </p>
          </fieldset>
        </div>
      </div>
      <div class="span4">
        <div class="form-unit">
          <h1>Role</h1>
          <fieldset>
            <p>
              <?php 
			  	foreach($roles as $role) {
					if(in_array($role->id, $assignedRole)) {
						$checked = 'checked="checked"';
					} else {
						$checked = "";
					}
			  ?>
              <label class="checkbox">
                <input name="chkRole[]" type="checkbox" value="<?php echo $role->id; ?>" <?php echo $checked; ?> class="required">
                <?php echo $role->name; ?> </label>
              <?php } ?>
            </p>
          </fieldset>
        </div>
      </div>
      <br/>
      </div>
    </form>
  </div>
  <!-- /row --> 
</div>

<!-- /container --> 

<script type="text/javascript">
   function onChange(e) {	   
      var emp_id = $('.k-state-selected').find('td:eq(0)').text();
	  var employeeid = $('.k-state-selected').find('td:eq(1)').text();
	  var fullname = $('.k-state-selected').find('td:eq(2)').text();
	  var email = $('.k-state-selected').find('td:eq(5)').text();
	  
		$("#hremp_id").val(emp_id);
		$("#employeeid").val(employeeid);
		$("#firstname").val(fullname);
		$("#login_id").val(email);
		$("#email").val(email);
		
		$("#window").data("kendoWindow").close();
   }
   
   
    $(document).ready(function() {
    	$("#btnPopub").click(function() {
			$("#window").data("kendoWindow").open();
        });		
		
		$("input:radio[name=usertype]").click(function() {
			var utype = $(this).val();
			if(utype == 'external') {
				$("#empidzone").css("visibility", "hidden");	
			} else {
				$("#empidzone").css("visibility", "visible");	
			}			
		});
	});	 


		$().ready(function() {	
						
			$("#signupForm").validate({
				rules: {
					firstname: {
						required: true,
						minlength: 3
					},					 
					login_id: {
						required: true,
						minlength: 3
					},
					<?php if($mode == 'ADD') { ?>
					password: {
						required: true,
						minlength: 5
					},
					confirm_password: {
						required: true,
						minlength: 5,
						equalTo: "#password"
					},
					<?php } ?>
					email: {
						required: true,
						email: true
					},
					chkRole: {
						required: true
					}
				},
				messages: {
					firstname: "Please enter your firstname",										 
					login_id: {
						required: "Please enter a username",
						minlength: "Your username must consist of at least 3 characters"	
					},
					password: {
						required: "Please provide a password",
						minlength: "Your password must be at least 5 characters long"
					},
					confirm_password: {
						required: "Please confirm password",
						minlength: "Your password must be at least 5 characters long",
						equalTo: "Please enter the same password as above"
					},
					email: "Please enter a valid email address",
					chkRole: {
						required: "Assign a Role"
					}				
				}
			}); 	
			 
		});
</script> 
