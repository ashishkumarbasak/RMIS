<?php

class ResearchTeams extends MX_Controller{
    private $_data;
    public function __construct(){
        parent::__construct();
        $this->load->model('Kendodatasource_model', 'grid');
        $this->load->model('Project_model', 'project');

        $this->template->set_partial('header', 'layouts/header')
						->set_layout('extensive/main_layout');
    }
    
    public function index($project_id=NULL){
        $this->template->title('Research Management(RM)', ' Project', ' Research Project Team Information');
        
		if($this->input->post('save_researchTeam')){
			$request = json_encode($this->input->post());
			$this->dataCreate($request);
		}
		
        $_data['dashboard_menu_active'] = '';
        $_data['setup_menu_active'] = 'class="active"';
        $_data['setup_funds_menu_active'] ='class="active"';
        $_data['setup_training_program_type_menu_active'] ='';
        $_data['setup_institutes_menu_active'] ='';
        
        $this->template->append_metadata('<link href="/assets/kendoui/css/web/kendo.common.min.css"  rel="stylesheet"/>');
        $this->template->append_metadata('<link href="/assets/kendoui/css/web/kendo.default.min.css"  rel="stylesheet"/>');
        $this->template->append_metadata('<script src="/assets/kendoui/js/kendo.all.min.js"></script>');
        $this->template->append_metadata('<script src="/assets/js/custom/rmis.js"></script>');
                
        if($project_id!=NULL){
        	if($this->input->post('update_researchTeam')){
				$request = json_encode($this->input->post());
				$this->dataUpdate($request);
			}
			
			$project_detail = $this->project->get_details($project_id);
			$this->template->set('project_detail', serialize($project_detail));
			
			$researchTeam = $this->project->get_researchTeam($project_id);
			$this->template->set('researchTeam', serialize($researchTeam));
			
			$teamMembers = $this->project->get_researchTeamMembers($project_id);
			$this->template->set('teamMembers', serialize($teamMembers));
			
			
			$this->template->set('project_id',$project_id);
		}
		
		$program_areas = $this->grid->read('rmis_program_areas', array('id','program_area_id', 'program_area_name'), $request); 
		$this->template->set('program_areas',$program_areas); //$this->program->get_program_area()
		
        $this->template->set('content_header_icon', 'class="icofont-file"');
        $this->template->set('content_header_title', 'Research Project Team Information');
		
        $breadcrumb = '<ul class="breadcrumb">
						<li><a href="#"><i class="icofont-home"></i> RMIS</a> <span class="divider">&raquo;</span></li>
						<li><a href="#">Project info.</a><span class="divider">&raquo;</span></li><li class="active">Research Project Team Information</li>
					  </ul>';
        $this->template->set('breadcrumb', $breadcrumb);		
        $this->template->set_partial('researchTeamInfoForm','project/researchTeams/form');
		$this->template->set_partial('tab_menu','project/form_tabs');
        $this->template->set_partial('sidebar', 'layouts/sidebar',$_data)
               ->build('project/researchTeams/index');
    }
	
	public function dataCreate($request){
        //header('Content-Type: application/json');
        //$request = json_decode(file_get_contents('php://input'));
        $request = json_decode($request);
		//print_r((array) $request);
		
       	$columns = array('team_formation_date', 'project_id');
        $columns[] = 'created_at';
        $request->created_at = date('Y-m-d H:i:s');            
        $columns[] = 'created_by';
        $request->created_by = 1;
        
		$data = $this->grid->create('rmis_project_research_teams', $columns, $request, 'id'); 
        
		$columns = array('member_type', 'institute_name','member_name','designation', 'contact_no', 'email', 'project_id');
		$request->project_id = $request->id;
		$i=0;
		if(!empty($request->member_types)>0){
			foreach($request->member_types as $team_member_key=>$team_member_type){
				if($team_member_type!=NULL){
					$request->member_type = $team_member_type;
					$request->institute_name = $request->institute_names[$i];
					$request->member_name = $request->member_names[$i];
					$request->designation = $request->designations[$i];
					$request->contact_no = $request->contact_nos[$i];
					$request->email = $request->emails[$i];
					$this->grid->create('rmis_project_research_team_members', $columns, $request, 'id');
					$i++;	
				}
			}
		}
		
        $data['success'] ="Data created successfuly.";
        //echo json_encode($data , JSON_NUMERIC_CHECK); 
    }
    
    public function dataRead(){
        header('Content-Type: application/json');
        $request = json_decode(file_get_contents('php://input'));
        $data= $this->grid->read_with_join_table('rmis_divisions', array('rmis_divisions.id','division_id', 'division_name', 'hrm_employees.employee_name as division_head','division_phone','division_email'), $request, 'hrm_employees', 'rmis_divisions.division_head = hrm_employees.employee_id');       
        echo json_encode($data, JSON_NUMERIC_CHECK);
    }
    public function dataDestroy(){   
        header('Content-Type: application/json');
        $request = json_decode(file_get_contents('php://input'));
        $data = $this->grid->destroy('rmis_divisions', $request->models, 'id'); 
        echo json_encode($data , JSON_NUMERIC_CHECK); 
    }
    	
	public function dataUpdate($request){
        //header('Content-Type: application/json');
        //$request = json_decode(file_get_contents('php://input'));
        $request = json_decode($request);
		//print_r((array) $request);
		
       	$columns = array('team_formation_date', 'project_id');
        $columns[] = 'modified_at';        
        $request->modified_at = date('Y-m-d H:i:s');            
        $columns[] = 'modified_by';
        $request->modified_by = 1;
        
		$data = $this->grid->update('rmis_project_research_teams', $columns, $request, 'project_id'); 
        
		$columns = array('member_type', 'institute_name','member_name','designation', 'contact_no', 'email', 'project_id');
		$i=0;
		if(!empty($request->member_types)>0){
			$this->project->clean_projectResearchTeamMembers($request->project_id);
			foreach($request->member_types as $team_member_key=>$team_member_type){
				if($team_member_type!=NULL){
					$request->member_type = $team_member_type;
					$request->institute_name = $request->institute_names[$i];
					$request->member_name = $request->member_names[$i];
					$request->designation = $request->designations[$i];
					$request->contact_no = $request->contact_nos[$i];
					$request->email = $request->emails[$i];
					$this->grid->create('rmis_project_research_team_members', $columns, $request, 'id');
					$i++;	
				}
			}
		}
		
        $data['success'] ="Data updated successfuly.";
        //echo json_encode($data , JSON_NUMERIC_CHECK); 
    }

	public function deleteTeamMember(){
		$team_member_id = $this->input->post('team_member_id');
		$project_id = $this->input->post('project_id');
		$this->project->deleteResearchTeamMemberFromProject($team_member_id,$project_id);
	}
                
} 
?>