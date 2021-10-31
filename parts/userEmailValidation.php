<?php
require_once '../classes/conect.class.php';

if(isset($_REQUEST['flagg']) && $_REQUEST['flagg']=="892347d7899s97987987x789" && isset($_REQUEST['email'])){
	
	$con = Conect::connectToDB();
	
	$email = $_REQUEST['email'];
	
	$email = mysqli_real_escape_string($con,$email);
	
	$result = mysqli_query($con,"UPDATE `users` SET `valid`=1 WHERE `email`='$email'");	
	
	mysqli_close($con);
	
	header("Location:https://www.migvanhome.co.il/account.php");
		
}

?>