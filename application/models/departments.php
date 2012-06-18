<?php

class Departments extends Doctrine_Record {

	public function setTableDefinition() {
		$this -> hasColumn('Name', 'varchar', 25);
	}

	public function setUp() {
		$this -> setTableName('Departments');
	}//end setUp

	public function getAll() {
		$query = Doctrine_Query::create() -> select("*") -> from("Departments");
		$departmentData = $query -> execute();
		return $departmentData;
	}

}
?>