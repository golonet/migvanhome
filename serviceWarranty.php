<?php 
session_start();
require_once 'classes/product.class.php';
$subCategories = Product::getSubCategories();

//min-height: 700px;
?>

<!DOCTYPE html>
<html>
<head>
<title>ראשי</title>
<meta name="keywords" content="" />
<?php require_once 'parts/head_tags.php'; ?>

<style type="text/css">
a{text-decoration: underline;}
hr{
	margin-top: 0;
    margin-bottom: 0;
    border: 0;
    border-top: 1px solid none;
    height: 1px;
    background-color: #ccc;
}
}
</style>
</head>
<body> 
<!--header-->
	<div class="container">
		<?php require_once 'parts/header.php'; ?>
		<div class="page" style="direction: rtl;">
			<h6><a href="index.php">ראשי</a><b>&#9668;</b><span style="color: #4cb1ca;  text-decoration: none;  font-weight: 800;">מותגים</span></h6>
		</div>
		<div class="content">

			<div class="col-md-10" style="direction: rtl;">
				<div class="content-bottom">
					<h3 style="padding: 0px; text-align: center; font-size: 34px;    background-color: #f5f5f5;">מותגים</h3>
					<div class="bottom-grid">
						<div id="content" style="min-height: 3200px;">
							<br />
							
								<div style="text-align: center;">
									<h1 class="infoPagesTitle">שירות ואחריות</h1>	
								</div>			
								<div style="padding: 30px; clear: both;">
									יבואן רשמי: <a href="http://www.fetaya.com/" target="_blank">א. פתיה</a>
									<br />
									מותגים: Fetaya, Sulex, Soul, Master
									<br />
									כתובת: אליהו איתן 15, ראשון לציון.
									<br />
									שרות לקוחות: 03-9611150
									<br />
									א - ה: 17:00 - 08:30
									<br /><br />
                  <hr />
                  <br /><br />
                יבואן רשמי: <a href="http://www.avitalbs.com/" target="_blank">אביטל ב.ס</a>					
                 <br />
                 מותגים: Luminus
                 <br />
                 כתובת: הבנאי 21, חולון
                 <br />
                 שרות לקוחות: טל'- 03-5587717
                 <br />
                 א - ה בין השעות 17:00 - 08:00
                 <br /><br />
                 <hr />
                 <br /><br />
									יבואן רשמי: <a href="http://www.igil.co.il/" target="_blank">א.י. גיל כרמל סוכנויות והפצה</a>					
									<br />
									מותגים: <a href="http://www.energizer.com/" target="_blank">Energizer</a>
									<br />
									כתובת: מוצקין 9, טירת כרמל
									<br />
									שרות לקוחות: טל'- 04-8577868
									<br />
									א - ה בין השעות 17:00 - 08:00
									<br />
									דוא"ל: info@igil.co.il
									<br /><br />
									<hr />
									<br /><br />
									יבואן רשמי: אלפא ט.ס שיווק והפצה
									<br />
									מותגים: iSpeed
									<br />
									כתובת: גיבורי ישראל 10/א, נתניה
									<br />
									שרות לקוחות: טל'- 09-8858810
									<br />
									דוא"ל: sharon@alpha-marketing.co.il
				  				<br /><br />
                  <hr />
                  <br /><br />
                  יבואן רשמי: אילה פלסט
                  <br />
                  מותגים: אילה פלסט
                  <br />
                   כתובת: פארק תעשיות בר-לב
                   <br />
                  שרות לקוחות: טל' -04-9916091
                  <br />
                  א - ה בין השעות 17:00 - 08:00
                  <br /><br />
                  <hr />
                  <br /><br />
                  יבואן רשמי: <a href="https://www.advice.co.il/" target="_blank">אדוויס אלקטרוניקה</a>					
                  <br />
                  מותגים: <a href="http://www.meanwell.com/" target="_blank">Mean Well</a>, <a href="http://www.planet.com.tw/" target="_blank">Planet</a>
                  <br />
                  כתובת: עתיר ידע 16, כפר סבא
                  <br />
                  שרות לקוחות: 03-9000940
                  <br />
                  דוא''ל: support@advice.co.il
                  <br />
                   א - ה בין השעות 17:00 - 08:00
                  <br /><br />
                  <hr />
                  <br /><br />
                  יבואן רשמי: <a href="http://www.eurolux.co.il/" target="_blank">אילומינה</a>					
                  <br />
                  מותגים: <a href="https://www.eurolux.co.za/" target="_blank">Eurolux</a>, <a href="http://www.actec.com.cn/" target="_blank">AcTEC</a>
                  <br />
                  כתובת: אפעל 33, פתח תקווה
                  <br />
                  שרות לקוחות: 03-9044124
                  <br />
                  א - ה בין השעות 17:00 - 08:00
                  <br />
                  דוא"ל: info@eurolux.co.il
                  <br /><br />
                  <hr />
                  <br /><br />
                  יבואן רשמי: <a href="http://alfatek.co.il/" target="_blank">אלפאטק טכנולוגיות</a>					
                  <br />
                  מותגים: <a href="http://www.courbi.com/en/" target="_blank">COURBI</a>, <a href="http://www.tektonix-eu.com/" target="_blank">TekTonix</a>
                  <br />
                  כתובת: שוהם
                  <br />
                  שרות לקוחות: 073-2336655
                  <br />
                  א - ה בין השעות 17:00 - 09:00
                  <br /><br />
                  <hr />
                  <br /><br />
									יבואן רשמי : <a href="http://www.bconnect.co.il/" target="_blank">ביקונקט</a>
									<br />
									מותגים: Philips, AC
									<br />
									כתובת: מרכז ביל''ו IN, קרית עקרון
									<br />
									שרות לקוחות: טל'- 08-9418222
									<br />
									א - ה בין השעות 17:00 - 10:00
									<br />
									דוא"ל: info@bconnect.co.il
									<br /><br />
									<hr />
									<br /><br />
									יבואן רשמי: <a href="http://ps-1980.com/index.php" target="_blank">ביתן ספרק</a>
									<br />
									מותגים: <a href="http://www.philips.co.uk/c-m-li/car-lights" target="_blank"> Philips (Automotive) </a>, <a href="https://www.formula1wax.com/" target="_blank">Formula 1</a>, 
									<br />
                  <a href="http://catalog.gelighting.com/lamp/led-lamps/gls-bulb/f=tungsram-gls/d=0/?r=emea" target="_blank">Tungsram</a>, <a href="http://www.meguiars.com/en/#Y6WXGsZ7IAzxtkYV.97" target="_blank">Meguiar's</a>, Spar-tec, Nova, Vision
                  <br />
									כתובת: מבצע קדש 68, בני ברק
									<br />
									שרות לקוחות: טל'- 03-6251666
									<br />
									א - ה בין השעות 17:00 - 10:00
									<br /><br />
									<hr />
									<br /><br />
									יבואן רשמי: <a href="http://www.benda.co.il/" target="_blank">בנדא מגנטיק</a>
									<br />
									מותגים: <a href="http://www.logitech.com/en-us" target="_blank">Logitech</a>, <a href="http://www.miracase.com/index.asp" target="_blank">Miracase</a>, <a href="http://www.global.tdk.com/" target="_blank">TDK</a>, 
									<br />
                  <a href="http://www.tp-link.com/il/" target="_blank">TP-LINK</a>, <a href="http://www.tp-link.com/il/" target="_blank">Western Digital</a>, Silver Line, Novogo
                  <br />
									כתובת: נחל אלכסנדר, א. תעשיה עמק חפר
									<br />
									שרות לקוחות: טל'- 073-2660699
									<br />
									א - ה בין השעות 17:00 - 10:00
									<br />
									דוא"ל: lab@benda.co.il
									<br /><br />
									<hr />
									<br /><br />
									יבואן רשמי: <a href="http://gpltd.co.il/" target="_blank">גרין פאואר</a>
									<br />
									מותגים: <a href="http://www.divoom.com/" target="_blank"> Divoom </a>, <a href="http://www.duracell-light.com/en/home.html" target="_blank"> Duracell </a>, <a href="http://grundigaccessories.com/" target="_blank"> Grundig (Accessories) </a>, <a href="http://www.iremax.hk/index.php?type=list&channel=product&lang=en&attr=&cid=497&page=1" target="_blank"> Remax </a>
									<br />
									כתובת: גד פיינשטיין 13, רחובות
									<br />
									שרות לקוחות: טל'- 08-8683430
									<br />
									א - ה בין השעות 16:00 - 10:00
									<br />
									דוא"ל: eyal@gpltd.co.il
									<br /><br />
									<hr />
									<br /><br />
									יבואן רשמי: <a href="http://www.daganm.co.il/" target="_blank">דגן מולטימדיה</a>
									<br />
									מותגים: Topx
									<br />
									כתובת: החצב 1, אזור
									<br />
									שרות לקוחות: טל'- 03-9605281
									<br />
									א - ה בין השעות 17:00 - 08:30  | יום ו: 12:30 - 09:00
	      					<br /><br />
                  <hr />
                  <br /><br />
                  יבואן רשמי: <a href="http://dealor.co.il/" target="_blank">דילאור ייצור ויבוא מוצרי חשמל</a>					
                  <br />
                  מותגים: ProGrade
                  <br />
                  כתובת: הגנן 28, מודיעין
                  <br />
                  שרות לקוחות: 08-9724000
                  <br />
                  א - ה בין השעות 17:00 - 09:00
                  <br /><br />
                  <hr />
                  <br /><br />
									יבואן: זריחה ציוד משרדי
									<br />
									מותגים: MULLER, Dr. Byte
									<br />
									כתובת: ספיר 5, א. תעשיה ברקן
									<br />
									שרות לקוחות: טל'- 03-9066906
									<br />
									א - ה בין השעות 16:00 - 10:00
									<br />
									דוא"ל: eyal@gpltd.co.il
									<br /><br />
									<hr />
									<br /><br />
									יבואן רשמי: מאגר ציוד למשרד ולמחשב
									<br />
									מותגים: <a href="http://www.samsung.com/il/business/business-products/printers-multifunctions/" target="_blank"> Samsung (Printer & Monitor) </a>, <a href="http://www.verbatim.com/home" target="_blank"> Verbatim </a>
									<br />
									כתובת: דיסנצ'יק 7, ת''א
									<br />
									שרות לקוחות: 03-6484884
									<br />
									א - ה: 16:00 - 10:00
									<br /><br />
									<hr />
									<br /><br />
									יבואן : <a href="http://www.morlevi.co.il/" target="_blank">מור לוי טכנולוגיות</a>
									<br />
									מותגים: <a href="http://store.antec.com/" target="_blank"> Antec </a>, <a href="http://www.gigabyte.com/" target="_blank"> Gigabyte </a>, <a href="http://www.kingston.com/en/" target="_blank"> Kingston </a>, <a href="https://www.nzxt.com/" target="_blank"> NZXT </a>, 
									<br />
                  <a href="http://ocz.com/" target="_blank"> OCZ </a>, <a href="http://www.palit.biz/palit/index.php?lang=en" target="_blank"> Palit </a>, <a href="https://patriotmemory.com/" target="_blank"> Patriot </a>, <a href="http://www.sapphiretech.com/Default.asp?lang=eng" target="_blank"> Sapphire </a>
                  <br />
									כתובת: אליהו איתן 14, ראשון לציון
									<br />
									שרות לקוחות: 9423211/2 - 03
									<br />
									שעות פעילות: א - ה בין השעות 15:00 - 11:00
									<br />
									אימייל: info@morlevi.co.il
									<br /><br />
									<hr />
									<br /><br />
									יבואן : <a href="https://support.microsoft.com/he-il" target="_blank">מיקרוסופט יישראל</a>
									<br />
									מותגים: Microsoft
									<br />
									כתובת: הפנינה 2, רעננה
									<br />
									שרות לקוחות: 1900-72-7426 / 09-7625400
									<br />
									א - ה: 18:00 - 08:00 | ו - 8:00 - 13:00
									<br /><br />
									<hr />
									<br /><br />
									יבואן רשמי: <a href="http://www.saynet.co.il/" target="_blank">סאיינט לקת</a>
									<br />
									מותגים: <a href="http://www.camelion.com/en/" target="_blank"> Camelion </a>, <a href="https://www.caselogic.com/en/international" target="_blank"> Case Logic </a>, <a href="http://www.coolermaster.com/" target="_blank"> Cool Master </a>, 
									<br />
                  <a href="http://www.chinafsl.com/" target="_blank"> FSL </a>, <a href="http://www.toshiba-batteries-eu.com/" target="_blank"> Toshiba (Batteries) </a>, Omega, Sigma
                  <br />'
									כתובת: פארק תעשיות שחק, שקד
									<br />
									שרות לקוחות: טל'- 04-6350680
									<br />
									א - ה בין השעות 16:00 - 10:00
									<br />
									דוא"ל: saynet@saynet.co.il
									<br /><br />
                  <hr />
                  <br /><br />
                  יבואן רשמי: <a href="http://www.samsungmobile.co.il/" target="_blank">סאני תקשורת (סקיילקס קורפוריישן)</a>					
                  <br />
                  מותגים: <a href="http://www.samsung.com/us/mobile/phones/" target="_blank">Samsung (Mobile)</a>
                  <br />
                  כתובת: בן ציון גליס 48,פתח תקווה
                  <br />
                  שרות לקוחות: *6963
                  <br />
                  א - ה בין השעות 17:00 - 09:00
                  <br /><br />
                  <hr />
                  <br /><br />
									יבואן רשמי: <a href="http://www.semicom.co.il/" target="_blank">סמיקום לקסיס</a>
									<br />
									מותגים: <a href="http://www.gelighting.com/LightingWeb/na/" target="_blank"> General Electric </a>, <a href="http://www.gpbatteries.com/" target="_blank"> GP </a>, <a href="http://www.rapoo.com/" target="_blank"> Rapoo </a>, <a href="https://www.worx.com/en-US/default.aspx" target="_blank"> Worx </a>, GPT, Hyundai
									<br />
									כתובת: ספיר 2, אבן יהודה
									<br />
									שרות לקוחות: טל'- 09-7611222
									<br />
									א - ה בין השעות 17:00 - 08:00
									<br />
									דוא"ל: info@semicom.co.il
									<br /><br />
									<hr />
									<br /><br />
									יבואן רשמי: <a href="http://www.skl.co.il/" target="_blank">סקל אלקטרוניקה</a>
									<br />
									מותגים: <a href="http://www.kirlincable.com/" target="_blank"> Kirlin </a>, SAKAL
									<br />
									כתובת: שד' יצחק בן צבי 84, ת''א
									<br />
									שרות לקוחות: 03-6816155
                  <br /><br />
                  <hr />
                  <br /><br />
                  יבואן רשמי: <a href="http://pikok.co.il/" target="_blank">פיקוק מחשבים</a>					
                  <br />
                  מותגים: <a href="http://www.edimax.com/edimax/global/" target="_blank">Edimax</a>, <a href="http://www.provision-isr.com/" target="_blank">ProVision-ISR</a>
                  <br />
                  כתובת: עתיר ידע 11, כפר סבא
                  <br />
                  שרות לקוחות: 09-7601346
                  <br />
                  א - ה בין השעות 17:00 - 08:00
                  <br /><br />
                  <hr />
                  <br /><br />
						  		יבואן רשמי: קצנשטיין אדלר (אלקטרה)
									<br />
									מותגים: Philips, Electra Lighting (נורות) 
									<br />
									כתובת: האומנות 4, נתניה
									<br />
									שרות לקוחות: טל'- 09-7475777
									<br />
									א - ה בין השעות 16:30 - 07:30
									<br /><br />
                  <hr />
                  <br /><br />
                  יבואן רשמי: <a href="http://ronlight.co.il/" target="_blank">רונלייט דיגיטל</a>					
                  <br />
                  מותגים: <a href="http://www.lg.com/global/mobile/index.html" target="_blank">LG (Mobile)</a>, <a href="http://www.mio.com/" target="_blank">Mio</a>
                  <br />
                  כתובת: בר כוכבא 21, בני ברק
                  <br />
                  שרות לקוחות: 077-9007222
                  <br />
                  א - ה בין השעות 17:00 - 09:00
                 <br /><br />
                 <hr />
                 <br /><br />
									יבואן רשמי: <a href="http://www.oki.co.il/" target="_blank">שר אלקטרוניקה</a>
									<br />
									מותגים: <a href="http://bixolon.com/html/en/index.xhtml" target="_blank"> Bixolon </a>, <a href="http://www.oki.com/" target="_blank"> OKI </a>, <a href="http://www.senortech.com/" target="_blank"> Senor </a>,<a href="http://www.okposkorea.com/eng/" target="_blank"> OKPOS </a>, <a href="http://www.gprinter.hk/" target="_blank"> Gprinter </a>, Kodata
									<br />
									כתובת: ברוך הירש 22, בני ברק
									<br />
									שרות לקוחות: 073-2299999
									<br />
									א - ה: 17:30 - 08:30
									<br /><br />
									<hr />
									<br /><br />
								</div>	
					
					

						
						</div>
						<br/><br/>
								<div style='text-align:center;'>
									<img style='width: 90%; margin: auto; margin-top: 30px; ' src="images/Importers-best-store.jpg" class="bottom_pic" />
									<img style='width: 90%; margin: auto; margin-top: 30px;  '  src="images/manufacturerlinks_for-Best-store.jpg" class="bottom_pic" />
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

















