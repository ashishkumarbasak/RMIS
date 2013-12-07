<div class="container">
    <div class="row">
        <div class="span12">
            <hr>
            <h4>MANAGE ROLE</h4>
            <br/>
            <?php echo $grid_data; ?> <br/>   
        </div>
    </div>
    <!-- /row --> 
</div>
<!-- /container --> 

<script>
    function commandClick(e) {
        var dataItem = this.dataItem($(e.currentTarget).closest("tr"));
        window.location.href = '/User/Role/permission/' + dataItem.id;
        return false;
    }
</script>