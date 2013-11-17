<script src="<?php echo site_url('/assets/js/jquery-dynamic-form.js'); ?>"></script>
<script src="<?php echo site_url('/assets/js/jquery.form.js'); ?>"></script>
<script src="<?php echo site_url('/assets/js/jquery.validate.min.js'); ?>"></script>
<br />
<?php 
	if($mode == 'EDIT') {
		 $actionUrl = site_url('/rmis/Indentlist/update');
	} else {
		 $actionUrl = site_url('/rmis/Indentlist/create');
	}
?>
<form class="form-horizontal cmxform" action="<?php echo $actionUrl; ?>" method="post" id="frmHouseRentPolicy">
  <input type="hidden" name="id" id="id" value="5<?php //echo $indent_info['id']; ?>"  />
  <div class="container-fluid">
    <fieldset>
                
                <div class="row-fluid">
                    <div class="span4">
                        <div class="row-fluid">
                            <label for="form-field-8">Name Of Store<span class="red">*</span></label>
                            <select name="store_name" id="store_name">
                                <option value="">Select</option>
                                <?php foreach ($storeName['data'] as $item)
                                { ?>
                                    <option value="<?php echo $item['value']; ?>" <?php if($item['value'] == $indent_info['name_of_store']){?> selected="selected" <?php } ?>> <?php echo $item['text']; ?></option>;

                                <?php }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="row-fluid">
                            <label for="form-field-8">Financial Year<span class="red">*</span></label>
                            <select name="financial_year" id="financial_year">
                                <option value="">select</option>
                                <?php foreach ($financialYear['data'] as $item)
                                { ?>
                                    <option value="<?php echo $item['value']; ?>" <?php if($item['value'] == $indent_info['financial_year']){?> selected="selected" <?php } ?>> <?php echo $item['text']; ?></option>;

                                <?php }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="row-fluid">
                            <label for="form-field-8">Indent Reference No<span class="red">*</span></label>
                            <input type="text" name="indent_ref_no" value="<?php echo $indent_info['indent_ref_no']; ?>" id="indent_ref_no"/>
                        </div>
                    </div>
                </div>
                
                
                <div class="row-fluid">
                    <div class="span4">
                        <div class="row-fluid">
                            <label for="form-field-8">Project Name</label>
                            <select name="project_name" id="project_name">
                                <option value="">Select</option>
                                <?php foreach ($projectName['data'] as $item)
                                { ?>
                                    <option value="<?php echo $item['value']; ?>" <?php if($item['value'] == $indent_info['project_name']){?> selected="selected" <?php } ?>> <?php echo $item['text']; ?></option>;

                                <?php }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="row-fluid">
                            <?php echo $emp_window; ?>
                        <label>Indent To</label>
                        <span class="input-append">
                            <input type="hidden" name="indent_to" id="employee_id" value="3<?php echo $indent_info['indent_to']; ?>" />
                            <button class="btn btn-info" name="btnPopub" id="btnPopub" type="button"> <i class="icon-search"></i> </button>
                            <input name="employee_name" type="text" class="employeeid span9" id="employee_name2" tabindex="7"  maxlength="40" value="5<?php //echo $indent_info['indent_to_name']; ?>" readonly="readonly">
                        </span>
                            
                            
                            
                            
                            
                        </div>
                    </div>
                    <div class="span4">
                        <div class="row-fluid">
                            <label for="form-field-8">Date of Indent<span class="red">*</span></label>
                        
                        <?php 
                        //$dt = date_formate($indent_info['date_of_indent'], 'Y-m-d', 'd-m-Y');
                            $datePicker = new \Kendo\UI\DatePicker('date_of_indent');
                            $datePicker->attr('style', 'width: 165px');
                            $datePicker->format('dd-MM-yyyy');
                            $datePicker->value($dt);  
                            echo $datePicker->render();
                                ?>
                        </div>
                    </div>
                </div>
                
                
                <div class="row-fluid">
                    <div class="span4">
                        <div class="row-fluid">
                            <label for="form-field-8">Requested by<span class="red">*</span></label>
                            <select name="requested_by" id="requested_by">
                                <option value="">Select</option>
                                <?php foreach ($employees['data'] as $item)
                                { ?>
                                    <option value="<?php echo $item['value']; ?>" <?php if($item['value'] == $indent_info['indent_request_by']){?> selected="selected" <?php } ?>> <?php echo $item['text']; ?></option>;

                                <?php }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="row-fluid">
                            <label for="form-field-8">Remarks</label>
                             <textarea name="remarks" id="remarks" tabindex="9"><?php echo  $indent_info['remarks']; ?></textarea>
                        </div>
                    </div>
                </div>
            </fieldset>
  </div>
  <br />
  <br />
  <div class="row-fluid">
    <div class="widget-toolbox padding-4 clearfix">
      <div class="btn-group pull-right">
        <input name="btnId" id="btnId" type="hidden" value="" />
         <button class="btn btn-small btn-primary" id="btnSaveMore" name="SaveMore" type="button" > <i class="icon-refresh bigger-125"></i> Save &amp; Add More </button>
        <button class="btn btn-small btn-primary" id="btnSave" name="Save" type="button" > <i class="icon-save bigger-125"></i> Save </button>
        <button class="btn btn-small btn-primary" id="btnCancel" type="button"> <i class="icon-remove bigger-125"></i> Cancel </button>
      </div>
    </div>
  </div>
</form>
<script type="application/javascript"> 
$(function() {

  $("#btnPopub").click(function() {
    $("#emp_window").data("kendoWindow").center().open();
    });
	
		$("#policyRent").dynamicForm("#plus6", "#minus6", {limit:20, createColor:"red"});
		
		$(".remove-row").click(function(e) {
            $($(this).closest("tr")).remove();
			return false;
        });
		
	
		jQuery("#frmHouseRentPolicy").validate({
			rules: {					 
					store_name: {
						required: true						
					},										 
					financial_year: {
						required: true,
					 	}			
				},
				messages: {					
					store_name: {
						required: "Select Store."
					},						
					financial_year: {
						required: "Please Select Financial Year",
					}				
				}
		});	
		
		var options = {
			type: 'POST',
			async: false,			
			beforeSubmit: function() {},
			success: function(data) {
						onMessage(data);//notify alert call	
						 if(data == 1) {
                                   $.ajax({
									type: "POST",
									url: "/rmis/Indentlist/listview",
									cache: false
									}).done(function( html ) {
									$("#list_view").html(html);
								});
																
								$('#frmHouseRentPolicy').clearForm();
                                                        }
						else if(data == 2) {														
							$("#window").data("kendoWindow").close();	
						    location.reload();
						}						 				 
	                 }
    	    };	
		
		$('#btnCancel').click( function(){
			$("#window").data("kendoWindow").close();
                        location.reload();
                        
		});
		
		$('#btnSave').click( function(){			
			if($("#frmHouseRentPolicy").valid())
			{
				$("#btnId").val('btnSave');
				$("#frmHouseRentPolicy").ajaxSubmit(options);
			}								
		});
                
                $('#btnSaveMore').click( function(){			
                        $("#btnId").val('btnSaveMore');	
                        $("#frmHouseRentPolicy").ajaxSubmit(options);
                });
			   
	});
        
    function onChange(e) {	   

        var emp_id = $('#emp_window .k-state-selected').find('td:eq(0)').text();
        var employeeid = $('#emp_window .k-state-selected').find('td:eq(1)').text();
        var fullname = $('#emp_window .k-state-selected').find('td:eq(2)').text();
        var desc = $('#emp_window .k-state-selected').find('td:eq(3)').text();
        var doj = $('#emp_window .k-state-selected').find('td:eq(6)').text();

        $("#employee_id").val(emp_id);
        $("#employeeid").val(employeeid);
        $("#employee_name").val(fullname);
        $("#employee_name2").val(fullname);
        $("#emp_window").data("kendoWindow").close();
    }  

</script>