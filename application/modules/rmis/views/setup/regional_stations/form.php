<form name="" id="" method="post" action="">
<div class="main_form" style="">
	<div class="left_form">
    	
        <div class="form_element">
            <div class="label">Regional Station Id <span class="mandatory">*</span></div>
            <div class="field">
           
            <input class="textbox disabled" type="text" name="station_id" id="station_id" value="<?php echo $newStationID; ?>" readonly="readonly" /></div>
            <div class="clear"></div>
        </div>
        
        <div class="form_element">
            <div class="label">Regional Station Name <span class="mandatory">*</span></div>
            <div class="field"><input class="textbox" type="text" name="station_name" id="station_name" value=""/></div>
            <div class="clear"></div>
        </div>
        
        <div class="form_element">
            <div class="label">Contact Person </div>
            <div class="field"><input class="textbox" type="text" name="station_contact_person" id="station_contact_person" value=""/></div>
            <div class="clear"></div>
        </div>
        
        <div class="form_element">
            <div class="label">Phone No</div>
            <div class="field"><input class="textbox" type="text" name="station_phone" id="station_phone" value=""/></div>
            <div class="clear"></div>
        </div>
        
        <div class="form_element">
           	<div class="label">Email</div>
            <div class="field"><input class="textbox" type="text" name="station_email" id="station_email" value=""/></div>
            <div class="clear"></div>
        </div>
        
        <div class="form_element">
           	<div class="label">Sort Order</div>
            <div class="field"><input class="textbox" type="text" name="station_order" id="station_order" value=""/></div>
            <div class="clear"></div>
        </div>
    
    </div>
    <div class="right_form">
    	<div class="form_element">
            <div class="label">Address/Location</div>
            <div class="field"><textarea class="textarea" name="station_address" id="station_address"></textarea></div>
            <div class="clear"></div>
        </div>
        
         <div class="form_element">
            <div class="button_panel">
            	<input type="submit" name="save_station" id="save" value="Save" class="k-button button">
                <?php if(isset($station_id) && $station_id!=NULL) { ?>
        		<input type="submit" name="update" id="update" value="Update" class="k-button button">
                <?php } ?>
            </div>
            <div class="clear"></div>
        </div>
        
    </div>
    <div class="clear"></div>
</div>
</form>