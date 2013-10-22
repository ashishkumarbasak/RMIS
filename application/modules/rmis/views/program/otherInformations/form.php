<?php 
	if(isset($program_detail)){
		$program_detail = unserialize($program_detail);
	} 
?>

<form name="other_info" id="other_info" method="post" action="">
	<div class="main_form">
    	<div class="form_element">
        	<div class="label width_170px">Title of Research Programme</div>
            <div class="textarea_field"><textarea name="research_program_title" id="research_program_title" class="textarea_small disabled width_68_percent" readonly="readonly"><?php if($program_detail!=NULL) echo $program_detail->research_program_title; ?></textarea></div>
            <div class="clear"></div>
        </div>
        
        <div class="left_form">
        	<div class="form_element">
            	<div class="label width_170px">Programme Area </div>
                <div class="field">
                	<input type="text" name="program_area" id="program_area" value="<?php if($program_detail!=NULL) echo $program_detail->program_area; ?>" class="textbox disabled" readonly="readonly">
               	</div>
               	<div class="clear"></div>
      		</div>      
		</div>
                    
        <div class="right_form">    
        	<div class="form_element">
        		<div class="label">Principal Investigator <br />(or PM/Coordinator)</div>
        		<div class="field">
                	<input type="text" name="program_coordinator" id="program_coordinator" value="<?php if($program_detail!=NULL) echo $program_detail->program_coordinator; ?>" class="textbox disabled" readonly="readonly">
    			</div>
  				<div class="clear"></div>
 			</div>
 		</div>
	</div>
	
	<div class="main_form">
        	<div class="form_element">
            	<div class="label width_170px">Rationale</div>
                <div class="textarea_field">
                	<textarea name="program_rationale" id="program_rationale" class="textarea width_68_percent" ></textarea>
             	</div>
                <div class="clear"></div>
			</div>
                        
            <div class="form_element">
           		<div class="label width_170px">Methodology </div>
                <div class="textarea_field">
                	<textarea name="program_methodology" id="program_methodology" class="textarea width_68_percent" ></textarea>
                </div>
                <div class="clear"></div>
            </div>
                    
            <div class="form_element">
            	<div class="label width_170px">Background</div>
                <div class="textarea_field">
                	<textarea name="program_background" id="program_background" class="textarea width_68_percent"></textarea>
                </div>
                <div class="clear"></div>
            </div>
                        
            <div class="form_element">
          		<div class="label width_170px">Socio Economical Impact</div>
                <div class="textarea_field">
                	<textarea name="program_socio_economical_impact" id="program_socio_economical_impact" class="textarea width_68_percent"></textarea>
                </div>
                <div class="clear"></div>
          	</div>
                        
           	<div class="form_element">
           		<div class="label width_170px">Environmental Impact</div>
            	<div class="textarea_field">
             		<textarea name="program_environmental_impact" id="program_environmental_impact" class="textarea width_68_percent"></textarea>
              	</div>
             	<div class="clear"></div>
        	</div>
                        
        	<div class="form_element">
          		<div class="label width_170px">Targeted Beneficiary</div>
            	<div class="textarea_field">
               		<textarea name="program_targeted_beneficiary" id="program_targeted_beneficiary" class="textarea width_68_percent"></textarea>
              	</div>
               	<div class="clear"></div>
         	</div>
                        
                        
            <div class="form_element">
            	<div class="label width_170px">Reference</div>
             	<div class="textarea_field">
              		<textarea name="program_reference" id="program_reference" class="textarea width_68_percent"></textarea>
             	</div>
              	<div class="clear"></div>
         	</div>
                        
                        
          	<div class="form_element">
           		<div class="label width_170px">External Affiliation</div>
              	<div class="textarea_field">
              		<textarea name="program_external_affiliation" id="program_external_affiliation" class="textarea width_68_percent"></textarea>
            	</div>
                <div class="clear"></div>
         	</div>
                        
            <div class="form_element">
           		<div class="label width_170px">Organization Policy</div>
             	<div class="textarea_field">
              		<textarea name="program_organization_policy" id="program_organization_policy" class="textarea width_68_percent"></textarea>
              	</div>
             	<div class="clear"></div>
         	</div>
                        
                        
      		<div class="form_element">
          		<div class="label width_170px">Programme Risks</div>
          		<div class="textarea_field">
               		<textarea name="program_risks" id="program_risks" class="textarea width_68_percent"></textarea>
              	</div>
            	<div class="clear"></div>
        	</div>
        	
        	<div class="form_element">
	            <div class="button_panel" style="margin-right: 112px;">
	                <input type="hidden" name="program_id" id="program_id" value="<?php if($program_detail!=NULL) echo $program_detail->program_id; ?>">
	        		<input type="submit" name="save_program_otherinfo" id="save_program_otherinfo" value="Save" class="k-button button">
	            </div>
	            <div class="clear"></div>
	        </div>        
	</div>
</form>