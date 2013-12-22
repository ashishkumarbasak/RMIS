<script src="<?php echo site_url('/assets/js/jquery-dynamic-form.js'); ?>"></script>
<script src="<?php echo site_url('assets/extensive/js/date-time/bootstrap-datepicker.min.js'); ?>"></script>
<link rel="stylesheet" href="<?php echo site_url('assets/extensive/css/datepicker.css'); ?>" />
<?php 
	if(isset($program_detail)){
		$program_detail = unserialize($program_detail);
	}
	if(isset($program_me_informations)){
		$program_me_informations = unserialize($program_me_informations);
	}
	if(isset($activityLists)){
		$activityLists = unserialize($activityLists);
	}
	if(isset($last_MandE_committee_details)){
		$last_MandE_committee_details = unserialize($last_MandE_committee_details);
	}
	if(isset($last_MandE_committee_members)){
		$last_MandE_committee_members = unserialize($last_MandE_committee_members);
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
		<div class="form_element">
	    	<div class="label">M & E Information</div>
	        <div class="clear"></div>
	    </div>
   		<div class="left_form">
        	<div class="form_element">
	        	<div class="label width_170px">Date of M & E</div>
	        	<div class="field">
                    <input type="text" name="program_me_date" id="program_me_date" value="<?php if(isset($program_me_informations)) echo $program_me_informations->program_me_date;?>" data-date-format="yyyy-mm-dd" class="textbox disabled" readonly="readonly">
	        	</div>
	        	<div class="clear"></div>
	    	</div>
            
            <div class="form_element">
           		<div class="label width_170px">Program Rating </div>
               	<div class="field">
               		<select name="program_rating" id="program_rating" class="selectionbox">
	            		<option value="">Select Program Rating</option>
						<?php 						
						foreach($program_rating['data'] as $key=>$program_rating_item) { ?>
	            			<option value="<?php echo $program_rating_item['value']; ?>" <?php if(isset($program_me_informations) && $program_me_informations->program_rating==$program_rating_item['value']) { ?> selected="selected" <?php } ?> ><?php echo $program_rating_item['name']; ?></option>
	            		<?php } ?>
	        		</select>
               	</div>
              	<div class="clear"></div>
         	</div>
                            
           	<div class="form_element">
           		<div class="label width_170px">Total Points </div>
               	<div class="field">
               		<input type="text" name="program_total_point" id="program_total_point" value="<?php if($program_me_informations) echo $program_me_informations->program_total_point; ?>" class="textbox disabled" readonly="readonly"/>
              	</div>
              	<div class="clear"></div>
          	</div>  
                            
          	<div class="form_element">
           		<div class="label width_170px">Average Points </div>
              	<div class="field">
                	<input type="text" name="program_average_grade_point" id="program_average_grade_point" value="<?php if($program_me_informations) echo $program_me_informations->program_average_grade_point;?>" class="textbox disabled" readonly="readonly" />
                </div>
                <div class="clear"></div>
          	</div>
		</div>
                        
		<div class="right_form">    
       		<div class="form_element">
           		<div class="label">M & E Type</div>
               	<div class="field">
              		<select name="program_me_type" id="program_me_type" class="selectionbox">
	            		<option value="">Select M&E Type</option>
						<?php 						
						foreach($monitoring_and_evaluation_type['data'] as $key=>$monitoring_and_evaluation_type_item) { ?>
	            			<option value="<?php echo $monitoring_and_evaluation_type_item['value']; ?>" <?php if(isset($program_me_informations) && $program_me_informations->program_me_type==$monitoring_and_evaluation_type_item['value']) { ?> selected="selected" <?php } ?> ><?php echo $monitoring_and_evaluation_type_item['name']; ?></option>
	            		<?php } ?>
	        		</select>
             	</div>
               	<div class="clear"></div>
         	</div>
         	
         	<div class="form_element">
           		<div class="label">Qualitative Status</div>
              	<div class="field">
                   	<select name="program_qualitative_status" id="program_qualitative_status" class="selectionbox">
	            		<option value="">Select Qualitative Status</option>
						<?php 						
						foreach($qualitative_status['data'] as $key=>$qualitative_status_item) { ?>
	            			<option value="<?php echo $qualitative_status_item['value']; ?>" <?php if(isset($program_me_informations) && $program_me_informations->program_qualitative_status==$qualitative_status_item['value']) { ?> selected="selected" <?php } ?> ><?php echo $qualitative_status_item['name']; ?></option>
	            		<?php } ?>
	        		</select>
               	</div>
               	<div class="clear"></div>
           	</div>
                            
          	<div class="form_element">
           		<div class="label">Grade Point</div>
              	<div class="field">
                   	<input type="text" class="textbox disabled" readonly="readonly" name="program_grade_point" id="program_grade_point" value="<?php if($program_me_informations) echo $program_me_informations->program_grade_point;?>" />
               	</div>
               	<div class="clear"></div>
           	</div>
                            
           	<div class="form_element">
           		<div class="label">Letter Grade</div>
              	<div class="field">
              		<input type="text" class="textbox disabled" readonly="readonly" name="program_letter_grade" id="program_letter_grade" value="<?php if($program_me_informations) echo $program_me_informations->program_letter_grade;?>" />
               	</div>
               	<div class="clear"></div>
           	</div>                        
		</div>                                                 
	</div>
	
	<div class="main_form">
		<div class="form_element">
	    	<div class="label">Expected & Actual Output</div>
	        <div class="clear"></div>
	    </div>
	    <div class="left_form">
	    	<div class="form_element">
				<?php
					$program_expectedOutputs = array(); 
					$program_actualOutputs = array(); 
		        	if(isset($program_detail)){
		        		$program_expectedOutputs = explode("---##########---", $program_detail->program_expected_outputs);
						$program_actualOutputs = explode("---##########---", $program_detail->program_actual_outputs);
		        	}
				?>
				
				<div class="label width_170px">Expected output <span class="mandatory">*</span></div>
		        <div class="textarea_field" style="width:75%; float: left; display: inline;">
		        	<?php 
						if(!empty($program_expectedOutputs)) { 
			    			foreach($program_expectedOutputs as $key=>$program_expectedOutput){
			    				if($program_expectedOutput!=NULL){
			    	?>
			    		 
				        	<div>
				            	<textarea name="program_expected_outputs[]" id="program_expected_outputs[]" class="textarea width-100 disabled" disabled="disabled"><?php echo $program_expectedOutput; ?></textarea>
				        	</div>
				        	
			    	<?php 		}
							} 
			    		}
			    	?>
		        </div>
		        <div class="clear"></div>
		 	</div>
	    </div>
	    
	    <div class="right_form">
	    	<div class="form_element">
				<div class="label width_170px">Actual output <span class="mandatory">*</span></div>
		        <div class="textarea_field" style="width:75%; float: left; display: inline;">
		        	<?php 
						if(!empty($program_expectedOutputs)) { 
			    			foreach($program_expectedOutputs as $key=>$program_expectedOutput){
			    				if($program_expectedOutput!=NULL){
			    	?>			    		 
				        	<div>
				            	<textarea name="program_actual_outputs[]" id="program_actual_outputs[]" class="textarea width-100"><?php if(array_key_exists($key, $program_actualOutputs)) echo $program_actualOutputs[$key]; ?></textarea>
				        	</div>  	
			    	<?php 
			    				}
							} 
			    		}
			    	?>
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
	    		<div class="grid-1-6 left" style="width: 25%;">
	        		<div class="heading">Work Element/ Activity</div>
	    		</div>
	    		<div class="grid-1-6 left" style="width: 13%;">
	        		<div class="heading">Actual Start Date</div>
	    		</div>
	    		<div class="grid-1-6 left" style="width: 13%;">
	        		<div class="heading">Actual End Date</div>
	    		</div>
	    		<div class="grid-1-6 left" style="width: 25%;">
	        		<div class="heading">Comments</div>
	    		</div>
	    		<div class="grid-1-6 left" style="width: 10%;">
	        		<div class="heading">Status</div>
	    		</div>
	    		<div class="grid-1-6 left" style="width: 10%;">
	        		<div class="heading">Points</div>
	    		</div>
	    		<div class="clear"></div>
	    	</div>
	    	
	    	<?php if(isset($activityLists) && $activityLists!=NULL) { 
	    			foreach($activityLists as $key=>$activity){
	    	?>
	    			<div id="row-<?php echo $key; ?>">
		    			<div class="row">
					    	<div class="grid-1-20 left">
					    		<input type="hidden" name="ActivityID[]" id="ActivityID" value="<?php echo $activity->ActivityID; ?>" /> 
				        		<input class="textbox no-margin" style="width: 55%;" type="text" name="s_os[]" id="s_os" value="<?php echo $activity->SortOrder; ?>" readonly="readonly" />
				    		</div>
					    	<div class="grid-1-6 left" style="width: 25%;">
					        	<input class="textbox no-margin disabled" disabled="disabled" style="width: 93%;" type="text" name="work_elements[]" id="work_elements" value="<?php echo $activity->WorkElement; ?>"/>
					    	</div>
					    	<div class="grid-1-6 left" style="width: 13%;">
					        	<input class="textbox no-margin" style="width: 86%;" type="text" name="actual_startDates[]" id="actual-startDates-<?php echo $key; ?>" data-date-format="yyyy-mm-dd" value="<?php echo $activity->ActualStartDate; ?>"/>
					    	</div>
					    	<div class="grid-1-6 left" style="width: 13%;">
					        	<input class="textbox no-margin" style="width: 86%;" type="text" name="actual_endDates[]" id="actual-endDates-<?php echo $key; ?>" data-date-format="yyyy-mm-dd" value="<?php echo $activity->ActualEndDate; ?>"/>	
					    	</div>
					    	<div class="grid-1-6 left" style="width: 25%;">
					        	<input class="textbox no-margin" style="width: 93%;" type="text" name="activityComments[]" id="activityComments" value="<?php echo $activity->comments; ?>"/>	
					    	</div>
					    	<div class="grid-1-6 left" style="width: 10%;">
					        	<select name="activityStatuses[]" id="activityStatuses" class="selectionbox" style="width: 98%;">
	            					<option value="">Status</option>
						        	<?php 						
									foreach($activity_statuses['data'] as $key2=>$activity_status) { ?>
				            			<option value="<?php echo $activity_status['value']; ?>" <?php if($activity->activity_status==$activity_status['value']) { ?> selected="selected" <?php } ?> ><?php echo $activity_status['name']; ?></option>
				            		<?php } ?>
			            		</select>	
					    	</div>
					    	<div class="grid-1-6 left" style="width: 10%;">
					        	<input class="activityPoints textbox no-margin" style="width: 85%;" type="text" name="activityPoints[]" id="activityPoints" value="<?php echo $activity->activity_point; ?>"/>	
					    	</div>
					    </div>
				    </div>
				    <script type="text/javascript">
				    	$('#actual-startDates-<?php echo $key; ?>').datepicker('setStartDate');
				    	$('#actual-endDates-<?php echo $key; ?>').datepicker('setStartDate');
				    </script>
	    	<?php				
	    			}
	    	 	  } 
	    	?>
	    </div>
	</div>
	<script type="text/javascript">
	$(document).ready(function () {
		var crudServiceBaseUrl = "<?php echo base_url(); ?>";
		var totalPoints = 0;
		var averagePoints = 0;
		var numberOfTaskElement = 0;
		$('.activityPoints').each(function(){ 
		   $(this).blur(function(){
		   		if($(this).val()!=""){
		   			totalPoints = totalPoints + parseInt($(this).val());
			   		$('#program_total_point').val(totalPoints);
			   		numberOfTaskElement = numberOfTaskElement+1;
			   		averagePoints = parseFloat((totalPoints/numberOfTaskElement) , 2);
			   		$('#program_average_grade_point').val(averagePoints);
			   		$.ajax({
					    url : crudServiceBaseUrl + "Rmis/Setup/Gradings/getGradefromPoints",
					    type: "POST",
					    data : { averagePoints: averagePoints },
					    success: function(data, textStatus, jqXHR){
					       var data = jQuery.parseJSON(data);
					       $('#program_letter_grade').val(data.letter_grade);
					       $('#program_grade_point').val(data.grade_point);
					    },
					    error: function (jqXHR, textStatus, errorThrown){
					 		alert("Problem in request");
					    }
					});	
		   		}
		   }); 
		});
	}); 
	</script>
	
	
	
	<div class="main_form">
	    <div class="left_form">
	    	<div class="form_element">
				<div class="label width_170px">Purpose / Objective</div>
		        <div class="textarea_field" style="width:75%; float: left; display: inline;">
		        	<div>
				    	<textarea name="program_expectedOutputs[]" id="program_expectedOutputs[]" class="textarea width-100 disabled" disabled="disabled"><?php echo $program_detail->program_objective; ?></textarea>
				    </div>
		        </div>
		        <div class="label width_170px">Progress Details <span class="mandatory">*</span></div>
		        <div class="textarea_field" style="width:75%; float: left; display: inline;">
		        	<div>
				    	<textarea name="program_progress_details" id="program_progress_details" class="textarea width-100"><?php echo $program_detail->program_progress_details; ?></textarea>
				    </div>
		        </div>
		        <div class="clear"></div>
		 	</div>
	    </div>
	    
	    <div class="right_form">
	    	<div class="form_element">
				<div class="label width_170px">Major Findings</div>
		        <div class="textarea_field" style="width:75%; float: left; display: inline;">
			        <div>
						<textarea name="program_major_findings" id="program_major_findings" class="textarea width-100"><?php echo $program_detail->program_major_findings; ?></textarea>
					</div>  	
			   	</div>
			   	
			   	<div class="label width_170px">Achievement Information</div>
		        <div class="textarea_field" style="width:75%; float: left; display: inline;">
			        <div>
						<textarea name="program_achievement_information" id="program_achievement_information" class="textarea width-100"><?php echo $program_detail->program_achievement_information; ?></textarea>
					</div>  	
			   	</div>
		        <div class="clear"></div>
		 	</div>
        </div>
	 </div>
	 
	 <div class="main_form">
	 	<div class="form" style="width: 70%;">
	    	<div class="form_element">
	            <div class="label">Chairmain of the Committee: <b><?php if(isset($last_MandE_committee_details)) echo $last_MandE_committee_details->employee_name; ?> </b></div>
	            <div class="clear"></div>
	        </div>
	        <div class="form_element">
	            <div class="label">M&E Committe Members </div>
	            <div class="clear"></div>
	        </div>
	    	<div class="row">
	    		<div class="grid-1-3 left">
	        		<div class="heading">Member Name</div>
	    		</div>
	    		<div class="grid-1-3 left">
	        		<div class="heading">Designation</div>
	    		</div>
	    		<div class="grid-1-3 left">
	        		<div class="heading">Is Present</div>
	    		</div>
	    		<div class="clear"></div>
	    	</div>
	    	
	    	<?php if(isset($last_MandE_committee_members) && $last_MandE_committee_members!=NULL) { 
	    			foreach($last_MandE_committee_members as $mkey=>$member){
	    	?>
	    			<div id="row-<?php echo $mkey; ?>">
		    			<div class="row">
					    	<div class="grid-1-3 left">
					        	<?php echo $member->MemberName; ?>
					    	</div>
					    	<div class="grid-1-3 left">
					        	<?php echo $member->MemberDesignation; ?>	
					        </div>
					    	<div class="grid-1-3 left">
				        		<input type="checkbox" name="is_present[]" id="is_present" class="checkbox" <?php if($member->is_present == "1") { ?> checked="checked" <?php } ?> value="<?php echo $member->committee_member_id; ?>" />
				        		<input type="hidden" name="committee_member_ids[]" id="committee_member_ids" value="<?php echo $member->committee_member_id; ?>" />
				    		</div>
					    </div>
				    </div>
	    	<?php				
	    			}
	    	 	  } 
	    	?>
	    </div>
	 </div>
	 
	 <div class="form_element">
    	<div class="button_panel" style="margin-right:15px;">
    		<?php if(isset($program_me_informations) && ($program_me_informations!=NULL)) { ?>
		    		<input type="hidden" name="id" id="id" value="<?php if($program_me_informations->id!=NULL) echo $program_me_informations->id; ?>">
		    		<input type="hidden" name="program_id" id="program_id" value="<?php if($program_id!=NULL) echo $program_id; ?>">
                    <input type="submit" name="update_programMEInformation" id="update_programMEInformation" value="Update" class="k-button button">
		    		<input type="submit" name="delete_programMEInformation" id="delete_programMEInformation" value="Delete" class="k-button button">		            
		    <?php } else { ?>
                <input type="hidden" name="program_id" id="program_id" value="<?php if($program_id!=NULL) echo $program_id; ?>">
            	<input type="submit" name="save_programMEInformation" id="save_programMEInformation" value="Save" class="k-button button">
        	<?php } ?>
        </div>
        <div class="clear"></div>
    </div>
</form>
<script language="javascript">
	$('#program_me_date').datepicker('setStartDate');
</script>