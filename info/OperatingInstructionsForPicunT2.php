<?php 
session_start();
require_once '../classes/product.class.php';
$subCategories = Product::getSubCategories();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="אתר למכירת ציוד היקפי למחשבים, קונסולות משחק, וסלולר" />
<meta name="keywords" content="כרטיסי זיכרון,כוננים קשיחים,זכרונות ניידים USB,סוללות,כבל טעינה,מטענים,ציוד אלחוטי,תאורה ואביזרים,אביזרי חשמל,כבלים,כבלים HDMI/DVI/VGA/DP/SATA/AUDIO/USB/DC,מתאמים,מפצלים,אביזרים לרכב,נורות לרכב,מגבים לרכב,סרטים " />
<meta name="google-site-verification" content="qs3I8YPstIWuyfhgSTki412T5w_sZoRXAUbRUKw0VrQ" />
<link rel="stylesheet" href="../css/style.css" type="text/css" />

<link rel="stylesheet" href="../css/jquery-ui.min.css" type="text/css" />
<script src="../js/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="../js/jquery-ui.min.js" type="text/javascript"></script>
	<title>מדריך הפעלה לאוזניית בלוטוס Picun דגם T2</title>

</head>

<body>
<?php require_once '../googlea.php'; ?>
	<div id="wrapper">
		<?php require_once '../header.php'; ?>
		
		<div id="content" style="height: 2500px;">
			
			<div style="min-height: 700px;">
				<div style="padding: 30px;">
<h1 style="color: #ff00ff; font-size: 30px;">מדריך הפעלה לאוזניית בלוטוס Picun דגם T2</h1>
<br /><br /><br />
<h2 style="color: #ff00ff;">לחצן פרסה</h2>
<br /><br />
לחיצה קצרה: הנמכה / העלאת ווליום
<br /><br />
לחיצה ארוכה: העברת שיר קדימה
<br /><br />
לחיצה כפולה: שפה אנגלית / סינית
<br /><br /><br /><br />
<h2 style="color: #ff00ff;">לחצן שיחה</h2>
<br /><br />
לחיצה ארוכה 4 שניות: הפעלה / כיבוי
<br /><br />
לחיצה קצרה (מוזיקה): הפעל / עצור קובץ
<br /><br />
לחיצה קצרה (שיחה): מענה / ניתוק שיחה
<br /><br />

				</div>
			</div>
		</div>

		<?php require_once '../footer.php'; ?>
	</div>
</body>
</html>