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
<form name="frm_division" id="frm_division" method="post" action="">
<div class="main_form">
	<div class="left_form">
        <div class="form_element">
            <div class="label">Grading Title <span class="mandatory">*</span></div>
            <div class="field"><input class="textbox" type="text" name="grading_title" id="grading_title" value=""/></div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="right_form">
    	<div class="form_element">
            <div class="label">Effect Date <span class="mandatory">*</span></div>
            <div class="field"><input class="textbox" type="text" name="effect_date" id="effect_date" value=""/></div>
            <div class="clear"></div>
        </div>
    </div>    
    <div class="clear"></div>
    <div class="gap"></div>
    <div class="form">
    	<div class="form_element">
            <div class="label">Grade Point Information</div>
            <div class="clear"></div>
        </div>
    	<div class="row">
    		<div class="grid-1-6 left">
        		<div class="heading">Lower Range</div>
    		</div>
    		<div class="grid-1-6 left">
        		<div class="heading">Upper Range</div>
    		</div>
    		<div class="grid-1-6 left">
        		<div class="heading">Letter Grader</div>
    		</div>
    		<div class="grid-1-6 left">
        		<div class="heading">Grade Point</div>
    		</div>
    		<div class="grid-1-6 left">
        		<div class="heading">Qualitative Status</div>
    		</div>
    		<div class="grid-1-6 left">
        		<div class="heading">Description</div>
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
    
    <div class="clear"></div>
    <div class="gap"></div>
    
    <div class="form_element">
    	<div class="button_panel" style="margin-right:125px;">
                <input type="hidden" name="id" id="id" value="<?php echo $division_detail->id; ?>">
        		<input type="submit" name="update_gradings" id="update_gradings" value="Update" class="k-button button">
                <input type="submit" name="save_gradings" id="save_gradings" value="Save" class="k-button button">
        </div>
        <div class="clear"></div>
    </div>
    
    
</div>
</form>