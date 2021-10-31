<?php

require_once "conect.class.php";



class Cars {



	public function __construct(){}
	
	private $id;

	private $car_type;

	private $image_path;

	public function getId() {
		return $this->id;
	}

	public function getCarType() {
		return $this->car_type;
	}
	
	public function getImagePath() {
		return $this->image_path;
	}
	


	

	public  function initSelfR($row) {

		$this->id 			 = $row["id"];
		$this->car_type		 = $row["car_type"];
		$this->image_path	 = $row["image_path"];
	}	

	

	public static function getCars(){

		$con = Conect::connectToDB();

		$result = mysqli_query($con,"SELECT * FROM `cars_type`" );

		$product = array();

		while ($row = mysqli_fetch_array($result))  {

			$prod = new Cars();

			$prod->initSelfR($row);

			$product[] = $prod;

		}

		mysqli_close($con);

		return  $product;

	}	




}





?>