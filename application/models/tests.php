<?php

class Tests extends Doctrine_Record {

	public function setTableDefinition() {
		$this -> hasColumn('Name', 'varchar', 35);
		$this -> hasColumn('Charge', 'double');
		$this -> hasColumn('Department', 'varchar', 25);
		$this -> hasColumn('Alias', 'varchar', 25);
	}

	public function setUp() {
		$this -> setTableName('Tests');
	}//end setUp

	public function getAll() {
		$query = Doctrine_Query::create() -> select("*") -> from("Tests");
		$testData = $query -> execute();
		return $testData;
	}//end getall

	public function getWetChemistry() {
		$query = Doctrine_Query::create() -> select("*") -> from("Tests") -> where('Department = 1');
		$testData = $query -> execute();
		return $testData;
	}//end getall

	public function getMicrobiologicalAnalysis() {
		$query = Doctrine_Query::create() -> select("*") -> from("Tests") -> where('Department = 2');
		$testData = $query -> execute();
		return $testData;
	}//end getall

	public function getMedicalDevices() {
		$query = Doctrine_Query::create() -> select("*") -> from("Tests") -> where('Department = 3');
		$testData = $query -> execute();
		return $testData;
	}//end getall

	public function getAllHydrated() {
		$query = Doctrine_Query::create() -> select("Name,Charge") -> from("Tests");
		$testData = $query -> execute(array(), Doctrine::HYDRATE_ARRAY);
		return $testData;
	}

}
?>