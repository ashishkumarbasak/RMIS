<?php 
	if(isset($project_detail)){
		$project_detail = unserialize($project_detail);
	} 
?>

<form name="other_info" id="other_info" method="post" action="">
	<div class="main_form">
    	<div class="form_element">
        	<div class="label width_170px">Title of Research Programme</div>
            <div class="textarea_field"><textarea name="research_program_title" id="research_program_title" class="textarea_small disabled width_68_percent" disabled="disabled" ><?php if($program_detail!=NULL) echo $program_detail->research_program_title; ?></textarea></div>
            <div class="clear"></div>
        </div>
        
        <div class="left_form">
        	<div class="form_element">
            	<div class="label width_170px">Programme Area </div>
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
        		<div class="label">Principal Investigator <br />(or PM/Coordinator)</div>
        		<div class="field">
                	<input type="text" name="program_coordinator" id="program_coordinator" value="<?php if($program_detail!=NULL) echo $program_detail->program_coordinator; ?>" class="textbox disabled" disabled="disabled" />
    			</div>
  				<div class="clear"></div>
 			</div>
 		</div>
	</div>
	
	<div class="main_form">
        	<div class="form_element">
            	<div class="label width_170px">Rationale</div>
                <div class="textarea_field">
                	<textarea name="project_rationale" id="project_rationale" class="textarea width_68_percent"><?php if(isset($project_detail) && $project_detail->project_rationale!=NULL) echo $project_detail->project_rationale; ?></textarea>
             	</div>
                <div class="clear"></div>
			</div>
                        
            <div class="form_element">
           		<div class="label width_170px">Methodology </div>
                <div class="textarea_field">
                	<textarea name="project_methodology" id="project_methodology" class="textarea width_68_percent" ><?php if(isset($project_detail) && $project_detail->project_methodology!=NULL) echo $project_detail->project_methodology; ?></textarea>
                </div>
                <div class="clear"></div>
            </div>
                    
            <div class="form_element">
            	<div class="label width_170px">Background</div>
                <div class="textarea_field">
                	<textarea name="project_background" id="project_background" class="textarea width_68_percent"><?php if(isset($project_detail) && $project_detail->project_background!=NULL) echo $project_detail->project_background; ?></textarea>
                </div>
                <div class="clear"></div>
            </div>
                        
            <div class="form_element">
          		<div class="label width_170px">Socio Economical Impact</div>
                <div class="textarea_field">
                	<textarea name="project_socio_economical_impact" id="project_socio_economical_impact" class="textarea width_68_percent"><?php if(isset($project_detail) && $project_detail->project_socio_economical_impact!=NULL) echo $project_detail->project_socio_economical_impact; ?></textarea>
                </div>
                <div class="clear"></div>
          	</div>
                        
           	<div class="form_element">
           		<div class="label width_170px">Environmental Impact</div>
            	<div class="textarea_field">
             		<textarea name="project_environmental_impact" id="project_environmental_impact" class="textarea width_68_percent"><?php if(isset($project_detail) && $project_detail->project_environmental_impact!=NULL) echo $project_detail->project_environmental_impact; ?></textarea>
              	</div>
             	<div class="clear"></div>
        	</div>
                        
        	<div class="form_element">
          		<div class="label width_170px">Targeted Beneficiary</div>
            	<div class="textarea_field">
               		<textarea name="project_targeted_beneficiary" id="project_targeted_beneficiary" class="textarea width_68_percent"><?php if(isset($project_detail) && $project_detail->project_targeted_beneficiary!=NULL) echo $project_detail->project_targeted_beneficiary; ?></textarea>
              	</div>
               	<div class="clear"></div>
         	</div>
                        
                        
            <div class="form_element">
            	<div class="label width_170px">Reference</div>
             	<div class="textarea_field">
              		<textarea name="project_reference" id="project_reference" class="textarea width_68_percent"><?php if(isset($project_detail) && $project_detail->project_reference!=NULL) echo $project_detail->project_reference; ?></textarea>
             	</div>
              	<div class="clear"></div>
         	</div>
                        
                        
          	<div class="form_element">
           		<div class="label width_170px">External Affiliation</div>
              	<div class="textarea_field">
              		<textarea name="project_external_affiliation" id="project_external_affiliation" class="textarea width_68_percent"><?php if(isset($project_detail) && $project_detail->project_external_affiliation!=NULL) echo $project_detail->project_external_affiliation; ?></textarea>
            	</div>
                <div class="clear"></div>
         	</div>
                        
            <div class="form_element">
           		<div class="label width_170px">Organization Policy</div>
             	<div class="textarea_field">
              		<textarea name="project_organization_policy" id="project_organization_policy" class="textarea width_68_percent"><?php if(isset($project_detail) && $project_detail->project_organization_policy!=NULL) echo $project_detail->project_organization_policy; ?></textarea>
              	</div>
             	<div class="clear"></div>
         	</div>
                        
                        
      		<div class="form_element">
          		<div class="label width_170px">projectme Risks</div>
          		<div class="textarea_field">
               		<textarea name="project_risks" id="project_risks" class="textarea width_68_percent"><?php if(isset($project_detail) && $project_detail->project_risks!=NULL) echo $project_detail->project_risks; ?></textarea>
              	</div>
            	<div class="clear"></div>
        	</div>
        	
        	<div class="form_element">
	            <div class="button_panel" style="margin-right: 112px;">
	            	<?php if(isset($program_detail) && $program_detail->other_information_id!=NULL) { ?>
		                <input type="hidden" name="project_id" id="project_id" value="<?php if($project_id!=NULL) echo $project_id; ?>">
		                <input type="hidden" name="id" id="id" value="<?php echo $project_detail->other_information_id; ?>">
		                <input type="submit" name="update_project_otherinfo" id="update_project_otherinfo" value="Update" class="k-button button">
		            <?php } else { ?>
	                <input type="hidden" name="project_id" id="project_id" value="<?php if($project_id!=NULL) echo $project_id; ?>">
	        		<input type="submit" name="save_project_otherinfo" id="save_project_otherinfo" value="Save" class="k-button button">
	        		<?php } ?>
	            </div>
	            <div class="clear"></div>
	        </div>        
	</div>
</form>