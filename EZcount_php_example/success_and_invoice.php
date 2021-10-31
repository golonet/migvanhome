<?php
session_start();
include_once 'include.php';

//VALIDATE TRANSACTION
$transaction_validate_data = $_SESSION['transaction_validate_data'];
if (!$transaction_validate_data) {
	die("SESSION had expired, can't validate transaction, please contact support");
}

$url = ENV_URL . '/api/payment/validate/' . $transaction_validate_data['secretTransactionId'];
$data = array(
	"api_key" => API_KEY,
	"developer_email" => DEVELOPER_EMAIL
);

$validateResponse = sendJsonRequest($url, $data);

if (!$validateResponse || !$validateResponse->success) {
	die("can not validate transaction, please contact support");
}


//if transaction not validated
if ($validateResponse->cgp_payment_total != $transaction_validate_data['sum'] ||
	$validateResponse->cgp_num_of_payments != $transaction_validate_data['payments']) {
	die("can not validate transaction details, please contact support");
} //transaction validated
else {	
	
	$dataItems = array();
	foreach ($_SESSION['cart'] as $key => $value){
	
		if($value['unit_mount'] >= $value['unit_bulkSum']){
			$itemPrice = (int)$value['unit_sum'] * (int)$value['unit_mount'] - (((int)$value['unit_mount'] * (int)$value['unit_sum']) * (float)$value['unit_bulkPrecent']);
		}else{
			$itemPrice = $value['unit_sum'] * $value['unit_mount'];
		}	
		$dataItems[] = array('catalog_number'=>$value["unit_id"],'details'=>$value["unit_name"],'amount'=>(string)$value["unit_mount"],'price'=>$itemPrice,'vat_type'=>'INC');
	}
	
	//create documents
	$url = ENV_URL . '/api/createDoc';
	$data = array (
		// CUSTOMER credentials
		'api_key' => API_KEY,

		'developer_email' => DEVELOPER_EMAIL,
		'type' => DOC_TYPE_INVOICE_RECEPTION,

		'description'      => 'אשראי',
		'customer_name'    => $_SESSION['ufn'],
		'customer_email'   => $_SESSION['uemail'],
		'customer_address' =>" כתובת ".$_SESSION['udeliveryAdress']."- מיקוד ".$_SESSION['uzipCode'],
		'item' =>  $dataItems,
		'payment' =>
			array(
				array(
					'payment_type' => PAYMENT_CC,
					'payment' =>  $_SESSION['utotlaDeal'], //$validateResponse->cgp_payment_total, //the sum field
					'cc_number' => $validateResponse->cgp_customer_cc_4_digits, //last 4 digits!!!
					'cc_type_name' => $validateResponse->cgp_customer_cc_name,
					'cc_deal_type' => CC_DEAL_TYPE_NORMAL,
				)
			),
		'price_total' => $_SESSION['utotlaDeal'], //$validateResponse->cgp_payment_total,
		'comment' => "",
		'transaction_id' => $_SESSION['kabalaNum'],
		'cgp_ids' => $validateResponse->cgp_id
	);


	$createDocumentResponse = sendJsonRequest($url, $data);
	
	header("Location:https://migvanhome.co.il/parts/notifyPage.php");
	
	//var_dump($createDocumentResponse);
}

?>