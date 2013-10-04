
<form name="" id="" method="post" action="">
<div class="main_form" style="">
	<div class="left_form">
        
        <div class="form_element">
            <div class="label">Programme Area Id <span class="mandatory">*</span></div>
            <div class="field">
            <input class="textbox disabled" type="text" name="program_area_id" id="program_area_id" value="<?php echo $newPAID; ?>" readonly="readonly" /></div>
            <div class="clear"></div>
        </div>
        
        <div class="form_element">
            <div class="label">Programme Area<span class="mandatory">*</span></div>
            <div class="field"><input class="textbox" type="text" name="program_area_name" id="programme_area_name" value=""/></div>
            <div class="clear"></div>
        </div>
        
        <div class="form_element">
           	<div class="label">Sort Order</div>
            <div class="field"><input class="textbox" type="text" name="program_area_order" id="programme_area_order" value=""/></div>
            <div class="clear"></div>
       </div>
       
        <div class="form_element">
            <div class="button_panel" style="margin-right:130px;">
            	<input type="submit" name="save_Programarea" id="save" value="Save" class="k-button button">
                <?php if(isset($program_area_id) && $program_area_id!=NULL) { ?>
        		<input type="submit" name="update" id="update" value="Update" class="k-button button">
                <?php } ?>
            </div>
            <div class="clear"></div>
        </div>
       
	</div>
<div class="clear"></div>
</div>
</form>