<script src="<?php echo site_url('/assets/js/jquery-dynamic-form.js'); ?>"></script>
<script src="<?php echo site_url('/assets/js/bootstrap-datepicker.js'); ?>"></script>
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
	    	<div class="row">
	    		<div class="grid-1-6 left">
	        		<div class="heading">Funding Source</div>
	    		</div>
	    		<div class="grid-1-6 left">
	        		<div class="heading">Amount</div>
	    		</div>
	    		<div class="grid-1-6 left">
	        		<div class="heading">Currency</div>
	    		</div>
	    		<div class="grid-1-6 left">
	        		<div class="heading">Exchange Rate</div>
	    		</div>
	    		<div class="grid-1-6 left">
	        		<div class="heading">Date of Exchange Rate</div>
	    		</div>
	    		<div class="grid-1-6 left">
	        		<div class="heading">Amount in Taka</div>
	    		</div>
	    		<div class="clear"></div>
	    	</div>
	    	<?php if(isset($fundSources) && $fundSources!=NULL) { 
	    			foreach($fundSources as $key=>$fundSource){
	    	?>
	    			<div id="frow-<?php echo $key; ?>">
	    			<div class="row">
				    	<div class="grid-1-6 left">
				        	<!--<input class="textbox no-margin width-89" type="text" name="fund_sources[]" id="fund_sources" value="<?php echo $fundSource->fund_source; ?>"/>-->
                            <select name="fund_sources[]" id="fund_sources" class="selectionbox width-89">
                                <option value="">Select</option>
                                <?php foreach($funding_source['data'] as $key=>$fundingSource) { ?>
                                    <option value="<?php echo $fundingSource['value']; ?>" <?php if(isset($program_detail) && $fundSource->fund_sources==$fundingSource['value']) { ?> selected="selected" <?php } ?>><?php echo $fundingSource['name']; ?></option>
                                <?php } ?>
                            </select>
                            
				    	</div>
				    	<div class="grid-1-6 left">
				        	<input class="textbox no-margin width-89" type="text" name="amounts[]" id="amounts" value="<?php echo $fundSource->amount; ?>"/>
				    	</div>
				    	<div class="grid-1-6 left">
				        	<!--<input class="textbox no-margin width-89" type="text" name="currencies[]" id="currencies" value="<?php //echo $fundSource->currency; ?>"/>-->
                            <select name="currencies[]" id="currencies" class="selectionbox  width-89">
                                <option value="">Select</option>
                                <?php foreach($currencies['data'] as $key=>$currency) { ?>
                                    <option value="<?php echo $currency['value']; ?>" <?php if (in_array($fundSources->currency, $currency))  { ?> selected="selected" <?php } ?>><?php echo $currency['name']; ?></option>
                                <?php } ?>
                            </select>	
				    	</div>
				    	<div class="grid-1-6 left">
				        	<input class="textbox no-margin width-89" type="text" name="exchange_rates[]" id="exchange_rates" value="<?php echo $fundSource->exchange_rate; ?>"/>	
				    	</div>
				    	<div class="grid-1-6 left">
				        	<input class="textbox no-margin width-89" type="text" name="date_of_exchange_rates[]" id="date_of_exchange_rates" value="<?php echo $fundSource->date_of_exchange_rate; ?>"/>	
				    	</div>
				    	<div class="grid-1-6 left">
				        	<input class="textbox no-margin width-89" type="text" name="amounts_in_taka[]" id="amounts_in_taka" value="<?php echo $fundSource->amount_in_taka; ?>"/>	
				    	</div>
				    	<input type="hidden" name="fundSourceID[]" id="fundSourceID" value="<?php echo $fundSource->id; ?> ">
				    </div>
				    <div class="row add-more"><a href="javascript:void(0);" onclick="delete_found_source(<?php echo $fundSource->id;?> , <?php echo $program_id; ?>, <?php echo $key; ?> );">[-]</a></div>
				    </div>
	    	<?php				
	    			}
	    	 	  } 
	    	?>
	    	<div id='duplicate2'>
	    	<div class="row">
		    	<div class="grid-1-6 left">
                    <select name="fund_sources[]" id="fund_sources" class="selectionbox width-89">
                        <option value="">Select</option>
                        <?php foreach($funding_source['data'] as $key=>$fundingSource) { ?>
                            <option value="<?php echo $fundingSource['value']; ?>" <?php if(isset($program_detail) && $program_detail->fund_sources==$fundingSource['value']) { ?> selected="selected" <?php } ?>><?php echo $fundingSource['name']; ?></option>
                        <?php } ?>
                    </select>
		    	</div>
		    	<div class="grid-1-6 left">
		        	<input class="textbox no-margin width-89" type="text" name="amounts[]" id="amounts" value=""/>
		    	</div>
		    	<div class="grid-1-6 left">
                    <select name="currencies[]" id="currencies" class="selectionbox  width-89">
                        <option value="">Select</option>
                        <?php foreach($currencies['data'] as $key=>$currency) { ?>
                            <option value="<?php echo $currency['value']; ?>" <?php if(isset($program_detail) && $program_detail->currencies==$currency['value']) { ?> selected="selected" <?php } ?>><?php echo $currency['name']; ?></option>
                        <?php } ?>
                    </select>
		    	</div>
		    	<div class="grid-1-6 left">
		        	<input class="textbox no-margin width-89" type="text" name="exchange_rates[]" id="exchange_rates" value=""/>	
		    	</div>
		    	<div class="grid-1-6 left">
		        	<input class="textbox no-margin width-89" type="text" name="date_of_exchange_rates[]" id="date_of_exchange_rates" value=""/>	
		    	</div>
		    	<div class="grid-1-6 left">
		        	<input class="textbox no-margin width-89" type="text" name="amounts_in_taka[]" id="amounts_in_taka" value=""/>	
		    	</div>
		    </div>
		    <div class="row add-more">
		    	<a id="minus2" href="javascript:void(0);">[-]</a> 
		    	<a id="plus2" href="javascript:void(0);">[+]</a>
		    </div>
		   	</div> 	
	    </div>
	</div>
	
	<div class="main_form">
		<div class="left_form">
        	<div class="form_element">
           		<div class="label width_170px">Estimate Date </div>
                <div class="field">
               		<input type="text" name="estimate_date" id="estimate_date" value="<?php if(isset($costEstimations)) echo $costEstimations->estimate_date; ?>" data-date-format="yyyy-mm-dd"  class="textbox no-margin disabled" readonly="readonly">
               	</div>
           		<div class="clear"></div>
        	</div>
		</div>
                    
       	<div class="right_form">    
       		<div class="form_element">
          		<div class="label">Financial Year </div>
               	<div class="field">
              		<input type="text" name="financial_year" id="financial_year" value="<?php if(isset($costEstimations)) echo $costEstimations->financial_year; ?>" class="textbox no-margin">
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
	    		<div class="grid-1-4 left">
	        		<div class="heading">A/C Head Code</div>
	    		</div>
	    		<div class="grid-1-4 left">
	        		<div class="heading">A/C Head Title</div>
	    		</div>
	    		<div class="grid-1-4 left">
	        		<div class="heading">Amount</div>
	    		</div>
	    		<div class="clear"></div>
	    	</div>
	    	
	    	<?php if(isset($costBreakdowns) && $costBreakdowns!=NULL) { 
	    			foreach($costBreakdowns as $key=>$costBreakdown){
	    	?>
	    			<div id="cbrow-<?php echo $key; ?>">
	    			<div class="row">
				    	<div class="grid-1-4 left">
				        	<input class="textbox no-margin width-92" type="text" name="s_os[]" id="s_os" value="<?php echo $costBreakdown->s_o;?>"/>
				    	</div>
				    	<div class="grid-1-4 left">
				        	<input class="textbox no-margin width-92" type="text" name="ac_head_codes[]" id="ac_head_codes" value="<?php echo $costBreakdown->ac_head_code;?>"/>
				    	</div>
				    	<div class="grid-1-4 left">
				        	<input class="textbox no-margin width-92" type="text" name="ac_head_titles[]" id="ac_head_titles" value="<?php echo $costBreakdown->ac_head_title;?>"/>	
				    	</div>
				    	<div class="grid-1-4 left">
				        	<input class="textbox no-margin width-92" type="text" name="cost_amounts[]" id="cost_amounts" value="<?php echo $costBreakdown->amount;?>"/>	
				    	</div>
				    		<input type="hidden" name="costBreakdownID[]" id="costBreakdownID" value="<?php echo $costBreakdown->id; ?> ">
				    </div>
				    <div class="row add-more"><a href="javascript:void(0);" onclick="delete_costbreakdown_item(<?php echo $costBreakdown->id;?> , <?php echo $program_id; ?>, <?php echo $key; ?> );">[-]</a></div>
				    </div>
	    	<?php				
	    			}
	    	 	  } 
	    	?>
	    	
	    	<div id='duplicate3'>
		    	<div class="row">
			    	<div class="grid-1-4 left">
			        	<input class="textbox no-margin width-92" type="text" name="s_os[]" id="s_os" value=""/>
			    	</div>
			    	<div class="grid-1-4 left">
			        	<input class="textbox no-margin width-92" type="text" name="ac_head_codes[]" id="ac_head_codes" value=""/>
			    	</div>
			    	<div class="grid-1-4 left">
			        	<input class="textbox no-margin width-92" type="text" name="ac_head_titles[]" id="ac_head_titles" value=""/>	
			    	</div>
			    	<div class="grid-1-4 left">
			        	<input class="textbox no-margin width-92" type="text" name="cost_amounts[]" id="cost_amounts" value=""/>	
			    	</div>
			    </div>
			    <div class="row add-more">
			    	<a id="minus3" href="javascript:void(0);">[-]</a> 
			    	<a id="plus3" href="javascript:void(0);">[+]</a>
			    </div>
		    </div>	
	    </div>
	</div>
	
	<div class="form_element">
    	<div class="button_panel" style="margin-right: 15px;">
        	<?php if(isset($program_detail) && ($fundSources!=NULL || $costEstimations!=NULL || $costBreakdowns!=NULL)) { ?>
		    		<input type="hidden" name="program_id" id="program_id" value="<?php if($program_id!=NULL) echo $program_id; ?>">
		    		<input type="button" name="delete_fundSources" id="delete_fundSources" value="Delete" class="k-button button">
		            <input type="submit" name="update_fundSources" id="update_fundSources" value="Update" class="k-button button">
		    <?php } else { ?>
                <input type="hidden" name="program_id" id="program_id" value="<?php if($program_id!=NULL) echo $program_id; ?>">
            	<input type="submit" name="save_fundSources" id="save_fundSources" value="Save" class="k-button button">
            <?php } ?>
        </div>
        <div class="clear"></div>
    </div>
		
</form>

<script type="text/javascript">
$(document).ready(function() {
	$("#duplicate2").dynamicForm("#plus2", "#minus2", {limit:10});		
	return false;
});
$(document).ready(function() {
	$("#duplicate3").dynamicForm("#plus3", "#minus3", {limit:10});		
	return false;
});
</script>
<script language="javascript">
	$('#estimate_date').datepicker('setStartDate');
</script>
<script type="text/javascript">
	function delete_found_source(fundSource_id, program_id, row_id){
		var r=confirm("Are you sure you want to delete this fund source?");
		if (r==true){
		  	var jqxhr = $.post( "<?php echo site_url("rmis/program/fundSources/deleteFundSource"); ?>", { fundSource_id: fundSource_id, program_id: program_id }, function() {
			  $("#frow-" + parseInt(row_id)).remove();
			})
			.fail(function() {
				alert( "error" );
			})
		}
	}
</script>
<script type="text/javascript">
	function delete_costbreakdown_item(cbitem_id, program_id, row_id){
		var r=confirm("Are you sure you want to delete this item?");
		if (r==true){
		  	var jqxhr = $.post( "<?php echo site_url("rmis/program/fundSources/deleteCostBreakDown"); ?>", { cbitem_id: cbitem_id, program_id: program_id }, function() {
			  $("#cbrow-" + parseInt(row_id)).remove();
			})
			.fail(function() {
				alert( "error" );
			})
		}
	}
</script>