<?php 
session_start();

require_once 'classes/product.class.php';
require_once 'classes/cars_type.class.php';

require_once 'classes/manufacturerLinkes.class.php';

$manufacturer = LeftSideLinkes::getManufacturer();
$pagetitle = '';

if(isset($_REQUEST['car_type_id']) && isset($_REQUEST['normag'])){
	
	$carTypeId = $_REQUEST['car_type_id'];	
	$normag    = $_REQUEST['normag'];
	
	$CarsType  = CarsType::getCarType($carTypeId,$normag);
	
	if($normag=='nora'){
		$pagetitle='התאמת נורות לרכב';
	}elseif ($normag=='mag'){
		$pagetitle='התאמת מגבים לרכב';
	}  
	
}else{
	echo 'Model Type Missing';
	die();
}

$subCategories = Product::getSubCategories();
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
								
								<div style="width: 97%; min-height: 700px;">
									<div style="padding: 10px; color: #BB0E0E; font-size: 34px;  font-weight:bold; text-align: center;"><?php echo $pagetitle; ?></div>
									<div style="clear: both; padding-top: 25px;position: relative;left:-1.5%;  overflow-x: auto;">
										<?php if($normag=='nora'): ?>
										<table class="carsModelTable" style="width: 100%; text-align: center; font-size: 12px;">
											<thead>
											<tr>
												<th>דגם</th>
												<th>שנה</th>
												<th>שינוי צורה</th>
												<th>אור דרך</th>
												<th>אור גבוה</th>
												<th>חניה</th>
												<th>איתות קדמי</th>
												<th>איתות אחורי</th>
												<th>איתות צד</th>
												<th>ערפל קדמי</th>
												<th>ערפל אחורי</th>
												<th>בלם</th>
												<th>בלם שלישי</th>
												<th>רוורס</th>	
												<th>לוחית רישוי</th>														
											</tr>
										</thead>
										<tbody>	
										<?php foreach ($CarsType as $model): ?>										
											<tr style="background-color: <?php echo $model->getBackgroundColor(); ?>">
												<td><?php echo $model->getModel(); ?></td>
												<td><?php echo $model->getYear(); ?></td>
												<td><?php echo $model->getGeneration(); ?></td>
												<td><?php echo $model->getLowBeam(); ?></td>
												<td><?php echo $model->getHighBeam(); ?></td>
												<td><?php echo $model->getFrontParkLamp(); ?></td>
												<td><?php echo $model->getFrontIndicator(); ?></td>
												<td><?php echo $model->getRearIndicator(); ?></td>
												<td><?php echo $model->getSideIndicator(); ?></td>
												<td><?php echo $model->getFrontFogLamp(); ?></td>
												<td><?php echo $model->getRearFogLamp(); ?></td>
												<td><?php echo $model->getStopTailLamp(); ?></td>
												<td><?php echo $model->getThirdBrakeLamp(); ?></td>
												<td><?php echo $model->getReversingLamp(); ?></td>
												<td><?php echo $model->getNumberPlateLamp(); ?></td>
											</tr>
										<?php endforeach; ?>
										</tbody>
										</table>
										<?php endif; ?>
										
										<?php if($normag=='mag'): ?>
										<table class="carsModelTable">
											<tr>
												<th>דגם</th>
												<th>שנה</th>
												<th>מגב שמאלי</th>
												<th>מגב ימני</th>
												<th>מתאם</th>
																								
											</tr>
										<?php foreach ($CarsType as $model): ?>
											<tr>
												<td style="background-color: <?php echo $model->getBackgroundColor(); ?>"><?php echo $model->getModel(); ?></td>
												<td><?php echo $model->getYear(); ?></td>
												<td><?php echo $model->getLeftWiper(); ?></td>
												<td><?php echo $model->getRightWiper(); ?></td>
												<td><?php echo $model->getAdapterType(); ?></td>
											</tr>
										<?php endforeach; ?>
										</table>
										<?php endif; ?>					
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







