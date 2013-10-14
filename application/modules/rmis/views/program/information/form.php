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
 			<?php foreach($research_type as $key=>$value) { ?>
            <option value="<?php echo $value->id; ?>" <?php if(isset($program_detail) && $program_detail->research_type==$value->id) { ?> selected="selected" <?php } ?>><?php echo $value->research_type; ?></option>
            <?php } ?>
        </select>
        </div>
        <div class="clear"></div>
    </div>
    
    <div class="form_element">
        <div class="label">Research Priority <span class="mandatory">*</span></div>
        <div class="field">
        <select name="research_priority" id="research_priority" class="selectionbox">
            <option value="">Select Research Priority</option>
			<?php foreach($research_priority as $key=>$value) { ?>
            <option value="<?php echo $value->id; ?>" <?php if(isset($program_detail) && $program_detail->research_priority==$value->id) { ?> selected="selected" <?php } ?>><?php echo $value->research_priority; ?></option>
            <?php } ?>
         </select>
        </div>
        <div class="clear"></div>
    </div>
    
     <div class="form_element">
        <div class="label">Research Status <span class="mandatory">*</span></div>
        <div class="field">
        <select name="research_status" id="research_status" class="selectionbox">
            <option value="">Select Research Status</option>
			<?php foreach($research_status as $key=>$value) { ?>
            <option value="<?php echo $value->id; ?>" <?php if(isset($program_detail) && $program_detail->research_status==$value->id) { ?> selected="selected" <?php } ?>><?php echo $value->research_status; ?></option>
            <?php } ?>        </select>
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
    
     <!--<div class="form_element">
        <div class="label">Designation </div>
        <div class="field">
        <input type="text" name="designation" id="designation" value="<?php //if($program_detail) echo $program_detail->designation;?>" class="textbox">
        </div>
        <div class="clear"></div>
    </div>-->
    
    <div class="form_element">
        <div class="label">Planned Start Date <span class="mandatory">*</span> </div>
        <div class="field">
        <input type="text" class="form-control hasDatepicker" readonly="readonly" name="planned_start_date" id="planned_start_date" value="<?php if($program_detail) echo date("m/d/Y", strtotime($program_detail->planned_start_date));?>">
        <span class="input-group-addon">
            <i class="icon-calendar"></i>
        </span>
        </div>
        <div class="clear"></div>
    </div>
    
    <div class="form_element">
        <div class="label">Planned End Date <span class="mandatory">*</span></div>
        <div class="field">
        <input type="text" class="form-control hasDatepicker" readonly="readonly" name="planned_end_date" id="planned_end_date" value="<?php if($program_detail) echo date("m/d/Y", strtotime($program_detail->planned_end_date));?>">
        <span class="input-group-addon">
            <i class="icon-calendar"></i>
        </span>
        </div>
        <div class="clear"></div>
    </div>
    
       <div class="form_element">
        <div class="label">Initial Date </div>
        <div class="field">
        <input type="text" class="form-control hasDatepicker" readonly="readonly" name="initiation_date" id="initiation_date" value="<?php if($program_detail) echo date("m/d/Y", strtotime($program_detail->initiation_date));?>">
        <span class="input-group-addon">
            <i class="icon-calendar"></i>
        </span>
        </div>
        <div class="clear"></div>
    </div>
    
                                            
   <div class="form_element">
        <div class="label">Completion Date </div>
        <div class="field">
        <input type="text" class="form-control hasDatepicker" readonly="readonly" name="completion_date" id="completion_date" value="<?php if($program_detail) echo date("m/d/Y", strtotime($program_detail->completion_date));?>">
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
			
			if(isset($institute_detail)) 
			{
				foreach($institute_name as $key=>$value) 
				{ 
					if(in_array($value->institute_id, objectToArray($institute_detail[0])))
					{
						$institute_selected= 1;
						echo "<input name=\"institute_name[]\" type=\"checkbox\" id=\"institute_name[]\" class=\"checkbox\" value=\"$value->institute_id\""; if($institute_selected==1) echo ' checked="checked"'; echo" />$value->institute_sort_code<br />";
					}
					else {
						$institute_selected= 0;
						echo "<input name=\"institute_name[]\" type=\"checkbox\" id=\"institute_name[]\" class=\"checkbox\" value=\"$value->institute_id\" />$value->institute_sort_code<br />";
					}
				  }
			}
			else{
				foreach($institute_name as $key=>$value) 
				{ 
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
            <option value="<?php echo $value->id; ?>" <?php if(isset($program_detail) && $program_detail->department_name==$value->type_id) { ?> selected="selected" <?php } ?>><?php echo $value->type_id; ?></option>
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
					if(isset($commodity_detail)) 
					{						
						foreach($commodity as $key=>$value) 
						{ 
							if(in_array($value->commodity_id, objectToArray($commodity_detail[0])))
							{
								$commodity_selected= 1;
								echo "<input name=\"commodity[]\" type=\"checkbox\" id=\"commodity[]\" class=\"checkbox\" value=\"$value->commodity_id\""; if($commodity_selected==1) echo ' checked="checked"'; echo" />$value->commodity_name<br />";
							}
							else {
								$commodity_selected= 0;
								echo "<input name=\"commodity[]\" type=\"checkbox\" id=\"commodity[]\" class=\"checkbox\" value=\"$value->commodity_id\" />$value->commodity_name<br />";
							}
						  }
					}
					else{
						foreach($commodity as $key=>$value) 
						{ 
							echo "<input name=\"commodity[]\" type=\"checkbox\" id=\"commodity[]\" class=\"checkbox\" value=\"$value->commodity_id\" />$value->commodity_name<br />";
						}
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
			if(isset($aez_detail)) 
			{
				foreach($aez as $key=>$value) 
				{ 
					if(in_array($value->aez_id, objectToArray($aez_detail[0])))
					{
						$aez_selected= 1;
						echo "<input name=\"aez[]\" type=\"checkbox\" id=\"aez[]\" class=\"checkbox\" value=\"$value->aez_id\""; if($aez_selected==1) echo ' checked="checked"'; echo" />$value->aez_name<br />";
					}
					else {
						$aez_selected= 0;
						echo "<input name=\"aez[]\" type=\"checkbox\" id=\"aez[]\" class=\"checkbox\" value=\"$value->aez_id\" />$value->aez_name<br />";
					}
				  }
			}
			  else {
				  foreach($aez as $key=>$value)  
				  {
				 	 echo "<input name=\"aez[]\" type=\"checkbox\" id=\"aez[]\" class=\"checkbox\" value=\"$value->id\" />$value->aez_name<br />";
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
			if(isset($expected_output_detail)) 
			{
				$i=0; foreach($expected_output_detail as $key=>$value){ ?>            
                <textarea id="expected_output" name="expected_output[]" class="textarea width_100_percent"><?php echo $value->expected_output; ?></textarea>
            <?php $i++;}} ?>     
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
                <input type="submit" name="delete_program_information" id="delete_program_information" onclick="javascript:return confirm('Do you want to delete this program?');" value="Delete" class="k-button button">
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