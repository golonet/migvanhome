<?php 
session_start();
require_once 'classes/product.class.php';
$subCategories = Product::getSubCategories();
?>



<!DOCTYPE html>
<html>
<head>
<title>מדריכי קניה</title>
<meta name="keywords" content="" />
<?php require_once 'parts/head_tags.php'; ?>
</head>
<body> 
<!--header-->
	<div class="container">
		<?php require_once 'parts/header.php'; ?>
		<div class="page" style="direction: rtl;">
			<h6><a href="index.php">מדריכי קניה</a></h6>
		</div>
		<div class="content">

			<div class="col-md-10" style="direction: rtl;">
				<div class="content-bottom">
					<h3 style="padding: 0px; text-align: center; font-size: 34px;    background-color: #f5f5f5;">קטגוריות</h3>
					<div class="bottom-grid">
							<div id="content" style="height: 2500px;">
							<br />
								<div style="min-height: 700px;">
									<div style="text-align: center;">
										<h1 class="infoPagesTitle">מדריכי קניה</h1>	
									</div>				
									<div style="padding: 30px;">
										<a href="guidHDD.php">דיסקים קשיחים</a>
										<br /><br />
										<a href="guidMemoryCard.php">כרטיסי זיכרון</a>
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



