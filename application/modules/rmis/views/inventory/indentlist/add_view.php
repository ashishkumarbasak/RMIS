<input name="hID" id="hID" type="hidden" value="<?php echo $id; ?>" />
<div class="box-tab corner-all">
  <div class="box-header corner-top">
    <ul id="myTab"  style="display:none" class="nav nav-tabs element1">
      
      <!--tab menus disabled-->
      <li class="active"><a href="#boxtab-1" data-toggle="tab">Indent Information</a></li>
      <li class=""><a href="#boxtab-2" data-toggle="tab">Add Item to Indent</a> </li>
      
      <!--/tab menus-->
    </ul>
    
    <ul id="myTab"  class="nav nav-tabs element2">
      <li class="active"><a href="#boxtab-1" data-toggle="tab">Indent Information</a></li>
      <li class="disabled"><a >Add Item to Indent</a> </li>
      
    </ul>
    
  </div>
  <div class="box-body"> 
    <!-- widgets-tab-body -->
    <div class="tab-content">
      <div id="boxtab-1" class="tab-pane fade active in">
      	<div id="boxtab1_view"></div>
      </div>
      <div id="boxtab-2" class="tab-pane fade">
        <div id="boxtab2_view"></div>
      </div>
      
    </div>
    <!--/widgets-tab-body--> 
  </div>
</div>
<script>
$(document).ready(function () {
	if($("#hID").val()){
		$('.element1').show();
		$('.element2').hide();
	}else{
		$('.element2').show();
		$('.element1').hide();
	}
	$.ajax({
		type: "POST",
		url: "/rmis/Indentlist/addIndentMaster/"+$("#hID").val(),
		cache: false
		}).done(function( html ) {
		$("#boxtab1_view").html(html);
	});
	
    $('#myTab a[href="#boxtab-1"]').click(function (e) {
    	$.ajax({
			type: "POST",
			url: "/rmis/Indentlist/addIndentMaster/"+$("#hID").val(),
			cache: false
			}).done(function( html ) {
			$("#boxtab1_view").html(html);
		});
	})
	
	$('#myTab a[href="#boxtab-2"]').click(function (e) {
		
		$.ajax({
			type: "POST",
			url: "/rmis/Indentlist/addIndentItems/"+$("#hID").val(),
			cache: false
			}).done(function( html ) {
			$("#boxtab2_view").html(html);
		});
	})
	
	
})

function onIndentItemsEdit() {
      var id = $('#externalResourceList .k-state-selected').find('td:first').text();
      //alert(id);
	 $.ajax({
		type: "POST",
		url: "/rmis/Indentlist/addItemToIndent/"+$("#hID").val()+"/"+id,
		cache: false
		}).done(function( html ) {
		$("#external_resource_form_content").html(html);
	});
}
</script>

