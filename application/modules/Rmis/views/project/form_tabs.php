<script src="<?php echo site_url('/assets/extensive/js/jquery.validate.min.js'); ?>"></script>
<script src="<?php echo site_url('/assets/js/custom/rmis.js'); ?>"></script>
<?php $uri_segment_level = 3;?>
<ul class="tabs-nav">
    <li<?php if($this->uri->segment($uri_segment_level)=='Informations') echo " class=\"active\"";?>>
    	<?php if(isset($project_id) && is_numeric($project_id)) { ?>
    	<a href="<?php echo site_url('Rmis/Project/Informations/'.$project_id);?>">
    	<?php } else { ?>
    	<a href="javascript:void(0);">	
    	<?php } ?>	
    		Project Info
    	</a>
    </li>
    <li<?php if($this->uri->segment($uri_segment_level)=='OtherInformations') echo " class=\"active\"";?>>
    	<?php if(isset($project_id) && is_numeric($project_id)) { ?>
    	<a href="<?php echo site_url('Rmis/Project/OtherInformations/'.$program_id.'/'.$project_id);?>">
    	<?php } else { ?>
    	<a class="disabled" href="javascript:void(0);">	
    	<?php } ?>
    		Other Info
    	</a>
    </li>
    <li<?php if($this->uri->segment($uri_segment_level)=='FundSources') echo " class=\"active\"";?>>
    	<?php if(isset($project_id) && is_numeric($project_id)) { ?>
    	<a href="<?php echo site_url('Rmis/Project/FundSources/'.$program_id.'/'.$project_id);?>">
    	<?php } else { ?>
    	<a class="disabled" href="javascript:void(0);">	
    	<?php } ?>
    		Fund Source & Cost Breakdown
    	</a>
    </li>
    <li<?php if($this->uri->segment($uri_segment_level)=='ResearchTeams') echo " class=\"active\"";?>>
    	<?php if(isset($project_id) && is_numeric($project_id)) { ?>
    	<a href="<?php echo site_url('Rmis/Project/ResearchTeams/'.$program_id.'/'.$project_id);?>">
    	<?php } else { ?>
    	<a class="disabled" href="javascript:void(0);">	
    	<?php } ?>
    		Research Team Info
    	</a>
    </li>
    
    <li<?php if($this->uri->segment($uri_segment_level)=='MonitorCommittee') echo " class=\"active\"";?>>
    	<?php if(isset($project_id) && is_numeric($project_id)) { ?>
    	<a href="<?php echo site_url('Rmis/Project/MonitorCommittee/'.$program_id.'/'.$project_id);?>">
    	<?php } else { ?>
    	<a class="disabled" href="javascript:void(0);">	
    	<?php } ?>
    		M&E Committee
    	</a>
    </li>    
    <li<?php if($this->uri->segment($uri_segment_level)=='SteeringCommittees') echo " class=\"active\"";?>>
    	<?php if(isset($project_id) && is_numeric($project_id)) { ?>
    	<a href="<?php echo site_url('Rmis/Project/SteeringCommittees/'.$program_id.'/'.$project_id);?>">
    	<?php } else { ?>
    	<a class="disabled" href="javascript:void(0);">	
    	<?php } ?>
    		Steering Committee Info
    	</a>
    </li>
    <li<?php if($this->uri->segment($uri_segment_level)=='ImplementationCommittees') echo " class=\"active\"";?>>
    	<?php if(isset($project_id) && is_numeric($project_id)) { ?>
    	<a href="<?php echo site_url('Rmis/Project/ImplementationCommittees/'.$program_id.'/'.$project_id);?>">
    	<?php } else { ?>
    	<a class="disabled" href="javascript:void(0);">	
    	<?php } ?>
    		Impl. Committee Info
    	</a>
    </li>
    <li<?php if($this->uri->segment($uri_segment_level)=='ActivityLists') echo " class=\"active\"";?>>
    	<?php if(isset($project_id) && is_numeric($project_id)) { ?>
    	<a href="<?php echo site_url('Rmis/Project/ActivityLists/'.$program_id.'/'.$project_id);?>">
    	<?php } else { ?>
    	<a class="disabled" href="javascript:void(0);">	
    	<?php } ?>
    		Activity List
    	</a>
    </li>    
    <li<?php if($this->uri->segment($uri_segment_level)=='MonitorEvaluations') echo " class=\"active\"";?>>
    	<?php if(isset($project_id) && is_numeric($project_id)) { ?>
    	<a href="<?php echo site_url('Rmis/Project/MonitorEvaluations/'.$program_id.'/'.$project_id);?>">
    	<?php } else { ?>
    	<a class="disabled" href="javascript:void(0);">	
    	<?php } ?>
    		M&E Info
    	</a>
    </li>
    <li<?php if($this->uri->segment($uri_segment_level)=='RelatedDocuments') echo " class=\"active\"";?>>
   		<?php if(isset($project_id) && is_numeric($project_id)) { ?>
    	<a href="<?php echo site_url('Rmis/Project/RelatedDocuments/'.$program_id.'/'.$project_id);?>">
    	<?php } else { ?>
    	<a class="disabled" href="javascript:void(0);">	
    	<?php } ?>
   			Related Document
   		</a>
   	</li>
</ul>