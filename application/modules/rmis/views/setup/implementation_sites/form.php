<?php 
	if(isset($implementation_detail)){
    	$implementation_detail = unserialize($implementation_detail);
    } 
?>
<form name="" id="" method="post" action="">
<div class="main_form" style="">
	<div class="left_form" style="width:55%;">    	
        <div class="form_element">
            <div class="label">Implementation Site/Area Id <span class="mandatory">*</span></div>
            <div class="field">
            <input class="textbox disabled" type="text" name="implementation_site_id" id="implementation_site_id" value="<?php if($implementation_detail) echo $implementation_detail->implementation_site_id; else echo $newImplSiteID; ?>" readonly="readonly" /></div>
            <div class="clear"></div>
        </div>
        
        <div class="form_element">
            <div class="label">Implementation Site/Area <span class="mandatory">*</span></div>
            <div class="field"><input class="textbox" type="text" name="implementation_site_name" id="implementation_site_name" value="<?php if($implementation_detail) echo $implementation_detail->implementation_site_name; ?>"/></div>
            <div class="clear"></div>
        </div>
        
        <div class="form_element">
            <div class="label">Contact Person</div>
            <div class="field">
            <select name="contact_person" id="contact_person" class="selectionbox">
            	<option value="">Select Scientist</option>
                <?php foreach($employees as $key=>$value) { ?>
               	<option value="<?php echo $value->employee_id; ?>" <?php if(isset($implementation_detail) && $implementation_detail->contact_person==$value->employee_id) { ?> selected <?php } ?> ><?php echo $value->employee_name; ?></option>
                <?php } ?>
            </select>
            </div>
            <div class="clear"></div>
        </div>
	</div>
    <div class="right_form" style="width:43%;">        
        <div class="form_element">
            <div class="label">Phone No</div>
            <div class="field"><input class="textbox" type="text" name="phone_number" id="phone_number" value="<?php if($implementation_detail) echo $implementation_detail->phone_number; ?>"/></div>
            <div class="clear"></div>
        </div>
        
        <div class="form_element">
           	<div class="label">Email</div>
            <div class="field"><input class="textbox" type="text" name="email_address" id="email_address" value="<?php if($implementation_detail) echo $implementation_detail->email_address; ?>"/></div>
            <div class="clear"></div>
        </div>
        
        <div class="form_element">
           	<div class="label">Sort Order</div>
            <div class="field"><input class="textbox" type="text" name="implementation_order" id="implementation_order" value="<?php if($implementation_detail) echo $implementation_detail->implementation_order; ?>"/></div>
            <div class="clear"></div>
       </div> 
       
       
        <div class="form_element">
            <div class="button_panel" style="margin-right:80px;">
            	<?php if(isset($implementation_detail) && $implementation_detail->implementation_site_id!=NULL) { ?>
                	<input type="hidden" name="id" id="id" value="<?php echo $implementation_detail->id; ?>">
        			<input type="submit" name="save_update" id="save_update" value="Update" class="k-button button">
                <?php } else { ?>
                	<input type="submit" name="save_implementation" id="save" value="Save" class="k-button button">
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