<?php

require_once "conect.class.php";

class Product {

	public function __construct(){}

	private $id;
	private $category_name;
	private $name;
	private $description;	
	private $img_path;
	private $img_path1;
	private $img_path2;
	private $img_path3;
	private $img_path4;
	private $delivery_time;	
	private $warranty;	
	private $model;	
	private $shipment_cost;	
	private $express_cost;
	private $manufacturer_name;		
	private $price;
	private $manufacturer;	
	private $youtube_link;
	private $stock;
	private $warranty_by;
	private $options;
	private $bulk_precent;
	private $bulk_sum;
	private $by_phone;
	private $link_to_manufacturer;
	
	
	
	
	public function getId() {
		return $this->id;
	}
	public function getCategoryName() {
		return $this->category_name;
	}	
	public function getName() {
		return $this->name;
	}
	public function getDescription() {
		return $this->description;
	}
	
	public function getDeliveryTime() {
		return $this->delivery_time;
	}
	public function getWarranty() {
		return $this->warranty;
	}
	public function getModel() {
		return $this->model;
	}
	public function getShipmentCost() {
		return $this->shipment_cost;
	}
	public function getExpressCost() {
		return $this->express_cost;
	}	
	public function getManufacturerName() {
		return $this->manufacturer_name;
	}					
	
	public function getImagePath() {
		return $this->img_path; 
	}	
	public function getImagePath1() {
		return $this->img_path1; 
	}	
	public function getImagePath2() {
		return $this->img_path2; 
	}	
	
	public function getImagePath3() {
		return $this->img_path3;
	}
	public function getImagePath4() {
		return $this->img_path4;
	}
	
	public function getPrice() {
		return $this->price;
	}	
	public function getManufacturer() {
		return $this->manufacturer;
	}	
	public function getYoutubeLink() {
		return $this->youtube_link;
	}	
	
	public function getStock() {
		return $this->stock;
	}	
	public function getWarrantyBy() {
		return $this->warranty_by;
	}			
	public function getBulkPrecent() {
		return $this->bulk_precent;
	}	
	public function getBulkSum() {
		return $this->bulk_sum;
	}	
	public function getByPhone() {
		return $this->by_phone;
	}
	public function getLinkToManufacturer() {
		return $this->link_to_manufacturer;
	}
	
	
	
	private function initSelf($row) {
		$this->id 					 = $row["id"];
		$this->category_name 		 = $row["category_name"];
		$this->name					 = $row["name"];
		$this->description 	 		 = $row["description"];
		$this->img_path			 	 = $row["img_path"];
		$this->img_path1			 = $row["img_path1"];
		$this->img_path2			 = $row["img_path2"];
		
		$this->img_path3			 = $row["img_path3"];
		$this->img_path4			 = $row["img_path4"];
		
		if(empty($this->img_path)){	 $this->img_path = "defult.png";}
		$this->price 	 			 = $row["price"];		
		$this->delivery_time		 = $row["delivery_time"];
		$this->warranty 	 		 = $row["warranty"];
		$this->model 	 			 = $row["model"];
		$this->shipment_cost 	 	 = $row["shipment_cost"];
		$this->express_cost 	 	 = $row["express_cost"];		
		$this->manufacturer_name 	 = $row["manufacturer_name"];												
		$this->manufacturer		     = $row["manufacturer"];
		$this->youtube_link          = $row["youtube_link"];	
		$this->stock          		 = $row["stock"];	
		$this->warranty_by           = $row["warranty_by"];	
		$this->bulk_sum              = $row["bulk_sum"];	
		$this->bulk_precent          = $row["bulk_precent"];		
		$this->by_phone         	 = $row["by_phone"];
		$this->link_to_manufacturer  = $row["link_to_manufacturer"];
		
		

	}

	
	public static function getCategory($cid){
		$con = Conect::connectToDB();
		$result = mysqli_query($con,"SELECT * FROM `products` WHERE `category_name`=$cid ORDER BY name DESC LIMIT 0 ,12" );
		$product = array();
		while ($row = mysqli_fetch_array($result))  {
			$prod = new Product();
			$prod->initSelf($row);
			$product[] = $prod;
		}
		mysqli_close($con);
		return  $product;
	}
	
	

	public  static function getHomePage(){
		$con = Conect::connectToDB();
		$result = mysqli_query($con,"SELECT * FROM `products` ORDER BY name DESC LIMIT 0 ,20" );
		$product = array();
		while ($row = mysqli_fetch_array($result))  {
			$prod = new Product();
			$prod->initSelf($row);
			$product[] = $prod;
		}
		mysqli_close($con);
		return  $product;		
	}

	public static function getProduct($pid){
		$con = Conect::connectToDB();
		$result = mysqli_query($con,"SELECT * FROM `products` WHERE `id`=$pid");
		$product = array();
		while ($row = mysqli_fetch_array($result))  {
			$prod = new Product();
			$prod->initSelf($row);
			$product[] = $prod;
		}
		mysqli_close($con);
		return  $product;
	}	
	
	
	
	public static function getEditList(){
		$con = Conect::connectToDB();
		$result = mysqli_query($con,"SELECT * FROM `products` ORDER BY `name` DESC");
		$product = array();
		while ($row = mysqli_fetch_array($result))  {
			$prod = new Product();
			$prod->initSelf($row);
			$product[] = $prod;
		}
		mysqli_close($con);
		return  $product;
	}	
	
		
	
	public static function getCategoryByPage($cat,$start,$max){
		$con = Conect::connectToDB();
		$result = mysqli_query($con,"SELECT * FROM `products` WHERE `category_name` = '$cat' ORDER BY name DESC LIMIT $start ,$max");
		$software = array();
		while ($row = mysqli_fetch_array($result))  {
			$soft = new Product();
			$soft->initSelf($row);
			$software[] = $soft;
		}
		mysqli_close($con);
		return  $software;
	}	

	
	
	
	public static function getSearchResultsByText($byText,$start,$max,$orderByPrice,$add_search_by_description=''){
		$con = Conect::connectToDB();
		
		//$result = mysqli_query($con,"SELECT * FROM `products` WHERE name like '$byText%' OR manufacturer_name like '$byText%' OR manufacturer like '$byText%' order by name LIMIT $start ,$max");
		// 30.9.2016 changed 
		
		$byText = str_replace("`","",$byText);
		$byText = str_replace("'","",$byText);
		
		if($orderByPrice==1){
			$result = mysqli_query($con,"SELECT * FROM `products` WHERE `name` LIKE '%$byText%' OR `manufacturer_name` = '$byText' OR manufacturer = '$byText' order by CAST(price AS DECIMAL(10,2)) ASC LIMIT $start ,$max");
		}else{
			$result = mysqli_query($con,"SELECT * FROM `products` WHERE `name` LIKE '%$byText%' OR `manufacturer_name` = '$byText' OR manufacturer = '$byText' order by `name` LIMIT $start ,$max");
		}
		
		
		if($add_search_by_description=='1'){
			
			if($orderByPrice==1){
				$result = mysqli_query($con,"SELECT * FROM `products` WHERE `tag` = '$byText' OR `manufacturer_name` = '$byText' OR manufacturer = '$byText' order by CAST(price AS DECIMAL(10,2)) ASC LIMIT $start ,$max");
			}else{
				$result = mysqli_query($con,"SELECT * FROM `products` WHERE `tag` = '$byText' OR `manufacturer_name` = '$byText' OR manufacturer = '$byText' order by `name` LIMIT $start ,$max");
			}
			
		}				
		
		//$result = mysqli_query($con,"SELECT * FROM `products` WHERE name like '%$byText%' limit 0 , 12");
		$product = array(); 
		while ($row = mysqli_fetch_array($result))  {
			$prod = new Product();
			$prod->initSelf($row);
			$product[] = $prod;
		}
		mysqli_close($con);
		return  $product;
	}		



 	
	public static function getSearchResultsByManufacturer($byText,$start,$max,$orderByPrice){
		$con = Conect::connectToDB();
		
		//$result = mysqli_query($con,"SELECT * FROM `products` WHERE name like '$byText%' OR manufacturer_name like '$byText%' OR manufacturer like '$byText%' order by name LIMIT $start ,$max");
		// 30.9.2016 changed 
		
		$byText = str_replace("`","",$byText);
		$byText = str_replace("'","",$byText);
		
		if($orderByPrice==1){
			$result = mysqli_query($con,"SELECT * FROM `products` WHERE manufacturer_name = '$byText' OR manufacturer = '$byText' order by CAST(price AS DECIMAL(10,2)) ASC LIMIT $start ,$max");
		}else{
			$result = mysqli_query($con,"SELECT * FROM `products` WHERE manufacturer_name = '$byText' OR manufacturer = '$byText' order by `name` LIMIT $start ,$max");
		}
		
		
		//$result = mysqli_query($con,"SELECT * FROM `products` WHERE name like '%$byText%' limit 0 , 12");
		$product = array();
		while ($row = mysqli_fetch_array($result))  {
			$prod = new Product();
			$prod->initSelf($row);
			$product[] = $prod;
		}
		mysqli_close($con);
		return  $product;
	}	

	
	
	public static function getSubCategoryResultsByText($byText,$orderByPrice){
		$con = Conect::connectToDB();
		
		if($orderByPrice==1){
			$result = mysqli_query($con,"SELECT * FROM `products` WHERE `category_name` = '$byText'  order by price asc limit 0 , 12");
		}else{
			$result = mysqli_query($con,"SELECT * FROM `products` WHERE `category_name` = '$byText'  order by name limit 0 , 12");
		}
		
		
		//$result = mysqli_query($con,"SELECT * FROM `products` WHERE name like '%$byText%' limit 0 , 12");
		$product = array();
		while ($row = mysqli_fetch_array($result))  {
			$prod = new Product();
			$prod->initSelf($row);
			$product[] = $prod;
		}
		mysqli_close($con);
		return  $product;
	}		
	

		public static function getSearchResultsSubCategory($byText,$start,$max,$orderByPrice){
		$con = Conect::connectToDB();
		
		if($orderByPrice==1){
			$result = mysqli_query($con,"SELECT * FROM `products` WHERE `category_name` = '$byText' order by CAST(price AS DECIMAL(10,2)) ASC LIMIT $start ,$max");
		}else{
			$result = mysqli_query($con,"SELECT * FROM `products` WHERE `category_name` = '$byText' order by name LIMIT $start ,$max");
		}
		
		
		//$result = mysqli_query($con,"SELECT * FROM `products` WHERE name like '%$byText%' limit 0 , 12");
		$product = array();
		while ($row = mysqli_fetch_array($result))  { 
			$prod = new Product();
			$prod->initSelf($row);
			$product[] = $prod;
		}
		mysqli_close($con);
		return  $product;
	}	
	
	public static function getSubCategories(){
		$con = Conect::connectToDB();
		$result = mysqli_query($con,"SELECT * FROM `category` order by `category_title`");
		while ($row = mysqli_fetch_array($result)) {
			$res[] = $row;
		}
		mysqli_close($con);
		return  $res;
	}		
		

	public static function getRuseltsByClick($txt){
		$con = Conect::connectToDB();

		$result = mysqli_query($con,"SELECT `name` FROM `products` WHERE `name` like '%$txt%' limit 0 , 50");
		$product = array();
		while ($row = mysqli_fetch_array($result))  {
			$product[] = $row;
		}
		mysqli_close($con);
		return  $product;
	}	
	
	
	public static function getLinkesByManufactur($links){
		$con = Conect::connectToDB();
		$result = mysqli_query($con,"SELECT * FROM `products` WHERE `manufacturer` = '$links'  order by name limit 0 , 12");
	
		$product = array();
		while ($row = mysqli_fetch_array($result))  {
			$prod = new Product();
			$prod->initSelf($row);
			$product[] = $prod;
		}
		mysqli_close($con);
		return  $product;		
		
	}
	
	
	public static function getAllCartIds($prodIds){
		$con = Conect::connectToDB();
		$result = mysqli_query($con,"SELECT * FROM `products` WHERE id IN ($prodIds)");
	
		$product = array();
		while ($row = mysqli_fetch_array($result))  {
			$prod = new Product();
			$prod->initSelf($row);
			$product[] = $prod;
		}
		mysqli_close($con);
		return  $product;
	}
	
	public static function checkBigestShipment($prodIds){
		$con = Conect::connectToDB();
		$result = mysqli_query($con,"SELECT MAX(`shipment_cost`) AS  'cost' FROM  `products` WHERE  `id` IN ($prodIds)");
		$row = mysqli_fetch_row($result);
		
		return $row;
	}

	public static function getExpressCosts($prodIds){
		$con = Conect::connectToDB();
		$result = mysqli_query($con,"SELECT MAX(`express_cost`) AS  'cost' FROM  `products` WHERE  `id` IN ($prodIds)");
		$row = mysqli_fetch_row($result);
		
		return $row;
	}	
	
	
	public static function getProductByIds($ids){
		$con = Conect::connectToDB();
		$result = mysqli_query($con,"SELECT * FROM `products` WHERE id IN ($ids)");
		
		$product = array();
		

			while ($row = mysqli_fetch_array($result))  {
				$prod = new Product();
				$prod->initSelf($row);
				$product[] = $prod;
			}
			mysqli_close($con);
			return  $product;
		

	}
	
	
	public static function getUserPurchases($uid){
		$con = Conect::connectToDB();
		$result = mysqli_query($con,"SELECT * FROM `users_purchase` WHERE `user_id`=$uid");
		
		$product = array();
		while ($row = mysqli_fetch_array($result))  {
			
			$product["name"]   = $row["prod_name"];
			$product["price"]  = $row["prod_price"];
			$product["date"]   = $row["date"];
			$product["stock"]  = $row["stock"];
			$product["purchase_number"]  = $row["purchase_number"];
			$product["mail_number"]  	 = $row["mail_number"];
						
			
			$products[] = $product;
		}
		mysqli_close($con);
		
		if(isset($products)){
			return  $products;
		}else{
			return 0;
		}
	}
	/*
	 * 
SELECT * FROM `products` 
INNER JOIN `product_type` 
on `products`.`type` = `product_type`.`type_name` WHERE `id`=1805	 * 
	 * */
	
}



?>
