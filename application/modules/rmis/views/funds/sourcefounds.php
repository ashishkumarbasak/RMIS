<div class="content-header">
  <h2>
  	<i <?php echo $content_header_icon; ?>></i> 
  	<?php echo $content_header_title; ?>
  </h2>
</div>

<!-- content-breadcrumb -->
<div class="content-breadcrumb"> 
  <?php echo $breadcrumb; ?>
</div>
<!-- /content-breadcrumb --> 



<!-- content-body -->
<div class="content-body">    
    <div class="row-fluid">
		<!-- <h3 >All Information</h3>-->
        <div class="row-fluid">
           <?php echo $grid_data; ?>
        </div>
    </div> 
</div><!--/content-body -->

<script>   
var fundTypeDataSource = [
        { "fund_type": "Revenue" },
        { "fund_type": "Development" },
        { "fund_type": "Donor" }
    ];
    
    function fundTypeFilter(element) {
        element.kendoDropDownList({
            dataSource: fundTypeDataSource,
            dataTextField: "fund_type",
            dataValueField: "fund_type",
            optionLabel: "--Select Value--"
        });
    }

    function sourceFundFilter(element) {
        element.kendoAutoComplete({
            dataSource: {
                transport: {
                    read: {
                        url:'http://localhost:8080/tms/funds/dataRead',
                        type: "POST"
                    }
                },
                schema: {
                    data: "data"
                }
            },
            dataTextField: "source_fund",
            dataValueField: "source_fund",
            optionLabel: "--Select Value--"
        });
    }    
</script>

<script id="popup_editor" type="text/x-kendo-template">
	<div class="k-edit-label">
        <label for="fund_type">Fund Type</label>
    </div>
    
    <input type="text" id="fund_type" class="k-input k-textbox"
                data-bind="value:fund_type"
                data-value-field="fund_type"
                data-text-field="fund_type"
                data-source="fundTypeDataSource"
                data-role="dropdownlist" />
    
		<!--/content-body    <select id="fund_type" name="fund_type" data-bind="value:fund_type" data-role="dropdownlist">
        <option value="Revenue">Revenue</option>
        <option value="Development">Development</option>
		<option value="Donor">Donor</option>
    </select> -->
	
	<div class="k-edit-label">
        <label for="source_fund" class="required">Source of Fund</label>
    </div>
    <input type="text" class="k-input k-textbox"required validationMessage="Please enter Source of Fund"  name="source_fund" data-bind="value:source_fund">

		
		<div class="k-edit-label">
            <label for="description">Description</label>
        </div>
        <textarea id="description" rows="6" cols="30" data-bind="value:description"></textarea>
		
		<div class="k-edit-label">
        <label for="is_active">Status</label>
    </div>
    
	<div class="k-edit-field" data-container-for="is_active">
	<input type="checkbox" name="Status" data-type="boolean" data-bind="checked:is_active"></div>
			
</script>