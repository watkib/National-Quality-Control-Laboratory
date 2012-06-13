<?php 

class Clients extends Doctrine_Record {
	
	public function setTableDefinition() {
		
	$this->hasColumn('name','string', 45);
	$this->hasColumn('address','string', 45);
	
	}


	public function setUp() {
		$this -> setTableName('clients');
		
	}//end setUp



	public function getAll() {
		$query = Doctrine_Query::create() -> select("*") -> from("clients");
		$clientData = $query -> execute();
		return $clientData;
	}//end getall

}


?>