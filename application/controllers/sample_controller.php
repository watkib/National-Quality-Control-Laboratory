<?php

class Sample_Controller extends MY_Controller{
	function __construct(){
		parent::__construct();
	}//end constructor
	
	public function index(){
		$this -> listing();
	}//end index
	
	public function listing(){
		$data = array();
		$data['settings_view'] = "sample_add_v";
		//$data['equipment'] = Equipment::getAll();
		$this -> base_params($data);
	}//end listing
	
	public function add(){
		$data['content_view'] = "sample_add_v";
		$data['title'] = "Add New Sample Information";
		$this -> base_params($data);
	}//end add
	
	public function save(){
		$valid = $this -> _validate_submission();
		if($valid == false){
			$data['content_view'] = "sample_add_v";
			$this -> base_params($data);
		}else{
			$submission_date = $this -> input -> post("submission_date");
			$lab_ref_no = $this -> input -> post("lab_ref_no");
			$generic_brand_name = $this -> input -> post("generic_brand_name");
			$chemical_name = $this -> input -> post("chemical_name");
			$description = $this -> input -> post("description");
			$presentation = $this -> input -> post("presentation");
			$label_claim = $this -> input -> post("label_claim");
			$batch_no = $this -> input -> post("batch_no");
			$product_no = $this -> input -> post("product_no");
			$manufacture_date = $this -> input -> post("manufacture_date");
			$expiry_date = $this -> input -> post("expiry_date");
			$client_name = $this -> input -> post("client_name");
			$client_address = $this -> input -> post("client_address");
			$client_reference = $this -> input -> post("client_reference");
			$manufacturer = $this -> input -> post("manufacturer");
			$country_of_origin = $this -> input -> post("country_of_origin");
			$samples_issued = $this -> input -> post("samples_issued");
			$samples_returned = $this -> input -> post("samples_returned");
			$analyst = $this -> input -> post("analyst");
			$checker = $this -> input -> post("checker");
			$approver = $this -> input -> post("approver");
			
			$sample = new Sample();
			$sample -> Submission_date = $submission_date;
			$sample -> Lab_ref_no = $lab_ref_no;
			$sample -> Generic_brand_name = $generic_brand_name;
			$sample -> Chemical_name = $chemical_name;
			$sample -> Description = $description;
			$sample -> Presentation = $presentation;
			$sample -> Label_claim = $label_claim;
			$sample -> Batch_no = $batch_no;
			$sample -> Product_no = $product_no;
			$sample -> Manufacture_date = $manufacture_date;
			$sample -> Expiry_date = $expiry_date;
			$sample -> Client_name = $client_name;
			$sample -> Client_address = $client_address;
			$sample -> Client_reference = $client_reference;
			$sample -> Manufacturer = $manufacturer;
			$sample -> Country_of_origin = $country_of_origin;
			$sample -> Samples_issued = $samples_issued;
			$sample -> Samples_returned = $samples_returned;
			$sample -> Analyst = $analyst;
			$sample -> Checker = $checker;
			$sample -> Approver = $approver;
			$sample -> Date = date("Y-m-d");
			
			$sample -> save();
			redirect("sample_controller/listing");
		}//end else
	}//end save
	
	private function _validate_submission() {

	}//end validate_submission*/
	
	public function base_params($data) {
		$data['styles'] = array("jquery-ui.css");
		$data['scripts'] = array("jquery-ui.js");
		$data['quick_link'] = "sample";
		$data['title'] = "System Settings";
		$data['content_view'] = "settings_v";
		$data['banner_text'] = "System Settings";
		//$data['link'] = "settings_management";
		
		$this -> load -> view('template',$data);
	}//end base_params
}//end class
