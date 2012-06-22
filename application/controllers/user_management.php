<?php

class User_Management extends MY_Controller{
	function __construct(){
		parent::__construct();
	}//end constructor
	
	public function index(){
		$this -> listing();
	}//end index
	
	public function listing(){
		$data = array();
//		$data['title'] = "Existing Clients";
		$data['settings_view'] = "users_v";
		$data['users_details'] = Users::getAllHydrated();
		$this -> table -> set_heading(array('id', 'Name', 'Username', 'Email'));
		$this -> base_params($data);
	}//end listing
		
	public function save(){
		$valid = $this -> _validate_submission();
		if($valid == false){
			$this -> listing();
			show_error('Error Occurred, Please refresh page and retry User Add.');
		}else{
			$name = $this -> input -> post("name");
			$username = $this -> input -> post("username");
			$email = $this -> input -> post("email");
			
			$user = new Users();
			$user -> Name = $name;
			$user -> Username = $username;
			$user -> Email = $email;
		
			$user -> save();
			redirect("user_management/listing");
		}//end else
	}//end save
	
	private function _validate_submission() {
		$this -> form_validation -> set_rules('name', 'Full Name', 'trim|required|min_length[2]|max_length[25]');
		$this -> form_validation -> set_rules('username', 'Username', 'trim|required|min_length[2]|max_length[25]|is_unique[users.username]');
		$this -> form_validation -> set_rules('email', 'User Email Address', 'trim|valid_email|required|is_unique[users.email]');
		return $this -> form_validation -> run();
	}//end validate_submissionis
	
	public function base_params($data) {
		$data['title'] = "User Management";	
		$data['styles'] = array("jquery-ui.css");
		$data['scripts'] = array("jquery-ui.js");
		$data['quick_link'] = "users";
		$data['content_view'] = "settings_v";
		$data['banner_text'] = "NQCL Settings";
		$data['link'] = "settings_management";
		
		$this -> load -> view('template',$data);
	}//end base_params
}//end class
