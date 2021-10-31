<?php

require_once "conect.class.php";

class ProdType {

	public function __construct(){}

	private $product_name;
	private $product_type;
	private $type_1;
	private $type_2;
	private $type_3;
	private $type_4;
	private $type_5;

	public function getName() {
		return $this->product_name;
	}
	public function getTypeName() {
		return $this->product_type;
	}
	public function getType1() {
		return $this->type_1;
	}
	public function getType2() {
		return $this->type_2;
	}
	public function getType3() {
		return $this->type_3;
	}

	public function getType4() {
		return $this->type_4;
	}
	public function getType5() {
		return $this->type_5;
	}
	
	private function initSelf($row) {

		$this->product_name	   		 = $row["product_name"];
		
		$this->product_type	   		 = $row["product_type"];
		
		if(!empty($row["product_type"])){
			$this->product_type       = $row["product_type"];
		}		
		if(!empty($row["type_1"])){
			$this->type_1          		 = $row["type_1"];
		}		
		if(!empty($row["type_2"])){
			$this->type_2          		 = $row["type_2"];
		}		
		if(!empty($row["type_3"])){
			$this->type_3          		 = $row["type_3"];
		}
		if(!empty($row["type_4"])){
			$this->type_4          		 = $row["type_4"];
		}
		if(!empty($row["type_5"])){
			$this->type_5          		 = $row["type_5"];
		}

	}


	public static function getProductByName($pname){
		$con = Conect::connectToDB();
		$result = mysqli_query($con,"SELECT * FROM `product_type` WHERE `product_name` ='$pname'");
		$product = array();
		while ($row = mysqli_fetch_array($result))  {
			$prod = new ProdType();
			$prod->initSelf($row);
			$product[] = $prod;
		}
		mysqli_close($con);
		return  $product;
	}




	/*
	 *
	 SELECT * FROM `products`
	 INNER JOIN `product_type`
	 on `products`.`type` = `product_type`.`type_name` WHERE `id`=1805	 *
	 * */

}

?>
