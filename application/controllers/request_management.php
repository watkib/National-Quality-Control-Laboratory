<?php
class Request_Management extends MY_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index() {
		$this -> listing();
	}

	public function listing() {
		$data = array();
		$data['settings_view'] = "requests_made";
		$data['request_details'] = Request::getAllHydrated();
		$this -> table -> set_heading(array('id', 'Product_Name', 'Quantity,Batch_no', 'Expiry_date', 'Designator_Name', 'Designation', 'Designation_date', 'Applicant_reference_number'));
		$this -> base_params($data);
	}//end listing

	public function add() {
		$data['title'] = "Add New Request";
		$data['clients'] = Client::getAll();
		$data['sample_id'] = Sample_Information::getAll();
		$data['scripts'] = array("jquery-ui.js");
		$data['settings_view'] = "request_v";
		$this -> base_params($data);
	}//end add

	public function save() {

	}//end save

	public function base_params($data) {
		$data['title'] = "Request Management";
		$data['styles'] = array("jquery-ui.css");
		$data['scripts'] = array("jquery-ui.js");
		$data['quick_link'] = "request";
		$data['content_view'] = "settings_v";
		$data['banner_text'] = "NQCL Settings";
		$data['link'] = "settings_management";

		$this -> load -> view('template', $data);
	}//end base_params

}
