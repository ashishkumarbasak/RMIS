<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>
		<?php echo $template['title']; ?>
	</title>
    
     <link href="<?php echo site_url('assets/css/style.css'); ?>" rel="stylesheet" />
	
    <link href="<?php echo site_url('assets/extensive/css/bootstrap.min.css'); ?>" rel="stylesheet" />
	<link href="<?php echo site_url('assets/extensive/css/bootstrap-responsive.min.css'); ?>" rel="stylesheet" />
	<link rel="stylesheet" href="<?php echo site_url('assets/extensive/css/font-awesome.min.css'); ?>" />

	<!--[if IE 7]>
		<link rel="stylesheet" href="<?php echo site_url('assets/extensive/css/font-awesome-ie7.min.css'); ?>" />
	<![endif]-->
	<!--page specific plugin styles-->
	
    <!--fonts-->
	<!--<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />-->
	<link rel="stylesheet" href="<?php echo site_url('assets/extensive/css/font-awesome.min.css'); ?>" />
	<link rel="stylesheet" href="<?php echo site_url('assets/extensive/css/ace.min.css'); ?>" />
	<link rel="stylesheet" href="<?php echo site_url('assets/extensive/css/ace-responsive.min.css'); ?>" />
	<link rel="stylesheet" href="<?php echo site_url('assets/extensive/css/ace-skins.min.css'); ?>" />
    <link rel="stylesheet" href="<?php echo site_url('assets/extensive/css/overwrite.css'); ?>" />

	<!--[if lte IE 8]>
		<link rel="stylesheet" href="<?php echo site_url('assets/extensive/extensive/css/ace-ie.min.css'); ?>" />
	<![endif]-->

	<script src="<?php echo site_url('/assets/js/jquery.min.js'); ?>"></script>
	<?php echo $template['metadata']; ?>
</head>

<body>
	<?php echo $template['partials']['header']; ?>
	<div class="container-fluid" id="main-container"> 
		<a id="menu-toggler" href="#"> <span></span> </a> 
		<?php echo $template['partials']['sidebar']; ?>
  	
    	<div id="main-content" class="clearfix" <?php if(!isset($template['partials']['sidebar'])) {  ?>style="margin: 0px;" <?php } ?>> 
			<?php echo $template['partials']['page-content']; ?> 
			<?php echo $template['body']; ?> 
		</div>
  	<!--/#main-content--> 
	</div>
	<!--/.fluid-container#main-container--> 

	<a href="#" id="btn-scroll-up" class="btn btn-small btn-inverse"> <i class="icon-double-angle-up icon-only bigger-110"></i> </a> 
	<script src="<?php echo site_url('assets/extensive/js/bootstrap.min.js'); ?>"></script> 
	<!--page specific plugin scripts--> 

    <!--ace scripts--> 
    <script src="<?php echo site_url('assets/extensive/js/ace-elements.min.js'); ?>"></script> 
    <script src="<?php echo site_url('assets/extensive/js/ace.min.js'); ?>"></script> 
    <script type="text/javascript" src="<?php echo site_url('/assets/noty/jquery.noty.js'); ?>"></script> 
    <script type="text/javascript" src="<?php echo site_url('/assets/noty/layouts/topRight.js'); ?>"></script> 
    <script type="text/javascript" src="<?php echo site_url('/assets/noty/themes/default.js'); ?>"></script> 
    <!--inline scripts related to this page-->
</body>
</html>
