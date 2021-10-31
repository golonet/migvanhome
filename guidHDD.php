<?php 
session_start();
require_once 'classes/product.class.php';
$subCategories = Product::getSubCategories();
?>


<!DOCTYPE html>
<html>
<head>
<title>מדריך לקניית דיסק קשיח</title>
<meta name="keywords" content="" />
<?php require_once 'parts/head_tags.php'; ?>
</head>
<body> 
<!--header-->
	<div class="container">
		<?php require_once 'parts/header.php'; ?>
		<div class="page" style="direction: rtl;">
			<h6><a href="index.php">מדריך לקניית דיסק קשיח</a></h6>
		</div>
		<div class="content">

			<div class="col-md-10" style="direction: rtl;">
				<div class="content-bottom">
					<h3 style="padding: 0px; text-align: center; font-size: 34px;    background-color: #f5f5f5;">קטגוריות</h3>
					<div class="bottom-grid">
					
					<div id="content" style="height: 2500px;">
							
								
								<div style="min-height: 700px;">
								<div style="padding: 30px;">
									
					<strong style="color: #ff00ff;">מדריך לקניית דיסק קשיח</strong>
					<br /><br />
					1. גודל
					<br />
					2. נפח
					<br />
					3. זיכרון נדיף
					<br />
					4. ביצועים
					<br />
					5. חיבורים
					<br />
					6. מונחים
					<br /><br /><br />
					גודל דיסק קשיח:
					<br /><br />
					1.8inch - משמש בעיקר למחשבים ניידים זעירים
					<br />
					2.5inch - משמש בעיקר למחשבים ניידים, לרוב יש מהירות סיבוב 5400RPM, וונפח אחסון עד 2T
					<br />
					3.5inch - משמש בעיקר למחשבים נייחים, לרוב יש מהירות סיבוב 7200RPM, וונפח אחסון עד 6T
					<br /><br /><br />
					נפח אחסון:
					<br /><br />
					2.5inch פנימי -מגיע בנפח עד 2T
					<br />
					2.5inch חיצוני - מגיע בנפח עד 4T
					<br />
					3.5inch פנימי - מגיע בנפח עד 8T
					<br />
					3.5inch חיצוני - מגיע בנפח עד 8T
					<br /><br />
					שיטת חישוב נפח אחסון:
					<br /><br />
					שיטה עשרונית - 1GB = 1,000,000,000bytes
					<br />
					שיטה בינארית - 1GB = 1,073,741,824bytes
					<br /><br />
					מערכות ההפעלה עובדות בשיטה הבינארית:
					<br /><br />
					דיסק קשיח בנפח 500GB = 466GB
					<br />
					דיסק קשיח בנפח 1000GB = 933GB
					<br /><br /><br />
					זיכרון נדיף:
					<br />
					זיכרון לטווח קצר שבו נשמרים הנתונים האחרונים שנקראו ונכתבו בדיסק, במידה שהמערכת זקוקה להם מחדש הם נקראים ישירות מהזיכרון נדיף.
					<br />
					מהירות נעה בין 8-128MB
					<br /><br /><br />
					ביצועים:
					<br /><br />
					המהירות נמדדת לפי מספר סיבובים לדקה (RPM)
					<br /><br />
					Intellipower - מהירות סיבוב משתנה
					<br />
					5400RPM - מיועד בעיקר למחשבים ניידים, ודיסקים חיצוניים 2.5inch
					<br />
					7200RPM - מיועד למחשבים נייחים, ודיסקים חיצוניים 3.5inch
					<br />
					10000-15000RPM - מיועד בעיקר לשרתים
					<br /><br /><br />
					חיבורי דיסקים קשיחים פנימיים
					<br /><br />
					חיבור IDE - חיבור של דיסקים מהדור הישן שמחוברים ללוח האם בחיבור IDE
					<br />
					חיבור SATA II - חיבור לכונן פנימי במהירות 3Gbps.
					<br />
					חיבור SATA III - חיבור לכונן פנימי במהירות 6Gbps.
					<br />
					חיבור mSATA - חיבור לדיסקים קשיחים בגודל 1.8inch שמותקנים במחשבים זעירים/מחשבים ניידים
					<br />
					חיבור SCSI - חיבור שמשמש בעיקר לשרתים ותחנות עבודה
					<br />
					חיבור SAS - חיבור שמחליף את חיבור SCSI הישן, מיועד לשרתים ותחנות עבודה
					<br /><br />
					חיבורי דיסקים קשיחים חיצוניים:
					<br /><br />
					חיבור USB 2.0 - מאפשר העברת קבצים במהירות של עד 480Mbps
					<br />
					חיבור USB 3.0 - מאפשר העברת קבצים במהירות של עד 4.8Gbps
					<br />
					FireWire 400/IEEE 1395 - מאפשר העברת קבצים במהירות של עד 400Mbps
					<br />
					FireWire 800/IEEE 1394 - מאפשר העברת קבצים במהירות של עד 800Mbps
					<br />
					חיבור Thunderbolt - חיבור שנועד בעיקר למחשבים ניידים של אפל, בקצב תעבורה של 10Gb/s
					<br />
					חיבור Ethernet/LAN - חיבור קווי לרשת האינטרנט
					<br />
					חיבור WiFi - חיבור אלחוטי לרשת האינטרנט
					<br /><br /><br />
					מונחים:
					<br /><br />
					Average Seek Time - זמן חיפוש ממוצע לאיתור קובץ מסוים במחשב.
					<br />
					Buffer - זיכרון מטמון
					<br />
					Hybrid - כונן קשיח שמשלב כונן קשיח HDD, וכונן SSD
					<br />
					Intellipower - מהירות סיבוב משתנה
					<br />
					RPM - Revolutions Per Minute - מספר סיבובים לדקה
					<br />
					RAID - מערך לחיבור כמה דיסקים קשיחים לאחד
					<br />
					SATA - Serial ATA - 
					<br />
					SMART - בדיקה לכונן שכוללת בדיקת טמפרטורה, מהירות סיבוב, חשמל, תקלות בכתיבה, וסקטורים פגומים.
					<br />
					SSD - Solide State Drive
					<br />
					Transfer Rate - קצב העברת נתונים מהכונן אל שאר המחשב (זמן שלוקח לקרוא קובץ/הפעלת תוכנה)
					<br />
								</div>
								
									
								
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


