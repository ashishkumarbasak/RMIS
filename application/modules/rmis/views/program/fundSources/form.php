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
</form>