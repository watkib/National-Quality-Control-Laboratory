<?php
 
class Departments extends Doctrine_Record {
	
	public function setTableDefinition() {
	
	$this->hasColumn('dept_name','string', 45);
}
	public function setUp() {
		$this -> setTableName('departments');
		
	}//end setUp


	public function getAll() {
		$query = Doctrine_Query::create() -> select("*") -> from("departments");
		$departmentData = $query -> execute();
		return $departmentData;
	}
}




?>