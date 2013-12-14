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
        <li <?php echo $sub_menu_active; ?>> <a href="<?php echo site_url('Rmis/setup/divisions');?>"> <i class="icon-double-angle-right"></i> Performing Unit/Division Info </a></li>
        <li <?php echo $sub_menu_active; ?>> <a href="<?php echo site_url('Rmis/setup/regionalStations');?>"> <i class="icon-double-angle-right"></i> Regional Station Information </a></li>
        <li <?php echo $sub_menu_active; ?>> <a href="<?php echo site_url('Rmis/setup/implementationSites');?>"> <i class="icon-double-angle-right"></i> Implementation Site/Area Info </a></li>
        <li <?php echo $sub_menu_active; ?>> <a href="<?php echo site_url('Rmis/setup/programAreas');?>"> <i class="icon-double-angle-right"></i> Program Area Information </a></li>
        <li <?php echo $sub_menu_active; ?>> <a href="<?php echo site_url('Rmis/setup/programCommittees');?>"> <i class="icon-double-angle-right"></i> Program M&E Committee Info </a></li>
        <li <?php echo $sub_menu_active; ?>> <a href="<?php echo site_url('Rmis/setup/gradings');?>"> <i class="icon-double-angle-right"></i> Grading Information </a></li>
      </ul>
    </li>
    <li <?php echo $setup_menu_active; ?> > <a href="#" class="dropdown-toggle"> <i class="icon-desktop"></i> <span>Program</span> <b class="arrow icon-angle-down"></b> </a>
      <ul class="submenu">
        <li <?php echo $sub_menu_active; ?>> <a href="<?php echo site_url('Rmis/program/search');?>"> <i class="icon-double-angle-right"></i>Program search</a></li>
        <li <?php echo $sub_menu_active; ?>> <a href="<?php echo site_url('Rmis/program/informations');?>"> <i class="icon-double-angle-right"></i>Add New Program </a></li>
      </ul>
    </li>
    <li <?php echo $setup_menu_active; ?> > <a href="#" class="dropdown-toggle"> <i class="icon-desktop"></i> <span>Projects</span> <b class="arrow icon-angle-down"></b> </a>
      <ul class="submenu">
        <li <?php echo $sub_menu_active; ?>> <a href="<?php echo site_url('Rmis/project/search');?>"> <i class="icon-double-angle-right"></i>Project search</a></li>
        <li <?php echo $sub_menu_active; ?>> <a href="<?php echo site_url('Rmis/project/informations');?>"> <i class="icon-double-angle-right"></i>Add New Project </a></li>
      </ul>
    </li>
    
    <li <?php echo $setup_menu_active; ?> > <a href="#" class="dropdown-toggle"> <i class="icon-desktop"></i> <span>Experiments</span> <b class="arrow icon-angle-down"></b> </a>
      <ul class="submenu">
        <li <?php echo $sub_menu_active; ?>> <a href="<?php echo site_url('Rmis/experiment/search');?>"> <i class="icon-double-angle-right"></i>Experiment search</a></li>
        <li <?php echo $sub_menu_active; ?>> <a href="<?php echo site_url('Rmis/experiment/informations');?>"> <i class="icon-double-angle-right"></i>Add New Experiment </a></li>
      </ul>
    </li>
    
    <li <?php echo $setup_menu_active; ?> > <a href="<?php echo site_url('Rmis/closing/information');?>"> <i class="icon-desktop"></i> <span>Prog/Proj. Closing Info</span></a></li>
    <li <?php echo $setup_menu_active; ?> > <a href="<?php echo site_url('Rmis/technologyRelease');?>"> <i class="icon-desktop"></i> <span>Technology Release Information</span></a></li>
    <li <?php echo $setup_menu_active; ?> > <a href="<?php echo site_url('Rmis/framework/logical');?>"> <i class="icon-desktop"></i> <span>Logical Framework Information</span></a></li>
  </ul>
  <!--/.nav-list-->
  
  <div id="sidebar-collapse"> <i class="icon-double-angle-left"></i> </div>
</div>
