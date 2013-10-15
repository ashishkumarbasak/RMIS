<?php 
	if(isset($division_detail)){
		$division_detail = unserialize($division_detail);
	} 
?>
<form name="research_info" id="research_info" method="post" action="">
	<div class="main_form">
   		<div class="form_element">
       		<div class="label width_170px">Title of Research Programme</div>
            <div class="textarea_field"><textarea name="fund_program" id="fund_program" class="textarea_small disabled width_68_percent" readonly="readonly"></textarea></div>
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
           		<div class="label width_170px">Planned Start Date </div>
               	<div class="field">
               		<input type="text" name="team_info_startdate" id="team_info_startdate" value="" class="textbox disabled" readonly="readonly">
              	</div>
              	<div class="clear"></div>
          	</div>  
                            
          	<div class="form_element">
           		<div class="label width_170px">Planned End Date </div>
              	<div class="field">
                	<input type="text" name="team_info_enddate" id="team_info_enddate" value="" class="textbox disabled" readonly="readonly">
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
           		<div class="label">Initiation Date</div>
              	<div class="field">
                   	<input type="text" name="team_info_initiationdate" id="team_info_initiationdate" value="" class="textbox disabled" readonly="readonly">
               	</div>
               	<div class="clear"></div>
           	</div>
                            
           	<div class="form_element">
           		<div class="label">Completion Date</div>
              	<div class="field">
              		<input type="text" name="team_info_completiondate" id="team_info_completiondate" value="" class="textbox disabled" readonly="readonly">
               	</div>
               	<div class="clear"></div>
           	</div>                        
		</div>                                                 
	</div>
</form>