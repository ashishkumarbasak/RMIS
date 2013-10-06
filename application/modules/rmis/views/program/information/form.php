<script src="<?php echo site_url('/assets/js/jquery-dynamic-form.js'); ?>"></script>
<script src="<?php echo site_url('/assets/js/bootstrap-datepicker.js'); ?>"></script>
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

<?php 
	if(isset($program_detail)){
		$program_detail = unserialize($program_detail);
	}
	
	if(isset($institute_detail)){
		$institute_detail = unserialize($institute_detail);
	}
	
	if(isset($commodity_detail)){
		$commodity_detail = unserialize($commodity_detail);			
	}
	
	if(isset($aez_detail)){
		$aez_detail = unserialize($aez_detail);
	}
	
	if(isset($expected_output_detail)){
		$expected_output_detail = unserialize($expected_output_detail);
	}
	//print_r($institute_detail); 
?>
<form name="program_info" id="program_info" method="post" action="">
<div class="main_form">
	
    <div class="form_element">
		<div class="label" style="width:auto; margin-bottom:5px;">Title Of Research Programme <span class="mandatory">*</span> </div>
		<div class="clear"></div>
        <div class="textarea_field">
			<textarea name="title_of_research_program" id="title_of_research_program" class="textarea_small" style="width:87%;"><?php if($program_detail) echo $program_detail->title_of_research_program;?></textarea>
		</div>
		<div class="clear"></div>
	</div>
	<div class="left_form">
                                       
    <div class="form_element">
        <div class="label">Programme Area <span class="mandatory">*</span> </div>
        <div class="field">
        <select name="programme_area" id="programme_area" class="selectionbox">
            <option value="">Select Programme Area</option>
			<?php foreach($program_area as $key=>$value) { ?>
            <option value="<?php echo $value->id; ?>" <?php if(isset($program_detail) && $program_detail->program_area==$value->id) { ?> selected="selected" <?php } ?> ><?php echo $value->program_area_name; ?></option>
            <?php } ?>
        </select>
        </div>
        <div class="clear"></div>
    </div>
    
    <div class="form_element">
        <div class="label">Division/Unit Name <span class="mandatory">*</span></div>
        <div class="field">
        <select name="division_or_unit_name" id="division_or_unit_name" class="selectionbox">
            <option value="">Select Division/Unit Name</option>
			<?php foreach($division_or_unit as $key=>$value) { ?>
            <option value="<?php echo $value->division_id; ?>" <?php if(isset($program_detail) && $program_detail->division_or_unit_name==$value->division_id) { ?> selected="selected" <?php } ?>><?php echo $value->division_name; ?></option>
            <?php } ?>
        </select>
        </div>
        <div class="clear"></div>
    </div>
    
    <div class="form_element">
        <div class="label">Research Type <span class="mandatory">*</span> </div>
        <div class="field">
        <select name="research_type" id="research_type" class="selectionbox">
            <option value="">Select Research Type</option>
            <option value="Basic"<?php if(isset($program_detail) && $program_detail->research_type=="Basic") { ?> selected="selected" <?php } ?>>Basic</option>
            <option value="Strategic"<?php if(isset($program_detail) && $program_detail->research_type=="Strategic") { ?> selected="selected" <?php } ?>>Strategic</option>
            <option value="Impact Study"<?php if(isset($program_detail) && $program_detail->research_type=="Impact Study") { ?> selected="selected" <?php } ?>>Impact Study</option>
        </select>
        </div>
        <div class="clear"></div>
    </div>
    
    <div class="form_element">
        <div class="label">Research Priority <span class="mandatory">*</span></div>
        <div class="field">
        <select name="research_priority" id="research_priority" class="selectionbox">
            <option value="">Select Research Priority</option>
            <option value="1st"<?php if(isset($program_detail) && $program_detail->research_priority=="1st") { ?> selected="selected" <?php } ?>>1st</option>
            <option value="2nd"<?php if(isset($program_detail) && $program_detail->research_priority=="2nd") { ?> selected="selected" <?php } ?>>2nd</option>
            <option value="3rd"<?php if(isset($program_detail) && $program_detail->research_priority=="3rd") { ?> selected="selected" <?php } ?>>3rd</option>
            <option value="4th"<?php if(isset($program_detail) && $program_detail->research_priority=="4th") { ?> selected="selected" <?php } ?>>4th</option>
        </select>
        </div>
        <div class="clear"></div>
    </div>
    
     <div class="form_element">
        <div class="label">Research Status <span class="mandatory">*</span></div>
        <div class="field">
        <select name="research_status" id="research_status" class="selectionbox">
            <option value="">Select Research Status</option>
            <option value="New"<?php if(isset($program_detail) && $program_detail->research_status=="New") { ?> selected="selected" <?php } ?>>New</option>
            <option value="On-Going"<?php if(isset($program_detail) && $program_detail->research_status=="On-Going") { ?> selected="selected" <?php } ?>>On-Going</option>
            <option value="Completed"<?php if(isset($program_detail) && $program_detail->research_status=="Completed") { ?> selected="selected" <?php } ?>>Completed</option>
            <option value="Stop"<?php if(isset($program_detail) && $program_detail->research_status=="Stop") { ?> selected="selected" <?php } ?>>Stop</option>
        </select>
        </div>
        <div class="clear"></div>
    </div>
    
    <div class="form_element">
        <div class="label">Principal Investigator<br />(Or Pm/Coordintor) <span class="mandatory">*</span></div>
        <div class="field">
        <input type="text" name="program_manager" id="program_manager" value="<?php if($program_detail) echo $program_detail->program_manager;?>" class="textbox">
        </div>
        <div class="clear"></div>
    </div>
    
     <div class="form_element">
        <div class="label">Designation </div>
        <div class="field">
        <input type="text" name="designation" id="designation" value="<?php if($program_detail) echo $program_detail->program_manager;?>" class="textbox">
        </div>
        <div class="clear"></div>
    </div>
    
    <div class="form_element">
        <div class="label">Planned Start Date <span class="mandatory">*</span> </div>
        <div class="field">
        <input type="text" class="form-control hasDatepicker" name="planned_start_date" id="planned_start_date" value="<?php if($program_detail) echo $program_detail->planned_start_date;?>">
        <span class="input-group-addon">
            <i class="icon-calendar"></i>
        </span>
        </div>
        <div class="clear"></div>
    </div>
    
    <div class="form_element">
        <div class="label">Planned End Date <span class="mandatory">*</span></div>
        <div class="field">
        <input type="text" class="form-control hasDatepicker" name="planned_end_date" id="planned_end_date" value="<?php if($program_detail) echo $program_detail->planned_end_date;?>">
        <span class="input-group-addon">
            <i class="icon-calendar"></i>
        </span>
        </div>
        <div class="clear"></div>
    </div>
    
       <div class="form_element">
        <div class="label">Initial Date </div>
        <div class="field">
        <input type="text" class="form-control hasDatepicker" name="initiation_date" id="initiation_date" value="<?php if($program_detail) echo $program_detail->initiation_date;?>">
        <span class="input-group-addon">
            <i class="icon-calendar"></i>
        </span>
        </div>
        <div class="clear"></div>
    </div>
    
                                            
   <div class="form_element">
        <div class="label">Completion Date </div>
        <div class="field">
        <input type="text" class="form-control hasDatepicker" name="completion_date" id="completion_date" value="<?php if($program_detail) echo $program_detail->completion_date;?>">
        <span class="input-group-addon">
            <i class="icon-calendar"></i>
        </span>
        </div>
        <div class="clear"></div>
    </div>
    
     <div class="form_element">
        <div class="label">Planned Budget(in Taka) </div>
        <div class="field">
        <input type="text" name="planned_budget" id="planned_budget" value="<?php if($program_detail) echo $program_detail->planned_budget;?>" class="textbox">
        </div>
        <div class="clear"></div>
    </div>        
</div>
<div class="right_form">
	<div class="form_element">
	<input type="checkbox" name="is_collaborate" id="showInstituteName" value="1" class="checkbox" />Is collaborate
     
     <div class="form_element" id="collaborate_institute_name" style="display:none;">
        <div class="label">Institute Name </div>
        <div class="field">
            <div class="multiple_checkbox">
            <?php 
			foreach($institute_name as $key=>$value) 
			{ 
				if($institute_detail!=NULL && in_array($value->institute_id, objectToArray($institute_detail[0])))
				{
					$institute_selected= 1;
					echo "<input name=\"institute_name[]\" type=\"checkbox\" id=\"institute_name[]\" class=\"checkbox\" value=\"$value->institute_id\""; if($institute_selected==1) echo ' checked="checked"'; echo" />$value->institute_sort_code<br />";
				}
				else {
					$institute_selected= 0;
					echo "<input name=\"institute_name[]\" type=\"checkbox\" id=\"institute_name[]\" class=\"checkbox\" value=\"$value->institute_id\" />$value->institute_sort_code<br />";
				}
			  } 
			?>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    
    <div class="form_element">
        <div class="label">Department Name </div>
        <div class="field">
        <select name="department_name" id="department_name" class="selectionbox">
            <option value="">Select Department Name</option>
			<?php foreach($department_name as $key=>$value) { ?>
            <option value="<?php echo $value->id; ?>" <?php if(isset($program_detail) && $program_detail->department_name==$value->id) { ?> selected="selected" <?php } ?>><?php echo $value->program_area_name; ?></option>
            <?php } ?>
        </select>
        </div>
        <div class="clear"></div>
    </div>
    
     <div class="form_element">
        <div class="label">Regional Station Name </div>
        <div class="field">
        <select name="regional_station_name" id="regional_station_name" class="selectionbox">
            <option value="">Select Regional Station Name</option>
			<?php foreach($regional_station_name as $key=>$value) { ?>
            <option value="<?php echo $value->id; ?>"<?php if(isset($program_detail) && $program_detail->regional_station_name==$value->id) { ?> selected="selected" <?php } ?>><?php echo $value->station_name; ?></option>
            <?php } ?>
        </select>
        </div>
        <div class="clear"></div>
    </div>
    
    <div class="form_element">
        <div class="label">Implementation Location/Site/Area </div>
        <div class="field">
        <select name="implementation_location" id="implementation_location" class="selectionbox">
            <option value="">Select Implementation Location</option>
			<?php foreach($implementation_location as $key=>$value) { ?>
            <option value="<?php echo $value->id; ?>" <?php if(isset($program_detail) && $program_detail->implementation_location==$value->id) { ?> selected="selected" <?php } ?>><?php echo $value->implementation_site_name; ?></option>
            <?php } ?>

        </select>
        </div>
        <div class="clear"></div>
    </div>
    
     <div class="form_element">
        <div class="label">Key Words </div>
        <div class="field">
        <input type="text" name="keyword" id="keyword" class="textbox" value="<?php if($program_detail) echo $program_detail->keyword;?>">
        </div>
        <div class="clear"></div>
    </div>
    
    <div class="form_element">
        <div class="label">Commodity </div>
        <div class="field">
        	<div class="multiple_checkbox">
            
            	<?php				
					function objectToArray($d) {
						if (is_object($d)) {
							$d = get_object_vars($d);
						}
				 
						if (is_array($d)) {
							return array_map(__FUNCTION__, $d);
						}
						else {
							return $d;
						}
					}
                	if($commodity_detail!=NULL && in_array("Cereal crops", objectToArray($commodity_detail[0])))
					{
						$commodity_selected= 1;
						echo "<input name=\"commodity[]\" type=\"checkbox\" id=\"commodity[]\" class=\"checkbox\" value=\"Cereal crops\""; if($commodity_selected==1) echo ' checked="checked"'; echo" />Cereal crops<br />";
					}
					else {
					 	$commodity_selected= 0;
						echo "<input name=\"commodity[]\" type=\"checkbox\" id=\"commodity[]\" class=\"checkbox\" value=\"Cereal crops\" />Cereal crops<br />";
					}
					
					if($commodity_detail!=NULL && in_array("Oilseed Crops", objectToArray($commodity_detail[0])))
					{
						$commodity_selected= 1;
						echo "<input name=\"commodity[]\" type=\"checkbox\" id=\"commodity[]\" class=\"checkbox\" value=\"Cereal crops\""; if($commodity_selected==1) echo ' checked="checked"'; echo" />Oilseed Crops<br />";
					}
					else {
					 	$commodity_selected= 0;
						echo "<input name=\"commodity[]\" type=\"checkbox\" id=\"commodity[]\" class=\"checkbox\" value=\"Cereal crops\" />Oilseed Crops<br />";
					}
				?>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    
   <div class="form_element">
        <div class="label">AEZs </div>
        <div class="field">
        	<div class="multiple_checkbox">
            <?php 
			for($i=0; $i<10; $i++) 
			{ 
				if($aez_detail!=NULL && in_array($i, objectToArray($aez_detail[0])))
				{
					$aez_selected= 1;
					echo "<input name=\"aez[]\" type=\"checkbox\" id=\"aez[]\" class=\"checkbox\" value=\"$i\""; if($aez_selected==1) echo ' checked="checked"'; echo" />AEZ- $i<br />";
				}
				else {
					$aez_selected= 0;
					echo "<input name=\"aez[]\" type=\"checkbox\" id=\"aez[]\" class=\"checkbox\" value=\"$i\" />AEZ- $i<br />";
				}
			  } 
			?>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    
    <div class="form_element">
        <div class="label">Approved Budget(in Taka) </div>
        <div class="field">
        <input type="text" name="approved_budget" id="approved_budget" value="<?php if($program_detail) echo $program_detail->approved_budget;?>" class="textbox">
        </div>
        <div class="clear"></div>
    </div>
    
      </div>
    
     </div>
	<div class="clear"></div>



    <div class="form_element">
        <div class="label">Program Goal <span class="mandatory">*</span></div>
        <div class="field">
        <textarea name="program_goal" id="program_goal" class="textarea width_100_percent" ><?php if($program_detail) echo $program_detail->program_goal;?></textarea>
        </div>
        <div class="clear"></div>
    </div>
    
    <div class="form_element">
        <div class="label">Purpose/Objective <span class="mandatory">*</span></div>
        <div class="field">
        <textarea name="purpose_or_objective" id="purpose_or_objective" class="textarea width_100_percent" ><?php if($program_detail) echo $program_detail->purpose_or_objective;?></textarea>
        </div>
        <div class="clear"></div>
    </div>


    
    <div class="form_element">
        <div class="label">Expected output <span class="mandatory">*</span></div>
        <div class="field"> 
        <?php 
        	$i=0;
			if($expected_output_detail!=NULL) 
        	foreach($expected_output_detail as $key=>$value){ ?>            
                <textarea id="expected_output" name="expected_output[]" class="textarea width_100_percent"><?php echo $value->expected_output; ?></textarea>
            <?php $i++;} ?>     
        <span id='duplicate2'>
            <textarea name="expected_output[]" id="expected_output[]" class="textarea width_100_percent"></textarea>
            <span style="font-size:16px;"><a id="minus2" href="">[-]</a> <a id="plus2" href="">[+]</a></span>
            </span>
        </div>
        <div class="clear"></div>
    </div>
    
    <div class="form_element">
        <div class="button_panel">
        		<?php if(isset($program_detail) && $program_detail->program_id!=NULL) { ?>
                	<input type="hidden" name="program_id" id="program_id" value="<?php echo $program_detail->program_id; ?>">
        			<input type="submit" name="update_program_information" id="update_program_information" value="Update" class="k-button button">
            		<input type="reset" name="delete_program_information" id="delete_program_information" value="Delete" class="k-button button">
                <?php } else { ?>
                	<input type="submit" name="save_program_information" id="save_program_information" value="Save" class="k-button button">
            		<input type="reset" name="reset_program_information" id="reset_program_information" value="Reset" class="k-button button">
                <?php } ?>
                
            
        </div>
        <div class="clear"></div>
    </div>
                   
</div>
</form>
<script language="javascript">
	$('#planned_start_date').datepicker('setStartDate');
	$('#planned_end_date').datepicker('setEndDate');
	
	$('#initiation_date').datepicker('setStartDate');
	$('#completion_date').datepicker('setEndDate');
</script>