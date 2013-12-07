<script src="<?php echo site_url('/assets/js/jquery-dynamic-form.js'); ?>"></script>
<script src="<?php echo site_url('assets/extensive/js/date-time/bootstrap-datepicker.min.js'); ?>"></script>
<link rel="stylesheet" href="<?php echo site_url('assets/extensive/css/datepicker.css'); ?>" />
<?php 
	if(isset($program_detail)){
		$program_detail = unserialize($program_detail);
	}
?>

<form name="program_info" id="program_info" method="post" action="">
<div class="main_form">
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
            			<option value="<?php echo $division['division_id']; ?>" <?php if(isset($program_detail) && $program_detail->division_or_unit_name==$division['division_id']) { ?> selected="selected" <?php } ?>><?php echo $division['division_name']; ?></option>
            		<?php } ?>
        		</select>
        	</div>
        	<div class="clear"></div>
    	</div>
    
    	<div class="form_element">
        	<div class="label width_170px">Research Type <span class="mandatory">*</span> </div>
        	<div class="field">
        		<select name="program_research_type" id="program_research_type" class="selectionbox">
            		<option value="">Select Research Type</option>
 					<?php foreach($research_types['data'] as $key=>$researchType) { ?>
            			<option value="<?php echo $researchType['value']; ?>" <?php if(isset($program_detail) && $program_detail->program_research_type==$researchType['value']) { ?> selected="selected" <?php } ?>><?php echo $researchType['name']; ?></option>
            		<?php } ?>
        		</select>
        	</div>
        	<div class="clear"></div>
    	</div>
    	
    	<div class="form_element">
        	<div class="label width_170px">Research Priority <span class="mandatory">*</span></div>
        	<div class="field">
        		<select name="program_research_priority" id="program_research_priority" class="selectionbox">
            		<option value="">Select Research Priority</option>
					<?php foreach($research_priorities['data'] as $key=>$research_priority) { ?>
            			<option value="<?php echo $research_priority['value']; ?>" <?php if(isset($program_detail) && $program_detail->program_research_priority==$research_priority['value']) { ?> selected="selected" <?php } ?>><?php echo $research_priority['name']; ?></option>
            		<?php } ?>
         		</select>
        	</div>
        	<div class="clear"></div>
    	</div>
    
     	<div class="form_element">
        	<div class="label width_170px">Research Status <span class="mandatory">*</span></div>
        	<div class="field">
        		<select name="program_research_status" id="program_research_status" class="selectionbox">
            		<option value="">Select Research Status</option>
					<?php foreach($research_statuses['data'] as $key=>$research_status) { ?>
           	 			<option value="<?php echo $research_status['value']; ?>" <?php if(isset($program_detail) && $program_detail->program_research_status==$research_status['value']) { ?> selected="selected" <?php } ?>><?php echo $research_status['name']; ?></option>
            		<?php } ?>
            	</select>
        	</div>
        	<div class="clear"></div>
    	</div>
    	
    	<div class="form_element">
        	<div class="label width_170px">Key Words </div>
        	<div class="field">
        		<input type="text" name="program_keywords" id="program_keywords" class="textbox" value="<?php if($program_detail) echo $program_detail->keyword;?>">
        	</div>
        	<div class="clear"></div>
    	</div>
    	
    	<div class="form_element">
        	<?php
        		$program_aezs = array(); 
        		if(isset($program_detail))
				$program_aezs = explode(",", $program_detail->program_aezs);
			?>
        	<div class="label width_170px">AEZs </div>
        	<div class="field">
        		<select name="program_aezs[]" id="program_aezs" class="selectionbox" multiple="multiple">
            		<?php foreach($aezs['data'] as $key=>$aez) { ?>
            			<option value="<?php echo $aez['value']; ?>" <?php if(in_array($aez['value'], $program_aezs)) { ?> selected="selected" <?php } ?>><?php echo $aez['name']; ?></option>
            		<?php } ?>
            	</select>
        	</div>
        	<div class="clear"></div>
    	</div>
    	
    	<div class="form_element">
        	<div class="label width_170px">Regional Station Name </div>
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
        	<div class="label width_170px">Implementation Location/<br>Site/Area </div>
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
	</div>

	<div class="right_form">	
		<div class="form_element">
        	<div class="label">Planned Date Range <span class="mandatory">*</span> </div>
        	<div class="field">
        		<input type="text" class="textbox disabled" readonly="readonly" data-date-format="yyyy-mm-dd" name="program_plannedStartDate" id="program_plannedStartDate" value="" />
        		<span class="input-group-addon">
            		<i class="icon-calendar"></i>
        		</span>
        	</div>
        	<div class="clear"></div>
    	</div>
 
      	<div class="form_element">
        	<div class="label">Planned Budget Range </div>
        	<div class="field">
       	 		<input type="text" name="program_plannedBudget" id="program_plannedBudget" value="<?php if($program_detail) echo $program_detail->planned_budget;?>" class="textbox">
        	</div>
        	<div class="clear"></div>
    	</div>
    	
    	<div class="form_element">
        	<div class="label">Initiation Date Range <span class="mandatory">*</span></div>
        	<div class="field">
        		<input type="text" class="textbox disabled" readonly="readonly" data-date-format="yyyy-mm-dd" name="program_plannedEndDate" id="program_plannedEndDate" value="" />
        		<span class="input-group-addon">
            		<i class="icon-calendar"></i>
        		</span>
        	</div>
        	<div class="clear"></div>
    	</div>
    	
    	<div class="form_element">
        	<div class="label">Approved Budget Range </div>
        	<div class="field">
        		<input type="text" name="program_approvedBudget" id="program_approvedBudget" value="<?php if($program_detail) echo $program_detail->approved_budget;?>" class="textbox">
        	</div>
        	<div class="clear"></div>
    	</div> 
     
     	
    	
    	<div class="form_element">
        	<?php
        		$program_commodities = array(); 
        		if(isset($program_detail))
				$program_commodities = explode(",", $program_detail->program_commodities);
			?>
        	<div class="label">Commodity </div>
        	<div class="field">
        		<select name="program_commodities[]" id="program_commodities" class="selectionbox" multiple="multiple">
            		<?php foreach($comodities['data'] as $key=>$comodity) { ?>
            			<option value="<?php echo $comodity['value']; ?>" <?php if(in_array($comodity['value'],$program_commodities)) { ?> selected="selected" <?php } ?>><?php echo $comodity['name']; ?></option>
            		<?php } ?>
            	</select>
        	</div>
        	<div class="clear"></div>
    	</div>
    
   		<div class="form_element">
        	<div class="label">Principal Investigator<br />(Or Pm/Coordintor) <span class="mandatory">*</span></div>
        	<div class="field">
        		<input type="text" name="program_coordinator" id="program_coordinator" value="<?php if($program_detail) echo $program_detail->program_manager;?>" class="textbox">
        	</div>
        	<div class="clear"></div>
    	</div>
    	
    	<div class="form_element" id="institute_name_div">
        	<?php
        		$program_instituteNames = array(); 
        		if(isset($program_detail))
				$program_instituteNames = explode(",", $program_detail->program_institute_names);
			?>
        	<div class="label">Institute Name </div>
        	<div class="field">
        		<select name="program_institute_names[]" id="program_institute_names" class="selectionbox" multiple="multiple">
            		<?php foreach($institues['data'] as $key=>$institue) { ?>
            			<option value="<?php echo $institue['id']; ?>" <?php if(in_array($institue['id'],$program_instituteNames)) { ?> selected="selected" <?php } ?>><?php echo $institue['short_name']; ?></option>
            		<?php } ?>
            	</select>
        	</div>
        	<div class="clear"></div>
    	</div>
    </div>
    <div class="clear"></div>
    
    <div class="left_form">
    	<div class="form_element">
	    	<div class="label width_170px">Title of Research Program</div>
	       	<div class="textarea_field"><textarea name="research_program_title" id="research_program_title" class="textarea_small width-92"><?php if($program_detail) echo $program_detail->title_of_research_program;?></textarea></div>
	        <div class="clear"></div>
	  	</div>
	  	
	  	<div class="form_element">
	    	<div class="label width_170px">Research Program Team Info</div>
	       	<div class="textarea_field"><textarea name="program_research_team_info" id="program_research_team_info" class="textarea_small width-92"><?php if($program_detail) echo $program_detail->title_of_research_program;?></textarea></div>
	        <div class="clear"></div>
	  	</div>
   	</div>
   	
   	<div class="left_form">
    	<div class="form_element">
	    	<div class="label width_170px">Executive Summary</div>
	       	<div class="textarea_field"><textarea name="program_executive_summary" id="program_executive_summary" class="textarea width-92"><?php if($program_detail) echo $program_detail->title_of_research_program;?></textarea></div>
	        <div class="clear"></div>
	  	</div>
   	</div>
    
    
    <div class="form_element">
        <div class="button_panel" style="margin-right: 27px;">
            	<input type="button" name="reset_program_information" id="reset_program_information" onclick="window.location='/Rmis/program/informations';" value="Add New Prog" class="k-button button">
                <input type="submit" name="save_program_information" id="save_program_information" value="Search" class="k-button button">               
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
	$('#showInstituteName').change(function() {
    	$('#collaborate_institute_name').toggle();
	});
});
</script> 