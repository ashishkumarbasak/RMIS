<script src="<?php echo site_url('/assets/js/jquery.form.js'); ?>"></script>
<script src="<?php echo site_url('/assets/js/jquery.validate.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/js/jquery.relatedselects.js'); ?>"></script>

<?php $actionUrl = site_url('/rmis/Indentlist/updateDetails');?>

<form class="form-horizontal cmxform" action="<?php echo $actionUrl; ?>" method="post" id="frmIndentItemList">
    <?php if($detailsRS[0]['indent_information_setup'] = null){?>
  <input type="hidden" name="indent_information_setup" id="masterId" value="<?php echo $detailsRS[0]['indent_information_setup']; ?>"  />
  <?php }else {?>
  <input type="hidden" name="indent_information_setup" id="masterId" value="<?php echo $masterId; ?>"  />
  <?php }?>
  <input type="hidden" name="id" id="id" value="<?php echo $detailsRS[0]['id']; ?>"  />
  <div class="container-fluid">
    <fieldset>
            <div class="row-fluid">
                <div class="span4">
                    <div class="row-fluid">
                        <label for="form-field-8">Category<span class="red">*</span></label>
                        <select name="category_id" id="category_id">
                            <option value="">Select</option>
							<?php foreach ($categorys['data'] as $item){?>
                            <option value="<?php echo $item['value']; ?>" <?php if ($item['value'] == $detailsRS[0]['categoryId']){ ?> selected="selected" <?php } ?>> <?php echo $item['text']; ?></option>
							<?php }?>
                        </select>
                    </div>
                </div>
                <div class="span4">
                    <div class="row-fluid">
                        <label for="group_id">Group<span class="red">*</span></label>
                        <select name="group_id" id="group_id">
                            <option value="">select</option>
                            <?php foreach ($grooups['data'] as $item){?>
                            <option value="<?php echo $item['value']; ?>" <?php if ($item['value'] == $detailsRS[0]['groupId']){ ?> selected="selected" <?php } ?>> <?php echo $item['text']; ?></option>
                        </select>
                    </div>
                </div>
                <div class="span4">
                    <div class="row-fluid">
                        <label for="sub_group_id">Sub Group<span class="red">*</span></label>
                        <select name="sub_group_id" id="sub_group_id">
                            <option value="">select</option>
							<?php foreach ($subGrooups['data'] as $item){?>
                            <option value="<?php echo $item['value']; ?>" <?php if ($item['value'] == $detailsRS[0]['subGroupId']){ ?> selected="selected" <?php } ?>> <?php echo $item['text']; ?></option>
							<?php }?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span4">
                    <div class="row-fluid">
                        <label for="asset_name">Item Name<span class="red">*</span></label>
                        <select name="name_of_item" id="item_name">
                         	<option value="">select</option>
							<?php foreach ($itemName['data'] as $item){?>
                            <option value="<?php echo $item['value']; ?>" <?php if ($item['value'] == $detailsRS[0]['itemId']){ ?> selected="selected" <?php } ?>> <?php echo $item['text']; ?></option>
							<?php }?>
                        </select>
                    </div>
                </div>
                <div class="span4">
                    <div class="row-fluid">
                         <label for="form-field-8">Description</label>
                        <textarea name="descriptio_of_item" id="description" style="width: 210px;"><?php echo $detailsRS[0]['description']; ?></textarea>
                    </div>
                </div>
                <div class="span4">
                    <div class="row-fluid">
                        <label for="old_asset_id">Indent Quantity</label>
                        <input type="text" name="indent_quantity" value="<?php echo $detailsRS[0]['quantity']; ?>" class="number" id="indent_quantity"/>
                    </div>
                </div>
            </div>

            <div class="row-fluid">
                <div class="span4">
                    <div class="row-fluid">
                        <label for="old_asset_id">Unit Price</label>
                        <input type="text" name="unit_price" value="<?php echo $detailsRS[0]['unitPrice']?>" class="number" id="unit_price"/>
                    </div>
                </div>
            </div>
         </fieldset>
 	</div>    
  <br />
  <br />
  
  <div class="row-fluid">
    <div class="span12 form-actions btn-actions">
      <div class="pull-right">
        <input name="btnExternalResourceId" id="btnExternalResourceId" type="hidden" value="" />        
        <button class="btn btn-small btn-primary" id="btnExternalResourceSave" <?php if($external_resource[0]['id']){ ?> disabled="disabled" <?php }?> type="button"> <i class="icon-white icofont-save bigger-110"></i> Save </button>
        <button class="btn btn-small btn-primary" <?php if(!$external_resource[0]['id']){ ?> disabled="disabled" <?php }?> id="btnExternalResourceUpdate" type="button"> <i class="icon-white icon-ok bigger-110"></i> Update </button>
        <button class="btn btn-small btn-primary" id="btnExternalResourceCancel" type="button"> <i class="icon-white icon-remove bigger-125"></i> Cancel </button>
      </div>
    </div>
  </div>
</form>
<script type="text/javascript">
     $("#frmIndentItemList").relatedSelects({
            onChangeLoad: '<?php echo site_url('/rmis/Itemsetup/getGroupByCategory/') ?>',
            loadingMessage: 'Please wait',
            selects: ['category_id', 'group_id']
        });
    $(document).ready(function() {
        $("#frmIndentItemList").relatedSelects({
            onChangeLoad: '<?php echo site_url('/rmis/Itemsetup/getSubGroupByGroup/') ?>',
            loadingMessage: 'Please wait',
            selects: ['group_id', 'sub_group_id']
        });
        $("#frmIndentItemList").relatedSelects({
            onChangeLoad: '<?php echo site_url('/rmis/Itemsetup/getItemByByGroup/') ?>',
            loadingMessage: 'Please wait',
            selects: ['sub_group_id', 'item_name']
        });
    });
</script>

<script type="text/javascript">
$(document).ready(function() {
		
	$("#frmIndentItemList").validate({
		
				rules: {
					name: {
						required: true
					}
				},
				messages: {
					name: {
						required: "Please enter name"	
					}
				}
				
			}); 
	
	var options = {
			type: 'POST',
			async: false,			
			beforeSubmit: function() {},
			success: function(data) {
				if((data == 2) || (data == 3)||(data == 1) ) {
						$.ajax({
							type: "POST",
							url: "/rmis/Indentlist/addIndentItems/"+$("#hID").val(),
							cache: false
							}).done(function( html ) {
							$("#boxtab2_view").html(html);
						});
				}else {
					onMessage(data);//notify Msg
				}
			}
        };			
	
	
	$('#btnExternalResourceSave').click( function(){
			if($("#frmIndentItemList").valid())
			{
				$("#btnExternalResourceId").val('btnExternalResourceSave');
				$("#frmIndentItemList").ajaxSubmit(options);
			}
	});
	
	$("#btnExternalResourceUpdate").click(function() {
		if($("#frmIndentItemList").valid())
		{
			$("#btnExternalResourceId").val('btnExternalResourceUpdate');
			$("#frmIndentItemList").ajaxSubmit(options);
		}		
		
	});
	
	$("#btnExternalResourceCancel").click(function() {
			$.ajax({
				type: "POST",
				url: "/rmis/Indentlist/addIndentItems/"+$("#hID").val(),
				cache: false
				}).done(function( html ) {
				$("#boxtab2_view").html(html);
			});
	});
	
});	
</script> 