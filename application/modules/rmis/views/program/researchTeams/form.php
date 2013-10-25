<script src="<?php echo site_url('/assets/js/jquery-dynamic-form.js'); ?>"></script>
<script src="<?php echo site_url('/assets/js/bootstrap-datepicker.js'); ?>"></script>
<link rel="stylesheet" href="<?php echo site_url('assets/extensive/css/datepicker.css'); ?>" />
<?php 
	if(isset($program_detail)){
		$program_detail = unserialize($program_detail);
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
              		<input type="text" name="team_formation_date" id="team_formation_date" data-date-format="yyyy-mm-dd"  value="" class="textbox disabled" readonly="readonly">
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
	    	
	    	<div id='duplicate2'>
		    	<div class="row">
			    	<div class="grid-1-6 left">
			        	<input class="textbox no-margin width-89" type="text" name="member_types[]" id="lower_range" value=""/>
			    	</div>
			    	<div class="grid-1-6 left">
			        	<input class="textbox no-margin width-89" type="text" name="institute_names[]" id="upper_range" value=""/>
			    	</div>
			    	<div class="grid-1-6 left">
			        	<input class="textbox no-margin width-89" type="text" name="member_names[]" id="letter_grade" value=""/>	
			    	</div>
			    	<div class="grid-1-6 left">
			        	<input class="textbox no-margin width-89" type="text" name="designations[]" id="grade_point" value=""/>	
			    	</div>
			    	<div class="grid-1-6 left">
			        	<input class="textbox no-margin width-89" type="text" name="contact_nos[]" id="qualitative_status" value=""/>	
			    	</div>
			    	<div class="grid-1-6 left">
			        	<input class="textbox no-margin width-89" type="text" name="emails[]" id="description" value=""/>	
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
    		<?php if(isset($program_detail) && $program_detail->program_id!=NULL) { ?>
                <input type="hidden" name="program_id" id="program_id" value="<?php echo $program_detail->program_id; ?>">
            <?php } ?>
        	<input type="submit" name="save_researchTeam" id="save_researchTeam" value="Save" class="k-button button">
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



