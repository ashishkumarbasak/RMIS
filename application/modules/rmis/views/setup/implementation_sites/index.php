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
   	var edit_url = "/rmis/setup/implementationSites/edit/"+dataItem.id;
   	window.location = edit_url;
}
$(document).ready(function() {
	var contact_person_select;
	$("#contact_person_name").kendoAutoComplete({
        	dataTextField: "employee_name",
            filter: "startswith",
            minLength: 2,
            ignoreCase: false,
            dataSource: {
                         	type: "jsonp",
                            serverFiltering: true,
                            serverPaging: false,
                            pageSize: 20,
                            transport: {
                                read: "<?php echo site_url('rmis/employees2'); ?>"
                            }
                       },
           	open: function(e) {
		    	contact_person_select = false;
		  	},
		  	select: function(e){
		    	contact_person_select = true;
			    var dataItem = this.dataItem(e.item.index());                
        		$("#employee_id").val(dataItem.employee_id);
        		$("#contact_person").val(dataItem.employee_id);
        		
		  	},
		  	close: function(e){
		    	// if no valid selection - clear input
		    	if (!contact_person_select) this.value('');
		  	}
    });
});
</script>
<style type="text/css">
	.field .k-autocomplete{ border-radius:0px !important; width:215px !important;} 
</style>