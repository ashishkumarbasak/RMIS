<form name="" id="" method="post" action="">
<div class="main_form" style="">
	<div class="left_form" style="width:55%;">    	
        <div class="form_element">
            <div class="label">Implementation Site/Area Id <span class="mandatory">*</span></div>
            <div class="field">
            <input class="textbox disabled" type="text" name="implementation_site_id" id="implementation_area_id" value="<?php echo $newImplSiteID; ?>" readonly="readonly" /></div>
            <div class="clear"></div>
        </div>
        
        <div class="form_element">
            <div class="label">Implementation Site/Area <span class="mandatory">*</span></div>
            <div class="field"><input class="textbox" type="text" name="implementation_site_name" id="implementation_area_name" value=""/></div>
            <div class="clear"></div>
        </div>
        
        <div class="form_element">
            <div class="label">Contact Person</div>
            <div class="field">
            <select name="contact_person" id="contact_person" class="selectionbox">
            	<option value="">Select Scientist</option>
                <?php foreach($employees as $key=>$value) { ?>
               	<option value="<?php echo $value->employee_id; ?>"><?php echo $value->employee_name; ?></option>
                <?php } ?>
            </select>
            </div>
            <div class="clear"></div>
        </div>
	</div>
    <div class="right_form" style="width:43%;">        
        <div class="form_element">
            <div class="label">Phone No</div>
            <div class="field"><input class="textbox" type="text" name="phone_number" id="implementation_area_contact_phone" value=""/></div>
            <div class="clear"></div>
        </div>
        
        <div class="form_element">
           	<div class="label">Email</div>
            <div class="field"><input class="textbox" type="text" name="email_address" id="implementation_area_email" value=""/></div>
            <div class="clear"></div>
        </div>
        
        <div class="form_element">
           	<div class="label">Sort Order</div>
            <div class="field"><input class="textbox" type="text" name="implementation_order" id="implementation_area_order" value=""/></div>
            <div class="clear"></div>
       </div> 
       
       
        <div class="form_element">
            <div class="button_panel" style="margin-right:80px;">
            	<input type="submit" name="save_implementation" id="save" value="Save" class="k-button button">
                <?php if(isset($implementation_site_id) && $implementation_site_id!=NULL) { ?>
        		<input type="submit" name="update" id="update" value="Update" class="k-button button">
                <?php } ?>
            </div>
            <div class="clear"></div>
        </div>              
    </div>
    <div class="clear"></div>
</div>
<div class="clear"></div>
</div>
</form>