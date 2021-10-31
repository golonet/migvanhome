<?php
session_start();

if (isset($_REQUEST['deleteItem']) && isset($_REQUEST['cartRemoveSum'])){
	$id = $_REQUEST['deleteItem'];

	foreach ($_SESSION['cart'] as $key => $value){
	
		if($value['unit_id']==$id){
				
			if($value['unit_mount'] >= $value['unit_bulkSum']){
				$removeSum = (int)$value['unit_sum'] * (int)$value['unit_mount'] - (((int)$value['unit_mount'] * (int)$value['unit_sum']) * (float)$value['unit_bulkPrecent']);
			}else{
				$removeSum = $value['unit_sum'] * $value['unit_mount'];
			}
				
				
				
			$_SESSION['cartAddSum']-= $removeSum;
			unset($_SESSION['cart'][$key]);
		}
	}

		
	$cartUpdate["sum"]   = $_SESSION['cartAddSum'];
	$cartUpdate["quantity"] = sizeof($_SESSION['cart']);
	
	echo json_encode($cartUpdate);
}else{
	
}

?>