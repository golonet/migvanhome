<?php
require_once "conect.class.php";

class LeftSideLinkes {

	public function __construct(){}

	private $name;
	private $image;

	public function getName() {
		return $this->name;
	}
	public function getImage() {
		return $this->image;
	}

	public  function initSelfR($row) {
		$this->name 	= $row["name"];
		$this->image    = $row["image"];
	}	

	
	public static function getManufacturerNames(){
		$con = Conect::connectToDB();
		$result = mysqli_query($con,"SELECT * FROM  `manufacturerlinks` ORDER BY `name` ASC" );
		$product = array();
		while ($row = mysqli_fetch_array($result))  {
			$prod = new LeftSideLinkes();
			$prod->initSelfR($row);
			$product[] = $prod;
		}
		mysqli_close($con);
		return  $product;
	}
	
	public static function getManufacturer(){
		$con = Conect::connectToDB();
		$result = mysqli_query($con,"SELECT * FROM `manufacturerlinks` ORDER BY `name` ASC" );
		$manufacturer = array();
		while ($row = mysqli_fetch_array($result))  {
			$prod = new LeftSideLinkes();
			$prod->initSelfR($row);
			$manufacturer[] = $prod;
		}
		mysqli_close($con);
		return  $manufacturer;
	}
	
	


}


?>