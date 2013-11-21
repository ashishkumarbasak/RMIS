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
            <div class="field"><input class="textbox no-margin" type="text" name="division_name" id="division_name" value="<?php if($division_detail) echo $division_detail->division_name; ?>"/></div>
            <div class="clear small-gap"></div>
        </div>
        
        <div class="form_element">
            <div class="label">Head of Division <span class="mandatory">*</span></div>
            <div class="field">
            	<input class="textbox no-margin" type="text" name="division_head_name" id="division_head_name" value="<?php if($division_detail) echo $division_detail->employee_name; ?>"/>
            	<input type="hidden" name="division_head" id="division_head" value="<?php if($division_detail) echo $division_detail->employee_id; ?>">
            	<input type="hidden" name="employee_id" id="employee_id" value="<?php if($division_detail) echo $division_detail->employee_id; ?>">
            	<div for="division_head_name" class="error display-none"></div>
            </div>
            <div class="clear small-gap"></div>
        </div>
        
        <div class="form_element">
            <div class="label">Phone No</div>
            <div class="field"><input class="textbox" type="text" name="division_phone" id="division_phone" value="<?php if($division_detail) echo $division_detail->division_phone; ?>"/></div>
            <div class="clear"></div>
        </div>
        
        <div class="form_element">
           	<div class="label">Email</div>
            <div class="field"><input class="textbox no-margin" type="text" name="division_email" id="division_email" value="<?php if($division_detail) echo $division_detail->division_email; ?>"/></div>
            <div class="clear small-gap"></div>
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
                <?php if(isset($division_detail) && $division_detail->division_pk!=NULL) { ?>
                	<input type="hidden" name="id" id="id" value="<?php echo $division_detail->division_pk; ?>">
                	<input type="button" name="new_division" id="new_division" value="New" class="k-button button" onclick="javascript:window.location='<?php echo site_url('rmis/setup/divisions');?>'">
                    <input type="submit" name="delete_division" id="delete_division" value="Delete" class="k-button button" onclick="return confirm('Are you sure you want to delete this record?');">
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
<script type="text/javascript">
$(document).ready(function() {
	var division_head_select;
	$("#division_head_name").kendoAutoComplete({
        	dataTextField: "employee_name",
            filter: "startswith",
            minLength: 2,
            ignoreCase: false,
            dataSource: {
                         	type: "jsonp",
                            serverFiltering: true,
                            serverPaging: false,
                            pageSize: 20,
                            transport: {
                                read: "<?php echo site_url('rmis/employees2'); ?>"
                            }
                       },
           	open: function(e) {
		    	division_head_select = false;
		  	},
		  	select: function(e){
		    	division_head_select = true;
			    var dataItem = this.dataItem(e.item.index());                
        		$("#employee_id").val(dataItem.employee_id);
        		$("#division_head").val(dataItem.employee_id);
        		
		  	},
		  	close: function(e){
		    	// if no valid selection - clear input
		    	if (!division_head_select) this.value('');
		  	}
    });
});
</script>
<style type="text/css">
	.field .k-autocomplete{ border-radius:0px !important; width:215px !important;} 
</style>