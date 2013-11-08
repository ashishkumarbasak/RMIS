<?php $uri_segment_level = 3;?>
<ul class="tabs-nav">
    <li<?php if($this->uri->segment($uri_segment_level)=='informations') echo " class=\"active\"";?>>
    	<?php if(isset($project_id) && is_numeric($project_id)) { ?>
    	<a href="<?php echo site_url('rmis/project/informations/'.$project_id);?>">
    	<?php } else { ?>
    	<a href="javascript:void(0);">	
    	<?php } ?>	
    		project Info
    	</a>
    </li>
    <li<?php if($this->uri->segment($uri_segment_level)=='otherInformations') echo " class=\"active\"";?>>
    	<?php if(isset($project_id) && is_numeric($project_id)) { ?>
    	<a href="<?php echo site_url('rmis/project/otherInformations/'.$project_id);?>">
    	<?php } else { ?>
    	<a class="disabled" href="javascript:void(0);">	
    	<?php } ?>
    		Other Info
    	</a>
    </li>
    <li<?php if($this->uri->segment($uri_segment_level)=='fundSources') echo " class=\"active\"";?>>
    	<?php if(isset($project_id) && is_numeric($project_id)) { ?>
    	<a href="<?php echo site_url('rmis/project/fundSources/'.$project_id);?>">
    	<?php } else { ?>
    	<a class="disabled" href="javascript:void(0);">	
    	<?php } ?>
    		Fund Source & Cost Breakdown
    	</a>
    </li>
    <li<?php if($this->uri->segment($uri_segment_level)=='researchTeams') echo " class=\"active\"";?>>
    	<?php if(isset($project_id) && is_numeric($project_id)) { ?>
    	<a href="<?php echo site_url('rmis/project/researchTeams/'.$project_id);?>">
    	<?php } else { ?>
    	<a class="disabled" href="javascript:void(0);">	
    	<?php } ?>
    		Research Team Info
    	</a>
    </li>
    <li<?php if($this->uri->segment($uri_segment_level)=='steeringCommittees') echo " class=\"active\"";?>>
    	<?php if(isset($project_id) && is_numeric($project_id)) { ?>
    	<a href="<?php echo site_url('rmis/project/steeringCommittees/'.$project_id);?>">
    	<?php } else { ?>
    	<a class="disabled" href="javascript:void(0);">	
    	<?php } ?>
    		Steering Committee Info
    	</a>
    </li>
    <li<?php if($this->uri->segment($uri_segment_level)=='implementationCommittees') echo " class=\"active\"";?>>
    	<?php if(isset($project_id) && is_numeric($project_id)) { ?>
    	<a href="<?php echo site_url('rmis/project/implementationCommittees/'.$project_id);?>">
    	<?php } else { ?>
    	<a class="disabled" href="javascript:void(0);">	
    	<?php } ?>
    		Implementation Committee Info
    	</a>
    </li>
    <li<?php if($this->uri->segment($uri_segment_level)=='activityLists') echo " class=\"active\"";?>>
    	<?php if(isset($project_id) && is_numeric($project_id)) { ?>
    	<a href="<?php echo site_url('rmis/project/activityLists/'.$project_id);?>">
    	<?php } else { ?>
    	<a class="disabled" href="javascript:void(0);">	
    	<?php } ?>
    		Activity List
    	</a>
    </li>
    <li<?php if($this->uri->segment($uri_segment_level)=='monitorEvaluations') echo " class=\"active\"";?>>
    	<?php if(isset($project_id) && is_numeric($project_id)) { ?>
    	<a href="<?php echo site_url('rmis/project/monitorEvaluations/'.$project_id);?>">
    	<?php } else { ?>
    	<a class="disabled" href="javascript:void(0);">	
    	<?php } ?>
    		M&E Info
    	</a>
    </li>
    <li<?php if($this->uri->segment($uri_segment_level)=='relatedDocuments') echo " class=\"active\"";?>>
   		<?php if(isset($project_id) && is_numeric($project_id)) { ?>
    	<a href="<?php echo site_url('rmis/project/relatedDocuments/'.$project_id);?>">
    	<?php } else { ?>
    	<a class="disabled" href="javascript:void(0);">	
    	<?php } ?>
   			Related Document
   		</a>
   	</li>
</ul>