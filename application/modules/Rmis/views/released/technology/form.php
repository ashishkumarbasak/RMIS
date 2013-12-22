<script src="<?php echo site_url('assets/extensive/js/date-time/bootstrap-datepicker.min.js'); ?>"></script>
<link rel="stylesheet" href="<?php echo site_url('assets/extensive/css/datepicker.css'); ?>" />

<script src="<?php echo site_url('assets/extensive/js/date-time/daterangepicker.min.js'); ?>"></script>
<link rel="stylesheet" href="<?php echo site_url('assets/extensive/css/daterangepicker.css'); ?>" />
<?php 
	if(isset($tech_release_details)){
		$tech_release_details = unserialize($tech_release_details);
	} 
	if(isset($project_detail)){
		$project_detail = unserialize($project_detail);
	}
	if(isset($program_detail)){
		$program_detail = unserialize($program_detail);
	}
	if(isset($experiment_detail)){
		$experiment_detail = unserialize($experiment_detail);
	}
	if(isset($result)){
		$result = unserialize($result);
	}
?>

<form name="logicalFramework" id="logicalFramework" method="post" action="<?php if(isset($form_action_url) && $form_action_url!=NULL) echo $form_action_url; ?>">

	<div class="main_form">    
        <div class="form_element">
	    	<div class="label width_170px">Technology/Knowledge Name <span class="mandatory">*</span></div>
	       	<div class="textarea_field"><textarea name="tech_knowledge_name" id="tech_knowledge_name" class="textarea_small width_68_percent"><?php if($tech_release_details) echo $tech_release_details->tech_knowledge_name;?></textarea></div>
	        <div class="clear"></div>
	  	</div>
        
        <div class="left_form">    
           	<div class="form_element">
           		<div class="label width_170px"> &nbsp; </div>
           		<div class="field">
              		<input type="checkbox" name="is_relased" value="1" <?php if($tech_release_details && $tech_release_details->is_relased == "1") echo "checked";?> /> Is Released
                    <input type="checkbox" name="is_transferred" value="1" <?php if($tech_release_details && $tech_release_details->is_transferred == "1") echo "checked";?> /> Is Transferred 
               	</div>
               	<div class="clear"></div>
           	</div>                        
		</div>
        <div class="clear"></div>
        
        <div class="left_form">
      		<div class="form_element">
           		<div class="label width_170px">Version <span class="mandatory">*</span></div>
               	<div class="field">
               		<input type="text" class="textbox" name="version" id="version" data-date-format="yyyy-mm-dd" value="<?php if($tech_release_details) echo $tech_release_details->version;?>" />
              	</div>
              	<div class="clear"></div>
          	</div>  
		</div>
        
        <div class="right_form">    
           	<div class="form_element">
           		<div class="label">Date <span class="mandatory">*</span></div>
              	<div class="field">
              		<input type="text" class="textbox disabled" name="date" id="technology_transfer_date" data-date-format="yyyy-mm-dd" value="<?php if($tech_release_details) echo $tech_release_details->date;?>" />
               	</div>
               	<div class="clear"></div>
           	</div>                        
		</div>
        
        <div class="form_element">
	    	<div class="label width_170px">About Technology/Knowledge</div>
	       	<div class="textarea_field"><textarea name="about" id="research_experiment_title" class="textarea_small width_68_percent"><?php if($tech_release_details) echo $tech_release_details->about;?></textarea></div>
	        <div class="clear"></div>
	  	</div>
                
        <div class="form_element">
            <div class="label width_170px">&nbsp;</div>
            <div class="textarea_field">
                <input type="radio" name="type" id="type" value="Experiment" <?php if(isset($Type) && $Type=="ExpID"){ ?>  checked="checked" <?php } else if( (isset($Type) && $Type!="ExpID") && (isset($tech_release_details) && $tech_release_details->type=="Experiment") ){ ?> checked="checked" <?php } ?> > Experiment &nbsp;
               	<input type="radio" name="type" id="type" value="Program" <?php if((isset($Type) && $Type=="ProgID")) { ?> checked="checked" <?php } else if( (isset($Type) && $Type!="ProjID") && (isset($tech_release_details) && $tech_release_details->type=="Program") ){ ?> checked="checked" <?php } ?> > Program &nbsp;
        		<input type="radio" name="type" id="type" value="Project" <?php if((isset($Type) && $Type=="ProjID")) { ?> checked="checked" <?php } else if( (isset($Type) && $Type!="ProgID") && (isset($tech_release_details) && $tech_release_details->type=="Project") ){ ?> checked="checked" <?php } ?> > Project &nbsp;
               	<input type="button" name="search" id="search_panel" value="Search" class="k-button button">
            </div>
            <div class="clear"></div>
        </div>        
                                                       
	</div>
    
	
	<!-- Experiment Info-->
<div id="experiment_details">
<?php 
		if(
		((isset($logical_framework_details) && $logical_framework_details->type=="Experiment") || (isset($experiment_id) && $experiment_id!=0 && $experiment_detail!=NULL ))
		){ ?>
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
<?php } ?>
</div>    
    

<!-- Project Info-->
<div id="project_details">
<?php if(
			((isset($logical_framework_details) && $logical_framework_details->type=="Project") || (isset($project_id) && $project_id!=0 && $project_detail!=NULL ))
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
	    
     

<!-- Program Info-->
<div id="program_details">
<?php if(
		((isset($logical_framework_details) && $logical_framework_details->type=="Program") || (isset($program_id) && $program_id!=0 && $program_detail!=NULL ))
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
						if(!empty($program_expectedOutputs)) { 
			    			foreach($program_expectedOutputs as $key=>$program_expectedOutput){
			    				if($program_expectedOutput!=NULL){
			    	?>
			    		 
				        	<div>
				            	<textarea name="program_expected_outputs[]" id="program_expected_outputs[]" class="textarea width-100 disabled" disabled="disabled"><?php echo $program_expectedOutput; ?></textarea>
				        	</div>
				        	
			    	<?php 		}
							} 
			    		}
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
						if(!empty($program_expectedOutputs)) { 
			    			foreach($program_expectedOutputs as $key=>$program_expectedOutput){
			    				if($program_expectedOutput!=NULL){
			    	?>			    		 
				        	<div>
				            	<textarea name="program_actual_outputs[]" id="program_actual_outputs[]" class="textarea width-100 disabled" disabled="disabled"><?php if(array_key_exists($key, $program_actualOutputs)) echo $program_actualOutputs[$key]; ?></textarea>
				        	</div>  	
			    	<?php 
			    				}
							} 
			    		}
			    	?>
		        </div>
		        <div class="clear"></div>
		 	</div>
        </div>
	 </div>

<?php } ?>
</div>


	
	
		<div class="form_element">
            <div class="button_panel" style="margin-right: 112px;">
            	<input type="hidden" name="program_id" id="program_id" value="<?php if(isset($program_id)) echo $program_id; ?>">
        		<input type="hidden" name="project_id" id="project_id" value="<?php if(isset($project_id)) echo $project_id; ?>">
        		<input type="hidden" name="experiment_id" id="experiment_id" value="<?php if(isset($experiment_id)) echo $experiment_id; ?>">
        		<input type="submit" name="new_technology_release" id="new_technology_release" value="New" class="k-button button">
                <?php if(isset($tech_release_details) && $tech_release_details->id!=NULL) { ?>
                    <input type="hidden" name="id" id="id" value="<?php echo $tech_release_details->id; ?>">
                    <input type="submit" name="update_technology_release" id="update_technology_release" value="Update" class="k-button button">
                    <input type="button" name="delete_technology_release" id="delete_technology_release" value="Delete" onclick="javascript:return confirm('Do you want to delete this program/project information?');" class="k-button button">
                <?php } else { ?>
                <input type="hidden" name="id" id="id" value="<?php if($id!=NULL) echo $id; ?>">
                <input type="submit" name="save_technology_release" id="save_technology_release" value="Save" class="k-button button">
                <?php } ?>
            </div>
            <div class="clear"></div>
        </div>
        
	
</form>
<script language="javascript">
	$('#technology_transfer_date').datepicker('setStartDate');
</script>
<script type="text/javascript">
	$( "#search_panel" ).click(function() {
	 	var experiment_type = $('input[name=type]:radio:checked').val();
	 	if(experiment_type=="Program"){
	 		window.open('<?php echo base_url(); ?>Rmis/Released/SearchProgram', '_blank', 'location=yes,height=600,width=1024,scrollbars=yes,status=yes');
	 	}else if(experiment_type=="Project"){
	 		window.open('<?php echo base_url(); ?>Rmis/Released/SearchProject', '_blank', 'location=yes,height=600,width=1024,scrollbars=yes,status=yes');
	 	}else if(experiment_type=="Experiment"){
	 		window.open('<?php echo base_url(); ?>Rmis/Released/SearchExperiment', '_blank', 'location=yes,height=600,width=1024,scrollbars=yes,status=yes');
	 	}
	});
</script>




			<script>
                $(document).ready(function() {
                    $("#result").kendoGrid({
                        dataSource: {
                            data: <?php echo json_encode($result['data'], JSON_NUMERIC_CHECK); ; ?>,
                            schema: {
                                model: {
                                    fields: {
                                        id: { type: "number", editable:false, nullable:true },
                                        ref_id: { type: "number", editable:false, nullable:true },
                                        tech_release_title: { type: "string", editable:false},
                                        tech_release_version: { type: "string" },
                                        tech_release_date: { type: "string" },
                                        tech_release_is_rel: { type: "string" },
                                        tech_release_type: { type: "string" },
                                        tech_release_is_trnsed: { type: "string" }
                                    }
                                }
                            },
                            pageSize: 20
                        },
                        selectable: "multiple",
                        height: 350,
                        scrollable: true,
                        sortable: false,
                        filterable: false,
                        pageable: {
                            input: true,
                            numeric: false
                        },
                        columns: [
                            {field:"id", title:"S\/O", width: "40px"},
                            {field:"tech_release_title", title:"Name of Technology"},
							{field:"tech_release_version", title:"Version", width: "60px"},
							{field:"tech_release_date", title:"Date", width: "100px"},
							{field:"tech_release_is_rel", title:"Is Rel.", width: "60px"},
							{field:"tech_release_is_trnsed", title:"Is Trnsed.", width: "75px"},
							{field:"tech_release_type", title:"Prj/Prg/Exp", width: "150px"},
							{ command: { text: "Edit", click: ClickEdit }, title: " ", width: "80px" }	
                        ]
                    });
                });
                
               	function ClickEdit(e) {
			        e.preventDefault();
			        var dataItem = this.dataItem($(e.currentTarget).closest("tr"));
			        var edit_url = "/Rmis/Released/Technology/";
			        if(dataItem.tech_release_type=="Program")
			        	edit_url = edit_url+"ProgID/"+dataItem.ref_id+'/'+dataItem.id;
			        else if(dataItem.tech_release_type=="Project")
			        	edit_url = edit_url+"ProjID/"+dataItem.ref_id+'/'+dataItem.id;
			        else if(dataItem.tech_release_type=="Experiment")
			        	edit_url = edit_url+"ExpID/"+dataItem.ref_id+'/'+dataItem.id;

			        window.location = edit_url;
			    }
            </script>

