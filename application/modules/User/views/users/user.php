<div class="container">
  <div class="row">
    <div class="span12">
      <hr>
      <h4>MANAGE USER</h4>
      <div class="span2 offset10"> 
      	<a href="<?php echo site_url('User/add'); ?>" class="btn btn-primary"><i class="icon-white icon-plus-sign"></i>Add User</a> 
      </div>
      <br />
      <br/>
      <?php echo $grid_data; ?> <br/>
    </div>
  </div>
  <!-- /row --> 
</div>
<!-- /container --> 

<script>
    function commandEdit(e) {
		var dataItem = this.dataItem($(e.currentTarget).closest("tr"));
		window.location.href = '/User/edit/' + dataItem.id;
		return false;
    }
</script>