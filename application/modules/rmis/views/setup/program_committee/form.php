<script src="<?php echo site_url('/assets/js/bootstrap-datepicker.js'); ?>"></script>
<link rel="stylesheet" href="<?php echo site_url('assets/extensive/css/datepicker.css'); ?>" />

<?php 
	if(isset($committee_detail)){
		$committee_detail = unserialize($committee_detail);
	} 
	if(isset($committee_members)){
		$committee_members = unserialize($committee_members);
	}
?>
<form name="frm_program_committee" id="frm_program_committee" method="post" action="">
<div class="main_form">
	<div class="left_form">
        <div class="form_element">
            <div class="label">Chairman of the Committee <span class="mandatory">*&nbsp;</span> </div>
            <div class="field">
            	<input class="textbox no-margin" type="text" name="committee_chairman_name" id="committee_chairman_name" value="<?php if($committee_detail) echo $committee_detail->employee_name; ?>" style="margin-left: 10px;"/>
                <input type="hidden" name="committee_chairman" id="committee_chairman" value="<?php if($committee_detail) echo $committee_detail->employee_id; ?>">
            	<input type="hidden" name="employee_id" id="employee_id" value="<?php if($committee_detail) echo $committee_detail->employee_id; ?>">
            	<div id="committee-chairman-name-error" for="committee_chairman_name" class="error display-none"></div>
            </div>
            <div class="clear small-gap"></div>
        </div>
    </div>
    <div class="right_form">
    	<div class="form_element">
            <div class="label">Committe Formation Date <span class="mandatory">*</span></div>
            <div class="field"><input class="textbox disabled no-margin" readonly="readonly" type="text" name="committee_formation_date" id="committee_formation_date" data-date-format="yyyy-mm-dd"  value="<?php if($committee_detail) echo $committee_detail->committee_formation_date; ?>"/></div>
            <div class="clear small-gap"></div>
        </div>
    </div>    
    <div class="clear"></div>
    <div class="gap"></div>
    <div class="form">
    	<div class="form_element">
            <div class="label">Committe Member</div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="clear"></div>
    
    <div id="committee-members" style="width: 88%;">
    	<div class="dataTable">
    	<table>
        	<thead>
            	<tr>
                	<th align="left">Member Name</th>
                	<th align="left">Designation</th>
                	<th align="left">Role in Committee</th>
                	<th align="left">&nbsp;</th>
            	</tr>
        	</thead>
        	<tbody data-template="row-template" data-bind="source: members"></tbody>
        	<tr>
            	<td>
                	<input type="text" class="textbox no-margin width_100_percent" id="member-name" placeholder="Enter member name" data-bind="value: memberName" />
            		<input type="hidden" name="employee-id" id="employee-id" value="" data-bind="value: employeeId">
            		<div id="member-name-error" for="member_name" class="error display-none">Please choose any employee</div>
            	</td>
            	<td>
                	<input type="text" class="textbox no-margin width_100_percent" readonly="readonly" id="member-designation" placeholder="Enter member designation" data-bind="value: memberDesignation" />
            		<div id="member-designation-error" for="member_name" class="error display-none">Please choose any employee</div>
            	</td>
            	<td>
                	<input type="text" class="textbox no-margin width_100_percent" id="member-role" placeholder="Enter role in committee" data-bind="value: memberRoleinCommittee" />     
            		<div id="member-role-error" for="member_name" class="error display-none">Please choose any employee</div>
            	</td>
            	<td>
                	<button type="button" data-bind="click: addMember">+</button>
            	</td>
        	</tr>
    	</table>
    	</div>
	</div>
	<script id="row-template" type="text/x-kendo-template">
	    <tr>
	        <td data-bind="text: name"></td>
	        <td data-bind="text: designation"></td>
	        <td data-bind="text: roleinCommittee"></td>
	        <td><button type="button" style="font-size:20px;" data-bind="click: deleteMember">-</button></td>
	    </tr>
	</script>
	
    <input type="hidden" name="committee_members" id="committee_members" value="<?php if(isset($committee_members) && $committee_members!=NULL) echo json_encode($committee_members); ?>">                
	<div class="form_element">
    	<div class="button_panel" style="margin-right:115px;">
        	<?php if(isset($committee_detail) && $committee_detail->id!=NULL) { ?>
                <input type="hidden" name="id" id="id" value="<?php echo $committee_detail->committee_id; ?>">
                <input type="button" name="new_committee" id="new_committee" value="New" class="k-button button" onclick="javascript:window.location='<?php echo site_url('rmis/setup/programCommittees');?>'">
                <input type="submit" name="delete_committee" id="delete_committee" value="Delete" class="k-button button"  onclick="return confirm('Are you sure you want to delete this record?');" >
        		<input type="submit" name="save_update" id="save_update" value="Update" class="k-button button">
            <?php } else { ?>
                <input type="submit" name="save_program_committee" id="save_program_committee" value="Save" class="k-button button">
            <?php } ?>
        </div>
        <div class="clear"></div>
    </div>
</div>
</form>
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
