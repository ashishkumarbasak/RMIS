<script src="<?php echo site_url('/assets/js/jquery-dynamic-form.js'); ?>"></script>
<script src="<?php echo site_url('assets/extensive/js/date-time/bootstrap-datepicker.min.js'); ?>"></script>
<link rel="stylesheet" href="<?php echo site_url('assets/extensive/css/datepicker.css'); ?>" />
<?php 
	if(isset($result)){
		$result = unserialize($result);
	}
?>

<form name="program_info" id="program_info" method="post" action="">
<div class="main_form">
	<div class="left_form">
    	<div class="form_element">
        	<div class="label width_170px">&nbsp;</div>
        	<div class="field">
        		<input type="radio" name="project_type" id="project_type" value="Independent"  checked="checked" /> Independent 
   				<input type="radio" name="project_type" id="project_type" value="Program" /> Program &nbsp; 
        	</div>
        	<div class="clear"></div>
    	</div>
    
    	<div class="form_element">
        	<div class="label width_170px">Division/Unit Name <span class="mandatory">*</span></div>
        	<div class="field">
        		<select name="project_division" id="project_division" class="selectionbox">
            		<option value="">Select Division/Unit Name</option>
					<?php foreach($divisions['data'] as $key=>$division) { ?>
            			<option value="<?php echo $division['division_id']; ?>" <?php if(isset($program_detail) && $program_detail->division_or_unit_name==$division['division_id']) { ?> selected="selected" <?php } ?>><?php echo $division['division_name']; ?></option>
            		<?php } ?>
        		</select>
        	</div>
        	<div class="clear"></div>
    	</div>
    
    	<div class="form_element">
        	<div class="label width_170px">Research Type <span class="mandatory">*</span> </div>
        	<div class="field">
        		<select name="project_research_type" id="project_research_type" class="selectionbox">
            		<option value="">Select Research Type</option>
 					<?php foreach($research_types['data'] as $key=>$researchType) { ?>
            			<option value="<?php echo $researchType['value']; ?>" <?php if(isset($program_detail) && $program_detail->program_research_type==$researchType['value']) { ?> selected="selected" <?php } ?>><?php echo $researchType['name']; ?></option>
            		<?php } ?>
        		</select>
        	</div>
        	<div class="clear"></div>
    	</div>
    	
    	<div class="form_element">
        	<div class="label width_170px">Research Priority <span class="mandatory">*</span></div>
        	<div class="field">
        		<select name="project_research_priority" id="project_research_priority" class="selectionbox">
            		<option value="">Select Research Priority</option>
					<?php foreach($research_priorities['data'] as $key=>$research_priority) { ?>
            			<option value="<?php echo $research_priority['value']; ?>" <?php if(isset($program_detail) && $program_detail->program_research_priority==$research_priority['value']) { ?> selected="selected" <?php } ?>><?php echo $research_priority['name']; ?></option>
            		<?php } ?>
         		</select>
        	</div>
        	<div class="clear"></div>
    	</div>
    
     	<div class="form_element">
        	<div class="label width_170px">Research Status <span class="mandatory">*</span></div>
        	<div class="field">
        		<select name="project_research_status" id="project_research_status" class="selectionbox">
            		<option value="">Select Research Status</option>
					<?php foreach($research_statuses['data'] as $key=>$research_status) { ?>
           	 			<option value="<?php echo $research_status['value']; ?>" <?php if(isset($program_detail) && $program_detail->program_research_status==$research_status['value']) { ?> selected="selected" <?php } ?>><?php echo $research_status['name']; ?></option>
            		<?php } ?>
            	</select>
        	</div>
        	<div class="clear"></div>
    	</div>
    	
    	<div class="form_element">
        	<div class="label width_170px">Key Words </div>
        	<div class="field">
        		<input type="text" name="project_keywords" id="project_keywords" class="textbox" value="">
        	</div>
        	<div class="clear"></div>
    	</div>
    	
    	<div class="form_element">
        	<?php
        		$program_aezs = array(); 
        		if(isset($program_detail))
				$program_aezs = explode(",", $program_detail->program_aezs);
			?>
        	<div class="label width_170px">AEZs </div>
        	<div class="field">
        		<select name="project_aezs[]" id="project_aezs" class="selectionbox" multiple="multiple">
            		<?php foreach($aezs['data'] as $key=>$aez) { ?>
            			<option value="<?php echo $aez['value']; ?>" <?php if(in_array($aez['value'], $program_aezs)) { ?> selected="selected" <?php } ?>><?php echo $aez['name']; ?></option>
            		<?php } ?>
            	</select>
        	</div>
        	<div class="clear"></div>
    	</div>
    	
    	<div class="form_element">
        	<div class="label width_170px">Regional Station Name </div>
        	<div class="field">
        		<select name="project_regionalStationName" id="project_regionalStationName" class="selectionbox">
            		<option value="">Select Regional Station</option>
					<?php foreach($regional_stations['data'] as $key=>$regional_station) { ?>
            			<option value="<?php echo $regional_station['station_id']; ?>"<?php if(isset($program_detail) && $program_detail->regional_station_name==$regional_station['station_id']) { ?> selected="selected" <?php } ?>><?php echo $regional_station['station_name']; ?></option>
            		<?php } ?>
        		</select>
        	</div>
        	<div class="clear"></div>
    	</div>
    	
    	<div class="form_element">
        	<div class="label width_170px">Implementation Location/<br>Site/Area </div>
        	<div class="field">
        		<select name="project_implementationLocation" id="project_implementationLocation" class="selectionbox">
            		<option value="">Select Implementation Site</option>
					<?php foreach($implementation_locations['data'] as $key=>$implementation_location) { ?>
            			<option value="<?php echo $implementation_location['implementation_site_id']; ?>" <?php if(isset($program_detail) && $program_detail->implementation_location==$implementation_location['implementation_site_id']) { ?> selected="selected" <?php } ?>><?php echo $implementation_location['implementation_site_name']; ?></option>
            		<?php } ?>
        		</select>
        	</div>
        	<div class="clear"></div>
    	</div>       
	</div>

	<div class="right_form">
		<div class="form_element">
        	<div class="label">Project Code </div>
        	<div class="field">
        		<input type="text" name="project_code" id="project_code" class="textbox" value="">
        	</div>
        	<div class="clear"></div>
    	</div>
    		
		<div class="form_element">
        	<div class="label">Planned Date Range <span class="mandatory">*</span> </div>
        	<div class="field">
        		<input type="text" class="textbox disabled" readonly="readonly" data-date-format="yyyy-mm-dd" name="project_plannedStartDate_from" id="project_plannedStartDate_from" value="" style="width:90px;" />
        		<input type="text" class="textbox disabled" readonly="readonly" data-date-format="yyyy-mm-dd" name="project_plannedStartDate_to" id="project_plannedStartDate_to" value="" style="width:90px;" />
        		<span class="input-group-addon">
            		<i class="icon-calendar"></i>
        		</span>
        	</div>
        	<div class="clear"></div>
    	</div>
 
      	<div class="form_element">
        	<div class="label">Planned Budget Range </div>
        	<div class="field">
       	 		<input type="text" name="project_plannedBudget_from" id="project_plannedBudget_from" value="<?php if($program_detail) echo $program_detail->planned_budget;?>" class="textbox" style="width:90px;" />
       	 		<input type="text" name="project_plannedBudget_to" id="project_plannedBudget_to" value="<?php if($program_detail) echo $program_detail->planned_budget;?>" class="textbox" style="width:90px;" />
        	</div>
        	<div class="clear"></div>
    	</div>
    	
    	<div class="form_element">
        	<div class="label">Initiation Date Range <span class="mandatory">*</span></div>
        	<div class="field">
        		<input type="text" class="textbox disabled" readonly="readonly" data-date-format="yyyy-mm-dd" name="project_plannedEndDate_from" id="project_plannedEndDate_from" value=""  style="width: 90px;" />
        		<input type="text" class="textbox disabled" readonly="readonly" data-date-format="yyyy-mm-dd" name="project_plannedEndDate_to" id="project_plannedEndDate_to" value="" style="width: 90px;" />
        		<span class="input-group-addon">
            		<i class="icon-calendar"></i>
        		</span>
        	</div>
        	<div class="clear"></div>
    	</div>
    	
    	<div class="form_element">
        	<div class="label">Approved Budget Range </div>
        	<div class="field">
        		<input type="text" name="project_approvedBudget" id="project_approvedBudget" value="<?php if($program_detail) echo $program_detail->approved_budget;?>" class="textbox">
        	</div>
        	<div class="clear"></div>
    	</div> 
     
     	
    	
    	<div class="form_element">
        	<?php
        		$program_commodities = array(); 
        		if(isset($program_detail))
				$program_commodities = explode(",", $program_detail->program_commodities);
			?>
        	<div class="label">Commodity </div>
        	<div class="field">
        		<select name="project_commodities[]" id="project_commodities" class="selectionbox" multiple="multiple">
            		<?php foreach($comodities['data'] as $key=>$comodity) { ?>
            			<option value="<?php echo $comodity['value']; ?>" <?php if(in_array($comodity['value'],$program_commodities)) { ?> selected="selected" <?php } ?>><?php echo $comodity['name']; ?></option>
            		<?php } ?>
            	</select>
        	</div>
        	<div class="clear"></div>
    	</div>
    
   		<div class="form_element">
        	<div class="label">Principal Investigator<br />(Or Pm/Coordintor) <span class="mandatory">*</span></div>
        	<div class="field">
        		<input type="text" name="project_coordinator" id="project_coordinator" value="<?php if($program_detail) echo $program_detail->program_manager;?>" class="textbox">
        	</div>
        	<div class="clear"></div>
    	</div>
    	
    	<div class="form_element" id="institute_name_div">
        	<?php
        		$program_instituteNames = array(); 
        		if(isset($program_detail))
				$program_instituteNames = explode(",", $program_detail->program_institute_names);
			?>
        	<div class="label">Institute Name </div>
        	<div class="field">
        		<select name="project_institute_names[]" id="project_institute_names" class="selectionbox" multiple="multiple">
            		<?php foreach($institues['data'] as $key=>$institue) { ?>
            			<option value="<?php echo $institue['id']; ?>" <?php if(in_array($institue['id'],$program_instituteNames)) { ?> selected="selected" <?php } ?>><?php echo $institue['short_name']; ?></option>
            		<?php } ?>
            	</select>
        	</div>
        	<div class="clear"></div>
    	</div>
    </div>
    <div class="clear"></div>
    
    <div class="form_element">
        <div class="button_panel" style="margin-right: 27px;">
            	<input type="button" name="reset_program_information" id="reset_project_information" onclick="window.location='/Rmis/project/informations';" value="Add New Proj." class="k-button button">
                <input type="submit" name="search_project_information" id="search_project_information" value="Search" class="k-button button">               
        </div>
        <div class="clear"></div>
    </div>
                   
</div>
</form>
<script language="javascript">
	$('#program_plannedStartDate_from').datepicker('setStartDate');
	$('#program_plannedStartDate_to').datepicker('setStartDate');
	$('#program_plannedEndDate_from').datepicker('setEndDate');
	$('#program_plannedEndDate_to').datepicker('setEndDate');
</script>
<script type="text/javascript">
$(document).ready(function() {
	$('#showInstituteName').change(function() {
    	$('#collaborate_institute_name').toggle();
	});
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
                                        project_id: { type: "number", editable:false, nullable:true },
                                        program_id: { type: "number", editable:false, nullable:true },
                                        project_type: { type: "string", editable:false},
                                        project_title: { type: "string", editable:false},
                                        project_goal:{ type: "string", editable:false},
                                        project_objective:{ type: "string", editable:false},
                                        project_division: { type: "string" },
                                        project_research_type: { type: "string" },
                                        project_research_priority: { type: "string" },
                                        project_research_status: { type: "string" },
                                        project_planned_budget: { type: "string" },
                                        project_approved_budget: { type: "string" },
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
                            {field:"project_id", title:"S\/O", width: "40px"},
                            {field:"project_type", title:"Proj. Type"},
							{field:"project_division", title:"Division"},
							{field:"project_research_type", title:"Research Type"},
							{field:"project_research_priority", title:"Priority"},
							{field:"project_research_status", title:"Status"},
							{field:"project_planned_budget", title:"Planned Budget"},
							{field:"project_approved_budget", title:"Actual Budget"},
							{field:"principal_investigator", title:"PI"}
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
            </script>