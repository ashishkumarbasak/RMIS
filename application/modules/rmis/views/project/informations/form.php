<script src="<?php echo site_url('/assets/js/jquery-dynamic-form.js'); ?>"></script>
<script src="<?php echo site_url('/assets/js/bootstrap-datepicker.js'); ?>"></script>
<link rel="stylesheet" href="<?php echo site_url('assets/extensive/css/datepicker.css'); ?>" />
<?php 
	if(isset($project_detail)){
		$project_detail = unserialize($project_detail);
	}
?>

<form name="project_info" id="project_info" method="post" action="">
<div class="main_form">
	
	<div class="form_element">
    	<div class="label width_170px">Title of Research Project <span class="mandatory">*</span></div>
       	<div class="textarea_field"><textarea name="research_project_title" id="research_project_title" class="textarea_small width_68_percent"><?php if($project_detail) echo $project_detail->research_project_title;?></textarea></div>
        <div class="clear"></div>
  	</div>
	
	<div class="left_form">
		<div class="form_element">
        	<div class="label width_170px">Project Code</div>
        	<div class="field">
        		<input type="text" name="project_code" id="project_code" value="<?php if($project_detail) echo $project_detail->project_code;?>" class="textbox">
        	</div>
        	<div class="clear"></div>
    	</div>
    	
    	<div class="form_element">
        	<div class="label width_170px">Project Prefix</div>
        	<div class="field">
        		<input type="text" name="project_prefix" id="project_prefix" value="<?php if($project_detail) echo $project_detail->project_prefix;?>" class="textbox">
        	</div>
        	<div class="clear"></div>
    	</div>
   </div>
   <div class="right_form">
   		<input type="radio" name="is_project_independent" id="is_project_independent" value="0"> Independent
   		<input type="radio" name="is_project_independent" id="is_project_independent" value="1"> Program
   </div>
   <div class="clear"></div>
   
    <div class="left_form">	
		<div class="form_element">
			<div class="label width_170px">&nbsp;</div>
			<div class="field">
				<input type="checkbox" name="is_collaborate" id="is_collaborate" value="1" class="checkbox" <?php if(isset($project_detail) && $project_detail->is_collaborate=="1"){ ?> checked="checked" <?php } ?> onclick="$('#institute_name_div').toggle();" />Is collaborate
			</div>
			<div class="clear"></div>
		</div>
		
    	<div class="form_element">
        	<div class="label width_170px">Division/Unit Name <span class="mandatory">*</span></div>
        	<div class="field">
        		<select name="project_division" id="project_division" class="selectionbox">
            		<option value="">Select Division/Unit Name</option>
					<?php foreach($divisions['data'] as $key=>$division) { ?>
            			<option value="<?php echo $division['division_id']; ?>" <?php if(isset($project_detail) && $project_detail->project_division==$division['division_id']) { ?> selected="selected" <?php } ?>><?php echo $division['division_name']; ?></option>
            		<?php } ?>
        		</select>
        	</div>
        	<div class="clear"></div>
    	</div>
    
    	<div class="form_element">
        	<div class="label width_170px">Research Type <span class="mandatory">*</span> </div>
        	<div class="field">
        		<select name="project_researchType" id="project_researchType" class="selectionbox">
            		<option value="">Select Research Type</option>
 					<?php foreach($research_types['data'] as $key=>$researchType) { ?>
            			<option value="<?php echo $researchType['id']; ?>" <?php if(isset($project_detail) && $project_detail->project_researchType==$researchType['id']) { ?> selected="selected" <?php } ?>><?php echo $researchType['research_type']; ?></option>
            		<?php } ?>
        		</select>
        	</div>
        	<div class="clear"></div>
    	</div>
    	
    	<div class="form_element">
        	<div class="label width_170px">Research Priority <span class="mandatory">*</span></div>
        	<div class="field">
        		<select name="project_researchPriority" id="project_researchPriority" class="selectionbox">
            		<option value="">Select Research Priority</option>
					<?php foreach($research_priorities['data'] as $key=>$research_priority) { ?>
            			<option value="<?php echo $research_priority['id']; ?>" <?php if(isset($project_detail) && $project_detail->project_researchPriority==$research_priority['id']) { ?> selected="selected" <?php } ?>><?php echo $research_priority['research_priority']; ?></option>
            		<?php } ?>
         		</select>
        	</div>
        	<div class="clear"></div>
    	</div>
    
     	<div class="form_element">
        	<div class="label width_170px">Research Status <span class="mandatory">*</span></div>
        	<div class="field">
        		<select name="project_researchStatus" id="project_researchStatus" class="selectionbox">
            		<option value="">Select Research Status</option>
					<?php foreach($research_statuses['data'] as $key=>$research_status) { ?>
           	 			<option value="<?php echo $research_status['id']; ?>" <?php if(isset($project_detail) && $project_detail->project_researchStatus==$research_status['id']) { ?> selected="selected" <?php } ?>><?php echo $research_status['research_status']; ?></option>
            		<?php } ?>
            	</select>
        	</div>
        	<div class="clear"></div>
    	</div>
    
    	<div class="form_element">
        	<div class="label width_170px">Principal Investigator<br />(Or Pm/Coordintor) <span class="mandatory">*</span></div>
        	<div class="field">
        		<input type="text" name="project_coordinator" id="project_coordinator" value="<?php if($project_detail) echo $project_detail->project_coordinator;?>" class="textbox">
        	</div>
        	<div class="clear"></div>
    	</div>
    
     	<div class="form_element">
        	<div class="label width_170px">Designation </div>
        	<div class="field">
        		<input type="text" name="project_coordinatorDesignation" id="project_coordinatorDesignation" value="<?php if($project_detail) echo $project_detail->project_coordinatorDesignation; ?>" class="textbox">
        	</div>
        	<div class="clear"></div>
    	</div>
    
    	<div class="form_element">
        	<div class="label width_170px">Planned Start Date <span class="mandatory">*</span> </div>
        	<div class="field">
        		<input type="text" class="textbox disabled" readonly="readonly" data-date-format="yyyy-mm-dd" name="project_plannedStartDate" id="project_plannedStartDate" value="<?php if($project_detail) echo $project_detail->project_plannedStartDate; ?>" />
        		<span class="input-group-addon">
            		<i class="icon-calendar"></i>
        		</span>
        	</div>
        	<div class="clear"></div>
    	</div>
    
    	<div class="form_element">
        	<div class="label width_170px">Planned End Date <span class="mandatory">*</span></div>
        	<div class="field">
        		<input type="text" class="textbox disabled" readonly="readonly" data-date-format="yyyy-mm-dd" name="project_plannedEndDate" id="project_plannedEndDate" value="<?php if($project_detail) echo $project_detail->project_plannedEndDate; ?>" />
        		<span class="input-group-addon">
            		<i class="icon-calendar"></i>
        		</span>
        	</div>
        	<div class="clear"></div>
    	</div>
    
      	<div class="form_element">
        	<div class="label width_170px">Project Planned Budget <br>(in Taka) </div>
        	<div class="field">
       	 		<input type="text" name="project_plannedBudget" id="project_plannedBudget" value="<?php if($project_detail) echo $project_detail->project_plannedBudget;?>" class="textbox">
        	</div>
        	<div class="clear"></div>
    	</div>        
	</div>

	<div class="right_form">	
		<div class="form_element <?php if((isset($project_detail) && $project_detail->is_collaborate=="0") || !isset($project_detail)){ ?> display-none <?php } ?> " id="institute_name_div">
        	<?php
        		$project_instituteNames = array(); 
        		if(isset($project_detail))
				$project_instituteNames = explode(",", $project_detail->project_instituteNames);
			?>
        	<div class="label">Institute Name </div>
        	<div class="field">
        		<select name="project_instituteNames[]" id="project_instituteNames" class="selectionbox" multiple="multiple">
            		<?php foreach($institues['data'] as $key=>$institue) { ?>
            			<option value="<?php echo $institue['institute_id']; ?>" <?php if(in_array($institue['institute_id'],$project_instituteNames)) { ?> selected="selected" <?php } ?>><?php echo $institue['institute_name']; ?></option>
            		<?php } ?>
            	</select>
        	</div>
        	<div class="clear"></div>
    	</div>
    	
    	<div class="form_element">
        	<div class="label">Department Name </div>
        	<div class="field">
        		<select name="project_departmentName" id="project_departmentName" class="selectionbox">
            		<option value="">Select Department</option>
            		<?php foreach($departments['data'] as $key=>$department) { ?>
            			<option value="<?php echo $department['department_id']; ?>" <?php if(isset($project_detail) && $project_detail->project_departmentName==$department['department_id']) { ?> selected="selected" <?php } ?>><?php echo $department['department_name']; ?></option>
            		<?php } ?>
            	</select>
        	</div>
        	<div class="clear"></div>
    	</div>
    
    	<div class="form_element">
        	<div class="label">Regional Station Name </div>
        	<div class="field">
        		<select name="project_regionalStationName" id="project_regionalStationName" class="selectionbox">
            		<option value="">Select Regional Station</option>
					<?php foreach($regional_stations['data'] as $key=>$regional_station) { ?>
            			<option value="<?php echo $regional_station['station_id']; ?>"<?php if(isset($project_detail) && $project_detail->project_regionalStationName==$regional_station['station_id']) { ?> selected="selected" <?php } ?>><?php echo $regional_station['station_name']; ?></option>
            		<?php } ?>
        		</select>
        	</div>
        	<div class="clear"></div>
    	</div>
    
    	<div class="form_element">
        	<div class="label">Implementation Location/<br>Site/Area </div>
        	<div class="field">
        		<select name="project_implementationLocation" id="project_implementationLocation" class="selectionbox">
            		<option value="">Select Implementation Site</option>
					<?php foreach($implementation_locations['data'] as $key=>$implementation_location) { ?>
            			<option value="<?php echo $implementation_location['implementation_site_id']; ?>" <?php if(isset($project_detail) && $project_detail->project_implementationLocation==$implementation_location['implementation_site_id']) { ?> selected="selected" <?php } ?>><?php echo $implementation_location['implementation_site_name']; ?></option>
            		<?php } ?>
        		</select>
        	</div>
        	<div class="clear"></div>
    	</div>
    	
    	<div class="form_element">
        	<div class="label">Key Words </div>
        	<div class="field">
        		<input type="text" name="project_keywords" id="project_keywords" class="textbox" value="<?php if($project_detail) echo $project_detail->project_keywords;?>">
        	</div>
        	<div class="clear"></div>
    	</div>
    
    	<div class="form_element">
    		<?php
        		$project_commodities = array(); 
        		if(isset($project_detail))
				$project_commodities = explode(",", $project_detail->project_commodities);
			?>
        	<div class="label">Commodity </div>
        	<div class="field">
        		<select name="project_commodities[]" id="project_commodities" class="selectionbox" multiple="multiple">
            		<?php foreach($comodities['data'] as $key=>$comodity) { ?>
            			<option value="<?php echo $comodity['commodity_id']; ?>" <?php if(in_array($comodity['commodity_id'],$project_commodities)) { ?> selected="selected" <?php } ?>><?php echo $comodity['commodity_name']; ?></option>
            		<?php } ?>
            	</select>
        	</div>
        	<div class="clear"></div>
    	</div>
    
   		<div class="form_element">
   			<?php
        		$project_aezs = array(); 
        		if(isset($project_detail))
				$project_aezs = explode(",", $project_detail->project_aezs);
			?>
        	<div class="label">AEZs </div>
        	<div class="field">
        		<select name="project_aezs[]" id="project_aezs" class="selectionbox" multiple="multiple">
            		<?php foreach($aezs['data'] as $key=>$aez) { ?>
            			<option value="<?php echo $aez['aez_id']; ?>" <?php if(in_array($aez['aez_id'], $project_aezs)) { ?> selected="selected" <?php } ?>><?php echo $aez['aez_name']; ?></option>
            		<?php } ?>
            	</select>
        	</div>
        	<div class="clear"></div>
    	</div>
    
    	<div class="form_element">
        	<div class="label">Initiation Date </div>
        	<div class="field">
        		<input type="text" class="textbox disabled" readonly="readonly" name="project_initiationDate" id="project_initiationDate" data-date-format="yyyy-mm-dd" value="<?php if($project_detail) echo $project_detail->project_initiationDate;?>" />
        		<span class="input-group-addon">
           	 		<i class="icon-calendar"></i>
        		</span>
        	</div>
        	<div class="clear"></div>
    	</div>
    
    	<div class="form_element">
        	<div class="label">Completion Date </div>
        	<div class="field">
        		<input type="text" class="textbox disabled" readonly="readonly" name="project_completionDate" id="project_completionDate" data-date-format="yyyy-mm-dd" value="<?php if($project_detail) echo $project_detail->project_completionDate;?>" />
        		<span class="input-group-addon">
            		<i class="icon-calendar"></i>
        		</span>
        	</div>
        	<div class="clear"></div>
    	</div>
    	
    	<div class="form_element">
        	<div class="label">Project Approved Budget <br>(in Taka) </div>
        	<div class="field">
        		<input type="text" name="project_approvedBudget" id="project_approvedBudget" value="<?php if($project_detail) echo $project_detail->project_approvedBudget;?>" class="textbox">
        	</div>
        	<div class="clear"></div>
    	</div>
    </div>
    <div class="clear"></div>
	

	<div class="form_element">
    	<div class="label width_170px">Project Goal <span class="mandatory">*</span></div>
       	<div class="textarea_field"><textarea name="project_goal" id="project_goal" class="textarea width_68_percent"><?php if($project_detail) echo $project_detail->project_goal;?></textarea></div>
        <div class="clear"></div>
  	</div>
  	
  	<div class="form_element">
    	<div class="label width_170px">Purpose/Objective <span class="mandatory">*</span></div>
       	<div class="textarea_field"><textarea name="project_objective" id="project_objective" class="textarea width_68_percent"><?php if($project_detail) echo $project_detail->project_objective;?></textarea></div>
        <div class="clear"></div>
  	</div>

    
	<div class="form_element">
		<?php
        	$project_expectedOutputs = array(); 
        	if(isset($project_detail))
			$project_expectedOutputs = explode("---##########---", $project_detail->project_expectedOutputs);
		?>
		
		<div class="label width_170px">Expected output <span class="mandatory">*</span></div>
        <div class="textarea_field" style="width:75%; float: left; display: inline;">
        	<?php 
				if(!empty($project_expectedOutputs)) { 
	    			foreach($project_expectedOutputs as $key=>$project_expectedOutput){
	    	?>
	    		 
		        	<div>
		            	<textarea name="project_expectedOutputs[]" id="project_expectedOutputs[]" class="textarea width-91"><?php echo $project_expectedOutput; ?></textarea>
		            	<span style="font-size:16px;"><a id="minus2" href="">[-]</a></span>
		        	</div>
		        	
	    	<?php 
					} 
	    		}
	    	?> 
        	<div id='duplicate2'>
            	<textarea name="project_expectedOutputs[]" id="project_expectedOutputs[]" class="textarea width-91"></textarea>
            	<span style="font-size:16px;"><a id="minus2" href="">[-]</a> <a id="plus2" href="">[+]</a></span>
        	</div>
        </div>
        <div class="clear"></div>
    </div>
    
    <div class="form_element">
        <div class="button_panel" style="margin-right: 110px;">
			<?php if(isset($project_detail) && $project_detail->project_id!=NULL) { ?>
                <input type="hidden" name="project_id" id="project_id" value="<?php echo $project_detail->project_id; ?>">
                <input type="submit" name="delete_project_information" id="delete_project_information" onclick="javascript:return confirm('Do you want to delete this project?');" value="Delete" class="k-button button">
            	<input type="submit" name="update_project_information" id="update_project_information" value="Update" class="k-button button">
            <?php } else { ?>
            	<input type="reset" name="reset_project_information" id="reset_project_information" value="Reset" class="k-button button">
                <input type="submit" name="save_project_information" id="save_project_information" value="Save" class="k-button button">
            <?php } ?>                
            
        </div>
        <div class="clear"></div>
    </div>
                   
</div>
</form>
<script language="javascript">
	$('#project_plannedStartDate').datepicker('setStartDate');
	$('#project_plannedEndDate').datepicker('setEndDate');
	
	$('#project_initiationDate').datepicker('setStartDate');
	$('#project_completionDate').datepicker('setEndDate');
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