<?php

class Sample_information extends Doctrine_Record {

	public function setTableDefinition() {
		$this -> hasColumn('Submission_date', 'varchar', 15);
		$this -> hasColumn('Lab_ref_no', 'int', 15);
		$this -> hasColumn('Generic_brand_name', 'varchar', 35);
		$this -> hasColumn('Chemical_name', 'varchar', 35);
		$this -> hasColumn('Description', 'varchar', 255);
		$this -> hasColumn('Presentation', 'int', 15);
		$this -> hasColumn('Label_claim', 'varchar', 35);
		$this -> hasColumn('Batch_no', 'varchar', 35);
		$this -> hasColumn('Product_no', 'varchar', 35);
		$this -> hasColumn('Manufacture_date', 'varchar', 15);
		$this -> hasColumn('Expiry_date', 'varchar', 15);
		$this -> hasColumn('Client_name', 'int', 15);
		$this -> hasColumn('Client_address', 'varchar', 35);
		$this -> hasColumn('Client_reference', 'varchar', 35);
		$this -> hasColumn('Manufacturer', 'varchar', 35);
		$this -> hasColumn('Country_of_origin', 'varchar', 35);
		$this -> hasColumn('Samples_issued', 'int', 15);
		$this -> hasColumn('Samples_returned', 'int', 15);
		$this -> hasColumn('Tests_required', 'varchar', 255);
		$this -> hasColumn('Tests_required_limit', 'varchar', 255);
		$this -> hasColumn('Analyst', 'varchar', 35);
		$this -> hasColumn('Checker', 'varchar', 35);
		$this -> hasColumn('Approver', 'varchar', 35);
		$this -> hasColumn('Date', 'varchar', 15);
	}//end setTableDefinition

	public function setTableName() {
		$this -> setTableName('sample_information');
	}//end setTableName

	public function getAll() {
		$query = Doctrine_Query::create() -> select("*") -> from("sample_information");
		$sampleData = $query -> execute();
		return $sampleData;
	}//end getAll
	
	public function getAllHydrated() {
		$query = Doctrine_Query::create() -> select("*") -> from("sample_information");
		$sampleData = $query -> execute(array(), Doctrine::HYDRATE_ARRAY);
		return $sampleData;
	}
	

}//end class
