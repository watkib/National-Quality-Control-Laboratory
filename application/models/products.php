<?php

class Products extends Doctrine_Record {
	
	public function setTableDefinition() {
		
	$this->hasColumn('name','string', 45);
	$this->hasColumn('presentation','string', 200);
	$this->hasColumn('batch_no','integer', 30);
	$this->hasColumn('manufacture_date','date');
	$this->hasColumn('expiry_date','date');
	$this->hasColumn('active_ingredient','string', 45);
	$this->hasColumn('active_ingredient_amount','integer',11);	
	$this->hasColumn('quantity_submitted','string', 45);
	
	}

	public function setUp() {
		$this -> setTableName('products');
		
	}//end setUp


	public function getAll() {
		$query = Doctrine_Query::create() -> select("*") -> from("products");
		$productData = $query -> execute();
		return $productData;
	}//end getall

}

?>