<script src="<?php echo site_url('/assets/js/jquery-dynamic-form.js'); ?>"></script>
<script src="<?php echo site_url('assets/extensive/js/date-time/bootstrap-datepicker.min.js'); ?>"></script>
<link rel="stylesheet" href="<?php echo site_url('assets/extensive/css/datepicker.css'); ?>" />
<?php 
	if(isset($program_detail)){
		$program_detail = unserialize($program_detail);
	}
	//print_r($departments);
?>

<form name="program_info" id="program_info" method="post" action="">
<div class="main_form">
	
	<div class="form_element">
    	<div class="label width_170px">Title of Research Program <span class="mandatory">*</span></div>
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
        	<div class="label width_170px">Principal Investigator<br />(Or Pm/Coordintor) <span class="mandatory">*</span></div>
        	<div class="field">
        		<input type="text" name="program_coordinator_name" id="program_coordinator_name" value="<?php if($program_detail) echo $program_detail->program_coordinator;?>" class="textbox" />
                <input type="hidden" name="program_coordinator" id="program_coordinator" value="<?php if($program_detail) echo $program_detail->employee_id; ?>">
            	<input type="hidden" name="employee_id" id="employee_id" value="<?php if($program_detail) echo $program_detail->employee_id; ?>">
        	</div>
        	<div class="clear"></div>
    	</div>
    
     	<div class="form_element">
        	<div class="label width_170px">Designation </div>
        	<div class="field">
        		<input type="text" name="program_coordinator_designation" id="program_coordinator_designation" value="<?php if($program_detail) echo $program_detail->program_coordinator_designation; ?>" class="textbox" readonly="readonly">
        	</div>
        	<div class="clear"></div>
    	</div>
    
    	<div class="form_element">
        	<div class="label width_170px">Planned Start Date <span class="mandatory">*</span> </div>
        	<div class="field">
        		<input type="text" class="textbox disabled" readonly="readonly" data-date-format="yyyy-mm-dd" name="program_planned_start_date" id="program_planned_start_date" value="<?php if($program_detail) echo $program_detail->program_planned_start_date; ?>" />
        		<span class="input-group-addon">
            		<i class="icon-calendar"></i>
        		</span>
        	</div>
        	<div class="clear"></div>
    	</div>
    
    	<div class="form_element">
        	<div class="label width_170px">Planned End Date <span class="mandatory">*</span></div>
        	<div class="field">
        		<input type="text" class="textbox disabled" readonly="readonly" data-date-format="yyyy-mm-dd" name="program_planned_end_date" id="program_planned_end_date" value="<?php if($program_detail) echo $program_detail->program_planned_end_date; ?>" />
        		<span class="input-group-addon">
            		<i class="icon-calendar"></i>
        		</span>
        	</div>
        	<div class="clear"></div>
    	</div>
    
      	<div class="form_element">
        	<div class="label width_170px">Planned Budget(in Taka) </div>
        	<div class="field">
       	 		<input type="text" name="program_planned_budget" id="program_planned_budget" value="<?php if($program_detail) echo $program_detail->program_planned_budget;?>" class="textbox">
        	</div>
        	<div class="clear"></div>
    	</div>
    	
    	<div class="form_element">
        	<div class="label width_170px">Approved Budget(in Taka) </div>
        	<div class="field">
        		<input type="text" name="program_approved_budget" id="program_approved_budget" value="<?php if($program_detail) echo $program_detail->program_approved_budget;?>" class="textbox">
        	</div>
        	<div class="clear"></div>
    	</div>        
	</div>

	<div class="right_form">	
		<div class="form_element" style="margin-left: 5px;">
			<input type="checkbox" name="is_collaborate" id="is_collaborate" value="1" class="checkbox" <?php if(isset($program_detail) && $program_detail->is_collaborate=="1"){ ?> checked="checked" <?php } ?> onclick="$('#institute_name_div').toggle();" />Is collaborate
		</div>
     
     	<div class="form_element <?php if((isset($program_detail) && $program_detail->is_collaborate=="0") || !isset($program_detail)){ ?> display-none <?php } ?> " id="institute_name_div">
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
    	
    	<div class="form_element">
        	<div class="label">Department Name </div>
        	<div class="field">
        		<select name="program_department_name" id="program_department_name" class="selectionbox">
            		<option value="">Select Department</option>
            		<?php foreach($departments as $key=>$department) { ?>
            			<option value="<?php echo $department->id; ?>" <?php if(isset($program_detail) && $program_detail->program_department_name==$department->id) { ?> selected="selected" <?php } ?>><?php echo $department->organogram_name ?></option>
            		<?php } ?>
            	</select>
        	</div>
        	<div class="clear"></div>
    	</div>
    
    	<div class="form_element">
        	<div class="label">Regional Station Name </div>
        	<div class="field">
        		<select name="program_regional_station_name" id="program_regional_station_name" class="selectionbox">
            		<option value="">Select Regional Station</option>
					<?php foreach($regional_stations['data'] as $key=>$regional_station) { ?>
            			<option value="<?php echo $regional_station['station_id']; ?>"<?php if(isset($program_detail) && $program_detail->program_regional_station_name==$regional_station['station_id']) { ?> selected="selected" <?php } ?>><?php echo $regional_station['station_name']; ?></option>
            		<?php } ?>
        		</select>
        	</div>
        	<div class="clear"></div>
    	</div>
    
    	<div class="form_element">
        	<div class="label">Implementation Location/<br>Site/Area </div>
        	<div class="field">
        		<select name="program_implementation_location" id="program_implementation_location" class="selectionbox">
            		<option value="">Select Implementation Site</option>
					<?php foreach($implementation_locations['data'] as $key=>$implementation_location) { ?>
            			<option value="<?php echo $implementation_location['implementation_site_id']; ?>" <?php if(isset($program_detail) && $program_detail->program_implementation_location==$implementation_location['implementation_site_id']) { ?> selected="selected" <?php } ?>><?php echo $implementation_location['implementation_site_name']; ?></option>
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
   			<?php
        		$program_aezs = array(); 
        		if(isset($program_detail))
				$program_aezs = explode(",", $program_detail->program_aezs);
			?>
        	<div class="label">AEZs </div>
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
        	<div class="label">Initial Date </div>
        	<div class="field">
        		<input type="text" class="textbox disabled" readonly="readonly" name="program_initiation_date" id="program_initiation_date" data-date-format="yyyy-mm-dd" value="<?php if($program_detail){ if($program_detail->program_initiation_date=='0000-00-00'){echo '';} else {echo $program_detail->program_initiation_date;}}?>" />
        		<span class="input-group-addon">
           	 		<i class="icon-calendar"></i>
        		</span>
        	</div>
        	<div class="clear"></div>
    	</div>
    
    	<div class="form_element">
        	<div class="label">Completion Date </div>
        	<div class="field">
        		<input type="text" class="textbox disabled" readonly="readonly" name="program_completion_date" id="program_completion_date" data-date-format="yyyy-mm-dd" value="<?php if($program_detail){ if($program_detail->program_completion_date=='0000-00-00'){echo '';} else {echo $program_detail->program_completion_date;}}?>" />
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
						if(strlen($program_expectedOutput)>0){
	    	?>
	    		 
		        	<div>
		            	<textarea name="program_expected_outputs[]" id="program_expected_outputs[]" class="textarea width-91"><?php echo $program_expectedOutput; ?></textarea>
		            	<span style="font-size:16px;"><a id="minus2" href="">[-]</a></span>
		        	</div>
		        	
	    	<?php 
						}
					} 
	    		}
	    	?> 
        	<div id='duplicate2'>
            	<textarea name="program_expected_outputs[]" id="program_expected_outputs[]" class="textarea width-91"></textarea>
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
	$('#program_planned_start_date').datepicker('setStartDate');
	$('#program_planned_end_date').datepicker('setEndDate');
	
	$('#program_initiation_date').datepicker('setStartDate');
	$('#program_completion_date').datepicker('setEndDate');
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

<script type="text/javascript">
$(document).ready(function() {
	var program_coordinator_select;
	$("#program_coordinator_name").kendoAutoComplete({
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
                                read: "<?php echo site_url('Rmis/employees2'); ?>"
                            }
                       },
           	open: function(e) {
		    	program_coordinator_select = false;
		  	},
		  	select: function(e){
		    	program_coordinator_select = true;
			    var dataItem = this.dataItem(e.item.index());                
        		$("#employee_id").val(dataItem.employee_id);
        		$("#program_coordinator").val(dataItem.employee_id);
				$("#program_coordinator_designation").val(dataItem.designation_name);
		  	},
		  	close: function(e){
		    	// if no valid selection - clear input
		    	if (!program_coordinator_select) this.value('');
		  	}
    });
});
</script>
<style type="text/css">
	.field span.k-autocomplete{ border-radius:0px !important; width: 214px !important; border: solid #bababa 1px; font-size: 13px !important;} 
</style>