<?php

class Client_Management extends MY_Controller{
	function __construct(){
		parent::__construct();
	}//end constructor
	
	public function index(){
		$this -> listing();
	}//end index
	
	public function listing(){
		$data = array();
//		$data['title'] = "Existing Clients";
		$data['settings_view'] = "clients_v";
		$data['client_details'] = Client::getAllHydrated();
		$this -> table -> set_heading(array('id', 'Client Name', 'Client Address','Client Number', 'Contact Person', 'Contact Phone'));
		$this -> base_params($data);
	}//end listing
		
	public function save(){
		$valid = $this -> _validate_submission();
		if($valid == false){
			$this -> listing();
		}else{
			$client_name = $this -> input -> post("client_name");
			$client_address = $this -> input -> post("client_address");
			$client_number = $this -> input -> post("client_number");
			$contact_person = $this -> input -> post("contact_person");
			$contact_phone = $this -> input -> post("contact_phone");
			
			$client = new Client();
			$client -> Name = $client_name;
			$client -> Address = $client_address;
			$client -> Client_number = $client_number;
			$client -> Contact_person = $contact_person;
			$client -> Contact_phone = $contact_phone;
						
			$client -> save();
			redirect("client_management/listing");
		}//end else
	}//end save
	
	private function _validate_submission() {
		$this -> form_validation -> set_rules('client_name', 'Client Name', 'trim|required|min_length[2]|max_length[25]');
		$this -> form_validation -> set_rules('client_address', 'Client Address', 'trim|required|min_length[2]|max_length[25]');
		$this -> form_validation -> set_rules('client_number', 'Client Number', 'trim|required|min_length[2]|max_length[15]');
		$this -> form_validation -> set_rules('contact_person', 'Contact Person', 'trim|required|min_length[2]|max_length[25]');
		$this -> form_validation -> set_rules('contact_phone', 'Contact Telephone Number', 'trim|required|min_length[10]|max_length[10]');
		return $this -> form_validation -> run();
	}//end validate_submission
	
	public function base_params($data) {
		$data['title'] = "Client Management";	
		$data['styles'] = array("jquery-ui.css");
		$data['scripts'] = array("jquery-ui.js");
		$data['quick_link'] = "client";
		$data['content_view'] = "settings_v";
		$data['banner_text'] = "NQCL Settings";
		$data['link'] = "settings_management";
		
		$this -> load -> view('template',$data);
	}//end base_params
}//end class
