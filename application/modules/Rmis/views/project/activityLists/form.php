<script src="<?php echo site_url('assets/extensive/js/date-time/bootstrap-datepicker.min.js'); ?>"></script>
<link rel="stylesheet" href="<?php echo site_url('assets/extensive/css/datepicker.css'); ?>" />
<?php 
	if(isset($project_detail)){
		$project_detail = unserialize($project_detail);
	}
	if(isset($program_detail)){
		$program_detail = unserialize($program_detail);
	}
	if(isset($activityLists)){
		$activityLists = unserialize($activityLists);
	}
?>
<form name="research_info" id="research_info" method="post" action="">
<div class="main_form">
   		<div class="form_element">
	    	<div class="label width_170px">Title of Research Project <span class="mandatory">*</span></div>
	       	<div class="textarea_field"><textarea name="research_project_title" id="research_project_title" disabled="disabled" class="textarea_small disabled width_68_percent"><?php if($project_detail) echo $project_detail->research_project_title;?></textarea></div>
	        <div class="clear"></div>
	  	</div>
                        
     	<div class="left_form">
        	<div class="form_element">
                <div class="label width_170px">&nbsp;</div>
                <div class="textarea_field">
                    <input type="radio" name="project_type" id="project_type" value="Independent" <?php if(isset($project_detail) && $project_detail->project_type=="Independent"){ ?> checked="checked" <?php } ?> disabled="disabled"> Independent 
                    <input type="radio" name="project_type" id="project_type" value="Program" <?php if(isset($project_detail) && $project_detail->project_type=="Program"){ ?> checked="checked" <?php } ?>disabled="disabled"> Program &nbsp; 
                </div>
                <div class="clear"></div>
            </div>
      		
      		<div class="form_element">
           		<div class="label width_170px">Planned Start Date </div>
               	<div class="field">
               		<input type="text" name="project_planned_start_date" id="project_planned_start_date" value="<?php if($project_detail) echo $project_detail->project_planned_start_date; ?>" class="textbox disabled" disabled="disabled" />
              	</div>
              	<div class="clear"></div>
          	</div>  
                            
          	<div class="form_element">
           		<div class="label width_170px">Planned End Date </div>
              	<div class="field">
                	<input type="text" name="project_planned_end_date" id="project_planned_end_date" value="<?php if($project_detail) echo $project_detail->project_planned_end_date;?>" class="textbox disabled" disabled="disabled" />
                </div>
                <div class="clear"></div>
          	</div>
		</div>
                        
		<div class="right_form">    
       		<div class="form_element">
           		<div class="label">Principal Investigator <br />(or PM/Coordinator)</div>
               	<div class="field">
              		<input type="text" name="project_coordinator" id="project_coordinator" value="<?php if($project_detail) echo $project_detail->project_coordinator;?>" class="textbox disabled" disabled="disabled" />
             	</div>
               	<div class="clear"></div>
         	</div>
         	
         	<div class="form_element">
           		<div class="label">Initiation Date</div>
              	<div class="field">
                   	<input type="text" class="textbox disabled" disabled="disabled" name="project_initiation_date" id="project_initiation_date" data-date-format="yyyy-mm-dd" value="<?php if($project_detail) echo $project_detail->project_initiation_date;?>" />
               	</div>
               	<div class="clear"></div>
           	</div>
                            
           	<div class="form_element">
           		<div class="label">Completion Date</div>
              	<div class="field">
              		<input type="text" class="textbox disabled" disabled="disabled" name="project_completion_date" id="project_completion_date" data-date-format="yyyy-mm-dd" value="<?php if($project_detail) echo $project_detail->project_completion_date;?>" />
               	</div>
               	<div class="clear"></div>
           	</div>                        
		</div>                                                 
	</div>
    
    <!-- Program Info-->
    <?php if(isset($project_detail) && $project_detail->project_type=="Program" && $project_detail->program_id!=""){ ?>
    <div class="main_form">
        <div class="form_element">
            <div class="label width_170px">Title of Research Program</div>
            <div class="textarea_field"><textarea name="research_program_title" id="research_program_title" disabled="disabled" class="textarea_small disabled width_68_percent"><?php if($program_detail!=NULL) echo $program_detail->research_program_title; ?></textarea></div>
            <div class="clear"></div>
        </div>
                    
        <div class="left_form">
            <div class="form_element">
                <div class="label width_170px">Program Area </div>
                <div class="field">
                    <select name="program_area" id="program_area" class="selectionbox disabled" disabled="disabled">
                        <option value="">Select Program Area</option>
                        <?php 
                        
                        foreach($program_areas['data'] as $key=>$program_area) { ?>
                            <option value="<?php echo $program_area['program_area_id']; ?>" <?php if(isset($program_detail) && $program_detail->program_area==$program_area['program_area_id']) { ?> selected="selected" <?php } ?> ><?php echo $program_area['program_area_name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="clear"></div>
            </div>
                        
            <div class="form_element">
                <div class="label width_170px">Planned Budget (in Taka) </div>
                <div class="field">
                    <input type="text" name="program_planned_budget" id="program_planned_budget" value="<?php if($program_detail!=NULL) echo $program_detail->program_planned_budget; ?>" class="textbox disabled" disabled="disabled" />
                </div>
                <div class="clear"></div>
            </div> 
        </div>
                    
        <div class="right_form">    
            <div class="form_element">
                <div class="label">Principal Investigator <br />(or PM/Coordinator)</div>
                <div class="field">
                    <input type="text" name="program_coordinator" id="program_coordinator" value="<?php if($program_detail!=NULL) echo $program_detail->program_coordinator; ?>" class="textbox disabled" disabled="disabled" />
                </div>
                <div class="clear"></div>
            </div>
                        
            <div class="form_element">
                <div class="label">Approved Budget (in Taka)</div>
                <div class="field">
                    <input type="text" name="program_approved_budget" id="program_approved_budget" value="<?php if($program_detail!=NULL) echo $program_detail->program_approved_budget; ?>" class="textbox disabled" disabled="disabled" />
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <?php } ?>
	
	
	<div class="main_form">
		<div class="form">
	    	<div class="form_element">
	            <div class="label">Task/Work Element/ Activity Information </div>
	            <div class="clear"></div>
	        </div>
            
            <div id="activity_list_information" style="width: 100%;">
    			<div id="activity_list_information_table"></div>
			</div>	
			<input type="hidden" name="activity_lists" id="activity_lists" value='<?php if(isset($activityLists) && $activityLists!=NULL) echo json_encode($activityLists); else echo "[]"; ?>' />
	    </div>
	</div>
	
	
	<div class="form_element">
    	<div class="button_panel" style="margin-right:15px;">
    		<?php if(isset($project_detail) && $activityLists!=NULL) { ?>
		    		<input type="hidden" name="project_id" id="project_id" value="<?php if($project_id!=NULL) echo $project_id; ?>">
                    <input type="submit" name="update_activityLists" id="update_activityLists" value="Update" class="k-button button">
		    		<input type="button" name="delete_activityLists" id="delete_activityLists" onclick="javascript:return confirm('Do you want to delete this project activity list information?');" value="Delete" class="k-button button">
		    <?php } else { ?>
                <input type="hidden" name="project_id" id="project_id" value="<?php if($project_id!=NULL) echo $project_id; ?>">
            	<input type="submit" name="save_activityLists" id="save_activityLists" value="Save" class="k-button button">
        	<?php } ?>
        </div>
        <div class="clear"></div>
    </div>
    
	
</form>
<script type="text/javascript">
	function delete_activity(activity_id, project_id, row_id){
		var r=confirm("Are you sure you want to delete this activity?");
		if (r==true){
		  	var jqxhr = $.post( "<?php echo site_url("Rmis/Project/ActivityLists/deleteActivity"); ?>", { activity_id: activity_id, project_id: project_id }, function() {
			  $("#row-" + parseInt(row_id)).remove();
			})
			.fail(function() {
				alert( "error" );
			})
		}
	}
</script>
<script type="text/javascript">                
$(document).ready(function () {
	var crudServiceBaseUrl = "<?php echo base_url();?>",
		dataSource = new kendo.data.DataSource({
			transport: {
				read:  {
					url: crudServiceBaseUrl + "Rmis/Project/ActivityLists/get_activityLists/<?php if(isset($project_detail) && $project_detail->project_id!=NULL) echo $project_detail->project_id; else echo 0; ?>"
				},
				update: {
					url: crudServiceBaseUrl + "Rmis/Project/ActivityLists/updateMembers",
					dataType: 'json',
					type: 'POST',
				},
				destroy: {
					url: crudServiceBaseUrl + "Rmis/Project/ActivityLists/destroyMembers",
					dataType: 'json',
					type: 'POST',
				},
				create: {
					url: crudServiceBaseUrl + "Rmis/Project/ActivityLists/addMembers",
					dataType: 'json',
					type: 'POST'
				},
				parameterMap: function(options, operation) {
					if($('#activity_lists').val()!=''){
						var activitiesObj = JSON.parse($('#activity_lists').val());
						if(options.models && operation == "create"){
							activitiesObj.push(options.models[0]);
							$('#activity_lists').val(kendo.stringify(activitiesObj));
						}else if(options.models && operation == "destroy"){
							var NewObj = JSON.parse("[]");
							for (var i = 0, len = activitiesObj.length; i < len; ++i) {
								var actObj = activitiesObj[i];
								if(actObj.ActivityID!=options.models[0].ActivityID){
									NewObj.push(actObj);
								}
							}
							$('#activity_lists').val(kendo.stringify(NewObj));
						}else if(options.models && operation == "update"){
							var NewObj = JSON.parse("[]");
							for (var i = 0, len = activitiesObj.length; i < len; ++i) {
								var actObj = activitiesObj[i];
								if(actObj.ActivityID!=options.models[0].ActivityID){
									NewObj.push(actObj);
								}
							}
							NewObj.push(options.models[0]);
							$('#activity_lists').val(kendo.stringify(NewObj));
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
					id: "AssignResource",
					fields: {						
						SortOrder: { validation: { required: true } },
						WorkElement: { validation: { required: true } },
						PlannedStartDate: { validation: { required: true } },
						PlannedEndDate: { validation: { required: true } },
						ActualStartDate: { validation: { required: true } },
						ActualEndDate: { validation: { required: true } },
						AssignResource: { validation: { required: true } },
						AssignResourceID: { editable: false, nullable: true },
						ActivityID: { editable: false, nullable: true },
						ProgramID: { editable: false, nullable: true }
					}
				}
			}
		});

		$("#activity_list_information_table").kendoGrid({
				dataSource: dataSource,
				pageable: false,
				height: 200,
				toolbar: [{text:"Add Activity Information", name: "create"}],
				columns: [
					{ field: "SortOrder", title:"S/O", width: "50px"},
					{ field: "WorkElement", title:"Work Element"},
					{ field: "PlannedStartDate", title:"Planned Start Date",  editor: FuncPlannedStartDate },
					{ field: "PlannedEndDate", title:"Planned End Date",  editor: FuncPlannedEndDate },
					{ field: "ActualStartDate", title:"Actual Start Date",  editor: FuncActualStartDate },
					{ field: "ActualEndDate", title:"Actual Start Date",  editor: FuncActualEndDate },
					{ field: "AssignResource", title:"Assign Resource", editor: employee_auto_complete },
					{ command: ["edit", "destroy"], title: "&nbsp;", width: "190px" }],
				editable: "inline"
		});
});
                
/*function dateTimeEditor(container, options) {
	$('<input data-text-field="' + options.field + '" data-value-field="' + options.field + '" data-bind="value:' + options.field + '" data-format="' + options.format + '"/>')
	.appendTo(container)
	.kendoDatePicker({});
}*/

function FuncPlannedStartDate(container, options){
	var input = $('<input name="' + options.field + '" id="'+ options.field +'" required="required" data-date-format="yyyy-mm-dd" readonly="readonly" class="textbox" style="height:25px; width:95%;" />');
	input.appendTo(container);
	$('#PlannedStartDate').datepicker('setStartDate');
}

function FuncPlannedEndDate(container, options){
	var input = $('<input name="' + options.field + '" id="'+ options.field +'" required="required" data-date-format="yyyy-mm-dd" readonly="readonly" class="textbox" style="height:25px; width:95%;" />');
	input.appendTo(container);
	$('#PlannedEndDate').datepicker('setStartDate');
}

function FuncActualStartDate(container, options){
	var input = $('<input name="' + options.field + '" id="'+ options.field +'" required="required" data-date-format="yyyy-mm-dd" readonly="readonly" class="textbox" style="height:25px; width:95%;" />');
	input.appendTo(container);
	$('#ActualStartDate').datepicker('setStartDate');
}

function FuncActualEndDate(container, options){
	var input = $('<input name="' + options.field + '" id="'+ options.field +'" required="required" data-date-format="yyyy-mm-dd" readonly="readonly" class="textbox" style="height:25px; width:95%;" />');
	input.appendTo(container);
	$('#ActualEndDate').datepicker('setStartDate');
}

function numeric_textbox(container, options) { 
	$('<input  maxlength="5"  name="' + options.field + '"/>')
	 .appendTo(container)
	 .kendoNumericTextBox({
	   min:1,
	   max: 32767,
	   format:"#",
	   decimals:0
	 })
}

function employee_auto_complete(container, options) 
{
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
					read: "<?php echo site_url('Rmis/employees2'); ?>"
				}
			},
			select: function(e){
				var dataItem = this.dataItem(e.item.index()); 
				options.model.AssignResource = dataItem.employee_name;
				options.model.AssignResourceID = dataItem.employee_id;
			}
		});
}
</script>
