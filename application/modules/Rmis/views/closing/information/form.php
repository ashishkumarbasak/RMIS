<?php 
	if(isset($closing_detail)){
		$closing_detail = unserialize($closing_detail);
	} 
	
	if(isset($project_detail)){
		$project_detail = unserialize($project_detail);
	}
	
	if(isset($program_detail)){
		$program_detail = unserialize($program_detail);
	}
?>

<form name="closing_information" id="closing_information" method="post" action="<?php if(isset($form_action_url) && $form_action_url!=NULL) echo $form_action_url; ?>">
	<div class="main_form">
     	<div class="left_form">
        	<div class="form_element">
                <div class="label width_170px">&nbsp;</div>
                <div class="textarea_field">
                    <input type="radio" name="type" id="type" value="Program" <?php if((isset($experiment_type) && $experiment_type=="ProgID")) { ?> checked="checked" <?php } else if( (isset($experiment_type) && $experiment_type!="ProjID") && (isset($experiment_detail) && $experiment_detail->experiment_type=="Program") ){ ?> checked="checked" <?php } ?> > Program &nbsp;
        			<input type="radio" name="type" id="type" value="Project" <?php if((isset($experiment_type) && $experiment_type=="ProjID")) { ?> fuck checked="checked" <?php } else if( (isset($experiment_type) && $experiment_type!="ProgID") && (isset($experiment_detail) && $experiment_detail->experiment_type=="Project") ){ ?> checked="checked" <?php } ?> > Project &nbsp;
                    <input type="button" name="search" id="search_panel" value="Search" class="k-button button">
                </div>
                <div class="clear"></div>
            </div>
		</div>                                                
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
	
	
	
	
	
	
	
	<div class="main_form">
        	<div class="form_element">
            	<div class="label width_170px">Executive Summary</div>
                <div class="textarea_field">
                	<textarea name="executive_summary" id="executive_summary" class="textarea width_68_percent"><?php if(isset($closing_detail) && $closing_detail->executive_summary!=NULL) echo $closing_detail->executive_summary; ?></textarea>
             	</div>
                <div class="clear"></div>
			</div>
            
            <div class="form_element">
           		<div class="label width_170px">Actual output</div>
                <div class="textarea_field">
                	<textarea name="actual_output" id="actual_output" class="textarea width_68_percent" ><?php if(isset($closing_detail) && $closing_detail->actual_output!=NULL) echo $closing_detail->actual_output; ?></textarea>
                </div>
                <div class="clear"></div>
            </div>
                    
            <div class="form_element">
            	<div class="label width_170px">Recommendation</div>
                <div class="textarea_field">
                	<textarea name="recommendation" id="recommendation" class="textarea width_68_percent"><?php if(isset($closing_detail) && $closing_detail->recommendation!=NULL) echo $closing_detail->recommendation; ?></textarea>
                </div>
                <div class="clear"></div>
            </div>
        	
        	<div class="form_element">
	            <div class="button_panel" style="margin-right: 112px;">
	            	<input type="hidden" name="program_id" id="program_id" value="<?php if(isset($program_id)) echo $program_id; ?>">
        			<input type="hidden" name="project_id" id="project_id" value="<?php if(isset($project_id)) echo $project_id; ?>">
	            	<?php if(isset($closing_detail) && $closing_detail->id!=NULL) { ?>
		                <input type="hidden" name="id" id="id" value="<?php echo $closing_detail->id; ?>">
		                <input type="submit" name="new_closing_info" id="new_closing_info" value="New" class="k-button button">
                        <input type="submit" name="update_closing_info" id="update_closing_info" value="Update" class="k-button button">
                        <input type="button" name="delete_closingInfo" id="delete_closingInfo" value="Delete" onclick="javascript:return confirm('Do you want to delete this program/project information?');" class="k-button button">
		            <?php } else { ?>
	                <input type="hidden" name="id" id="id" value="<?php if($id!=NULL) echo $id; ?>">
	        		<input type="submit" name="save_closing_info" id="save_closing_info" value="Save" class="k-button button">
	        		<?php } ?>
	            </div>
	            <div class="clear"></div>
	        </div>        
	</div>
</form>

<script type="text/javascript">
	$( "#search_panel" ).click(function() {
	 	var experiment_type = $('input[name=type]:radio:checked').val();
	 	if(experiment_type=="Program"){
	 		window.open('<?php echo base_url(); ?>Rmis/closing/SearchProgram', '_blank', 'location=yes,height=600,width=1024,scrollbars=yes,status=yes');
	 	}else if(experiment_type=="Project"){
	 		window.open('<?php echo base_url(); ?>Rmis/closing/SearchProject', '_blank', 'location=yes,height=600,width=1024,scrollbars=yes,status=yes');
	 	}
	});
</script>