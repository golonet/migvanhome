<?php 
session_start();
require_once 'classes/product.class.php';
$subCategories = Product::getSubCategories();
?>





<!DOCTYPE html>
<html>
<head>
<title>מדריך לקניית כרטיס זיכרון</title>
<meta name="keywords" content="" />
<?php require_once 'parts/head_tags.php'; ?>
</head>
<body> 
<!--header-->
	<div class="container">
		<?php require_once 'parts/header.php'; ?>
		<div class="page" style="direction: rtl;">
			<h6><a href="index.php">מדריך לקניית כרטיס זיכרון</a></h6>
		</div>
		<div class="content">

			<div class="col-md-10" style="direction: rtl;">
				<div class="content-bottom">
					<h3 style="padding: 0px; text-align: center; font-size: 34px;    background-color: #f5f5f5;">קטגוריות</h3>
					<div class="bottom-grid">
					
							<div id="content" style="height: 2500px;">
							
							<div style="min-height: 700px;">
							<div style="padding: 30px;">
											
							<h1 style="color: #ff00ff; font-size: 25px;">מדריך לקניית כרטיס זיכרון</h1>
							</br></br></br></br>
							<h2 style="color: #ff00ff; font-size: 20px;">סוגי כרטיסים</h2>
							</br></br>
							SM Smart Media - שבבי זיכרון flash נשלפים בתוך כרטיס פלסטיק מבית טושיבה מוגבל עד 128mb, לא מיוצר יותר.
							</br></br>
							Micro SDHC - מיועד לסמארטפונים.., קיים בנפח 4GB - 32GB
							</br></br>
							Micro SDXC - גרסה עדכנית של Micro SDHC, קיים בנפח בין 64GB - 200GB
							</br></br>
							SD - מיועד למצלמות.., קיים בנפח 4GB - 32GB
							</br></br>
							XD - מיועדים למצלמות פוג'י/אולימפוס בלבד.
							</br></br>
							SDHC - מיועד למצלמות.., מוגבל בנפח עד 32GB
							</br></br>
							SDHC WiFi - כרטיס זיכרון עם רשת אלחוטית מובנית להעברת קבצים ללא כבלים.
							</br></br>
							SDXC - גרסה עדכנית של SDHC, קיים בנפח בין 64GB - 512GB
							</br></br>
							Memory Stick - מיועד למכשירי סוני, קיים בנפח עד 128NB
							</br></br>
							Memory Stick Pro - מיועד למכשירי סוני, קיים בנפח עד 128NB - 4GB
							</br></br>
							Memory Sticks Pro Duo - מיועד למכשירי סוני PSP.., קיים בנפח עד 32GB
							</br></br>
							Memory Stick Micro - מיועד לטלפונים של סוני-אריקסון, לא מיוצר יותר.
							</br></br>
							PS Vita - מיועד לקונסולת משחקים של סוני PS Vita
							</br></br>
							Compact Flash/CF - מיועד למצלמות רפלקס מקצועיות
							</br></br>
							XQD - המחליף  של כרטיסי CF, שמתבסס על ממשק ה-PCI Express
							</br></br></br>
							<h2 style="color: #ff00ff; font-size: 20px;">מהירות כתיבת נתונים</h2>
							</br></br>
							סוגי סימון מהירות:
							</br></br>
							מכפלות - מכפלה x1 = 150Kb/s, לדוגמה כרטיס במהירות x320 יקרא נתונים במהירות 48MB לשניה.
							</br></br>
							Class - סימון שמתיחס למהירות כתיבה מינימלית ב- MB/s, ישנם Class 2/4/6/8/10
							</br></br>
							U1 - תקן של מהירות מינימום 10Mb/s
							</br></br>
							U3 - תקן של מהירות מינימום 30Mb/s
							</br></br>
							UHS- I - תקן של מהירות מקסימום 104Mb/s
							</br></br>
							UHS- II - תקן של מהירות מקסימום 312Mb/s
							</br></br></br>
							<h2 style="color: #ff00ff; font-size: 20px;">מונחים</h2>
							</br></br>
							3D Nand - טכנולוגיה חדשה של יצירת כמה שכבות לגובה בכרטיס, מה שמאפשר להכפיל ולשלש את נפח האחסון.
							</br></br>
							CompactFlash Association - איגוד חברות גדולות של כרטיסי זיכרון Compact Flash, שאחראי על התקינה. 
							</br></br>
							CompactFlash Revision - תקן מהירות כתיבת נתונים לכרטיסי Compact Flash
							</br></br>
							Magnet Proof - הגנה בפני מיגנוט
							</br></br>
							Temperatura Proof - הגנה בפני טמפרטורה
							</br></br>
							UDMA 0-7 - תקן מהירות כתיבת נתונים לכרטיסי Compact Flash
							</br></br>
							Water Proof - הגנה בפני מים.
							</br></br>
							X-ray Proof - הגנה בפני קרני רנטגן.
							</br></br>
			
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






