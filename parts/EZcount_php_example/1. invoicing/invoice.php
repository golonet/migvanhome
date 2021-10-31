<?php
include_once './include.php';



//!! put here a unique identifier, like order id 
$transaction_id = time(); 

//create documents
$url = ENV_URL . '/api/createDoc';
$data = [
	// CUSTOMER credentials
	'api_key' => API_KEY,

	'developer_email' => DEVELOPER_EMAIL,
	'type' => DOC_TYPE_INVOICE_RECEPTION,

	'description' => 'Credit card payment',
	'customer_name' => 'customer name',
	'customer_email' => 'client@demo.com',
	'customer_address' => 'CITY ROAD ZIP...',
	'item' => [
		[
			'catalog_number' => 'MKT1',
			'details' => 'item 1 details',
			'amount' => '1',
			'price' => 3,
			'vat_type' => 'INC' //this price include the VAT
		],
		[
			'catalog_number' => 'MKT2',
			'details' => 'item 2 details',
			'amount' => '1',
			'price' => 7,
			'vat_type' => 'INC' //this price include the VAT
		],
	],
	'payment' =>
		[
			[
				'payment_type' => PAYMENT_CC,
				'payment' => 10, //the sum field
				'cc_number' =>1234, //last 4 digits!!!
				'cc_type_name' =>'Visa',
				'cc_deal_type' => CC_DEAL_TYPE_NORMAL,
			]
			// ,
			// [
			// 	another payment..
			// ]
		],
	'price_total' => 10,
	'comment' => "",
	//
	'transaction_id' => $transaction_id
];


$createDocumentResponse = sendJsonRequest($url, $data);
var_dump($createDocumentResponse);