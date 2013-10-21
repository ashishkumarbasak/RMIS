<?php $uri_segment_level = 3;?>
<ul class="tabs-nav">
    <li<?php if($this->uri->segment($uri_segment_level)=='informations') echo " class=\"active\"";?>><a href="<?php echo site_url('rmis/program/informations');?>">Program Info</a></li>
    <li<?php if($this->uri->segment($uri_segment_level)=='otherInformations') echo " class=\"active\"";?>><a href="<?php echo site_url('rmis/program/otherInformations');?>">Other Info</a></li>
    <li<?php if($this->uri->segment($uri_segment_level)=='fundSources') echo " class=\"active\"";?>><a href="<?php echo site_url('rmis/program/fundSources');?>">Fund Source & Cost Breakdown</a></li>
    <li<?php if($this->uri->segment($uri_segment_level)=='researchTeams') echo " class=\"active\"";?>><a href="<?php echo site_url('rmis/program/researchTeams');?>">Research Team Info</a></li>
    <li<?php if($this->uri->segment($uri_segment_level)=='steeringCommittees') echo " class=\"active\"";?>><a href="<?php echo site_url('rmis/program/steeringCommittees');?>">Steering Committee Info</a></li>
    <li<?php if($this->uri->segment($uri_segment_level)=='implementationCommittees') echo " class=\"active\"";?>><a href="<?php echo site_url('rmis/program/implementationCommittees');?>">Implementation Committee Info</a></li>
    <li<?php if($this->uri->segment($uri_segment_level)=='activityLists') echo " class=\"active\"";?>><a href="<?php echo site_url('rmis/program/activityLists');?>">Activity List</a></li>
    <li<?php if($this->uri->segment($uri_segment_level)=='monitorEvaluations') echo " class=\"active\"";?>><a href="<?php echo site_url('rmis/program/monitorEvaluations');?>">M&E Info</a></li>
    <li<?php if($this->uri->segment($uri_segment_level)=='relatedDocuments') echo " class=\"active\"";?>><a href="<?php echo site_url('rmis/program/relatedDocuments');?>">Related Document</a></li>
</ul>