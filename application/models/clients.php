<?php

class Client extends Doctrine_Record {

	public function setTableDefinition() {
		$this -> hasColumn('Name', 'varchar', 25);
		$this -> hasColumn('Address', 'varchar', 25);
		$this -> hasColumn('Client_number', 'varchar', 15);
		$this -> hasColumn('Contact_person', 'varchar', 25);
		$this -> hasColumn('Contact_phone', 'int', 10);
	}

	public function setUp() {
		$this -> setTableName('Clients');
	}//end setUp

	public function getAll() {
		$query = Doctrine_Query::create() -> select("*") -> from("Clients");
		$clientData = $query -> execute();
		return $clientData;
	}//end getall

	public function getAllHydrated() {
		$query = Doctrine_Query::create() -> select("Name,Address,Client_number,Contact_person,Contact_phone") -> from("Client");
		$clientData = $query -> execute(array(), Doctrine::HYDRATE_ARRAY);
		return $clientData;
	}

}
?>