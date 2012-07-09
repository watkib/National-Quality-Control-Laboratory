<?php

class Request extends Doctrine_Record {

	public function setTableDefinition() {
		$this -> hasColumn('Applicant_Name', 'varchar', 25);
		$this -> hasColumn('Applicant_Address', 'varchar', 25);
		$this -> hasColumn('Contact_Name', 'varchar', 25);
		$this -> hasColumn('Contact_Telephone', 'int', 15);
		$this -> hasColumn('Product_Name', 'varchar', 25);
		$this -> hasColumn('Dosage_Form', 'varchar', 255);
		$this -> hasColumn('Manufacturer_Name', 'varchar', 25);
		$this -> hasColumn('Manufacturer_Address', 'varchar', 25);
		$this -> hasColumn('Batch_no', 'varchar', 25);
		$this -> hasColumn('Expiry_date', 'varchar', 15);
		$this -> hasColumn('Manufacture_Date', 'varchar', 15);
		$this -> hasColumn('Active_Ingredients', 'varchar', 255);
		$this -> hasColumn('Quantity', 'int', 15);
		$this -> hasColumn('Applicant_reference_number', 'varchar', 25);
		$this -> hasColumn('Test', 'int', 15);
		$this -> hasColumn('Designator_Name', 'varchar', 25);
		$this -> hasColumn('Designation', 'varchar', 20);
		$this -> hasColumn('Designation_date', 'varchar', 15);
		$this -> hasColumn('Status', 'int', 5);
		$this -> hasColumn('Client_Number', 'varchar', 20);
		$this -> hasColumn('Request_id', 'int', 25);
	}

	public function setUp() {
		$this -> setTableName('Request');
	}//end setUp

	public function getAll() {
		$query = Doctrine_Query::create() -> select("*") -> from("Request");
		$requestData = $query -> execute();
		return $requestData;
	}//end getall

	public function getAllHydrated() {
		$query = Doctrine_Query::create() -> select("Batch_no,Product_Name,Quantity,Expiry_date,Designator_Name,Designation,Designation_date,Applicant_reference_number") -> from("Request");
		$requestData = $query -> execute(array(), Doctrine::HYDRATE_ARRAY);
		return $requestData;
	}

	public function getRequest($id) {
		$query = Doctrine_Query::create() -> select("*") -> from("Request") -> where("Request_id = $id");
		$requestData = $query -> execute();
		return $requestData;
	}//end getRequest

}
?>