<?php 
	if(isset($program_area_detail)){
		$program_area_detail = unserialize($program_area_detail);
	} 
?>
<form name="frm_program_area" id="frm_program_area" method="post" action="">
<div class="main_form" style="">
	<div class="left_form">
        
        <div class="form_element">
            <div class="label">Programme Area Id <span class="mandatory">*</span></div>
            <div class="field">
            <input class="textbox disabled" type="text" name="program_area_id" id="program_area_id" value="<?php if($program_area_detail) echo $program_area_detail->program_area_id; else echo $newPAID; ?>" readonly="readonly" /></div>
            <div class="clear"></div>
        </div>
        
        <div class="form_element">
            <div class="label">Programme Area<span class="mandatory">*</span></div>
            <div class="field"><input class="textbox" type="text" name="program_area_name" id="program_area_name" value="<?php if($program_area_detail) echo $program_area_detail->program_area_name; ?>"/></div>
            <div class="clear"></div>
        </div>
        
        <div class="form_element">
           	<div class="label">Sort Order</div>
            <div class="field"><input class="textbox" type="text" name="program_area_order" id="program_area_order" value="<?php if($program_area_detail) echo $program_area_detail->program_area_order; ?>"/></div>
            <div class="clear"></div>
       </div>
       
        <div class="form_element">
            <div class="button_panel" style="margin-right:130px;">
            	<?php if(isset($program_area_detail) && $program_area_detail->program_area_id!=NULL) { ?>
                	<input type="hidden" name="id" id="id" value="<?php echo $program_area_detail->id; ?>">
                    <input type="button" name="new_programarea" id="new_programarea" value="New" class="k-button button" onclick="javascript:window.location='<?php echo site_url('rmis/setup/programAreas');?>'">
        			<input type="submit" name="delete_programarea" id="delete_programarea" value="Delete" class="k-button button">
        			<input type="submit" name="save_update" id="save_update" value="Update" class="k-button button">
                <?php } else { ?>
                	<input type="submit" name="save_Programarea" id="save" value="Save" class="k-button button">
                <?php } ?>
            </div>
            <div class="clear"></div>
        </div>
       
	</div>
<div class="clear"></div>
</div>
</form>