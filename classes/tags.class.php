<?php
require_once "conect.class.php";

class Tags{
		
	
	public function __construct(){}
	
	private $id;
	private $name;
	private $sort;
	private $category_name;
	private $color;
	
	
	
	public function getId() {
		return $this->id;
	}
	public function getName() {
		return $this->name;
	}
	public function getColor() {
		return $this->color;
	}
	public function getCategiry_title() {
		return $this->category_name;
	}
	public function getSort() {
		return $this->sort;
	}
	
	
	
	public  function initSelfR($row) {
		$this->id 			 = $row["id"];
		$this->name			 = $row["name"];
		$this->color		 = $row["color"];
		$this->category_name= $row["category_name"];
		$this->sort			 = $row["sort"];
	}
	
	
	
	public static function getTagsTitles(){
		
		$con = Conect::connectToDB();
		
		$result = mysqli_query($con,"SELECT distinct `category_title` FROM `category` where `type`='tag'");
		
		$product = array();
		
		while ($row = mysqli_fetch_array($result))  {
			
			
			$product[] = $row;
			
		}
		
		mysqli_close($con);
		
		return  $product;
		
	}
	
	
// 		public static function getAllTagsPerTitle($title){
		
// 		$con = Conect::connectToDB();
		
// 		$result = mysqli_query($con,"SELECT *  FROM `product` WHERE `category_name`='$title'");
		
// 		$product = array();
		
// 		while ($row = mysqli_fetch_array($result))  {
			
// 			$prod = new Tags();
			
// 			$prod->initSelfR($row);
			
// 			$product[] = $prod;
			
// 		}
		
// 		mysqli_close($con);
		
// 		return  $product;
		
// 	}			
	
	
}





?>