<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $template['title']; ?> | BARC</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<!-- styles -->
<link href="<?php echo site_url('/assets/controlpanel/css/bootstrap.css');?>" rel="stylesheet">
<link href="<?php echo site_url('/assets/controlpanel/css/main.css');?>" rel="stylesheet">
<script type="text/javascript" src="<?php echo site_url('/assets/js/jquery.min.js');?>"></script>
<style type="text/css">
body {
	padding-top: 60px;
}
</style>
<link href="<?php echo site_url('/assets/controlpanel/css/bootstrap-responsive.css');?>" rel="stylesheet">
<?php echo $template['metadata']; ?>

<!-- For IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
    <script src="<?php echo site_url('/assets/js/html5.js') ?>"></script>
<![endif]-->

<!-- fav and touch icons -->
<link rel="shortcut icon" href="assets/ico/favicon.ico">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/assets/controlpanel/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/assets/controlpanel/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/assets/controlpanel/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="/assets/controlpanel/ico/apple-touch-icon-57-precomposed.png">

<!-- Google Fonts call. Font Used Open Sans -->
<!--<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel='stylesheet' type='text/css'>-->
</head>
<body>
<?php echo $template['partials']['header']; ?> <?php echo $template['body']; ?>
<div id="footerwrap">
  <footer class="clearfix"></footer>
  <div class="container">
    <div class="row">
      <div class="span8">
        <p>Assisted by:<br>
          National Agricultural Technology Project (NATP), Phase-1<br>
          Farmgate, Dhaka-1215 </p>
      </div>
      <div class="span4">
        <p> Powered by: Technovista Ltd. </p>
      </div>
    </div>
    <!-- /row --> 
  </div>
  <!-- /container --> 
</div>
<!-- /footerwrap --> 

<script type="text/javascript" src="<?php echo site_url('/assets/controlpanel/js/bootstrap.min.js'); ?>"></script> 
<script type="text/javascript" src="<?php echo site_url('/assets/noty/jquery.noty.js'); ?>"></script> 
<script type="text/javascript" src="<?php echo site_url('/assets/noty/layouts/topRight.js'); ?>"></script> 
<script type="text/javascript" src="<?php echo site_url('/assets/noty/themes/default.js'); ?>"></script> 
<script type="text/javascript" src="/assets/controlpanel/js/admin.js"></script>
</body>
</html>
