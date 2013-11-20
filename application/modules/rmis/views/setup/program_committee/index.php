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
	var committee_chairman_select;
	$("#committee_chairman_name").kendoAutoComplete({
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
		    	committee_chairman_select = false;
		  	},
		  	select: function(e){
		    	committee_chairman_select = true;
			    var dataItem = this.dataItem(e.item.index());                
        		$("#employee_id").val(dataItem.employee_id);
        		$("#committee_chairman").val(dataItem.employee_id);
		  	},
		  	close: function(e){
		    	// if no valid selection - clear input
		    	if (!committee_chairman_select) this.value('');
		  	}
    });
});
</script>
<script type="text/javascript">
	$('#committee_formation_date').datepicker('setStartDate');        
    $(document).ready(function() {
    	var valid;
    	$("#member-name").kendoAutoComplete({
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
		    	valid = false;
		  	},
		  	select: function(e){
		    	valid = true;
			    var dataItem = this.dataItem(e.item.index());                
        		$("#member-designation").val(dataItem.designation_name);
        		$("#employee-id").val(dataItem.employee_id);
		  	},
		  	close: function(e){
		    	// if no valid selection - clear input
		    	if (!valid) this.value('');
		  	}
        });
        var viewModel = kendo.observable({
            employeeId: "",
            memberName: "",
            memberDesignation: "",
            memberRoleinCommittee: "",
            addMember: function() {
                if(validate_member()){
                	this.get("members").push({
	                    id: $('#employee-id').val(),
	                    name: $('#member-name').val(),
	                    designation: $('#member-designation').val(),
	                    roleinCommittee: $('#member-role').val()
	                });
	                $('#employee-id').val("");
	                $('#member-name').val("");
	                $('#member-designation').val("");
	                $('#member-role').val("");
	                var members = this.get("members");
	                $("#committee_members").val(JSON.stringify(members));
                }
            },
            deleteMember: function(e) {
                // the current data item (product) is passed as the "data" field of the event argument
                var member = e.data;
                var members = this.get("members");
                var index = members.indexOf(member);
                // remove the product by using the splice method
                members.splice(index, 1);
                $("#committee_members").val(JSON.stringify(members));
            },
            members: <?php if(isset($committee_members) && $committee_members!=NULL) echo json_encode($committee_members); else echo "[]"; ?>
        });
        kendo.bind($("#committee-members"), viewModel);
    });
    function validate_member(){
    	var return_val=true;
    	if($('#employee-id').val()==''){
    		$('#member-name-error').show();
    		return_val = false;
    	}else{
    		$('#member-name-error').hide();
    	}
    	if($('#member-designation').val()==''){
    		$('#member-designation-error').show();
    		return_val = false;
    	}else{
    		$('#member-designation-error').hide();
    	}
    	if($('#member-role').val()==''){
    		$('#member-role-error').show();
    		return_val = false;
    	}else{
    		$('#member-role-error').hide();
    	}
    	return return_val;
    }
</script>