<?php
session_start();
// require_once "../classes/conect.class.php";


// $con = Conect::connectToDB();


// // user purchase table
// if(isset($_SESSION['user_id'])){
// 	$con = Conect::connectToDB();
// 	$uId = $_SESSION['user_id'];
// 	$date = date("Y-m-d");
	
// 	foreach ($_SESSION['cart'] as $key => $value){
// 		$um = $value['unit_mount'];
// 		$un = $value['unit_name'];
// 		$up = $value['unit_sum'];
// 		mysqli_query($con,"INSERT INTO `users_purchase` (`user_id`, `prod_name`, `prod_price`, `date`, `stock`,`purchase_number`) VALUES ($uId,'$un','$up','$date','$um','$kabalaNum')");
// 	}
	
	
// 	mysqli_close($con);
// }

if(isset($_REQUEST['email'])){
		
		$umail = $_REQUEST['email'];			
		$details = "";
		$total_per_unit = 0;
		$total_deal = 0;
		$deliveryType = $_REQUEST["deliveryType"];
		
		if($deliveryType==14){
			$deliveryTypeText = "דואר רשום";
		}else if($deliveryType==45){
			$deliveryTypeText = "דואר שליחים";
		}else{
			$deliveryTypeText = "איסוף עצמי";
		}
		
		$deliveryText="";
		if(isset($_REQUEST["deliveryText"]))
		{
			$deliveryText = $_REQUEST["deliveryText"];
			if($deliveryText=="0000"){$deliveryText = 'post';}
			if($deliveryText=="1111"){$deliveryText = 'telAviv';}
			if($deliveryText=="2222"){$deliveryText = 'rehovot';}
			if($deliveryText=="3333"){$deliveryText = 'shlihim';}
		}
		
		foreach ($_SESSION['cart'] as $key => $value){
			
			$unit_mount= $value['unit_mount'];
			$unit_name= $value['unit_name'];
			$unit_sum = $value['unit_sum'];
			
			if(isset($value['unit_type'])){
				$unit_type= $value['unit_type'];
			}else{
				$unit_type="אין";
			}
			
			
			
			$total_per_unit = $unit_mount * $unit_sum;
			$total_deal = $total_deal + $total_per_unit;
			
			$details .= "<div>";			
				$details .= "<span>שם : </span><span>$unit_name</span><br>";
				
				$details .= "<span>סוג מוצר : </span><span>$unit_type</span><br>";
							
								
				$details .= "<div style='direction:ltr;'>$unit_sum X $unit_mount = $total_per_unit</div>";
				
			$details .= "</div><br>";
		}
		
		$total_deal = $total_deal + $deliveryType;
		
	
}else{
	echo 0;
}

//$delivery_details= $_REQUEST['delivery_details'];	


$to = 'info@migvanhome.co.il,'.$umail;
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
<div style='min-width: 600px;text-align:right;float:right;background-color:#fff;color:#000;font-size:14px;direction:rtl;padding:5px;border-color: #000000;/* border-style: double; */background-color: #ffeb3b36;'>
<br />
<div style='width:100%;clear:both;'>paypal - להלן פרטי הזמנה :</div>
<br />
<table border='1' style='border:1px solid #000;color:#000;border-collapse: collapse;width: 100%;font-size: 20px;'>
	<tr>
	<td style='padding: 10px;'>מייל</td>
	<td style='padding: 10px;'>$umail</td>
	</tr>
	<tr>
	<td>פרטי הזמנה</td>
	<td>$details</td>
	</tr>
	<tr>
	<td>סוג המשלוח</td>
	<td>$deliveryTypeText $deliveryText</td>
	</tr>



	<tr>
		<td>סכום כולל</td>
		<td>$total_deal &#8362;</td>
	</tr>
</table>
<br />
<div style='width:100%;clear:both;   text-size:20px;  font-weight: bold;'>* הזמנתך תגיע תוך 9  ימי עסקים החל מיום האישור של חברת paypal</div>
	<br>
	<div>תודה שהזמנת ב : migvanhome.co.il</div>
	<br>
</div>
</body>
</html>";

mail($to, "From : $subject","$replymessage", $headers);

echo 1;

?>