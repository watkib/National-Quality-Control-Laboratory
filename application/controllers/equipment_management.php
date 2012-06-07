<?php

class Equipment_Management extends MY_Controller{
	function __construct(){
		parent::__construct();
	}//end constructor
	
	public function index(){
		$this -> listing();
	}//end index
	
	public function listing(){
		$data = array();
		$data['content_view'] = "equipment_v";
		$data['equipment'] = Equipment::getAll();
		$this -> base_params($data);
	}//end listing
	
	public function add(){
		$data['content_view'] = "equipment_add_v";
		$data['title'] = "Add New Equipment";
		$this -> base_params($data);
	}//end add
	
	public function save(){
		$valid = $this -> _validate_submission();
		if($valid == false){
			$data['content_view'] = "equipment_add_v";
			$this -> base_params($data);
		}else{
			$name = $this -> input -> post("equipment_name");
			$nqcl_code = $this -> input -> post("nqcl_code");
			
			$equipment = new Equipment();
			$equipment -> Name = $name;
			$equipment -> Nqcl_code = $nqcl_code;
			
			$equipment -> save();
			redirect("equipment_management/listing");
		}//end else
	}//end save
	
	private function _validate_submission() {
		$this -> form_validation -> set_rules('equipment_name', 'Equipment Name', 'trim|required|min_length[2]|max_length[25]');
		$this -> form_validation -> set_rules('nqcl_code', 'NQCL Code', 'trim|required|min_length[2]|max_length[25]');
		return $this -> form_validation -> run();
	}//end validate_submission
	
	public function base_params($data) {
		$data['styles'] = array("jquery-ui.css");
		$data['scripts'] = array("jquery-ui.js");
		$data['quick_link'] = "equipment";
		//$data['title'] = "System Settings";
		$data['content_view'] = "equipment_v";
		//$data['banner_text'] = "System Settings";
		//$data['link'] = "settings_management";
		
		$this -> load -> view('equipment_add_v',$data);
	}//end base_params
}//end class