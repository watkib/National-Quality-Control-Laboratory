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
		$data['settings_view'] = "sample_v";
		$data['samples_details'] = Sample_information::getAllHydrated();
		$this -> table -> set_heading(array('id', 'Submission Date', 'Lab Reference Number', 'Generic Brand Name','Chemical Name','Description', 'Presentation', 'Label Claim', 'Batch Number', 'Product Number','Manufacture Date','Expiry Date','Client Name','Client Address', 'Client Reference','Manufacturer','Country of Origin','Samples Issued','Samples Returned','Tests Required','Tests Required Limits','Analyst', 'Checker','Approver','Date'));
		$this -> base_params($data);
	}//end listing
	
	public function add(){
		$data['settings_view'] = "sample_add_v";
		$data['title'] = "Add New Sample Information";
		$this -> base_params($data);
	}//end add
	
	
	public function save(){
		$valid = $this -> _validate_submission();
		//$valid = true;
		if($valid == false){
			$data['settings_view'] = "sample_add_v";
			$this -> base_params($data);
		}else{
		
		$tests_required = $this -> input -> post("tests_required");
		
		for ($i=0; $i < count($tests_required); $i++) {
			 
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
			$tests_required = $this -> input -> post("tests_required");
			$tests_required_limit = $this -> input-> post("tests_required_limit");
			$analyst = $this -> input -> post("analyst");
			$checker = $this -> input -> post("checker");
			$approver = $this -> input -> post("approver");
			
			$sample = new Sample_Information();
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
			$sample -> Tests_required = $tests_required[$i];
			$sample -> Tests_required_limit = $tests_required_limit[$i] ;
			$sample -> Analyst = $analyst;
			$sample -> Checker = $checker;
			$sample -> Approver = $approver;
			$sample -> Date = date("Y-m-d");
			$sample -> save();
			
			}	

			redirect("index.php/sample_controller/listing");
		}//end else
	}//end save
	
	private function _validate_submission() {
		$this -> form_validation -> set_rules('submission_date', 'Date of Submission', 'trim|required');
		$this -> form_validation -> set_rules('lab_ref_no', 'Lab Reference Number', 'trim|required');
		$this -> form_validation -> set_rules('generic_brand_name', 'Generic Brand Name', 'trim|required');
		$this -> form_validation -> set_rules('chemical_name', 'Chemical Name', 'trim|required');
		$this -> form_validation -> set_rules('description', 'Descritption', 'trim|required');
		$this -> form_validation -> set_rules('presentation', 'Presentation', 'trim|required');
		$this -> form_validation -> set_rules('label_claim', 'Label Claim', 'trim|required');
		$this -> form_validation -> set_rules('batch_no', 'Batch Number', 'trim|required');
		$this -> form_validation -> set_rules('product_no', 'Product Number', 'trim|required');
		$this -> form_validation -> set_rules('manufacture_date', 'Descritption', 'trim|required');
		$this -> form_validation -> set_rules('expiry_date', 'Date of Expiry', 'trim|required');
		$this -> form_validation -> set_rules('client_name', 'Client Name', 'trim|required');
		$this -> form_validation -> set_rules('client_address', 'Client Address', 'trim|required');
		$this -> form_validation -> set_rules('client_reference', 'Client Reference Number', 'trim|required');
		$this -> form_validation -> set_rules('manufacturer', 'Manufacturer', 'trim|required');
		$this -> form_validation -> set_rules('country_of_origin', 'Country of Origin', 'trim|required');
		$this -> form_validation -> set_rules('samples_issued', 'Samples Issued', 'trim|required');
		$this -> form_validation -> set_rules('samples_returned', 'Samples Returned', 'trim|required');
		$this -> form_validation -> set_rules('tests_required', 'Tests Required', 'required');
		$this -> form_validation -> set_rules('tests_required_limit', 'Tests Required Limits', 'required');
		$this -> form_validation -> set_rules('analyst', 'Analyst', 'trim|required');
		$this -> form_validation -> set_rules('checker', 'Checker', 'trim|required');
		$this -> form_validation -> set_rules('approver', 'Approver', 'trim|required');
		return $this -> form_validation -> run();

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
