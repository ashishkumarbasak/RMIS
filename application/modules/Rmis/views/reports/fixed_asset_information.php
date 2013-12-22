<script src="<?php echo site_url('/assets/js/jquery.form.js'); ?>"></script>
<script src="<?php echo site_url('/assets/js/jquery.validate.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/js/jquery.relatedselects.js'); ?>"></script>
<div id="page-content" class="clearfix">
  <div class="page-header position-relative">
    <h1>Asset Wise List</h1>
  </div>
  <form action="<?php echo site_url('/Rmis/Rptfixedassetinformtion/getReportExport'); ?>" method="post" id="reportForm">
    <div class="row-fluid">
      <div class="span12">
        <div class="btn-toolbar">
          <div class="btn-group pull-right opt">
            <label class="inline">
              <input name="format" type="radio" id="pdfformat" value="pdf" checked="checked">
              <span class="lbl"> PDF &nbsp;</span> </label>
            <label class="inline">
              <input type="radio" value="xls" name="format" id="xlsformat">
              <span class="lbl"> XLS &nbsp;</span> </label>
            <label class="inline">
              <input type="radio" value="html" name="format" id="format">
              <span class="lbl  "> HTML &nbsp;</span> </label>
            <a class="btn btn-small btn-primary" id="btnPreview" href="#"><i class="icon-picture bigger-120"></i> Preview</a> <a class="btn btn-small btn-primary" id="btnExport" href="#"><i class="icon-download-alt bigger-120"></i> Export</a> </div>
        </div>
      </div>
    </div>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-header">
            <h4>Report Parameters</h4>
            <span class="widget-toolbar"> <a data-action="collapse" href="#"> <i class="icon-chevron-up"></i> </a> </span> </div>
          <div class="widget-body">
            <div class="widget-body-inner " style="display: block;">
              <div class="widget-main">
                <div class="container-fluid">
                 
                    <div class="row-fluid">
                     <div class="span3">
                        <div class="row-fluid">
                            <label for="form-field-8">Name Of Store<span class="red">*</span></label>
                            <select name="store_name" id="store_name">
                                <option value="">Select</option>
                                <?php foreach ($storeName as $item)
                                { ?>
                                    <option value="<?php echo $item['value']; ?>" <?php if($item['value'] == $adjustment_info['name_of_store']){?> selected="selected" <?php } ?>> <?php echo $item['text']; ?></option>;

                                <?php }
                                ?>
                            </select>
                        </div>
                    </div>
                        
                     <div class="span3">
                        <div class="row-fluid">
                            <label for="group_id">Group</label>
                            <select name="group_id" id="group_id">
                                <option value="">select</option>
                                <?php foreach ($grooups as $item)
                                {
                                    ?>
                                    <option value="<?php echo $item['value']; ?>" <?php if ($item['value'] == $fixedAssetInfo['group_id'])
                                { ?> selected="selected" <?php } ?>> <?php echo $item['text']; ?></option>;

                                <?php }
                                ?>
                            </select>
                        </div>
                    </div>
                     <div class="span3">
                        <div class="row-fluid">
                            <label for="sub_group_id">Sub Group</label>
                            <select name="sub_group_id" id="sub_group_id">
                                <option value="">select</option>
                                <?php foreach ($subGrooups['data'] as $item)
                                {
                                    ?>
                                                                <option value="<?php echo $item['value']; ?>" <?php if ($item['value'] == $fixedAssetInfo['sub_group_id'])
                                    { ?> selected="selected" <?php } ?>> <?php echo $item['text']; ?></option>;

                                <?php }
                                ?>
                            </select>
                        </div>
                    </div>
                     <div class="span3">
                        <div class="row-fluid">
                            <label for="sub_group_ifsdfd">Project Name</label>
                            <select name="project_name" id="project_name">
                            <option value="">Select</option>
                                <?php foreach ($projectName as $item)
                                {
                                    ?>
                             <option value="<?php echo $item['value']; ?>" > <?php echo $item['text']; ?></option>;

                                <?php }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                    
                    <div class="row-fluid">
                     <div class="span3">
                         <div class="row-fluid">
                             <label for="form-field-8">Date From</label>
                            <?php
                            //$dt = date_formate($fixedAssetInfo['date_from'], 'Y-m-d', 'd-m-Y');
                            //echo $fixedAssetInfo['date_of_indent'];
                            $datePicker = new \Kendo\UI\DatePicker('date_from');
                            $datePicker->attr('style', 'width: 165px');
                            $datePicker->format('dd-MM-yyyy');
                            $datePicker->value($dt);
                            echo $datePicker->render();
                            ?>
                             
                         </div>
                     </div>
                     <div class="span3">
                         <div class="row-fluid">
                              <label for="asdf">Date To</label>
                            <?php
                                //$dt = date_formate($fixedAssetInfo['date_to'], 'Y-m-d', 'd-m-Y');
                                $datePicker = new \Kendo\UI\DatePicker('date_to');
                                $datePicker->attr('style', 'width: 165px');
                                $datePicker->format('dd-MM-yyyy');
                                $datePicker->value($dt);
                                echo $datePicker->render();
                            ?>
                         </div>
                     </div>
                    </div>
                    
                    
                    
                    
                  <div class="span3">
                    <div id="progressouter"> </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
  <div class="row-fluid">
    <hr style="border-width: 3px 0; margin: 5px 0;"/>
    <div class="slim-scroll" data-height="540">
      <div id="report_content" align="center" > 
        <!--empty--> 
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
 $(document).ready(function() {
        $("#reportForm").relatedSelects({
            onChangeLoad: '<?php echo site_url('/Rmis/Itemsetup/getSubGroupByGroup/') ?>',
            loadingMessage: 'Please wait',
            selects: ['group_id', 'sub_group_id']
        });

 });
 
   
/*$(function() {
	
	 
		
		
	$('.slim-scroll').each(function () {
		var $this = $(this);
		$this.slimScroll({
			height: $this.data('height') || 100,
			railVisible:true
		});
	});
});*/


$(function() {

	var format=  $('input[name=format]:checked', '#reportForm').val();
	if(format == 'html'){
		$("#btnExport").attr("disabled", true);
	} else {
		$("#btnExport").attr("disabled", false);
	}
	
	
	$( 'input[name="format"]:radio' ).click(
			function(){
				var format=  $('input[name=format]:checked', '#reportForm').val();
				if(format == 'html'){
					$("#btnExport").attr("disabled", true);
				}else{
					$("#btnExport").attr("disabled", false);
				}
			}
		); 


	
	jQuery("#reportForm").validate({
			rules: {
					employeeid: {
						required: true
					},
					hremp_id: {
						required: true
					},	
					process_month: {
						required: true
					},
					signatory_1: {
						required: true						
					},										 
					signatory_2: {
						required: true
					}					
				},
				messages: {
					employeeid: {
						required: "Select a employee/govt. id"
					},
					hremp_id: {
						required: "Select employee/govt. id"
					},
					process_month: {
						required: "Select process month."
					},						
					signatory_1: {
						required: "Provide signatory 1 title" 
					},
					signatory_2: {
						required: "Provide signatory 2 title" 
					} 				
				}
		});
	
	var options = {
		type: 'POST',
		url:  "<?php echo site_url('/Rmis/Rptfixedassetinformtion/getReport'); ?>", 
		async: false,			
		beforeSubmit: function() {
				$("#progressouter").append("<div id='divAjaxLoading'>Please wait. Generating Report ...</div>");
			},
		success: function(data) {
					$("#progressouter").empty();
					$('#report_content').html(data);	
			}
	};
	  
	$("#btnPreview").click(function() {
		if($("#reportForm").valid()) {
			$("#reportForm").ajaxSubmit(options);
		}
	});
	
	$("#btnExport").click(function() {
		if($("#reportForm").valid()) {
			var format=  $('input[name=format]:checked', '#reportForm').val();
			if(format != 'html'){
				$("#reportForm").submit();
			}
		}
	});

	
});	
</script> 
