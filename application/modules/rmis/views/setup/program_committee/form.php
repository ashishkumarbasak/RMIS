<script src="<?php echo site_url('/assets/js/jquery-dynamic-form.js'); ?>"></script>
<script src="<?php echo site_url('/assets/js/bootstrap-datepicker.js'); ?>"></script>
<script type="text/javascript">
$(document).ready(function() {
	$("#duplicate2").dynamicForm("#plus2", "#minus2", {limit:10});		
	return false;
});
</script>
<?php 
	if(isset($committee_detail)){
		$committee_detail = unserialize($committee_detail);
	} 
?>
<form name="frm_division" id="frm_division" method="post" action="">
<div class="main_form">
	<div class="left_form">
        <div class="form_element">
            <div class="label">Chairman of the Committee <span class="mandatory">*</span></div>
            <div class="field"><input class="textbox" type="text" name="committee_chairman" id="committe_chairman" value=""/></div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="right_form">
    	<div class="form_element">
            <div class="label">Committe Formation Date <span class="mandatory">*</span></div>
            <div class="field"><input class="textbox" type="text" name="committee_formation_date" id="committe_formation_date" value=""/></div>
            <div class="clear"></div>
        </div>
    </div>    
    <div class="clear"></div>
    <div class="gap"></div>
    <div class="form">
    	<div class="form_element">
            <div class="label">Committe Member</div>
            <div class="clear"></div>
        </div>
    	<div class="row">
    		<div class="grid-1-3 left">
        		<div class="heading">Member Name</div>
    		</div>
    		<div class="grid-1-3 left">
        		<div class="heading">Designation</div>
    		</div>
    		<div class="grid-1-3 left">
        		<div class="heading">Role in Committee</div>
    		</div>
    		<div class="clear"></div>
    	</div>
    	
    	<div id='duplicate2' class="row">
	    	<div class="grid-1-3 left">
	        	<input class="textbox no-margin" type="text" name="committe_member_name[]" id="committe_member_name" value=""/>
	    	</div>
	    	<div class="grid-1-3 left">
	        	<input class="textbox no-margin" type="text" name="committe_member_designation[]" id="committe_member_designation" value=""/>
	    	</div>
	    	<div class="grid-1-3 left">
	        	<input class="textbox no-margin width-100" type="text" name="committe_member_role[]" id="committe_member_role" value=""/>	
	    	</div>
	    	<span style="font-size:16px; position: relative; left: 75px;"><a id="minus2" href="">[-]</a> <a id="plus2" href="">[+]</a></span>
	    </div>
    	
    </div>
    
    <div class="clear"></div>
    <div class="gap"></div>
    
    <div class="form_element">
    	<div class="button_panel" style="margin-right:125px;">
        	<?php if(isset($division_detail) && $division_detail->division_id!=NULL) { ?>
                <input type="hidden" name="id" id="id" value="<?php echo $division_detail->id; ?>">
        		<input type="submit" name="save_update" id="save_update" value="Update" class="k-button button">
            <?php } else { ?>
                <input type="submit" name="save_program_committee" id="save_program_committee" value="Save" class="k-button button">
            <?php } ?>
        </div>
        <div class="clear"></div>
    </div>
    
    
</div>
</form>