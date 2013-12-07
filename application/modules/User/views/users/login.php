<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
<meta charset="utf-8">
<title>Log In</title>
<meta name="description" content="">
<meta name="author" content="">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="<?php echo site_url('/assets/controlpanel/css/bootstrap.css');?>" rel="stylesheet">
<link href="<?php echo site_url('/assets/controlpanel/css/bootstrap-responsive.css');?>" rel="stylesheet">
<link rel="stylesheet" href="/assets/css/login.css">
</head>

<body class="login">
<div class="account-container login stacked">
  <?php $this->load->view('messages'); ?>
  <div class="content clearfix">
    <div class="span4">
      <form action="<?php echo site_url('User/Login/auth'); ?>" method="post">
        <h1>Log In</h1>
        <div class="login-fields">
          <p>Log in using your credentials:</p>
          <div class="field">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="" placeholder="Username" class="login username-field" />
          </div>
          <!-- /field -->
          
          <div class="field">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" value="" placeholder="Password" class="login password-field"/>
          </div>
          <!-- /password --> 
          
        </div>
        <!-- /login-fields -->
        
        <div class="login-actions">
          <button class="button btn btn-primary btn-large">Log In</button>
        </div>
        <!-- .actions -->
        
      </form>
    </div>
    <div class="span3 dc">
      <p style="text-align:center"><a href="#"><img src="/assets/controlpanel/img/datacentre-logo-big.png" alt="Data Center"></a></p>
      <span class="login-checkbox">
      <input id="rbtDataCenter" name="rbtDataCenter" type="checkbox" class="field login-checkbox" value="datacenter" tabindex="4" />
      <label class="choice" for="rbtDataCenter">Log in to Data Center</label>
      </span> </div>
  </div>
  
  <!-- /content --> 
  
</div>
<!-- /account-container --> 
<div class="t-container login stacked">
<!-- Text Under Box -->
<div class="login-extra"> Management Information System for BARC &amp; NARS Institutes<br>
  <small>(BARC, BARI, BRRI, BJRI, BSRI, SRDI, BLRI &amp; BFRI) </small> </div>
<!-- /login-extra -->
</div>

</body>
</html>
