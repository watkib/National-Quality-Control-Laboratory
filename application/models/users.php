<?php

class Users extends Doctrine_Record {

	public function setTableDefinition() {
		$this -> hasColumn('Name', 'varchar', 35);
		$this -> hasColumn('Username', 'varchar', 15);
		$this -> hasColumn('Email', 'varchar', 35); 
	}

	public function setUp() {
		$this -> setTableName('users');
	}//end setUp

	public function getAll() {
		$query = Doctrine_Query::create() -> select("*") -> from("users");
		$userData = $query -> execute();
		return $userData;
	}//end getall

	public function getAllHydrated() {
		$query = Doctrine_Query::create() -> select("Name,Username,Email") -> from("users");
		$userData = $query -> execute(array(), Doctrine::HYDRATE_ARRAY);
		return $userData;
	}

}
?>