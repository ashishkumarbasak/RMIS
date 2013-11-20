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
        <?php echo $template['partials']['divInfoForm']; ?>
        <div style="margin:15px;">
        	<div class="row-fluid">
           		<?php echo $grid_data; ?>
        	</div>
       	</div>
    </div> 
</div><!--/content-body -->
<div style="height:10px;"></div>
<script id="popup_editor" type="text/x-kendo-template"></script>
<script type="text/javascript">
function ClickEdit(e) {
	e.preventDefault();
  	var dataItem = this.dataItem($(e.currentTarget).closest("tr"));
   	var edit_url = "/rmis/setup/divisions/edit/"+dataItem.id;
   	window.location = edit_url;
}
$(document).ready(function() {
	var division_head_select;
	$("#division_head_name").kendoAutoComplete({
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
		    	division_head_select = false;
		  	},
		  	select: function(e){
		    	division_head_select = true;
			    var dataItem = this.dataItem(e.item.index());                
        		$("#employee_id").val(dataItem.employee_id);
        		$("#division_head").val(dataItem.employee_id);
        		
		  	},
		  	close: function(e){
		    	// if no valid selection - clear input
		    	if (!committee_chairman_select) this.value('');
		  	}
    });
});
</script>
<style type="text/css">
	.field .k-autocomplete{ border-radius:0px !important; width:215px !important;} 
</style>