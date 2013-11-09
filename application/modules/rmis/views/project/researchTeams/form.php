<script src="<?php echo site_url('/assets/js/jquery-dynamic-form.js'); ?>"></script>
<script src="<?php echo site_url('/assets/js/bootstrap-datepicker.js'); ?>"></script>
<link rel="stylesheet" href="<?php echo site_url('assets/extensive/css/datepicker.css'); ?>" />
<?php 
	if(isset($project_detail)){
		$project_detail = unserialize($project_detail);
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
	    	<div class="label width_170px">Title of Research Programme <span class="mandatory">*</span></div>
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
                	<input type="text" name="program_plannedEndDate" id="program_plannedEndDate" value="<?php if($program_detail) echo $program_detail->program_plannedBudget;?>" class="textbox disabled" disabled="disabled" />
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
	    	<div class="row">
	    		<div class="grid-1-6 left">
	        		<div class="heading">Member Type</div>
	    		</div>
	    		<div class="grid-1-6 left">
	        		<div class="heading">Institute Name</div>
	    		</div>
	    		<div class="grid-1-6 left">
	        		<div class="heading">Member Name</div>
	    		</div>
	    		<div class="grid-1-6 left">
	        		<div class="heading">Designation</div>
	    		</div>
	    		<div class="grid-1-6 left">
	        		<div class="heading">Contact No</div>
	    		</div>
	    		<div class="grid-1-6 left">
	        		<div class="heading">Email</div>
	    		</div>
	    		<div class="clear"></div>
	    	</div>
	    	
	    	<?php if(isset($teamMembers) && $teamMembers!=NULL) { 
	    			foreach($teamMembers as $key=>$member){
	    	?>
	    			<div id="row-<?php echo $key; ?>">
	    			<div class="row">
				    	<div class="grid-1-6 left">
				        	<input class="textbox no-margin width-89" type="text" name="member_types[]" id="member_types" value="<?php echo $member->member_type; ?>"/>
				    	</div>
				    	<div class="grid-1-6 left">
				        	<input class="textbox no-margin width-89" type="text" name="institute_names[]" id="institute_names" value="<?php echo $member->institute_name; ?>"/>
				    	</div>
				    	<div class="grid-1-6 left">
				        	<input class="textbox no-margin width-89" type="text" name="member_names[]" id="member_names" value="<?php echo $member->member_name; ?>"/>	
				    	</div>
				    	<div class="grid-1-6 left">
				        	<input class="textbox no-margin width-89" type="text" name="designations[]" id="designations" value="<?php echo $member->designation; ?>"/>	
				    	</div>
				    	<div class="grid-1-6 left">
				        	<input class="textbox no-margin width-89" type="text" name="contact_nos[]" id="contact_nos" value="<?php echo $member->contact_no; ?>"/>	
				    	</div>
				    	<div class="grid-1-6 left">
				        	<input class="textbox no-margin width-89" type="text" name="emails[]" id="emails" value="<?php echo $member->email; ?>"/>	
				    	</div>
				    </div>
				    <div class="row add-more"><a href="javascript:void(0);" onclick="delete_research_team_member(<?php echo $member->id;?> , <?php echo $member->project_id; ?>, <?php echo $key; ?> );">[-]</a></div>
				    </div>
	    	<?php				
	    			}
	    	 	  } 
	    	?>
	    	
	    	<div id='duplicate2'>
		    	<div class="row">
			    	<div class="grid-1-6 left">
			        	<input class="textbox no-margin width-89" type="text" name="member_types[]" id="member_types" value=""/>
			    	</div>
			    	<div class="grid-1-6 left">
			        	<input class="textbox no-margin width-89" type="text" name="institute_names[]" id="institute_names" value=""/>
			    	</div>
			    	<div class="grid-1-6 left">
			        	<input class="textbox no-margin width-89" type="text" name="member_names[]" id="member_names" value=""/>	
			    	</div>
			    	<div class="grid-1-6 left">
			        	<input class="textbox no-margin width-89" type="text" name="designations[]" id="designations" value=""/>	
			    	</div>
			    	<div class="grid-1-6 left">
			        	<input class="textbox no-margin width-89" type="text" name="contact_nos[]" id="contact_nos" value=""/>	
			    	</div>
			    	<div class="grid-1-6 left">
			        	<input class="textbox no-margin width-89" type="text" name="emails[]" id="emails" value=""/>	
			    	</div>
			    </div>
			    <div class="row add-more">
			    	<a id="minus2" href="javascript:void(0);">[-]</a>
			    	<a id="plus2" href="javascript:void(0);">[+]</a>
			    </div>
			    <div class="clear"></div>
			</div>
	    </div>
	</div>
	
	
	<div class="form_element">
    	<div class="button_panel" style="margin-right:15px;">
    		<?php if(isset($project_detail) && ($researchTeam!=NULL || $teamMembers!=NULL)) { ?>
		    		<input type="hidden" name="project_id" id="project_id" value="<?php if($project_id!=NULL) echo $project_id; ?>">
		    		<input type="button" name="delete_researchTeam" id="delete_researchTeam" value="Delete" class="k-button button">
		            <input type="submit" name="update_researchTeam" id="update_researchTeam" value="Update" class="k-button button">
		    <?php } else { ?>
                <input type="hidden" name="project_id" id="project_id" value="<?php if($project_id!=NULL) echo $project_id; ?>">
            	<input type="submit" name="save_researchTeam" id="save_researchTeam" value="Save" class="k-button button">
        	<?php } ?>
        </div>
        <div class="clear"></div>
    </div>
	
</form>
<script language="javascript">
	$('#team_formation_date').datepicker('setStartDate');
</script>
<script type="text/javascript">
$(document).ready(function() {
	$("#duplicate2").dynamicForm("#plus2", "#minus2", {limit:10});		
	return false;
});
</script>
<script type="text/javascript">
	function delete_research_team_member(team_member_id, project_id, row_id){
		var r=confirm("Are you sure you want to delete this team member?");
		if (r==true){
		  	var jqxhr = $.post( "<?php echo site_url("rmis/project/researchTeams/deleteTeamMember"); ?>", { team_member_id: team_member_id, project_id: project_id }, function() {
			  $("#row-" + parseInt(row_id)).remove();
			})
			.fail(function() {
				alert( "error" );
			})
		}
	}
</script>