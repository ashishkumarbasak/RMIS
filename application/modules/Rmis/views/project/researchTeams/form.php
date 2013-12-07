<script src="<?php echo site_url('assets/extensive/js/date-time/bootstrap-datepicker.min.js'); ?>"></script>
<link rel="stylesheet" href="<?php echo site_url('assets/extensive/css/datepicker.css'); ?>" />
<?php 
	if(isset($project_detail)){
		$project_detail = unserialize($project_detail);
	}
	if(isset($program_detail)){
		$program_detail = unserialize($program_detail);
	}
	if(isset($researchTeam)){
		$researchTeam = unserialize($researchTeam);
	}
	if(isset($teamMembers)){
		$teamMembers = unserialize($teamMembers);
	}
	if(isset($loggedinUserDetails)){
		$loggedinUserDetails = unserialize($loggedinUserDetails);
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
	
	<input type="hidden" name="loggedin_user_instituteID" id="loggedin_user_instituteID" value="<?php if(isset($loggedinUserDetails)) echo $loggedinUserDetails->organogram_id; ?>">
	<input type="hidden" name="loggedin_user_instituteName" id="loggedin_user_instituteName" value="<?php if(isset($loggedinUserDetails)) echo $loggedinUserDetails->organization_name; ?>">
	<div class="form_element">
    	<div class="button_panel" style="margin-right:15px;">
    		<?php if(isset($project_detail) && ($researchTeam!=NULL || $teamMembers!=NULL)) { ?>
		    		<input type="hidden" name="project_id" id="project_id" value="<?php if($project_id!=NULL) echo $project_id; ?>">		    		
		            <input type="submit" name="update_researchTeam" id="update_researchTeam" value="Update" class="k-button button">
                    <input type="button" name="delete_researchTeam" id="delete_researchTeam" value="Delete" class="k-button button">
		    <?php } else { ?>
                <input type="hidden" name="project_id" id="project_id" value="<?php if($project_id!=NULL) echo $project_id; ?>">
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
$(document).ready(function () {
	var crudServiceBaseUrl = "<?php echo base_url();?>",
		dataSource = new kendo.data.DataSource({
			transport: {
				read:  {
					url: crudServiceBaseUrl + "rmis/project/researchTeams/getResearchTeamInformation/<?php if(isset($project_detail) && $project_detail->project_id!=NULL) echo $project_detail->project_id; else echo 0; ?>"
				},
				update: {
					url: crudServiceBaseUrl + "rmis/project/researchTeams/updateMembers",
					dataType: 'json',
					type: 'POST',
				},
				destroy: {
					url: crudServiceBaseUrl + "rmis/project/researchTeams/destroyMembers",
					dataType: 'json',
					type: 'POST',
				},
				create: {
					url: crudServiceBaseUrl + "rmis/project/researchTeams/addMembers",
					dataType: 'json',
					type: 'POST'
				},
				parameterMap: function(options, operation) {
					if($('#research_team_member').val()!=''){
						var teamMembersObj = JSON.parse($('#research_team_member').val());
						if(options.models && operation == "create"){
							teamMembersObj.push(options.models[0]);
							$('#research_team_member').val(kendo.stringify(teamMembersObj));
						}else if(options.models && operation == "destroy"){
							var NewObj = JSON.parse("[]");
							for (var i = 0, len = teamMembersObj.length; i < len; ++i) {
								var teamMemObj = teamMembersObj[i];
								if(teamMemObj.MemberID!=options.models[0].MemberID){
									NewObj.push(teamMemObj);
								}
							}
							$('#research_team_member').val(kendo.stringify(NewObj));
						}else if(options.models && operation == "update"){
							var NewObj = JSON.parse("[]");
							for (var i = 0, len = teamMembersObj.length; i < len; ++i) {
								var teamMemObj = teamMembersObj[i];
								if(teamMemObj.MemberID!=options.models[0].MemberID){
									NewObj.push(teamMemObj);
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
						MemberTypeID:  { editable: false, nullable: true },
						InstituteID: { validation: { required: false } },
						InstituteName: { validation: { required: true } },
						EmployeeID: { validation: { required: false } },
						MemberName: { validation: { required: true } },
						Designation: { validation: { required: true } },
						ContactNo: { validation: { required: true } },
						Email: { validation: { required: true } },
						ProjectID: { editable: false, nullable: true },
						MemberID: { validation: { required: false } },
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
					{ field: "MemberType", title:"Member Type", editor: memberTypeDropDownEditor,  width: "190px"},
					{ field: "InstituteName", title:"Institute Name", editor: institute_name_editor},
					{ field: "MemberName", title:"Member Name", editor: employee_auto_complete },
					{ field: "Designation", title:"Designation", editor: employee_designation_editor},
					{ field: "ContactNo", title:"Contact No", editor: employee_contact_editor},
					{ field: "Email", title:"Email", editor: employee_email_editor},
					{ command: ["edit", "destroy"], title: "&nbsp;", width: "190px"}],
				editable: "inline"
		});
});

function institute_name_editor(container, options){
	var instituteName = $('<input name="' + options.field + '" id="'+ options.field +'" style="height:23px; width:96%;" />');
    instituteName.appendTo(container);
}

function employee_designation_editor(container, options){
	var employeeDesignation = $('<input name="' + options.field + '" id="'+ options.field +'" style="height:23px; width:96%;" />');
    employeeDesignation.appendTo(container);
}

function employee_contact_editor(container, options){
	var employeeContact = $('<input name="' + options.field + '" id="'+ options.field +'" style="height:23px; width:96%;" />');
    employeeContact.appendTo(container);
}

function employee_email_editor(container, options){
	var employeeEmail = $('<input name="' + options.field + '" id="'+ options.field +'" style="height:23px; width:96%;" />');
    employeeEmail.appendTo(container);
}

function employee_auto_complete(container, options) 
{
	$('<input required class="textbox" name="' + options.field + '" id="' + options.field + '-textarea1" />')
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
				options.model.EmployeeID = dataItem.employee_id;
				options.model.MemberName = dataItem.employee_name;
				options.model.Designation = dataItem.designation_name;
				options.model.ContactNo =  dataItem.pre_mobile_no;
				options.model.Email = dataItem.email;
				$("#Designation").val(dataItem.designation_name);
				$("#ContactNo").val(dataItem.pre_mobile_no);
				$("#Email").val(dataItem.email);
				$('#MemberName-textarea2').val(dataItem.employee_name);
				
			}
	});
	$('<input required class="textbox" name="' + options.field + '" id="' + options.field + '-textarea2" style="height:23px; width:96%; display:none;" />')
		.appendTo(container);
}

function memberTypeDropDownEditor(container, options) {
	var ServiceBaseUrl = "<?php echo base_url();?>";
	$('<input required data-text-field="MemberType" data-value-field="MemberTypeID" data-bind="value:MemberTypeID"/>')
		.appendTo(container)
		.kendoDropDownList({
			optionLabel: "Select Type",
			dataSource: {
				transport: {
					read: ServiceBaseUrl + "rmis/project/researchTeams/getListofMemberTypes"
				}
			},
			select: function(e){
				var dataItem = this.dataItem(e.item.index());
				options.model.MemberType = dataItem.MemberType;
				options.model.MemberTypeID = dataItem.MemberTypeID;
				if(dataItem.MemberTypeID=="1" || dataItem.MemberTypeID=="2"){
					$("#InstituteName").val($("#loggedin_user_instituteName").val());
					$("#InstituteName").attr('readonly', 'readonly');
					options.model.InstituteID = $("#loggedin_user_instituteID").val()
					options.model.InstituteName = $("#loggedin_user_instituteName").val();
					$('#MemberName-textarea1').show();
					$("span.k-autocomplete").show();
					$('#MemberName-textarea2').hide();
				}else{
					$("#InstituteName").removeAttr('readonly');
					$("#InstituteName").val('');
					$('#MemberName-textarea1').hide();
					$("span.k-autocomplete").hide();
					$('#MemberName-textarea2').show();
					options.model.EmployeeID = null;
				}
			}
 });
}
</script>
<style type="text/css">
	span.k-autocomplete{ border-radius:0px !important; width: 107px !important; border: solid #bababa 1px; font-size: 13px !important;} 
</style>