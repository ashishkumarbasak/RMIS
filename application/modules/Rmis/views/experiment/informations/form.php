<script src="<?php echo site_url('/assets/js/jquery-dynamic-form.js'); ?>"></script>
<script src="<?php echo site_url('assets/extensive/js/date-time/bootstrap-datepicker.min.js'); ?>"></script>
<link rel="stylesheet" href="<?php echo site_url('assets/extensive/css/datepicker.css'); ?>" />
<?php
	if(isset($experiment_detail)){
		$experiment_detail = unserialize($experiment_detail);
	}
	if(isset($program_detail)){
		$program_detail = unserialize($program_detail);
	}
	if(isset($project_detail)){
		$project_detail = unserialize($project_detail);
	}
	if(isset($tem_formData)){
		$tem_formData = unserialize($tem_formData);
	}
?>
<form name="experiment_info" id="experiment_info" method="post" action="<?php if(isset($form_action_url) && $form_action_url!=NULL) echo $form_action_url; ?>">
<!-- Experiment Info Top-->
<div class="main_form">
    <div class="form_element">
    	<div class="label width_170px">Title of Research Experiment <span class="mandatory">*</span></div>
       	<div class="textarea_field"><textarea name="research_experiment_title" id="research_experiment_title" class="textarea_small width_68_percent"><?php if($experiment_detail) echo $experiment_detail->research_experiment_title; elseif(isset($tem_formData) && array_key_exists('research_experiment_title', $tem_formData)) echo $tem_formData['research_experiment_title']; ?></textarea></div>
        <div class="clear"></div>
  	</div>
   <div class="form_element">
   	 <div class="label width_170px">&nbsp; <?php echo $experiment_type; ?> </div>
     <div class="textarea_field">
   		<input type="radio" name="experiment_type" id="experiment_type" value="Independent" <?php if((isset($experiment_type) &&  $experiment_type=="Independent")) { ?> checked="checked" <?php } else if( (isset($experiment_type) && $experiment_type!="ProjID" && $experiment_type!="ProgID") && (isset($experiment_detail) && $experiment_detail->experiment_type=="Independent") ){ ?> checked="checked" <?php } ?> onclick="$('#project_details').hide();$('#program_details').hide();" > Independent 
   		<input type="radio" name="experiment_type" id="experiment_type" value="Program" <?php if((isset($experiment_type) && $experiment_type=="ProgID")) { ?> checked="checked" <?php } else if( (isset($experiment_type) && $experiment_type!="ProjID") && (isset($experiment_detail) && $experiment_detail->experiment_type=="Program") ){ ?> checked="checked" <?php } ?> > Program &nbsp;
        <input type="radio" name="experiment_type" id="experiment_type" value="Project" <?php if((isset($experiment_type) && $experiment_type=="ProjID")) { ?> fuck checked="checked" <?php } else if( (isset($experiment_type) && $experiment_type!="ProgID") && (isset($experiment_detail) && $experiment_detail->experiment_type=="Project") ){ ?> checked="checked" <?php } ?> > Project &nbsp;
        <input type="button" name="search" id="search_panel" value="Search" class="k-button button">
     </div>
     <div class="clear"></div>
   </div>
   <div class="clear"></div>
</div> 



<!-- Program Info-->
<div id="program_details">
<?php if(
		((isset($experiment_detail) && $experiment_detail->experiment_type=="Program") || (isset($program_id) && $program_id!=0 && $program_detail!=NULL ))
		){ ?>
<div class="main_form">
    <div class="form_element">
        <div class="label width_170px">Title of Research Program</div>
        <div class="textarea_field"><textarea name="research_program_title" id="research_program_title" disabled="disabled" class="textarea_small disabled width_68_percent"><?php if($program_detail!=NULL) echo $program_detail->research_program_title; ?></textarea></div>
        <div class="clear"></div>
    </div>
                
    <div class="left_form">
        <div class="form_element">
            <div class="label width_170px">Initiation Date </div>
            <div class="field">
                <input type="text" name="program_initiation_date" id="program_initiation_date" value="<?php if($program_detail!=NULL) echo $program_detail->program_initiation_date; ?>" class="textbox disabled" disabled="disabled" />
            </div>
            <div class="clear"></div>
        </div> 
        
        <div class="form_element">
            <div class="label width_170px">Program Area </div>
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
        
    </div>
                
    <div class="right_form">    
        <div class="form_element">
            <div class="label">Completion Date</div>
            <div class="field">
                <input type="text" name="program_completion_date" id="program_completion_date" value="<?php if($program_detail!=NULL) echo $program_detail->program_completion_date; ?>" class="textbox disabled" disabled="disabled" />
            </div>
            <div class="clear"></div>
        </div>
        
        <div class="form_element">
            <div class="label">Principal Investigator <br />(or PM/Coordinator)</div>
            <div class="field">
                <input type="text" name="program_coordinator" id="program_coordinator" value="<?php if($program_detail!=NULL) echo $program_detail->program_coordinator; ?>" class="textbox disabled" disabled="disabled" />
            </div>
            <div class="clear"></div>
        </div>
        
    </div>
</div>
<?php } ?>
</div>

<!-- Project Info-->
<div id="project_details">
<?php if(
			((isset($experiment_detail) && $experiment_detail->experiment_type=="Project") || (isset($project_id) && $project_id!=0 && $project_detail!=NULL ))
			&& (isset($experiment_type) && $experiment_type!="ProgID")
		){ ?>
	<div class="main_form">
   		<div class="form_element">
	    	<div class="label width_170px">Title of Research Project <span class="mandatory">*</span></div>
	       	<div class="textarea_field"><textarea name="research_project_title" id="research_project_title" disabled="disabled" class="textarea_small disabled width_68_percent"><?php if($project_detail) echo $project_detail->research_project_title;?></textarea></div>
	        <div class="clear"></div>
	  	</div>
                        
     	<div class="left_form">
        	<div class="form_element">
                <div class="label width_170px">&nbsp;</div>
                <div class="textarea_field">
                    <input type="radio" name="project_type" id="project_type" value="Independent" <?php if(isset($project_detail) && $project_detail->project_type=="Independent"){ ?> checked="checked" <?php } ?> disabled="disabled"> Independent 
                    <input type="radio" name="project_type" id="project_type" value="Program" <?php if(isset($project_detail) && $project_detail->project_type=="Program"){ ?> checked="checked" <?php } ?>disabled="disabled"> Program &nbsp; 
                </div>
                <div class="clear"></div>
            </div>
      		
      		<div class="form_element" style="margin-top: 20px;">
           		<div class="label width_170px">Initiation Date</div>
              	<div class="field">
                   	<input type="text" class="textbox disabled" disabled="disabled" name="project_initiation_date" id="project_initiation_date" data-date-format="yyyy-mm-dd" value="<?php if($project_detail) echo $project_detail->project_initiation_date;?>" />
               	</div>
               	<div class="clear"></div>
           	</div>
		</div>
                        
		<div class="right_form">    
       		<div class="form_element">
           		<div class="label">Principal Investigator <br />(or PM/Coordinator)</div>
               	<div class="field">
              		<input type="text" name="project_coordinator" id="project_coordinator" value="<?php if($project_detail) echo $project_detail->project_coordinator;?>" class="textbox disabled" disabled="disabled" />
             	</div>
               	<div class="clear"></div>
         	</div>
         	
         	
                            
           	<div class="form_element">
           		<div class="label">Completion Date</div>
              	<div class="field">
              		<input type="text" class="textbox disabled" disabled="disabled" name="project_completion_date" id="project_completion_date" data-date-format="yyyy-mm-dd" value="<?php if($project_detail) echo $project_detail->project_completion_date;?>" />
               	</div>
               	<div class="clear"></div>
           	</div>                        
		</div>                                                 
	</div>
<?php } ?>
</div>







<!-- Experiment Info below-->
<div class="main_form">	
	<div class="left_form">
    	<div class="form_element">
        	<div class="label width_170px">Division/Unit Name <span class="mandatory">*</span></div>
        	<div class="field">
        		<select name="experiment_division" id="experiment_division" class="selectionbox">
            		<option value="">Select Division/Unit Name</option>
					<?php foreach($divisions['data'] as $key=>$division) { ?>
            			<option value="<?php echo $division['division_id']; ?>" <?php if((isset($experiment_detail) && $experiment_detail->experiment_division==$division['division_id']) || (isset($tem_formData) && array_key_exists('experiment_division', $tem_formData) && $tem_formData['experiment_division']==$division['division_id']) ) { ?> selected="selected" <?php } ?>>
            					<?php echo $division['division_name']; ?>
            			</option>
            		<?php } ?>
        		</select>
        	</div>
        	<div class="clear"></div>
    	</div>
    
    	<div class="form_element">
        	<div class="label width_170px">Research Type <span class="mandatory">*</span> </div>
        	<div class="field">
        		<select name="experiment_research_type" id="experiment_research_type" class="selectionbox">
            		<option value="">Select Research Type</option>
 					<?php foreach($research_types['data'] as $key=>$researchType) { ?>
            			<option value="<?php echo $researchType['value']; ?>" <?php if((isset($experiment_detail) && $experiment_detail->experiment_research_type==$researchType['value']) || (isset($tem_formData) && array_key_exists('experiment_research_type', $tem_formData) && $tem_formData['experiment_research_type']==$researchType['value'])) { ?> selected="selected" <?php } ?>>
            				<?php echo $researchType['name']; ?>
            			</option>
            		<?php } ?>
        		</select>
        	</div>
        	<div class="clear"></div>
    	</div>
    	
    	<div class="form_element">
        	<div class="label width_170px">Research Priority <span class="mandatory">*</span></div>
        	<div class="field">
        		<select name="experiment_research_priority" id="experiment_research_priority" class="selectionbox">
            		<option value="">Select Research Priority</option>
					<?php foreach($research_priorities['data'] as $key=>$research_priority) { ?>
            			<option value="<?php echo $research_priority['value']; ?>" <?php if((isset($experiment_detail) && $experiment_detail->experiment_research_priority==$research_priority['value']) || (isset($tem_formData) && array_key_exists('experiment_research_priority', $tem_formData) && $tem_formData['experiment_research_priority']==$research_priority['value'])) { ?> selected="selected" <?php } ?>>
            				<?php echo $research_priority['name']; ?>
            			</option>
            		<?php } ?>
         		</select>
        	</div>
        	<div class="clear"></div>
    	</div>
    
     	<div class="form_element">
        	<div class="label width_170px">Research Status <span class="mandatory">*</span></div>
        	<div class="field">
        		<select name="experiment_research_status" id="experiment_research_status" class="selectionbox">
            		<option value="">Select Research Status</option>
					<?php foreach($research_statuses['data'] as $key=>$research_status) { ?>
           	 			<option value="<?php echo $research_status['value']; ?>" <?php if((isset($experiment_detail) && $experiment_detail->experiment_research_status==$research_status['value']) || (isset($tem_formData) && array_key_exists('experiment_research_status', $tem_formData) && $tem_formData['experiment_research_status']==$research_status['value'])) { ?> selected="selected" <?php } ?>>
           	 				<?php echo $research_status['name']; ?>
           	 			</option>
            		<?php } ?>
            	</select>
        	</div>
        	<div class="clear"></div>
    	</div>
    
    	<div class="form_element">
        	<div class="label width_170px">Principal Investigator<br />(Or Pm/Coordintor) <span class="mandatory">*</span></div>
        	<div class="field">
        		<input type="text" name="experiment_coordinator_name" id="experiment_coordinator_name" value="<?php if($experiment_detail) echo $experiment_detail->experiment_coordinator; elseif(isset($tem_formData) && array_key_exists('experiment_coordinator_name', $tem_formData)) echo $tem_formData['experiment_coordinator_name'];?>" class="textbox" />
                <input type="hidden" name="experiment_coordinator" id="experiment_coordinator" value="<?php if($experiment_detail) echo $experiment_detail->employee_id; elseif(isset($tem_formData) && array_key_exists('experiment_coordinator', $tem_formData)) echo $tem_formData['experiment_coordinator']; ?>">
            	<input type="hidden" name="employee_id" id="employee_id" value="<?php if($experiment_detail) echo $experiment_detail->employee_id; elseif(isset($tem_formData) && array_key_exists('employee_id', $tem_formData)) echo $tem_formData['employee_id']; ?>">
        	</div>
        	<div class="clear"></div>
    	</div>
    
     	<div class="form_element">
        	<div class="label width_170px">Designation </div>
        	<div class="field">
        		<input type="text" name="experiment_coordinator_designation" id="experiment_coordinator_designation" value="<?php if($experiment_detail) echo $experiment_detail->experiment_coordinator_designation; elseif(isset($tem_formData) && array_key_exists('experiment_coordinator_designation', $tem_formData)) echo $tem_formData['experiment_coordinator_designation']; ?>" class="textbox" readonly="readonly">
        	</div>
        	<div class="clear"></div>
    	</div>
    
    	<div class="form_element">
        	<div class="label width_170px">Planned Start Date <span class="mandatory">*</span> </div>
        	<div class="field">
        		<input type="text" class="textbox disabled" readonly="readonly" data-date-format="yyyy-mm-dd" name="experiment_planned_start_date" id="experiment_planned_start_date" value="<?php if($experiment_detail) echo $experiment_detail->experiment_planned_start_date; elseif(isset($tem_formData) && array_key_exists('experiment_planned_start_date', $tem_formData)) echo $tem_formData['experiment_planned_start_date']; ?>" />
        		<span class="input-group-addon">
            		<i class="icon-calendar"></i>
        		</span>
        	</div>
        	<div class="clear"></div>
    	</div>
    
    	<div class="form_element">
        	<div class="label width_170px">Planned End Date <span class="mandatory">*</span></div>
        	<div class="field">
        		<input type="text" class="textbox disabled" readonly="readonly" data-date-format="yyyy-mm-dd" name="experiment_planned_end_date" id="experiment_planned_end_date" value="<?php if($experiment_detail) echo $experiment_detail->experiment_planned_end_date; elseif(isset($tem_formData) && array_key_exists('experiment_planned_end_date', $tem_formData)) echo $tem_formData['experiment_planned_end_date']; ?>" />
        		<span class="input-group-addon">
            		<i class="icon-calendar"></i>
        		</span>
        	</div>
        	<div class="clear"></div>
    	</div>
    
      	<div class="form_element">
        	<div class="label width_170px">Planned Budget(in Taka) </div>
        	<div class="field">
       	 		<input type="text" name="experiment_planned_budget" id="experiment_planned_budget" value="<?php if($experiment_detail) echo $experiment_detail->experiment_planned_budget; elseif(isset($tem_formData) && array_key_exists('experiment_planned_budget', $tem_formData)) echo $tem_formData['experiment_planned_budget']; ?>" class="textbox">
        	</div>
        	<div class="clear"></div>
    	</div>
    	
    	<div class="form_element">
        	<div class="label width_170px">Approved Budget(in Taka) </div>
        	<div class="field">
        		<input type="text" name="experiment_approved_budget" id="experiment_approved_budget" value="<?php if($experiment_detail) echo $experiment_detail->experiment_approved_budget; elseif(isset($tem_formData) && array_key_exists('experiment_approved_budget', $tem_formData)) echo $tem_formData['experiment_approved_budget']; ?>" class="textbox">
        	</div>
        	<div class="clear"></div>
    	</div>        
	</div>

	<div class="right_form">	
    	<div class="form_element">
        	<div class="label">Department Name </div>
        	<div class="field">
        		<select name="experiment_department_name" id="experiment_department_name" class="selectionbox">
            		<option value="">Select Department</option>
            		<?php foreach($departments as $key=>$department) { ?>
            			<option value="<?php echo $department->id; ?>" <?php if((isset($experiment_detail) && $experiment_detail->experiment_department_name==$department->id) || (isset($tem_formData) && array_key_exists('experiment_department_name', $tem_formData) && $tem_formData['experiment_department_name']==$department->id)) { ?> selected="selected" <?php } ?>>
            				<?php echo $department->organogram_name ?>
            			</option>
            		<?php } ?>
            	</select>
        	</div>
        	<div class="clear"></div>
    	</div>
    
    	<div class="form_element">
        	<div class="label">Regional Station Name </div>
        	<div class="field">
        		<select name="experiment_regional_station_name" id="experiment_regional_station_name" class="selectionbox">
            		<option value="">Select Regional Station</option>
					<?php foreach($regional_stations['data'] as $key=>$regional_station) { ?>
            			<option value="<?php echo $regional_station['station_id']; ?>"<?php if((isset($experiment_detail) && $experiment_detail->experiment_regional_station_name==$regional_station['station_id']) || (isset($tem_formData) && array_key_exists('experiment_regional_station_name', $tem_formData) && $tem_formData['experiment_regional_station_name']==$regional_station['station_id'])) { ?> selected="selected" <?php } ?>>
            				<?php echo $regional_station['station_name']; ?>
            			</option>
            		<?php } ?>
        		</select>
        	</div>
        	<div class="clear"></div>
    	</div>
    
    	<div class="form_element">
        	<div class="label">Implementation Location/<br>Site/Area </div>
        	<div class="field">
        		<select name="experiment_implementation_location" id="experiment_implementation_location" class="selectionbox">
            		<option value="">Select Implementation Site</option>
					<?php foreach($implementation_locations['data'] as $key=>$implementation_location) { ?>
            			<option value="<?php echo $implementation_location['implementation_site_id']; ?>" <?php if((isset($experiment_detail) && $experiment_detail->experiment_implementation_location==$implementation_location['implementation_site_id']) || (isset($tem_formData) && array_key_exists('experiment_implementation_location', $tem_formData) && $tem_formData['experiment_implementation_location']==$implementation_location['implementation_site_id'])){ ?> selected="selected" <?php } ?>>
            				<?php echo $implementation_location['implementation_site_name']; ?>
            			</option>
            		<?php } ?>
        		</select>
        	</div>
        	<div class="clear"></div>
    	</div>
    	
    	<div class="form_element">
        	<div class="label">Key Words </div>
        	<div class="field">
        		<input type="text" name="experiment_keywords" id="experiment_keywords" class="textbox" value="<?php if($experiment_detail) echo $experiment_detail->experiment_keywords;  elseif(isset($tem_formData) && array_key_exists('experiment_keywords', $tem_formData)) echo $tem_formData['experiment_keywords']; ?>">
        	</div>
        	<div class="clear"></div>
    	</div>
    
    	<div class="form_element">
    		<?php
        		$experiment_commodities = array(); 
        		if(isset($experiment_detail))
					$experiment_commodities = explode(",", $experiment_detail->experiment_commodities);
				elseif(isset($tem_formData) && array_key_exists('experiment_commodities', $tem_formData))
					$experiment_commodities = $tem_formData['experiment_commodities'];
			?>
        	<div class="label">Commodity </div>
        	<div class="field">
        		<select name="experiment_commodities[]" id="experiment_commodities" class="selectionbox" multiple="multiple">
            		<?php foreach($comodities['data'] as $key=>$comodity) { ?>
            			<option value="<?php echo $comodity['value']; ?>" <?php if(in_array($comodity['value'],$experiment_commodities)) { ?> selected="selected" <?php } ?>><?php echo $comodity['name']; ?></option>
            		<?php } ?>
            	</select>
        	</div>
        	<div class="clear"></div>
    	</div>
    
   		<div class="form_element">
   			<?php
        		$experiment_aezs = array(); 
        		if(isset($experiment_detail))
					$experiment_aezs = explode(",", $experiment_detail->experiment_aezs);
				elseif(isset($tem_formData) && array_key_exists('experiment_aezs', $tem_formData))
					$experiment_aezs = $tem_formData['experiment_aezs'];
			?>
        	<div class="label">AEZs </div>
        	<div class="field">
        		<select name="experiment_aezs[]" id="experiment_aezs" class="selectionbox" multiple="multiple">
            		<?php foreach($aezs['data'] as $key=>$aez) { ?>
            			<option value="<?php echo $aez['value']; ?>" <?php if(in_array($aez['value'], $experiment_aezs)) { ?> selected="selected" <?php } ?>><?php echo $aez['name']; ?></option>
            		<?php } ?>
            	</select>
        	</div>
        	<div class="clear"></div>
    	</div>
    
    	<div class="form_element">
        	<div class="label">Initial Date </div>
        	<div class="field">
        		<input type="text" class="textbox disabled" readonly="readonly" name="experiment_initiation_date" id="experiment_initiation_date" data-date-format="yyyy-mm-dd" value="<?php if($experiment_detail){ if($experiment_detail->experiment_initiation_date=='0000-00-00'){echo '';} else {echo $experiment_detail->experiment_initiation_date;}} elseif(isset($tem_formData) && array_key_exists('experiment_initiation_date', $tem_formData)) echo $tem_formData['experiment_initiation_date']; ?>" />
        		<span class="input-group-addon">
           	 		<i class="icon-calendar"></i>
        		</span>
        	</div>
        	<div class="clear"></div>
    	</div>
    
    	<div class="form_element">
        	<div class="label">Completion Date </div>
        	<div class="field">
        		<input type="text" class="textbox disabled" readonly="readonly" name="experiment_completion_date" id="experiment_completion_date" data-date-format="yyyy-mm-dd" value="<?php if($experiment_detail){ if($experiment_detail->experiment_completion_date=='0000-00-00'){echo '';} else {echo $experiment_detail->experiment_completion_date;}} elseif(isset($tem_formData) && array_key_exists('experiment_completion_date', $tem_formData)) echo $tem_formData['experiment_completion_date']; ?>" />
        		<span class="input-group-addon">
            		<i class="icon-calendar"></i>
        		</span>
        	</div>
        	<div class="clear"></div>
    	</div>
    </div>
    <div class="clear"></div>
  	
    <div class="form_element">
    	<div class="label width_170px">Experiment Goal <span class="mandatory">*</span></div>
       	<div class="textarea_field"><textarea name="experiment_goal" id="experiment_goal" class="textarea width_68_percent"><?php if($experiment_detail) echo $experiment_detail->experiment_goal; elseif(isset($tem_formData) && array_key_exists('experiment_goal', $tem_formData)) echo $tem_formData['experiment_goal']; ?></textarea></div>
        <div class="clear"></div>
  	</div>
    
  	<div class="form_element">
    	<div class="label width_170px">Purpose/Objective <span class="mandatory">*</span></div>
       	<div class="textarea_field"><textarea name="experiment_objective" id="experiment_objective" class="textarea width_68_percent"><?php if($experiment_detail) echo $experiment_detail->experiment_objective; elseif(isset($tem_formData) && array_key_exists('experiment_objective', $tem_formData)) echo $tem_formData['experiment_objective']; ?></textarea></div>
        <div class="clear"></div>
  	</div>

    
	<div class="form_element">
		<?php
        	$experiment_expectedOutputs = array(); 
        	if(isset($experiment_detail))
				$experiment_expectedOutputs = explode("---##########---", $experiment_detail->experiment_expected_outputs);
			elseif(isset($tem_formData) && array_key_exists('experiment_expected_outputs', $tem_formData))
				$experiment_expectedOutputs = $tem_formData['experiment_expected_outputs'];
		?>
		
		<div class="label width_170px">Expected output <span class="mandatory">*</span></div>
        <div class="textarea_field" style="width:75%; float: left; display: inline;">
        	<?php 
				if(!empty($experiment_expectedOutputs)) { 
	    			foreach($experiment_expectedOutputs as $key=>$experiment_expectedOutput){
						if(strlen($experiment_expectedOutput)>0){
	    	?>
	    		 
		        	<div>
		            	<textarea name="experiment_expected_outputs[]" id="experiment_expected_outputs[]" class="textarea width-91"><?php echo $experiment_expectedOutput; ?></textarea>
		            	<span style="font-size:16px;"><a id="minus2" href="">[-]</a></span>
		        	</div>
		        	
	    	<?php 
						}
					} 
	    		}
	    	?> 
        	<div id='duplicate2'>
            	<textarea name="experiment_expected_outputs[]" id="experiment_expected_outputs[]" class="textarea width-91"></textarea>
            	<span style="font-size:16px;"><a id="minus2" href="">[-]</a> <a id="plus2" href="">[+]</a></span>
        	</div>
        </div>
        <div class="clear"></div>
    </div>
    
    <div class="form_element">
        <div class="button_panel" style="margin-right: 110px;">
        	<input type="hidden" name="program_id" id="program_id" value="<?php if(isset($program_id)) echo $program_id; ?>">
        	<input type="hidden" name="project_id" id="project_id" value="<?php if(isset($project_id)) echo $project_id; ?>">
			<?php if(isset($experiment_detail) && $experiment_detail->experiment_id!=NULL) { ?>
                <input type="hidden" name="experiment_id" id="experiment_id" value="<?php echo $experiment_detail->experiment_id; ?>">
                <input type="submit" name="delete_experiment_information" id="delete_experiment_information" onclick="javascript:return confirm('Do you want to delete this experiment?');" value="Delete" class="k-button button">            	
            	<input type="submit" name="update_experiment_information" id="update_experiment_information" value="Update" class="k-button button">
            <?php } else { ?>
            	<input type="reset" name="reset_experiment_information" id="reset_experiment_information" value="Reset" class="k-button button">
                <input type="submit" name="save_experiment_information" id="save_experiment_information" value="Save" class="k-button button">
            <?php } ?>                
            
        </div>
        <div class="clear"></div>
    </div>
                   
</div>
</form>
<script language="javascript">
	$('#experiment_planned_start_date').datepicker('setStartDate');
	$('#experiment_planned_end_date').datepicker('setEndDate');
	
	$('#experiment_initiation_date').datepicker('setStartDate');
	$('#experiment_completion_date').datepicker('setEndDate');
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
	var experiment_coordinator_select;
	$("#experiment_coordinator_name").kendoAutoComplete({
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
		    	experiment_coordinator_select = false;
		  	},
		  	select: function(e){
		    	experiment_coordinator_select = true;
			    var dataItem = this.dataItem(e.item.index());                
        		$("#employee_id").val(dataItem.employee_id);
        		$("#experiment_coordinator").val(dataItem.employee_id);
				$("#experiment_coordinator_designation").val(dataItem.designation_name);
		  	},
		  	close: function(e){
		    	// if no valid selection - clear input
		    	if (!experiment_coordinator_select) this.value('');
		  	}
    });
    
    $( "#search_panel" ).click(function() {
	 	var experiment_type = $('input[name=experiment_type]:radio:checked').val();
	 	if(experiment_type=="Program"){
	 		window.open('<?php echo base_url(); ?>Rmis/Experiment/SearchProgram', '_blank', 'location=yes,height=600,width=1024,scrollbars=yes,status=yes');
	 	}else if(experiment_type=="Project"){
	 		window.open('<?php echo base_url(); ?>Rmis/Experiment/SearchProject', '_blank', 'location=yes,height=600,width=1024,scrollbars=yes,status=yes');
	 	}
	});
});
</script>
<style type="text/css">
	.field span.k-autocomplete{ border-radius:0px !important; width: 214px !important; border: solid #bababa 1px; font-size: 13px !important;} 
</style>