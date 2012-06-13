<?php

class Tests extends Doctrine_Record {
	
	public function setTableDefinition() {
	$this->hasColumn('test_name','string', 45);
	}


	public function setUp() {
		$this -> setTableName('tests');
		
	}//end setUp



	public function getAll() {
		$query = Doctrine_Query::create() -> select("*") -> from("tests");
		$testData = $query -> execute();
		return $testtData;
	}//end getall

}

?>