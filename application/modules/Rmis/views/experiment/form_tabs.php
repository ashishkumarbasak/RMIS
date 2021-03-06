<script src="<?php echo site_url('/assets/extensive/js/jquery.validate.min.js'); ?>"></script>
<script src="<?php echo site_url('/assets/js/custom/rmis.js'); ?>"></script>
<?php $uri_segment_level = 3; ?>
<ul class="tabs-nav">
    <li<?php if($this->uri->segment($uri_segment_level)=='informations') echo " class=\"active\"";?>>
    	<?php if(isset($experiment_id) && is_numeric($experiment_id)) { ?>
    	<a href="<?php echo site_url('Rmis/Experiment/Informations/'.$experiment_type.'/'.$experiment_ProjProg_id.'/'.$experiment_id);?>">
    	<?php } else { ?>
    	<a href="javascript:void(0);">	
    	<?php } ?>	
    		Experiment Information
    	</a>
    </li>
    <li<?php if($this->uri->segment($uri_segment_level)=='otherInformations') echo " class=\"active\"";?>>
    	<?php if(isset($experiment_id) && is_numeric($experiment_id) && $experiment_id!=0) { ?>
    	<a href="<?php echo site_url('Rmis/Experiment/OtherInformations/'.$experiment_type.'/'.$experiment_ProjProg_id.'/'.$experiment_id);?>">
    	<?php } else { ?>
    	<a class="disabled" href="javascript:void(0);">	
    	<?php } ?>
    		Other Information
    	</a>
    </li>
    <li<?php if($this->uri->segment($uri_segment_level)=='researchTeams') echo " class=\"active\"";?>>
    	<?php if(isset($experiment_id) && is_numeric($experiment_id)  && $experiment_id!=0) { ?>
    	<a href="<?php echo site_url('Rmis/Experiment/ResearchTeams/'.$experiment_type.'/'.$experiment_ProjProg_id.'/'.$experiment_id);?>">
    	<?php } else { ?>
    	<a class="disabled" href="javascript:void(0);">	
    	<?php } ?>
    		Research Team Information
    	</a>
    </li>
    <li<?php if($this->uri->segment($uri_segment_level)=='activityLists') echo " class=\"active\"";?>>
    	<?php if(isset($experiment_id) && is_numeric($experiment_id)  && $experiment_id!=0) { ?>
    	<a href="<?php echo site_url('Rmis/Experiment/ActivityLists/'.$experiment_type.'/'.$experiment_ProjProg_id.'/'.$experiment_id);?>">
    	<?php } else { ?>
    	<a class="disabled" href="javascript:void(0);">	
    	<?php } ?>
    		Activity List
    	</a>
    </li>
</ul>