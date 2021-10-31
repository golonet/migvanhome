<?php

require_once "classes/conect.class.php";


	$con = Conect::connectToDB();

	// remove from stock
	
	foreach ($_SESSION['cart'] as $key => $value){
	
		$stock = (int)$value['unit_stock_max'] - (int)$value['unit_mount'];
		$uid   = $value['unit_id'];
		mysqli_query($con,"UPDATE `products` SET `stock`=$stock WHERE `id`=$uid");
	}
	mysqli_close($con);
	
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


	$productsNames = $_SESSION['productsNames'];
	$uname = $_SESSION['ufn'];
	$phone = $_SESSION['uphone'];
	$umail = $_SESSION['uemail'];		
	$sum = $_SESSION['utotlaDeal'];
	
	$to = 'info@migvanhome.co.il'; 
    $from = $umail;
	$subject = 'פרטי הזמנתך migvanhome.co.il';
	$headers = "From: $from" . "\r\n"; 	
	$headers .= "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type: text/html; charset=utf-8";
    
    
				
$replymessage = "<html>
<head>
	<title></title>
	<meta http-equiv='content-type' content='text/html; charset=utf-8' />          
</head>
<body>
  <div style='width:500px; height:330px; text-align:right; float:right; background-color:#fff; color:#000; font-size:14px; direction:rtl; padding:5px; border-color: #B07923; border-style: double;'>
  <br /> 	
   	<div style='width:100%;clear:both;'> להלן פרטי הזמנה :</div>
   	<br />
   	<table border='1' style='border:1px solid #000;color:#000;border-collapse: collapse;'>
   		<tr>
   			<td>מייל</td>
   			<td>$umail</td>
   		</tr>
   		<tr>
   			<td>שם</td>
   			<td>$uname</td>
   		</tr>
   		<tr>
   			<td>טלפון</td>
   			<td>$phone</td>
   		</tr>  
    
   		<tr>
   			<td>סכום העסקה</td>
   			<td>$sum</td>
   		</tr>  
   		<tr>
   			<td>מוצרים</td>
   			<td>$productsNames</td>
   		</tr>   
   	</table>
   	<br />
   	<div style='width:100%;clear:both;'>* תשלום בטלפון </div>
		
 
    </div>
</body>
</html>
";

mail($to, "From : $subject","$replymessage", $headers);
 
?>