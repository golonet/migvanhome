<?php 
session_start();
require_once 'classes/product.class.php';
$subCategories = Product::getSubCategories();
?>

<!DOCTYPE html>
<html>
<head>
<title>מידע</title>
<meta name="keywords" content="" />
<?php require_once 'parts/head_tags.php'; ?>
</head>
<body> 
<!--header-->
	<div class="container">
		<?php require_once 'parts/header.php'; ?>
		<div class="page" style="direction: rtl;">
			<h6><a href="index.php">מידע</a></h6>
		</div>
		<div class="content">

			<div class="col-md-10" style="direction: rtl;">
				<div class="content-bottom">
					<h3 style="padding: 0px; text-align: center; font-size: 34px;    background-color: #f5f5f5;">מידע</h3>
					<div class="bottom-grid">
					
							<div id="content" style="height: 2500px;">
										
										<div style="min-height: 700px;">
											<br />
											<div style="text-align: center;">
												<h1 class="infoPagesTitle">מידע</h1>	
											</div>			
											<div style="padding: 30px;">
												<a href="dualBandDevice.php">מה זה רשת Dual Band ?</a>
												<br /><br />
											        <a href="dlnaDevice.php">מה זה תקשורת DLNA ?</a>
											        <br /><br />
												<a href="devicesSupportMicroSDXC128gb.php">התקנים שתומכים ב- Micro SDXC 128GB </a>
												<br /><br />
												<a href="slimPortDevice.php">מה זה תקן SlimPort ?</a>
												<br /><br />
												<a href="mhlDevice.php">מה זה תקן MHL ?</a>
												<br /><br />
												<a href="hdmiVersion.php">הבדלים בין גרסאות בתקן HDMI</a>
												<br /><br />
                        <a href="DisplayPort-Version-Type.php">הבדלים בין גרסאות בתקן DisplayPort</a>
												<br /><br />
                        <a href="qualcommQuickCharge.php">טעינה מהירה  Qualcomm Quick Charge</a>
												<br /><br />   
												
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















