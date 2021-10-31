<?php

//SESSION is needed!!
//session_start();

function sendJsonRequest($url, $data = []) {
	$options = array(
		'http' => array(
			'method' => 'POST',
			'content' => json_encode($data),
			'header' => "Content-Type: application/json\r\n" .
				"Accept: application/json\r\n"
		)
	);
	$context = stream_context_create($options);
	$jsonStr = file_get_contents($url, false, $context);
	$jsonObj = json_decode($jsonStr);
	return $jsonObj;

}

define('API_KEY', 'b660f25280d9cd442dc1a5ab56b3cde49485dea7a4d8756caa160d7728201c14');
//DEVELOPER information, we will notify you for any API problem to this details
define('DEVELOPER_EMAIL', 'info@migvanhome.co.il');

/**
 * demo enviroment
 */
define('ENV_DEMO', 'https://demo.ezcount.co.il/');
/**
 * demo enviroment
 */
define('ENV_PROD', 'https://api.ezcount.co.il/');

//set default to be demo
define('ENV_URL',ENV_PROD);



/**
 * חשבונית מס
 */
define('DOC_TYPE_INVOICE', 305);
/**
 * קבלה
 */
define('DOC_TYPE_RECEPTION', 400);
/**
 * חשבונית מס קבלה
 */
define('DOC_TYPE_INVOICE_RECEPTION', 320);
/**
 * חשבונית זיכוי
 */
define('DOC_TYPE_INVOICE_CREDIT', 330);
/**
 * הצעת מחיר
 */
define('DOC_TYPE_BID', 9999);
/**
 * הזמנת עבודה
 */
define('DOC_TYPE_ORDER', 100);
/**
 * תעודת משלוח
 */
define('DOC_TYPE_DELIVERY', 200);
/**
 * תעודת החזרה
 */
define('DOC_TYPE_RETURN', 210);
/**
 * חשבונית עסקה
 */
define('DOC_TYPE_INVOICE_TRANSACTION', 300);
/**
 * הזמנת רכש
 */
define('DOC_TYPE_PURCHASE_ORDER', 500);
/**
 * קבלה על תרומה
 */
define('DOC_TYPE_RECEIPT_DONATION', 405);


define('PAYMENT_CASH', 1); //מזומן
define('PAYMENT_CHECK', 2); //המחאה
define('PAYMENT_CC', 3);  //כרטיס אשראי
define('PAYMENT_TRANSFER', 4);  //העב.- בנקאית


/// <summary>
///תשלום רגיל 
/// </summary>
define('CC_DEAL_TYPE_NORMAL', 1);
/// <summary>
/// תשלומים
/// </summary>
define('CC_DEAL_TYPE_PAYMENTS', 2);

