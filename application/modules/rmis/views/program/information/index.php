<div class="content-header">
  <h2>
  	<i <?php echo $content_header_icon; ?>></i> 
  	<?php echo $content_header_title; ?>
  </h2>
</div>

<!-- content-breadcrumb -->
<div class="content-breadcrumb"> 
  <?php echo $breadcrumb; ?>
</div>
<!-- /content-breadcrumb --> 

<!-- content-body -->
<div class="content-body">    
    <div class="row-fluid">
       <div style="margin:15px;">
        	<div class="row-fluid">
             	<?php echo $template['partials']['tab_menu']; ?>
                <div class="tabs-container">
                    <div class="tab-contents">
                        <?php echo $template['partials']['progInfoForm']; ?>    
                    </div>
                </div>
           		<?php echo $grid_data; ?>
        	</div>
       	</div>
    </div> 
</div><!--/content-body -->
<div style="height:10px;"></div>