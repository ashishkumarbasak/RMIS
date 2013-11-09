<script src="<?php echo site_url('/assets/js/jquery-dynamic-form.js'); ?>"></script>
<script src="<?php echo site_url('/assets/js/bootstrap-datepicker.js'); ?>"></script>
<link rel="stylesheet" href="<?php echo site_url('assets/extensive/css/datepicker.css'); ?>" />
<?php 
	if(isset($project_detail)){
		$project_detail = unserialize($project_detail);
	}
	if(isset($activityLists)){
		$activityLists = unserialize($activityLists);
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
           		<div class="label width_170px">Planned Budget (In Taka) </div>
               	<div class="field">
               		<input type="text" name="program_plannedBudget" id="program_plannedBudget" value="<?php if($program_detail) echo $program_detail->program_plannedBudget;?>" disabled="disabled" class="textbox disabled" />
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
              		<input type="text" name="program_coordinator" id="program_coordinator" value="<?php if($program_detail) echo $program_detail->program_coordinator;?>" class="textbox disabled" disabled="disabled">
             	</div>
               	<div class="clear"></div>
         	</div>
         	
         	<div class="form_element">
           		<div class="label">Approved Budget (in Taka)</div>
              	<div class="field">
                   	<input type="text" name="program_approvedBudget" id="program_approvedBudget" value="<?php if($program_detail) echo $program_detail->program_approvedBudget;?>" class="textbox disabled" disabled="disabled">
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
		<div class="form">
	    	<div class="form_element">
	            <div class="label">Task/Work Element/ Activity Information </div>
	            <div class="clear"></div>
	        </div>
	    	<div class="row">
	    		<div class="grid-1-20 left">
	        		<div class="heading">S/O</div>
	    		</div>
	    		<div class="grid-1-6 left">
	        		<div class="heading">Work Element/ Activity</div>
	    		</div>
	    		<div class="grid-1-6 left" style="width: 15%;">
	        		<div class="heading">Planned Start Date</div>
	    		</div>
	    		<div class="grid-1-6 left" style="width: 15%;">
	        		<div class="heading">Planned End Date</div>
	    		</div>
	    		<div class="grid-1-6 left" style="width: 15%;">
	        		<div class="heading">Actual Start Date</div>
	    		</div>
	    		<div class="grid-1-6 left" style="width: 15%;">
	        		<div class="heading">Actual End Date</div>
	    		</div>
	    		<div class="grid-1-6 left">
	        		<div class="heading">Assign Resources</div>
	    		</div>
	    		<div class="clear"></div>
	    	</div>
	    	
	    	<?php if(isset($activityLists) && $activityLists!=NULL) { 
	    			foreach($activityLists as $key=>$activity){
	    	?>
	    			<div id="row-<?php echo $key; ?>">
		    			<div class="row">
					    	<div class="grid-1-20 left">
				        		<input class="textbox no-margin" style="width: 55%;" type="text" name="s_os[]" id="s_os" value="<?php echo $activity->s_o; ?>"/>
				    		</div>
					    	<div class="grid-1-6 left">
					        	<input class="textbox no-margin" style="width: 89%;" type="text" name="work_elements[]" id="work_elements" value="<?php echo $activity->work_element; ?>"/>
					    	</div>
					    	<div class="grid-1-6 left" style="width: 15%;">
					        	<input class="textbox no-margin" style="width: 88%;" type="text" name="planned_startDates[]" id="planned_startDates" value="<?php echo $activity->planned_startDate; ?>"/>
					    	</div>
					    	<div class="grid-1-6 left" style="width: 15%;">
					        	<input class="textbox no-margin" style="width: 88%;" type="text" name="planned_endDates[]" id="planned_endDates" value="<?php echo $activity->planned_endDate; ?>"/>	
					    	</div>
					    	<div class="grid-1-6 left" style="width: 15%;">
					        	<input class="textbox no-margin" style="width: 88%;" type="text" name="actual_startDates[]" id="actual_startDates" value="<?php echo $activity->actual_startDate; ?>"/>	
					    	</div>
					    	<div class="grid-1-6 left" style="width: 15%;">
					        	<input class="textbox no-margin" style="width: 88%;" type="text" name="actual_endDates[]" id="actual_endDates" value="<?php echo $activity->actual_endDate; ?>"/>	
					    	</div>
					    	<div class="grid-1-6 left">
					        	<input class="textbox no-margin" style="width: 90%;" type="text" name="assign_resources[]" id="assign_resources" value="<?php echo $activity->assign_resource; ?>"/>	
					    	</div>
					    </div>
				    	<div class="row add-more"><a href="javascript:void(0);" onclick="delete_activity(<?php echo $activity->id;?> , <?php echo $project_id; ?>, <?php echo $key; ?> );">[-]</a></div>
				    </div>
	    	<?php				
	    			}
	    	 	  } 
	    	?>
	    	
	    	<div id='duplicate2'>
	    		<div class="row">
		    		<div class="grid-1-20 left">
		        		<input class="textbox no-margin" style="width: 55%;" type="text" name="s_os[]" id="s_os" value=""/>
		    		</div>
			    	<div class="grid-1-6 left">
			        	<input class="textbox no-margin" style="width: 89%;" type="text" name="work_elements[]" id="work_elements" value=""/>
			    	</div>
			    	<div class="grid-1-6 left" style="width: 15%;">
			        	<input class="textbox no-margin" style="width: 88%;" type="text" name="planned_startDates[]" id="planned_startDates" value=""/>
			    	</div>
			    	<div class="grid-1-6 left" style="width: 15%;">
			        	<input class="textbox no-margin" style="width: 88%;" type="text" name="planned_endDates[]" id="planned_endDates" value=""/>	
			    	</div>
			    	<div class="grid-1-6 left" style="width: 15%;">
			        	<input class="textbox no-margin" style="width: 88%;" type="text" name="actual_startDates[]" id="actual_startDates" value=""/>	
			    	</div>
			    	<div class="grid-1-6 left" style="width: 15%;">
			        	<input class="textbox no-margin" style="width: 88%;" type="text" name="actual_endDates[]" id="actual_endDates" value=""/>	
			    	</div>
			    	<div class="grid-1-6 left">
			        	<input class="textbox no-margin" style="width: 90%;" type="text" name="assign_resources[]" id="assign_resources" value=""/>	
			    	</div>
		    	</div>
		    	<div class="add-more row">
		    		<a id="minus2" href="javascript:void(0);">[-]</a> 
		    		<a id="plus2" href="javascript:void(0);">[+]</a>
		    	</div>
		    </div>
	    </div>
	</div>
	
	
	<div class="form_element">
    	<div class="button_panel" style="margin-right:15px;">
    		<?php if(isset($project_detail) && $activityLists!=NULL) { ?>
		    		<input type="hidden" name="project_id" id="project_id" value="<?php if($project_id!=NULL) echo $project_id; ?>">
		    		<input type="button" name="delete_activityLists" id="delete_activityLists" value="Delete" class="k-button button">
		            <input type="submit" name="update_activityLists" id="update_activityLists" value="Update" class="k-button button">
		    <?php } else { ?>
                <input type="hidden" name="project_id" id="project_id" value="<?php if($project_id!=NULL) echo $project_id; ?>">
            	<input type="submit" name="save_activityLists" id="save_activityLists" value="Save" class="k-button button">
        	<?php } ?>
        </div>
        <div class="clear"></div>
    </div>
    
	
</form>
<script type="text/javascript">
$(document).ready(function() {
	$("#duplicate2").dynamicForm("#plus2", "#minus2", {limit:10});		
	return false;
});
</script>
<script type="text/javascript">
	function delete_activity(activity_id, project_id, row_id){
		var r=confirm("Are you sure you want to delete this activity?");
		if (r==true){
		  	var jqxhr = $.post( "<?php echo site_url("rmis/project/activityLists/deleteActivity"); ?>", { activity_id: activity_id, project_id: project_id }, function() {
			  $("#row-" + parseInt(row_id)).remove();
			})
			.fail(function() {
				alert( "error" );
			})
		}
	}
</script>