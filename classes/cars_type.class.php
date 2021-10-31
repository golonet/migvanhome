<?php

require_once "conect.class.php";

class CarsType {

	public function __construct(){}

	private $cars_type_id; 
	private $model;
	private $year;
	private $generation;
	private $low_beam;
	private $high_beam;
	private $front_park_lamp;
	private $stop_tail_lamp;
	private $third_brake_lamp;
	private $front_fog_lamp;
	private $rear_fog_lamp;
	private $front_indicator;
	private $rear_indicator;
	private $side_indicator;
	private $reversing_lamp;
	private $number_plate_lamp;
	private $left_wiper;
	private $right_wiper;
	private $adapter_type;
	private $background_color;

	
	public function getCarTypeId() {
		return $this->cars_type_id;
	}
	public function getModel() {
		return $this->model;
	}
	public function getYear() {
		return $this->year;
	}
	public function getGeneration() {
		return $this->generation;
	}	
	
	public function getLowBeam() {
		return $this->low_beam;
	}
	public function getHighBeam() {
		return $this->high_beam;
	}
	public function getFrontParkLamp() {
		return $this->front_park_lamp;
	}
	public function getStopTailLamp() {
		return $this->stop_tail_lamp;
	}
	public function getThirdBrakeLamp() {
		return $this->third_brake_lamp;
	}	
	public function getFrontFogLamp() {
		return $this->front_fog_lamp;
	}	
	public function getRearFogLamp() {
		return $this->rear_fog_lamp;
	}	
	public function getFrontIndicator() {
		return $this->front_indicator;
	}	
	public function getRearIndicator() {
		return $this->rear_indicator;
	}	
	public function getSideIndicator() {
		return $this->side_indicator;
	}	
	public function getReversingLamp() {
		return $this->reversing_lamp;
	}	
	public function getNumberPlateLamp() {
		return $this->number_plate_lamp;
	}	
	public function getLeftWiper() {
		return $this->left_wiper;
	}	
	public function getRightWiper() {
		return $this->right_wiper;
	}									
	public function getAdapterType() {
		return $this->adapter_type;
	}
	public function getBackgroundColor() {
		return $this->background_color;
	}	
	
	
	
	public  function initSelfR($row) {
		
		$this->cars_type_id = $row["cars_type_id"]; 
		$this->model = $row["model"];
		$this->year = $row["year"];
		$this->generation = $row["generation"];		
		$this->low_beam = $row["low_beam"];
		$this->high_beam = $row["high_beam"];
		$this->front_park_lamp = $row["front_park_lamp"];
		$this->stop_tail_lamp = $row["stop_tail_lamp"];
		$this->third_brake_lamp = $row["third_brake_lamp"];
		$this->front_fog_lamp = $row["front_fog_lamp"];
		$this->rear_fog_lamp = $row["rear_fog_lamp"];
		$this->front_indicator = $row["front_indicator"];
		$this->rear_indicator = $row["rear_indicator"];
		$this->side_indicator = $row["side_indicator"];
		$this->reversing_lamp = $row["reversing_lamp"];
		$this->number_plate_lamp = $row["number_plate_lamp"];
		$this->left_wiper  = $row["left_wiper"];
		$this->right_wiper  = $row["right_wiper"];
		$this->adapter_type  = $row["adapter_type"];
		$this->background_color= $row["background_color"];												
	
	}	

	

	public static function getCarType($type,$normag){

		$con = Conect::connectToDB();
		
		$orderby="model".","."year";

		
		if($normag=='nora'){
			$result = mysqli_query($con,"SELECT * FROM `cars_type_table` WHERE  `cars_type_id` = $type AND `type_nor`=1 ORDER BY $orderby" );
		}
		elseif ($normag=='mag'){
			$result = mysqli_query($con,"SELECT * FROM `cars_type_table` WHERE  `cars_type_id` = $type AND `type_mag`=1 ORDER BY $orderby" );
		}
		
		$product = array();

		while ($row = mysqli_fetch_array($result))  {

			$prod = new CarsType();

			$prod->initSelfR($row);

			$product[] = $prod;

		}

		mysqli_close($con);

		return  $product;

	}	





}





?>