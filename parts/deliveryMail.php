<?php

$productsNames = $_SESSION['productsNames'];
$uname = $_SESSION['ufn'];
$phone = $_SESSION['uphone'];
$umail = $_SESSION['uemail'];
$udel = $_SESSION['udeliveryAdress'];
$zipc = $_SESSION['uzipCode'];
//$tz  = $_SESSION['utz'];
$bclientName = $_SESSION['ubankClientName'];
$sum = $_SESSION['utotlaDeal'];
$deliveryType = $_SESSION['udeliveryType'];
$notes = $_SESSION['notes'];
$deliverTo = $_SESSION['deliverTo'];


$orderDetails = ' שם : '.$uname.' טלפון : '.$phone.' כתובת '.$udel.' מיקוד '.$zipc.' קבלה על שם '.$bclientName.' סכום העסקה '.$sum.' מוצרים '.$productsNames.' סכום משלוח '.$deliveryType.' סוג משלוח : '.$deliverTo;


$ourEmail = 'info@migvanhome.co.il,';
$to 	     = "$ourEmail,$umail";

$from    = 'No_Reply@migvanhome.co.il';
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
<div style='width:500px;height: 400px;text-align:right;float:right;background-color:#fff;color:#000;font-size:14px;direction:rtl;padding: 15px;border-color: #B07923;border-style: double;'>
<br />
<div style='width:100%;clear:both;'> להלן פרטי הזמנה :</div>
<br />
<table border='1' style='border:1px solid #000;color:#000;border-collapse: collapse;'>
<tr>
<td>מייל</td>
<td>$umail</td>
</tr>
<tr>
<td>שם הנמען</td>
<td>$uname</td>
</tr>
<tr>
<td>קבלה על שם</td>
<td>$bclientName</td>
</tr>
<tr>
<td>טלפון</td>
<td>$phone</td>
</tr>
<tr>
<td>כתובת</td>
<td>$udel</td>
</tr>
<tr>
<td>מיקוד</td>
<td>$zipc</td>
</tr>

<tr>
<td>סכום העסקה</td>
<td>$sum</td>
</tr>
<tr>
<td>מספר הזמנה</td>
<td>$kabalaNum</td>
</tr>
<tr>
<td>מוצרים</td>
<td>$productsNames</td>
</tr>
<tr>
<td>סכום משלוח</td>
<td>$deliveryType</td>
</tr>
<tr>
<td>סוג משלוח</td>
<td>$deliverTo</td>
</tr>
<tr>
<td>הערות</td>
<td>$notes</td>
</tr>
	
	
</table>
<br />
<div style='width:100%;clear:both;'>* סכום העסקה כולל את דמי המשלוח במידה וקיימים</div>
<div style='width:100%;clear:both;'>* הזמתנך תגיע עד תשעה ימי עסקים מיום אישור חברת האשראי</div>

</div>
</body>
</html>
";

mail($to, "From : $subject","$replymessage", $headers);

?>