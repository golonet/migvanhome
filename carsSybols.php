<?php 
session_start();

require_once 'classes/cars.class.php';

$cars = Cars::getCars();
require_once 'classes/product.class.php';
$subCategories = Product::getSubCategories();

if (isset($_REQUEST['ty'])){
	$t = $_REQUEST['ty'];

	if($t=='mag'){
		$titlePage = 'התאמת מגבים לרכב';
	}
	else {
		$titlePage = 'התאמת נורות לרכב';
	}
}
else{
	echo 'Type Missing';
	die();
}
// manufacturer logo
?>




<!DOCTYPE html>
<html>
<head>
<title>יצרני מכוניות</title>
<meta name="keywords" content="" />
<?php require_once 'parts/head_tags.php'; ?>
</head>
<body> 
<!--header-->
	<div class="container">
		<?php require_once 'parts/header.php'; ?>
		<div class="page" style="direction: rtl;">
			<h6><a href="index.php">יצרני מכוניות</a></h6>
		</div>
		<div class="content">

			<div class="col-md-10" style="direction: rtl;">
				<div class="content-bottom">
					<h3 style="padding: 0px; text-align: center; font-size: 34px;    background-color: #f5f5f5;">קטגוריות</h3>
					<div class="bottom-grid">
					
							<div id="content" style="height: 2500px;">
								
								<div style="width: 78%; min-height: 700px; float:left;">
									<div style="padding: 10px; color: #BB0E0E; font-size: 34px;  font-weight:bold; text-align: center;"><?php echo $titlePage; ?></div>
									<div style="clear: both; padding-top: 25px;position: relative;left: 48px;width: 670px;float: left;">
										<?php foreach ($cars as $car): ?>
											
											<a style="text-decoration: none;" href="carsModels.php?car_type_id=<?php echo $car->getId(); ?>&normag=<?php echo $t ?>">
												<img style="margin-left: 7px; margin-top:7px; width: 120px; border: 1px solid #000;" src="images/carLogo/<?php echo $car->getImagePath(); ?>" alt="<?php echo $car->getCarType(); ?>" />
											</a>
										
										<?php endforeach; ?>
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















