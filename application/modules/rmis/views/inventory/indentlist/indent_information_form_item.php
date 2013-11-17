<div class="main-form">
<div class="row-fluid">
  	<div style="padding-bottom:5px;">
		<div id="external_resource_form_content"></div>
    </div>
</div>
        
<div class="row-fluid">
  	<div style="padding-bottom:5px;">
 	<a class="btn" id="btnAddExternalResource"><i class="icon-plus-sign"></i>Add New</a>
 	</div>
</div>
 <?php echo $external_resource_data; ?>
</div>
<script type="text/javascript">
$("#btnAddExternalResource").click(function(){
	
	$.ajax({
		type: "POST",
		url: "/rmis/Indentlist/addItemToIndent/"+$("#hID").val(),
		cache: false
		}).done(function( html ) {
		$("#external_resource_form_content").html(html);
	});
}); 
</script>

