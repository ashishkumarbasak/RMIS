<!-- content-body -->
<div class="content-body">    
    <div class="row-fluid">
        <?php echo $template['partials']['divInfoForm']; ?>
        <div style="margin:15px;">
        	<div class="row-fluid">
           		<?php //echo $grid_data; ?>
           		<div id="result"></div>
        	</div>
       	</div>
    </div> 
</div><!--/content-body -->
<div style="height:10px;"></div>
<script id="popup_editor" type="text/x-kendo-template">
</script>
<script>
    function ClickEdit(e) {
        e.preventDefault();
        var dataItem = this.dataItem($(e.currentTarget).closest("tr"));
        var edit_url = "/Rmis/Setup/Divisions/edit/"+dataItem.id;
        window.location = edit_url;
    }
</script>