<div id="page-content" class="clearfix">
    <div class="page-header position-relative">
        <h1>Indent Information </h1>
    </div>

    <div class="row-fluid">
        <p>
            <?php echo $window; ?>
        <div class="btn-toolbar">
            <div class="btn-group pull-right" > <a href="#" id="btnAdd" class="btn btn-small btn-primary"><i class="icon-white icon-plus-sign"></i>Add New Indent</a> </div>
        </div>
        </p>
        <br />
        <br />  
        <?php echo $grid_data; ?>
    </div>
</div>
<!--/#page-content--> 

<script type="text/javascript">			

    $(document).ready(function() {
        $("#btnAdd").click(function() {
            var windows = $("#window").data("kendoWindow");
            windows.title("Add Indent Information");
            windows.refresh({
                url: "/rmis/Indentlist/addForm"
            });
            $("#window").data("kendoWindow").center().open();
        });
		        
        $("#btnClear").click(function() {
            $("#store_name").val("");
            $("#financial_year").val("");
            $("#employee_type_id").val("");
			 
            $.ajax({
                type: "POST",
                url: "/rmis/Indentlist",
                cache: false
            }).done(function( html ) {
				
                $("#list_view").html(html);
            });
		
        });
		
        
        $('#btnSearch').click( function(){			
			if($("#frmindentinformation").valid())
			{
				$("#btnId").val('btnSave');
				$("#frmindentinformation").ajaxSubmit();
			}								
		});
	
       	
    });			


</script> 

<script>
    function commandClick(e) {
         var dataItem = this.dataItem($(e.currentTarget).closest("tr"));
         var windows = $("#window").data("kendoWindow");
            windows.title("Add Indent Information");
            windows.refresh({
                url: '/rmis/Indentlist/addFormForApprove/' + dataItem.id
            });
            $("#window").data("kendoWindow").center().open();
    }
</script>

<script id="details" type="text/x-kendo-template">
    <?php
    $transport = new \Kendo\Data\DataSourceTransport();

    $read = new \Kendo\Data\DataSourceTransportRead();
    $read->url(site_url('rmis/Indentlist/readDetails'))
            ->contentType('application/json')
            ->type('POST');

    $update = new \Kendo\Data\DataSourceTransportUpdate();
    $update->url(site_url('rmis/Indentlist/updateDetails'))
            ->contentType('application/json')
            ->type('POST');

    $destroy = new \Kendo\Data\DataSourceTransportDestroy();
    $destroy->url(site_url('rmis/Indentlist/destroyDetails'))
            ->contentType('application/json')
            ->type('POST');


    $transport->read($read)
            ->update($update)
            ->destroy($destroy)
            ->parameterMap('function(data) {
	                return kendo.stringify(data);
              }');

    $model = new \Kendo\Data\DataSourceSchemaModel();

    $salaryScaleDetailsIDField = new \Kendo\Data\DataSourceSchemaModelField('id');
    $salaryScaleDetailsIDField->type('number')
            ->editable(true)
            ->nullable(true);

    $model->id('id')
            ->addField($salaryScaleDetailsIDField);

    $schema = new \Kendo\Data\DataSourceSchema();
    $schema->data('data')
            ->errors('errors')
            ->model($model)
            ->total('total');

    $dataSource = new \Kendo\Data\DataSource();

    $filter = new \Kendo\Data\DataSourceFilterItem();
    $filter->field('indent_information_setup')
            ->operator('eq')
            ->value('#=id#');

    $dataSource->transport($transport)
            ->batch(false)
            ->pageSize(15)
            ->schema($schema)
            ->addFilterItem($filter)
            ->serverPaging(true)
            ->serverFiltering(true)
            ->serverSorting(true);

    $detailGrid = new \Kendo\UI\Grid('detailGrid#=id#');

    $itemName = $this->kds->read('imis_inventory_item_setup', array('id as value', 'item_name as text'));
    $pre = array('value' => '', 'text' => '-Select-');
    array_unshift($itemName['data'], $pre);


    $itemNamecol = new \Kendo\UI\GridColumn();
    $itemNamecol->field('name_of_item')
            ->filterable(false)
            ->values($itemName['data'])
            ->title('Item Name*');

    $descriptioncol = new \Kendo\UI\GridColumn();
    $descriptioncol->field('descriptio_of_item')
            ->title('Description');

    $quantitycol = new \Kendo\UI\GridColumn();
    $quantitycol->field('indent_quantity')
            ->title('Indent Quantity*');

    $uom = new \Kendo\UI\GridColumn();
    $uom->field('UOM')
            ->title('UOM*');

    $unitPrice = new \Kendo\UI\GridColumn();
    $unitPrice->field('unit_price')
            ->title('Unit Price*');

    $command = new \Kendo\UI\GridColumn();
    $command->addCommandItem('edit')
            ->addCommandItem('destroy')
            ->title('&nbsp;')
            ->width(185);

    $detailGrid->dataSource($dataSource)
            ->addColumn($itemNamecol, $descriptioncol, $quantitycol, $uom, $unitPrice)
            ->pageable(true)
            ->sortable(true)
            ->editable('inline')
            ->scrollable(false);

    echo $detailGrid->renderInTemplate();
    ?>

</script> 


<script type="application/javascript">
    function commandEdit(e) {		 		
    e.preventDefault();				
    var vgrid = $("#grid").data("kendoGrid");
    var selectedItem = vgrid.dataItem(vgrid.select());	     
    var windows = $("#window").data("kendoWindow");

    windows.title("Indent Information");
    windows.refresh({
    url: "/rmis/Indentlist/addForm/"+selectedItem.id
    });

    $("#window").data("kendoWindow").center().open();		
    }    

</script> 
