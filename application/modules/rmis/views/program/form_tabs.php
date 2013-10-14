<?php $uri_segment_level = 3;?>
<ul class="tabs-nav">
    <li<?php if($this->uri->segment($uri_segment_level)=='information') echo " class=\"active\"";?>><a href="<?php echo site_url('rmis/program/programsInfo');?>">Program Info</a></li>
    <li<?php if($this->uri->segment($uri_segment_level)=='otherInfo') echo " class=\"active\"";?>><a href="<?php echo site_url('rmis/program/otherInfo');?>">Other Info</a></li>
    <li<?php if($this->uri->segment($uri_segment_level)=='costBreakDown') echo " class=\"active\"";?>><a href="<?php echo site_url('rmis/program/costBreakDown');?>">Fund Source & Cost Breakdown</a></li>
    <li<?php if($this->uri->segment($uri_segment_level)=='researchTeam') echo " class=\"active\"";?>><a href="<?php echo site_url('rmis/program/researchTeam');?>">Research Team Info</a></li>
    <li<?php if($this->uri->segment($uri_segment_level)=='steeringCommittee') echo " class=\"active\"";?>><a href="<?php echo site_url('rmis/program/steeringCommittee');?>">Steering Committee Info</a></li>
    <li<?php if($this->uri->segment($uri_segment_level)=='implementationCommittee') echo " class=\"active\"";?>><a href="<?php echo site_url('rmis/program/implementationCommittee');?>">Implementation Committee Info</a></li>
    <li<?php if($this->uri->segment($uri_segment_level)=='activityLists') echo " class=\"active\"";?>><a href="<?php echo site_url('rmis/program/activityList');?>">Activity List</a></li>
    <li<?php if($this->uri->segment($uri_segment_level)=='monitorEvaluation') echo " class=\"active\"";?>><a href="<?php echo site_url('rmis/program/monitorEvaluation');?>">M&E Info</a></li>
    <li<?php if($this->uri->segment($uri_segment_level)=='relatedDocument') echo " class=\"active\"";?>><a href="<?php echo site_url('rmis/program/relatedDocument');?>">Related Document</a></li>
</ul>