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
    <li <?php echo $menu_active; ?> > <a href="<?php echo site_url('Rmis');?>"> <i class="icon-dashboard"></i> <span>Dashboard</span> </a> </li>
    <li <?php echo $setup_menu_active; ?> > <a href="#" class="dropdown-toggle"> <i class="icon-desktop"></i> <span>Setup Info.</span> <b class="arrow icon-angle-down"></b> </a>
      <ul class="submenu">
        <li <?php echo $sub_menu_active; ?>> <a href="<?php echo site_url('Rmis/Setup/Divisions');?>"> <i class="icon-double-angle-right"></i> Performing Unit/Division Info </a></li>
        <li <?php echo $sub_menu_active; ?>> <a href="<?php echo site_url('Rmis/Setup/RegionalStations');?>"> <i class="icon-double-angle-right"></i> Regional Station Information </a></li>
        <li <?php echo $sub_menu_active; ?>> <a href="<?php echo site_url('Rmis/Setup/ImplementationSites');?>"> <i class="icon-double-angle-right"></i> Implementation Site/Area Info </a></li>
        <li <?php echo $sub_menu_active; ?>> <a href="<?php echo site_url('Rmis/Setup/ProgramAreas');?>"> <i class="icon-double-angle-right"></i> Program Area Information </a></li>
        <li <?php echo $sub_menu_active; ?>> <a href="<?php echo site_url('Rmis/Setup/ProgramCommittees');?>"> <i class="icon-double-angle-right"></i> Program M&E Committee Info </a></li>
        <li <?php echo $sub_menu_active; ?>> <a href="<?php echo site_url('Rmis/Setup/Gradings');?>"> <i class="icon-double-angle-right"></i> Grading Information </a></li>
      </ul>
    </li>
    <li <?php echo $setup_menu_active; ?> > <a href="#" class="dropdown-toggle"> <i class="icon-desktop"></i> <span>Program</span> <b class="arrow icon-angle-down"></b> </a>
      <ul class="submenu">
        <li <?php echo $sub_menu_active; ?>> <a href="<?php echo site_url('Rmis/Program/Search');?>"> <i class="icon-double-angle-right"></i>Program search</a></li>
        <li <?php echo $sub_menu_active; ?>> <a href="<?php echo site_url('Rmis/Program/Informations');?>"> <i class="icon-double-angle-right"></i>Add New Program </a></li>
      </ul>
    </li>
    <li <?php echo $setup_menu_active; ?> > <a href="#" class="dropdown-toggle"> <i class="icon-desktop"></i> <span>Projects</span> <b class="arrow icon-angle-down"></b> </a>
      <ul class="submenu">
        <li <?php echo $sub_menu_active; ?>> <a href="<?php echo site_url('Rmis/Project/Search');?>"> <i class="icon-double-angle-right"></i>Project search</a></li>
        <li <?php echo $sub_menu_active; ?>> <a href="<?php echo site_url('Rmis/Project/Informations');?>"> <i class="icon-double-angle-right"></i>Add New Project </a></li>
      </ul>
    </li>
    
    <li <?php echo $setup_menu_active; ?> > <a href="#" class="dropdown-toggle"> <i class="icon-desktop"></i> <span>Experiments</span> <b class="arrow icon-angle-down"></b> </a>
      <ul class="submenu">
        <li <?php echo $sub_menu_active; ?>> <a href="<?php echo site_url('Rmis/Experiment/Search');?>"> <i class="icon-double-angle-right"></i>Experiment search</a></li>
        <li <?php echo $sub_menu_active; ?>> <a href="<?php echo site_url('Rmis/Experiment/Informations');?>"> <i class="icon-double-angle-right"></i>Add New Experiment </a></li>
      </ul>
    </li>
    
    <li <?php echo $setup_menu_active; ?> > <a href="<?php echo site_url('Rmis/Closing/Information');?>"> <i class="icon-desktop"></i> <span>Prog/Proj. Closing Info</span></a></li>
    <li <?php echo $setup_menu_active; ?> > <a href="<?php echo site_url('Rmis/Released/Technology');?>"> <i class="icon-desktop"></i> <span>Technology Release Information</span></a></li>
    <li <?php echo $setup_menu_active; ?> > <a href="<?php echo site_url('Rmis/Framework/Logical');?>"> <i class="icon-desktop"></i> <span>Logical Framework Information</span></a></li>
    
    <li <?php echo $setup_menu_active; ?> > <a href="#" class="dropdown-toggle"> <i class="icon-desktop"></i> <span>Reports</span> <b class="arrow icon-angle-down"></b> </a>
      <ul class="submenu">
        <li <?php echo $sub_menu_active; ?>> <a href="<?php echo site_url('Rmis/Reports/DivisionWiseReport');?>"> <i class="icon-double-angle-right"></i>Division Wise Projects and Experiments List</a></li>
        <li <?php echo $sub_menu_active; ?>> <a href="<?php echo site_url('Rmis/Reports/ProgramAreaWiseReport');?>"> <i class="icon-double-angle-right"></i>Program Area Wise Projects and Experiments Details</a></li>
        <li <?php echo $sub_menu_active; ?>> <a href="<?php echo site_url('Rmis/Reports/LogicalFramework');?>"> <i class="icon-double-angle-right"></i>Logical Framework</a></li>
        <li <?php echo $sub_menu_active; ?>> <a href="<?php echo site_url('Rmis/Reports/ProgramAreaWiseProgressReport');?>"> <i class="icon-double-angle-right"></i>Program Area Wise Research Experiment Progress Report</a></li>
        <li <?php echo $sub_menu_active; ?>> <a href="<?php echo site_url('Rmis/Reports/ProgramDetailsReport');?>"> <i class="icon-double-angle-right"></i>Program Details Information</a></li>
        <li <?php echo $sub_menu_active; ?>> <a href="<?php echo site_url('Rmis/Reports/ProjectDetailsReport');?>"> <i class="icon-double-angle-right"></i>Project Details Information</a></li>                
      </ul>
    </li>
  </ul>
  <!--/.nav-list-->
  
  <div id="sidebar-collapse"> <i class="icon-double-angle-left"></i> </div>
</div>
