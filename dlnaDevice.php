<?php
session_start();
require_once 'classes/product.class.php';
$subCategories = Product::getSubCategories();
?>


<!DOCTYPE html>
<html>
<head>
<title>תקשורת אלחוטית</title>
<meta name="keywords" content="" />
<?php require_once 'parts/head_tags.php'; ?>
</head>
<body> 
<!--header-->
	<div class="container">
		<?php require_once 'parts/header.php'; ?>
		<div class="page" style="direction: rtl;">
			
		</div>
		<div class="content">

			<div class="col-md-10" style="direction: rtl;">
				<div class="content-bottom">
					<h3 style="padding: 0px; text-align: center; font-size: 34px;    background-color: #f5f5f5;">תקשורת אלחוטית</h3>
					<div class="bottom-grid">
			<div style="width: 78%; min-height: 700px; float:left;">
				<div style="padding: 30px;">
					מה זה תקשורת אלחוטית DLNA?
					<br /><br /><br />
					&#9679 פרוטוקול תקשורת אלחוטית שמאפשר שיתוף קבצי מדיה בין מכשירים שונים שמחוברים לאותה רשת ביתית.
					<br /><br />
					&#9679 פרוטוקול תקשורת DLNA מוטמע  במסכי טלוויזיה, קונסולות משחקים, נגני בלוריי, סטרימרים, מצלמות, סמארטפונים....
					<br /><br />
					&#9679 מערכת הפעלה Windows 7/8 תומכת באופן מובנה בפרוטוקול DLNA..
					<br /><br />
					&#9679 במידה שמערכת הפעלה ללא תמיכה יש להתקין תוכנת מדיה סרבר כמו: Serviio/TVersity/Twonky.
					<br /><br />
					<a href="http://www.dlna.org/products"_blank">קישור לאתר לבדיקת מכשירים שתומכים בתקן DLNA</a>
					<br /><br /><br />
					רשימת סמארטפונים שתומכים ב- DLNA:
					<br /><br />
					HTC Desire 816
					<br />
					HTC Desire 820
					<br />
					HTC One S
					<br />
					HTC One M8
					<br />
					HTC One M9
					<br /><br />
					Huawei Nexus 6P
					<br />
					Huawei P7
					<br /><br />
					LG G2 mini
					<br />
					LG G4
					<br />
					LG G4 Beat
					<br />
					LG V10
					<br />
					LG Nexus 5X
					<br /><br />
					Motorola Moto X
					<br />
					Motorola Nexus 6
					<br /><br />
					Nokia Lumia 630
					<br />
					Lumia 640 XL
					<br />
					Nokia Lumia 735
					<br />
					Nokia Lumia 830
					<br />
					Nokia Lumia 925
					<br />
					Nokia Lumia 930
					<br />
					Nokia Lumia 1020
					<br /><br />
					OnePlus One
					<br /><br />
					Samsung Galaxy A8
					<br />
					Samsung Galaxy S2
					<br />
					Samsung Galaxy S3
					<br />
					Samsung Galaxy S4
					<br />
					Samsung Galaxy S5
					<br />
					Samsung Galaxy S6
					<br />
					Samsung Galaxy S6 Edge
					<br />
					Samsung Galaxy S6 Edge Plus
					<br />
					Samsung Galaxy Note N7000
					<br />
					Samsung Galaxy Note 3
					<br />
					Samsung Galaxy Note 4
					<br />
					Samsung Galaxy Note 5
					<br /><br />
					Sony Xperia C3
					<br />
					Sony Xperia C4
					<br />
					Sony Xperia C5 Ultra
					<br />
					Sony Xperia M5
					<br /><br /><br />
					רשימת טאבלטים שתומכים ב- DLNA:
					<br /><br />
					Asus Fonepad 7 FE171CG
					<br />
					Asus Fonepad 7 FE375CL
					<br /><br />
					LG G Pad 7.0 V400
					<br />
					LG G Pad 8.0 V480
					<br />
					LG G Pad 8.0 4G V490
					<br />
					LG G Pad 8.3 V500
					<br /><br />
					Samsung Galaxy Tab 2 7.0 I705
					<br />
					Samsung Galaxy Tab 3 7.0 
					<<br />
					Samsung Galaxy Tab 3 7.0 P3210
					<br />
					Samsung Galaxy Tab 3 7.0 P210
					<br />
					Samsung Galaxy Tab 3 8.0 T310
					<br />
					Samsung Galaxy Tab 3 8.0 T311
					<br />
					Samsung Galaxy Tab 3 8.0 T315
					<br /><br />
					Sony Xperia Z3 Tablet Compact
					<br /><br />

				</div>
			</div>
					
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>

			<?php require_once 'parts/sidebar.php'; ?>
			<div class="clearfix"> </div>
		</div>
	
		<?php require_once 'parts/footer.php'; ?>
	 </div>
		
</body>
</html>


