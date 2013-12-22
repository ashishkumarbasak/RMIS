<script src="<?php echo site_url('/assets/js/jquery.form.js'); ?>"></script>
<script src="<?php echo site_url('/assets/js/jquery.validate.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/extensive/js/date-time/bootstrap-datepicker.min.js'); ?>"></script>
<link rel="stylesheet" href="<?php echo site_url('assets/extensive/css/datepicker.css'); ?>" />
<div id="page-content" class="clearfix">
  <div class="page-header position-relative">
    <h1>Program area wise research Experiment progress Report</h1>
  </div>
  <form action="<?php echo site_url('/Rmis/Reports/ProgramAreaWiseProgressReport/getReportExport'); ?>" method="post" id="reportForm">
    <div class="row-fluid">
      <div class="span12">
        <div class="btn-toolbar">
          <div class="btn-group pull-right opt">
            <label class="inline">
              <input name="format" type="radio" id="pdfformat" value="pdf" checked="checked">
              <span class="lbl"> PDF &nbsp;</span> </label>
            <label class="inline">
              <input type="radio" value="xls" name="format" id="xlsformat">
              <span class="lbl"> XLS &nbsp;</span> </label>
            <label class="inline">
              <input type="radio" value="html" name="format" id="format">
              <span class="lbl  "> HTML &nbsp;</span> </label>
            <a class="btn btn-small btn-primary" id="btnPreview" href="javascript:void(0);"><i class="icon-picture bigger-120"></i> Preview</a> <a class="btn btn-small btn-primary" id="btnExport" href="javascript:void(0);"><i class="icon-download-alt bigger-120"></i> Export</a> </div>
        </div>
      </div>
    </div>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-header">
            <h4>Report Parameters</h4>
            <span class="widget-toolbar"> <a data-action="collapse" href="javascript:void(0);"> <i class="icon-chevron-up"></i> </a> </span> </div>
          <div class="widget-body">
            <div class="widget-body-inner " style="display: block;">
              <div class="widget-main">
                <div class="container-fluid">
                 
                    <div class="row-fluid">
                     <div class="span3">
                        <div class="row-fluid">
                            <label for="form-field-8">Institute Name<span class="red">*</span></label>
                            <select name="program_institute_names" id="program_institute_names" class="selectionbox">
                            	<option value="">Select Institute</option>
								<?php foreach($institues['data'] as $key=>$institue) { ?>
                                    <option value="<?php echo $institue['id']; ?>"><?php echo $institue['short_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                        
                     <div class="span3">
                        <div class="row-fluid">
                            <label for="group_id">Program Area<span class="red">*</span></label>
                            <select name="program_area" id="program_area" class="selectionbox">
                                <option value="">Select Program Area</option>
                                <?php 
                                
                                foreach($program_areas['data'] as $key=>$program_area) { ?>
                                    <option value="<?php echo $program_area['program_area_id']; ?>" <?php if(isset($program_detail) && $program_detail->program_area==$program_area['program_area_id']) { ?> selected="selected" <?php } ?> ><?php echo $program_area['program_area_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                     <div class="span3">
                        <div class="row-fluid">
                            <label for="sub_group_id">Division/Unit Name<span class="red">*</span></label>
                            <select name="program_division" id="program_division" class="selectionbox">
                                <option value="">Select Division/Unit Name</option>
                                <?php foreach($divisions['data'] as $key=>$division) { ?>
                                    <option value="<?php echo $division['division_id']; ?>" <?php if(isset($program_detail) && $program_detail->program_division==$division['division_id']) { ?> selected="selected" <?php } ?>><?php echo $division['division_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                     <div class="span3">
                         <div class="row-fluid">
                            <label for="form-field-8">Research Type</label>
                            <select name="program_research_type" id="program_research_type" class="selectionbox">
                                <option value="">Select Research Type</option>
                                <?php foreach($research_types['data'] as $key=>$researchType) { ?>
                                    <option value="<?php echo $researchType['value']; ?>" <?php if(isset($program_detail) && $program_detail->program_research_type==$researchType['value']) { ?> selected="selected" <?php } ?>><?php echo $researchType['name']; ?></option>
                                <?php } ?>
                            </select>
                             
                         </div>
                     </div>
                </div>
                    
                    <div class="row-fluid">                     
                     <div class="span3">
                         <div class="row-fluid">
                            <label for="asdf">Research Status</label>
                            <select name="program_research_status" id="program_research_status" class="selectionbox">
                                <option value="">Select Research Status</option>
                                <?php foreach($research_statuses['data'] as $key=>$research_status) { ?>
                                    <option value="<?php echo $research_status['value']; ?>" <?php if(isset($program_detail) && $program_detail->program_research_status==$research_status['value']) { ?> selected="selected" <?php } ?>><?php echo $research_status['name']; ?></option>
                                <?php } ?>
                            </select>
                         </div>
                     </div>
                     
                     <div class="span3">
                         <div class="row-fluid">
                              <label for="asdf">Principal Investigator Name</label>
                              <input type="text" name="program_coordinator_name" id="program_coordinator_name" value="<?php if($program_detail) echo $program_detail->program_coordinator;?>" class="textbox" />
                			  <input type="hidden" name="program_coordinator" id="program_coordinator" value="<?php if($program_detail) echo $program_detail->employee_id; ?>">
            				  <input type="hidden" name="employee_id" id="employee_id" value="<?php if($program_detail) echo $program_detail->employee_id; ?>">								
                         </div>
                     </div>
                     
                     <div class="span3">
                         <div class="row-fluid">
                            <label for="form-field-8">Planned Date Range</label>
                            <input type="text" class="textbox disabled" readonly="readonly" data-date-format="yyyy-mm-dd" name="program_planned_start_date_from" id="program_planned_start_date_from" value="" style="width:90px;" />
        					<input type="text" class="textbox disabled" readonly="readonly" data-date-format="yyyy-mm-dd" name="program_planned_start_date_to" id="program_planned_start_date_to" value="" style="width:90px;" />                             
                         </div>
                     </div>
                     <div class="span3">
                         <div class="row-fluid">
                            <label for="asdf">Actual Date Range</label>
                            <input type="text" class="textbox disabled" readonly="readonly" data-date-format="yyyy-mm-dd" name="program_planned_actual_date_from" id="program_planned_actual_date_from" value=""  style="width: 90px;" />
        					<input type="text" class="textbox disabled" readonly="readonly" data-date-format="yyyy-mm-dd" name="program_planned_actual_date_to" id="program_planned_actual_date_to" value="" style="width: 90px;" />
                         </div>
                       </div>
                    </div>
                    
                    
                    <div class="row-fluid">                     
                     <div class="span3">
                         <div class="row-fluid">
                              <label for="asdf">Total Budget Range</label>
                                <input type="text" name="program_planned_budget_from" id="program_planned_budget_from" value="<?php if($program_detail) echo $program_detail->planned_budget;?>" class="textbox" style="width:90px;" />
       	 						<input type="text" name="program_planned_budget_to" id="program_planned_budget_to" value="<?php if($program_detail) echo $program_detail->planned_budget;?>" class="textbox" style="width:90px;" />
                         </div>
                     </div>
                     
                     <div class="span3">
                         <div class="row-fluid">
                             <label for="asdf">Research Funding Source</label>
							   <select name="program_fundng_source" id="program_fundng_source" class="selectionbox">
                                <option value="">Select Funding Source</option>
                                <?php foreach($fundSources['data'] as $key=>$fundSource) { ?>
                                    <option value="<?php echo $fundSource['value']; ?>"><?php echo $fundSource['name']; ?></option>
                                <?php } ?>
                            </select>
                         </div>
                     </div>
                    </div>
                    
                  <div class="span3">
                    <div id="progressouter"> </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
  <div class="row-fluid">
    <hr style="border-width: 3px 0; margin: 5px 0;"/>
    <div class="slim-scroll" data-height="540">
      <div id="report_content" align="center" > 
        <!--empty--> 
      </div>
    </div>
  </div>
</div>
<script language="javascript">
	$('#program_planned_start_date_from').datepicker('setStartDate');
	$('#program_planned_start_date_to').datepicker('setStartDate');
	$('#program_planned_actual_date_from').datepicker('setEndDate');
	$('#program_planned_actual_date_to').datepicker('setEndDate');
</script>

<script type="text/javascript">
$(document).ready(function() {
	var program_coordinator_select;
	$("#program_coordinator_name").kendoAutoComplete({
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
		    	program_coordinator_select = false;
		  	},
		  	select: function(e){
		    	program_coordinator_select = true;
			    var dataItem = this.dataItem(e.item.index());                
        		$("#employee_id").val(dataItem.employee_id);
        		$("#program_coordinator").val(dataItem.employee_id);
		  	},
		  	close: function(e){
		    	// if no valid selection - clear input
		    	if (!program_coordinator_select) this.value('');
		  	}
    });
});
</script>

<script type="application/javascript">
$(function() {

	var format=  $('input[name=format]:checked', '#reportForm').val();
	if(format == 'html'){
		$("#btnExport").attr("disabled", true);
	} else {
		$("#btnExport").attr("disabled", false);
	}
	
	
	$( 'input[name="format"]:radio' ).click(
			function(){
				var format=  $('input[name=format]:checked', '#reportForm').val();
				if(format == 'html'){
					$("#btnExport").attr("disabled", true);
				}else{
					$("#btnExport").attr("disabled", false);
				}
			}
		); 


	
	jQuery("#reportForm").validate({
			rules: {
					program_institute_names: {
						required: true
					},
					program_area: {
						required: true
					},	
					program_division: {
						required: true
					}				
				},
				messages: {
					program_institute_names: {
						required: "Select Institute"
					},
					program_area: {
						required: "Select Program Area"
					},
					program_division: {
						required: "Select Division"
					}				
				}
		});
	
	var options = {
		type: 'POST',
		url:  "<?php echo site_url('/Rmis/Reports/ProgramAreaWiseProgressReport/getReport'); ?>", 
		async: false,			
		beforeSubmit: function() {
				$("#progressouter").append("<div id='divAjaxLoading'>Please wait. Generating Report ...</div>");
			},
		success: function(data) {
					$("#progressouter").empty();
					$('#report_content').html(data);	
			}
	};
	  
	$("#btnPreview").click(function() {
		if($("#reportForm").valid()) {
			$("#reportForm").ajaxSubmit(options);
		}
	});
	
	$("#btnExport").click(function() {
		if($("#reportForm").valid()) {
			var format=  $('input[name=format]:checked', '#reportForm').val();
			if(format != 'html'){
				$("#reportForm").submit();
			}
		}
	});

	
});	
</script>
