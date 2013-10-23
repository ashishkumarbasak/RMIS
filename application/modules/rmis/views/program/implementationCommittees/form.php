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
	       	<div class="textarea_field"><textarea name="research_program_title" id="research_program_title" class="textarea_small width_68_percent"><?php if($program_detail) echo $program_detail->research_program_title;?></textarea></div>
	        <div class="clear"></div>
	  	</div>
                        
     	<div class="left_form">
        	<div class="form_element">
	        	<div class="label width_170px">Program Area <span class="mandatory">*</span></div>
	        	<div class="field">
	        		<select name="program_area" id="program_area" class="selectionbox">
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
               		<input type="text" name="program_plannedBudget" id="program_plannedBudget" value="<?php if($program_detail) echo $program_detail->program_plannedBudget;?>" class="textbox disabled"  readonly="readonly">
               	</div>
              	<div class="clear"></div>
         	</div>
                            
           	<div class="form_element">
           		<div class="label width_170px">Planned Start Date </div>
               	<div class="field">
               		<input type="text" name="program_plannedStartDate" id="program_plannedStartDate" value="<?php if($program_detail) echo $program_detail->program_plannedEndDate; ?>" class="textbox disabled" readonly="readonly">
              	</div>
              	<div class="clear"></div>
          	</div>  
                            
          	<div class="form_element">
           		<div class="label width_170px">Planned End Date </div>
              	<div class="field">
                	<input type="text" name="program_plannedEndDate" id="program_plannedEndDate" value="<?php if($program_detail) echo $program_detail->program_plannedBudget;?>" class="textbox disabled" readonly="readonly">
                </div>
                <div class="clear"></div>
          	</div>
		</div>
                        
		<div class="right_form">    
       		<div class="form_element">
           		<div class="label">Principal Investigator <br />(or PM/Coordinator)</div>
               	<div class="field">
              		<input type="text" name="program_coordinator" id="program_coordinator" value="<?php if($program_detail) echo $program_detail->program_coordinator;?>" class="textbox disabled" readonly="readonly">
             	</div>
               	<div class="clear"></div>
         	</div>
         	
         	<div class="form_element">
           		<div class="label">Approved Budget (in Taka)</div>
              	<div class="field">
                   	<input type="text" name="program_approvedBudget" id="program_approvedBudget" value="<?php if($program_detail) echo $program_detail->program_approvedBudget;?>" class="textbox disabled" readonly="readonly">
               	</div>
               	<div class="clear"></div>
           	</div>
                            
          	<div class="form_element">
           		<div class="label">Initiation Date</div>
              	<div class="field">
                   	<input type="text" class="textbox disabled" readonly="readonly" name="program_initiationDate" id="program_initiationDate" data-date-format="yyyy-mm-dd" value="<?php if($program_detail) echo $program_detail->program_initiationDate;?>" />
               	</div>
               	<div class="clear"></div>
           	</div>
                            
           	<div class="form_element">
           		<div class="label">Completion Date</div>
              	<div class="field">
              		<input type="text" class="textbox disabled" readonly="readonly" name="program_completionDate" id="program_completionDate" data-date-format="yyyy-mm-dd" value="<?php if($program_detail) echo $program_detail->program_completionDate;?>" />
               	</div>
               	<div class="clear"></div>
           	</div>                        
		</div>                                                 
	</div>
	
	<div class="main_form">
		<div class="left_form">
        	<div class="form_element">
           		<div class="label width_170px">Committee Formation Date </div>
                <div class="field">
               		<input type="text" name="committee_formation_date" id="committee_formation_date" value="" data-date-format="yyyy-mm-dd" class="textbox disabled" readonly="readonly">
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
	    		<div class="grid-1-5 left">
	        		<div class="heading">Member Name</div>
	    		</div>
	    		<div class="grid-1-5 left">
	        		<div class="heading">Designation</div>
	    		</div>
	    		<div class="grid-1-5 left">
	        		<div class="heading">Committee Member Type</div>
	    		</div>
	    		<div class="grid-1-5 left">
	        		<div class="heading">Contact No</div>
	    		</div>
	    		<div class="grid-1-5 left">
	        		<div class="heading">Email</div>
	    		</div>
	    		<div class="clear"></div>
	    	</div>
	    	
	    	<div id='duplicate2'>
		    	<div class="row">
			    	<div class="grid-1-5 left">
			        	<input class="textbox no-margin width-91" type="text" name="member_names[]" id="member_names" value=""/>
			    	</div>
			    	<div class="grid-1-5 left">
			        	<input class="textbox no-margin width-91" type="text" name="designations[]" id="designations" value=""/>
			    	</div>
			    	<div class="grid-1-5 left">
			        	<input class="textbox no-margin width-91" type="text" name="committee_member_types[]" id="committee_member_types" value=""/>	
			    	</div>
			    	<div class="grid-1-5 left">
			        	<input class="textbox no-margin width-91" type="text" name="contact_nos[]" id="contact_nos" value=""/>	
			    	</div>
			    	<div class="grid-1-5 left">
			        	<input class="textbox no-margin width-91" type="text" name="emails[]" id="emails" value=""/>	
			    	</div>
			    </div>
			    <div class="row add-more">
			    	<a id="minus2" href="javascript:void(0);">[-]</a> 
			    	<a id="plus2" href="javascript:void(0);">[+]</a>
			    </div>
			</div>
	    </div>
	</div>
	
	<div class="form_element">
    	<div class="button_panel" style="margin-right: 15px;">
        		<?php if(isset($program_detail) && $program_detail->program_id!=NULL) { ?>
	                <input type="hidden" name="program_id" id="program_id" value="<?php echo $program_detail->program_id; ?>">
	            <?php } ?>
                <input type="submit" name="save_program_implcommittee" id="save_program_implcommittee" value="Save" class="k-button button">
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
<script language="javascript">
	$('#committee_formation_date').datepicker('setStartDate');
</script>