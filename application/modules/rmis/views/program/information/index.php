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
           		<?php //echo $grid_data; ?>
        	</div>
       	</div>
    </div> 
</div><!--/content-body -->
<div style="height:10px;"></div>
<link href="<?php echo site_url('/assets/jqueryui/1.8/themes/base/jquery-ui.css'); ?>" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="<?php echo site_url('/assets/jqueryui/1.8/jquery-ui.min.js'); ?>"></script>
<script id="popup_editor" type="text/x-kendo-template"></script>
<script>
    function ClickEdit(e) {
        e.preventDefault();
        var dataItem = this.dataItem($(e.currentTarget).closest("tr"));
        var edit_url = "/rmis/program/information/edit/"+dataItem.id;
        window.location = edit_url;
    }
</script>
<script type="text/javascript">
$(document).ready(function() {
	$(function() {
		$( "#program_manager" ).autocomplete({
			source: function(request, response) {
				$.ajax({ url: "<?php echo site_url('rmis/program/information/autocomplete'); ?>",
				data: { term: $("#program_manager").val()},
				dataType: "json",
				type: "POST",
				success: function(data){
					response(data);
				}
			});
		},
		minLength: 2
		});
	});
});
</script>