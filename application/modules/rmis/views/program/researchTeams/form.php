<script src="<?php echo site_url('/assets/js/bootstrap-datepicker.js'); ?>"></script>
<link rel="stylesheet" href="<?php echo site_url('assets/extensive/css/datepicker.css'); ?>" />
<?php 
	if(isset($program_detail)){
		$program_detail = unserialize($program_detail);
	}
	if(isset($researchTeam)){
		$researchTeam = unserialize($researchTeam);
	}
	if(isset($teamMembers)){
		$teamMembers = unserialize($teamMembers);
	}
?>
<form name="research_info" id="research_info" method="post" action="">
	<div class="main_form">
   		<div class="form_element">
	    	<div class="label width_170px">Title of Research Program <span class="mandatory">*</span></div>
	       	<div class="textarea_field"><textarea name="research_program_title" id="research_program_title" disabled="disabled" class="textarea_small disabled width_68_percent"><?php if($program_detail) echo $program_detail->research_program_title;?></textarea></div>
	        <div class="clear"></div>
	  	</div>
                        
     	<div class="left_form">
        	<div class="form_element">
	        	<div class="label width_170px">Program Area <span class="mandatory">*</span></div>
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
           		<div class="label width_170px">Planned Start Date </div>
               	<div class="field">
               		<input type="text" name="program_plannedStartDate" id="program_plannedStartDate" value="<?php if($program_detail) echo $program_detail->program_plannedEndDate; ?>" class="textbox disabled" disabled="disabled" />
              	</div>
              	<div class="clear"></div>
          	</div>  
                            
          	<div class="form_element">
           		<div class="label width_170px">Planned End Date </div>
              	<div class="field">
                	<input type="text" name="program_plannedEndDate" id="program_plannedEndDate" value="<?php if($program_detail) echo $program_detail->program_plannedEndDate;?>" class="textbox disabled" disabled="disabled" />
                </div>
                <div class="clear"></div>
          	</div>
		</div>
                        
		<div class="right_form">    
       		<div class="form_element">
           		<div class="label">Principal Investigator <br />(or PM/Coordinator)</div>
               	<div class="field">
              		<input type="text" name="program_coordinator" id="program_coordinator" value="<?php if($program_detail) echo $program_detail->program_coordinator;?>" class="textbox disabled" disabled="disabled" />
             	</div>
               	<div class="clear"></div>
         	</div>
         	
         	<div class="form_element">
           		<div class="label">Initiation Date</div>
              	<div class="field">
                   	<input type="text" class="textbox disabled" disabled="disabled" name="program_initiationDate" id="program_initiationDate" data-date-format="yyyy-mm-dd" value="<?php if($program_detail) echo $program_detail->program_initiationDate;?>" />
               	</div>
               	<div class="clear"></div>
           	</div>
                            
           	<div class="form_element">
           		<div class="label">Completion Date</div>
              	<div class="field">
              		<input type="text" class="textbox disabled" disabled="disabled" name="program_completionDate" id="program_completionDate" data-date-format="yyyy-mm-dd" value="<?php if($program_detail) echo $program_detail->program_completionDate;?>" />
               	</div>
               	<div class="clear"></div>
           	</div>                        
		</div>                                                 
	</div>
	
	
	<div class="main_form">
		<div class="left_form">
        	<div class="form_element">
           		<div class="label width_170px">Team Formation Date </div>
                <div class="field">
              		<input type="text" name="team_formation_date" id="team_formation_date" data-date-format="yyyy-mm-dd"  value="<?php if($researchTeam) echo $researchTeam->team_formation_date;?>" class="textbox disabled" readonly="readonly">
               		<span class="input-group-addon">
	            		<i class="icon-calendar"></i>
	        		</span>
               	</div>
           		<div class="clear"></div>
        	</div>
		</div>
                    
		<div class="form">
	    	<div class="form_element">
	            <div class="label">Team Information</div>
	            <div class="clear"></div>
	        </div>
	    	
            <div id="research_team_information" style="width: 100%;">
                <div id="research_team_information_table"></div>
            </div>	
            <input type="hidden" name="research_team_member" id="research_team_member" value='<?php if(isset($teamMembers) && $teamMembers!=NULL) echo json_encode($teamMembers); else echo "[]"; ?>' />
	    
        </div>
	</div>
	
	
	<div class="form_element">
    	<div class="button_panel" style="margin-right:15px;">
    		<?php if(isset($program_detail) && ($researchTeam!=NULL || $teamMembers!=NULL)) { ?>
		    		<input type="hidden" name="program_id" id="program_id" value="<?php if($program_id!=NULL) echo $program_id; ?>">
		    		<input type="button" name="delete_researchTeam" id="delete_researchTeam" value="Delete" class="k-button button">
		            <input type="submit" name="update_researchTeam" id="update_researchTeam" value="Update" class="k-button button">
		    <?php } else { ?>
                <input type="hidden" name="program_id" id="program_id" value="<?php if($program_id!=NULL) echo $program_id; ?>">
            	<input type="submit" name="save_researchTeam" id="save_researchTeam" value="Save" class="k-button button">
        	<?php } ?>
        </div>
        <div class="clear"></div>
    </div>
	
</form>
<script language="javascript">
	$('#team_formation_date').datepicker();
</script>

<script type="text/javascript">
	function delete_research_team_member(team_member_id, program_id, row_id){
		var r=confirm("Are you sure you want to delete this team member?");
		if (r==true){
		  	var jqxhr = $.post( "<?php echo site_url("rmis/program/researchTeams/deleteTeamMember"); ?>", { team_member_id: team_member_id, program_id: program_id }, function() {
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
					url: crudServiceBaseUrl + "rmis/program/researchTeams/getResearchTeamInformation/<?php if(isset($program_detail) && $program_detail->program_id!=NULL) echo $program_detail->program_id; else echo 0; ?>"
				},
				update: {
					url: crudServiceBaseUrl + "rmis/program/researchTeams/updateMembers",
					dataType: 'json',
					type: 'POST',
				},
				destroy: {
					url: crudServiceBaseUrl + "rmis/program/researchTeams/destroyMembers",
					dataType: 'json',
					type: 'POST',
				},
				create: {
					url: crudServiceBaseUrl + "rmis/program/researchTeams/addMembers",
					dataType: 'json',
					type: 'POST'
				},
				parameterMap: function(options, operation) {
					if($('#research_team_member').val()!=''){
						var activitiesObj = JSON.parse($('#research_team_member').val());
						if(options.models && operation == "create"){
							activitiesObj.push(options.models[0]);
							$('#research_team_member').val(kendo.stringify(activitiesObj));
						}else if(options.models && operation == "destroy"){
							var NewObj = JSON.parse("[]");
							for (var i = 0, len = activitiesObj.length; i < len; ++i) {
								var actObj = activitiesObj[i];
								if(actObj.ActivityID!=options.models[0].ActivityID){
									NewObj.push(actObj);
								}
							}
							$('#research_team_member').val(kendo.stringify(NewObj));
						}else if(options.models && operation == "update"){
							var NewObj = JSON.parse("[]");
							for (var i = 0, len = activitiesObj.length; i < len; ++i) {
								var actObj = activitiesObj[i];
								if(actObj.ActivityID!=options.models[0].ActivityID){
									NewObj.push(actObj);
								}
							}
							NewObj.push(options.models[0]);
							$('#research_team_member').val(kendo.stringify(NewObj));
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
						MemberType: { validation: { required: true } },
						InstituteID: { validation: { required: true } },
						MemberID: { validation: { required: true } },
						MemberName: { validation: { required: true } },
						Designation: { validation: { required: true } },
						ContactNo: { validation: { required: true } },
						Email: { validation: { required: true } },
						ProgramID: { editable: false, nullable: true }
					}
				}
			}
		});

		$("#research_team_information_table").kendoGrid({
				dataSource: dataSource,
				pageable: false,
				height: 200,
				toolbar: [{text:"Add Team Member", name: "create"}],
				columns: [
					{ field: "MemberType", title:"Member Type", editor: memberTypeDropDownEditor},
					{ field: "InstituteName", title:"Institute Name"},
					{ field: "MemberName", title:"Member Name", editor: employee_auto_complete },
					{ field: "Designation", title:"Designation"},
					{ field: "ContactNo", title:"Contact No"},
					{ field: "Email", title:"Email"},
					{ command: ["edit", "destroy"], title: "&nbsp;", width: "190px"}],
				editable: "inline"
		});
});

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
					read: "<?php echo site_url('rmis/employees2'); ?>"
				}
			},
			select: function(e){
				var dataItem = this.dataItem(e.item.index()); 
				options.model.AssignResource = dataItem.employee_name;
				options.model.AssignResourceID = dataItem.employee_id;
			}
		});
}

function memberTypeDropDownEditor(container, options) {
	var ServiceBaseUrl = "<?php echo base_url();?>";
	$('<input required data-text-field="member_type" data-value-field="member_type_id" data-bind="value:member_type_id"/>')
		.appendTo(container)
		.kendoDropDownList({
			optionLabel: "Select Type",
			dataSource: {
				transport: {
					read: ServiceBaseUrl + "rmis/program/researchTeams/getListofMemberTypes"
				}
			},
			select: function(e){
				var dataItem = this.dataItem(e.item.index());
				options.model.member_type = dataItem.member_type;
				options.model.member_type_id = dataItem.member_type_id;
			}
 });
}
</script>