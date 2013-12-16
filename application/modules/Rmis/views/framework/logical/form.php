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
	if(isset($experiment_detail)){
		$experiment_detail = unserialize($experiment_detail);
	}
	if(isset($result)){
		$result = unserialize($result);
	}
?>

<form name="logicalFramework" id="logicalFramework" method="post" action="<?php if(isset($form_action_url) && $form_action_url!=NULL) echo $form_action_url; ?>">

	<div class="main_form">
     	<div class="left_form">
        	<div class="form_element">
                <div class="textarea_field">
                	<input type="radio" name="type" id="type" value="Experiment" <?php if(isset($Type) && $Type=="ExpID"){ ?>  checked="checked" <?php } else if( (isset($Type) && $Type!="ExpID") && (isset($logical_framework_details) && $logical_framework_details->type=="Experiment") ){ ?> checked="checked" <?php } ?> > Experiment &nbsp;
                    <input type="radio" name="type" id="type" value="Program" <?php if((isset($Type) && $Type=="ProgID")) { ?> checked="checked" <?php } else if( (isset($Type) && $Type!="ProjID") && (isset($logical_framework_details) && $logical_framework_details->type=="Program") ){ ?> checked="checked" <?php } ?> > Program &nbsp;
        			<input type="radio" name="type" id="type" value="Project" <?php if((isset($Type) && $Type=="ProjID")) { ?> checked="checked" <?php } else if( (isset($Type) && $Type!="ProgID") && (isset($logical_framework_details) && $logical_framework_details->type=="Project") ){ ?> checked="checked" <?php } ?> > Project &nbsp;
                    <input type="button" name="search" id="search_panel" value="Search" class="k-button button">

                </div>
                <div class="clear"></div>
            </div>
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
	
	<div class="main_form">    
    	<table width="100%" border="0" cellspacing="0" cellpadding="5" align="center">
          <tr>
            <td>&nbsp;</td>
            <td align="center">Verifiable Indicators (OVI)</td>
            <td align="center">Means of Verification (MOV)</td>
            <td align="center">Important Assumptions</td>
          </tr>
          <tr>
            <td>Goal</td>
            <td><textarea name="verifiable_indicators_goal" id="verifiable_indicators_goal" class="textarea textarea_medium" style="width: 250px;"><?php if(isset($logical_framework_details) && $logical_framework_details->verifiable_indicators_goal!=NULL) echo $logical_framework_details->verifiable_indicators_goal; ?></textarea></td>
            <td><textarea name="means_of_verification_goal" id="means_of_verification_goal" class="textarea textarea_medium" style="width: 250px;"><?php if(isset($logical_framework_details) && $logical_framework_details->means_of_verification_goal!=NULL) echo $logical_framework_details->means_of_verification_goal; ?></textarea></td>
            <td><textarea name="important_assumptions_goal" id="important_assumptions_goal" class="textarea textarea_medium" style="width: 250px;"><?php if(isset($logical_framework_details) && $logical_framework_details->important_assumptions_goal!=NULL) echo $logical_framework_details->important_assumptions_goal; ?></textarea></td>
          </tr>
          <tr>
            <td>Purpose</td>
            <td><textarea name="verifiable_indicators_purpose" id="verifiable_indicators_purpose" class="textarea textarea_medium" style="width: 250px;"><?php if(isset($logical_framework_details) && $logical_framework_details->verifiable_indicators_purpose!=NULL) echo $logical_framework_details->verifiable_indicators_purpose; ?></textarea></td>
            <td><textarea name="means_of_verification_purpose" id="means_of_verification_purpose" class="textarea textarea_medium" style="width: 250px;"><?php if(isset($logical_framework_details) && $logical_framework_details->means_of_verification_purpose!=NULL) echo $logical_framework_details->means_of_verification_purpose; ?></textarea></td>
            <td><textarea name="important_assumptions_purpose" id="important_assumptions_purpose" class="textarea textarea_medium" style="width: 250px;"><?php if(isset($logical_framework_details) && $logical_framework_details->important_assumptions_purpose!=NULL) echo $logical_framework_details->important_assumptions_purpose; ?></textarea></td>
          </tr>
          <tr>
            <td>Outputs</td>
            <td><textarea name="verifiable_indicators_outputs" id="verifiable_indicators_outputs" class="textarea textarea_medium" style="width: 250px;"><?php if(isset($logical_framework_details) && $logical_framework_details->verifiable_indicators_outputs!=NULL) echo $logical_framework_details->verifiable_indicators_outputs; ?></textarea></td>
            <td><textarea name="means_of_verification_outputs" id="means_of_verification_outputs" class="textarea textarea_medium" style="width: 250px;"><?php if(isset($logical_framework_details) && $logical_framework_details->means_of_verification_outputs!=NULL) echo $logical_framework_details->means_of_verification_outputs; ?></textarea></td>
            <td><textarea name="important_assumptions_outputs" id="important_assumptions_outputs" class="textarea textarea_medium" style="width: 250px;"><?php if(isset($logical_framework_details) && $logical_framework_details->important_assumptions_outputs!=NULL) echo $logical_framework_details->important_assumptions_outputs; ?></textarea></td>
          </tr>
          <tr>
            <td>Activities/ Input </td>
            <td><textarea name="verifiable_indicators_activities" id="verifiable_indicators_activities" class="textarea textarea_medium" style="width: 250px;"><?php if(isset($logical_framework_details) && $logical_framework_details->verifiable_indicators_activities!=NULL) echo $logical_framework_details->verifiable_indicators_activities; ?></textarea></td>
            <td><textarea name="means_of_verification_activities" id="means_of_verification_activities" class="textarea textarea_medium" style="width: 250px;"><?php if(isset($logical_framework_details) && $logical_framework_details->means_of_verification_activities!=NULL) echo $logical_framework_details->means_of_verification_activities; ?></textarea></td>
            <td><textarea name="important_assumptions_activities" id="important_assumptions_activities" class="textarea textarea_medium" style="width: 250px;"><?php if(isset($logical_framework_details) && $logical_framework_details->important_assumptions_activities!=NULL) echo $logical_framework_details->important_assumptions_activities; ?></textarea></td>
          </tr>
        </table>
        	
        	<div class="form_element">
	            <div class="button_panel" style="margin-right: 25px;">
	            	<input type="hidden" name="program_id" id="program_id" value="<?php if(isset($program_id)) echo $program_id; ?>">
        			<input type="hidden" name="project_id" id="project_id" value="<?php if(isset($project_id)) echo $project_id; ?>">
        			<input type="hidden" name="experiment_id" id="experiment_id" value="<?php if(isset($experiment_id)) echo $experiment_id; ?>">
	            	<input type="submit" name="new_logical_framework" id="new_logical_framework" value="New" class="k-button button">
	            	<?php if(isset($logical_framework_details) && $logical_framework_details->id!=NULL) { ?>
		                <input type="hidden" name="id" id="id" value="<?php echo $logical_framework_details->id; ?>">
		                <input type="button" name="delete_logical_framework" id="delete_logical_framework" value="Delete" onclick="javascript:return confirm('Do you want to delete this program/project information?');" class="k-button button">
		                <input type="submit" name="update_logical_framework" id="update_logical_framework" value="Update" class="k-button button">                
		            <?php } else { ?>
	                <input type="hidden" name="id" id="id" value="<?php if($id!=NULL) echo $id; ?>">
	        		<input type="submit" name="save_logical_framework" id="save_logical_framework" value="Save" class="k-button button">
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
	 		window.open('<?php echo base_url(); ?>Rmis/framework/SearchProgram', '_blank', 'location=yes,height=600,width=1024,scrollbars=yes,status=yes');
	 	}else if(experiment_type=="Project"){
	 		window.open('<?php echo base_url(); ?>Rmis/framework/SearchProject', '_blank', 'location=yes,height=600,width=1024,scrollbars=yes,status=yes');
	 	}else if(experiment_type=="Experiment"){
	 		window.open('<?php echo base_url(); ?>Rmis/framework/SearchExperiment', '_blank', 'location=yes,height=600,width=1024,scrollbars=yes,status=yes');
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
                                        logical_framework_title: { type: "string", editable:false},
                                        logical_framework_initiation_date: { type: "string" },
                                        logical_framework_completion_date: { type: "string" },
                                        logical_framework_type: { type: "string" },
                                        principal_investigator: { type: "string" }
                                    }
                                }
                            },
                            pageSize: 20
                        },
                        change: onChange,
                        selectable: "multiple",
                        height: 430,
                        scrollable: true,
                        sortable: false,
                        filterable: false,
                        pageable: {
                            input: true,
                            numeric: false
                        },
                        columns: [
                            {field:"id", title:"S\/O", width: "40px"},
                            {field:"logical_framework_title", title:"Title of Research"},
							{field:"principal_investigator", title:"PI"},
							{field:"logical_framework_initiation_date", title:"Initiation Date"},
							{field:"logical_framework_completion_date", title:"Completion Date"},
							{field:"logical_framework_type", title:"Prj/Prg/Exp"},
							{ command: { text: "Edit", click: ClickEdit }, title: " ", width: "80px" }	
                        ]
                    });
                });
                
                function onChange(arg) {
                	var grid = this;
    				var model = grid.dataItem(this.select());
    				var project_id = model.project_id;
    				var post_url = $('#logicalFramework', opener.document).attr('action').split('/');
    				post_url[post_url.length-3] = 'ProjID';
    				post_url[post_url.length-2] = project_id;
    				post_url = post_url.join('/');
    				$('#logicalFramework', opener.document).attr('action', post_url);
    				$('#logicalFramework', opener.document).submit();
    				window.close();
                }
                function ClickEdit(e) {
			        e.preventDefault();
			        var dataItem = this.dataItem($(e.currentTarget).closest("tr"));
			        var edit_url = "/Rmis/framework/logical/";
			        if(dataItem.logical_framework_type=="Program")
			        	edit_url = edit_url+"ProgID/"+dataItem.ref_id+'/'+dataItem.id;
			        else if(dataItem.logical_framework_type=="Project")
			        	edit_url = edit_url+"ProjID/"+dataItem.ref_id+'/'+dataItem.id;
			        else if(dataItem.logical_framework_type=="Experiment")
			        	edit_url = edit_url+"ExpID/"+dataItem.ref_id+'/'+dataItem.id;

			        window.location = edit_url;
			    }
            </script>