<script src="<?php echo site_url('/assets/js/jquery-dynamic-form.js'); ?>"></script>
<script src="<?php echo site_url('/assets/js/bootstrap-datepicker.js'); ?>"></script>
<link rel="stylesheet" href="<?php echo site_url('assets/extensive/css/datepicker.css'); ?>" />
<?php 
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
                    <input type="text" name="monitoring_evaluation_date" id="monitoring_evaluation_date" value="<?php if($program_detail) echo $program_detail->monitoring_evaluation_date;?>" data-date-format="yyyy-mm-dd" class="textbox disabled" readonly="readonly">
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
	            			<option value="<?php echo $program_rating_item['value']; ?>" <?php if(isset($program_detail) && $program_detail->program_rating==$program_rating_item['value']) { ?> selected="selected" <?php } ?> ><?php echo $program_rating_item['name']; ?></option>
	            		<?php } ?>
	        		</select>
               	</div>
              	<div class="clear"></div>
         	</div>
                            
           	<div class="form_element">
           		<div class="label width_170px">Total Points </div>
               	<div class="field">
               		<input type="text" name="total_point" id="total_point" value="<?php if($program_detail) echo $program_detail->total_point; ?>" class="textbox disabled" readonly="readonly"/>
              	</div>
              	<div class="clear"></div>
          	</div>  
                            
          	<div class="form_element">
           		<div class="label width_170px">Average Points </div>
              	<div class="field">
                	<input type="text" name="average_grade_point" id="average_grade_point" value="<?php if($program_detail) echo $program_detail->average_grade_point;?>" class="textbox disabled" readonly="readonly" />
                </div>
                <div class="clear"></div>
          	</div>
		</div>
                        
		<div class="right_form">    
       		<div class="form_element">
           		<div class="label">M & E Type</div>
               	<div class="field">
              		<select name="m_and_e_type" id="m_and_e_type" class="selectionbox">
	            		<option value="">Select M&E Type</option>
						<?php 						
						foreach($monitoring_and_evaluation_type['data'] as $key=>$monitoring_and_evaluation_type_item) { ?>
	            			<option value="<?php echo $monitoring_and_evaluation_type_item['value']; ?>" <?php if(isset($program_detail) && $program_detail->m_and_e_type==$monitoring_and_evaluation_type_item['value']) { ?> selected="selected" <?php } ?> ><?php echo $monitoring_and_evaluation_type_item['name']; ?></option>
	            		<?php } ?>
	        		</select>
             	</div>
               	<div class="clear"></div>
         	</div>
         	
         	<div class="form_element">
           		<div class="label">Qualitative Status</div>
              	<div class="field">
                   	<select name="qualitative_status" id="qualitative_status" class="selectionbox">
	            		<option value="">Select Qualitative Status</option>
						<?php 						
						foreach($qualitative_status['data'] as $key=>$qualitative_status_item) { ?>
	            			<option value="<?php echo $qualitative_status_item['value']; ?>" <?php if(isset($program_detail) && $program_detail->qualitative_status==$qualitative_status_item['value']) { ?> selected="selected" <?php } ?> ><?php echo $qualitative_status_item['name']; ?></option>
	            		<?php } ?>
	        		</select>
               	</div>
               	<div class="clear"></div>
           	</div>
                            
          	<div class="form_element">
           		<div class="label">Grade Point</div>
              	<div class="field">
                   	<input type="text" class="textbox disabled" disabled="disabled" name="program_grade_point" id="program_grade_point" value="<?php if($program_detail) echo $program_detail->program_grade_point;?>" />
               	</div>
               	<div class="clear"></div>
           	</div>
                            
           	<div class="form_element">
           		<div class="label">Letter Grade</div>
              	<div class="field">
              		<input type="text" class="textbox disabled" disabled="disabled" name="program_letter_grade" id="program_letter_grade" value="<?php if($program_detail) echo $program_detail->program_letter_grade;?>" />
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
		        	if(isset($program_detail))
					$program_expectedOutputs = explode("---##########---", $program_detail->program_expected_outputs);
				?>
				
				<div class="label width_170px">Expected output <span class="mandatory">*</span></div>
		        <div class="textarea_field" style="width:75%; float: left; display: inline;">
		        	<?php 
						if(!empty($program_expectedOutputs)) { 
			    			foreach($program_expectedOutputs as $key=>$program_expectedOutput){
			    				if($program_expectedOutput!=NULL){
			    	?>
			    		 
				        	<div>
				            	<textarea name="program_expectedOutputs[]" id="program_expectedOutputs[]" class="textarea width-100 disabled" disabled="disabled"><?php echo $program_expectedOutput; ?></textarea>
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
				            	<textarea name="program_expectedOutputs[]" id="program_expectedOutputs[]" class="textarea width-100"></textarea>
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
				        		<input class="textbox no-margin" style="width: 60%;" type="text" name="s_os[]" id="s_os" value="<?php echo $activity->SortOrder; ?>" readonly="readonly" />
				    		</div>
					    	<div class="grid-1-6 left" style="width: 25%;">
					        	<input class="textbox no-margin disabled" disabled="disabled" style="width: 93%;" type="text" name="work_elements[]" id="work_elements" value="<?php echo $activity->WorkElement; ?>"/>
					    	</div>
					    	<div class="grid-1-6 left" style="width: 13%;">
					        	<input class="textbox no-margin" style="width: 86%;" type="text" name="actual_startDates[]" id="actual-startDates-<?php echo $key; ?>" data-date-format="yyyy-mm-dd" value=""/>
					    	</div>
					    	<div class="grid-1-6 left" style="width: 13%;">
					        	<input class="textbox no-margin" style="width: 86%;" type="text" name="actual_endDates[]" id="actual-endDates-<?php echo $key; ?>" data-date-format="yyyy-mm-dd" value=""/>	
					    	</div>
					    	<div class="grid-1-6 left" style="width: 25%;">
					        	<input class="textbox no-margin" style="width: 93%;" type="text" name="activityComments[]" id="activityComments" value=""/>	
					    	</div>
					    	<div class="grid-1-6 left" style="width: 10%;">
					        	<select name="activityStatuses" id="activityStatuses" class="selectionbox" style="width: 98%;">
	            					<option value="">Status</option>
						        	<?php 						
									foreach($activity_statuses['data'] as $key=>$activity_status) { ?>
				            			<option value="<?php echo $activity_status['value']; ?>" <?php if(isset($program_detail) && $program_detail->qualitative_status==$activity_status['value']) { ?> selected="selected" <?php } ?> ><?php echo $activity_status['name']; ?></option>
				            		<?php } ?>
			            		</select>	
					    	</div>
					    	<div class="grid-1-6 left" style="width: 10%;">
					        	<input class="textbox no-margin" style="width: 85%;" type="text" name="activityPoints[]" id="activityPoints" value=""/>	
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
	
	<div class="main_form">
	    <div class="left_form">
	    	<div class="form_element">
				<div class="label width_170px">Purpose / Objective <span class="mandatory">*</span></div>
		        <div class="textarea_field" style="width:75%; float: left; display: inline;">
		        	<div>
				    	<textarea name="program_expectedOutputs[]" id="program_expectedOutputs[]" class="textarea width-100 disabled" disabled="disabled"><?php echo $program_detail->program_objective; ?></textarea>
				    </div>
		        </div>
		        <div class="label width_170px">Program Details <span class="mandatory">*</span></div>
		        <div class="textarea_field" style="width:75%; float: left; display: inline;">
		        	<div>
				    	<textarea name="program_expectedOutputs[]" id="program_expectedOutputs[]" class="textarea width-100"><?php echo $program_expectedOutput; ?></textarea>
				    </div>
		        </div>
		        <div class="clear"></div>
		 	</div>
	    </div>
	    
	    <div class="right_form">
	    	<div class="form_element">
				<div class="label width_170px">Major Findings <span class="mandatory">*</span></div>
		        <div class="textarea_field" style="width:75%; float: left; display: inline;">
			        <div>
						<textarea name="program_expectedOutputs[]" id="program_expectedOutputs[]" class="textarea width-100"></textarea>
					</div>  	
			   	</div>
			   	
			   	<div class="label width_170px">Achievement Information <span class="mandatory">*</span></div>
		        <div class="textarea_field" style="width:75%; float: left; display: inline;">
			        <div>
						<textarea name="program_expectedOutputs[]" id="program_expectedOutputs[]" class="textarea width-100"></textarea>
					</div>  	
			   	</div>
		        <div class="clear"></div>
		 	</div>
        </div>
	 </div>
	 
	 <div class="form_element">
    	<div class="button_panel" style="margin-right:15px;">
    		<?php if(isset($program_detail) && ($activityLists!=NULL)) { ?>
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
	$('#monitoring_evaluation_date').datepicker('setStartDate');
</script>