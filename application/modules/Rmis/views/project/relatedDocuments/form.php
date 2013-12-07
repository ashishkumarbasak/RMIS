<?php 
	if(isset($project_detail)){
		$project_detail = unserialize($project_detail);
	}
	if(isset($program_detail)){
		$program_detail = unserialize($program_detail);
	}
?>
<form name="research_info" id="research_info" method="post" action="" enctype="multipart/form-data">
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
        
        <div class="form_element">
            <div class="label width_170px">Planned Start Date </div>
            <div class="field">
                <input type="text" name="project_planned_start_date" id="project_planned_start_date" value="<?php if($project_detail) echo $project_detail->project_planned_start_date; ?>" class="textbox disabled" disabled="disabled" />
            </div>
            <div class="clear"></div>
        </div>  
                        
        <div class="form_element">
            <div class="label width_170px">Planned End Date </div>
            <div class="field">
                <input type="text" name="project_planned_end_date" id="project_planned_end_date" value="<?php if($project_detail) echo $project_detail->project_planned_end_date;?>" class="textbox disabled" disabled="disabled" />
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
            <div class="label">Initiation Date</div>
            <div class="field">
                <input type="text" class="textbox disabled" disabled="disabled" name="project_initiation_date" id="project_initiation_date" data-date-format="yyyy-mm-dd" value="<?php if($project_detail) echo $project_detail->project_initiation_date;?>" />
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

<!-- Program Info-->
<?php if(isset($project_detail) && $project_detail->project_type=="Program" && $project_detail->program_id!=""){ ?>
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
            <div class="label width_170px">Planned Budget (in Taka) </div>
            <div class="field">
                <input type="text" name="program_planned_budget" id="program_planned_budget" value="<?php if($program_detail!=NULL) echo $program_detail->program_planned_budget; ?>" class="textbox disabled" disabled="disabled" />
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
            <div class="label">Approved Budget (in Taka)</div>
            <div class="field">
                <input type="text" name="program_approved_budget" id="program_approved_budget" value="<?php if($program_detail!=NULL) echo $program_detail->program_approved_budget; ?>" class="textbox disabled" disabled="disabled" />
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<?php } ?>

    
    
	<div class="main_form">
		<div class="form_element">
	    	<div class="label">Program Related Document</div>
	        <div class="clear"></div>
	    </div>
   		<div class="left_form">
        	<div class="form_element">
	        	<div class="label width_170px">Document Title <span class="mandatory">*</span></div>
	        	<div class="field">
                    <input type="text" name="document_title" id="document_title" value="<?php if($project_detail) echo $project_detail->document_title;?>">
	        	</div>
	        	<div class="clear"></div>
	    	</div>
            
            <div class="form_element">
           		<div class="label width_170px">File/Document Type <span class="mandatory">*</span></div>
               	<div class="field">
               		<select name="document_type" id="document_type" class="selectionbox">
	            		<option value="">Select File Type</option>
						<?php 						
						foreach($document_type['data'] as $key=>$document_type_item) { ?>
	            			<option value="<?php echo $document_type_item['value']; ?>" <?php if(isset($project_detail) && $project_detail->document_type==$document_type_item['value']) { ?> selected="selected" <?php } ?> ><?php echo $document_type_item['name']; ?></option>
	            		<?php } ?>
	        		</select>
               	</div>
              	<div class="clear"></div>
         	</div>
                            
           	<div class="form_element">
           		<div class="label width_170px">Sorting Order <span class="mandatory">*</span></div>
               	<div class="field">
               		<input type="text" name="sorting_order" id="sorting_order" value="<?php if($project_detail) echo $project_detail->sorting_order; ?>" class="textbox" />
              	</div>
              	<div class="clear"></div>
          	</div>  
                            
          	<div class="form_element">
           		<div class="label width_170px">File/Document <span class="mandatory">*</span></div>
              	<div class="field">
                	<input name="files" id="files" type="file" />
                	<?php if(isset($file_upload_error) && $file_upload_error=="yes") {  ?>
                		<div for="files" class="error">Please select file to upload.</div>
                	<?php } ?> 
                </div>
                <div class="clear"></div>
          	</div>
		</div>
                        
		<div class="right_form">    
       		<div class="form_element">
           		<div class="label">Remarks</div>
               	<div class="field" style="width: 300px;"> 
                	<textarea name="remarks" id="remarks" class="textarea width-100" style="width: 100%;"></textarea>
             	</div>
               	<div class="clear"></div>
         	</div>
		</div>                                                 
	</div>    
  
  
   <div class="form_element">
    	<div class="button_panel" style="margin-right:15px;">
    		<?php if(isset($project_detail) && ($activityLists!=NULL)) { ?>
		    		<input type="hidden" name="project_id" id="project_id" value="<?php if($project_id!=NULL) echo $project_id; ?>">
                    <input type="submit" name="update_documentInformation" id="update_documentInformation" value="Update" class="k-button button">
		    		<input type="button" name="delete_documentInformation" id="delete_documentInformation" value="Delete" class="k-button button">		            
		    <?php } else { ?>
                <input type="hidden" name="project_id" id="project_id" value="<?php if($project_id!=NULL) echo $project_id; ?>">
            	<input type="submit" name="save_documentInformation" id="save_documentInformation" value="Save" class="k-button button">
        	<?php } ?>
        </div>
        <div class="clear"></div>
    </div>  
    
</form>

<script>
	$(document).ready(function() {
    	$("#files").kendoUpload();
    });
</script>