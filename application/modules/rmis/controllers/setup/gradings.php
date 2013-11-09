<?php

class Gradings extends MX_Controller{
    private $_data;
    public function __construct(){
        parent::__construct();
        $this->load->model('Kendodatasource_model', 'grid');
        $this->load->model('Grading_model', 'grading');

        $this->template->set_partial('header', 'layouts/header')
						->set_layout('extensive/main_layout');
    }
    
    public function index($grading_id=NULL){
        $this->template->title('Research Management(RM)', ' Setup Info.', ' Grading Information');
        
		if($this->input->post('save_gradings')){
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
		
		$grading_detail = $this->grading->get_details();
		$this->template->set('grading_detail', serialize($grading_detail));

		if($this->input->post('update_gradings')){
			$request = json_encode($this->input->post());
			$this->dataUpdate($request);
		}
		$grade_point_informations = $this->grading->get_grade_point_informations($grading_detail->id);
		$this->template->set('grade_point_informations', serialize($grade_point_informations));
		
		
        $this->template->set('content_header_icon', 'class="icofont-file"');
        $this->template->set('content_header_title', 'Grading Information');
		
        $breadcrumb = '<ul class="breadcrumb">
						<li><a href="#"><i class="icofont-home"></i> RMIS</a> <span class="divider">&raquo;</span></li>
						<li><a href="#">Setup info.</a><span class="divider">&raquo;</span></li><li class="active">Grading Information</li>
					  </ul>';
        $this->template->set('breadcrumb', $breadcrumb);		
        $this->template->set_partial('gradingInfoForm','setup/grading/form');
        $this->template->set_partial('sidebar', 'layouts/sidebar',$_data)
               ->build('setup/grading/index');
    }
	
	public function dataCreate($request){
        $request = json_decode($request);
		
        $this->form_validation->set_rules($this->grading->validation);
        $this->grading->isValidate((array) $request);
        if ($this->form_validation->run() === false) {
            header("HTTP/1.1 500 Internal Server Error");
            echo "Wrong data ! try again" ;
            exit;
        }
       
        $columns = array('grading_title', 'effect_date');
		$columns[] = 'organization_id';
		$request->organization_id = 1;
        $columns[] = 'created_at';
        $request->created_at = date('Y-m-d H:i:s');            
        $columns[] = 'created_by';
        $request->created_by = 1;
        
        $data= $this->grid->create('rmis_gradings', $columns, $request, 'id');
		
		$columns = array('lower_range', 'upper_range','letter_grade','grade_point','qualitative_status','description','grading_id');
		$request->grading_id = $request->id;
		$i=0;
		if(!empty($request->lower_ranges)>0){
			foreach($request->lower_ranges as $lower_range_key=>$lower_range_value){
				if($lower_range_value!=NULL){
					$request->lower_range = $lower_range_value;
					$request->upper_range = $request->upper_ranges[$i];
					$request->letter_grade = $request->letter_grades[$i];
					$request->grade_point = $request->grade_points[$i];
					$request->qualitative_status = $request->qualitative_statuses[$i];
					$request->description = $request->descriptions[$i];
					$this->grid->create('rmis_grade_point_informations', $columns, $request, 'id');
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
        $data= $this->grid->read('rmis_gradings', array('rmis_gradings.id', 'rmis_gradings.id as grading_id', 'grading_title', 'effect_date'), $request);       
        echo json_encode($data, JSON_NUMERIC_CHECK);
    }
    public function dataDestroy(){   
        header('Content-Type: application/json');
        $request = json_decode(file_get_contents('php://input'));
        $data = $this->grid->destroy('rmis_gradings', $request->models, 'id'); 
		$data = $this->grid->destroy('rmis_grade_point_informations', $request->models, 'grading_id');
        echo json_encode($data , JSON_NUMERIC_CHECK); 
    }
    	
	public function dataUpdate($request){
        $request = json_decode($request);
		
        $this->form_validation->set_rules($this->grading->validation);
        $this->grading->isValidate((array) $request);
        if ($this->form_validation->run() === false) {
            header("HTTP/1.1 500 Internal Server Error");
            echo "Wrong data ! try again" ;
            exit;
        }
       
        $columns = array('id','grading_title', 'effect_date');
		$columns[] = 'organization_id';
		$request->organization_id = 1;
        $columns[] = 'updated_at';
        $request->updated_at = date('Y-m-d H:i:s');            
        $columns[] = 'updated_by';
        $request->updated_by = 1;
        
        $data= $this->grid->update('rmis_gradings', $columns, $request, 'id');
		
		$columns = array('lower_range', 'upper_range','letter_grade','grade_point','qualitative_status','description','grading_id');
		$request->grading_id = $request->id;
		$i=0;
		if(!empty($request->lower_ranges)>0){
			$this->grading->clean_gradePointInformation($request->grading_id);
			foreach($request->lower_ranges as $lower_range_key=>$lower_range_value){
				if($lower_range_value!=NULL){
					$request->lower_range = $lower_range_value;
					$request->upper_range = $request->upper_ranges[$i];
					$request->letter_grade = $request->letter_grades[$i];
					$request->grade_point = $request->grade_points[$i];
					$request->qualitative_status = $request->qualitative_statuses[$i];
					$request->description = $request->descriptions[$i];
					$this->grid->create('rmis_grade_point_informations', $columns, $request, 'id');
					$i++;	
				}
			}
		}

        $data['success'] ="Data updated successfuly.";
    }

	public function deleteGradePoint(){
		$grade_point_id = $this->input->post('grade_point_id');
		$this->grading->deleteGradePointInformation($grade_point_id);
	}
} 
?>