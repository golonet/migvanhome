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
					
					<div class="bottom-grid">
						<div id="content">
								<div style="">		
								
										שם עסק: קניות באיטרנט<br>
										כתובת: אלנבי 94, תל אביב<br>
										תאריך הקמה: 03/2014<br>										
										אתרי סחר: migvanhome.co.il, Best-light.co.il<br>
										<br><br>																
											
										אמצעי תשלום<br>
										אשראי - אמריקן אקספרס, מאסטרכארד, ויזה, ישראכרט<br>
										פייפאל - payment@migvanhome.co.il<br>
										העברה בנקאית - בנק הפועלים, סניף 604, חשבון 503830<br>																			
										תשלום באפליקציה:  Bit, Pay, payBox  לנייד 053-3031971<br>
										

								</div>		
								<br><br>
								<div style="font-size: 14px;">
									<h3 style="color: #000; text-align: right; padding: 0px;">הורדות:</h3>	
									<br>
									<a href="info/withholding_tax.pdf">אישור ניכוי מס במקור</a>
									<br>
									<a href="info/Bookkeeping_certificate.pdf">אישור ניהול ספרים</a>
									<br>
									<a href="info/VAT_exemption_approval.pdf">אישור עוסק פטור</a>
                  							
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





