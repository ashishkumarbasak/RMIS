<?php 
	if(isset($implementation_detail)){
    	$implementation_detail = unserialize($implementation_detail);
    } 
?>
<form name="frm_implementation_site" id="frm_implementation_site" method="post" action="">
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
            <div class="field"><input class="textbox no-margin" type="text" name="implementation_site_name" id="implementation_site_name" value="<?php if($implementation_detail) echo $implementation_detail->implementation_site_name; ?>"/></div>
            <div class="clear small-gap"></div>
        </div>
        
        <div class="form_element">
            <div class="label">Contact Person</div>
            <div class="field">
                <input class="textbox" type="text" name="contact_person_name" id="contact_person_name" value="<?php if($implementation_detail) echo $implementation_detail->employee_name; ?>"/>
                <input type="hidden" name="contact_person" id="contact_person" value="<?php if($implementation_detail) echo $implementation_detail->employee_id; ?>">
            	<input type="hidden" name="employee_id" id="employee_id" value="<?php if($implementation_detail) echo $implementation_detail->employee_id; ?>">
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
            <div class="field"><input class="textbox no-margin" type="text" name="email_address" id="email_address" value="<?php if($implementation_detail) echo $implementation_detail->email_address; ?>"/></div>
            <div class="clear small-gap"></div>
        </div>
        
        <div class="form_element">
           	<div class="label">Sort Order</div>
            <div class="field"><input class="textbox" type="text" name="implementation_order" id="implementation_order" value="<?php if($implementation_detail) echo $implementation_detail->implementation_order; ?>"/></div>
            <div class="clear"></div>
       </div> 
       
        <div class="form_element">
            <div class="button_panel" style="margin-right:80px;">
            	<?php if(isset($implementation_detail) && $implementation_detail->implementation_pk!=NULL) { ?>
                	<input type="hidden" name="id" id="id" value="<?php echo $implementation_detail->implementation_pk; ?>">
                    <input type="button" name="new_implementation" id="new_implementation" value="New" class="k-button button" onclick="javascript:window.location='<?php echo site_url('rmis/setup/implementationSites');?>'">
                	<input type="submit" name="delete_implementation" id="delete_implementation" value="Delete" class="k-button button">
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