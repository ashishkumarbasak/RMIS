<?php 
	if(isset($division_detail)){
		$division_detail = unserialize($division_detail);
	} 
?>
<form name="frm_division" id="frm_division" method="post" action="">
<div class="main_form">
	<div class="left_form">
        <div class="form_element">
            <div class="label">Division/Unit ID <span class="mandatory">*</span></div>
            <div class="field">           
            <input class="textbox disabled" type="text" name="division_id" id="division_id" value="<?php if($division_detail) echo $division_detail->division_id; else echo $newDivID; ?>" readonly="readonly" /></div>
            <div class="clear"></div>
        </div>
        
        <div class="form_element">
            <div class="label">Division/Unit Name <span class="mandatory">*</span></div>
            <div class="field"><input class="textbox" type="text" name="division_name" id="division_name" value="<?php if($division_detail) echo $division_detail->division_name; ?>"/></div>
            <div class="clear"></div>
        </div>
        
        <div class="form_element">
            <div class="label">Head Of Division <span class="mandatory">*</span></div>
            <div class="field">
            	<select name="division_head" id="division_head" class="selectionbox">
                	<option value="">Select Scientist</option>
                    <?php foreach($employees as $key=>$value) { ?>
                    <option value="<?php echo $value->employee_id; ?>" <?php if(isset($division_detail) && $division_detail->division_head==$value->employee_id) { ?> selected <?php } ?> ><?php echo $value->employee_name; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="clear"></div>
        </div>
        
        <div class="form_element">
            <div class="label">Phone No</div>
            <div class="field"><input class="textbox" type="text" name="division_phone" id="division_phone" value="<?php if($division_detail) echo $division_detail->division_phone; ?>"/></div>
            <div class="clear"></div>
        </div>
        
        <div class="form_element">
           	<div class="label">Email</div>
            <div class="field"><input class="textbox" type="text" name="division_email" id="division_email" value="<?php if($division_detail) echo $division_detail->division_email; ?>"/></div>
            <div class="clear"></div>
        </div>
        
        <div class="form_element">
           	<div class="label">Sort Order</div>
            <div class="field"><input class="textbox" type="text" name="division_order" id="division_order" value="<?php if($division_detail) echo $division_detail->division_order; ?>"/></div>
            <div class="clear"></div>
        </div>
    
    </div>
    <div class="right_form">
    	<div class="form_element">
            <div class="label">About Division</div>
            <div class="field"><textarea class="textarea" name="division_about" id="division_about"><?php if($division_detail) echo $division_detail->division_about; ?></textarea></div>
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