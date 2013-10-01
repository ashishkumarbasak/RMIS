<form name="frm_division" id="frm_division" method="post" action="">
<div class="main_form">
	<div class="left_form">
    	
        <div class="form_element">
            <div class="label">Division/Unit ID <span class="mandatory">*</span></div>
            <div class="field">           
            <input class="textbox disabled" type="text" name="division_id" id="division_id" value="<?php echo $newDivID; ?>" readonly="readonly" /></div>
            <div class="clear"></div>
        </div>
        
        <div class="form_element">
            <div class="label">Division/Unit Name <span class="mandatory">*</span></div>
            <div class="field"><input class="textbox" type="text" name="division_name" id="division_name" value=""/></div>
            <div class="clear"></div>
        </div>
        
        <div class="form_element">
            <div class="label">Head Of Division <span class="mandatory">*</span></div>
            <div class="field">
            	<select name="division_head" id="division_head" class="selectionbox">
                	<option value="">Select Scientist</option>
                    <?php foreach($employees as $key=>$value) { ?>
                    <option value="<?php echo $value->employee_id; ?>"><?php echo $value->employee_name; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="clear"></div>
        </div>
        
        <div class="form_element">
            <div class="label">Phone No</div>
            <div class="field"><input class="textbox" type="text" name="division_phone" id="division_phone" value=""/></div>
            <div class="clear"></div>
        </div>
        
        <div class="form_element">
           	<div class="label">Email</div>
            <div class="field"><input class="textbox" type="text" name="division_email" id="division_email" value=""/></div>
            <div class="clear"></div>
        </div>
        
        <div class="form_element">
           	<div class="label">Sort Order</div>
            <div class="field"><input class="textbox" type="text" name="division_order" id="division_order" value=""/></div>
            <div class="clear"></div>
        </div>
    
    </div>
    <div class="right_form">
    	<div class="form_element">
            <div class="label">About Division</div>
            <div class="field"><textarea class="textarea" name="division_about" id="division_about"></textarea></div>
            <div class="clear"></div>
        </div>
        
        <div class="form_element">
            <div class="button_panel">
            	<input type="submit" name="save_division" id="save_division" value="Save" class="k-button button">
                <?php if(isset($division_id) && $division_id!=NULL) { ?>
        		<input type="submit" name="update" id="update" value="Update" class="k-button button">
                <?php } ?>
            </div>
            <div class="clear"></div>
        </div>
     
    </div>    
    <div class="clear"></div>
</div>
</form>