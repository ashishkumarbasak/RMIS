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
    	<div id="committee_members_table"></div>
    	
    	
	</div>
	
	<input type="hidden" name="committee_members" id="committee_members" value='<?php if(isset($committee_members) && $committee_members!=NULL) echo json_encode($committee_members); else echo "[]"; ?>' />                
	<div class="form_element">
    	<div class="button_panel" style="margin-right:115px;">
        	<?php if(isset($committee_detail) && $committee_detail->committee_id!=NULL) { ?>
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

<script type="text/javascript">                
                $(document).ready(function () {
                    var crudServiceBaseUrl = "<?php echo base_url();?>",
                        dataSource = new kendo.data.DataSource({
                            transport: {
                                read:  {
                                    url: crudServiceBaseUrl + "rmis/setup/programCommittees/getMembers/<?php if(isset($committee_detail) && $committee_detail->committee_id!=NULL) echo $committee_detail->committee_id; else echo 0; ?>"
                                },
                                update: {
                                    url: crudServiceBaseUrl + "rmis/setup/programCommittees/updateMembers",
                                    dataType: 'json',
           							type: 'POST',
                                },
                                destroy: {
                                    url: crudServiceBaseUrl + "rmis/setup/programCommittees/destroyMembers",
                                    dataType: 'json',
           							type: 'POST',
                                },
                                create: {
                                    url: crudServiceBaseUrl + "rmis/setup/programCommittees/addMembers",
                                    dataType: 'json',
           							type: 'POST'
                                },
                                parameterMap: function(options, operation) {
                                	if($('#committee_members').val()!=''){
                                		var membersObj = JSON.parse($('#committee_members').val());
                                		if(options.models && operation == "create"){
                                			membersObj.push(options.models[0]);
                                			$('#committee_members').val(kendo.stringify(membersObj));
                                		}else if(options.models && operation == "destroy"){
                                			membersObj.pop(options.models[0]);
                                			$('#committee_members').val(kendo.stringify(membersObj));
                                		}else if(options.models && operation == "update"){
                                			alert("have problem in update!!! trying to fix");
                                		}
                                	}
                                    if (operation !== "read" && options.models) {
                                        return {models: kendo.stringify(options.models)};
                                    }
                                }
                            },
                            batch: true,
                            pageSize: 20,
                            schema: {
                                model: {
                                    id: "MemberID",
                                    fields: {
                                        MemberID: { editable: false, nullable: true },
                                        MemberName: { validation: { required: true } },
                                        MemberDesignation: { validation: { required: true } },
                                        MemberRole: { validation: { required: true } },
                                    }
                                }
                            }
                        });

                    $("#committee_members_table").kendoGrid({
                        dataSource: dataSource,
                        pageable: true,
                        height: 300,
                        toolbar: [{text:"Add Member", name: "create"}],
                        columns: [
                            { field: "MemberName", title:"Member Name", editor: productnameAutocompleteEditor },
                            { field: "MemberDesignation", title:"Designation", editor: disableMemberDesignation },
                            { field: "MemberRole", title:"Role in Committee" },
                            { command: ["edit", "destroy"], title: "&nbsp;", width: "190px" }],
                        editable: "inline"
                    });
                });
                
                function disableMemberDesignation(container, options){
                	var input = $('<input name="' + options.field + '" id="'+ options.field +'" required="required" readonly="readonly" class="textbox" style="height:25px;" />');
                	input.appendTo(container);
                }
                
                function productnameAutocompleteEditor(container, options) {
                    $('<input required class="textbox" name="' + options.field + '"/>')
                        .appendTo(container)
                        .kendoAutoComplete({
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
				           	select: function(e){
						    	//valid = true;
							    var dataItem = this.dataItem(e.item.index()); 
							    $('#MemberDesignation').val(dataItem.designation_name);
							    options.model.MemberID = dataItem.employee_id;
							    options.model.MemberDesignation = dataItem.designation_name;
				        		//$("#member-designation").val(dataItem.designation_name);
				        		//$("#employee-id").val(dataItem.employee_id);
						  	}
				        });
                }
            </script>

<style type="text/css">
	span.k-autocomplete{ border-radius:0px !important; width: 200px !important; border: solid #bababa 1px; font-size: 13px !important;} 
</style>