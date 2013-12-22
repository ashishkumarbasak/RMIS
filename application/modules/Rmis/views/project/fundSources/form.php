<script src="<?php echo site_url('/assets/js/jquery-dynamic-form.js'); ?>"></script>
<script src="<?php echo site_url('assets/extensive/js/date-time/bootstrap-datepicker.min.js'); ?>"></script>
<link rel="stylesheet" href="<?php echo site_url('assets/extensive/css/datepicker.css'); ?>" />
<?php 
	if(isset($project_detail)){
		$project_detail = unserialize($project_detail);
	}
	if(isset($program_detail)){
		$program_detail = unserialize($program_detail);
	}
	if(isset($fundSources)){
		$fundSources = unserialize($fundSources);
	}
	if(isset($costEstimations)){
		$costEstimations = unserialize($costEstimations);
	}
	if(isset($costBreakdowns)){
		$costBreakdowns = unserialize($costBreakdowns);
	}	
	if(isset($account_head_info)){
		$account_head_info = unserialize($account_head_info);
	}
	//print_r($fundSources);
?>

<form name="other_info" id="other_info" method="post" action="">
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
    <?php if((isset($project_detail) && $project_detail->project_type=="Program") || (isset($program_id) && $program_id!=0 && $program_detail!=NULL )){ ?>
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
		<div class="form">
	    	<div class="form_element">
	            <div class="label">Funding Source Information</div>
	            <div class="clear"></div>
	        </div>
	        <div class="row" style="width: 99%; border: 0px;">
	        	<div id="funding_source_informaitons"></div>
	        	<input type="hidden" name="fund_sources" id="fund_sources" value='<?php if(isset($fundSources) && $fundSources!=NULL) echo json_encode($fundSources); else echo "[]"; ?>' />
	        </div>	
	    </div>
	</div>
	
	<div class="main_form">
		<div class="left_form">
            <div class="form_element">
           		<div class="label width_170px">Estimate Date </div>
               	<div class="field">
               		<input type="text" name="estimate_date" id="estimate_date" value="<?php if($costEstimations){ if($costEstimations->estimate_date=='0000-00-00'){echo '';} else {echo $costEstimations->estimate_date;}}?>" data-date-format="yyyy-mm-dd"  class="textbox no-margin disabled" readonly="readonly">
              	</div>
              	<div class="clear"></div>
          	</div> 
             
            <div style="margin-bottom:10px;"></div>
                            
          	<div class="form_element">
           		<div class="label width_170px">Financial Year </div>
              	<div class="field">
                	<select name="financial_year" id="financial_year" class="selectionbox">
						<?php foreach($financial_years['data'] as $key=>$financial_year) { ?>
                            <option value="<?php echo $financial_year['id']; ?>" <?php if(isset($costEstimations) && $costEstimations->financial_year==$financial_year['id']) { ?> selected="selected" <?php } ?>><?php echo $financial_year['year_name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="clear"></div>
          	</div>
            
		</div>
                    
       	<div class="right_form">    
       		<div class="form">
	    	<div class="form_element">
	            <div class="label">Cost Estimation & Breakdown</div>
	            <div class="clear"></div>
	        </div>
	    	<div class="row">
	    		<div class="grid-1-4 left" style="width:12%">
	        		<div class="heading">S/O</div>
	    		</div>
	    		<div class="grid-1-4 left" style=" width:60%">
	        		<div class="heading">A/C Head Title (Head Code)</div>
	    		</div>
	    		<div class="grid-1-4 left">
	        		<div class="heading">Amount</div>
	    		</div>
	    		<div class="clear"></div>
	    	</div>
	    	
	    	<?php 
				if(isset($costBreakdowns) && $costBreakdowns!=NULL) { 
				$g = 0;
				foreach($costBreakdowns as $key=>$costBreakdown){
	    	?>
	    			<div id="cbrow-<?php echo $key; ?>">
	    			<div class="row">
				    	<div class="grid-1-4 left" style="width:12%">
				        	<input class="textbox no-margin" style="width:45%" type="text" name="s_os[]" id="s_os" value="<?php echo $costBreakdown->s_o;?>"/>
				    	</div>
				    	<div class="grid-1-4 left"  style=" width:60%">
                            <select name="ac_head_titles[]" id="ac_head_titles" class="selectionbox width-89 no-margin">
                                <option value="">Select</option>
								<?php 						
                                foreach($account_head_info as $key=>$account_head_info_item) { ?>
                                    <option value="<?php echo $account_head_info_item->id; ?>" <?php if(isset($costBreakdowns)){if($costBreakdowns[$g]->ac_head_id==$account_head_info_item->id){ echo "selected=\"selected\" ";}} ?> ><?php echo $account_head_info_item->sub_head_name." - (".$account_head_info_item->sub_head_code.")"; ?></option>
                                <?php } ?>
                            </select>
				    	</div>
				    	<div class="grid-1-4 left">
				        	<input class="textbox no-margin width-92" type="text" name="cost_amounts[]" id="cost_amounts" value="<?php echo $costBreakdown->amount;?>"/>	
				    	</div>
				    		<input type="hidden" name="costBreakdownID[]" id="costBreakdownID" value="<?php echo $costBreakdown->id; ?> ">
				    </div>
				    <div class="row add-more"><a href="javascript:void(0);" onclick="delete_costbreakdown_item(<?php echo $costBreakdown->id;?> , <?php echo $project_id; ?>, <?php echo $key; ?> );">[-]</a></div>
				    </div>
	    	<?php				
	    		$g++;
				}
	    	 } 
	    	?>
	    	
	    	<div id='duplicate2'>
		    	<div class="row">
			    	<div class="grid-1-4 left" style="width:12%">
			        	<input class="textbox no-margin" style="width:45%" type="text" name="s_os[]" id="s_os" value=""/>
			    	</div>
			    	<div class="grid-1-4 left" style=" width:60%">
                        <select name="ac_head_titles[]" id="ac_head_titles" class="selectionbox width-89 no-margin">
                            <option value="">Select</option>
                            <?php 						
                            foreach($account_head_info as $key=>$account_head_info_item) { ?>
                                <option value="<?php echo $account_head_info_item->id; ?>" <?php if(isset($costBreakdowns)){if($costBreakdowns[$g]->ac_head_id==$account_head_info_item->id){ echo "selected=\"selected\" ";}} ?> ><?php echo $account_head_info_item->sub_head_name." - (".$account_head_info_item->sub_head_code.")"; ?></option>
                            <?php } ?>
                        </select>
			    	</div>
			    	<div class="grid-1-4 left">
			        	<input class="textbox no-margin width-92" type="text" name="cost_amounts[]" id="cost_amounts" value=""/>	
			    	</div>
			    </div>
			    <div class="row add-more">
			    	<a id="minus2" href="javascript:void(0);">[-]</a> 
			    	<a id="plus2" href="javascript:void(0);">[+]</a>
			    </div>
		    </div>	
	    </div>
   	  </div>
	</div>
	
	<div class="form_element">
    	<div class="button_panel" style="margin-right: 15px;">
        	<?php if(isset($project_detail) && ($fundSources!=NULL || $costEstimations!=NULL || $costBreakdowns!=NULL)) { ?>
		    		<input type="hidden" name="project_id" id="project_id" value="<?php if($project_id!=NULL) echo $project_id; ?>">
                    <input type="submit" name="update_fundSources" id="update_fundSources" value="Update" class="k-button button">
		    		<input type="button" name="delete_fundSources" id="delete_fundSources" value="Delete" onclick="javascript:return confirm('Do you want to delete this project fund source information?');" class="k-button button">
		    <?php } else { ?>
                <input type="hidden" name="project_id" id="project_id" value="<?php if($project_id!=NULL) echo $project_id; ?>">
            	<input type="submit" name="save_fundSources" id="save_fundSources" value="Save" class="k-button button">
            <?php } ?>
        </div>
        <div class="clear"></div>
    </div>
		
</form>
<script language="javascript">
	$('#estimate_date').datepicker('setStartDate');
</script>
<script type="text/javascript">
$(document).ready(function() {
	$("#duplicate2").dynamicForm("#plus2", "#minus2", {limit:10});		
	return false;
});
</script>
<script type="text/javascript">
	function delete_costbreakdown_item(cbitem_id, project_id, row_id){
		var r=confirm("Are you sure you want to delete this item?");
		if (r==true){
		  	var jqxhr = $.post( "<?php echo site_url("Rmis/Project/FundSources/deleteCostBreakDown"); ?>", { cbitem_id: cbitem_id, project_id: project_id }, function() {
			  $("#cbrow-" + parseInt(row_id)).remove();
			})
			.fail(function() {
				alert( "error" );
			})
		}
	}
</script>
<script type="text/javascript">                
$(document).ready(function () {
	var crudServiceBaseUrl = "<?php echo base_url();?>",
		dataSource = new kendo.data.DataSource({
			transport: {
				read:  {
					url: crudServiceBaseUrl + "Rmis/Project/FundSources/getFundSources/<?php if(isset($project_detail) && $project_detail->project_id!=NULL) echo $project_detail->project_id; else echo 0; ?>"
				},
				update: {
					url: crudServiceBaseUrl + "Rmis/Project/FundSources/updateFundSource",
					dataType: 'json',
					type: 'POST',
				},
				destroy: {
					url: crudServiceBaseUrl + "Rmis/Project/FundSources/destroyFundSource",
					dataType: 'json',
					type: 'POST',
				},
				create: {
					url: crudServiceBaseUrl + "Rmis/Project/FundSources/addFundSource",
					dataType: 'json',
					type: 'POST'
				},
				parameterMap: function(options, operation) {
					if($('#fund_sources').val()!=''){
						var fundSourceObj = JSON.parse($('#fund_sources').val());
						if(options.models && operation == "create"){
							fundSourceObj.push(options.models[0]);
							$('#fund_sources').val(kendo.stringify(fundSourceObj));
						}else if(options.models && operation == "destroy"){
							var NewObj = JSON.parse("[]");
							for (var i = 0, len = fundSourceObj.length; i < len; ++i) {
								var fsObj = fundSourceObj[i];
								if(fsObj.refID!=options.models[0].refID){
									NewObj.push(fsObj);
								}
							}
							$('#fund_sources').val(kendo.stringify(NewObj));
						}else if(options.models && operation == "update"){
							var NewObj = JSON.parse("[]");
							for (var i = 0, len = fundSourceObj.length; i < len; ++i) {
								var fsObj = fundSourceObj[i];
								if(fsObj.refID!=options.models[0].refID){
									NewObj.push(fsObj);
								}
							}
							NewObj.push(options.models[0]);
							$('#fund_sources').val(kendo.stringify(NewObj));
						}
					}
					if (operation !== "read" && options.models) {
						return {models: kendo.stringify(options.models)};
					}
				}
			},
			batch: true,
			pageSize: 20,
			schema: {
				model: {
					id: "id",
					fields: {
						id: { editable: false, nullable: true },
						fund_source: { validation: { required: true } },
						fund_source_id:  { editable: false, nullable: true },
						amount: { type: "number", validation: { required: true, min: 1} },
						currency: { validation: { required: true } },
						currency_id:  { editable: false, nullable: true },
						exchange_rate: { type: "number", validation: { required: true, min: 1} },
						date_of_exchange_rate: { validation: { required: true } },
						amount_in_taka: { type: "number", validation: { required: true, min: 1} },
						refID: { editable: false, nullable: true }
					}
				}
			}
		});

	$("#funding_source_informaitons").kendoGrid({
		dataSource: dataSource,
		pageable: false,
		height: 200,
		toolbar: [{text:"Add Fund Source", name: "create"}],
		columns: [
			{ field: "fund_source", title:"Funding Source", editor: fundSourcesDropDownEditor },
			{ field: "amount", title:"Amount", format: "{0:0.00}", editor: AmountEditor },
			{ field: "currency", title:"Currency", editor: currencyDropDownEditor },
			{ field: "exchange_rate", title:"Exchange Rate", format: "{0:0.00}", editor: ExchangeRateEditor },
			{ field: "date_of_exchange_rate", title:"Date of Exchange Rate", editor: exchangeDatepicker },
			{ field: "amount_in_taka", title:"Amount in Taka",format: "{0:0.00}", editor: TotalAmountEditor },
			{ command: ["edit", "destroy"], title: "&nbsp;", width: "190px" }],
		editable: "inline"
	});
});

function AmountEditor(container, options){
	var input = $('<input name="' + options.field + '" id="'+ options.field +'" required="required" class="textbox" style="height:25px; width:95%;" />');
	input.appendTo(container);
	$('#amount').blur(function(e){
		$('#amount').val(options.model.amount.toFixed(2));
		var total = options.model.amount*options.model.exchange_rate;
		$('#amount_in_taka').val(total.toFixed(2));
	});
}

function ExchangeRateEditor(container, options){
	var input = $('<input name="' + options.field + '" id="'+ options.field +'" required="required" class="textbox" style="height:25px; width:95%;" />');
	input.appendTo(container);
	$('#exchange_rate').blur(function(e){
		$('#exchange_rate').val(options.model.exchange_rate.toFixed(2));
		var total = options.model.amount*options.model.exchange_rate;
		$('#amount_in_taka').val(total.toFixed(2));
	});
}

function TotalAmountEditor(container, options){
	var input = $('<input name="' + options.field + '" id="'+ options.field +'" required="required" class="textbox" readonly="readonly" style="height:25px; width:95%;" />');
	input.appendTo(container);
}
                
function exchangeDatepicker(container, options){
	var input = $('<input name="' + options.field + '" id="'+ options.field +'" required="required" data-date-format="yyyy-mm-dd" readonly="readonly" class="textbox" style="height:25px; width:95%;" />');
	input.appendTo(container);
	$('#date_of_exchange_rate').datepicker('setStartDate');
}

function fundSourcesDropDownEditor(container, options) {
	var ServiceBaseUrl = "<?php echo base_url();?>";
	$('<input required data-text-field="fund_source" data-value-field="fund_source_id" data-bind="value:fund_source_id"/>')
		.appendTo(container)
		.kendoDropDownList({
			optionLabel: "Select Source",
			dataSource: {
				transport: {
					read: ServiceBaseUrl + "Rmis/Program/FundSources/getListofFundSources"
				}
			},
			select: function(e){
				var dataItem = this.dataItem(e.item.index());
				options.model.fund_source = dataItem.fund_source;
				options.model.fund_source_id = dataItem.fund_source_id;
			}
		});
}

function currencyDropDownEditor(container, options) {
	var ServiceBaseUrl = "<?php echo base_url();?>";
	$('<input required data-text-field="currency" data-value-field="currency_id" data-bind="value:currency_id"/>')
		.appendTo(container)
		.kendoDropDownList({
			optionLabel: "Select Currency",
			dataSource: {
				transport: {
					read: ServiceBaseUrl + "Rmis/Program/FundSources/getListofCurrencies"
				}
			},
			select: function(e){
				var dataItem = this.dataItem(e.item.index());
				 options.model.currency = dataItem.currency; 
				options.model.currency_id = dataItem.currency_id;
			}
		});
}
</script>
<style type="text/css">
span.k-numeric-wrap{ border-radius:0px !important; border: solid #bababa 1px; font-size: 13px !important;} 
</style>
