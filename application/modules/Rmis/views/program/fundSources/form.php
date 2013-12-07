<script src="<?php echo site_url('/assets/js/jquery-dynamic-form.js'); ?>"></script>
<script src="<?php echo site_url('assets/extensive/js/date-time/bootstrap-datepicker.min.js'); ?>"></script>
<link rel="stylesheet" href="<?php echo site_url('assets/extensive/css/datepicker.css'); ?>" />
<?php 
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
?>

<form name="other_info" id="other_info" method="post" action="">
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
               		<input type="text" name="program_plannedBudget" id="program_plannedBudget" value="<?php if($program_detail!=NULL) echo $program_detail->program_plannedBudget; ?>" class="textbox disabled" disabled="disabled" />
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
                	<input type="text" name="program_approvedBudget" id="program_approvedBudget" value="<?php if($program_detail!=NULL) echo $program_detail->program_approvedBudget; ?>" class="textbox disabled" disabled="disabled" />
               	</div>
                <div class="clear"></div>
        	</div>
   		</div>
	</div>
	
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
		</div>
                    
       	<div class="right_form">    
       		<div class="form_element">
          		<div class="label">Financial Year </div>
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
		<div class="form">
	    	<div class="form_element">
	            <div class="label">Cost Estimation & Breakdown</div>
	            <div class="clear"></div>
	        </div>
	    	<div class="row">
	    		<div class="grid-1-4 left">
	        		<div class="heading">S/O</div>
	    		</div>
	    		<!--<div class="grid-1-4 left">
	        		<div class="heading">A/C Head Code</div>
	    		</div>-->
	    		<div class="grid-1-4 left">
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
				    	<div class="grid-1-4 left">
				        	<input class="textbox no-margin width-92" type="text" name="s_os[]" id="s_os" value="<?php echo $costBreakdown->s_o;?>"/>
				    	</div>
				    	<!--<div class="grid-1-4 left">
				        	<input class="textbox no-margin width-92" type="text" name="ac_head_codes[]" id="ac_head_codes" value="<?php //echo $costBreakdown->ac_head_code;?>"/>
				    	</div>-->
				    	<div class="grid-1-4 left">
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
				    <div class="row add-more"><a href="javascript:void(0);" onclick="delete_costbreakdown_item(<?php echo $costBreakdown->id;?> , <?php echo $program_id; ?>, <?php echo $key; ?> );">[-]</a></div>
				    </div>
	    	<?php				
	    			$g++;
					}
	    	 	  } 
	    	?>
	    	
	    	<div id='duplicate2'>
		    	<div class="row">
			    	<div class="grid-1-4 left">
			        	<input class="textbox no-margin width-92" type="text" name="s_os[]" id="s_os" value=""/>
			    	</div>
			    	<!--<div class="grid-1-4 left">
			        	<input class="textbox no-margin width-92" type="text" name="ac_head_codes[]" id="ac_head_codes" value=""/>
			    	</div>-->
			    	<div class="grid-1-4 left">
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
	
	<div class="form_element">
    	<div class="button_panel" style="margin-right: 15px;">
        	<?php if(isset($program_detail) && ($fundSources!=NULL || $costEstimations!=NULL || $costBreakdowns!=NULL)) { ?>
		    		<input type="hidden" name="program_id" id="program_id" value="<?php if($program_id!=NULL) echo $program_id; ?>">
                    <input type="submit" name="update_fundSources" id="update_fundSources" value="Update" class="k-button button">
		    		<input type="button" name="delete_fundSources" id="delete_fundSources" value="Delete" class="k-button button">		            
		    <?php } else { ?>
                <input type="hidden" name="program_id" id="program_id" value="<?php if($program_id!=NULL) echo $program_id; ?>">
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
	function delete_costbreakdown_item(cbitem_id, program_id, row_id){
		var r=confirm("Are you sure you want to delete this item?");
		if (r==true){
		  	var jqxhr = $.post( "<?php echo site_url("Rmis/program/fundSources/deleteCostBreakDown"); ?>", { cbitem_id: cbitem_id, program_id: program_id }, function() {
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
					url: crudServiceBaseUrl + "Rmis/program/fundSources/getFundSources/<?php if(isset($program_detail) && $program_detail->program_id!=NULL) echo $program_detail->program_id; else echo 0; ?>"
				},
				update: {
					url: crudServiceBaseUrl + "Rmis/program/fundSources/updateFundSource",
					dataType: 'json',
					type: 'POST',
				},
				destroy: {
					url: crudServiceBaseUrl + "Rmis/program/fundSources/destroyFundSource",
					dataType: 'json',
					type: 'POST',
				},
				create: {
					url: crudServiceBaseUrl + "Rmis/program/fundSources/addFundSource",
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
			{ field: "amount", title:"Amount", format: "{0:0.00}" },
			{ field: "currency", title:"Currency", editor: currencyDropDownEditor },
			{ field: "exchange_rate", title:"Exchange Rate", format: "{0:0.00}" },
			{ field: "date_of_exchange_rate", title:"Date of Exchange Rate", editor: exchangeDatepicker },
			{ field: "amount_in_taka", title:"Amount in Taka",format: "{0:0.00}" },
			{ command: ["edit", "destroy"], title: "&nbsp;", width: "190px" }],
		editable: "inline"
	});
});
                
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
					read: ServiceBaseUrl + "Rmis/program/fundSources/getListofFundSources"
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
					read: ServiceBaseUrl + "Rmis/program/fundSources/getListofCurrencies"
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
