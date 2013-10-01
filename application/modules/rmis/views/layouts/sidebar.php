<div id="sidebar">
  <div id="sidebar-shortcuts">
    <div id="sidebar-shortcuts-large">
      <button class="btn btn-small btn-success"> <i class="icon-signal"></i> </button>
      <button class="btn btn-small btn-info"> <i class="icon-pencil"></i> </button>
      <button class="btn btn-small btn-warning"> <i class="icon-group"></i> </button>
      <button class="btn btn-small btn-danger"> <i class="icon-cogs"></i> </button>
    </div>
    <div id="sidebar-shortcuts-mini"> <span class="btn btn-success"></span> <span class="btn btn-info"></span> <span class="btn btn-warning"></span> <span class="btn btn-danger"></span> </div>
  </div>
  <!--#sidebar-shortcuts-->
  
  <ul class="nav nav-list">
    <li <?php echo $menu_active; ?> > <a href="<?php echo site_url('rmis');?>"> <i class="icon-dashboard"></i> <span>Dashboard</span> </a> </li>
    <li <?php echo $setup_menu_active; ?> > <a href="#" class="dropdown-toggle"> <i class="icon-desktop"></i> <span>Setup Info.</span> <b class="arrow icon-angle-down"></b> </a>
      <ul class="submenu">
        <li <?php echo $sub_menu_active; ?>> <a href="<?php echo site_url('rmis/setup/divisions');?>"> <i class="icon-double-angle-right"></i> Performing Unit/Division Info </a></li>
        <li <?php echo $sub_menu_active; ?>> <a href="<?php echo site_url('rmis/setup/regionalStations');?>"> <i class="icon-double-angle-right"></i> Regional Station Information </a></li>
        <li <?php echo $sub_menu_active; ?>> <a href="<?php echo site_url('rmis/setup/implementationSites');?>"> <i class="icon-double-angle-right"></i> Implementation Site/Area Info </a></li>
        <li <?php echo $sub_menu_active; ?>> <a href="<?php echo site_url('rmis/setup/programAreas');?>"> <i class="icon-double-angle-right"></i> Program Area Information </a></li>
        <li <?php echo $sub_menu_active; ?>> <a href="<?php echo site_url('rmis/setup/programCommittees');?>"> <i class="icon-double-angle-right"></i> Program M&E Committee Info </a></li>
        <li <?php echo $sub_menu_active; ?>> <a href="<?php echo site_url('rmis/setup/gradings');?>"> <i class="icon-double-angle-right"></i> Grading Information </a></li>
      </ul>
    </li>
     <li <?php echo $setup_menu_active; ?> > <a href="#" class="dropdown-toggle"> <i class="icon-desktop"></i> <span>Program</span> <b class="arrow icon-angle-down"></b> </a>
      <ul class="submenu">
        <li <?php echo $sub_menu_active; ?>> <a href="<?php echo site_url('rmis/program/search');?>"> <i class="icon-double-angle-right"></i>Program search</a></li>
        <li <?php echo $sub_menu_active; ?>> <a href="<?php echo site_url('rmis/program/information');?>"> <i class="icon-double-angle-right"></i>Program Information </a></li>
        <li <?php echo $sub_menu_active; ?>> <a href="<?php echo site_url('rmis/program/others');?>"> <i class="icon-double-angle-right"></i>Program Other Information </a></li>
        <li <?php echo $sub_menu_active; ?>> <a href="<?php echo site_url('rmis/program/fundsources');?>"> <i class="icon-double-angle-right"></i>Fund Source & Cost Breakdown</a></li>
        <li <?php echo $sub_menu_active; ?>> <a href="<?php echo site_url('rmis/program/researchteams');?>"> <i class="icon-double-angle-right"></i>Research Team Information </a></li>
        <li <?php echo $sub_menu_active; ?>> <a href="<?php echo site_url('rmis/program/steeringcomittees');?>"> <i class="icon-double-angle-right"></i>Program Steering Comittee </a></li>
           <li <?php echo $sub_menu_active; ?>> <a href="<?php echo site_url('rmis/program/implementationcomittees');?>"> <i class="icon-double-angle-right"></i>Program Implementation Comittee </a></li>
      <li <?php echo $sub_menu_active; ?>> <a href="<?php echo site_url('rmis/program/activitylists');?>"> <i class="icon-double-angle-right"></i>Program Activity List </a></li>
       <li <?php echo $sub_menu_active; ?>> <a href="<?php echo site_url('rmis/program/monitorings');?>"> <i class="Programe M & E Information"></i>Program Implementation Comittee </a></li>
        <li <?php echo $sub_menu_active; ?>> <a href="<?php echo site_url('rmis/program/documents');?>"> <i class="icon-double-angle-right"></i>Program Related Documents</a></li>
      </ul>
    </li>
  </ul>
  <!--/.nav-list-->
  
  <div id="sidebar-collapse"> <i class="icon-double-angle-left"></i> </div>
</div>
