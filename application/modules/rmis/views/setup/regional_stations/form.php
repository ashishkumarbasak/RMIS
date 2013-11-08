<?php 
	if(isset($station_detail)){
    	$station_detail = unserialize($station_detail);
    } 
?>
<form name="frm_regional_station" id="frm_regional_station" method="post" action="">
<div class="main_form" style="">
	<div class="left_form">
        <div class="form_element">
            <div class="label">Regional Station Id <span class="mandatory">*</span></div>
            <div class="field">
           
            <input class="textbox disabled" type="text" name="station_id" id="station_id" value="<?php if($station_detail) echo $station_detail->station_id; else echo $newStationID; ?>" readonly="readonly" /></div>
            <div class="clear"></div>
        </div>
        
        <div class="form_element">
            <div class="label">Regional Station Name <span class="mandatory">*</span></div>
            <div class="field"><input class="textbox no-margin" type="text" name="station_name" id="station_name" value="<?php if($station_detail) echo $station_detail->station_name; ?>"/></div>
            <div class="clear small-gap"></div>
        </div>
        
        <div class="form_element">
            <div class="label">Contact Person </div>
            <div class="field"><input class="textbox" type="text" name="station_contact_person" id="station_contact_person" value="<?php if($station_detail) echo $station_detail->station_contact_person; ?>"/></div>
            <div class="clear"></div>
        </div>
        
        <div class="form_element">
            <div class="label">Phone No</div>
            <div class="field"><input class="textbox" type="text" name="station_phone" id="station_phone" value="<?php if($station_detail) echo $station_detail->station_phone; ?>"/></div>
            <div class="clear"></div>
        </div>
        
        <div class="form_element">
           	<div class="label">Email</div>
            <div class="field"><input class="textbox no-margin" type="text" name="station_email" id="station_email" value="<?php if($station_detail) echo $station_detail->station_email; ?>"/></div>
            <div class="clear small-gap"></div>
        </div>
        
        <div class="form_element">
           	<div class="label">Sort Order</div>
            <div class="field"><input class="textbox" type="text" name="station_order" id="station_order" value="<?php if($station_detail) echo $station_detail->station_order; ?>"/></div>
            <div class="clear"></div>
        </div>
    
    </div>
    <div class="right_form">
    	<div class="form_element">
            <div class="label">Address/Location</div>
            <div class="field"><textarea class="textarea" name="station_address" id="station_address"><?php if($station_detail) echo $station_detail->station_address; ?></textarea></div>
            <div class="clear"></div>
        </div>
        
         <div class="form_element">
            <div class="button_panel">
            	
            	<?php if(isset($station_detail) && $station_detail->station_id!=NULL) { ?>
                	<input type="hidden" name="id" id="id" value="<?php echo $station_detail->id; ?>">
                    <input type="button" name="new_station" id="new_station" value="New" class="k-button button" onclick="javascript:window.location='<?php echo site_url('rmis/setup/regionalStations');?>'">
        			<input type="submit" name="delete_station" id="delete_station" value="Delete" class="k-button button">
        			<input type="submit" name="save_update" id="save_update" value="Update" class="k-button button">
                <?php } else { ?>
                	<input type="submit" name="save_station" id="save" value="Save" class="k-button button">
                <?php } ?>
                
            </div>
            <div class="clear"></div>
        </div>
        
    </div>
    <div class="clear"></div>
</div>
</form>