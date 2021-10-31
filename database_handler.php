<?php
require_once 'classes/conect.class.php';

$con = Conect::connectToDB();
$result = mysqli_query($con,"SELECT * FROM `category`" );

$product = array();

while ($row = mysqli_fetch_array($result))  {
	$prod["id"]   = $row["id"];
	$prod["name"] = $row["name"];
	
	$product[] = $prod;
}


foreach ($product as $product){
	
	$prodId   = $product['id'];
	$prodName = $product['name'];
	
	mysqli_query($con,"UPDATE `products` SET `category_name`='$prodName' WHERE `category_id` =$prodId" );

}


mysqli_close($con)

?>
