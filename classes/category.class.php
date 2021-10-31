<?php

require_once "conect.class.php";



class Category {



	public function __construct(){}

	private $id;
	private $name;
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

	public  function initSelfR($row) {
		$this->id 			 = $row["id"];
		$this->name			 = $row["name"];
		$this->color		 = $row["color"];
	}	

	

	public static function getSearchCategory(){

		$con = Conect::connectToDB();

		$result = mysqli_query($con,"SELECT * FROM `category`" );

		$product = array();

		while ($row = mysqli_fetch_array($result))  {

			$prod = new Category();

			$prod->initSelfR($row);

			$product[] = $prod;

		}

		mysqli_close($con);

		return  $product;

	}	

	



	public static function getCategoryTitle(){

		$con = Conect::connectToDB();

		$result = mysqli_query($con,"SELECT DISTINCT `category_title` FROM `category` where `type`is null order by `sort` ASC" );

		while ($row = mysqli_fetch_array($result))  {



			$product[] = $row;

		}

		mysqli_close($con);

		return  $product;

	}	


		public static function getCategoryNameByTitle($cat_name){
		$con = Conect::connectToDB();
		$result = mysqli_query($con,"SELECT distinct * FROM `category` WHERE `category_title`='$cat_name' and `type`='tag'");
		$product = array();
		while ($row = mysqli_fetch_array($result))  {
			$product[] = $row;
		}
		mysqli_close($con);
		return  $product;
	}	


}





?>