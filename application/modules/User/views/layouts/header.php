<!-- NAVIGATION MENU -->
<?php $user = $this->session->userdata('sess_userdata'); ?>
<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse" href="<?php echo site_url('Cp'); ?>"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a> <a class="brand" href="<?php echo site_url('Cp'); ?>"><img src="/assets/controlpanel/img/cp-logo.png" alt="" style="margin-top:-7px"> Bangladesh Agriculture Research Council</a>
      <div id="cp-nav" class="nav-collapse collapse">
        <ul class="nav">
          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-fire icon-white"></i> Security <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo site_url('User/Module'); ?>"><i class="icon-th-large icon-white"></i> Module</a></li>
              <li><a href="<?php echo site_url('User/Role'); ?>"><i class="icon-check icon-white"></i> Role &amp; Permission</a></li>
              <li><a href="<?php echo site_url('User'); ?>"><i class="icon-user icon-white"></i> User</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user icon-white"></i> <?php echo $user->first_name; ?> <?php echo $user->last_name; ?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo site_url('User/Profile'); ?>"><i class="icon-user icon-white"></i> Profile</a></li>
              <li><a href="<?php echo site_url('User/Profile/changepassword'); ?>"><i class="icon-wrench icon-white"></i> Change Password</a></li>
              <li><a href="<?php echo site_url('User/logout'); ?>"><i class="icon-off icon-white"></i> Log Out</a></li>            </ul>
          </li>
          <li><a href="login.html"><i class="icon-globe icon-white"></i> Data Center</a></li>
        </ul>
      </div>
      <!--/.nav-collapse --> 
    </div>
  </div>
</div>
