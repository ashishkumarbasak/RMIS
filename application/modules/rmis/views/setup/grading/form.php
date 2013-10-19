<script src="<?php echo site_url('/assets/js/jquery-dynamic-form.js'); ?>"></script>
<script src="<?php echo site_url('/assets/js/bootstrap-datepicker.js'); ?>"></script>
<link rel="stylesheet" href="<?php echo site_url('assets/extensive/css/datepicker.css'); ?>" />

<?php 
	if(isset($grading_detail)){
		$grading_detail = unserialize($grading_detail);
	}
	if(isset($grade_point_informations)){
		$grade_point_informations = unserialize($grade_point_informations);
	} 
?>
<form name="frm_division" id="frm_division" method="post" action="">
<div class="main_form">
	<div class="left_form">
        <div class="form_element">
            <div class="label">Grading Title <span class="mandatory">*</span></div>
            <div class="field"><input class="textbox" type="text" name="grading_title" id="grading_title" value="<?php if($grading_detail) echo $grading_detail->grading_title; ?>"/></div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="right_form">
    	<div class="form_element">
            <div class="label">Effect Date <span class="mandatory">*</span></div>
            <div class="field"><input class="textbox disabled" readonly="readonly" type="text" name="effect_date" id="effect_date" data-date-format="yyyy-mm-dd" value="<?php if($grading_detail) echo $grading_detail->effect_date; ?>"/></div>
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
    	
    	<?php if(isset($grade_point_informations) && $grade_point_informations!=NULL) { 
    			foreach($grade_point_informations as $key=>$grade_information){
    	?>
    			<div id="row-<?php echo $key; ?>">
    			<div class="row">
			    	<div class="grid-1-6 left">
			        	<input class="textbox no-margin width-89" type="text" name="lower_ranges[]" id="lower_ranges" value="<?php echo $grade_information->lower_range; ?>"/>
			    	</div>
			    	<div class="grid-1-6 left">
			        	<input class="textbox no-margin width-89" type="text" name="upper_ranges[]" id="upper_ranges" value="<?php echo $grade_information->upper_range; ?>"/>
			    	</div>
			    	<div class="grid-1-6 left">
			        	<input class="textbox no-margin width-89" type="text" name="letter_grades[]" id="letter_grades" value="<?php echo $grade_information->letter_grade; ?>"/>	
			    	</div>
			    	<div class="grid-1-6 left">
			        	<input class="textbox no-margin width-89" type="text" name="grade_points[]" id="grade_points" value="<?php echo $grade_information->grade_point; ?>"/>	
			    	</div>
			    	<div class="grid-1-6 left">
			        	<input class="textbox no-margin width-89" type="text" name="qualitative_statuses[]" id="qualitative_statuses" value="<?php echo $grade_information->qualitative_status; ?>"/>	
			    	</div>
			    	<div class="grid-1-6 left">
			        	<input class="textbox no-margin width-89" type="text" name="descriptions[]" id="descriptions" value="<?php echo $grade_information->description; ?>"/>	
			    	</div>
			    </div>
			    <div class="row add-more"><a href="javascript:void(0);" onclick="delete_grade_point_information(<?php echo $grade_information->id;?> , <?php echo $key; ?> );">[-]</a></div>
			    </div>
    	<?php				
    			}
    	 	  } 
    	 ?>	
    	
    	<div id='duplicate2'>
    	<div class="row">
	    	<div class="grid-1-6 left">
	        	<input class="textbox no-margin width-89" type="text" name="lower_ranges[]" id="lower_ranges" value=""/>
	    	</div>
	    	<div class="grid-1-6 left">
	        	<input class="textbox no-margin width-89" type="text" name="upper_ranges[]" id="upper_ranges" value=""/>
	    	</div>
	    	<div class="grid-1-6 left">
	        	<input class="textbox no-margin width-89" type="text" name="letter_grades[]" id="letter_grades" value=""/>	
	    	</div>
	    	<div class="grid-1-6 left">
	        	<input class="textbox no-margin width-89" type="text" name="grade_points[]" id="grade_points" value=""/>	
	    	</div>
	    	<div class="grid-1-6 left">
	        	<input class="textbox no-margin width-89" type="text" name="qualitative_statuses[]" id="qualitative_statuses" value=""/>	
	    	</div>
	    	<div class="grid-1-6 left">
	        	<input class="textbox no-margin width-89" type="text" name="descriptions[]" id="descriptions" value=""/>	
	    	</div>
	    </div>
	    <div class="row add-more">
	   		<a id="minus2" href="javascript:void(0);">[-]</a> 
	    	<a id="plus2" href="javascript:void(0);">[+]</a>
	    </div>
	    </div>
    </div>
    
    <div class="clear"></div>
    <div class="gap"></div>
    
    <div class="form_element">
    	<div class="button_panel" style="margin-right:125px;">
        		<?php if(isset($grading_detail) && $grading_detail->id!=NULL) { ?>
	                <input type="hidden" name="id" id="id" value="<?php echo $grading_detail->id; ?>">
	                <input type="submit" name="delete_gradings" id="delete_gradings" value="Delete" class="k-button button">
	        		<input type="submit" name="update_gradings" id="update_gradings" value="Update" class="k-button button">
	            <?php } else { ?>
	                <input type="submit" name="save_gradings" id="save_gradings" value="Save" class="k-button button">
	            <?php } ?>
        </div>
        <div class="clear"></div>
    </div>
</div>
</form>

<script type="text/javascript">
$(document).ready(function() {
	$("#duplicate2").dynamicForm("#plus2", "#minus2", {limit:10});		
	return false;
});
</script>
<script type="text/javascript">
	$('#effect_date').datepicker('setStartDate');
</script>
<script type="text/javascript">
	function delete_grade_point_information(grade_point_id, row_id){
		var r=confirm("Are you sure you want to delete this information?");
		if (r==true){
		  	var jqxhr = $.post( "<?php echo site_url("rmis/setup/gradings/deleteGradePoint"); ?>", { grade_point_id: grade_point_id }, function() {
			  $("#row-" + parseInt(row_id)).remove();
			})
			.fail(function() {
				alert( "error" );
			})
		}
	}
</script>