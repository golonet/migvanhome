<?php 
session_start();
require_once 'classes/product.class.php';
$subCategories = Product::getSubCategories();
?>
<!DOCTYPE html>
<html>
<head>
<title>תקנון</title>
<meta name="keywords" content="" />
<?php require_once 'parts/head_tags.php'; ?>
</head>
<body> 
<!--header-->
	<div class="container">
		<?php require_once 'parts/header.php'; ?>
		<div class="page" style="direction: rtl;">
			<h6><a href="index.php">תקנון</a></h6>
		</div>
		<div class="content">

			<div class="col-md-10" style="direction: rtl;">
				<div class="content-bottom">
					<h3 style="padding: 0px; text-align: center; font-size: 34px;    background-color: #f5f5f5;">קטגוריות</h3>
					<div class="bottom-grid">
						<div id="content">
						<div style="text-align: center; margin-top: 36px; clear: both;">
							<h1 class="infoPagesTitle">תקנון אתר</h1>	
						</div>		
						<div style="font-size: 14px;">
					
							<br />  <br />  
							
							1.	כללי
							<br />
							2.	ביצוע הזמנה
							 <br />
							3.	אמצעי תשלום
							<br />
							4.	זמן אספקה
							<br />
							5.	ביטול עסקה
							<br />
							6.	תנאי האחריות
							<br />
							7.	אבטחה
							<br />
							8.	זכויות קניין
							<br /><br />
							<span style="font-weight: bold; font-size: 16px;">
							1. כללי
							</span>
							<br />
							1.1 כל האמור בתקנון זה בלשון זכר, מתייחס גם לנקבה, לרבים וכן לכל גוף משפטי.
							<br />
							1.2 גלישתך באתר וביצוע פעולות בו כפופה להסכמתך לכל האמור בתקנון זה.
							<br />
							1.3 ללקוח לא תהא תביעה מכל סוג שהוא כלפי האתר מעבר לסכום רכישת הסחורה בפועל.
							<br />
							1.4 הנהלת האתר רשאית לעדכן את תנאי התקנון מעת לעת.
							<br />
							1.5 על התקנון יחול הדין הישראלי, סמכויות השיפוט לגביו לבתי המשפט המוסמכים בתל אביב
							<br /><br />
							<span style="font-weight: bold; font-size: 16px;">
							2. ביצוע הזמנה
							</span>
							<br />
							2.1 על מנת לבצע הזמנה עליך לבחור את המוצרים ולהוסיפם לסל הקניות, עם סיום בחירת המוצרים עליך    להשלים את ההזמנה באמצעות האתר.
							<br />
							2.2 הזמנה באמצעות הטלפון – ניתן להזמין מוצרים באמצעות האינטרנט על ידי מילוי טופס הזמנה באתר
							 (לאחר הוספת המוצר לסל הקניות שבאתר) נציג מכירות יחזור אליך בטלפון על מנת לבצע סופית את ההזמנה.
							 על מנת לבצע הזמנה עליך לבחור את המוצרים ולהוסיפם לסל הקניות אחרי כל הזמנה תוכל לראות פירוט של המוצרים שנבחרו, בסל הקניות. ניתן להוסיף או להסיר מוצרים מהסל. עם סיום בחירת המוצרים עליך להשלים את ההזמנה, כמפורט להלן. 
							2.3     על מנת להשלים את ההזמנה עליך למלא את פרטיך האישיים ולסיים את תהליך ההזמנה. בתום ביצוע ההזמנה תקבלו אישור על ביצועה (במסך), וכן תקבל דואר אלקטרוני המאשר שהזמנתך נקלטה.
							<br /><br />
							<span style="font-weight: bold; font-size: 16px;">
							3. אמצעי תשלום
							</span>
							<br />
							3.1 תשלום במזומן - תשלום במזומן ניתן לשלם בנקודת האיסוף, לאחר ביצוע הזמנה באתר.
							 <br />
							3.2 תשלום בכרטיס אשראי – ניתן לשלם בכרטיס אשראי עד 3 תשלומים ללא ריבית כשכל תשלום לפחות   בגובה 100 ש''ח.
							<br />
							3.3 תשלום בכרטיסי אשראי: ישראכרט, מאסטר כארד, דיינרס, ויזה
							<br />
							3.3 תשלום בפייפאל 
							<br /><br />
							<span style="font-weight: bold; font-size: 16px;">
							4. זמן אספקה
							</span>
							<br />
							4.1 זמן אספקת המוצר ללקוח עד 7 ימי עסקים.
							<br />
							4.2 ימי שישי,ערבי חג,חגים ויום ביצוע ההזמנה אינם נחשבים לימי עסקים.
							<br />
							4.3 זמני אספקת המוצרים יחושבו החל מרגע אישור העסקה ע''י חברת האשראי.
							<br />
							4.4 האתר לא יהיה אחראי לכל איחור או עיכוב באספקה שנגרמו כתוצאה מכוח עליון,פעולות איבה/טרור/ 
							      מלחמה, שביתות או כל ארוע אחר שאינו בשליטתה.
							<br />
							4.5 חתימה על החבילה תהווה אישור לקבלת המוצר.
							<br /><br />
							
							<span style="font-weight: bold; font-size: 16px;">
							5. ביטול עסקה
							</span>
							
							<br />
							5.1 ביטול עסקה יעשה באמצעות הדואר האלקטרוני
							<br />
							5.2 החזרת המוצר לא יאוחר מ-14 יום מביצוע הקניה, ובכפוף להצגת קבלה קניה.
							<br />
							5.3 הלקוח מחוייב להחזיר את המוצר באריזתו המקורית שהוא שלם וללא פגיעה.
							<br />
							5.4 במקרה של ביטול עסקה של מוצר שנסלק ונשלח יחוייב הלקוח בדמי משלוח + עמלות מכירה וביטול של  
							      חברות האשראי
							<br />
							5.5 במקרה של איסוף עצמי ותשלום במזומן, לא יחוייב הלקוח בתשלום, ובלבד שהחזרת המוצר תהיה למקום  
							     בו המוצר נלקח.
							<br />
							5.6 החזר כספי: תשלום במזומן – יוחזר במזומן
							                        תשלום באשראי – זיכוי הכרטיס עד 30 יום ע''י חברות האשראי
							<br /><br />
							
							<span style="font-weight: bold; font-size: 16px;">
							6. תנאי האחריות
							</span>
							
							<br />
							6.1 אחריות למוצרים במשך תקופת האחריות המצויינת באתר לגבי כל מוצר ומוצר לאחר רכישתו.
							<br />
							6.2 לא תינתן אחריות למוצרים שנפגעו כתוצאה מתאונה, נפילה, שבירה, שימוש שהינו רשלני, מוטעה או נוגד  
							      את הוראות השימוש של המוצר.
							<br />
							6.3 בכל מקרה של ויכוח או תביעה כספית, סכום התביעה לא יוכל לעלות מעבר לסכום המוצר על פי ערכו ביום
							     הקניה
							<br />	  
							6.4 מוצר שיוחלף/יתוקן, תקופת האחריות תישאר בתוקף למשך תקופת האחריות מיום הקניה בלבד.
							<br /><br />
							<span style="font-weight: bold; font-size: 16px;">
							7 . אבטחה
							</span>
							
							<br />
							7.1 כל פרטי הלקוח ופרטי האשראי אינם נשמרים באתר, ונמחקים מיידית לאחר ביצוע ההזמנה.
							<br />
							7.2 סוג אבטחה: 1. אורך מפתח הצפנה 256 bit 
							                         2. מפתח הצפנה א-סימטרי RSA 2048 bit
							<br /><br />
							<span style="font-weight: bold; font-size: 16px;">
							8. זכויות קניין
							</span>
							<br />
							8.1  כל הזכויות של האתר, לרבות עיצובו, קוד תוכנה, היישומים, התמונות, העיצובים, המלל ,המפרטים וכל 
							       מידע אחר באתר הינם שמורות לאתר migvanhome.co.il.
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





