<script src="<?php echo site_url('/assets/js/jquery-dynamic-form.js'); ?>"></script>
<script src="<?php echo site_url('/assets/js/bootstrap-datepicker.js'); ?>"></script>
<link rel="stylesheet" href="<?php echo site_url('assets/extensive/css/datepicker.css'); ?>" />
<?php 
	if(isset($program_detail)){
		$program_detail = unserialize($program_detail);
	}
?>

<form name="program_info" id="program_info" method="post" action="">
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
        	<div class="label width_170px">Division/Unit Name <span class="mandatory">*</span></div>
        	<div class="field">
        		<select name="program_division" id="program_division" class="selectionbox">
            		<option value="">Select Division/Unit Name</option>
					<?php foreach($divisions['data'] as $key=>$division) { ?>
            			<option value="<?php echo $division['division_id']; ?>" <?php if(isset($program_detail) && $program_detail->program_division==$division['division_id']) { ?> selected="selected" <?php } ?>><?php echo $division['division_name']; ?></option>
            		<?php } ?>
        		</select>
        	</div>
        	<div class="clear"></div>
    	</div>
    
    	<div class="form_element">
        	<div class="label width_170px">Research Type <span class="mandatory">*</span> </div>
        	<div class="field">
        		<select name="program_researchType" id="program_researchType" class="selectionbox">
            		<option value="">Select Research Type</option>
 					<?php foreach($research_types['data'] as $key=>$researchType) { ?>
            			<option value="<?php echo $researchType['id']; ?>" <?php if(isset($program_detail) && $program_detail->program_researchType==$researchType['id']) { ?> selected="selected" <?php } ?>><?php echo $researchType['research_type']; ?></option>
            		<?php } ?>
        		</select>
        	</div>
        	<div class="clear"></div>
    	</div>
    	
    	<div class="form_element">
        	<div class="label width_170px">Research Priority <span class="mandatory">*</span></div>
        	<div class="field">
        		<select name="program_researchPriority" id="program_researchPriority" class="selectionbox">
            		<option value="">Select Research Priority</option>
					<?php foreach($research_priorities['data'] as $key=>$research_priority) { ?>
            			<option value="<?php echo $research_priority['id']; ?>" <?php if(isset($program_detail) && $program_detail->program_researchPriority==$research_priority['id']) { ?> selected="selected" <?php } ?>><?php echo $research_priority['research_priority']; ?></option>
            		<?php } ?>
         		</select>
        	</div>
        	<div class="clear"></div>
    	</div>
    
     	<div class="form_element">
        	<div class="label width_170px">Research Status <span class="mandatory">*</span></div>
        	<div class="field">
        		<select name="program_researchStatus" id="program_researchStatus" class="selectionbox">
            		<option value="">Select Research Status</option>
					<?php foreach($research_statuses['data'] as $key=>$research_status) { ?>
           	 			<option value="<?php echo $research_status['id']; ?>" <?php if(isset($program_detail) && $program_detail->program_researchStatus==$research_status['id']) { ?> selected="selected" <?php } ?>><?php echo $research_status['research_status']; ?></option>
            		<?php } ?>
            	</select>
        	</div>
        	<div class="clear"></div>
    	</div>
    
    	<div class="form_element">
        	<div class="label width_170px">Principal Investigator<br />(Or Pm/Coordintor) <span class="mandatory">*</span></div>
        	<div class="field">
        		<input type="text" name="program_coordinator" id="program_coordinator" value="<?php if($program_detail) echo $program_detail->program_coordinator;?>" class="textbox">
        	</div>
        	<div class="clear"></div>
    	</div>
    
     	<div class="form_element">
        	<div class="label width_170px">Designation </div>
        	<div class="field">
        		<input type="text" name="program_coordinatorDesignation" id="program_coordinatorDesignation" value="<?php if($program_detail) echo $program_detail->program_coordinatorDesignation; ?>" class="textbox">
        	</div>
        	<div class="clear"></div>
    	</div>
    
    	<div class="form_element">
        	<div class="label width_170px">Planned Start Date <span class="mandatory">*</span> </div>
        	<div class="field">
        		<input type="text" class="textbox disabled" readonly="readonly" data-date-format="yyyy-mm-dd" name="program_plannedStartDate" id="program_plannedStartDate" value="<?php if($program_detail) echo $program_detail->program_plannedStartDate; ?>" />
        		<span class="input-group-addon">
            		<i class="icon-calendar"></i>
        		</span>
        	</div>
        	<div class="clear"></div>
    	</div>
    
    	<div class="form_element">
        	<div class="label width_170px">Planned End Date <span class="mandatory">*</span></div>
        	<div class="field">
        		<input type="text" class="textbox disabled" readonly="readonly" data-date-format="yyyy-mm-dd" name="program_plannedEndDate" id="program_plannedEndDate" value="<?php if($program_detail) echo $program_detail->program_plannedEndDate; ?>" />
        		<span class="input-group-addon">
            		<i class="icon-calendar"></i>
        		</span>
        	</div>
        	<div class="clear"></div>
    	</div>
    
      	<div class="form_element">
        	<div class="label width_170px">Planned Budget(in Taka) </div>
        	<div class="field">
       	 		<input type="text" name="program_plannedBudget" id="program_plannedBudget" value="<?php if($program_detail) echo $program_detail->program_plannedBudget;?>" class="textbox">
        	</div>
        	<div class="clear"></div>
    	</div>
    	
    	<div class="form_element">
        	<div class="label width_170px">Approved Budget(in Taka) </div>
        	<div class="field">
        		<input type="text" name="program_approvedBudget" id="program_approvedBudget" value="<?php if($program_detail) echo $program_detail->program_approvedBudget;?>" class="textbox">
        	</div>
        	<div class="clear"></div>
    	</div>        
	</div>

	<div class="right_form">	
		<div class="form_element" style="margin-left: 5px;">
			<input type="checkbox" name="is_collaborate" id="is_collaborate" value="1" class="checkbox" onclick="$('#institute_name_div').toggle();" />Is collaborate
		</div>
     
     	<div class="form_element display-none" id="institute_name_div">
        	<div class="label">Institute Name </div>
        	<div class="field">
        		<select name="program_instituteNames[]" id="program_instituteNames" class="selectionbox" multiple="multiple">
            		<?php foreach($institues['data'] as $key=>$institue) { ?>
            			<option value="<?php echo $institue['institute_id']; ?>" <?php if(isset($program_detail) && $program_detail->implementation_location==$institue['institute_id']) { ?> selected="selected" <?php } ?>><?php echo $institue['institute_name']; ?></option>
            		<?php } ?>
            	</select>
        	</div>
        	<div class="clear"></div>
    	</div>
    	
    	<div class="form_element">
        	<div class="label">Department Name </div>
        	<div class="field">
        		<select name="program_departmentName" id="program_departmentName" class="selectionbox">
            		<option value="">Select Department</option>
            		<?php foreach($departments['data'] as $key=>$department) { ?>
            			<option value="<?php echo $department['department_id']; ?>" <?php if(isset($program_detail) && $program_detail->implementation_location==$department['department_id']) { ?> selected="selected" <?php } ?>><?php echo $department['department_name']; ?></option>
            		<?php } ?>
            	</select>
        	</div>
        	<div class="clear"></div>
    	</div>
    
    	<div class="form_element">
        	<div class="label">Regional Station Name </div>
        	<div class="field">
        		<select name="program_regionalStationName" id="program_regionalStationName" class="selectionbox">
            		<option value="">Select Regional Station</option>
					<?php foreach($regional_stations['data'] as $key=>$regional_station) { ?>
            			<option value="<?php echo $regional_station['station_id']; ?>"<?php if(isset($program_detail) && $program_detail->regional_station_name==$regional_station['station_id']) { ?> selected="selected" <?php } ?>><?php echo $regional_station['station_name']; ?></option>
            		<?php } ?>
        		</select>
        	</div>
        	<div class="clear"></div>
    	</div>
    
    	<div class="form_element">
        	<div class="label">Implementation Location/<br>Site/Area </div>
        	<div class="field">
        		<select name="program_implementationLocation" id="program_implementationLocation" class="selectionbox">
            		<option value="">Select Implementation Site</option>
					<?php foreach($implementation_locations['data'] as $key=>$implementation_location) { ?>
            			<option value="<?php echo $implementation_location['implementation_site_id']; ?>" <?php if(isset($program_detail) && $program_detail->implementation_location==$implementation_location['implementation_site_id']) { ?> selected="selected" <?php } ?>><?php echo $implementation_location['implementation_site_name']; ?></option>
            		<?php } ?>
        		</select>
        	</div>
        	<div class="clear"></div>
    	</div>
    	
    	<div class="form_element">
        	<div class="label">Key Words </div>
        	<div class="field">
        		<input type="text" name="program_keywords" id="program_keywords" class="textbox" value="<?php if($program_detail) echo $program_detail->program_keywords;?>">
        	</div>
        	<div class="clear"></div>
    	</div>
    
    	<div class="form_element">
        	<div class="label">Commodity </div>
        	<div class="field">
        		<select name="program_commodities[]" id="program_commodities" class="selectionbox" multiple="multiple">
            		<?php foreach($comodities['data'] as $key=>$comodity) { ?>
            			<option value="<?php echo $comodity['commodity_id']; ?>" <?php if(isset($program_detail) && $program_detail->implementation_location==$comodity['commodity_id']) { ?> selected="selected" <?php } ?>><?php echo $comodity['commodity_name']; ?></option>
            		<?php } ?>
            	</select>
        	</div>
        	<div class="clear"></div>
    	</div>
    
   		<div class="form_element">
        	<div class="label">AEZs </div>
        	<div class="field">
        		<select name="program_aezs[]" id="program_aezs" class="selectionbox" multiple="multiple">
            		<?php foreach($aezs['data'] as $key=>$aez) { ?>
            			<option value="<?php echo $aez['aez_id']; ?>" <?php if(isset($program_detail) && $program_detail->implementation_location==$aez['aez_id']) { ?> selected="selected" <?php } ?>><?php echo $aez['aez_name']; ?></option>
            		<?php } ?>
            	</select>
        	</div>
        	<div class="clear"></div>
    	</div>
    
    	<div class="form_element">
        	<div class="label">Initial Date </div>
        	<div class="field">
        		<input type="text" class="textbox disabled" readonly="readonly" name="program_initiationDate" id="program_initiationDate" data-date-format="yyyy-mm-dd" value="<?php if($program_detail) echo $program_detail->program_initiationDate;?>" />
        		<span class="input-group-addon">
           	 		<i class="icon-calendar"></i>
        		</span>
        	</div>
        	<div class="clear"></div>
    	</div>
    
    	<div class="form_element">
        	<div class="label">Completion Date </div>
        	<div class="field">
        		<input type="text" class="textbox disabled" readonly="readonly" name="program_completionDate" id="program_completionDate" data-date-format="yyyy-mm-dd" value="<?php if($program_detail) echo $program_detail->program_completionDate;?>" />
        		<span class="input-group-addon">
            		<i class="icon-calendar"></i>
        		</span>
        	</div>
        	<div class="clear"></div>
    	</div>
    </div>
    <div class="clear"></div>
	

	<div class="form_element">
    	<div class="label width_170px">Program Goal <span class="mandatory">*</span></div>
       	<div class="textarea_field"><textarea name="program_goal" id="program_goal" class="textarea width_68_percent"><?php if($program_detail) echo $program_detail->program_goal;?></textarea></div>
        <div class="clear"></div>
  	</div>
  	
  	<div class="form_element">
    	<div class="label width_170px">Purpose/Objective <span class="mandatory">*</span></div>
       	<div class="textarea_field"><textarea name="program_objective" id="program_objective" class="textarea width_68_percent"><?php if($program_detail) echo $program_detail->program_objective;?></textarea></div>
        <div class="clear"></div>
  	</div>

    
	<div class="form_element">
        <div class="label width_170px">Expected output <span class="mandatory">*</span></div>
        <div class="textarea_field" style="width:75%; float: left; display: inline;"> 
        	<div id='duplicate2'>
            	<textarea name="program_expectedOutputs[]" id="program_expectedOutputs[]" class="textarea width-91"></textarea>
            	<span style="font-size:16px;"><a id="minus2" href="">[-]</a> <a id="plus2" href="">[+]</a></span>
        	</div>
        </div>
        <div class="clear"></div>
    </div>
    
    <div class="form_element">
        <div class="button_panel" style="margin-right: 110px;">
			<?php if(isset($program_detail) && $program_detail->program_id!=NULL) { ?>
                <input type="hidden" name="program_id" id="program_id" value="<?php echo $program_detail->program_id; ?>">
                <input type="submit" name="update_program_information" id="update_program_information" value="Update" class="k-button button">
                <input type="submit" name="delete_program_information" id="delete_program_information" onclick="javascript:return confirm('Do you want to delete this program?');" value="Delete" class="k-button button">
            <?php } else { ?>
            	<input type="reset" name="reset_program_information" id="reset_program_information" value="Reset" class="k-button button">
                <input type="submit" name="save_program_information" id="save_program_information" value="Save" class="k-button button">
            <?php } ?>                
            
        </div>
        <div class="clear"></div>
    </div>
                   
</div>
</form>
<script language="javascript">
	$('#program_plannedStartDate').datepicker('setStartDate');
	$('#program_plannedEndDate').datepicker('setEndDate');
	
	$('#program_initiationDate').datepicker('setStartDate');
	$('#program_completionDate').datepicker('setEndDate');
</script>
<script type="text/javascript">
$(document).ready(function() {
	$("#duplicate2").dynamicForm("#plus2", "#minus2", {limit:10});		
	return false;
});
$(document).ready(function() {
	$('#showInstituteName').change(function() {
    	$('#collaborate_institute_name').toggle();
	});
});
</script> 