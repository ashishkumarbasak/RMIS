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
        <?php echo $template['partials']['implsiteInfoForm']; ?>
        <div style="margin:15px;">
        	<div class="row-fluid">
           		<?php echo $grid_data; ?>
        	</div>
       	</div>
    </div> 
</div><!--/content-body -->
<div style="height:10px;"></div>
<script id="popup_editor" type="text/x-kendo-template"></script>
<script src="<?php echo site_url('/assets/extensive/js/jquery.validate.min.js'); ?>"></script>
<script src="<?php echo site_url('/assets/js/custom/rmis_setup.js'); ?>"></script>
<script type="text/javascript">
function ClickEdit(e) {
	e.preventDefault();
   	var dataItem = this.dataItem($(e.currentTarget).closest("tr"));
   	var edit_url = "/Rmis/Setup/ImplementationSites/edit/"+dataItem.id;
   	window.location = edit_url;
}
</script>