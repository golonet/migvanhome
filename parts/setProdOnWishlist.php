<?php
session_start();

require_once '../classes/conect.class.php';

if(isset($_REQUEST['add'])){
	if(isset($_REQUEST['prodId']) && isset($_SESSION['user_id'])){
	
		$uId = $_SESSION['user_id'];
		$pId = $_REQUEST['prodId'];
	
		$con = Conect::connectToDB();
	
		mysqli_query($con, "INSERT INTO `users_wishlist`(`user_id`, `prod_id`) VALUES ($uId,$pId)");
	
		array_push($_SESSION['user_wishlist'], $pId);
	
		mysqli_close($con);
	
		echo "1";
	}
}

if(isset($_REQUEST['remove'])){
	
	if(isset($_REQUEST['prodId']) && isset($_SESSION['user_id'])){

		$uId = $_SESSION['user_id'];
		$pId = $_REQUEST['prodId'];

		$con = Conect::connectToDB();

		mysqli_query($con, "DELETE FROM `users_wishlist` WHERE `user_id`=$uId AND `prod_id`=$pId");

		if(($key = array_search($pId, $_SESSION['user_wishlist'])) !== false) {
			unset($_SESSION['user_wishlist'][$key]);
		}

		mysqli_close($con);

		echo "1";
	}
}




?>