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
?>

<form name="other_info" id="other_info" method="post" action="">
	<div class="main_form">
   		<div class="form_element">
	    	<div class="label width_170px">Title of Research Experiment <span class="mandatory">*</span></div>
	       	<div class="textarea_field"><textarea name="research_experiment_title" id="research_experiment_title" disabled="disabled" class="textarea_small disabled width_68_percent"><?php if($experiment_detail) echo $experiment_detail->research_experiment_title;?></textarea></div>
	        <div class="clear"></div>
	  	</div>
                        
     	<div class="left_form">
        	<div class="form_element">
                <div class="label width_170px">&nbsp;</div>
                <div class="textarea_field">
                    <input type="radio" name="experiment_type" id="experiment_type" value="Independent" <?php if(isset($experiment_detail) && $experiment_detail->experiment_type=="Independent"){ ?> checked="checked" <?php } ?> disabled="disabled"> Independent 
                    <input type="radio" name="experiment_type" id="experiment_type" value="Program" <?php if(isset($experiment_detail) && $experiment_detail->experiment_type=="Program"){ ?> checked="checked" <?php } ?>disabled="disabled"> Program &nbsp; 
                    <input type="radio" name="experiment_type" id="experiment_type" value="Project" <?php if(isset($experiment_detail) && $experiment_detail->experiment_type=="Project"){ ?> checked="checked" <?php } ?>> Project &nbsp;
                </div>
                <div class="clear"></div>
            </div>
		</div>
                        
		<div class="right_form">    
       		<div class="form_element">
           		<div class="label">Principal Investigator <br />(or PM/Coordinator)</div>
               	<div class="field">
              		<input type="text" name="experiment_coordinator" id="experiment_coordinator" value="<?php if($experiment_detail) echo $experiment_detail->experiment_coordinator;?>" class="textbox disabled" disabled="disabled" />
             	</div>
               	<div class="clear"></div>
         	</div>
		</div>                                                 
	</div>

<!-- Program Info-->
<div id="program_details">
<?php if((isset($experiment_detail) && $experiment_detail->experiment_type=="Program") || (isset($program_id) && $program_id!=0 && $program_detail!=NULL )){ ?>
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
<?php if((isset($experiment_detail) && $experiment_detail->experiment_type=="Project") || (isset($project_id) && $project_id!=0 && $project_detail!=NULL )){ ?>
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
	
	<div class="main_form">
        	<div class="form_element">
            	<div class="label width_170px">Rationale <span class="mandatory">*</span></div>
                <div class="textarea_field">
                	<textarea name="experiment_rationale" id="experiment_rationale" class="textarea width_68_percent"><?php if(isset($experiment_detail) && $experiment_detail->experiment_rationale!=NULL) echo $experiment_detail->experiment_rationale; ?></textarea>
             	</div>
                <div class="clear"></div>
			</div>
            
            <div class="form_element">
           		<div class="label width_170px">Commodity <span class="mandatory">*</span></div>
                <div class="textarea_field">
                	<textarea name="experiment_commodity" id="experiment_commodity" class="textarea width_68_percent" ><?php if(isset($experiment_detail) && $experiment_detail->experiment_commodity!=NULL) echo $experiment_detail->experiment_commodity; ?></textarea>
                </div>
                <div class="clear"></div>
            </div>
                        
            <div class="form_element">
           		<div class="label width_170px">Methodology <span class="mandatory">*</span></div>
                <div class="textarea_field">
                	<textarea name="experiment_methodology" id="experiment_methodology" class="textarea width_68_percent" ><?php if(isset($experiment_detail) && $experiment_detail->experiment_methodology!=NULL) echo $experiment_detail->experiment_methodology; ?></textarea>
                </div>
                <div class="clear"></div>
            </div>
                    
            <div class="form_element">
            	<div class="label width_170px">Background </div>
                <div class="textarea_field">
                	<textarea name="experiment_background" id="experiment_background" class="textarea width_68_percent"><?php if(isset($experiment_detail) && $experiment_detail->experiment_background!=NULL) echo $experiment_detail->experiment_background; ?></textarea>
                </div>
                <div class="clear"></div>
            </div>
                        
            <div class="form_element">
          		<div class="label width_170px">Socio Economical Impact</div>
                <div class="textarea_field">
                	<textarea name="experiment_socio_economical_impact" id="experiment_socio_economical_impact" class="textarea width_68_percent"><?php if(isset($experiment_detail) && $experiment_detail->experiment_socio_economical_impact!=NULL) echo $experiment_detail->experiment_socio_economical_impact; ?></textarea>
                </div>
                <div class="clear"></div>
          	</div>
                        
           	<div class="form_element">
           		<div class="label width_170px">Environmental Impact</div>
            	<div class="textarea_field">
             		<textarea name="experiment_environmental_impact" id="experiment_environmental_impact" class="textarea width_68_percent"><?php if(isset($experiment_detail) && $experiment_detail->experiment_environmental_impact!=NULL) echo $experiment_detail->experiment_environmental_impact; ?></textarea>
              	</div>
             	<div class="clear"></div>
        	</div>
                        
        	<div class="form_element">
          		<div class="label width_170px">Targeted Beneficiary</div>
            	<div class="textarea_field">
               		<textarea name="experiment_targeted_beneficiary" id="experiment_targeted_beneficiary" class="textarea width_68_percent"><?php if(isset($experiment_detail) && $experiment_detail->experiment_targeted_beneficiary!=NULL) echo $experiment_detail->experiment_targeted_beneficiary; ?></textarea>
              	</div>
               	<div class="clear"></div>
         	</div>
                        
                        
            <div class="form_element">
            	<div class="label width_170px">Reference</div>
             	<div class="textarea_field">
              		<textarea name="experiment_reference" id="experiment_reference" class="textarea width_68_percent"><?php if(isset($experiment_detail) && $experiment_detail->experiment_reference!=NULL) echo $experiment_detail->experiment_reference; ?></textarea>
             	</div>
              	<div class="clear"></div>
         	</div>
                        
                        
          	<div class="form_element">
           		<div class="label width_170px">External Affiliation</div>
              	<div class="textarea_field">
              		<textarea name="experiment_external_affiliation" id="experiment_external_affiliation" class="textarea width_68_percent"><?php if(isset($experiment_detail) && $experiment_detail->experiment_external_affiliation!=NULL) echo $experiment_detail->experiment_external_affiliation; ?></textarea>
            	</div>
                <div class="clear"></div>
         	</div>
                        
            <div class="form_element">
           		<div class="label width_170px">Organization Policy</div>
             	<div class="textarea_field">
              		<textarea name="experiment_organization_policy" id="experiment_organization_policy" class="textarea width_68_percent"><?php if(isset($experiment_detail) && $experiment_detail->experiment_organization_policy!=NULL) echo $experiment_detail->experiment_organization_policy; ?></textarea>
              	</div>
             	<div class="clear"></div>
         	</div>
                        
                        
      		<div class="form_element">
          		<div class="label width_170px">Record to Keep</div>
          		<div class="textarea_field">
               		<textarea name="experiment_record_to_keep" id="experiment_record_to_keep" class="textarea width_68_percent"><?php if(isset($experiment_detail) && $experiment_detail->experiment_record_to_keep!=NULL) echo $experiment_detail->experiment_record_to_keep; ?></textarea>
              	</div>
            	<div class="clear"></div>
        	</div>
        	
        	<div class="form_element">
	            <div class="button_panel" style="margin-right: 112px;">
	            	<?php if(isset($experiment_detail) && $experiment_detail->other_information_id!=NULL) { ?>
		                <input type="hidden" name="experiment_id" id="experiment_id" value="<?php if($experiment_id!=NULL) echo $experiment_id; ?>">
		                <input type="hidden" name="id" id="id" value="<?php echo $experiment_detail->other_information_id; ?>">
		                <input type="submit" name="update_experiment_otherinfo" id="update_experiment_otherinfo" value="Update" class="k-button button">
		            <?php } else { ?>
	                <input type="hidden" name="experiment_id" id="experiment_id" value="<?php if($experiment_id!=NULL) echo $experiment_id; ?>">
	        		<input type="submit" name="save_experiment_otherinfo" id="save_experiment_otherinfo" value="Save" class="k-button button">
	        		<?php } ?>
	            </div>
	            <div class="clear"></div>
	        </div>        
	</div>
</form>