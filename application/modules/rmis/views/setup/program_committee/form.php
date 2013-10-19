<script src="<?php echo site_url('/assets/js/jquery-dynamic-form.js'); ?>"></script>
<script src="<?php echo site_url('/assets/js/bootstrap-datepicker.js'); ?>"></script>
<link rel="stylesheet" href="<?php echo site_url('assets/extensive/css/datepicker.css'); ?>" />

<?php 
	if(isset($committee_detail)){
		$committee_detail = unserialize($committee_detail);
	} 
	if(isset($committee_members)){
		$committee_members = unserialize($committee_members);
	}
?>
<form name="frm_division" id="frm_division" method="post" action="">
<div class="main_form">
	<div class="left_form">
        <div class="form_element">
            <div class="label">Chairman of the Committee <span class="mandatory">*</span></div>
            <div class="field"><input class="textbox" type="text" name="committee_chairman" id="committe_chairman" value="<?php if($committee_detail) echo $committee_detail->employee_name; ?>" style="margin-left: 10px;"/></div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="right_form">
    	<div class="form_element">
            <div class="label">Committe Formation Date <span class="mandatory">*</span></div>
            <div class="field"><input class="textbox disabled" readonly="readonly" type="text" name="committee_formation_date" id="committee_formation_date" data-date-format="yyyy-mm-dd"  value="<?php if($committee_detail) echo $committee_detail->committee_formation_date; ?>"/></div>
            <div class="clear"></div>
        </div>
    </div>    
    <div class="clear"></div>
    <div class="gap"></div>
    <div class="form">
    	<div class="form_element">
            <div class="label">Committe Member</div>
            <div class="clear"></div>
        </div>
    	<div class="row">
    		<div class="grid-1-3 left">
        		<div class="heading">Member Name</div>
    		</div>
    		<div class="grid-1-3 left">
        		<div class="heading">Designation</div>
    		</div>
    		<div class="grid-1-3 left">
        		<div class="heading">Role in Committee</div>
    		</div>
    		<div class="clear"></div>
    	</div>
    	
    	<?php if(isset($committee_members) && $committee_members!=NULL) { 
    			foreach($committee_members as $key=>$member){
    	?>
    			<div id="row-<?php echo $key; ?>">
    			<div class="row">
			    	<div class="grid-1-3 left">
			        	<input class="textbox no-margin width-89" type="text" name="committe_member_names[]" id="committe_member_names" value="<?php echo $member->employee_name; ?>"/>
			    	</div>
			    	<div class="grid-1-3 left">
			        	<input class="textbox no-margin width-89" type="text" name="committe_member_designations[]" id="committe_member_designations" value="<?php echo $member->designation; ?>"/>
			    	</div>
			    	<div class="grid-1-3 left">
			        	<input class="textbox no-margin width-89" type="text" name="committe_member_roles[]" id="committe_member_roles" value="<?php echo $member->role_in_committee; ?>"/>	
			    	</div>
			    </div>
			    <div class="row add-more"><a href="javascript:void(0);" onclick="delete_committee_member(<?php echo $member->committee_id;?> , <?php echo $member->member_id; ?>, <?php echo $key; ?> );">[-]</a></div>
			    </div>
    	<?php				
    			}
    	 	  } 
    	 ?>	
    	<div id='duplicate2'>
    	<div class="row">
	    	<div class="grid-1-3 left">
	        	<input class="textbox no-margin width-89" type="text" name="committe_member_names[]" id="committe_member_names" value=""/>
	    	</div>
	    	<div class="grid-1-3 left">
	        	<input class="textbox no-margin width-89" type="text" name="committe_member_designations[]" id="committe_member_designations" value=""/>
	    	</div>
	    	<div class="grid-1-3 left">
	        	<input class="textbox no-margin width-89" type="text" name="committe_member_roles[]" id="committe_member_roles" value=""/>	
	    	</div>
	    </div>
	    <div class="row add-more"><a id="minus2" href="">[-]</a> <a id="plus2" href="">[+]</a></div>
    	</div>
    </div>
    
    <div class="clear"></div>
    <div class="gap"></div>
    
    <div class="form_element">
    	<div class="button_panel" style="margin-right:125px;">
        	<?php if(isset($committee_detail) && $committee_detail->id!=NULL) { ?>
                <input type="hidden" name="id" id="id" value="<?php echo $committee_detail->committee_id; ?>">
                <input type="submit" name="delete_committee" id="delete_committee" value="Delete" class="k-button button">
        		<input type="submit" name="save_update" id="save_update" value="Update" class="k-button button">
            <?php } else { ?>
                <input type="submit" name="save_program_committee" id="save_program_committee" value="Save" class="k-button button">
            <?php } ?>
        </div>
        <div class="clear"></div>
    </div>
</div>
</form>
<script type="text/javascript">
$(document).ready(function() {
	$("#duplicate2").dynamicForm("#plus2", "#minus2", {limit:10});		
	return false;
});
</script>
<script type="text/javascript">
	$('#committee_formation_date').datepicker('setStartDate');
</script>
<script type="text/javascript">
	function delete_committee_member(committee_id, member_id, row_id){
		var r=confirm("Are you sure you want to delete this member?");
		if (r==true){
		  	var jqxhr = $.post( "<?php echo site_url("rmis/setup/programCommittees/deleteMember"); ?>", { committee_id: committee_id, member_id: member_id }, function() {
			  $("#row-" + parseInt(row_id)).remove();
			})
			.fail(function() {
				alert( "error" );
			})
		}
	}
</script>