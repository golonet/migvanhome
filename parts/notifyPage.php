<?php
session_start();
require_once "../classes/conect.class.php";

require_once 'deliveryMail.php';		
/*
	$con = Conect::connectToDB();
	

	$lastId = mysql_query("SELECT MAX(id) FROM `delivery_details`");
	$lastId = mysql_fetch_row($lastId);
	$lastId = $lastId[0];
	
	mysql_query("UPDATE `delivery_details` SET `number` = 1 WHERE `id`=$lastId");
	mysql_close($con);
*/

if(isset($_REQUEST['lid'])){
	/*
	$con = Conect::connectToDB();
	$lid = $_REQUEST['lid'];
	mysqli_query($con,"UPDATE `delivery_details` SET `number`=1 WHERE `id`=$lid;");
	mysqli_close($con);
	*/
}

// remove from stock

if(isset($_SESSION['cart'])){
	foreach ($_SESSION['cart'] as $key => $value){
		$con = Conect::connectToDB();
		$stock = (int)$value['unit_stock_max'] - (int)$value['unit_mount'];

		$uid   = $value['unit_id'];
		mysqli_query($con,"UPDATE `products` SET `stock`=$stock WHERE `id`=$uid");
		mysqli_close($con);
	}
}



// user purchase table
if(isset($_SESSION['user_id'])){
	$con = Conect::connectToDB();
	$uId = $_SESSION['user_id'];
	$date = date("Y-m-d");

	foreach ($_SESSION['cart'] as $key => $value){
		$um = $value['unit_mount'];
		$un = $value['unit_name'];
		$up = $value['unit_sum'];
		mysqli_query($con,"INSERT INTO `users_purchase` (`user_id`, `prod_name`, `prod_price`, `date`, `stock`,`purchase_number`) VALUES ($uId,'$un','$up','$date','$um','$kabalaNum')");
	}
	mysqli_close($con);
}

session_destroy();
header("Location:https://migvanhome.co.il/index.php?order=15465464654");
	
	
?>