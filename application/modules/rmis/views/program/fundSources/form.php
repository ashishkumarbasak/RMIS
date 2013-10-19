<script src="<?php echo site_url('/assets/js/jquery-dynamic-form.js'); ?>"></script>
<script src="<?php echo site_url('/assets/js/bootstrap-datepicker.js'); ?>"></script>
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
<?php 
	if(isset($division_detail)){
		$division_detail = unserialize($division_detail);
	} 
?>

<form name="other_info" id="other_info" method="post" action="">
	<div class="main_form">
    	<div class="form_element">
        	<div class="label width_170px">Title of Research Programme</div>
            <div class="textarea_field"><textarea name="fund_program" id="fund_program" readonly="readonly" class="textarea_small disabled width_68_percent"></textarea></div>
            <div class="clear"></div>
        </div>
                    
		<div class="left_form">
        	<div class="form_element">
           		<div class="label width_170px">Programme Area </div>
                <div class="field">
               		<input type="text" name="fund_area" id="fund_area" value="" class="textbox disabled" readonly="readonly">
               	</div>
           		<div class="clear"></div>
        	</div>
                        
           	<div class="form_element">
            	<div class="label width_170px">Planned Budget (in Taka) </div>
               	<div class="field">
               		<input type="text" name="fund_budget" id="fund_budget" value="" class="textbox disabled" readonly="readonly">
              	</div>
               	<div class="clear"></div>
         	</div> 
		</div>
                    
       	<div class="right_form">    
       		<div class="form_element">
          		<div class="label">Principal Investigator <br />(or PM/Coordinator)</div>
               	<div class="field">
              		<input type="text" name="programme_other_info_investigator" id="programme_other_info_investigator" value="" class="textbox disabled" readonly="readonly">
               	</div>
               	<div class="clear"></div>
        	</div>
                        
            <div class="form_element">
           		<div class="label">Approved Budget (in Taka)</div>
               	<div class="field">
                	<input type="text" name="fund_investigator" id="fund_investigator" value="" class="textbox disabled" readonly="readonly">
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
	    	
	    	<div id='duplicate2' class="row">
		    	<div class="grid-1-6 left">
		        	<input class="textbox no-margin" type="text" name="lower_range[]" id="lower_range" value=""/>
		    	</div>
		    	<div class="grid-1-6 left">
		        	<input class="textbox no-margin" type="text" name="upper_range[]" id="upper_range" value=""/>
		    	</div>
		    	<div class="grid-1-6 left">
		        	<input class="textbox no-margin width-100" type="text" name="letter_grade[]" id="letter_grade" value=""/>	
		    	</div>
		    	<div class="grid-1-6 left">
		        	<input class="textbox no-margin width-100" type="text" name="grade_point[]" id="grade_point" value=""/>	
		    	</div>
		    	<div class="grid-1-6 left">
		        	<input class="textbox no-margin width-100" type="text" name="qualitative_status[]" id="qualitative_status" value=""/>	
		    	</div>
		    	<div class="grid-1-6 left">
		        	<input class="textbox no-margin width-100" type="text" name="description[]" id="description" value=""/>	
		    	</div>
		    	<span style="font-size:16px; position: relative; left: 50px;">
		    		<a id="minus2" href="javascript:void(0);">[-]</a> 
		    		<a id="plus2" href="javascript:void(0);">[+]</a>
		    	</span>
		    </div>
	    </div>
	</div>
	
	<div class="main_form">
		<div class="left_form">
        	<div class="form_element">
           		<div class="label width_170px">Estimate Date </div>
                <div class="field">
               		<input type="text" name="fund_area" id="fund_area" value="" class="textbox disabled" readonly="readonly">
               	</div>
           		<div class="clear"></div>
        	</div>
		</div>
                    
       	<div class="right_form">    
       		<div class="form_element">
          		<div class="label">Financial Year </div>
               	<div class="field">
              		<input type="text" name="programme_other_info_investigator" id="programme_other_info_investigator" value="" class="textbox disabled" readonly="readonly">
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
	    	
	    	<div id='duplicate3' class="row">
		    	<div class="grid-1-4 left">
		        	<input class="textbox no-margin" type="text" name="lower_range[]" id="lower_range" value=""/>
		    	</div>
		    	<div class="grid-1-4 left">
		        	<input class="textbox no-margin" type="text" name="upper_range[]" id="upper_range" value=""/>
		    	</div>
		    	<div class="grid-1-4 left">
		        	<input class="textbox no-margin width-100" type="text" name="letter_grade[]" id="letter_grade" value=""/>	
		    	</div>
		    	<div class="grid-1-4 left">
		        	<input class="textbox no-margin width-100" type="text" name="grade_point[]" id="grade_point" value=""/>	
		    	</div>
		    	<span style="font-size:16px; position: relative; left: 50px;">
		    		<a id="minus3" href="javascript:void(0);">[-]</a> 
		    		<a id="plus3" href="javascript:void(0);">[+]</a>
		    	</span>
		    </div>
	    </div>
	</div>
		
</form>