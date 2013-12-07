<div class="container">
  <div class="row">
    <div class="span12">
      <hr>
       <?php 
		if(! empty($userID)) {
			$actionUrl = site_url('User/savepermission/');
			$mode = "USER";
		} else {
			$actionUrl = site_url('User/Role/savepermission/');
			$mode = "ROLE";
		}
	?>
      <h4>ASSIGN PERMISSION TO <?php echo $roleName; ?></h4>
      <?php $this->load->view('messages'); ?>
      <section id="tabs">
        <div class="bs-docs-example">
          <form method="post" action="<?php echo $actionUrl; ?>">
            <input type="hidden" name="user_id" value="<?php echo $userID; ?>" />
          <div class="span4 offset8">
              <button type="submit" class="btn btn-primary">Apply Permission</button>
              <a href="<?php echo site_url('User/Role/'); ?>"  class="btn btn-inverse">Role</a> 
       		<?php if($mode == "USER") { ?>
		        <a href="<?php echo site_url("User/edit/$userID"); ?>" class="btn btn-inverse"><i class="icon-user icon-white"></i> Back</a> 
    	    <?php } ?>
              </div>
            <input type="hidden" name="roleID" value="<?php echo $roleID; ?>" />
            <ul class="nav nav-tabs" id="permissionTab">
              <?php foreach($modules as $k => $module) {  ?>
              <li class="<?php echo ($k==0) ? 'active' : ''; ?>"><a data-toggle="tab" href="#<?php echo $module['module']; ?>"><?php echo $module['module']; ?></a></li>
              <?php } ?>
            </ul>
            <div class="tab-content" id="myTabContent">
              <?php foreach($modules as $k => $module) {  ?>
              <div id="<?php echo $module['module']; ?>" class="tab-pane fade <?php echo ($k==0) ? 'active in' : ''; ?>">
                <?php 
					$perOptions = modules::run('User/Role/getAllPermissionOptions', $module['module']);							 
				 ?>
                <fieldset>
                  <legend><?php echo $perOptions[0]['description']; ?></legend>
                  <dl>
                    <?php foreach($perOptions as $k => $option) {  ?>
                    <dt><?php echo $option['section']; ?></dt>
                    <dd>
                      <?php 
                            $opts = unserialize($option['premission']);                                                       
                            foreach($opts as $k => $opt) {                           
								if(in_array($k, $appliedPermission)) {
									$chked = 'checked="checked"';
								} else {
									$chked = "";
								}
                        ?>
                      <label class="checkbox">
                        <input type="checkbox" value="<?php echo $k; ?>" name="chkPermission[]" <?php echo $chked; ?> />
                        <?php echo $opt; ?></label>
                      <?php } ?>
                    </dd>
                    <?php } ?>
                  </dl>
                </fieldset>
              </div>
              <?php } ?>
            </div>
          </form>
        </div>
        <hr class="bs-docs-separator">
      </section>
      <br/>
    </div>
  </div>
  <!-- /row --> 
</div>
<!-- /container --> 
