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
		$this -> load ->database();
		$sql = 'select distinct batch_no,product_name,manufacture_date,expiry_date,quantity,request_id from request';
		$query = $this -> db ->query($sql);
		$data['batches'] = $query ->result_array();
		$this -> base_params($data);
	}//end listing

	public function add() {
		$data['title'] = "Add New Request";
		$data['clients'] = Client::getAll();
		$data['sample_id'] = Sample_Information::getAll();
		$data['wetchemistry'] = Tests::getWetChemistry();
		$data['microbiologicalanalysis'] = Tests::getMicrobiologicalAnalysis();
		$data['medicaldevices'] = Tests::getMedicalDevices();
		$data['scripts'] = array("jquery-ui.js");
		$data['scripts'] = array("jquery.ui.core.js","jquery.ui.datepicker.js","jquery.ui.widget.js");		
		$data['styles'] = array("jquery.ui.all.css");
		$data['settings_view'] = "request_v";
		$this -> base_params($data);
	}//end add

	public function save() {
			
		$test =$this -> input -> post("test");
		$applicant_name = $this -> input -> post("applicant_name");
		$applicant_address = $this -> input -> post("applicant_address");
		$contact_name = $this -> input -> post("contact_name");
		$contact_telephone = $this -> input -> post("contact_telephone");
		$product_name = $this -> input -> post("product_name");
		$dosage_form = $this -> input -> post("dosage_form");
		$manufacturer_name = $this -> input -> post("manufacturer_name");
		$manufacturer_address = $this -> input -> post("manufacturer_address");
		$batch_no = $this -> input -> post("batch_no");
		$expiry_date = $this -> input -> post("expiry_date");
		$manufacture_date = $this -> input -> post("manufacture_date");
		$active_ingredients = $this -> input -> post("active_ingredients");
		$quantity = $this -> input -> post("quantity");
		$applicant_reference_number = $this -> input -> post("applicant_reference_number");
		$client_number = $this -> input -> post("client_details");
		$designator_name = $this -> input -> post("designator_name");
		$designation = $this -> input -> post("designation");
		$designation_date = $this -> input -> post("designation_date");
		
		$counter = 0;
		foreach($test as $tests){
			$request = new Request();
			
			$request -> Test = $tests[$counter];
			$request -> Applicant_Name = $applicant_name;
			$request -> Applicant_Address = $applicant_address;
			$request -> Contact_Name = $contact_name;
			$request -> Contact_Telephone = $contact_telephone;
			$request -> Product_Name = $product_name;
			$request -> Dosage_Form = $dosage_form;
			$request -> Manufacturer_Name = $manufacturer_name;
			$request -> Manufacturer_Address = $manufacturer_address;
			$request -> Batch_no = $batch_no;
			$request -> Expiry_date = $expiry_date;
			$request -> Manufacture_Date = $manufacture_date;
			$request -> Active_Ingredients = $active_ingredients;
			$request -> Quantity = $quantity;
			$request -> Applicant_reference_number = $applicant_reference_number;
			$request -> Client_Number = $client_number;
			$request -> Designator_Name = $designator_name;
			$request -> Designation = $designation;
			$request -> Designation_date = $designation_date;
			$request -> save();
		}

		//passing the variables posted above to the class variable
		
		redirect("request_management/listing");

	}//end save
	
	public function requests($id){
		$data['title'] = "Request Information";
		$data['settings_view'] = "requests_v";
		$requestInformation = Request::getRequest($id);
		$data['requestInformation'] = $requestInformation;
		$this -> base_params($data);
	}

	public function base_params($data) {
		$data['title'] = "Request Management";
		$data['styles'] = array("jquery-ui.css");
		$data['scripts'] = array("jquery-ui.js");
		$data['scripts'] = array("SpryAccordion.js");
		$data['styles'] = array("SpryAccordion.css");
		$data['quick_link'] = "request";
		$data['content_view'] = "settings_v";
		$data['banner_text'] = "NQCL Settings";
		$data['link'] = "settings_management";

		$this -> load -> view('template', $data);
	}//end base_params

}
