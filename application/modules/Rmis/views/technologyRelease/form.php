<script src="<?php echo site_url('assets/extensive/js/date-time/bootstrap-datepicker.min.js'); ?>"></script>
<link rel="stylesheet" href="<?php echo site_url('assets/extensive/css/datepicker.css'); ?>" />

<script src="<?php echo site_url('assets/extensive/js/date-time/daterangepicker.min.js'); ?>"></script>
<link rel="stylesheet" href="<?php echo site_url('assets/extensive/css/daterangepicker.css'); ?>" />
<?php 
	if(isset($logical_framework_details)){
		$logical_framework_details = unserialize($logical_framework_details);
	} 
	
	if(isset($project_detail)){
		$project_detail = unserialize($project_detail);
	}
	
	if(isset($program_detail)){
		$program_detail = unserialize($program_detail);
	}
?>

<form name="logicalFramework" id="logicalFramework" method="post" action="">

	<div class="main_form">    
         <div class="left_form">
      		<div class="form_element">
           		<div class="label width_170px">Technology/Knowledge Name <span class="mandatory">*</span></div>
               	<div class="field">
               		<textarea name="research_experiment_title" id="research_experiment_title" class="textarea_small"><?php if($experiment_detail) echo $experiment_detail->research_experiment_title;?></textarea>
              	</div>
              	<div class="clear"></div>
          	</div>  
		</div>
        
        <div class="right_form" style="height:60px;">    
           	<div class="form_element">
           		<div class="label">&nbsp;</div>
              	<div class="field">
              		<input type="checkbox" name="technology_type" value="Is Released" /> Is Released
                    <input type="checkbox" name="technology_type" value="Is Transferred " /> Is Transferred 
               	</div>
               	<div class="clear"></div>
           	</div>                        
		</div>
        
        <div class="left_form">
      		<div class="form_element">
           		<div class="label width_170px">Version <span class="mandatory">*</span></div>
               	<div class="field">
               		<input type="text" class="textbox" name="experiment_initiation_date" id="experiment_initiation_date" data-date-format="yyyy-mm-dd" value="<?php if($experiment_detail) echo $experiment_detail->experiment_initiation_date;?>" />
              	</div>
              	<div class="clear"></div>
          	</div>  
		</div>
        
        <div class="right_form">    
           	<div class="form_element">
           		<div class="label">Date <span class="mandatory">*</span></div>
              	<div class="field">
              		<input type="text" class="textbox disabled" name="technology_transfer_date" id="technology_transfer_date" data-date-format="yyyy-mm-dd" value="<?php if($experiment_detail) echo $experiment_detail->technology_transfer_date;?>" />
               	</div>
               	<div class="clear"></div>
           	</div>                        
		</div>
        
        <div class="form_element">
	    	<div class="label width_170px">About Technology/Knowledge</div>
	       	<div class="textarea_field"><textarea name="research_experiment_title" id="research_experiment_title" class="textarea_small width_68_percent"><?php if($experiment_detail) echo $experiment_detail->research_experiment_title;?></textarea></div>
	        <div class="clear"></div>
	  	</div>
                
        <div class="form_element">
            <div class="label width_170px">&nbsp;</div>
            <div class="textarea_field">
                <input type="radio" name="type" id="type" value="Experiment" <?php if(isset($logical_framework_details) && $logical_framework_details->type=="Experiment"){ ?> checked="checked" <?php } ?>> Experiment &nbsp;
                <input type="radio" name="type" id="type" value="Program" <?php if(isset($logical_framework_details) && $logical_framework_details->type=="Program"){ ?> checked="checked" <?php } ?>> Program &nbsp; 
                <input type="radio" name="type" id="type" value="Project" <?php if(isset($logical_framework_details) && $logical_framework_details->type=="Project"){ ?> checked="checked" <?php } ?>> Project &nbsp;
                <input type="submit" name="search" id="search" value="Search" class="k-button button">
            </div>
            <div class="clear"></div>
        </div>        
                                                       
	</div>
    
	<!-- Experiment Info-->
    <?php //if(isset($logical_framework_details) && $logical_framework_details->experiment_type=="Project" && $logical_framework_details->project_id!=""){ ?>
	<div class="main_form">
   		<div class="form_element">
	    	<div class="label width_170px">Title of Research Experiment <span class="mandatory">*</span></div>
	       	<div class="textarea_field"><textarea name="research_experiment_title" id="research_experiment_title" disabled="disabled" class="textarea_small disabled width_68_percent"><?php if($experiment_detail) echo $experiment_detail->research_experiment_title;?></textarea></div>
	        <div class="clear"></div>
	  	</div>
                        
     	<div class="left_form">
      		<div class="form_element">
           		<div class="label width_170px">Initiation Date </div>
               	<div class="field">
               		<input type="text" class="textbox disabled" disabled="disabled" name="experiment_initiation_date" id="experiment_initiation_date" data-date-format="yyyy-mm-dd" value="<?php if($experiment_detail) echo $experiment_detail->experiment_initiation_date;?>" />
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

           	<div class="form_element">
           		<div class="label">Completion Date</div>
              	<div class="field">
              		<input type="text" class="textbox disabled" disabled="disabled" name="experiment_completion_date" id="experiment_completion_date" data-date-format="yyyy-mm-dd" value="<?php if($experiment_detail) echo $experiment_detail->experiment_completion_date;?>" />
               	</div>
               	<div class="clear"></div>
           	</div>                        
		</div>                                                 
	</div>
    <?php //} ?>    

	<!-- Project Info-->
    <?php //if(isset($logical_framework_details) && $logical_framework_details->experiment_type=="Project" && $logical_framework_details->project_id!=""){ ?>
	<div class="main_form">
   		<div class="form_element">
	    	<div class="label width_170px">Title of Research Project <span class="mandatory">*</span></div>
	       	<div class="textarea_field"><textarea name="research_project_title" id="research_project_title" disabled="disabled" class="textarea_small disabled width_68_percent"><?php if($project_detail) echo $project_detail->research_project_title;?></textarea></div>
	        <div class="clear"></div>
	  	</div>
                        
     	<div class="left_form">
      		<div class="form_element">
           		<div class="label width_170px">Initiation Date </div>
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
    <?php //} ?>
    
    <!-- Program Info-->
    <?php //if(isset($logical_framework_details) && $logical_framework_details->experiment_type=="Project" && $logical_framework_details->program_id!=""){ ?>
    <div class="main_form">
        <div class="form_element">
            <div class="label width_170px">Title of Research Program</div>
            <div class="textarea_field"><textarea name="research_program_title" id="research_program_title" disabled="disabled" class="textarea_small disabled width_68_percent"><?php if($program_detail!=NULL) echo $program_detail->research_program_title; ?></textarea></div>
            <div class="clear"></div>
        </div>
                    
        <div class="left_form">
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
                        
            <div class="form_element">
                <div class="label width_170px">Initiation Date </div>
                <div class="field">
                    <input type="text" class="textbox disabled" disabled="disabled" name="project_completion_date" id="project_completion_date" data-date-format="yyyy-mm-dd" value="<?php if($program_detail) echo $program_detail->program_initiation_date;?>" />
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
                        
            <div class="form_element">
                <div class="label">Completion Date</div>
                <div class="field">
                    <input type="text" class="textbox disabled" disabled="disabled" name="program_completion_date" id="program_completion_date" data-date-format="yyyy-mm-dd" value="<?php if($program_detail) echo $program_detail->program_completion_date;?>" />
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <?php //} ?>
	
	<div class="main_form">
		<div class="form_element">
	    	<div class="label">Expected & Actual Output</div>
	        <div class="clear"></div>
	    </div>
	    <div class="left_form">
	    	<div class="form_element">
				<?php
					$program_expectedOutputs = array(); 
					$program_actualOutputs = array(); 
		        	if(isset($program_detail)){
		        		$program_expectedOutputs = explode("---##########---", $program_detail->program_expected_outputs);
						$program_actualOutputs = explode("---##########---", $program_detail->program_actual_outputs);
		        	}
				?>
				
				<div class="label width_170px">Expected output <span class="mandatory">*</span></div>
		        <div class="textarea_field" style="width:75%; float: left; display: inline;">
		        	<?php 
						/*if(!empty($program_expectedOutputs)) { 
			    			foreach($program_expectedOutputs as $key=>$program_expectedOutput){
			    				if($program_expectedOutput!=NULL){*/
			    	?>
			    		 
				        	<div>
				            	<textarea name="program_expected_outputs[]" id="program_expected_outputs[]" class="textarea width-100 disabled" disabled="disabled"><?php echo $program_expectedOutput; ?></textarea>
				        	</div>
				        	
			    	<?php 		/*}
							} 
			    		}*/
			    	?>
		        </div>
		        <div class="clear"></div>
		 	</div>
	    </div>
	    
	    <div class="right_form">
	    	<div class="form_element">
				<div class="label width_170px">Actual output <span class="mandatory">*</span></div>
		        <div class="textarea_field" style="width:75%; float: left; display: inline;">
		        	<?php 
						/*if(!empty($program_expectedOutputs)) { 
			    			foreach($program_expectedOutputs as $key=>$program_expectedOutput){
			    				if($program_expectedOutput!=NULL){*/
			    	?>			    		 
				        	<div>
				            	<textarea name="program_actual_outputs[]" id="program_actual_outputs[]" class="textarea width-100"><?php if(array_key_exists($key, $program_actualOutputs)) echo $program_actualOutputs[$key]; ?></textarea>
				        	</div>  	
			    	<?php 
			    				/*}
							} 
			    		}*/
			    	?>
		        </div>
		        <div class="clear"></div>
		 	</div>
        </div>
        
        <div class="form_element">
            <div class="button_panel" style="margin-right: 112px;">
                <?php if(isset($logical_framework_details) && $logical_framework_details->id!=NULL) { ?>
                    <input type="hidden" name="id" id="id" value="<?php echo $logical_framework_details->id; ?>">
                    <input type="submit" name="new_logical_framework" id="new_logical_framework" value="New" class="k-button button">
                    <input type="submit" name="update_logical_framework" id="update_logical_framework" value="Update" class="k-button button">
                    <input type="button" name="delete_logical_framework" id="delete_logical_framework" value="Delete" onclick="javascript:return confirm('Do you want to delete this program/project information?');" class="k-button button">
                <?php } else { ?>
                <input type="hidden" name="id" id="id" value="<?php if($id!=NULL) echo $id; ?>">
                <input type="submit" name="save_logical_framework" id="save_logical_framework" value="Save" class="k-button button">
                <?php } ?>
            </div>
            <div class="clear"></div>
        </div>
        
	 </div>
</form>
<script language="javascript">
	$('#technology_transfer_date').datepicker('setStartDate');
</script>