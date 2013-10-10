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
            <div class="field"><input class="textbox" type="text" name="grading_effect_date" id="grading_effect_date" value=""/></div>
            <div class="clear"></div>
        </div>
        
        <div class="form_element">
            <div class="button_panel">
                <?php if(isset($division_detail) && $division_detail->division_id!=NULL) { ?>
                	<input type="hidden" name="id" id="id" value="<?php echo $division_detail->id; ?>">
        			<input type="submit" name="save_update" id="save_update" value="Update" class="k-button button">
                <?php } else { ?>
                	<input type="submit" name="save_division" id="save_division" value="Save" class="k-button button">
                <?php } ?>
            </div>
            <div class="clear"></div>
        </div>
     
    </div>    
    <div class="clear"></div>
</div>
</form>