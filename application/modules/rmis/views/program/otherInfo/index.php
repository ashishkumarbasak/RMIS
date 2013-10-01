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
            
            <form name="other_info" id="other_info" method="post" action="">
                <div class="main_form">
                	<div class="form_element">
                        <div class="label">Title of Research Programme</div>
                        <div class="textarea_field"><textarea name="other_info_program" id="other_info_program" class="textarea_small width_100_percent"></textarea></div>
                        <div class="clear"></div>
                    </div>
                    
                    <div class="left_form">
                        <div class="form_element">
                            <div class="label">Programme Area </div>
                            <div class="field">
                            <input type="text" name="programme_other_info_area" id="programme_other_info_area" value="" class="textbox">
                            </div>
                            <div class="clear"></div>
                        </div>      
                    </div>
                    
                    <div class="right_form">    
                      <div class="form_element">
                            <div class="label">Principal Investigator <br />(or PM/Coordinator)</div>
                            <div class="field">
                       			<input type="text" name="programme_other_info_investigator" id="programme_other_info_investigator" value="" class="textbox">
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                     
                    <div class="form_element">
                        <div class="form_element">
                            <div class="label">Rationale</div>
                            <div class="textarea_field">
                            <textarea name="information_other_info_rational" id="information_other_info_rational" class="textarea textarea_small width_100_percent" ></textarea>
                            </div>
                            <div class="clear"></div>
                        </div>
                        
                        <div class="form_element">
                            <div class="label">Methodology </div>
                            <div class="textarea_field">
                            <textarea name="programme_other_info_methodology" id="programme_other_info_methodology" class="textarea_small width_100_percent" ></textarea>
                            </div>
                            <div class="clear"></div>
                        </div>
                    
                    
                        
                        <div class="form_element">
                            <div class="label">Background</div>
                            <div class="textarea_field">
                            <textarea name="programme_other_info_background" id="programme_other_info_background" class="textarea_small width_100_percent"></textarea>
                            </div>
                            <div class="clear"></div>
                        </div>
                        
                         <div class="form_element">
                            <div class="label">Socio Economical Impact</div>
                            <div class="textarea_field">
                            <textarea name="programme_other_info_impact" id="programme_other_info_impact" class="textarea_small width_100_percent"></textarea>
                            </div>
                            <div class="clear"></div>
                        </div>
                        
                         <div class="form_element">
                            <div class="label">Environmental Impact</div>
                            <div class="textarea_field">
                            <textarea name="programme_other_info_environmental" id="programme_other_info_environmental" class="textarea width_100_percent"></textarea>
                            </div>
                            <div class="clear"></div>
                        </div>
                        
                          <div class="form_element">
                            <div class="label">Targeted Beneficiary</div>
                            <div class="textarea_field">
                            <textarea name="programme_other_info_beneficiary" id="programme_other_info_beneficiary" class="textarea width_100_percent"></textarea>
                            </div>
                            <div class="clear"></div>
                        </div>
                        
                        
                         <div class="form_element">
                            <div class="label">Reference</div>
                            <div class="textarea_field">
                            <textarea name="programme_other_info_reference" id="programme_other_info_reference" class="textarea width_100_percent"></textarea>
                            </div>
                            <div class="clear"></div>
                        </div>
                        
                        
                        <div class="form_element">
                            <div class="label">External Affiliation</div>
                            <div class="textarea_field">
                            <textarea name="programme_other_info_affiliation" id="programme_other_info_affiliation" class="textarea width_100_percent"></textarea>
                            </div>
                            <div class="clear"></div>
                        </div>
                        
                        <div class="form_element">
                            <div class="label">Organization Policy</div>
                            <div class="textarea_field">
                            <textarea name="programme_other_info_policy" id="programme_other_info_policy" class="textarea width_100_percent"></textarea>
                            </div>
                            <div class="clear"></div>
                        </div>
                        
                        
                         <div class="form_element">
                            <div class="label">Programme Risks</div>
                            <div class="textarea_field">
                            <textarea name="programme_other_info_policy" id="programme_other_info_policy" class="textarea width_100_percent"></textarea>
                            </div>
                            <div class="clear"></div>
                        </div>
                        
                    </div>        
                </div>
                </form>
            </div>
          </div>
        </div>
        </div>
    </div> 
</div><!--/content-body -->

