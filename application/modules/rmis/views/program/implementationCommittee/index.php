<script type="text/javascript">
	jQuery(function($) {
	
		$( "#implementation_comittee_formation_date" ).datepicker({
			showOtherMonths: true,
			selectOtherMonths: false,
		});
	});
</script>
<div class="content-header">
  <h2>
  	<i <?php echo $content_header_icon; ?>></i> 
  	<?php echo $content_header_title; ?>
  </h2>
</div>

<!-- content-breadcrumb -->
<div class="content-breadcrumb"> 
  <?php echo $breadcrumb; ?>
</div>
<!-- /content-breadcrumb --> 

<!-- content-body -->
<div class="content-body">    
    <div class="row-fluid">
        <div class="row-fluid">
        <?php $uri_segment_level = 3;?>
        <div class="eight columns" style="margin:0 auto; padding-left:5px; width:99%;">
          <!-- Tabs Navigation -->
          <ul class="tabs-nav">
            <li<?php if($this->uri->segment($uri_segment_level)=='programsInfo') echo " class=\"active\"";?>><a href="<?php echo site_url('rmis/program/programsInfo');?>">Program Info</a></li>
            <li<?php if($this->uri->segment($uri_segment_level)=='otherInfo') echo " class=\"active\"";?>><a href="<?php echo site_url('rmis/program/otherInfo');?>">Other Info</a></li>
            <li<?php if($this->uri->segment($uri_segment_level)=='costBreakdown') echo " class=\"active\"";?>><a href="<?php echo site_url('rmis/program/costBreakdown');?>">Fund Source & Cost Breakdown</a></li>
            <li<?php if($this->uri->segment($uri_segment_level)=='researchTeam') echo " class=\"active\"";?>><a href="<?php echo site_url('rmis/program/researchTeam');?>">Research Team Info</a></li>
            <li<?php if($this->uri->segment($uri_segment_level)=='steeringCommittee') echo " class=\"active\"";?>><a href="<?php echo site_url('rmis/program/steeringCommittee');?>">Steering Committee Info</a></li>
            <li<?php if($this->uri->segment($uri_segment_level)=='implementationCommittee') echo " class=\"active\"";?>><a href="<?php echo site_url('rmis/program/implementationCommittee');?>">Implementation Committee Info</a></li>
            <li<?php if($this->uri->segment($uri_segment_level)=='activityList') echo " class=\"active\"";?>><a href="<?php echo site_url('rmis/program/activityList');?>">Activity List</a></li>
            <li<?php if($this->uri->segment($uri_segment_level)=='monitorEvaluation') echo " class=\"active\"";?>><a href="<?php echo site_url('rmis/program/monitorEvaluation');?>">M&E Info</a></li>
            <li<?php if($this->uri->segment($uri_segment_level)=='relatedDocument') echo " class=\"active\"";?>><a href="<?php echo site_url('rmis/program/relatedDocument');?>">Related Document</a></li>
          </ul>
          
          <!-- Tabs Content -->
          <div class="tabs-container">
            <div class="tab-contents">
            
            <form name="research_info" id="research_info" method="post" action="">
            <fieldset>
    				<legend>Program Information</legend>
                <div class="main_form">
                	<div class="form_element">
                        <div class="label">Title of Research Programme</div>
                        <div class="textarea_field"><textarea name="fund_program" id="fund_program" class="textarea_small width_100_percent"></textarea></div>
                        <div class="clear"></div>
                    </div>
                    
                    <div class="left_form">
                        <div class="form_element">
                            <div class="label">Programme Area </div>
                            <div class="field">
                            <input type="text" name="implementation_area" id="implementation_area" value="" class="textbox" disabled="disabled">
                            </div>
                            <div class="clear"></div>
                        </div>  
                        
                         <div class="form_element">
                            <div class="label">Planned Budget</div>
                            <div class="field">
                            <input type="text" name="implementation_budget" id="implementation_budget" value="" class="textbox" disabled="disabled">
                            </div>
                            <div class="clear"></div>
                        </div> 
                                        
                         <div class="form_element">
                            <div class="label">Planned Start Date </div>
                            <div class="field">
                            <input type="text" name="implementation_startdate" id="implementation_startdate" value="" class="textbox" disabled="disabled">
                            </div>
                            <div class="clear"></div>
                        </div>  
                        
                        <div class="form_element">
                            <div class="label">Planned End Date </div>
                            <div class="field">
                            <input type="text" name="implementation_enddate" id="implementation_enddate" value="" class="textbox" disabled="disabled">
                            </div>
                            <div class="clear"></div>
                        </div>
          
                    </div>
                    
                    <div class="right_form">    
                       <div class="form_element">
                            <div class="label">Principal Investigator <br />(or PM/Coordinator)</div>
                            <div class="field">
                            <input type="text" name="implementation_investor" id="implementation_investor" value="" class="textbox" disabled="disabled">
                            </div>
                            <div class="clear"></div>
                        </div>
                                        
                        <div class="form_element">
                            <div class="label">Total Budget(in Taka)</div>
                            <div class="field">
                            <input type="text" name="implementation_budget_taka" id="implementation_budget_taka" value="" class="textbox" disabled="disabled">
                            </div>
                            <div class="clear"></div>
                        </div>
                        
                        
                        <div class="form_element">
                            <div class="label">Initiation Date</div>
                            <div class="field">
                            <input type="text" name="implementation_initiationdate" id="implementation_initiationdate" value="" class="textbox" disabled="disabled">
                            </div>
                            <div class="clear"></div>
                        </div>
                        
                         <div class="form_element">
                            <div class="label">Completion Date</div>
                            <div class="field">
                            <input type="text" name="implementation_completiondate" id="implementation_completiondate" value="" class="textbox" disabled="disabled">
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>                                                 
                </div>
                </fieldset>
                  
                  <fieldset>
    				<legend>Implementation Comittee Information</legend>
                    <div class="main_form">
                        <div class="form_element">
                            <div class="label">Implementation Formation Date:</div>
                            <div class="field">
                                <input type="text" class="form-control hasDatepicker" name="implementation_comittee_formation_date" id="implementation_comittee_formation_date">
                                <span class="input-group-addon">
                                    <i class="icon-calendar"></i>
                                </span>
                            </div>
                            <div class="clear"></div>
                        </div>
                     </div>
                  </fieldset>
                </form>
            </div>
          </div>
        </div>
        </div>
    </div> 
</div><!--/content-body -->