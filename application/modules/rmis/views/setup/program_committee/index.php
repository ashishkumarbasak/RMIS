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
        <?php echo $template['partials']['progCommInfoForm']; ?>
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
        var edit_url = "/rmis/setup/programCommittees/edit/"+dataItem.id;
        window.location = edit_url;
    }	
</script>
<script type="text/javascript">
$(document).ready(function() {
	$(function() {
		$( "#committee_chairman_name" ).focus(function() {
		  	$("#employee_id").val(""); 
			$("#committee_chairman").val("");
		});
		$( "#committee_chairman_name" ).autocomplete({
       		source: function(request, response) {
            	$.ajax({ url: "<?php echo site_url('rmis/employees'); ?>",
            		data: { term: $("#committee_chairman_name").val()},
            		dataType: "json",
            		type: "POST",
            		success: function(data){
            			response( $.map( data, function( employee ) {
			              return {
			                label: employee.employee_name,
			                value: employee.employee_name,
			                id: employee.employee_id
			              }
			            }));
            		}
      			});
			},
          	minLength: 2,
          	select: function( event, ui ) {
				$("#employee_id").val(ui.item.id); 
				$("#committee_chairman").val(ui.item.id); 
			}
    	});
	});
});
</script>