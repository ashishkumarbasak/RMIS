<script src="<?php echo site_url('/assets/js/jquery-dynamic-form.js'); ?>"></script>
<script src="<?php echo site_url('/assets/js/bootstrap-datepicker.js'); ?>"></script>
<script type="text/javascript">
$(document).ready(function() {
	$("#duplicate2").dynamicForm("#plus2", "#minus2", {limit:10});		
	return false;
});
</script>
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
           		<div class="label width_170px">Planned Budget (In Taka) </div>
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
           		<div class="label">Total Budget (In Taka)</div>
              	<div class="field">
                   	<input type="text" name="team_info_initiationdate" id="team_info_initiationdate" value="" class="textbox disabled" readonly="readonly">
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
	
	
	<div class="main_form">
		<div class="form">
	    	<div class="form_element">
	            <div class="label">Task/Work Element/ Activity Information </div>
	            <div class="clear"></div>
	        </div>
	    	<div class="row">
	    		<div class="grid-1-20 left">
	        		<div class="heading">S/O</div>
	    		</div>
	    		<div class="grid-1-6 left">
	        		<div class="heading">Work Element/ Activity</div>
	    		</div>
	    		<div class="grid-1-6 left">
	        		<div class="heading">Planned Start Date</div>
	    		</div>
	    		<div class="grid-1-6 left">
	        		<div class="heading">Planned End Date</div>
	    		</div>
	    		<div class="grid-1-6 left">
	        		<div class="heading">Actual Start Date</div>
	    		</div>
	    		<div class="grid-1-6 left">
	        		<div class="heading">Actual End Date</div>
	    		</div>
	    		<div class="grid-1-6 left">
	        		<div class="heading">Assign Resources</div>
	    		</div>
	    		<div class="clear"></div>
	    	</div>
	    	
	    	<div id='duplicate2' class="row">
		    	<div class="grid-1-20 left">
		        	<input class="textbox no-margin" style="width: 55%;" type="text" name="lower_range[]" id="lower_range" value=""/>
		    	</div>
		    	<div class="grid-1-6 left">
		        	<input class="textbox no-margin" style="width: 89%;" type="text" name="lower_range[]" id="lower_range" value=""/>
		    	</div>
		    	<div class="grid-1-6 left">
		        	<input class="textbox no-margin" style="width: 89%;" type="text" name="upper_range[]" id="upper_range" value=""/>
		    	</div>
		    	<div class="grid-1-6 left">
		        	<input class="textbox no-margin" style="width: 90%;" type="text" name="letter_grade[]" id="letter_grade" value=""/>	
		    	</div>
		    	<div class="grid-1-6 left">
		        	<input class="textbox no-margin" style="width: 90%;" type="text" name="qualitative_status[]" id="qualitative_status" value=""/>	
		    	</div>
		    	<div class="grid-1-6 left">
		        	<input class="textbox no-margin" style="width: 90%;" type="text" name="description[]" id="description" value=""/>	
		    	</div>
		    	<div class="grid-1-6 left">
		        	<input class="textbox no-margin" style="width: 90%;" type="text" name="description[]" id="description" value=""/>	
		    	</div>
		    	<span style="font-size:16px; position: relative; left: 0px;">
		    		<a id="minus2" href="javascript:void(0);">[-]</a> 
		    		<a id="plus2" href="javascript:void(0);">[+]</a>
		    	</span>
		    </div>
	    </div>
	</div>
	
</form>