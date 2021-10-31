<?php
echo "asdfsdf"; die();
include_once 'include.php';


//
// GET the transaction form url
//

$api_url = ENV_URL . 'api/payment/prepareSafeUrl/clearingFormForWeb';


//get current script base url
if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off') {
	$protocol = 'http://';
} else {
	$protocol = 'https://';
}
$base_url = $protocol . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']);


//build the request object data
$data = [
	"api_key" => API_KEY,
	"developer_email" => DEVELOPER_EMAIL,
	"sum" => $_SESSION['utotlaDeal'],
	"payments" => 1,
	"currency" => "ILS",
	"successUrl" => $base_url . "/EZcount_php_example/success_and_invoice.php"
];

//get secret url
$clearingObj = sendJsonRequest($api_url,$data);

//keep the token for the validation
$data['secretTransactionId']=$clearingObj->secretTransactionId;
//store to session, this is used for validation
$_SESSION['transaction_validate_data'] = $data;

header("Location: " . $clearingObj->url);