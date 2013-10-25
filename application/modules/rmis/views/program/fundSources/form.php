<script src="<?php echo site_url('/assets/js/jquery-dynamic-form.js'); ?>"></script>
<script src="<?php echo site_url('/assets/js/bootstrap-datepicker.js'); ?>"></script>
<link rel="stylesheet" href="<?php echo site_url('assets/extensive/css/datepicker.css'); ?>" />
<?php 
	if(isset($program_detail)){
		$program_detail = unserialize($program_detail);
	} 
?>

<form name="other_info" id="other_info" method="post" action="">
	<div class="main_form">
    	<div class="form_element">
        	<div class="label width_170px">Title of Research Programme</div>
            <div class="textarea_field"><textarea name="research_program_title" id="research_program_title" disabled="disabled" class="textarea_small disabled width_68_percent"><?php if($program_detail!=NULL) echo $program_detail->research_program_title; ?></textarea></div>
            <div class="clear"></div>
        </div>
                    
		<div class="left_form">
        	<div class="form_element">
           		<div class="label width_170px">Programme Area </div>
                <div class="field">
               		<input type="text" name="program_area" id="program_area" value="<?php if($program_detail!=NULL) echo $program_detail->program_area; ?>" class="textbox disabled" disabled="disabled" />
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
	    	
	    	<div id='duplicate2'>
	    	<div class="row">
		    	<div class="grid-1-6 left">
		        	<input class="textbox no-margin width-89" type="text" name="fund_sources[]" id="fund_sources" value=""/>
		    	</div>
		    	<div class="grid-1-6 left">
		        	<input class="textbox no-margin width-89" type="text" name="amounts[]" id="amounts" value=""/>
		    	</div>
		    	<div class="grid-1-6 left">
		        	<input class="textbox no-margin width-89" type="text" name="currencies[]" id="currencies" value=""/>	
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
               		<input type="text" name="estimate_date" id="estimate_date" value="" data-date-format="yyyy-mm-dd"  class="textbox no-margin disabled" readonly="readonly">
               	</div>
           		<div class="clear"></div>
        	</div>
		</div>
                    
       	<div class="right_form">    
       		<div class="form_element">
          		<div class="label">Financial Year </div>
               	<div class="field">
              		<input type="text" name="financial_year" id="financial_year" value="" class="textbox no-margin">
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
        	<?php if(isset($program_detail) && $program_detail->program_id!=NULL) { ?>
                <input type="hidden" name="program_id" id="program_id" value="<?php echo $program_detail->program_id; ?>">
            <?php } ?>
                <input type="submit" name="save_fundSources" id="save_fundSources" value="Save" class="k-button button">
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